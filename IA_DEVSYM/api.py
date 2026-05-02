from fastapi import FastAPI
import pandas as pd

from db import get_connection
from ai import run_ai
from mail import send_email

app = FastAPI()


@app.post("/run-report")
def run_report(data: dict):

    # =========================
    # SAFE CAST (IMPORTANT)
    # =========================
    mois = int(data["mois"])
    annee = int(data["annee"])

    conn = get_connection()

    # =========================
    # DEPENSES
    # =========================
    df = pd.read_sql(f"""
        SELECT montant, categorie_id
        FROM depense
        WHERE MONTH(date_depense)={mois}
        AND YEAR(date_depense)={annee}
    """, conn)

    if df.empty:
        conn.close()
        return {"status": "no data"}

    # force python types
    df["montant"] = df["montant"].astype(float)

    # =========================
    # BUDGET (SAFE)
    # =========================
    budget_df = pd.read_sql(f"""
        SELECT montant_limite FROM budget
        WHERE mois={mois} AND annee={annee}
    """, conn)

    if budget_df.empty:
        conn.close()
        return {"status": "no budget"}

    budget = float(budget_df.iloc[0]["montant_limite"])

    # =========================
    # TOTAL
    # =========================
    total = float(df["montant"].sum())

    # =========================
    # MOIS PRECEDENT (SAFE)
    # =========================
    prev_month = mois - 1
    prev_year = annee

    if prev_month == 0:
        prev_month = 12
        prev_year -= 1

    prev = pd.read_sql(f"""
        SELECT SUM(montant) as total
        FROM depense
        WHERE MONTH(date_depense)={prev_month}
        AND YEAR(date_depense)={prev_year}
    """, conn)

    prev_total = float(prev["total"].iloc[0]) if prev["total"].iloc[0] is not None else 0.0

    # =========================
    # AI ANALYSIS
    # =========================
    result = run_ai(df, budget, prev_total)

    # =========================
    # EMAIL
    # =========================
    send_email(
        result["report"],
        float(result["total"]),
        float(budget),
        float(result["ratio"]),
        float(result["score"]),
        float(result["evolution"]),
        int(result["anomalies"]) , int(mois), int(annee)
    )

    conn.close()

    return {
        "status": "done",
        "score": float(result["score"]),
        "ratio": float(result["ratio"])
    }