#!/usr/bin/env python3
"""
face_verify.py
Usage: python face_verify.py <image_path>
Exit codes:
  0 = OK (exactly one face detected, image valid)
  1 = Error (see stderr / stdout JSON)
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
    if len(sys.argv) < 2:
        print(json.dumps({"ok": False, "error": "No image path provided"}))
        sys.exit(1)

    image_path = sys.argv[1]

    if not os.path.isfile(image_path):
        print(json.dumps({"ok": False, "error": f"File not found: {image_path}"}))
        sys.exit(1)

    try:
        import cv2
        import numpy as np
    except ImportError as e:
        print(json.dumps({"ok": False, "error": f"OpenCV not installed: {str(e)}"}))
        sys.exit(1)

    # ── 1. Load & basic validation ─────────────────────────────────────
    img = cv2.imread(image_path)
    if img is None:
        print(json.dumps({"ok": False, "error": "Cannot read image file. It may be corrupted."}))
        sys.exit(1)

    h, w = img.shape[:2]
    if w < 64 or h < 64:
        print(json.dumps({"ok": False, "error": "Image too small (minimum 64×64 px)."}))
        sys.exit(1)

    # ── 2. Face detection with DeepFace ───────────────────────────────
    try:
        from deepface import DeepFace
        results = DeepFace.extract_faces(
            img_path=image_path,
            detector_backend="opencv",
            enforce_detection=True,
            align=True
        )
        face_count = len(results)
    except Exception as e:
        err_msg = str(e).lower()
        if "face could not be detected" in err_msg or "no face" in err_msg:
            print(json.dumps({"ok": False, "error": "Aucun visage détecté dans l'image. Veuillez vous placer face à la caméra."}))
        else:
            print(json.dumps({"ok": False, "error": f"Erreur de détection: {str(e)}"}))
        sys.exit(1)

    if face_count == 0:
        print(json.dumps({"ok": False, "error": "Aucun visage détecté. Veuillez vous placer face à la caméra."}))
        sys.exit(1)

    if face_count > 1:
        print(json.dumps({"ok": False, "error": f"{face_count} visages détectés. Veuillez vous assurer qu'une seule personne est visible."}))
        sys.exit(1)

    # ── 3. Confidence check ───────────────────────────────────────────
    face = results[0]
    confidence = face.get("confidence", 1.0)
    if confidence < 0.7:
        print(json.dumps({"ok": False, "error": "Le visage n'est pas assez clair. Améliorez l'éclairage et réessayez."}))
        sys.exit(1)

    # ── All good ──────────────────────────────────────────────────────
    print(json.dumps({
        "ok": True,
        "faces": face_count,
        "confidence": round(confidence, 3),
        "message": "Visage valide détecté avec succès."
    }))
    sys.exit(0)


if __name__ == "__main__":
    main()
