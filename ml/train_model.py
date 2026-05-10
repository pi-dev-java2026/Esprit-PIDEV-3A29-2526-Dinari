"""
Dinari — Entraînement du modèle ML
Random Forest → prédit nb_ventes par abonnement par mois (2026)
"""

import pandas as pd
import numpy as np
import pickle
from sklearn.ensemble import RandomForestRegressor
from sklearn.preprocessing import LabelEncoder
from sklearn.model_selection import train_test_split
from sklearn.metrics import mean_absolute_error, r2_score

# ─────────────────────────────────────────────
# 1. Charger le dataset
# ─────────────────────────────────────────────
df = pd.read_csv("dataset_dinari.csv")
print(f"✅ Dataset chargé : {len(df)} lignes\n")

# ─────────────────────────────────────────────
# 2. Encoder les colonnes texte
# ─────────────────────────────────────────────
le_categorie = LabelEncoder()
le_tier      = LabelEncoder()
le_frequence = LabelEncoder()

df["categorie_enc"] = le_categorie.fit_transform(df["categorie"])
df["tier_enc"]      = le_tier.fit_transform(df["tier"])
df["frequence_enc"] = le_frequence.fit_transform(df["frequence"])

# ─────────────────────────────────────────────
# 3. Features et cible
# ─────────────────────────────────────────────
features = [
    "abonnement_id",
    "prix",
    "a_promo",
    "numero_mois",
    "annee",
    "taux_conversion",
    "economie_pct",
    "categorie_enc",
    "tier_enc",
    "frequence_enc",
]

X = df[features]
y = df["nb_ventes"]

# ─────────────────────────────────────────────
# 4. Split train / test
# ─────────────────────────────────────────────
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)

# ─────────────────────────────────────────────
# 5. Entraîner le Random Forest
# ─────────────────────────────────────────────
model = RandomForestRegressor(
    n_estimators=200,
    max_depth=10,
    random_state=42,
    n_jobs=-1
)
model.fit(X_train, y_train)

# ─────────────────────────────────────────────
# 6. Évaluation
# ─────────────────────────────────────────────
y_pred = model.predict(X_test)
mae    = mean_absolute_error(y_test, y_pred)
r2     = r2_score(y_test, y_pred)

print(f"📊 Performance du modèle :")
print(f"   MAE (erreur moyenne) : {mae:.2f} ventes")
print(f"   R² Score             : {r2:.4f} (1.0 = parfait)\n")

# ─────────────────────────────────────────────
# 7. Feature importance
# ─────────────────────────────────────────────
importances = pd.Series(model.feature_importances_, index=features)
importances = importances.sort_values(ascending=False)
print("🔍 Importance des variables :")
for feat, imp in importances.items():
    bar = "█" * int(imp * 50)
    print(f"   {feat:<20} {bar} {imp:.3f}")
print()

# ─────────────────────────────────────────────
# 8. Prédictions pour 2026
# ─────────────────────────────────────────────
abonnements_ref = df.drop_duplicates("abonnement_id")[[
    "abonnement_id", "nom", "categorie", "tier", "frequence",
    "prix", "a_promo", "taux_conversion", "economie_pct",
    "categorie_enc", "tier_enc", "frequence_enc"
]].copy()

rows_2026 = []
for mois in range(1, 13):
    for _, abo in abonnements_ref.iterrows():
        rows_2026.append({
            "abonnement_id" : abo["abonnement_id"],
            "nom"           : abo["nom"],
            "categorie"     : abo["categorie"],
            "tier"          : abo["tier"],
            "frequence"     : abo["frequence"],
            "prix"          : abo["prix"],
            "a_promo"       : abo["a_promo"],
            "numero_mois"   : mois,
            "annee"         : 2026,
            "taux_conversion": abo["taux_conversion"],
            "economie_pct"  : abo["economie_pct"],
            "categorie_enc" : abo["categorie_enc"],
            "tier_enc"      : abo["tier_enc"],
            "frequence_enc" : abo["frequence_enc"],
            "mois"          : f"2026-{mois:02d}",
        })

df_2026 = pd.DataFrame(rows_2026)
X_2026  = df_2026[features]

df_2026["nb_ventes_predit"] = model.predict(X_2026).round().astype(int)
df_2026["nb_ventes_predit"] = df_2026["nb_ventes_predit"].clip(lower=0)

# ─────────────────────────────────────────────
# 9. Résumé annuel 2026
# ─────────────────────────────────────────────
resume = df_2026.groupby(["abonnement_id", "nom", "categorie", "tier", "prix"])[
    "nb_ventes_predit"
].sum().reset_index()
resume = resume.sort_values("nb_ventes_predit", ascending=False)
resume["rang"] = range(1, len(resume) + 1)

print("🏆 Prédictions ventes 2026 (total annuel) :")
print(f"{'Rang':<5} {'Abonnement':<25} {'Catégorie':<15} {'Tier':<10} {'Prix':>8} {'Ventes':>8}")
print("-" * 75)
for _, row in resume.iterrows():
    medal = "🥇" if row["rang"] == 1 else ("🥈" if row["rang"] == 2 else ("🥉" if row["rang"] == 3 else "  "))
    print(f"{medal} {int(row['rang']):<4} {row['nom']:<25} {row['categorie']:<15} {row['tier']:<10} {row['prix']:>7.2f} {int(row['nb_ventes_predit']):>8}")

# ─────────────────────────────────────────────
# 10. Sauvegarder
# ─────────────────────────────────────────────
# Modèle
with open("model.pkl", "wb") as f:
    pickle.dump({
        "model"       : model,
        "le_categorie": le_categorie,
        "le_tier"     : le_tier,
        "le_frequence": le_frequence,
        "features"    : features,
    }, f)

# Prédictions mensuelles complètes
df_2026.to_csv("predictions_2026.csv", index=False)

# Résumé annuel
resume.to_csv("resume_2026.csv", index=False)

print(f"\n✅ Modèle sauvegardé     : model.pkl")
print(f"✅ Prédictions sauvegardées : predictions_2026.csv")
print(f"✅ Résumé annuel sauvegardé : resume_2026.csv")
