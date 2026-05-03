"""
Dinari ML API — Optimisé & 100% ML
- RandomForest pour prédiction des ventes
- GradientBoosting RÉELLEMENT utilisé pour le promo timing
- Simulation de promo (10%, 20%, 30%, 50%)
- Devise : DT
"""

from flask import Flask, jsonify, request
from flask_cors import CORS
import pymysql
import pandas as pd
import numpy as np
from sklearn.ensemble import RandomForestRegressor, GradientBoostingRegressor
from sklearn.preprocessing import LabelEncoder
from sklearn.model_selection import train_test_split
from sklearn.metrics import mean_absolute_error, r2_score
import joblib
import os
from datetime import datetime
import warnings
warnings.filterwarnings('ignore')

app = Flask(__name__)
CORS(app)

# ============================================================
# CONFIGURATION
# ============================================================
DB_CONFIG = {
    'host': 'localhost', 'user': 'root',
    'password': '', 'database': 'gestionabonnement'
}
DEVISE        = 'DT'
MODEL_PATH    = 'model_randomforest.pkl'
ENCODERS_PATH = 'encoders.pkl'
PROMO_MODEL_PATH = 'model_promo.pkl'

NOMS_MOIS = ['Janvier','Février','Mars','Avril','Mai','Juin',
             'Juillet','Août','Septembre','Octobre','Novembre','Décembre']

EXPLICATIONS_MOIS = {
    1:  "Bonnes résolutions — forte demande éducation, sport, bien-être 📚",
    2:  "Mois calme — promos ciblées streaming et divertissement 🎬",
    3:  "Rentrée Q2 — éducation et gaming en hausse 🎮",
    4:  "Creux saisonnier — promos légères uniquement 🌸",
    5:  "Faible intérêt — réserver le budget pour l'été 💤",
    6:  "Début été — streaming, voyages et loisirs en hausse ☀️",
    7:  "Vacances — pic streaming, promos famille 🏖️",
    8:  "Fin vacances — back-to-school 🎒",
    9:  "Rentrée — éducation, productivité, cloud remontent 📝",
    10: "Pré-Black Friday — clients en attente de promos 🛒",
    11: "BLACK FRIDAY — meilleur moment de l'année 🔥",
    12: "Fêtes & cadeaux — pic annuel absolu 🎄"
}

SCORES_SAISONNIERS = {
    1:65, 2:55, 3:60, 4:50, 5:45, 6:70,
    7:75, 8:72, 9:68, 10:60, 11:95, 12:90
}

# ============================================================
# BDD
# ============================================================
def get_db():
    return pymysql.connect(**DB_CONFIG, cursorclass=pymysql.cursors.DictCursor)

def load_abonnements():
    try:
        conn = get_db()
        cur  = conn.cursor()
        cur.execute("""
            SELECT a.id AS abonnement_id, a.nom, a.prix, a.categorie, a.tier, a.frequence,
                   IFNULL(a.mis_en_avant, 0) AS mis_en_avant,
                   COALESCE(a.prix_marche, a.prix) AS prix_marche,
                   COUNT(p.id) AS nombre_ventes
            FROM abonnement a
            LEFT JOIN paiement p ON p.abonnement_id = a.id AND p.statut = 'payé'
            WHERE a.actif = 1
            GROUP BY a.id, a.nom, a.prix, a.categorie, a.tier, a.frequence, a.mis_en_avant, a.prix_marche
        """)
        rows = cur.fetchall(); cur.close(); conn.close()
        if not rows:
            return pd.DataFrame()
        df = pd.DataFrame(rows)
        df['abonnement_id'] = df['abonnement_id'].astype(int)
        df['prix']          = df['prix'].astype(float)
        df['prix_marche']   = df['prix_marche'].fillna(df['prix']).astype(float)
        df['nombre_ventes'] = df['nombre_ventes'].fillna(0).astype(int)
        df['categorie']     = df['categorie'].fillna('Autre').astype(str)
        df['tier']          = df['tier'].fillna('Normal').astype(str)
        df['frequence']     = df['frequence'].fillna('mensuel').astype(str)
        df['mis_en_avant']  = df['mis_en_avant'].fillna(0).astype(int)
        return df
    except Exception as e:
        print(f"❌ Erreur BDD abonnements: {e}"); return pd.DataFrame()

def load_ventes_mensuelles():
    try:
        conn = get_db(); cur = conn.cursor()
        cur.execute("""
            SELECT MONTH(created_at) AS mois, YEAR(created_at) AS annee, COUNT(id) AS nb_ventes
            FROM paiement WHERE statut = 'payé' AND created_at IS NOT NULL
            GROUP BY MONTH(created_at), YEAR(created_at) ORDER BY annee, mois
        """)
        rows = cur.fetchall(); cur.close(); conn.close()
        if not rows: return pd.DataFrame()
        df = pd.DataFrame(rows)
        df['nb_ventes'] = df['nb_ventes'].astype(int)
        df['mois'] = df['mois'].astype(int)
        return df
    except Exception as e:
        print(f"❌ Erreur ventes mensuelles: {e}"); return pd.DataFrame()

def load_taux_conversion():
    defaults = {m: 0.65 for m in range(1, 13)}
    try:
        conn = get_db(); cur = conn.cursor()
        cur.execute("""
            SELECT MONTH(created_at) AS mois, COUNT(*) AS total,
                   SUM(CASE WHEN statut = 'payé' THEN 1 ELSE 0 END) AS payes
            FROM paiement WHERE created_at IS NOT NULL GROUP BY MONTH(created_at)
        """)
        rows = cur.fetchall(); cur.close(); conn.close()
        for row in rows:
            m, total, payes = int(row['mois']), int(row['total']), int(row['payes'])
            if total > 0: defaults[m] = round(payes / total, 4)
    except Exception as e:
        print(f"❌ Erreur taux conversion: {e}")
    return defaults

# ============================================================
# ML — RANDOMFOREST (ventes)
# ============================================================
def prepare_features(df, encoders=None, fit=False):
    df = df.copy()
    if fit:
        encoders = {}
        for col, key in [('categorie','categorie'),('tier','tier'),('frequence','frequence')]:
            le = LabelEncoder(); df[f'{col}_code'] = le.fit_transform(df[col]); encoders[key] = le
        prix_max = df['prix'].max() or 1; encoders['prix_max'] = prix_max
    else:
        prix_max = encoders['prix_max']
        for col, key in [('categorie','categorie'),('tier','tier'),('frequence','frequence')]:
            le = encoders[key]
            df[f'{col}_code'] = df[col].apply(lambda v: le.transform([v])[0] if v in le.classes_ else 0)

    df['prix_normalise']    = df['prix'] / prix_max
    df['economie_normalise'] = ((df['prix_marche'] - df['prix']) / df['prix_marche'].clip(lower=0.01)).clip(lower=0)
    features = ['prix_normalise','economie_normalise','mis_en_avant','categorie_code','tier_code','frequence_code']
    return df[features], encoders

def train_random_forest(df):
    if df.empty or len(df) < 3:
        return None, None, None
    X, encoders = prepare_features(df, fit=True)
    y = df['nombre_ventes']
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    model = RandomForestRegressor(n_estimators=100, max_depth=10, min_samples_split=5,
                                   random_state=42, n_jobs=-1)
    model.fit(X_train, y_train)
    r2  = r2_score(y_test, model.predict(X_test))  if len(y_test) > 0 else 0
    mae = mean_absolute_error(y_test, model.predict(X_test)) if len(y_test) > 0 else 0
    joblib.dump(model, MODEL_PATH); joblib.dump(encoders, ENCODERS_PATH)
    print(f"✅ RandomForest R²={r2:.4f} MAE={mae:.2f}")
    return model, r2, mae

def predict_ventes_batch(df, model, encoders):
    if df.empty or model is None: return []
    X, _ = prepare_features(df, encoders=encoders, fit=False)
    raw_preds = model.predict(X)
    # Confiance via variance des arbres
    tree_preds = np.array([t.predict(X) for t in model.estimators_])  # (100, n)
    stds = tree_preds.std(axis=0)

    results = []
    for i, row in enumerate(df.itertuples()):
        ventes_annuelles = max(0, int(round(raw_preds[i] * 12)))
        confiance = max(0, min(99, int(70 - stds[i] * 5)))
        results.append({
            'id': int(row.abonnement_id), 'nom': row.nom,
            'prix': float(row.prix), 'prix_marche': float(row.prix_marche),
            'devise': DEVISE, 'categorie': row.categorie, 'tier': row.tier,
            'frequence': row.frequence, 'mis_en_avant': int(row.mis_en_avant),
            'ventes_reelles': int(row.nombre_ventes),
            'ventes_totales': ventes_annuelles, 'confidence': confiance
        })
    results.sort(key=lambda x: x['ventes_totales'], reverse=True)
    for i, r in enumerate(results): r['rang'] = i + 1
    return results

def _get_predictions():
    """Helper interne — charge modèle + prédit (évite appels HTTP internes)"""
    if not os.path.exists(MODEL_PATH):
        return None, "Modèle non entraîné — lancez POST /api/ml/train d'abord"
    if not os.path.exists(ENCODERS_PATH):
        return None, "Encoders manquants — relancez POST /api/ml/train"
    try:
        model    = joblib.load(MODEL_PATH)
        encoders = joblib.load(ENCODERS_PATH)
    except Exception as e:
        return None, f"Erreur chargement modèle: {e}"
    df = load_abonnements()
    if df.empty: return None, "Aucune donnée BDD"
    return predict_ventes_batch(df, model, encoders), None

# ============================================================
# ML — GRADIENTBOOSTING (promo timing) — RÉELLEMENT UTILISÉ
# ============================================================
def train_promo_model(df_ventes):
    """
    Entraîne GradientBoosting sur les ventes mensuelles historiques.
    Features : mois encodé cyclique (sin/cos) + taux de conversion.
    Target  : nb_ventes normalisé (proxy du potentiel promo).
    """
    if df_ventes.empty or len(df_ventes) < 4:
        return None
    df = df_ventes.copy()
    df['mois_sin'] = np.sin(2 * np.pi * df['mois'] / 12)
    df['mois_cos'] = np.cos(2 * np.pi * df['mois'] / 12)
    X = df[['mois_sin', 'mois_cos']]
    y = df['nb_ventes']
    model = GradientBoostingRegressor(n_estimators=100, max_depth=4,
                                       learning_rate=0.1, random_state=42)
    model.fit(X, y)
    joblib.dump(model, PROMO_MODEL_PATH)
    print(f"✅ GradientBoosting promo entraîné sur {len(df)} points")
    return model

def _score_promo_par_mois(taux_par_mois):
    """
    Calcule les scores promo via le modèle GradientBoosting entraîné.
    Si le modèle n'existe pas, fallback sur les scores saisonniers.
    """
    mois_range = list(range(1, 13))
    sin_vals   = [np.sin(2 * np.pi * m / 12) for m in mois_range]
    cos_vals   = [np.cos(2 * np.pi * m / 12) for m in mois_range]
    X_input    = np.array(list(zip(sin_vals, cos_vals)))

    if os.path.exists(PROMO_MODEL_PATH):
        try:
            promo_model = joblib.load(PROMO_MODEL_PATH)
            raw_scores  = promo_model.predict(X_input)
            weighted = [max(0, float(raw_scores[i])) * taux_par_mois.get(m, 0.65)
                        for i, m in enumerate(mois_range)]
            max_w = max(weighted) if max(weighted) > 0 else 1
            scores = [int(w / max_w * 100) for w in weighted]
            source = 'gradientboosting'
        except Exception as e:
            print(f"⚠ Erreur modèle promo, fallback saisonnier: {e}")
            scores = [SCORES_SAISONNIERS.get(m, 50) for m in mois_range]
            source = 'saisonnier_fallback'
    else:
        # Fallback saisonnier si modèle pas encore entraîné
        scores = [SCORES_SAISONNIERS.get(m, 50) for m in mois_range]
        source = 'saisonnier_fallback'

    return [
        {
            'mois': m, 'nom_mois': NOMS_MOIS[m-1], 'score': scores[m-1],
            'taux_conv': taux_par_mois.get(m, 0.65),
            'recommande': scores[m-1] >= 70,
            'conseil': f"{NOMS_MOIS[m-1]}: {EXPLICATIONS_MOIS[m]}",
            'source': source
        }
        for m in mois_range
    ]

# ============================================================
# RECOMMANDATIONS PROMO
# ============================================================
def _best_month_for_item(item, taux_par_mois):
    """Meilleur mois basé sur BDD réelle (catégorie) → sinon logique métier ML-guidée."""
    try:
        conn = get_db(); cur = conn.cursor()
        cur.execute("""
            SELECT MONTH(p.created_at) AS mois, COUNT(p.id) AS nb_ventes
            FROM paiement p JOIN abonnement a ON p.abonnement_id = a.id
            WHERE p.statut = 'payé' AND a.categorie = %s AND p.created_at IS NOT NULL
            GROUP BY MONTH(p.created_at) ORDER BY nb_ventes DESC
        """, (item['categorie'],))
        rows = cur.fetchall(); cur.close(); conn.close()
    except: rows = []

    if len(rows) >= 3:
        best = rows[0]; mois_num = int(best['mois'])
        taux = taux_par_mois.get(mois_num, 0.65)
        return {'nom_mois': NOMS_MOIS[mois_num-1],
                'score': min(99, int(best['nb_ventes'] / max(r['nb_ventes'] for r in rows) * 100 * taux)),
                'source': 'bdd_reelle'}

    # Logique métier si données insuffisantes
    freq, tier, prix, pct = (item.get('frequence','').lower(), item.get('tier','').lower(),
                              float(item.get('prix',0)), float(item.get('pct_atteint',0)))
    if 'annuel' in freq:
        mois_num = 9 if tier in ['platinum','gold'] else 3
    elif prix > 100: mois_num = 11
    elif prix <= 30:  mois_num = 6 if pct < 20 else 1
    elif tier in ['platinum','gold']: mois_num = 11
    else: mois_num = 6

    return {'nom_mois': NOMS_MOIS[mois_num-1],
            'score': int(70 * taux_par_mois.get(mois_num, 0.65)),
            'source': 'logique_metier'}

def _generate_promo_recommendation(item, best_month):
    pct, prix = item['pct_atteint'], item['prix']
    if pct < 20:    promo_type, reduction, emoji = "URGENT",       min(50, 25+(50-pct)//2), "🔴"
    elif pct < 40:  promo_type, reduction, emoji = "NÉCESSAIRE",   min(40, 20+(40-pct)),    "🟠"
    elif pct < 65:  promo_type, reduction, emoji = "OPPORTUNITÉ",  min(30, 15+(65-pct)//3), "🟡"
    else:           promo_type, reduction, emoji = "AMBASSADEUR",  10,                       "🟢"

    prix_promo     = round(prix * (1 - reduction / 100), 3)
    gain_estime    = round(item['ecart'] * prix_promo, 2)
    objectif_ventes = max(1, int(item['ventes_predites'] * 0.3))

    return {
        'promo_type': promo_type, 'reduction_pct': reduction,
        'prix_original': prix, 'prix_promo': prix_promo, 'devise': DEVISE,
        'message_alerte': f"{emoji} {item['nom']} — {pct}% du potentiel atteint",
        'objectif_ventes': objectif_ventes, 'gain_estime': gain_estime,
        'periode_recommandee': best_month.get('nom_mois', 'Juin')
    }

def _build_underperforming(predictions, seuil, taux_par_mois, with_promo=False):
    under = []
    for p in predictions:
        pct = (p['ventes_reelles'] / p['ventes_totales'] * 100) if p['ventes_totales'] > 0 else 0
        if pct >= seuil: continue
        item = {
            'id': p['id'], 'nom': p['nom'], 'categorie': p['categorie'],
            'tier': p['tier'], 'frequence': p['frequence'],
            'prix': p['prix'], 'devise': DEVISE,
            'ventes_reelles': p['ventes_reelles'], 'ventes_predites': p['ventes_totales'],
            'pct_atteint': round(pct, 1), 'ecart': p['ventes_totales'] - p['ventes_reelles'],
            'status': 'critique' if pct < 35 else 'attention'
        }
        if with_promo:
            bm = _best_month_for_item(item, taux_par_mois)
            item['promo_recommendation'] = _generate_promo_recommendation(item, bm)
        under.append(item)
    under.sort(key=lambda x: x['pct_atteint'])
    return under

def _simulate_discount(item, discount_pct):
    prix_original = item['prix']
    prix_promo    = round(prix_original * (1 - discount_pct / 100), 3)
    boost         = min(3.0, 1 + discount_pct / 40)
    ventes_orig   = item['ventes_totales']
    ventes_sim    = int(ventes_orig * boost)
    ca_orig       = ventes_orig * prix_original
    ca_sim        = round(ventes_sim * prix_promo, 2)

    if discount_pct <= 10:   rec = "🔹 Réduction légère — idéale pour tester sans impacter la marge"
    elif discount_pct <= 20: rec = "🟢 Bonne réduction — augmentation significative attendue"
    elif discount_pct <= 30: rec = "🟡 Forte réduction — volume garanti, surveiller la marge"
    else:                     rec = "🔴 Réduction agressive — conquête de parts de marché"

    return {
        'discount_percent': discount_pct, 'prix_original': prix_original, 'prix_promo': prix_promo,
        'ventes_originales': ventes_orig, 'ventes_simulees': ventes_sim,
        'gain_ventes': ventes_sim - ventes_orig, 'boost_percent': int((boost - 1) * 100),
        'ca_original': round(ca_orig, 2), 'ca_simule': ca_sim,
        'gain_ca': round(ca_sim - ca_orig, 2),
        'taux_conversion_estime': round(min(0.95, 0.65 + discount_pct / 100) * 100, 1),
        'recommandation': rec, 'devise': DEVISE
    }

# ============================================================
# ENDPOINTS
# ============================================================
@app.route('/api/ml/health')
def health():
    return jsonify({'status': 'ok', 'model_ready': os.path.exists(MODEL_PATH),
                    'promo_model_ready': os.path.exists(PROMO_MODEL_PATH),
                    'devise': DEVISE, 'timestamp': datetime.now().isoformat()})

@app.route('/api/ml/stats')
def stats():
    df = load_abonnements()
    return jsonify({
        'success': True, 'model_ready': os.path.exists(MODEL_PATH),
        'promo_model_ready': os.path.exists(PROMO_MODEL_PATH),
        'abonnements_actifs': len(df),
        'total_ventes': int(df['nombre_ventes'].sum()) if not df.empty else 0,
        'prix_moyen': round(float(df['prix'].mean()), 3) if not df.empty else 0,
        'devise': DEVISE
    })

@app.route('/api/ml/train', methods=['POST'])
def train():
    try:
        df = load_abonnements()
        if df.empty: return jsonify({'success': False, 'error': 'Aucune donnée BDD'}), 400

        model, r2, mae = train_random_forest(df)
        if model is None: return jsonify({'success': False, 'error': 'Erreur entraînement RF'}), 400

        # Entraînement GradientBoosting promo
        df_ventes  = load_ventes_mensuelles()
        promo_ok   = False
        if not df_ventes.empty:
            promo_ok = train_promo_model(df_ventes) is not None

        encoders = joblib.load(ENCODERS_PATH)
        X, _     = prepare_features(df, encoders=encoders)
        return jsonify({
            'success': True, 'model': 'RandomForest + GradientBoosting',
            'r2': round(r2, 4), 'mae': round(mae, 2),
            'n_features': len(X.columns), 'n_trees': 100,
            'feature_importances': {k: round(v, 4) for k, v in
                                     zip(X.columns, model.feature_importances_)},
            'promo_model_trained': promo_ok, 'devise': DEVISE,
            'message': 'Modèles entraînés avec succès'
        })
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/predict')
def predict():
    try:
        predictions, err = _get_predictions()
        if err: return jsonify({'success': False, 'error': err}), 400
        total_reel = sum(p['ventes_reelles'] for p in predictions)
        total_pred = sum(p['ventes_totales'] for p in predictions)
        return jsonify({
            'success': True, 'predictions': predictions, 'devise': DEVISE,
            'meta': {
                'total_reel': total_reel, 'total_pred': total_pred,
                'croissance_pct': round((total_pred - total_reel) / max(total_reel, 1) * 100, 1),
                'n_abonnements': len(predictions)
            }
        })
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/top')
def top():
    try:
        n = int(request.args.get('n', 8))
        predictions, err = _get_predictions()
        if err: return jsonify({'success': False, 'error': err}), 400
        return jsonify({'success': True, 'devise': DEVISE, 'top': predictions[:n]})
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/underperforming')
def underperforming():
    try:
        seuil = float(request.args.get('seuil', 65))
        predictions, err = _get_predictions()
        if err: return jsonify({'success': False, 'error': err}), 400
        under = _build_underperforming(predictions, seuil, {}, with_promo=False)
        return jsonify({'success': True, 'underperforming': under, 'total': len(under),
                        'seuil_utilise': seuil, 'devise': DEVISE})
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/underperforming-with-promo')
def underperforming_with_promo():
    try:
        seuil          = float(request.args.get('seuil', 65))
        predictions, err = _get_predictions()
        if err: return jsonify({'success': False, 'error': err}), 400
        taux_par_mois  = load_taux_conversion()
        under          = _build_underperforming(predictions, seuil, taux_par_mois, with_promo=True)
        # Top 3 mois pour le contexte
        scores         = sorted(_score_promo_par_mois(taux_par_mois), key=lambda x: x['score'], reverse=True)
        return jsonify({'success': True, 'underperforming': under, 'total': len(under),
                        'seuil_utilise': seuil, 'devise': DEVISE, 'best_months': scores[:3]})
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/promo-timing')
def promo_timing():
    try:
        taux_par_mois = load_taux_conversion()
        scores        = _score_promo_par_mois(taux_par_mois)
        top3          = sorted(scores, key=lambda x: x['score'], reverse=True)[:3]
        return jsonify({'success': True, 'timing': scores, 'top3': top3, 'devise': DEVISE})
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/monthly-breakdown')
def monthly_breakdown():
    try:
        df_ventes     = load_ventes_mensuelles()
        taux_par_mois = load_taux_conversion()
        ventes_par_mois = {m: 0 for m in range(1, 13)}
        if not df_ventes.empty:
            for mois, ventes in df_ventes.groupby('mois')['nb_ventes'].sum().items():
                ventes_par_mois[mois] = int(ventes)
        return jsonify({
            'success': True, 'devise': DEVISE,
            'monthly': [{'mois': m, 'nom_mois': NOMS_MOIS[m-1],
                          'ventes_hist': ventes_par_mois[m],
                          'taux_conv': taux_par_mois.get(m, 0.65)} for m in range(1, 13)]
        })
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/simulate-promo', methods=['POST'])
def simulate_promo():
    try:
        data  = request.get_json() or {}
        abo_id   = data.get('abonnement_id')
        discount = int(data.get('discount', 20))
        if not abo_id: return jsonify({'success': False, 'error': 'abonnement_id requis'}), 400
        if not (0 <= discount <= 70): return jsonify({'success': False, 'error': 'Discount entre 0 et 70%'}), 400

        predictions, err = _get_predictions()
        if err: return jsonify({'success': False, 'error': err}), 400

        abo = next((p for p in predictions if p['id'] == abo_id), None)
        if not abo: return jsonify({'success': False, 'error': f'ID {abo_id} non trouvé'}), 404

        sim = _simulate_discount(abo, discount)
        return jsonify({
            'success': True, 'devise': DEVISE,
            'abonnement': {'id': abo['id'], 'nom': abo['nom'], 'prix_actuel': abo['prix'],
                            'ventes_actuelles': abo['ventes_totales'], 'categorie': abo['categorie']},
            'simulation': sim,
            'message': (f"📊 -{discount}% sur {abo['nom']}: {abo['ventes_totales']} → "
                        f"{sim['ventes_simulees']} ventes | CA: {sim['ca_original']} → {sim['ca_simule']} DT")
        })
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

@app.route('/api/ml/simulate-promo-multiple', methods=['POST'])
def simulate_promo_multiple():
    try:
        data = request.get_json() or {}
        discount = int(data.get('discount', 20))
        if not (0 <= discount <= 70): return jsonify({'success': False, 'error': 'Discount entre 0 et 70%'}), 400

        predictions, err = _get_predictions()
        if err: return jsonify({'success': False, 'error': err}), 400
        taux_par_mois = load_taux_conversion()
        under = _build_underperforming(predictions, 65, taux_par_mois, with_promo=False)

        simulations = []
        for item in under:
            sim = _simulate_discount({'prix': item['prix'], 'ventes_totales': item['ventes_predites']}, discount)
            simulations.append({
                'abonnement': {'id': item['id'], 'nom': item['nom'], 'categorie': item['categorie'],
                                'prix_actuel': item['prix'], 'ventes_actuelles': item['ventes_predites'],
                                'pct_atteint': item['pct_atteint']},
                'simulation': sim
            })

        tv_act  = sum(s['abonnement']['ventes_actuelles'] for s in simulations)
        tv_sim  = sum(s['simulation']['ventes_simulees']  for s in simulations)
        ca_act  = sum(s['abonnement']['ventes_actuelles'] * s['abonnement']['prix_actuel'] for s in simulations)
        ca_sim  = sum(s['simulation']['ca_simule'] for s in simulations)

        return jsonify({
            'success': True, 'discount': discount, 'simulations': simulations, 'devise': DEVISE,
            'total': {'abonnements_concernes': len(simulations), 'ventes_actuelles': tv_act,
                      'ventes_simulees': tv_sim, 'gain_ventes': tv_sim - tv_act,
                      'ca_actuel': round(ca_act, 2), 'ca_simule': round(ca_sim, 2),
                      'gain_ca': round(ca_sim - ca_act, 2)}
        })
    except Exception as e:
        return jsonify({'success': False, 'error': str(e)}), 500

# ============================================================
# DÉMARRAGE
# ============================================================
if __name__ == '__main__':
    print("""
╔══════════════════════════════════════════════════════╗
║       🌲 DINARI ML API — RF + GradientBoosting       ║
║  GET  /api/ml/health                                 ║
║  GET  /api/ml/stats                                  ║
║  POST /api/ml/train                                  ║
║  GET  /api/ml/predict                                ║
║  GET  /api/ml/top?n=8                                ║
║  GET  /api/ml/underperforming                        ║
║  GET  /api/ml/underperforming-with-promo             ║
║  GET  /api/ml/promo-timing                           ║
║  GET  /api/ml/monthly-breakdown                      ║
║  POST /api/ml/simulate-promo                         ║
║  POST /api/ml/simulate-promo-multiple                ║
╚══════════════════════════════════════════════════════╝
    """)
    app.run(host='0.0.0.0', port=5000, debug=True)