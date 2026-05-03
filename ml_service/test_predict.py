import requests

def test_api():
    print("Testing ML API...\n")
    
    # Test /train
    print("1. Sending POST request to /train...")
    train_response = requests.post("http://127.0.0.1:5000/train")
    print(f"Status Code: {train_response.status_code}")
    print(f"Response: {train_response.json()}\n")
    
    # Test /predict
    print("2. Sending POST request to /predict...")
    payload = {
        "type": "Paiement",
        "agent_id": 2,
        "priorite": "high"
    }
    print(f"Payload: {payload}")
    
    predict_response = requests.post("http://127.0.0.1:5000/predict", json=payload)
    print(f"Status Code: {predict_response.status_code}")
    print(f"Response: {predict_response.json()}\n")
    
    # Test /generate-response
    print("3. Sending POST request to /generate-response...")
    nlp_payload = {
        "title": "Je veux rembourser mon abonnement",
        "description": "Bonjour, j'ai été débité hier mais je voudrais annuler et demander un remboursement rapide svp."
    }
    print(f"Payload: {nlp_payload}")
    
    nlp_response = requests.post("http://127.0.0.1:5000/generate-response", json=nlp_payload)
    print(f"Status Code: {nlp_response.status_code}")
    print(f"Response: {nlp_response.json()}\n")

if __name__ == '__main__':
    test_api()
