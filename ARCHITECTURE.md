# Dinari — Deep Architecture Documentation

> Tunisian fintech learning platform built with Symfony 6.4 + Python ML microservice.
> This document is a developer-level walkthrough of 4 core modules:
> Chatbot, Notifications, Recommendations, and Translation/i18n.

---

## Table of Contents

1. [Module 1 — Chatbot (AI Assistant)](#module-1--chatbot-ai-assistant)
2. [Module 2 — Notifications](#module-2--notifications)
3. [Module 3 — Recommendations](#module-3--recommendations)
4. [Module 4 — Translation / i18n](#module-4--translation--i18n)
5. [Global Architecture Summary](#global-architecture-summary)
6. [Module Interactions](#module-interactions)
7. [How to Debug Each Module](#how-to-debug-each-module)
8. [Common Failure Points](#common-failure-points)

---

## Module 1 — Chatbot (AI Assistant)

### Purpose

The chatbot is a domain-specific AI assistant that answers questions about Dinari's fintech courses,
chapters, quizzes, and financial concepts (budget, savings, investment). It is intentionally scoped
to the platform's own content — it will not answer general knowledge questions outside this domain.

### What Problem It Solves

Users browsing courses often have questions like "What is this course about?", "Explain budgeting",
or "What should I study first?". Rather than forcing them to navigate manually, the chatbot provides
instant, contextual answers derived directly from the platform's own database and a built-in
financial knowledge base. No external AI API is used — no OpenAI, no Gemini, no API costs.

### Architecture Overview

```
Browser (floating widget)
  │  POST /chatbot/message  { "message": "..." }
  ▼
AssistantController::message()          [src/Controller/Client/AssistantController.php]
  │  calls
  ▼
AssistantService::respond(string)       [src/Service/AssistantService.php]
  │  HTTP POST to Python microservice
  ▼
FastAPI /chat endpoint                  [chatbot_service/app.py]
  │  TF-IDF cosine similarity lookup
  ▼
model.pkl (trained TF-IDF model)        [chatbot_service/model.pkl]
  │  returns best matching answer
  ▼
JSON { "reply": "..." }  ←  back up the chain to the browser
```

### Files Involved

| File | Role |
|---|---|
| `src/Controller/Client/AssistantController.php` | HTTP entry point, validates input, calls service |
| `src/Service/AssistantService.php` | PHP proxy — sends request to Python microservice via HttpClient |
| `templates/chatbot/_widget.html.twig` | Floating chat UI (FAB button + chat window + JS logic) |
| `chatbot_service/app.py` | FastAPI server — loads model, exposes /chat, /health, /retrain |
| `chatbot_service/train.py` | Trains TF-IDF model from dataset.json, saves model.pkl |
| `chatbot_service/build_dataset.py` | Connects to MySQL, extracts course/chapter/quiz content, writes dataset.json |
| `chatbot_service/dataset.json` | Training data: array of { question, answer } pairs |
| `chatbot_service/model.pkl` | Serialized trained model (vectorizer + question vectors + answers) |
| `chatbot_service/requirements.txt` | Python deps: fastapi, uvicorn, scikit-learn, mysql-connector-python, python-dotenv |
| `config/services.yaml` | Injects `$chatbotUrl` from `CHATBOT_SERVICE_URL` env var into AssistantService |


### How Symfony Communicates with FastAPI

`AssistantService` uses Symfony's `HttpClientInterface` (from `symfony/http-client`) to make a
synchronous HTTP POST to the Python microservice. The URL is injected via DI:

```yaml
# config/services.yaml
App\Service\AssistantService:
    arguments:
        $chatbotUrl: '%env(CHATBOT_SERVICE_URL)%'
```

```php
// AssistantService.php — the actual HTTP call
$response = $this->httpClient->request('POST', $this->chatbotUrl . '/chat', [
    'json'    => ['message' => $message],
    'timeout' => 8,
]);
$data = $response->toArray();
return $data['reply'] ?? $this->fallback();
```

If the Python service is down or times out, `TransportExceptionInterface` is caught and a
user-friendly error message is returned instead of crashing.

### Why a Separate Python Microservice?

The ML stack (scikit-learn TF-IDF, cosine similarity) is a Python-native ecosystem. Doing this
in PHP would require either a heavy FFI bridge or a reimplementation. Separating it as a
microservice means:
- The ML model can be retrained independently without touching Symfony
- Python's `scikit-learn` handles vectorization and similarity natively
- The `/retrain` endpoint lets admins refresh the model after adding new courses

The tradeoff is an extra process to manage and a network hop per message.

### The Python ML Pipeline

**Step 1 — Build the dataset** (`build_dataset.py`):
- Connects to MySQL using credentials from `.env`
- Queries `cours_symfony`, `chapitre`, and `quiz_symfony` tables
- For each course: generates 2–3 Q&A pairs (e.g. "What is course X?" → description)
- For each chapter: generates 4–5 Q&A pairs (explanation, key takeaways, chapter listing)
- For each quiz: generates 2 Q&A pairs (question → correct answer)
- Appends `STATIC_PAIRS`: hardcoded fintech knowledge (budget, savings, investment, fintech, greetings)
- Writes everything to `dataset.json` as `[{ "question": "...", "answer": "..." }, ...]`

**Step 2 — Train the model** (`train.py`):
- Loads `dataset.json`
- Extracts all questions into a list
- Fits a `TfidfVectorizer` (unigrams + bigrams, `sublinear_tf=True`) on the questions
- Transforms all questions into TF-IDF vectors
- Saves a dict to `model.pkl` via pickle:
  ```python
  model = {
      "vectorizer": vectorizer,        # fitted TfidfVectorizer
      "question_vectors": question_vectors,  # sparse matrix (n_questions × vocab)
      "questions": questions,          # list of question strings
      "answers": answers,              # list of answer strings (same index)
  }
  ```

**Step 3 — Serve** (`app.py`):
- On startup: loads `model.pkl` into memory
- On `POST /chat`:
  1. Vectorizes the incoming message using the same fitted vectorizer
  2. Computes cosine similarity between the message vector and all question vectors
  3. Picks the index with the highest similarity score
  4. If score < 0.15 (confidence threshold): returns the fallback message
  5. Otherwise: returns `answers[best_idx]`

**Step 4 — Retrain** (`POST /retrain`):
- Runs `build_dataset.py` then `train.py` as subprocesses
- Reloads `model.pkl` into memory
- Returns `{ "status": "retrained", "pairs": N }`

### The Widget — How the Chatbot Loads in the UI

`_widget.html.twig` is included at the bottom of `base.html.twig`, making it available on every
client page. It renders:

1. A fixed FAB button (`#dinari-chat-fab`) at bottom-right, z-index 9999
2. A hidden chat window (`#dinari-chat-window`) that animates open/closed
3. Quick suggestion chips (pre-filled questions the user can click)
4. A textarea input with auto-resize and Enter-to-send
5. A typing indicator (3 animated dots) shown while waiting for a response

The JS is wrapped in an IIFE so it doesn't pollute the global scope. Key behaviors:
- First open triggers a greeting message (only once per page load)
- After 3 seconds without opening, a red unread badge appears on the FAB
- Escape key closes the window
- `fetch()` calls `{{ path('app_chatbot_message') }}` (Twig generates the correct URL at render time)

### Step-by-Step Message Flow

```
1. User clicks FAB or suggestion chip
2. Widget opens, greeting message appears (if first time)
3. User types message, presses Enter or clicks send button
4. JS: addUserMessage(text) — renders user bubble immediately
5. JS: showTyping() — renders animated dots
6. JS: fetch POST /chatbot/message  { "message": "..." }
7. Symfony router → AssistantController::message()
8. Validates: message length ≤ 500 chars
9. Calls AssistantService::respond($message)
10. AssistantService: HTTP POST to http://localhost:8001/chat
11. FastAPI: vectorizes message, computes cosine similarity
12. FastAPI: returns { "reply": "best matching answer" }
13. AssistantService: returns reply string to controller
14. Controller: return $this->json(['reply' => $reply])
15. JS: removeTyping(), addBotMessage(data.reply)
16. Bot bubble appears in chat window
```

### Important Methods

**`AssistantController::message()`**
- Input: JSON body `{ "message": "..." }`
- Validates message length (max 500 chars)
- Delegates to `AssistantService::respond()`
- Output: `JsonResponse { "reply": "..." }`

**`AssistantService::respond(string $message)`**
- Input: raw user message string
- Makes HTTP POST to Python `/chat` with 8s timeout
- Catches `TransportExceptionInterface` for network failures
- Returns reply string or fallback string

**`app.py::chat(req: ChatRequest)`**
- Input: `{ "message": "..." }`
- Vectorizes message, computes cosine similarity against all training questions
- Returns best answer if similarity ≥ 0.15, else fallback
- Output: `{ "reply": "..." }`

**`build_dataset.py::build_pairs(cursor)`**
- Input: MySQL cursor
- Queries courses, chapters, quizzes
- Returns list of `{ "question": str, "answer": str }` dicts

**`train.py::train()`**
- Input: `dataset.json` on disk
- Fits TF-IDF vectorizer, transforms questions
- Saves `model.pkl`

### Bundles / Libraries Used

| Library | Why |
|---|---|
| `symfony/http-client` | Makes HTTP requests from PHP to the Python microservice |
| `fastapi` | Lightweight Python web framework for the ML API |
| `uvicorn` | ASGI server to run FastAPI |
| `scikit-learn` | TF-IDF vectorizer + cosine similarity |
| `mysql-connector-python` | Direct DB access in build_dataset.py |
| `python-dotenv` | Reads `.env` for DB credentials in Python scripts |

### Example Flow — Chatbot Message

```
User types: "C'est quoi un budget ?"

→ POST /chatbot/message { "message": "C'est quoi un budget ?" }
→ AssistantController validates (length OK)
→ AssistantService sends to FastAPI /chat
→ FastAPI vectorizes "C'est quoi un budget ?"
→ Cosine similarity finds best match in training data
   (exact match: "C'est quoi un budget ?" → score ~1.0)
→ Returns: "Un budget est un plan financier qui répartit vos revenus..."
→ AssistantService returns that string
→ Controller returns JSON { "reply": "Un budget est un plan financier..." }
→ Widget renders bot bubble with the answer
```

### Design Choices

- **No external AI API**: keeps data on-platform, zero API cost, works offline
- **TF-IDF + cosine similarity**: simple, fast, deterministic — appropriate for a closed-domain FAQ bot
- **Confidence threshold (0.15)**: prevents nonsensical answers when the question is too far from training data
- **Microservice separation**: lets the ML pipeline evolve independently from Symfony
- **Retrain endpoint**: admins can refresh the model after adding new courses without redeploying

**Limitations**: No conversation memory (each message is independent), no semantic understanding
(only keyword overlap), answers are only as good as the training data quality.

---

## Module 2 — Notifications

### Purpose

The notification system creates personalized in-app alerts for users based on their quiz performance
and recommendation generation. Notifications are scoped to the browser session (no user accounts).

### What Problem It Solves

Without notifications, users would have no feedback loop after completing a quiz. The system
automatically tells them: "You scored poorly — review these topics" or "Great score — move to the
next level", and "Your personalized recommendations are ready."

### Architecture Overview

```
Quiz submitted
  │
  ▼
RecommendationController::saveResult()
  │  persists QuizResultat
  │  dispatches QuizCompletedEvent
  ▼
Symfony EventDispatcher
  │  routes to subscriber
  ▼
NotificationEventSubscriber::onQuizCompleted()
  │  calls
  ▼
NotificationService::notifyQuizResult()
  │  creates Notification entity
  ▼
NotificationRepository → MySQL (notification table)

Later, user visits /notifications
  ▼
NotificationController::index()
  │  queries NotificationRepository
  ▼
templates/client/notifications/index.html.twig
```

### Files Involved

| File | Role |
|---|---|
| `src/Entity/Notification.php` | Doctrine entity — stores one notification |
| `src/Repository/NotificationRepository.php` | DB queries: findBySession, countUnread, markAllRead |
| `src/Service/NotificationService.php` | Business logic — creates notifications based on quiz score |
| `src/Event/QuizCompletedEvent.php` | Event object carrying QuizResultat + sessionId |
| `src/Event/RecommendationsGeneratedEvent.php` | Event object carrying sessionId + count |
| `src/EventSubscriber/NotificationEventSubscriber.php` | Listens to both events, delegates to NotificationService |
| `src/Controller/Client/NotificationController.php` | HTTP routes: list, unread count, mark read, mark all read |
| `templates/client/notifications/index.html.twig` | Notification list UI with read/unread styling |

