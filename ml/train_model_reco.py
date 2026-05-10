"""
train_model_reco.py — Génération du dataset à partir de la BDD + entraînement Random Forest
pour la recommandation d'abonnements Dinari.

Features :
  budget    : 1-4  (1=<10DT, 2=10-30DT, 3=30-70DT, 4=>70DT)
  category  : 1-4  (1=musique, 2=video, 3=pro, 4=gaming)
  frequency : 1-3  (1=occasionnel, 2=regulier, 3=quotidien)
  profile   : 1-3  (1=particulier, 2=famille, 3=professionnel)

Labels : Noms réels des abonnements (Spotify Personal, Netflix...)
"""

import numpy as np
import pandas as pd
import joblib
import pymysql
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import LabelEncoder, StandardScaler
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score, classification_report

# Configuration BDD
DB_CONFIG = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'gestionabonnement'
}

def get_abonnements_from_db():
    """Récupère les vrais abonnements depuis la base de données"""
    try:
        conn = pymysql.connect(**DB_CONFIG, cursorclass=pymysql.cursors.DictCursor)
        cursor = conn.cursor()
        
        cursor.execute("""
            SELECT id, nom, prix, categorie, tier, frequence, description
            FROM abonnement 
            WHERE actif = 1
        """)
        
        abonnements = cursor.fetchall()
        cursor.close()
        conn.close()
        
        return abonnements
    except Exception as e:
        print(f"Erreur BDD : {e}")
        return []

def build_plan_details(abonnements):
    """Construit les détails des plans à partir des vrais abonnements"""
    details = {}
    for abo in abonnements:
        details[abo['nom']] = {
            "id": abo['id'],
            "price": float(abo['prix']),
            "description": abo.get('description', f"Abonnement {abo['nom']}"),
            "features": [
                f"{abo['categorie']} - {abo['tier']}",
                f"{abo['frequence']}",
                "Annulable à tout moment"
            ]
        }
    return details

def get_category_code(categorie):
    """Convertit la catégorie texte en code numérique"""
    categorie = categorie.lower() if categorie else ''
    
    if categorie in ['musique', 'music', 'streaming audio', 'audio']:
        return 1
    elif categorie in ['video', 'film', 'streaming video', 'tv', 'cinema']:
        return 2
    elif categorie in ['pro', 'productivite', 'productivity', 'saas', 'bureau', 'office']:
        return 3
    elif categorie in ['gaming', 'jeu', 'game', 'jeux video']:
        return 4
    else:
        return 2  # défaut

def get_budget_code(prix):
    """Convertit le prix en code budget"""
    if prix < 10:
        return 1
    elif prix < 30:
        return 2
    elif prix < 70:
        return 3
    else:
        return 4

def generate_dataset_from_abonnements(abonnements, n_samples=3000):
    """
    Génère un dataset d'entraînement basé sur les VRAIS abonnements
    en utilisant des règles métier (pas du ML ici, c'est la préparation des données)
    """
    np.random.seed(42)
    rows = []
    
    # Distribution des profils utilisateurs
    for abo in abonnements:
        nom = abo['nom']
        prix = float(abo['prix'])
        categorie = abo['categorie']
        tier = abo['tier']
        
        cat_code = get_category_code(categorie)
        budget_code = get_budget_code(prix)
        
        # Pour chaque abonnement, générer des profils qui lui correspondent
        n_echantillons = max(50, n_samples // len(abonnements))
        
        for _ in range(n_echantillons):
            # Ajouter un peu de variation naturelle (bruit réaliste)
            budget_variation = np.random.choice([-1, 0, 1], p=[0.1, 0.8, 0.1])
            budget_final = max(1, min(4, budget_code + budget_variation))
            
            # Variation de catégorie (10% peuvent être intéressés par autre chose)
            if np.random.random() < 0.15:
                cat_final = np.random.choice([1, 2, 3, 4])
            else:
                cat_final = cat_code
            
            # Fréquence selon le prix et le type
            if budget_code >= 3 or cat_code in [3, 4]:
                freq_probs = [0.1, 0.3, 0.6]
            elif budget_code == 1:
                freq_probs = [0.5, 0.4, 0.1]
            else:
                freq_probs = [0.2, 0.5, 0.3]
            
            # Profil selon le plan
            if 'famille' in nom.lower() or 'family' in nom.lower():
                profile_probs = [0.2, 0.7, 0.1]
            elif 'pro' in nom.lower() or 'business' in nom.lower() or 'enterprise' in nom.lower():
                profile_probs = [0.1, 0.2, 0.7]
            else:
                profile_probs = [0.6, 0.3, 0.1]
            
            rows.append({
                "budget": budget_final,
                "category": cat_final,
                "frequency": np.random.choice([1, 2, 3], p=freq_probs),
                "profile": np.random.choice([1, 2, 3], p=profile_probs),
                "plan": nom
            })
    
    df = pd.DataFrame(rows)
    
    # Ajouter des cas marginaux (bruit) pour améliorer la généralisation
    n_noise = int(len(df) * 0.05)
    for _ in range(n_noise):
        rows.append({
            "budget": np.random.randint(1, 5),
            "category": np.random.randint(1, 5),
            "frequency": np.random.randint(1, 4),
            "profile": np.random.randint(1, 4),
            "plan": np.random.choice([a['nom'] for a in abonnements])
        })
    
    df = pd.DataFrame(rows)
    df = df.sample(frac=1, random_state=42).reset_index(drop=True)
    return df

def train_and_save(model_path="recommendation_model.pkl"):
    print("=" * 55)
    print("  🤖 ENTRAÎNEMENT MODÈLE RECOMMANDATION DINARI")
    print("=" * 55)
    
    print("\n📡 Connexion à la base de données...")
    abonnements = get_abonnements_from_db()
    
    if not abonnements:
        print("❌ Aucun abonnement trouvé dans la BDD !")
        return None, None, None
    
    print(f"✅ {len(abonnements)} abonnements chargés :")
    for abo in abonnements:
        print(f"   - {abo['nom']} ({abo['prix']} DT) - {abo['categorie']}")
    
    print("\n🔄 Génération du dataset d'entraînement...")
    df = generate_dataset_from_abonnements(abonnements, n_samples=3500)
    print(f"📊 Dataset: {len(df)} samples")
    print("\nDistribution des plans :")
    print(df["plan"].value_counts())
    
    # Préparation des features
    X = df[["budget", "category", "frequency", "profile"]].values
    y = df["plan"].values
    
    # Encodage des labels
    le = LabelEncoder()
    y_encoded = le.fit_transform(y)
    
    # Normalisation des features
    scaler = StandardScaler()
    X_scaled = scaler.fit_transform(X)
    
    # Split entraînement / test
    X_train, X_test, y_train, y_test = train_test_split(
        X_scaled, y_encoded, test_size=0.2, random_state=42, stratify=y_encoded
    )
    
    print(f"\n🎯 Entraînement du Random Forest...")
    print(f"   Échantillons train: {len(X_train)}")
    print(f"   Échantillons test: {len(X_test)}")
    print(f"   Classes: {len(le.classes_)}")
    
    # Modèle Random Forest optimisé
    clf = RandomForestClassifier(
        n_estimators=200,
        max_depth=12,
        min_samples_split=5,
        min_samples_leaf=2,
        class_weight="balanced",
        random_state=42,
        n_jobs=-1
    )
    clf.fit(X_train, y_train)
    
    # Évaluation
    y_pred = clf.predict(X_test)
    acc = accuracy_score(y_test, y_pred)
    
    print(f"\n📈 Accuracy sur le test set : {acc * 100:.1f}%")
    print("\n📋 Rapport de classification :")
    print(classification_report(y_test, y_pred, target_names=le.classes_))
    
    # Importance des features
    feature_names = ["budget", "category", "frequency", "profile"]
    importances = clf.feature_importances_
    print("\n🔍 Importance des features (Random Forest) :")
    for name, imp in zip(feature_names, importances):
        bar = "█" * int(imp * 50)
        print(f"   {name:10} : {imp:.3f} {bar}")
    
    # Détails des plans à partir des vrais abonnements
    plan_details = build_plan_details(abonnements)
    
    # Sauvegarde du modèle complet
    joblib.dump({
        "model": clf,
        "label_encoder": le,
        "scaler": scaler,
        "plan_details": plan_details,
        "feature_names": feature_names,
        "accuracy": acc
    }, model_path)
    
    print(f"\n💾 Modèle sauvegardé : {model_path}")
    print("=" * 55)
    return clf, le, scaler

if __name__ == "__main__":
    train_and_save()