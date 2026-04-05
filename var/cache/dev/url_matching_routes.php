<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
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
        '/cours' => [[['_route' => 'app_cours_index', '_controller' => 'App\\Controller\\Client\\CoursController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/cours/new' => [[['_route' => 'app_cours_new', '_controller' => 'App\\Controller\\Client\\CoursController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\Client\\HomeController::index'], null, null, null, false, false, null]],
        '/quiz' => [[['_route' => 'app_quiz_index', '_controller' => 'App\\Controller\\Client\\QuizController::index'], null, ['GET' => 0], null, false, false, null]],
        '/quiz/new' => [[['_route' => 'app_quiz_new', '_controller' => 'App\\Controller\\Client\\QuizController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|co(?'
                        .'|urs/([^/]++)/(?'
                            .'|chapitres(?'
                                .'|(*:245)'
                                .'|/(?'
                                    .'|new(*:260)'
                                    .'|([^/]++)/(?'
                                        .'|edit(*:284)'
                                        .'|delete(*:298)'
                                    .')'
                                .')'
                            .')'
                            .'|edit(*:313)'
                            .'|delete(*:327)'
                        .')'
                        .'|mmentaires/([^/]++)/delete(*:362)'
                    .')'
                    .'|quiz/([^/]++)/(?'
                        .'|edit(*:392)'
                        .'|delete(*:406)'
                    .')'
                .')'
                .'|/cours/(?'
                    .'|commentaire/([^/]++)/(?'
                        .'|edit(*:454)'
                        .'|delete(*:468)'
                        .'|react(*:481)'
                    .')'
                    .'|([^/]++)(?'
                        .'|(*:501)'
                        .'|/edit(*:514)'
                        .'|(*:522)'
                    .')'
                .')'
                .'|/quiz/([^/]++)(?'
                    .'|(*:549)'
                    .'|/edit(*:562)'
                    .'|(*:570)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        245 => [[['_route' => 'admin_chapitre_index', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::index'], ['coursId'], ['GET' => 0], null, false, false, null]],
        260 => [[['_route' => 'admin_chapitre_new', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::new'], ['coursId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        284 => [[['_route' => 'admin_chapitre_edit', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::edit'], ['coursId', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        298 => [[['_route' => 'admin_chapitre_delete', '_controller' => 'App\\Controller\\Admin\\AdminChapitreController::delete'], ['coursId', 'id'], ['POST' => 0], null, false, false, null]],
        313 => [[['_route' => 'admin_cours_edit', '_controller' => 'App\\Controller\\Admin\\AdminCoursController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        327 => [[['_route' => 'admin_cours_delete', '_controller' => 'App\\Controller\\Admin\\AdminCoursController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        362 => [[['_route' => 'admin_commentaire_delete', '_controller' => 'App\\Controller\\Admin\\AdminCommentaireController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        392 => [[['_route' => 'admin_quiz_edit', '_controller' => 'App\\Controller\\Admin\\AdminQuizController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        406 => [[['_route' => 'admin_quiz_delete', '_controller' => 'App\\Controller\\Admin\\AdminQuizController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        454 => [[['_route' => 'app_commentaire_edit', '_controller' => 'App\\Controller\\Client\\CoursController::editComment'], ['id'], ['POST' => 0], null, false, false, null]],
        468 => [[['_route' => 'app_commentaire_delete', '_controller' => 'App\\Controller\\Client\\CoursController::deleteComment'], ['id'], ['POST' => 0], null, false, false, null]],
        481 => [[['_route' => 'app_commentaire_react', '_controller' => 'App\\Controller\\Client\\CoursController::react'], ['id'], ['POST' => 0], null, false, false, null]],
        501 => [[['_route' => 'app_cours_show', '_controller' => 'App\\Controller\\Client\\CoursController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        514 => [[['_route' => 'app_cours_edit', '_controller' => 'App\\Controller\\Client\\CoursController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        522 => [[['_route' => 'app_cours_delete', '_controller' => 'App\\Controller\\Client\\CoursController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        549 => [[['_route' => 'app_quiz_show', '_controller' => 'App\\Controller\\Client\\QuizController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        562 => [[['_route' => 'app_quiz_edit', '_controller' => 'App\\Controller\\Client\\QuizController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        570 => [
            [['_route' => 'app_quiz_delete', '_controller' => 'App\\Controller\\Client\\QuizController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
