#!/usr/bin/env python3
"""
face_compare.py
Usage: python face_compare.py <temp_image_path> <db_image_path>
Exit codes:
  0 = OK (faces match)
  1 = Error or faces do not match (see stderr / stdout JSON)
"""

import sys
import json
import os
import warnings

# Suppress TensorFlow logs and warnings
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
os.environ['TF_ENABLE_ONEDNN_OPTS'] = '0'
warnings.filterwarnings('ignore')

def main():
    if len(sys.argv) < 3:
        print(json.dumps({"ok": False, "error": "Il manque les images à comparer."}))
        sys.exit(1)

    img1_path = sys.argv[1] # Temp webcam picture
    img2_path = sys.argv[2] # Saved user picture

    if not os.path.isfile(img1_path) or not os.path.isfile(img2_path):
        print(json.dumps({"ok": False, "error": "Les fichiers d'images sont introuvables."}))
        sys.exit(1)

    try:
        from deepface import DeepFace
        
        # We use a relatively standard model (VGG-Face or Facenet), distance metric is cosine by default
        # enforce_detection=True makes sure it actually finds a face in the temp scan
        result = DeepFace.verify(
            img1_path=img1_path,
            img2_path=img2_path,
            enforce_detection=True,
            detector_backend='opencv',
            model_name='Facenet'
        )
        
        is_verified = result.get("verified", False)
        
        if is_verified:
            print(json.dumps({
                "ok": True,
                "message": "Identification réussie.",
                "distance": result.get("distance", 0)
            }))
            sys.exit(0)
        else:
            print(json.dumps({
                "ok": False,
                "error": "Le visage ne correspond pas. Reconnaissance échouée.",
                "distance": result.get("distance", 0)
            }))
            sys.exit(1)

    except Exception as e:
        err_msg = str(e).lower()
        if "face could not be detected" in err_msg or "no face" in err_msg:
            print(json.dumps({"ok": False, "error": "Aucun visage détecté. Veuillez bien vous placer face à la caméra."}))
        else:
            print(json.dumps({"ok": False, "error": f"Erreur de comparaison: {str(e)}"}))
        sys.exit(1)

if __name__ == "__main__":
    main()
