from flask import Flask, request, jsonify
import joblib
import pandas as pd
import os
import train # Import the train_models function from train.py

app = Flask(__name__)

MODEL_PATH = 'model.pkl'
NLP_MODEL_PATH = 'nlp_model.pkl'

# Predefined professional responses
RESPONSE_TEMPLATES = {
    "Paiement": "Nous avons bien reçu votre demande concernant votre paiement. Notre équipe va vérifier la transaction et revenir vers vous dans les plus brefs délais.",
    "Technique": "Nous sommes désolés pour le problème technique rencontré. Notre équipe technique va analyser la situation et vous apporter une solution rapidement.",
    "Livraison": "Nous avons bien pris en compte votre problème de livraison. Une vérification est en cours auprès du service logistique.",
    "Service": "Merci de nous avoir contactés concernant notre service. Votre satisfaction est notre priorité, un expert va prendre en charge votre demande sous peu."
}

@app.route('/train', methods=['POST'])
def train_endpoint():
    try:
        results = train.train_models()
        return jsonify({
            'status': 'success',
            'message': 'Model trained successfully.',
            'metrics': results
        }), 200
    except Exception as e:
        return jsonify({'status': 'error', 'message': str(e)}), 500

@app.route('/predict', methods=['POST'])
def predict_endpoint():
    data = request.json
    
    # Required keys mapping: type, agent_id, priorite
    if not data or not all(k in data for k in ('type', 'agent_id', 'priorite')):
         return jsonify({'status': 'error', 'message': 'Missing required parameters. Need type, agent_id, priorite'}), 400
         
    if not os.path.exists(MODEL_PATH):
        return jsonify({'status': 'error', 'message': 'Model not trained yet. Call /train first.'}), 400
        
    try:
        # Load models and encoders
        payload = joblib.load(MODEL_PATH)
        model = payload['model']
        le_type = payload['le_type']
        le_priorite = payload['le_priorite']
        
        # Preprocess input
        # Note: If the incoming type or priorite is unseen, LabelEncoder will throw ValueError
        type_encoded = le_type.transform([data['type']])[0]
        priorite_encoded = le_priorite.transform([data['priorite']])[0]
        
        # Create DataFrame for prediction to retain feature names if required by specific scikit versions
        input_data = pd.DataFrame([{
            'type_encoded': type_encoded,
            'agent_id': int(data['agent_id']),
            'priorite_encoded': priorite_encoded
        }])
        
        # Predict
        prediction = model.predict(input_data)[0]
        
        return jsonify({
            'estimated_resolution_time': float(prediction)
        }), 200
        
    except ValueError as e:
         return jsonify({'status': 'error', 'message': f'Invalid categorical value provided: {e}'}), 400
    except Exception as e:
         return jsonify({'status': 'error', 'message': str(e)}), 500

@app.route('/generate-response', methods=['POST'])
def generate_response_endpoint():
    data = request.json
    
    if not data or not all(k in data for k in ('title', 'description')):
        return jsonify({'status': 'error', 'message': 'Missing required fields: title, description'}), 400
        
    if not os.path.exists(NLP_MODEL_PATH):
        return jsonify({'status': 'error', 'message': 'NLP model not trained yet. Run nlp_train.py first.'}), 400
        
    try:
        nlp_pipeline = joblib.load(NLP_MODEL_PATH)
        
        # Combine text for analysis
        combined_text = f"{data['title']} {data['description']}"
        
        # Predict category and confidence
        predicted_category = nlp_pipeline.predict([combined_text])[0]
        probabilities = nlp_pipeline.predict_proba([combined_text])[0]
        confidence = float(max(probabilities))
        
        # Get suggested template
        suggested_response = RESPONSE_TEMPLATES.get(
            predicted_category, 
            "Nous traitons votre demande et reviendrons vers vous rapidement."
        )
        
        return jsonify({
            'category': predicted_category,
            'confidence': confidence,
            'suggested_response': suggested_response
        }), 200
        
    except Exception as e:
        return jsonify({'status': 'error', 'message': str(e)}), 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
