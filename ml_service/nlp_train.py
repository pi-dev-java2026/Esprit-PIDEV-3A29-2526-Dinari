import pandas as pd
import numpy as np
import joblib
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.linear_model import LogisticRegression
from sklearn.pipeline import Pipeline
from sklearn.model_selection import train_test_split
from sklearn.metrics import classification_report

MODEL_PATH = 'nlp_model.pkl'

def generate_nlp_synthetic_data(num_samples=300):
    print(f"Generating {num_samples} NLP text samples...")
    data = []
    
    # Text datasets for categories
    paiement_titles = ["Mon paiement n'est pas arrivé", "Erreur de facturation", "Débit multiple", "Où est mon remboursement", "Facture incorrecte", "Problème carte bancaire"]
    paiement_desc = ["J'ai payé mais la commande n'est pas validée.", "Sur mon relevé il y a deux débits de Dinari.", "Je voudrais comprendre pourquoi j'ai été facturé.", "J'ai annulé mais aucun virement en vue.", "Le montant est incorrect sur l'application.", "Carte refusée sans motif apparent."]
    
    technique_titles = ["L'application crash", "Mon compte est bloqué", "Impossible de se connecter", "Erreur 500 sur le site", "Bug affichage", "Reconnaissance faciale échoue"]
    technique_desc = ["À chaque fois que j'ouvre mon profil, ça plante totalement.", "Mot de passe refusé à plusieurs reprises.", "Un écran blanc s'affiche après connexion.", "Le serveur affiche erreur lors du paiement.", "Le panneau admin est inutilisable à cause des couleurs.", "Ma caméra bloque sur le scan de mon visage."]
    
    livraison_titles = ["Colis perdu", "Retard de livraison", "Où est le livreur ?", "Article manquant", "Mauvaise adresse de livraison", "Suivi bloqué"]
    livraison_desc = ["Mon suivi de commande indique livré mais je n'ai rien reçu.", "Cela fait 3 jours de retard !", "Impossible de joindre le service de transport.", "Il manque mon pantalon rouge dans le carton.", "J'ai déménagé et je veux changer l'adresse.", "Le numéro de suivi la poste est invalide."]
    
    service_titles = ["Je veux échanger", "Plainte contre un vendeur", "Comment contacter le support", "Conseil sur un achat", "Compte supprimé", "Problème SAV"]
    service_desc = ["L'article est trop petit, quelle est la procédure d'échange ?", "Ce vendeur m'a insulté via le chat.", "Je n'ai vu aucun numéro d'appel.", "Que recommandez-vous entre A et B ?", "Sans faire exprès j'ai clôturé mon profil.", "Le service client était exécrable hier."]

    mappings = {
        'Paiement': (paiement_titles, paiement_desc),
        'Technique': (technique_titles, technique_desc),
        'Livraison': (livraison_titles, livraison_desc),
        'Service': (service_titles, service_desc),
    }

    categories = list(mappings.keys())
    
    for _ in range(num_samples):
        cat = np.random.choice(categories)
        titles, descs = mappings[cat]
        title = np.random.choice(titles)
        desc = np.random.choice(descs)
        
        # Add slight variations
        prefix = np.random.choice(["Bonjour, ", "Urgent: ", "", "S'il vous plait, "])
        
        data.append({
            'text': f"{prefix}{title}. {desc}",
            'category': cat
        })
        
    return pd.DataFrame(data)

def train_nlp_model():
    df = generate_nlp_synthetic_data(400)
    
    X = df['text']
    y = df['category']
    
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    
    # Pipeline: TF-IDF feature extraction -> Logistic Regression 
    # Logistic Regression gives reliable predict_proba estimations.
    pipeline = Pipeline([
        ('tfidf', TfidfVectorizer(stop_words=None, max_features=1000, lowercase=True)),
        ('clf', LogisticRegression(random_state=42, class_weight='balanced'))
    ])
    
    pipeline.fit(X_train, y_train)
    
    # Evaluation
    preds = pipeline.predict(X_test)
    print("\n--- NLP CLASSIFICATION REPORT ---")
    print(classification_report(y_test, preds))
    
    # Saving Model
    joblib.dump(pipeline, MODEL_PATH)
    print(f"\nNLP Model pipeline saved to {MODEL_PATH}")
    
    # Test Prediction
    test_text = "Urgent: Mon suivi de commande indique livré mais je n'ai rien."
    predicted = pipeline.predict([test_text])[0]
    probs = pipeline.predict_proba([test_text])[0]
    max_prob = max(probs)
    
    print("\n--- TEST PREDICTION ---")
    print(f"Phrase: {test_text}")
    print(f"Predicted Category: {predicted} (Confidence: {max_prob:.2f})")

if __name__ == '__main__':
    train_nlp_model()
