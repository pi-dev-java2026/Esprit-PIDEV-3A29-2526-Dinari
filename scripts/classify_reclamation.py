#!/usr/bin/env python3
"""
classify_reclamation.py
=======================
Modèle ML de classification de réclamations.

Usage:
    python classify_reclamation.py "mon virement n'est pas arrivé"

Sortie JSON:
    {"type": "Paiement", "confidence": 0.92, "all_scores": {"Paiement": 0.92, ...}}

Types supportés:
    Paiement, Technique, Compte, Service, Livraison
"""

import sys
import json
import warnings
warnings.filterwarnings("ignore")

# ─────────────────────────────────────────────────────────────────────────────
# Données d'entraînement synthétiques
# ─────────────────────────────────────────────────────────────────────────────
TRAINING_DATA = [
    # ── Paiement ────────────────────────────────────────────────────────────
    ("mon virement n'est pas arrivé", "Paiement"),
    ("le prélèvement a été effectué deux fois", "Paiement"),
    ("problème de paiement sur ma commande", "Paiement"),
    ("je n'arrive pas à payer en ligne", "Paiement"),
    ("remboursement non reçu", "Paiement"),
    ("erreur lors du paiement par carte bancaire", "Paiement"),
    ("transaction refusée sans raison", "Paiement"),
    ("double débit sur mon compte", "Paiement"),
    ("montant incorrect prélevé", "Paiement"),
    ("facture incorrecte", "Paiement"),
    ("paiement bloqué", "Paiement"),
    ("virement rejeté par la banque", "Paiement"),
    ("je n'ai pas reçu mon remboursement après annulation", "Paiement"),
    ("frais bancaires non autorisés", "Paiement"),
    ("le paiement ne passe pas", "Paiement"),
    ("erreur de facturation", "Paiement"),
    ("débit non autorisé", "Paiement"),
    ("mon compte a été débité sans confirmation", "Paiement"),
    ("impossible de finaliser le paiement", "Paiement"),
    ("reçu un email de confirmation mais argent non retiré", "Paiement"),

    # ── Technique ────────────────────────────────────────────────────────────
    ("le site web ne charge pas", "Technique"),
    ("erreur 500 sur la page d'accueil", "Technique"),
    ("l'application plante au démarrage", "Technique"),
    ("bug sur le formulaire de connexion", "Technique"),
    ("problème technique avec la plateforme", "Technique"),
    ("le bouton ne répond pas", "Technique"),
    ("page blanche après connexion", "Technique"),
    ("impossible de télécharger mon document", "Technique"),
    ("l'application est très lente", "Technique"),
    ("erreur lors du chargement de la page", "Technique"),
    ("le site est inaccessible", "Technique"),
    ("dysfonctionnement de l'interface", "Technique"),
    ("problème d'affichage sur mobile", "Technique"),
    ("le mot de passe ne s'enregistre pas", "Technique"),
    ("erreur 404 sur une page existante", "Technique"),
    ("notification ne fonctionne pas", "Technique"),
    ("le chatbot ne répond plus", "Technique"),
    ("problème de chargement des images", "Technique"),
    ("bug dans le formulaire", "Technique"),
    ("crash de l'application mobile", "Technique"),

    # ── Compte ───────────────────────────────────────────────────────────────
    ("je ne peux pas accéder à mon compte", "Compte"),
    ("mon mot de passe a été changé sans mon accord", "Compte"),
    ("compte suspendu sans raison", "Compte"),
    ("je ne reçois pas l'email de réinitialisation", "Compte"),
    ("problème de connexion à mon compte", "Compte"),
    ("mon profil a été modifié sans mon autorisation", "Compte"),
    ("suppression de compte demandée", "Compte"),
    ("espace personnel inaccessible", "Compte"),
    ("données personnelles incorrectes", "Compte"),
    ("impossible de changer mon adresse email", "Compte"),
    ("mon compte a été piraté", "Compte"),
    ("accès refusé à mon espace client", "Compte"),
    ("je voudrais fermer mon compte", "Compte"),
    ("mon numéro de téléphone ne s'enregistre pas", "Compte"),
    ("problème de vérification d'identité", "Compte"),
    ("le code de validation ne fonctionne pas", "Compte"),
    ("authentification à deux facteurs bloquée", "Compte"),
    ("profil non mis à jour", "Compte"),
    ("photo de profil ne s'affiche pas", "Compte"),
    ("informations de compte incorrectes", "Compte"),

    # ── Service ──────────────────────────────────────────────────────────────
    ("service client non réactif", "Service"),
    ("absence de réponse à ma demande", "Service"),
    ("délai de traitement trop long", "Service"),
    ("qualité du service médiocre", "Service"),
    ("conseiller peu professionnel", "Service"),
    ("ma demande n'a pas été prise en compte", "Service"),
    ("manque d'information sur ma demande", "Service"),
    ("service après-vente inexistant", "Service"),
    ("support téléphonique injoignable", "Service"),
    ("réponse insatisfaisante du service client", "Service"),
    ("temps d'attente excessif", "Service"),
    ("promesse non tenue par l'équipe", "Service"),
    ("traitement inadéquat de ma réclamation", "Service"),
    ("interlocuteur mal informé", "Service"),
    ("service de mauvaise qualité", "Service"),
    ("suivi de dossier inexistant", "Service"),
    ("absence de rappel comme promis", "Service"),
    ("informations contradictoires reçues", "Service"),
    ("service client ferme avant l'heure", "Service"),
    ("aucun suivi après ma réclamation", "Service"),

    # ── Livraison ────────────────────────────────────────────────────────────
    ("ma commande n'est pas arrivée", "Livraison"),
    ("colis endommagé à la réception", "Livraison"),
    ("livraison en retard", "Livraison"),
    ("article manquant dans le colis", "Livraison"),
    ("mauvaise adresse de livraison", "Livraison"),
    ("colis perdu", "Livraison"),
    ("numéro de suivi ne fonctionne pas", "Livraison"),
    ("commande annulée mais non remboursée", "Livraison"),
    ("produit reçu ne correspond pas à la commande", "Livraison"),
    ("livraison non effectuée malgré confirmation", "Livraison"),
    ("colis laissé sans signature", "Livraison"),
    ("retard de livraison sans explication", "Livraison"),
    ("destinataire absent non contacté", "Livraison"),
    ("colis retourné par erreur", "Livraison"),
    ("délai de livraison dépassé", "Livraison"),
    ("produit abîmé lors du transport", "Livraison"),
    ("livraison à la mauvaise personne", "Livraison"),
    ("point relais introuvable", "Livraison"),
    ("colis bloqué en transit", "Livraison"),
    ("commande incomplète reçue", "Livraison"),
]


def build_and_train():
    """Construit et entraîne le modèle TF-IDF + LogisticRegression."""
    try:
        from sklearn.pipeline import Pipeline
        from sklearn.feature_extraction.text import TfidfVectorizer
        from sklearn.linear_model import LogisticRegression
    except ImportError:
        return None, "scikit-learn non installé. Lancez : pip install scikit-learn"

    texts  = [t for t, _ in TRAINING_DATA]
    labels = [l for _, l in TRAINING_DATA]

    pipeline = Pipeline([
        ("tfidf", TfidfVectorizer(
            ngram_range=(1, 2),
            min_df=1,
            max_df=0.95,
            analyzer="word",
            strip_accents="unicode",
        )),
        ("clf", LogisticRegression(
            max_iter=1000,
            C=2.0,
            solver="lbfgs",
            multi_class="auto",
        )),
    ])

    pipeline.fit(texts, labels)
    return pipeline, None


def classify(text: str) -> dict:
    """Classifie un texte et retourne le type prédit + scores."""
    model, error = build_and_train()

    if model is None:
        return {"type": "Inconnu", "confidence": 0.0, "error": error, "all_scores": {}}

    classes = model.classes_.tolist()
    proba   = model.predict_proba([text])[0]

    predicted_type = classes[proba.argmax()]
    confidence     = round(float(proba.max()), 4)
    all_scores     = {cls: round(float(p), 4) for cls, p in zip(classes, proba)}

    return {
        "type":       predicted_type,
        "confidence": confidence,
        "all_scores": all_scores,
    }


def main():
    if len(sys.argv) < 2:
        print(json.dumps({
            "type": "Inconnu",
            "confidence": 0.0,
            "error": "Aucun texte fourni. Usage : python classify_reclamation.py \"votre texte\"",
            "all_scores": {}
        }))
        sys.exit(1)

    input_text = " ".join(sys.argv[1:]).strip()

    if not input_text:
        print(json.dumps({
            "type": "Inconnu",
            "confidence": 0.0,
            "error": "Texte vide.",
            "all_scores": {}
        }))
        sys.exit(1)

    result = classify(input_text)
    print(json.dumps(result, ensure_ascii=False))
    sys.exit(0)


if __name__ == "__main__":
    main()
