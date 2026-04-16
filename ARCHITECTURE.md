# Dinari — Architecture & Project Documentation

> Tunisian fintech learning platform built with Symfony 6.4.
> This document covers the full project structure, features, APIs, database schema, and AI integration.

---

## 1. Project Overview

Dinari is a web-based fintech education platform that allows users to:
- Browse and study fintech courses organized into chapters
- Take quizzes and receive instant feedback
- Get personalized course recommendations based on quiz performance
- Track their learning progress and statistics
- Interact with an AI-powered domain-specific chatbot
- Receive smart notifications about their progress

The platform has two sides: a **client-facing frontend** and an **admin dashboard** for content management.

---

## 2. Technology Stack

| Layer | Technology |
|---|---|
| Framework | Symfony 6.4 (PHP 8.1+) |
| ORM | Doctrine ORM 3.x |
| Templating | Twig 3.x |
| Frontend JS | Stimulus 3 + Turbo 7 (Hotwire) |
| Asset Pipeline | Symfony Asset Mapper (importmap) |
| Charts | Chart.js 4 via symfony/ux-chartjs |
| Admin UI | EasyAdmin 4 (secondary admin) + custom admin |
| CSS | Bootstrap 5 + custom design tokens |
| Database | MySQL (via Doctrine) |
| Mailer | Symfony Mailer |
| Events | Symfony EventDispatcher |

---

## 3. Main Features

### 3.1 Courses (Cours)
- Courses are the top-level learning units, each with a title, description, difficulty level, and theme keywords.
- Each course contains multiple ordered chapters (Chapitre).
- Users can browse all courses, select one, and read its chapters.
- Comments can be posted per chapter with emoji reactions.

### 3.2 Chapters (Chapitre)
- Each chapter belongs to one course and has a position for ordering.
- Content fields: intro, main content (contenuPrincipal), key takeaways (aRetenir), video URL, image.
- Chapters can have sub-tasks (ChapitreTache) and reflection questions (ChapitreQuestion).

### 3.3 Quiz System
- Quizzes are linked to courses and contain a question, multiple-choice answers, and a correct answer.
- Two modes: practice mode and timed exam mode (isExamMode + timeLimit).
- After submission, a QuizResultat is saved with the session ID, score obtained, and score max.
- Score percentage is computed automatically.

### 3.4 Recommendations
- After each quiz, the RecommendationService analyzes the session's quiz history.
- It infers the user's level (debutant / intermediaire / avance) based on average score.
- It matches weak topics (from low-scoring quizzes) against course theme keywords.
- Returns a ranked list of recommended courses with reasons.

### 3.5 Notifications
- The NotificationEventSubscriber listens to QuizCompletedEvent and RecommendationsGeneratedEvent.
- On quiz completion: if score < 50%, a warning notification is created; if score >= 80%, a success notification.
- Notifications are stored per session ID and can be marked as read.

### 3.6 Statistics
- Client statistics page shows: quiz history, average score, weak topics, inferred level, number of recommendations.
- Visualized with Chart.js bar chart (score history) and pie chart (weak topics).
- Admin statistics page shows: platform-wide counts, global average score, global weak topics, overview charts.

### 3.7 Comments & Reactions
- Users can post comments on course chapters (identified by slug + chapter key).
- Comments support emoji reactions (👍 👎 😄 🎉 😮 ❤️ 🚀 👀).
- Session-based ownership: users can edit/delete only their own comments.

### 3.8 Chatbot (AI Assistant)
- A floating chat widget available on every page (injected via base.html.twig).
- Domain-specific: answers only questions about Dinari's courses, chapters, quizzes, and financial concepts.
- No external AI API — all answers are generated from the platform's own database and a built-in knowledge base.
- See Section 7 for full chatbot documentation.

### 3.9 Admin Dashboard
- Custom admin at `/admin` with sidebar navigation.
- Manages: courses, chapters, quizzes, comments, statistics.
- Secondary EasyAdmin interface at `/easyadmin` for CRUD operations.
- Live search for courses via AJAX.

### 3.10 Internationalization (i18n)
- Three languages: French (FR), English (EN), Arabic (AR) with RTL support.
- Language is stored in localStorage and applied client-side via a translation map in base.html.twig.
- Pages can extend translations by defining `applyPageTranslations(lang)`.

---

## 4. Database Structure

### Entity: Cours (table: cours_symfony)
| Column | Type | Description |
|---|---|---|
| id_cours | int (PK) | Auto-generated ID |
| nom_cours | string(150) | Course title |
| contenu | string(255) | Slug identifier (e.g. "finance-personnelle") |
| description | text | Full description |
| date_creation | date | Creation date |
| niveau | string(20) | Difficulty: debutant / intermediaire / avance |
| theme | string(255) | Comma-separated topic keywords (e.g. "budget,epargne") |

Relations: one-to-many with Chapitre, one-to-many with Quiz.

---

### Entity: Chapitre (table: chapitre)
| Column | Type | Description |
|---|---|---|
| id | int (PK) | Auto-generated ID |
| position | int | Display order within the course |
| titre | string(200) | Chapter title |
| sous_titre | string(255) | Subtitle |
| intro | text | Introduction text |
| contenu_principal | text | Main content body |
| a_retenir | text | Key takeaways |
| video_url | string(500) | Optional video link |
| image_url | string(500) | Optional image |
| image_titre | string(255) | Image caption title |
| image_description | string(500) | Image caption description |
| contenu | text | Legacy content field (kept for BC) |
| id_cours | int (FK) | Parent course |

Relations: many-to-one with Cours, one-to-many with ChapitreTache, one-to-many with ChapitreQuestion.

---

### Entity: Quiz (table: quiz_symfony)
| Column | Type | Description |
|---|---|---|
| id_quiz | int (PK) | Auto-generated ID |
| titre | string(255) | Question text |
| liste_reponse | text | Comma-separated answer choices |
| reponse_correct | string(255) | The correct answer |
| score_quiz | int | Points awarded for this quiz |
| date_creation | date | Creation date |
| is_exam_mode | boolean | Whether timed exam mode is active |
| time_limit | int | Time limit in minutes (exam mode) |
| id_cours | int (FK) | Parent course |
| theme | string(255) | Comma-separated topic keywords |

Relations: many-to-one with Cours, one-to-many with QuizResultat.

---

### Entity: QuizResultat (table: quiz_resultat)
| Column | Type | Description |
|---|---|---|
| id | int (PK) | Auto-generated ID |
| session_id | string | Browser session identifier |
| score_obtenu | int | Points scored |
| score_max | int | Maximum possible points |
| niveau_utilisateur | string | Level at time of attempt |
| created_at | datetime | Timestamp |
| id_quiz | int (FK) | The quiz attempted |

Computed: `getScorePourcentage()` = (score_obtenu / score_max) * 100.

---

### Entity: Commentaire (table: commentaire)
| Column | Type | Description |
|---|---|---|
| id | int (PK) | Auto-generated ID |
| auteur | string | Author name |
| contenu | text | Comment body |
| cours_slug | string | Course slug (links comment to course) |
| chapitre | string | Chapter key (e.g. "budget") |
| date_creation | datetime | Timestamp |

Relations: one-to-many with Reaction.

---

### Entity: Reaction (table: reaction)
| Column | Type | Description |
|---|---|---|
| id | int (PK) | Auto-generated ID |
| emoji | string | Emoji character |
| session_id | string | Session that reacted |
| commentaire_id | int (FK) | Parent comment |

---

### Entity: Notification (table: notification)
| Column | Type | Description |
|---|---|---|
| id | int (PK) | Auto-generated ID |
| session_id | string | Target session |
| message | text | Notification text |
| type | string | info / success / warning |
| is_read | boolean | Read status |
| created_at | datetime | Timestamp |

---

### Entity: ChapitreTache (table: chapitre_tache)
Practical tasks/exercises linked to a chapter. Fields: libelle (task label), position, chapitre_id (FK).

### Entity: ChapitreQuestion (table: chapitre_question)
Reflection questions linked to a chapter. Fields: question text, position, chapitre_id (FK).

---

## 5. API Endpoints

All routes use Symfony attribute-based routing. No authentication is required (session-based only).

### Client Routes

| Method | Path | Route Name | Description |
|---|---|---|---|
| GET | `/` | app_home | Homepage with latest 3 courses |
| GET/POST | `/cours` | app_cours_index | Course listing + comment submission |
| POST | `/cours/commentaire/{id}/edit` | app_commentaire_edit | Edit own comment |
| POST | `/cours/commentaire/{id}/delete` | app_commentaire_delete | Delete own comment |
| POST | `/cours/commentaire/{id}/react` | app_commentaire_react | Toggle emoji reaction (JSON) |
| GET | `/cours/new` | app_cours_new | Create course form (scaffold) |
| GET | `/cours/{id}` | app_cours_show | Show single course |
| GET/POST | `/cours/{id}/edit` | app_cours_edit | Edit course form (scaffold) |
| POST | `/cours/{id}` | app_cours_delete | Delete course |
| GET | `/quiz` | app_quiz_index | Quiz listing |
| GET | `/quiz/{id}` | app_quiz_show | Take a quiz |
| GET/POST | `/quiz/new` | app_quiz_new | Create quiz form (scaffold) |
| GET/POST | `/quiz/{id}/edit` | app_quiz_edit | Edit quiz form (scaffold) |
| POST | `/quiz/{id}` | app_quiz_delete | Delete quiz |
| GET | `/recommandations` | app_recommandations | Personalized recommendations page |
| GET | `/recommandations/api` | app_recommandations_api | Recommendations as JSON |
| POST | `/recommandations/enregistrer-resultat` | app_quiz_save_result | Save quiz result + fire events |
| GET | `/notifications` | app_notifications | Notifications list |
| GET | `/notifications/unread-count` | app_notifications_unread_count | Unread count (JSON) |
| POST | `/notifications/{id}/read` | app_notification_mark_read | Mark one notification read (JSON) |
| POST | `/notifications/mark-all-read` | app_notifications_mark_all_read | Mark all read (JSON) |
| GET | `/statistiques` | app_statistiques | User learning statistics |
| POST | `/chatbot/message` | app_chatbot_message | Chatbot message endpoint (JSON) |

### Admin Routes

| Method | Path | Route Name | Description |
|---|---|---|---|
| GET | `/admin` | admin_dashboard | Admin dashboard with course tree |
| GET | `/admin/search-cours` | admin_search_cours | Live course search (JSON) |
| GET | `/admin/cours` | admin_cours_index | Course management list |
| GET/POST | `/admin/cours/new` | admin_cours_new | Create course |
| GET/POST | `/admin/cours/{id}/edit` | admin_cours_edit | Edit course |
| POST | `/admin/cours/{id}/delete` | admin_cours_delete | Delete course |
| GET | `/admin/cours/{coursId}/chapitres` | admin_chapitre_index | Chapter list for a course |
| GET/POST | `/admin/cours/{coursId}/chapitres/new` | admin_chapitre_new | Create chapter |
| GET/POST | `/admin/cours/{coursId}/chapitres/{id}/edit` | admin_chapitre_edit | Edit chapter |
| POST | `/admin/cours/{coursId}/chapitres/{id}/delete` | admin_chapitre_delete | Delete chapter |
| GET | `/admin/quiz` | admin_quiz_index | Quiz management list |
| GET/POST | `/admin/quiz/new` | admin_quiz_new | Create quiz |
| GET/POST | `/admin/quiz/{id}/edit` | admin_quiz_edit | Edit quiz |
| POST | `/admin/quiz/{id}/delete` | admin_quiz_delete | Delete quiz |
| GET | `/admin/commentaires` | admin_commentaire_index | Comment moderation |
| POST | `/admin/commentaires/{id}/delete` | admin_commentaire_delete | Delete comment |
| GET | `/admin/statistiques` | admin_statistiques | Platform-wide statistics |
| * | `/easyadmin` | easyadmin | EasyAdmin CRUD interface |

---

## 6. Application Architecture

```
Browser
  │
  ├── GET/POST requests
  │
  ▼
Symfony Router (config/routes.yaml — attribute scan of src/Controller/)
  │
  ├── Client Controllers (src/Controller/Client/)
  │     ├── HomeController          → templates/client/home/
  │     ├── CoursController         → templates/client/cours/
  │     ├── QuizController          → templates/client/quiz/
  │     ├── RecommendationController→ templates/client/recommandations/
  │     ├── NotificationController  → templates/client/notifications/
  │     ├── StatistiquesController  → templates/client/statistiques/
  │     └── ChatbotController       → JSON response (no template)
  │
  ├── Admin Controllers (src/Controller/Admin/)
  │     ├── AdminDashboardController    → templates/admin/dashboard/
  │     ├── AdminCoursController        → templates/admin/cours/
  │     ├── AdminChapitreController     → templates/admin/chapitre/
  │     ├── AdminQuizController         → templates/admin/quiz/
  │     ├── AdminCommentaireController  → templates/admin/commentaire/
  │     ├── AdminStatistiquesController → templates/admin/statistiques/
  │     └── EasyAdmin/ (DinariDashboardController + CRUD controllers)
  │
  ├── Services (src/Service/)
  │     ├── ChatbotService       — domain-specific Q&A engine
  │     ├── RecommendationService— personalized course matching
  │     └── NotificationService  — creates session notifications
  │
  ├── Events (src/Event/)
  │     ├── QuizCompletedEvent           — fired after quiz result saved
  │     └── RecommendationsGeneratedEvent— fired after recommendations computed
  │
  ├── EventSubscriber (src/EventSubscriber/)
  │     └── NotificationEventSubscriber — listens to both events, calls NotificationService
  │
  └── Doctrine ORM
        ├── Entities (src/Entity/)
        └── Repositories (src/Repository/)
```

### Template Inheritance
```
templates/base.html.twig          ← client pages extend this
templates/admin/base.html.twig    ← admin pages extend this
  └── templates/client/**/*.twig
  └── templates/admin/**/*.twig
  └── templates/chatbot/_widget.html.twig  ← included in base.html.twig
```

### Event Flow (Quiz Completion)
```
User submits quiz
  → POST /recommandations/enregistrer-resultat
  → QuizResultat saved to DB
  → QuizCompletedEvent dispatched
  → NotificationEventSubscriber::onQuizCompleted()
  → NotificationService::notifyQuizResult()
  → Notification saved to DB (warning if score < 50%, success if >= 80%)
```

---

## 7. AI Chatbot Integration

### Overview
The chatbot is a **domain-specific rule-based assistant** built entirely in PHP. It does not use any external AI API (no OpenAI, no Gemini, etc.). All intelligence comes from:
1. A built-in knowledge base of financial concepts (budget, saving, investment, fintech)
2. Live queries to the platform's own database (courses, chapters, quizzes)

### Architecture

```
User types message in browser
  → POST /chatbot/message  (JSON: { "message": "..." })
  → ChatbotController::message()
  → ChatbotService::respond(string $message): string
  → JSON response: { "reply": "..." }
```

### ChatbotService Logic (src/Service/ChatbotService.php)

The service processes messages through a priority chain:

1. **Greeting detection** — responds with a welcome message
2. **Help/capability query** — lists what the bot can do
3. **Course listing** — queries CoursRepository, supports level filtering
4. **Chapter questions** — queries ChapitreRepository, matches course names
5. **Quiz guidance** — explains quiz mechanics, score system, exam mode (never gives direct answers)
6. **Budget concept** — built-in explanation with the 50/30/20 rule
7. **Saving concept** — built-in explanation with types and tips
8. **Investment concept** — built-in explanation with risk/return principles
9. **Fintech concept** — built-in explanation of the fintech domain
10. **Learning path** — queries all courses grouped by level
11. **Recommendations** — redirects to the recommendations page
12. **Notifications** — explains the notification system
13. **DB fuzzy search** — searches course names, theme keywords, and chapter titles against the message
14. **Fallback** — suggests example questions

### Frontend Widget (templates/chatbot/_widget.html.twig)
- Floating action button (FAB) fixed at bottom-right, z-index 9999
- Chat window with typing indicator animation
- Quick suggestion chips for common questions
- Auto-resizing textarea input
- Keyboard shortcut: Enter to send, Escape to close
- Unread badge appears after 3 seconds if chat not opened
- Uses existing CSS variables (`--dinari-blue`, etc.) for visual consistency
- Injected once in `base.html.twig` — available on all client pages

### Scope Limitations (by design)
- Only answers questions about Dinari's content domain
- Does not answer general knowledge questions outside fintech/finance
- Does not give direct quiz answers (redirects to study material instead)
- No conversation memory between sessions

---

## 8. Bundles Used

| Bundle | Purpose |
|---|---|
| symfony/framework-bundle | Core Symfony framework |
| symfony/twig-bundle | Twig templating engine |
| symfony/security-bundle | Security layer (in-memory provider) |
| symfony/form | Form handling and validation |
| symfony/validator | Entity constraint validation |
| symfony/mailer | Email sending capability |
| symfony/notifier | Notification channel abstraction |
| symfony/messenger | Message bus / async processing |
| symfony/http-client | HTTP client for external requests |
| symfony/asset-mapper | Modern asset pipeline (replaces Webpack) |
| symfony/stimulus-bundle | Stimulus JS controller integration |
| symfony/ux-turbo | Turbo Drive/Frames for SPA-like navigation |
| symfony/ux-chartjs | Chart.js integration for statistics |
| doctrine/doctrine-bundle | Doctrine ORM integration |
| doctrine/doctrine-migrations-bundle | Database migration management |
| easycorp/easyadmin-bundle | Secondary admin CRUD interface |
| twig/extra-bundle | Extra Twig filters and functions |
| symfony/translation | i18n support |
| symfony/serializer | Object serialization |

---

## 9. Directory Structure

```
Dinari/
├── assets/
│   ├── app.js                    # Stimulus app entry point
│   └── controllers/              # Custom Stimulus controllers
├── config/
│   ├── bundles.php               # Registered bundles
│   ├── packages/                 # Bundle configuration (doctrine, security, etc.)
│   ├── routes.yaml               # Route scanning config
│   └── services.yaml             # DI container config
├── migrations/                   # Doctrine database migrations
├── public/
│   ├── index.php                 # Front controller
│   ├── css/                      # Bootstrap, FontAwesome, custom CSS
│   ├── fonts/                    # FontAwesome web fonts
│   ├── img/                      # Static images
│   └── js/                       # Legacy JS (main.js, plugins.js, vendor/)
├── src/
│   ├── Controller/
│   │   ├── Admin/                # Admin-side controllers + EasyAdmin CRUDs
│   │   └── Client/               # User-facing controllers
│   ├── Entity/                   # Doctrine entities (9 entities)
│   ├── Event/                    # Custom Symfony events
│   ├── EventSubscriber/          # Event listeners
│   ├── Form/
│   │   ├── Admin/                # Admin form types
│   │   ├── CoursType.php         # Client course form (scaffold)
│   │   └── QuizType.php          # Client quiz form (scaffold)
│   ├── Repository/               # Doctrine repositories (6 repos)
│   ├── Service/                  # Business logic services (3 services)
│   └── Kernel.php
└── templates/
    ├── base.html.twig            # Main client layout (navbar, footer, chatbot)
    ├── admin/
    │   ├── base.html.twig        # Admin layout (sidebar)
    │   ├── chapitre/             # Chapter management templates
    │   ├── commentaire/          # Comment moderation templates
    │   ├── cours/                # Course management templates
    │   ├── dashboard/            # Admin dashboard template
    │   ├── easyadmin/            # EasyAdmin custom template
    │   ├── quiz/                 # Quiz management templates
    │   └── statistiques/         # Admin stats template
    ├── chatbot/
    │   └── _widget.html.twig     # Chatbot floating widget
    └── client/
        ├── cours/                # Course browsing + comments
        ├── home/                 # Homepage
        ├── notifications/        # Notifications list
        ├── quiz/                 # Quiz listing and detail
        ├── recommandations/      # Recommendations page
        └── statistiques/         # User stats page
```

---

## 10. Session-Based User Tracking

The platform does not have a traditional user authentication system. Instead, it uses Symfony's session to track:
- Quiz results (linked by `session_id`)
- Notifications (linked by `session_id`)
- Comment ownership (stored as `my_comment_ids` array in session)
- Emoji reaction ownership (linked by `session_id`)

This means all personalization (recommendations, stats, notifications) is scoped to the current browser session.

---

## 11. Key Design Decisions

- **No external AI API**: The chatbot is self-contained, ensuring no data leaves the platform and no API costs.
- **Session-based tracking**: Avoids the need for user registration while still enabling personalization.
- **Theme keywords**: Both `Cours` and `Quiz` entities have a `theme` field (comma-separated keywords) that powers the recommendation engine and chatbot search.
- **Static fallbacks**: Admin controllers include static data arrays so the admin UI is never empty even with a fresh database.
- **Event-driven notifications**: Quiz completion triggers events rather than direct service calls, keeping controllers thin and logic decoupled.
- **Dual admin**: A custom admin (`/admin`) for the main workflow and EasyAdmin (`/easyadmin`) for quick CRUD operations.
