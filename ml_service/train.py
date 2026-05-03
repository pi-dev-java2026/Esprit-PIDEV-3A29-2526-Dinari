import pandas as pd
import numpy as np
import os
import joblib
from datetime import datetime, timedelta
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestRegressor
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_absolute_error, mean_squared_error
from sklearn.preprocessing import LabelEncoder

# Data Config
DATASET_PATH = 'dataset.csv'
MODEL_PATH = 'model.pkl'

def generate_synthetic_data(num_rows=500):
    print(f"Generating synthetic dataset with {num_rows} rows...")
    np.random.seed(42)
    
    types = ['Paiement', 'Technique', 'Livraison', 'Service']
    priorities = ['low', 'medium', 'high']
    
    data = []
    base_date = datetime.now()
    
    for i in range(1, num_rows + 1):
        complaint_type = np.random.choice(types)
        agent_id = np.random.randint(1, 6)
        priorite = np.random.choice(priorities)
        
        # Generation of resolution time logic based on features
        base_hours = {'Paiement': 24, 'Technique': 48, 'Livraison': 72, 'Service': 12}[complaint_type]
        priority_multiplier = {'low': 1.5, 'medium': 1.0, 'high': 0.5}[priorite]
        agent_eff = {1: 0.8, 2: 0.9, 3: 1.0, 4: 1.1, 5: 1.2}[agent_id]
        
        noise = np.random.normal(0, 5) 
        resolution_hours = max(1, (base_hours * priority_multiplier * agent_eff) + noise)
        
        date_creation = base_date - timedelta(days=np.random.randint(1, 30))
        date_resolution = date_creation + timedelta(hours=resolution_hours)
        
        data.append({
            'id': i,
            'type': complaint_type,
            'agent_id': agent_id,
            'date_creation': date_creation.strftime("%Y-%m-%d %H:%M:%S"),
            'date_resolution': date_resolution.strftime("%Y-%m-%d %H:%M:%S"),
            'priorite': priorite
        })
        
    df = pd.DataFrame(data)
    df.to_csv(DATASET_PATH, index=False)
    print(f"Dataset generated at {DATASET_PATH}")
    return df

def train_models():
    # 1. Load or Generate Dataset
    if not os.path.exists(DATASET_PATH):
        df = generate_synthetic_data()
    else:
        df = pd.read_csv(DATASET_PATH)
        print(f"Loaded existing dataset from {DATASET_PATH}")
        
    if len(df) < 500:
       df = generate_synthetic_data(500)
       
    # 2. Data Preprocessing
    df['date_creation'] = pd.to_datetime(df['date_creation'])
    df['date_resolution'] = pd.to_datetime(df['date_resolution'])
    
    # Target value initialization
    df['resolution_time'] = (df['date_resolution'] - df['date_creation']).dt.total_seconds() / 3600.0
    
    # Drop NaNs
    df = df.dropna()
    
    # Encoders
    le_type = LabelEncoder()
    le_priorite = LabelEncoder()
    
    df['type_encoded'] = le_type.fit_transform(df['type'])
    df['priorite_encoded'] = le_priorite.fit_transform(df['priorite'])
    
    # Prepare X and y
    X = df[['type_encoded', 'agent_id', 'priorite_encoded']]
    y = df['resolution_time']
    
    # Split
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    
    # 3. Training
    rf_model = RandomForestRegressor(n_estimators=100, random_state=42)
    lr_model = LinearRegression()
    
    rf_model.fit(X_train, y_train)
    lr_model.fit(X_train, y_train)
    
    # 4. Evaluation
    rf_preds = rf_model.predict(X_test)
    lr_preds = lr_model.predict(X_test)
    
    rf_mae = mean_absolute_error(y_test, rf_preds)
    rf_rmse = np.sqrt(mean_squared_error(y_test, rf_preds))
    
    lr_mae = mean_absolute_error(y_test, lr_preds)
    lr_rmse = np.sqrt(mean_squared_error(y_test, lr_preds))
    
    print("\n--- MODEL EVALUATION ---")
    print(f"Random Forest - MAE: {rf_mae:.2f}, RMSE: {rf_rmse:.2f}")
    print(f"Linear Regression - MAE: {lr_mae:.2f}, RMSE: {lr_rmse:.2f}")
    
    best_model = None
    best_name = ""
    result = {}
    
    if rf_rmse < lr_rmse:
        print("\n=> Random Forest performs better.")
        best_model = rf_model
        best_name = "RandomForestRegressor"
        result = {'mae': rf_mae, 'rmse': rf_rmse, 'better_model': best_name}
    else:
        print("\n=> Linear Regression performs better.")
        best_model = lr_model
        best_name = "LinearRegression"
        result = {'mae': lr_mae, 'rmse': lr_rmse, 'better_model': best_name}
        
    # 5. Export
    export_payload = {
        'model': best_model,
        'le_type': le_type,
        'le_priorite': le_priorite
    }
    joblib.dump(export_payload, MODEL_PATH)
    print(f"\nBest model ({best_name}) and encoders saved to {MODEL_PATH}")
    
    # 7. Real example prediction in console
    sample = X_test.iloc[0:1]
    sample_pred = best_model.predict(sample)[0]
    
    type_decoded = le_type.inverse_transform([sample['type_encoded'].iloc[0]])[0]
    priorite_decoded = le_priorite.inverse_transform([sample['priorite_encoded'].iloc[0]])[0]
    agent = sample['agent_id'].iloc[0]
    actual_val = y_test.iloc[0]
    
    print("\n--- TEST PREDICTION ---")
    print(f"Input: Type={type_decoded}, Agent={agent}, Priority={priorite_decoded}")
    print(f"Predicted Resolution Time: {sample_pred:.2f} hours")
    print(f"Actual Resolution Time: {actual_val:.2f} hours")
    
    return result

if __name__ == '__main__':
    train_models()
