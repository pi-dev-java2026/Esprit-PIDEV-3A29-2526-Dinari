import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart


def send_email(report_text, total, budget, ratio, score, evolution, anomalies,mois,annee):

    sender = "manelallagui14@gmail.com"
    receiver = "manelallagui14@gmail.com"
    app_password = "mkru diyi sxtl rgqh"

    # 🔥 Mois en français
    mois_fr = ["Janvier","Février","Mars","Avril","Mai","Juin",
               "Juillet","Août","Septembre","Octobre","Novembre","Décembre"]

    mois_nom = mois_fr[mois-1]

    subject = f"📊 Rapport AI - {mois_nom} {annee}"

    # =========================
    # HTML EMAIL
    # =========================
    html_content = f"""
    <html>
    <body style="font-family: Arial;">

        <h2>📊 Rapport Financier Intelligent</h2>

        <hr>

        <h3>💰 Résumé global</h3>
        <ul>
            <li><b>Total dépenses :</b> {total:.2f} DT</li>
            <li><b>Budget :</b> {budget:.2f} DT</li>
            <li><b>Ratio :</b> {ratio:.2f}</li>
            <li><b>Score financier :</b> {score}/100</li>
        </ul>

        <h3>📈 Analyse</h3>
        <ul>
            <li><b>Évolution mensuelle :</b> {evolution:.2f}%</li>
            <li><b>Anomalies détectées :</b> {anomalies}</li>
        </ul>

        <h3>🤖 Rapport AI</h3>
        <pre style="background:#f4f4f4;padding:10px;border-radius:5px;">
{report_text}
        </pre>

        <hr>
        <p style="color:gray;">
        Généré automatiquement par votre système AI de gestion budgétaire.
        </p>

    </body>
    </html>
    """

    msg = MIMEMultipart()
    msg["From"] = sender
    msg["To"] = receiver
    msg["Subject"] = subject

    msg.attach(MIMEText(html_content, "html"))

    try:
        # =========================
        # SMTP CONNECTION SAFE
        # =========================
        server = smtplib.SMTP("smtp.gmail.com", 587, timeout=30)
        server.ehlo()
        server.starttls()
        server.ehlo()

        server.login(sender, app_password)
        server.send_message(msg)
        server.quit()

        print("✅ Email détaillé envoyé avec succès")

    except Exception as e:
        print("❌ Erreur envoi email :", str(e))