# Dinari — Deep Module Documentation
# Chatbot · Notifications · Recommendations · Translation/i18n

> This document is a developer-level walkthrough of the 4 core modules.
> It covers architecture, code flow, files, methods, design choices, and debugging. 

---

## Table of Contents

1. [Module 1 — Chatbot (AI Assistant)](#1-chatbot)
2. [Module 2 — Notifications](#2-notifications)
3. [Module 3 — Recommendations](#3-recommendations)
4. [Module 4 — Translation / i18n](#4-translation--i18n)
5. [Global Architecture Summary](#5-global-architecture-summary)
6. [Module Interactions](#6-module-interactions)
7. [How to Debug Each Module](#7-how-to-debug-each-module)
8. [Common Failure Points](#8-common-failure-points)

---

## 1. Chatbot

### 1.1 Purpose

The chatbot is a domain-specific AI assistant embedded in every client page.
It answers questions about Dinari's fintech courses, chapters, quizzes, and
financial concepts (budget, savings, investment, fintech).

It is intentionally scoped to the platform's own content. It will not answer
general knowledge questions outside this domain. No external AI API is used —
no OpenAI, no Gemini, no API costs, no data leaving the platform.

### 1.2 What Problem It Solves

Users browsing courses often have questions like:
- "What is this course about?"
- "Explain budgeting to me"
- "What should I study first?"
- "What is the correct answer to this quiz question?"

Rather than forcing them to navigate manually, the chatbot provides instant
contextual answers derived from the platform's own database and a built-in
financial knowledge base.

### 1.3 Architecture Diagram

```
Browser (floating widget — _widget.html.twig)
  |
  | POST /chatbot/message  { "message": "..." }
  v
AssistantController::message()
  |  validates input (max 500 chars)
  |  calls
  v
AssistantService::respond(string $message)
  |  HTTP POST via symfony/http-client
  |  timeout: 8 seconds
  v
FastAPI microservice  (chatbot_service/app.py)
  |  running on http://localhost:8001
  |  loads model.pkl on startup
  v
/chat endpoint
  |  vectorizes message with TF-IDF
  |  cosine similarity against all training questions
  |  picks best match (threshold 0.15)
  v
JSON { "reply": "answer text" }
  |
  v  (back up the chain)
AssistantService returns reply string
  |
AssistantController returns JsonResponse { "reply": "..." }
  |
Widget JS: removes typing indicator, renders bot bubble
```

### 1.4 Files Involved

| File | What it does |
|---|---|
| `src/Controller/Client/AssistantController.php` | HTTP entry point. Reads JSON body, validates length, calls AssistantService, returns JSON |
| `src/Service/AssistantService.php` | PHP proxy. Sends HTTP POST to Python microservice. Handles errors gracefully |
| `templates/chatbot/_widget.html.twig` | The entire chat UI: FAB button, chat window, suggestion chips, input, all JS logic |
| `chatbot_service/app.py` | FastAPI server. Loads model.pkl, exposes /chat /health /retrain |
| `chatbot_service/train.py` | Trains TF-IDF model from dataset.json, saves model.pkl |
| `chatbot_service/build_dataset.py` | Connects to MySQL, extracts course/chapter/quiz content, writes dataset.json |
| `chatbot_service/dataset.json` | Training data: array of { question, answer } pairs |
| `chatbot_service/model.pkl` | Serialized trained model (vectorizer + question vectors + answers array) |
| `chatbot_service/requirements.txt` | Python deps: fastapi, uvicorn, scikit-learn, mysql-connector-python, python-dotenv |
| `config/services.yaml` | Injects $chatbotUrl from CHATBOT_SERVICE_URL env var into AssistantService |


### 1.5 How Symfony Communicates with FastAPI

`AssistantService` uses Symfony's `HttpClientInterface` (from `symfony/http-client`).
The Python service URL is injected via Dependency Injection, not hardcoded:

```yaml
# config/services.yaml
App\Service\AssistantService:
    arguments:
        $chatbotUrl: '%env(CHATBOT_SERVICE_URL)%'
```

The `.env` file must define:
```
CHATBOT_SERVICE_URL=http://localhost:8001
```

The actual HTTP call in `AssistantService::respond()`:
```php
$response = $this->httpClient->request('POST', $this->chatbotUrl . '/chat', [
    'json'    => ['message' => $message],
    'timeout' => 8,
]);
$data = $response->toArray();
return $data['reply'] ?? $this->fallback();
```

If the Python service is unreachable, `TransportExceptionInterface` is caught
and a user-friendly message is returned instead of a 500 error.

### 1.6 The Python ML Pipeline — Step by Step

**Step 1 — Build the dataset** (`build_dataset.py`):

Connects to MySQL using credentials from `.env` (DB_HOST, DB_NAME, DB_USER, DB_PASSWORD).
Queries three tables: `cours_symfony`, `chapitre`, `quiz_symfony`.

For each course it generates Q&A pairs like:
- "C'est quoi le cours Les bases du budget ?" → description text
- "Parle-moi du cours Les bases du budget" → level + description
- "Que contient le cours Les bases du budget ?" → description only

For each chapter it generates:
- "Qu'est-ce que [titre] ?" → intro + contenu_principal
- "Explique-moi [titre]" → same content
- "Que faut-il retenir de [titre] ?" → a_retenir field
- "Points clés de [titre]" → a_retenir field
- "Quels sont les chapitres du cours X ?" → chapter title

For each quiz:
- The question text → "La bonne réponse est : [correct answer]."

Then appends `STATIC_PAIRS`: 10 hardcoded fintech Q&A pairs covering budget,
savings, investment, fintech definition, interest rates, greetings, and
capability questions. These are always included regardless of DB content.

Output: `dataset.json` — a flat array of `{ "question": "...", "answer": "..." }`.

**Step 2 — Train the model** (`train.py`):

Loads `dataset.json`, extracts all questions into a list.
Fits a `TfidfVectorizer` with settings:
- `analyzer="word"` — word-level tokens
- `ngram_range=(1, 2)` — unigrams and bigrams (captures "taux intérêt" as a unit)
- `min_df=1` — include all terms even if they appear once
- `sublinear_tf=True` — dampens very frequent terms

Transforms all questions into a sparse TF-IDF matrix.
Saves a dict to `model.pkl` via pickle:
```python
model = {
    "vectorizer": vectorizer,           # fitted TfidfVectorizer
    "question_vectors": question_vectors, # sparse matrix (n_questions x vocab_size)
    "questions": questions,             # list of question strings
    "answers": answers,                 # list of answer strings (same index)
}
```

**Step 3 — Serve** (`app.py`):

On startup: loads `model.pkl` into the global `_model` variable.
On `POST /chat`:
1. Vectorizes the incoming message using the same fitted vectorizer
2. Computes cosine similarity between the message vector and all question vectors
3. Picks the index with the highest similarity score (`argmax`)
4. If score < 0.15 (confidence threshold): returns the fallback message
5. Otherwise: returns `answers[best_idx]`

The three endpoints:
- `GET /health` — returns `{ "status": "ok", "model_loaded": true/false }`
- `POST /chat` — main inference endpoint
- `POST /retrain` — runs build_dataset.py then train.py as subprocesses, reloads model

**Step 4 — Retrain after content changes**:

When an admin adds new courses or chapters, the model is stale.
Call `POST /retrain` to rebuild dataset from DB and retrain.
This can be triggered manually or wired to an admin action.

### 1.7 The Widget — How the Chatbot Loads in the UI

`_widget.html.twig` is included at the bottom of `base.html.twig`, making it
available on every client page automatically. No page needs to opt in.

The widget renders:
1. A fixed FAB button (`#dinari-chat-fab`) at bottom-right, z-index 9999
2. A hidden chat window (`#dinari-chat-window`) that animates open/closed via CSS transform
3. Quick suggestion chips (5 pre-filled questions the user can click)
4. A textarea input with auto-resize and Enter-to-send
5. A typing indicator (3 animated dots) shown while waiting for a response

The JS is wrapped in an IIFE `(function() { ... })()` so it does not pollute
the global scope. Key behaviors:
- First open triggers a greeting message (only once per page load via `greeted` flag)
- After 3 seconds without opening, a red unread badge appears on the FAB
- Escape key closes the window
- `fetch()` calls `{{ path('app_chatbot_message') }}` — Twig generates the correct URL at render time

### 1.8 Step-by-Step Code Flow

```
1.  User clicks FAB button or a suggestion chip
2.  toggleChat() runs — adds class "open" to chat window (CSS transition animates it in)
3.  If first open: addBotMessage("Bonjour ! 👋 Je suis l'assistant Dinari...")
4.  User types message, presses Enter (or clicks send button)
5.  sendMessage(text) is called
6.  addUserMessage(text) — renders user bubble immediately (optimistic UI)
7.  input.value = '' — clears the textarea
8.  suggs.style.display = 'none' — hides suggestion chips
9.  isWaiting = true, sendBtn.disabled = true — prevents double-send
10. showTyping() — renders animated 3-dot bubble
11. fetch(API_URL, { method: 'POST', body: JSON.stringify({ message: text }) })
12. Symfony router matches POST /chatbot/message → AssistantController::message()
13. Controller: json_decode body, trim message, check length ≤ 500
14. Controller calls AssistantService::respond($message)
15. AssistantService: HTTP POST to http://localhost:8001/chat with 8s timeout
16. FastAPI /chat: vectorizes message, computes cosine similarity
17. FastAPI: returns { "reply": "best matching answer" } or fallback
18. AssistantService: returns reply string to controller
19. Controller: return $this->json(['reply' => $reply])
20. JS fetch resolves: removeTyping(), addBotMessage(data.reply)
21. Bot bubble appears, isWaiting = false, sendBtn re-enabled
```

### 1.9 Important Methods

**`AssistantController::message()`**
- In: JSON body `{ "message": "..." }`
- Validates: message length ≤ 500 chars (returns early with error message if too long)
- Calls: `AssistantService::respond($message)`
- Out: `JsonResponse { "reply": "..." }`

**`AssistantService::respond(string $message)`**
- In: raw user message string
- If empty: returns greeting without calling Python
- Makes HTTP POST to `$chatbotUrl . '/chat'` with 8s timeout
- Catches `TransportExceptionInterface` → returns "service unavailable" message
- Catches `\Throwable` → returns fallback message
- Out: reply string

**`AssistantService::fallback()`**
- Returns a static suggestion string: "Je ne suis pas sûr... Essayez: ..."
- Called when Python returns non-200 or throws

**`app.py::chat(req: ChatRequest)`**
- In: `{ "message": "..." }`
- Vectorizes message with fitted vectorizer
- Computes cosine similarity against all training question vectors
- Returns best answer if similarity ≥ 0.15, else FALLBACK constant
- Out: `{ "reply": "..." }`

**`build_dataset.py::build_pairs(cursor)`**
- In: MySQL cursor
- Queries courses, chapters, quizzes
- Calls `clean(text)` to strip HTML tags and collapse whitespace
- Returns list of `{ "question": str, "answer": str }` dicts

**`train.py::train()`**
- In: `dataset.json` on disk
- Fits TF-IDF vectorizer on all questions
- Saves `model.pkl`
- Prints vocabulary size and training pair count

### 1.10 Bundles / Libraries Used

| Library | Why |
|---|---|
| `symfony/http-client` | Makes synchronous HTTP requests from PHP to the Python microservice |
| `fastapi` | Lightweight Python web framework — minimal boilerplate for the ML API |
| `uvicorn` | ASGI server to run FastAPI (`uvicorn app:app --host 0.0.0.0 --port 8001`) |
| `scikit-learn` | TF-IDF vectorizer + cosine similarity — the core ML logic |
| `mysql-connector-python` | Direct DB access in build_dataset.py (bypasses Symfony/Doctrine) |
| `python-dotenv` | Reads `.env` for DB credentials in Python scripts |

### 1.11 Example Flow — Concrete Message

```
User types: "C'est quoi un budget ?"

→ POST /chatbot/message { "message": "C'est quoi un budget ?" }
→ AssistantController: length OK (25 chars)
→ AssistantService: POST http://localhost:8001/chat
→ FastAPI: vectorizes "C'est quoi un budget ?"
→ Cosine similarity: exact match in STATIC_PAIRS → score ~1.0
→ Returns: "Un budget est un plan financier qui répartit vos revenus
   entre dépenses, épargne et investissements. La règle 50/30/20..."
→ AssistantService returns that string
→ Controller: JsonResponse { "reply": "Un budget est un plan financier..." }
→ Widget: bot bubble renders with the answer
```

### 1.12 Design Choices

**Why a separate Python microservice?**
The ML stack (scikit-learn TF-IDF, cosine similarity) is Python-native. Doing
this in PHP would require a heavy FFI bridge or a full reimplementation.
Separating it means the ML model can be retrained independently without
touching Symfony, and Python's ecosystem handles vectorization natively.

**Why TF-IDF + cosine similarity instead of a neural model?**
The domain is closed and small (dozens of courses, hundreds of Q&A pairs).
TF-IDF is fast, deterministic, requires no GPU, and works well for keyword-heavy
fintech vocabulary. A neural model would be overkill and harder to retrain.

**Why no external AI API?**
Keeps all data on-platform, zero API cost, works offline, no rate limits,
no privacy concerns about sending user questions to third parties.

**Limitations:**
- No conversation memory (each message is independent)
- No semantic understanding — only keyword overlap
- Answers are only as good as the training data quality
- If the Python service is down, the chatbot is unavailable

---

## 2. Notifications

### 2.1 Purpose

The notification system creates personalized in-app alerts for users based on
their quiz performance and recommendation generation. Notifications are scoped
to the browser session (no user accounts needed).

### 2.2 What Problem It Solves

Without notifications, users would have no feedback loop after completing a quiz.
The system automatically tells them:
- Score < 50%: "⚠️ You scored poorly — review these topics"
- Score ≥ 80%: "🎉 Excellent! Move to the next level"
- Recommendations ready: "🎯 3 personalized recommendations generated for you"

### 2.3 Architecture Diagram

```
User submits quiz answers
  |
  v
POST /recommandations/enregistrer-resultat
  |
  v
RecommendationController::saveResult()
  |  1. creates QuizResultat entity
  |  2. persists to DB
  |  3. dispatches QuizCompletedEvent
  v
Symfony EventDispatcher
  |  routes event to all subscribers
  v
NotificationEventSubscriber::onQuizCompleted()
  |  calls
  v
NotificationService::notifyQuizResult(QuizResultat, sessionId)
  |  checks score percentage
  |  creates Notification entity (warning or success)
  v
EntityManager::persist() + flush()
  |
  v
notification table in MySQL

Later: user visits /notifications
  v
NotificationController::index()
  |  queries NotificationRepository::findBySession()
  v
templates/client/notifications/index.html.twig
  |  renders notification cards
  v
User clicks a card → JS fetch POST /notifications/{id}/read
  v
NotificationController::markRead() → sets isRead = true
```

### 2.4 Files Involved

| File | What it does |
|---|---|
| `src/Entity/Notification.php` | Doctrine entity. Stores one notification: message, type, isRead, sessionId, createdAt |
| `src/Repository/NotificationRepository.php` | DB queries: findBySession, countUnread, markAllRead |
| `src/Service/NotificationService.php` | Business logic. Decides what message to create based on quiz score |
| `src/Event/QuizCompletedEvent.php` | Event object. Carries QuizResultat + sessionId. Fired after quiz save |
| `src/Event/RecommendationsGeneratedEvent.php` | Event object. Carries sessionId + recommendation count |
| `src/EventSubscriber/NotificationEventSubscriber.php` | Listens to both events, delegates to NotificationService |
| `src/Controller/Client/NotificationController.php` | HTTP routes: list, unread count, mark one read, mark all read |
| `templates/client/notifications/index.html.twig` | Notification list UI with read/unread styling and JS interactions |


### 2.5 The Notification Entity

```php
// src/Entity/Notification.php
class Notification
{
    public const TYPE_SUCCESS = 'success';  // green — good score
    public const TYPE_WARNING = 'warning';  // orange — poor score
    public const TYPE_INFO    = 'info';     // blue — recommendations ready

    private ?int    $id;
    private string  $message;       // the notification text
    private string  $type;          // success | warning | info
    private bool    $isRead;        // false by default
    private \DateTime $createdAt;   // set in constructor
    private string  $sessionId;     // browser session ID — the "user" identifier
}
```

There is no User entity. The `sessionId` is the only way to associate a
notification with a browser session. This means notifications are lost if
the user clears their cookies.

### 2.6 How Notifications Are Created

`NotificationService` has three public methods:

**`notifyQuizResult(QuizResultat $resultat, string $sessionId)`**
- Gets the score percentage from `$resultat->getScorePourcentage()`
- If score < 50%: creates a WARNING notification
  - Message: "⚠️ Score de X% sur 'Quiz Title'. Nous vous recommandons de revoir [topics]."
  - Topics come from `$quiz->getThemeKeywords()` — the comma-separated theme field
- If score ≥ 80%: creates a SUCCESS notification
  - Message: "🎉 Excellent ! X% sur 'Quiz Title'. Passez au niveau supérieur !"
- If score is 50–79%: no notification created (acceptable range)

**`notifyRecommendationsGenerated(string $sessionId, int $count)`**
- Creates an INFO notification
- Message: "🎯 3 recommandation(s) personnalisée(s) générée(s) pour vous."

**`create(string $sessionId, string $message, string $type)`**
- The base method. Creates a Notification entity, persists and flushes it.
- Called by the two methods above.

### 2.7 The Event System — Why Event-Driven Architecture?

Instead of calling `NotificationService` directly from the controller, the
controller dispatches an event. The subscriber handles the notification creation.

**Why this matters:**
- The controller (`RecommendationController::saveResult`) does not need to know
  that notifications exist. It just says "a quiz was completed" and moves on.
- If you want to add more reactions to quiz completion (send an email, update
  stats, trigger a badge), you add a new subscriber — zero changes to the controller.
- This is the Open/Closed Principle: open for extension, closed for modification.

**How it works in Symfony:**
`NotificationEventSubscriber` implements `EventSubscriberInterface` and declares
which events it listens to via `getSubscribedEvents()`:

```php
public static function getSubscribedEvents(): array
{
    return [
        QuizCompletedEvent::NAME           => 'onQuizCompleted',
        RecommendationsGeneratedEvent::NAME => 'onRecommendationsGenerated',
    ];
}
```

Symfony's `autoconfigure: true` in `services.yaml` automatically registers this
class as an event subscriber — no manual tag needed.

### 2.8 The Event Objects

**`QuizCompletedEvent`** (event name: `'quiz.completed'`):
```php
final class QuizCompletedEvent extends Event
{
    public const NAME = 'quiz.completed';
    public function __construct(
        private readonly QuizResultat $resultat,
        private readonly string       $sessionId,
    ) {}
}
```
Carries the full `QuizResultat` entity (with score, quiz reference, session)
and the session ID. Dispatched in `RecommendationController::saveResult()`.

**`RecommendationsGeneratedEvent`** (event name: `'recommendations.generated'`):
```php
final class RecommendationsGeneratedEvent extends Event
{
    public const NAME = 'recommendations.generated';
    public function __construct(
        private readonly string $sessionId,
        private readonly int    $count,
    ) {}
}
```
Carries the session ID and how many recommendations were generated.
Dispatched in `RecommendationController::index()` when recommendations are non-empty.

### 2.9 Controllers and Routes

| Route | Method | Controller method | What it does |
|---|---|---|---|
| `/notifications` | GET | `index()` | Renders all notifications for the session |
| `/notifications/unread-count` | GET | `unreadCount()` | Returns `{ "count": N }` as JSON |
| `/notifications/{id}/read` | POST | `markRead()` | Sets isRead=true for one notification |
| `/notifications/mark-all-read` | POST | `markAllRead()` | Marks all session notifications as read |

**Security note in `markRead()`:**
```php
if (!$notif || $notif->getSessionId() !== $sessionId) {
    return new JsonResponse(['error' => 'Not found'], 404);
}
```
This prevents one session from marking another session's notifications as read.

### 2.10 The Repository

**`NotificationRepository`** has three custom methods:

`findBySession(string $sessionId): array`
- Returns all notifications for the session, ordered by `createdAt DESC`
- Used by the list page

`countUnread(string $sessionId): int`
- Counts notifications where `isRead = false` for the session
- Used by the bell badge in the navbar (polled via JS)

`markAllRead(string $sessionId): void`
- Runs a bulk UPDATE query — does not load entities into memory
- More efficient than loading all notifications and setting each one

### 2.11 The Notification UI

`templates/client/notifications/index.html.twig` renders notification cards.
Each card has:
- A colored icon circle (green for success, orange for warning, blue for info)
- The message text
- The creation timestamp
- A blue left border if unread (`.notif-card.unread`)

**JS interactions (inline in the template):**
- Clicking an unread card: `fetch POST /notifications/{id}/read` → removes `.unread` class
- "Mark all read" button: `fetch POST /notifications/mark-all-read` → removes all `.unread` classes
- Both call `updateBellCount()` which re-fetches `/notifications/unread-count` to update the badge

### 2.12 Step-by-Step Code Flow — Quiz Completion → Notification

```
1.  User submits quiz form (POST /recommandations/enregistrer-resultat)
2.  RecommendationController::saveResult() runs
3.  Finds Quiz entity by quiz_id
4.  Creates QuizResultat: sessionId, quiz, scoreObtenu, scoreMax, niveau
5.  $em->persist($resultat); $em->flush(); — saved to DB
6.  $dispatcher->dispatch(new QuizCompletedEvent($resultat, $sessionId), 'quiz.completed')
7.  Symfony EventDispatcher finds NotificationEventSubscriber registered for 'quiz.completed'
8.  Calls NotificationEventSubscriber::onQuizCompleted($event)
9.  Calls NotificationService::notifyQuizResult($event->getResultat(), $event->getSessionId())
10. NotificationService: $pct = $resultat->getScorePourcentage()
11. If $pct < 50: builds warning message with quiz title + theme keywords
12. Calls $this->create($sessionId, $msg, Notification::TYPE_WARNING)
13. create(): new Notification(), setSessionId, setMessage, setType
14. $em->persist($notif); $em->flush(); — notification saved to DB
15. Controller returns JsonResponse { "success": true, "pourcentage": 45.0 }
16. Next time user visits /notifications: the warning card appears
```

### 2.13 Example Flow — Concrete Scenario

```
User completes quiz "Les bases du budget" with score 3/10 (30%)

→ POST /recommandations/enregistrer-resultat
   { quiz_id: 1, score_obtenu: 3, score_max: 10, niveau: "debutant" }

→ QuizResultat saved: sessionId="abc123", scoreObtenu=3, scoreMax=10

→ QuizCompletedEvent dispatched

→ NotificationService::notifyQuizResult():
   pct = (3/10)*100 = 30.0
   pct < 50 → WARNING
   quiz.getThemeKeywords() = ["budget", "depenses"]
   message = "⚠️ Score de 30% sur 'Les bases du budget'.
              Nous vous recommandons de revoir budget, depenses."

→ Notification saved: type=warning, isRead=false, sessionId="abc123"

→ User visits /notifications → sees the warning card with orange icon
→ User clicks the card → card loses blue border (marked as read)
```

### 2.14 Design Choices

**Why event-driven instead of direct service call?**
Decoupling. The controller does not need to know about notifications.
Adding new reactions to quiz completion (email, badge, stats update) requires
zero changes to the controller — just a new subscriber.

**Why session-based instead of user-based?**
The platform has no user authentication. Session IDs are the only available
identifier. This is a deliberate design choice to avoid requiring registration.

**Limitation:** Notifications are lost when the session expires or cookies are cleared.

---

## 3. Recommendations

### 3.1 Purpose

The recommendation engine analyzes a user's quiz history and returns a ranked
list of courses personalized to their level and weak topics. It answers the
question: "Given what this user knows and struggles with, what should they study next?"

### 3.2 What Problem It Solves

Without recommendations, users must manually browse all courses and guess what
to study. The engine automates this by:
- Inferring the user's skill level from their average quiz score
- Identifying topics where they scored poorly
- Ranking courses by how well they match the user's needs

### 3.3 Architecture Diagram

```
User visits /recommandations (or quiz result triggers it)
  |
  v
RecommendationController::index()
  |  gets sessionId from Symfony session
  |  calls RecommendationService::recommend()
  |  calls QuizResultatRepository for history/stats
  |  dispatches RecommendationsGeneratedEvent
  v
RecommendationService::recommend(sessionId, niveau, limit)
  |  1. resolveLevel() — infer or use provided level
  |  2. findWeakTopics() — from QuizResultatRepository
  |  3. findAttemptedCoursIds() — from QuizResultatRepository
  |  4. findAll() — all courses from CoursRepository
  |  5. scoreCours() — score each course
  |  6. usort() — sort by score descending
  |  7. array_slice() — return top N
  v
array of [ cours: Cours, score: int, reasons: string[] ]
  |
  v
templates/client/recommandations/index.html.twig
  |  renders recommendation cards with score badges and reason chips
  v
User sees personalized course grid
```

### 3.4 Files Involved

| File | What it does |
|---|---|
| `src/Service/RecommendationService.php` | Core scoring engine. Ranks all courses for a session |
| `src/Controller/Client/RecommendationController.php` | Three routes: page, API, save quiz result |
| `src/Repository/QuizResultatRepository.php` | Queries quiz history, computes weak topics, average score |
| `src/Repository/CoursRepository.php` | Fetches all courses (findAll) |
| `src/Entity/QuizResultat.php` | Stores one quiz attempt: sessionId, quiz, scoreObtenu, scoreMax |
| `src/Entity/Quiz.php` | Has getThemeKeywords() — parses comma-separated theme field |
| `src/Entity/Cours.php` | Has getNiveau(), getThemeKeywords() — used for scoring |
| `src/Event/QuizCompletedEvent.php` | Fired after quiz result saved |
| `src/Event/RecommendationsGeneratedEvent.php` | Fired after recommendations computed |
| `templates/client/recommandations/index.html.twig` | Full recommendations page UI |

