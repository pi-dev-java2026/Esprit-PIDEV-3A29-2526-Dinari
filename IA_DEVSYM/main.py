import mysql.connector
import pandas as pd
import random

from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import IsolationForest
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart


def send_email(report_text):
    sender_email = "souhajjri1998@gmail.com"
    receiver_email = "souhailhajry@gmail.com"
    app_password = "jahb trzj joxq cwxk"  # 🔴 ici

    subject = "📊 Rapport AI Budget Mensuel"

    # 🔹 Construire le message
    message = MIMEMultipart()
    message["From"] = sender_email
    message["To"] = receiver_email
    message["Subject"] = subject

    message.attach(MIMEText(report_text, "plain"))

    try:
        # 🔹 Connexion serveur Gmail
        server = smtplib.SMTP("smtp.gmail.com", 587)
        server.starttls()
        server.login(sender_email, app_password)

        # 🔹 Envoi
        server.send_message(message)
        server.quit()

        print("✅ Email envoyé avec succès !")

    except Exception as e:
        print("❌ Erreur envoi email :", e)

# ==============================
# 🔹 CONFIGURATION DB
# ==============================
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="pidevsym"  # 🔴 CHANGE ICI
)

mois = 1
annee = 2026


# ==============================
# 🔹 RÉCUPÉRATION DONNÉES
# ==============================
query_depenses = f"""
SELECT d.montant, d.categorie_id
FROM depense d
WHERE MONTH(d.date_depense) = {mois}
AND YEAR(d.date_depense) = {annee}
"""

df = pd.read_sql(query_depenses, conn)

if df.empty:
    print("❌ Aucune dépense ce mois.")
    exit()

# 🔹 Budget
query_budget = f"""
SELECT montant_limite 
FROM budget 
WHERE mois = {mois} AND annee = {annee}
LIMIT 1
"""

budget_df = pd.read_sql(query_budget, conn)

if budget_df.empty:
    print("❌ Aucun budget trouvé.")
    exit()

budget = float(budget_df['montant_limite'][0])

# ==============================
# 🔹 CALCULS
# ==============================
total_depense = df['montant'].sum()
nb_depenses = len(df)
ratio = total_depense / budget

# 🔹 Catégorie dominante
query_cat = f"""
SELECT c.label, SUM(d.montant) as total
FROM depense d
JOIN categorie c ON d.categorie_id = c.id
WHERE MONTH(d.date_depense) = {mois}
AND YEAR(d.date_depense) = {annee}
GROUP BY c.id
ORDER BY total DESC
LIMIT 1
"""

cat_data = pd.read_sql(query_cat, conn)

cat_name = cat_data['label'][0]
cat_value = cat_data['total'][0]
cat_percent = (cat_value / total_depense) * 100

# ==============================
# 🔹 COMPARAISON MOIS PRÉCÉDENT
# ==============================
prev_month = mois - 1 if mois > 1 else 12
prev_year = annee if mois > 1 else annee - 1

query_prev = f"""
SELECT SUM(montant) as total
FROM depense
WHERE MONTH(date_depense) = {prev_month}
AND YEAR(date_depense) = {prev_year}
"""

prev_data = pd.read_sql(query_prev, conn)
prev_total = prev_data['total'][0] if prev_data['total'][0] else 0

evolution = 0
if prev_total > 0:
    evolution = ((total_depense - prev_total) / prev_total) * 100

# ==============================
# 🔹 SCORE FINANCIER
# ==============================
def calculate_score(ratio, cat_percent):
    score = 100

    if ratio > 1:
        score -= (ratio - 1) * 50

    if cat_percent > 40:
        score -= (cat_percent - 40)

    return max(0, round(score, 2))

score = calculate_score(ratio, cat_percent)

# ==============================
# 🔹 AI MODEL (Classification)
# ==============================
X_train = [
    [0.5, 0.3, 10],
    [0.8, 0.4, 20],
    [1.2, 0.6, 50],
    [1.5, 0.7, 80]
]

y_train = [0, 1, 2, 2]

model = DecisionTreeClassifier()
model.fit(X_train, y_train)

prediction = model.predict([[ratio, cat_percent/100, nb_depenses]])[0]

# ==============================
# 🔹 DÉTECTION D’ANOMALIES
# ==============================
model_anomaly = IsolationForest(contamination=0.1)

df_anomaly = df[['montant']]
model_anomaly.fit(df_anomaly)

df['anomaly'] = model_anomaly.predict(df_anomaly)

anomalies = df[df['anomaly'] == -1]
nb_anomalies = len(anomalies)

# ==============================
# 🔹 GÉNÉRATION TEXTE DYNAMIQUE
# ==============================
def generate_report():
    phrases = []

    intros = [
        "📊 Analyse intelligente de votre budget :",
        "💰 Rapport financier automatisé :",
        "📈 Synthèse de vos dépenses mensuelles :"
    ]
    phrases.append(random.choice(intros))

    # Budget
    if ratio < 0.8:
        phrases.append(f"✅ Bonne gestion : {total_depense:.2f} DT dépensés sur {budget:.2f} DT.")
    elif ratio <= 1:
        phrases.append(f"⚠️ Vous approchez de la limite : {total_depense:.2f}/{budget:.2f} DT.")
    else:
        dep = (ratio - 1) * 100
        phrases.append(f"❌ Dépassement de {dep:.2f}% de votre budget.")

    # Catégorie
    phrases.append(f"📌 '{cat_name}' représente {cat_percent:.2f}% de vos dépenses.")

    # AI
    if prediction == 0:
        phrases.append("👍 Situation financière stable.")
    elif prediction == 1:
        phrases.append("⚠️ Risque de dérive budgétaire détecté.")
    else:
        phrases.append("🚨 Situation critique identifiée.")

    # Évolution
    if prev_total > 0:
        if evolution > 10:
            phrases.append("📈 Forte augmentation des dépenses par rapport au mois précédent.")
        elif evolution < -10:
            phrases.append("📉 Bonne amélioration par rapport au mois précédent.")

    # Anomalies
    if nb_anomalies > 0:
        phrases.append(f"⚠️ {nb_anomalies} dépense(s) inhabituelle(s) détectée(s).")

    # Conseil
    if ratio > 1:
        phrases.append("💡 Réduisez immédiatement les dépenses non essentielles.")
    elif cat_percent > 40:
        phrases.append(f"💡 Diminuez les dépenses dans '{cat_name}'.")
    else:
        phrases.append("💡 Continuez votre bonne gestion.")

    # Score
    phrases.append(f"🎯 Score financier : {score}/100")

    conclusions = [
        "📊 Continuez à suivre vos finances régulièrement.",
        "📉 Une meilleure planification est recommandée.",
        "🎯 Vous progressez vers une meilleure gestion financière."
    ]
    phrases.append(random.choice(conclusions))

    return "\n".join(phrases)

# ==============================
# 🔹 AFFICHAGE FINAL
# ==============================
print("\n==============================")
print("🤖 RAPPORT AI AVANCÉ")
print("==============================\n")

print(f"Total dépenses : {total_depense:.2f} DT")
print(f"Budget : {budget:.2f} DT")
print(f"Nombre de dépenses : {nb_depenses}")
print(f"Ratio : {ratio:.2f}")
print(f"Score : {score}/100")

if prev_total > 0:
    print(f"Évolution : {evolution:.2f}%")

print(f"Anomalies détectées : {nb_anomalies}")

print("\n------------------------------\n")

report = generate_report()
print(report)

send_email(report)

print("\n==============================")

# ==============================
# 🔹 FERMER CONNEXION
# ==============================
conn.close()



