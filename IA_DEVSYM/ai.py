import pandas as pd
import random
import mysql.connector
import numpy as np

from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import IsolationForest


# =========================
# DB HELPERS
# =========================
def get_category_name(cat_id):
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="pidevsym"
    )

    cursor = conn.cursor()

    cat_id = int(cat_id)

    cursor.execute(
        "SELECT label FROM categorie WHERE id = %s",
        (cat_id,)
    )

    result = cursor.fetchone()
    conn.close()

    return result[0] if result else "Unknown"


# =========================
# SCORE
# =========================
def calculate_score(ratio, cat_percent):
    score = 100

    if ratio > 1:
        score -= (ratio - 1) * 50

    if cat_percent > 40:
        score -= (cat_percent - 40)

    return max(0, round(score, 2))


# =========================
# ML TRAINING (CORRIGÉ)
# =========================
def train_model():
    X = []
    y = []

    for _ in range(200):

        ratio = np.random.uniform(0, 1.5)
        cat_percent = np.random.uniform(0, 1)
        nb_depenses = np.random.randint(1, 60)

        # logique métier pour labels
        if ratio > 1:
            label = 2  # critique
        elif ratio > 0.8 or cat_percent > 0.6:
            label = 1  # warning
        else:
            label = 0  # ok

        X.append([ratio, cat_percent, nb_depenses])
        y.append(label)

    model = DecisionTreeClassifier()
    model.fit(X, y)

    return model


# =========================
# REPORT GENERATION
# =========================
def generate_report(total, budget, ratio, cat_name, cat_percent,
                    prediction, evolution, anomalies, score):

    lines = []

    lines.append(random.choice([
        "📊 Rapport financier automatique",
        "📈 Analyse intelligente de vos dépenses",
        "💰 Synthèse mensuelle du budget"
    ]))

    # Budget status
    if ratio > 1:
        lines.append(f"❌ Dépassement du budget ({total:.2f} / {budget:.2f})")
    elif ratio > 0.8:
        lines.append(f"⚠️ Budget proche de la limite ({total:.2f} / {budget:.2f})")
    else:
        lines.append(f"✔️ Budget bien respecté ({total:.2f} / {budget:.2f})")

    # Catégorie
    lines.append(f"📌 Catégorie principale : {cat_name} ({cat_percent:.2f}%)")

    # AI prediction
    if prediction == 2:
        lines.append("🚨 Situation critique détectée")
    elif prediction == 1:
        lines.append("⚠️ Risque de dérive budgétaire")
    else:
        lines.append("👍 Situation financière stable")

    # Evolution
    if evolution > 10:
        lines.append(f"📈 Forte augmentation des dépenses (+{evolution:.2f}%)")
    elif evolution < -10:
        lines.append(f"📉 Bonne réduction des dépenses ({evolution:.2f}%)")

    # Anomalies
    if anomalies > 0:
        lines.append(f"⚠️ {anomalies} dépenses anormales détectées")

    # Conseil
    if ratio > 1:
        lines.append("💡 Réduisez immédiatement les dépenses non essentielles")
    elif cat_percent > 40:
        lines.append(f"💡 Attention aux dépenses élevées en '{cat_name}'")
    else:
        lines.append("💡 Bonne gestion globale, continuez ainsi")

    # Score
    lines.append(f"🎯 Score financier : {score}/100")

    return "\n".join(lines)


# =========================
# MAIN AI FUNCTION
# =========================
def run_ai(df, budget, prev_total):

    # total
    total = df['montant'].sum()
    ratio = total / budget
    nb_depenses = len(df)

    # catégorie dominante
    cat_group = df.groupby('categorie_id')['montant'].sum()
    max_cat_id = cat_group.idxmax()

    cat_name = get_category_name(max_cat_id)

    cat_value = cat_group.max()
    cat_percent = (cat_value / total) * 100

    # =========================
    # MACHINE LEARNING (FIXED)
    # =========================
    model = train_model()

    prediction = model.predict([
        [ratio, cat_percent / 100, nb_depenses]
    ])[0]

    # =========================
    # EVOLUTION
    # =========================
    evolution = 0
    if prev_total > 0:
        evolution = ((total - prev_total) / prev_total) * 100

    # =========================
    # ANOMALIES
    # =========================
    iso = IsolationForest(contamination=0.1)

    iso.fit(df[['montant']])
    df['anom'] = iso.predict(df[['montant']])

    anomalies = len(df[df['anom'] == -1])

    # =========================
    # SCORE
    # =========================
    score = calculate_score(ratio, cat_percent)

    # =========================
    # REPORT
    # =========================
    report = generate_report(
        total,
        budget,
        ratio,
        cat_name,
        cat_percent,
        prediction,
        evolution,
        anomalies,
        score
    )

    # =========================
    # RETURN
    # =========================
    return {
        "total": total,
        "budget": budget,
        "ratio": ratio,
        "cat_name": cat_name,
        "cat_percent": cat_percent,
        "prediction": prediction,
        "evolution": evolution,
        "anomalies": anomalies,
        "score": score,
        "report": report
    }