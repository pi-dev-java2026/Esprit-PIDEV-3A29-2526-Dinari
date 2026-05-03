"""
Dinari — Génération du fake dataset
Simule 2 ans d'historique de ventes (2024 → 2025)
"""

import pandas as pd
import numpy as np
import random
from datetime import datetime, timedelta

random.seed(42)
np.random.seed(42)

# ─────────────────────────────────────────────
# 1. Tes vrais abonnements (basés sur ta DB)
# ─────────────────────────────────────────────
abonnements = [
    {"id": 1,  "nom": "Spotify Personal",   "categorie": "musique",       "tier": "Normal",   "prix": 9.99,  "frequence": "mensuel",    "a_promo": 1},
    {"id": 2,  "nom": "Spotify Famille",    "categorie": "musique",       "tier": "Gold",     "prix": 16.99, "frequence": "mensuel",    "a_promo": 1},
    {"id": 3,  "nom": "Netflix Standard",   "categorie": "streaming",     "tier": "Silver",   "prix": 14.99, "frequence": "mensuel",    "a_promo": 0},
    {"id": 4,  "nom": "Netflix Premium",    "categorie": "streaming",     "tier": "Gold",     "prix": 19.99, "frequence": "mensuel",    "a_promo": 0},
    {"id": 5,  "nom": "Office 365 Solo",    "categorie": "productivite",  "tier": "Normal",   "prix": 12.99, "frequence": "mensuel",    "a_promo": 0},
    {"id": 6,  "nom": "Office 365 Famille", "categorie": "productivite",  "tier": "Gold",     "prix": 22.99, "frequence": "mensuel",    "a_promo": 1},
    {"id": 7,  "nom": "Xbox Game Pass",     "categorie": "gaming",        "tier": "Silver",   "prix": 11.99, "frequence": "mensuel",    "a_promo": 1},
    {"id": 8,  "nom": "Coursera Plus",      "categorie": "education",     "tier": "Platinum", "prix": 49.99, "frequence": "annuel",     "a_promo": 1},
    {"id": 9,  "nom": "NordVPN",            "categorie": "securite",      "tier": "Normal",   "prix": 7.99,  "frequence": "mensuel",    "a_promo": 1},
    {"id": 10, "nom": "Adobe Creative",     "categorie": "productivite",  "tier": "Platinum", "prix": 54.99, "frequence": "mensuel",    "a_promo": 0},
    {"id": 11, "nom": "Disney+",            "categorie": "streaming",     "tier": "Normal",   "prix": 8.99,  "frequence": "mensuel",    "a_promo": 0},
    {"id": 12, "nom": "Duolingo Plus",      "categorie": "education",     "tier": "Normal",   "prix": 6.99,  "frequence": "mensuel",    "a_promo": 1},
    {"id": 13, "nom": "YouTube Premium",    "categorie": "streaming",     "tier": "Silver",   "prix": 13.99, "frequence": "mensuel",    "a_promo": 0},
]

# ─────────────────────────────────────────────
# 2. Popularité de base (réaliste)
# ─────────────────────────────────────────────
# Chaque abo a un "score de base" de ventes mensuelles
popularite_base = {
    1:  12,   # Spotify Personal  → très populaire
    2:  7,    # Spotify Famille
    3:  10,   # Netflix Standard
    4:  6,    # Netflix Premium
    5:  5,    # Office 365 Solo
    6:  4,    # Office 365 Famille
    7:  8,    # Xbox Game Pass
    8:  2,    # Coursera (cher + annuel)
    9:  9,    # NordVPN (petit prix)
    10: 2,    # Adobe (très cher)
    11: 7,    # Disney+
    12: 10,   # Duolingo (petit prix)
    13: 6,    # YouTube Premium
}

# ─────────────────────────────────────────────
# 3. Saisonnalité mensuelle (mois 1-12)
# ─────────────────────────────────────────────
saisonnalite = {
    1:  1.3,   # Janvier  → bonnes résolutions
    2:  1.0,
    3:  1.1,
    4:  1.0,
    5:  0.9,
    6:  1.1,   # Été → streaming monte
    7:  1.2,
    8:  1.2,
    9:  1.1,   # Rentrée → éducation monte
    10: 1.0,
    11: 1.3,   # Black Friday
    12: 1.5,   # Décembre → cadeaux
}

# ─────────────────────────────────────────────
# 4. Génération des lignes
# ─────────────────────────────────────────────
rows = []

# Période : janvier 2024 → décembre 2025
mois_list = pd.date_range(start="2024-01-01", end="2025-12-01", freq="MS")

for mois in mois_list:
    for abo in abonnements:
        base        = popularite_base[abo["id"]]
        saison      = saisonnalite[mois.month]
        boost_promo = 1.25 if abo["a_promo"] else 1.0
        boost_prix  = 1.15 if abo["prix"] < 10 else (0.85 if abo["prix"] > 30 else 1.0)

        # Ventes simulées avec bruit aléatoire
        ventes_float = base * saison * boost_promo * boost_prix
        ventes       = max(0, int(np.random.poisson(ventes_float)))

        # Taux de conversion (tentatives → achats)
        tentatives      = ventes + random.randint(1, 5)
        taux_conversion = round(ventes / tentatives, 2) if tentatives > 0 else 0

        # Économie vs marché
        prix_marche   = round(abo["prix"] * random.uniform(1.1, 1.3), 2)
        economie_pct  = round((prix_marche - abo["prix"]) / prix_marche * 100, 1)

        rows.append({
            "abonnement_id"   : abo["id"],
            "nom"             : abo["nom"],
            "categorie"       : abo["categorie"],
            "tier"            : abo["tier"],
            "prix"            : abo["prix"],
            "frequence"       : abo["frequence"],
            "a_promo"         : abo["a_promo"],
            "mois"            : mois.strftime("%Y-%m"),
            "annee"           : mois.year,
            "numero_mois"     : mois.month,
            "nb_ventes"       : ventes,
            "tentatives"      : tentatives,
            "taux_conversion" : taux_conversion,
            "prix_marche"     : prix_marche,
            "economie_pct"    : economie_pct,
        })

df = pd.DataFrame(rows)

# ─────────────────────────────────────────────
# 5. Sauvegarde
# ─────────────────────────────────────────────
df.to_csv("dataset_dinari.csv", index=False)

print(f"✅ Dataset généré : {len(df)} lignes")
print(f"   Période : 2024-01 → 2025-12")
print(f"   Abonnements : {df['nom'].nunique()}")
print(f"\n📊 Aperçu des ventes totales par abonnement :")
print(df.groupby("nom")["nb_ventes"].sum().sort_values(ascending=False).to_string())
print(f"\n🗂️  Fichier sauvegardé : dataset_dinari.csv")
