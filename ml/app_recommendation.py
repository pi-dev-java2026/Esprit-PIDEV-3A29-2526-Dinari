from flask import Flask, request, jsonify
from flask_cors import CORS
import numpy as np
import joblib
import os
from train_model_reco import train_and_save

app = Flask(__name__)
CORS(app)

MODEL_PATH = "recommendation_model.pkl"

# Charger ou entraîner le modèle au démarrage
if not os.path.exists(MODEL_PATH):
    print("🔧 Modèle non trouvé. Entraînement en cours...")
    train_and_save(MODEL_PATH)

model_data = joblib.load(MODEL_PATH)
clf = model_data["model"]
label_encoder = model_data["label_encoder"]
scaler = model_data["scaler"]
plan_details = model_data["plan_details"]

print(f"✅ Modèle chargé avec {len(label_encoder.classes_)} abonnements reconnus")

@app.route("/health", methods=["GET"])
def health():
    return jsonify({
        "status": "ok",
        "model": "RandomForest Subscription Recommender",
        "abonnements_disponibles": list(plan_details.keys())
    })

@app.route("/recommend", methods=["POST"])
def recommend():
    """
    Body JSON attendu :
    {
        "budget": 1-4,       // 1=<10DT, 2=10-30DT, 3=30-70DT, 4=>70DT
        "category": 1-4,     // 1=musique, 2=video, 3=pro, 4=gaming
        "frequency": 1-3,    // 1=occasionnel, 2=regulier, 3=quotidien
        "profile": 1-3       // 1=particulier, 2=famille, 3=pro
    }
    """
    try:
        data = request.get_json()
        required = ["budget", "category", "frequency", "profile"]
        
        # Validation des entrées
        for field in required:
            if field not in data:
                return jsonify({"error": f"Champ manquant : {field}"}), 400
        
        # Construction du vecteur de features
        features = np.array([[
            int(data["budget"]),
            int(data["category"]),
            int(data["frequency"]),
            int(data["profile"])
        ]])
        
        # Normalisation
        features_scaled = scaler.transform(features)
        
        # 🔥 PRÉDICTION ML (pas de if/else ici, c'est le vrai modèle)
        probas = clf.predict_proba(features_scaled)[0]
        classes = clf.classes_
        
        # Tri par probabilité décroissante
        ranked = sorted(zip(classes, probas), key=lambda x: x[1], reverse=True)
        
        # Construction des recommandations
        recommendations = []
        for plan_id, score in ranked[:3]:
            plan_name = label_encoder.inverse_transform([plan_id])[0]
            detail = plan_details.get(plan_name, {})
            recommendations.append({
                "plan": plan_name,
                "score": round(float(score) * 100, 1),
                "price": detail.get("price"),
                "features": detail.get("features", []),
                "description": detail.get("description", "")
            })
        
        return jsonify({
            "status": "success",
            "input": data,
            "recommendations": recommendations,
            "best": recommendations[0] if recommendations else None
        })
        
    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route("/retrain", methods=["POST"])
def retrain():
    """Endpoint admin pour ré-entraîner le modèle avec de nouvelles données."""
    try:
        train_and_save(MODEL_PATH)
        global clf, label_encoder, scaler, plan_details
        model_data = joblib.load(MODEL_PATH)
        clf = model_data["model"]
        label_encoder = model_data["label_encoder"]
        scaler = model_data["scaler"]
        plan_details = model_data["plan_details"]
        return jsonify({
            "status": "success",
            "message": "Modèle ré-entraîné avec succès",
            "abonnements": list(plan_details.keys())
        })
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == "__main__":
    print("=" * 55)
    print("  🤖 API RECOMMANDATION DINARI")
    print("  http://localhost:5001")
    print()
    print("  GET  /health")
    print("  POST /recommend")
    print("  POST /retrain")
    print("=" * 55)
    app.run(host="0.0.0.0", port=5001, debug=True)