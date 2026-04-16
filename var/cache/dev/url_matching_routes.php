<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/easyadmin/chapitre' => [[['_route' => 'easyadmin_chapitre_index', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/chapitre/new' => [[['_route' => 'easyadmin_chapitre_new', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/easyadmin/chapitre/batch-delete' => [[['_route' => 'easyadmin_chapitre_batch_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/easyadmin/chapitre/autocomplete' => [[['_route' => 'easyadmin_chapitre_autocomplete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/chapitre/render-filters' => [[['_route' => 'easyadmin_chapitre_render_filters', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/commentaire' => [[['_route' => 'easyadmin_commentaire_index', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/commentaire/new' => [[['_route' => 'easyadmin_commentaire_new', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/easyadmin/commentaire/batch-delete' => [[['_route' => 'easyadmin_commentaire_batch_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/easyadmin/commentaire/autocomplete' => [[['_route' => 'easyadmin_commentaire_autocomplete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/commentaire/render-filters' => [[['_route' => 'easyadmin_commentaire_render_filters', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/cours' => [[['_route' => 'easyadmin_cours_index', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/cours/new' => [[['_route' => 'easyadmin_cours_new', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/easyadmin/cours/batch-delete' => [[['_route' => 'easyadmin_cours_batch_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/easyadmin/cours/autocomplete' => [[['_route' => 'easyadmin_cours_autocomplete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/cours/render-filters' => [[['_route' => 'easyadmin_cours_render_filters', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/notification' => [[['_route' => 'easyadmin_notification_index', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/notification/new' => [[['_route' => 'easyadmin_notification_new', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/easyadmin/notification/batch-delete' => [[['_route' => 'easyadmin_notification_batch_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/easyadmin/notification/autocomplete' => [[['_route' => 'easyadmin_notification_autocomplete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/notification/render-filters' => [[['_route' => 'easyadmin_notification_render_filters', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/quiz' => [[['_route' => 'easyadmin_quiz_index', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/quiz/new' => [[['_route' => 'easyadmin_quiz_new', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/easyadmin/quiz/batch-delete' => [[['_route' => 'easyadmin_quiz_batch_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/easyadmin/quiz/autocomplete' => [[['_route' => 'easyadmin_quiz_autocomplete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/quiz/render-filters' => [[['_route' => 'easyadmin_quiz_render_filters', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/quiz-resultat' => [[['_route' => 'easyadmin_quiz_resultat_index', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/quiz-resultat/new' => [[['_route' => 'easyadmin_quiz_resultat_new', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/easyadmin/quiz-resultat/batch-delete' => [[['_route' => 'easyadmin_quiz_resultat_batch_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/easyadmin/quiz-resultat/autocomplete' => [[['_route' => 'easyadmin_quiz_resultat_autocomplete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin/quiz-resultat/render-filters' => [[['_route' => 'easyadmin_quiz_resultat_render_filters', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/commentaires' => [[['_route' => 'admin_commentaire_index', '_controller' => 'App\\Controller\\Admin\\AdminCommentaireController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/cours' => [[['_route' => 'admin_cours_index', '_controller' => 'App\\Controller\\Admin\\AdminCoursController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/cours/new' => [[['_route' => 'admin_cours_new', '_controller' => 'App\\Controller\\Admin\\AdminCoursController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\Admin\\AdminDashboardController::index'], null, null, null, false, false, null]],
        '/admin/search-cours' => [[['_route' => 'admin_search_cours', '_controller' => 'App\\Controller\\Admin\\AdminDashboardController::searchCours'], null, ['GET' => 0], null, false, false, null]],
        '/admin/quiz' => [[['_route' => 'admin_quiz_index', '_controller' => 'App\\Controller\\Admin\\AdminQuizController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/quiz/new' => [[['_route' => 'admin_quiz_new', '_controller' => 'App\\Controller\\Admin\\AdminQuizController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/statistiques' => [[['_route' => 'admin_statistiques', '_controller' => 'App\\Controller\\Admin\\AdminStatistiquesController::index'], null, ['GET' => 0], null, false, false, null]],
        '/easyadmin' => [[['_route' => 'easyadmin', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController::index'], null, null, null, false, false, null]],
        '/chatbot/message' => [[['_route' => 'app_chatbot_message', '_controller' => 'App\\Controller\\Client\\ChatbotController::message'], null, ['POST' => 0], null, false, false, null]],
        '/cours' => [[['_route' => 'app_cours_index', '_controller' => 'App\\Controller\\Client\\CoursController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/cours/new' => [[['_route' => 'app_cours_new', '_controller' => 'App\\Controller\\Client\\CoursController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\Client\\HomeController::index'], null, null, null, false, false, null]],
        '/notifications' => [[['_route' => 'app_notifications', '_controller' => 'App\\Controller\\Client\\NotificationController::index'], null, ['GET' => 0], null, false, false, null]],
        '/notifications/unread-count' => [[['_route' => 'app_notifications_unread_count', '_controller' => 'App\\Controller\\Client\\NotificationController::unreadCount'], null, ['GET' => 0], null, false, false, null]],
        '/notifications/mark-all-read' => [[['_route' => 'app_notifications_mark_all_read', '_controller' => 'App\\Controller\\Client\\NotificationController::markAllRead'], null, ['POST' => 0], null, false, false, null]],
        '/quiz' => [[['_route' => 'app_quiz_index', '_controller' => 'App\\Controller\\Client\\QuizController::index'], null, ['GET' => 0], null, false, false, null]],
        '/quiz/new' => [[['_route' => 'app_quiz_new', '_controller' => 'App\\Controller\\Client\\QuizController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/recommandations' => [[['_route' => 'app_recommandations', '_controller' => 'App\\Controller\\Client\\RecommendationController::index'], null, ['GET' => 0], null, false, false, null]],
        '/recommandations/api' => [[['_route' => 'app_recommandations_api', '_controller' => 'App\\Controller\\Client\\RecommendationController::api'], null, ['GET' => 0], null, false, false, null]],
        '/recommandations/enregistrer-resultat' => [[['_route' => 'app_quiz_save_result', '_controller' => 'App\\Controller\\Client\\RecommendationController::saveResult'], null, ['POST' => 0], null, false, false, null]],
        '/statistiques' => [[['_route' => 'app_statistiques', '_controller' => 'App\\Controller\\Client\\StatistiquesController::index'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/easyadmin/(?'
                    .'|c(?'
                        .'|hapitre/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:52)'
                                .'|delete(*:65)'
                            .')'
                            .'|(*:73)'
                        .')'
                        .'|o(?'
                            .'|mmentaire/([^/]++)(?'
                                .'|/(?'
                                    .'|edit(*:114)'
                                    .'|delete(*:128)'
                                .')'
                                .'|(*:137)'
                            .')'
                            .'|urs/([^/]++)(?'
                                .'|/(?'
                                    .'|edit(*:169)'
                                    .'|delete(*:183)'
                                .')'
                                .'|(*:192)'
                            .')'
                        .')'
                    .')'
                    .'|notification/([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:235)'
                            .'|delete(*:249)'
                        .')'
                        .'|(*:258)'
                    .')'
                    .'|quiz(?'
                        .'|/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:294)'
                                .'|delete(*:308)'
                            .')'
                            .'|(*:317)'
                        .')'
                        .'|\\-resultat/([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:356)'
                                .'|delete(*:370)'
                            .')'
                            .'|(*:379)'
                        .')'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:421)'
                    .'|wdt/([^/]++)(*:441)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:483)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:520)'
                                .'|router(*:534)'
                                .'|exception(?'
                                    .'|(*:554)'
                                    .'|\\.css(*:567)'
                                .')'
                            .')'
                            .'|(*:577)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|co(?'
                        .'|urs/([^/]++)/(?'
                            .'|chapitres(?'
                                .'|(*:631)'
                                .'|/(?'
                                    .'|new(*:646)'
                                    .'|([^/]++)/(?'
                                        .'|edit(*:670)'
                                        .'|delete(*:684)'
                                    .')'
                                .')'
                            .')'
                            .'|edit(*:699)'
                            .'|delete(*:713)'
                        .')'
                        .'|mmentaires/([^/]++)/delete(*:748)'
                    .')'
                    .'|quiz/([^/]++)/(?'
                        .'|edit(*:778)'
                        .'|delete(*:792)'
                    .')'
                .')'
                .'|/cours/(?'
                    .'|commentaire/([^/]++)/(?'
                        .'|edit(*:840)'
                        .'|delete(*:854)'
                        .'|react(*:867)'
                    .')'
                    .'|([^/]++)(?'
                        .'|(*:887)'
                        .'|/edit(*:900)'
                        .'|(*:908)'
                    .')'
                .')'
                .'|/notifications/([^/]++)/read(*:946)'
                .'|/quiz/([^/]++)(?'
                    .'|(*:971)'
                    .'|/edit(*:984)'
                    .'|(*:992)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        52 => [[['_route' => 'easyadmin_chapitre_edit', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        65 => [[['_route' => 'easyadmin_chapitre_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        73 => [[['_route' => 'easyadmin_chapitre_detail', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\ChapitreCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        114 => [[['_route' => 'easyadmin_commentaire_edit', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        128 => [[['_route' => 'easyadmin_commentaire_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        137 => [[['_route' => 'easyadmin_commentaire_detail', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CommentaireCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        169 => [[['_route' => 'easyadmin_cours_edit', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        183 => [[['_route' => 'easyadmin_cours_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        192 => [[['_route' => 'easyadmin_cours_detail', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\CoursCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        235 => [[['_route' => 'easyadmin_notification_edit', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        249 => [[['_route' => 'easyadmin_notification_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        258 => [[['_route' => 'easyadmin_notification_detail', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\NotificationCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        294 => [[['_route' => 'easyadmin_quiz_edit', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        308 => [[['_route' => 'easyadmin_quiz_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        317 => [[['_route' => 'easyadmin_quiz_detail', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        356 => [[['_route' => 'easyadmin_quiz_resultat_edit', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        370 => [[['_route' => 'easyadmin_quiz_resultat_delete', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        379 => [[['_route' => 'easyadmin_quiz_resultat_detail', '_controller' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\DinariDashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\EasyAdmin\\QuizResultatCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        421 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        441 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        483 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        520 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        534 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        554 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        567 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        577 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        631 => [[['_route' => 'admin_chapitre_index', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::index'], ['coursId'], ['GET' => 0], null, false, false, null]],
        646 => [[['_route' => 'admin_chapitre_new', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::new'], ['coursId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        670 => [[['_route' => 'admin_chapitre_edit', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::edit'], ['coursId', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        684 => [[['_route' => 'admin_chapitre_delete', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::delete'], ['coursId', 'id'], ['POST' => 0], null, false, false, null]],
        699 => [[['_route' => 'admin_cours_edit', '_controller' => 'App\\Controller\\Admin\\AdminCoursController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        713 => [[['_route' => 'admin_cours_delete', '_controller' => 'App\\Controller\\Admin\\AdminCoursController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        748 => [[['_route' => 'admin_commentaire_delete', '_controller' => 'App\\Controller\\Admin\\AdminCommentaireController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        778 => [[['_route' => 'admin_quiz_edit', '_controller' => 'App\\Controller\\Admin\\AdminQuizController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        792 => [[['_route' => 'admin_quiz_delete', '_controller' => 'App\\Controller\\Admin\\AdminQuizController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        840 => [[['_route' => 'app_commentaire_edit', '_controller' => 'App\\Controller\\Client\\CoursController::editComment'], ['id'], ['POST' => 0], null, false, false, null]],
        854 => [[['_route' => 'app_commentaire_delete', '_controller' => 'App\\Controller\\Client\\CoursController::deleteComment'], ['id'], ['POST' => 0], null, false, false, null]],
        867 => [[['_route' => 'app_commentaire_react', '_controller' => 'App\\Controller\\Client\\CoursController::react'], ['id'], ['POST' => 0], null, false, false, null]],
        887 => [[['_route' => 'app_cours_show', '_controller' => 'App\\Controller\\Client\\CoursController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        900 => [[['_route' => 'app_cours_edit', '_controller' => 'App\\Controller\\Client\\CoursController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        908 => [[['_route' => 'app_cours_delete', '_controller' => 'App\\Controller\\Client\\CoursController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        946 => [[['_route' => 'app_notification_mark_read', '_controller' => 'App\\Controller\\Client\\NotificationController::markRead'], ['id'], ['POST' => 0], null, false, false, null]],
        971 => [[['_route' => 'app_quiz_show', '_controller' => 'App\\Controller\\Client\\QuizController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        984 => [[['_route' => 'app_quiz_edit', '_controller' => 'App\\Controller\\Client\\QuizController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        992 => [
            [['_route' => 'app_quiz_delete', '_controller' => 'App\\Controller\\Client\\QuizController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
