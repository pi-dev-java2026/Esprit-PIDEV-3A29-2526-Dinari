pip install mysql-connector-python pandas scikit-learn
pip install fastapi uvicorn
python -m uvicorn api:app --reload --port 9000



to test manually the api : 

http://127.0.0.1:9000/docs


Clic on try it , change the body json with this :

{
  "mois": 1,
  "annee": 2026
}

Click execute
