<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/accueil' => [[['_route' => 'app_accueil', '_controller' => 'App\\Controller\\AccueilController::index'], null, null, null, false, false, null]],
        '/api/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/api/register' => [[['_route' => 'api_register', '_controller' => 'App\\Controller\\ApiRegistrationController::apiRegister'], null, ['POST' => 0], null, false, false, null]],
        '/api/connexion' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\AuthentificationController::login'], null, null, null, false, false, null]],
        '/api/deconnexion' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\AuthentificationController::logout'], null, null, null, false, false, null]],
        '/api/espace-employe' => [[['_route' => 'app_espace_employe', '_controller' => 'App\\Controller\\EmployeController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/profil' => [[['_route' => 'app_profil', '_controller' => 'App\\Controller\\ProfilController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/proposition' => [[['_route' => 'app_proposition', '_controller' => 'App\\Controller\\PropositionController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/recherche' => [[['_route' => 'app_recherche', '_controller' => 'App\\Controller\\RechercheController::recherche'], null, ['GET' => 0], null, false, false, null]],
        '/inscription' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/api/stats/covoiturages-par-jour' => [[['_route' => 'app_stats_covoiturages_par_jour', '_controller' => 'App\\Controller\\StatsController::covoituragesParJour'], null, null, null, false, false, null]],
        '/api/stats/credits-par-jour' => [[['_route' => 'app_stats_credits_par_jour', '_controller' => 'App\\Controller\\StatsController::creditsParJour'], null, null, null, false, false, null]],
        '/api/stats/total-credits' => [[['_route' => 'app_stats_total_credits', '_controller' => 'App\\Controller\\StatsController::totalCredits'], null, null, null, false, false, null]],
        '/voiture' => [[['_route' => 'app_voiture', '_controller' => 'App\\Controller\\VoitureController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|\\.well\\-known/genid/([^/]++)(*:46)'
                        .'|errors/(\\d+)(*:65)'
                        .'|validation_errors/([^/]++)(*:98)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:134)'
                    .'|/(?'
                        .'|d(?'
                            .'|ocs(?:\\.([^/]++))?(*:168)'
                            .'|isposes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:212)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:238)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:276)'
                                .')'
                            .')'
                        .')'
                        .'|co(?'
                            .'|n(?'
                                .'|texts/([^.]+)(?:\\.(jsonld))?(*:324)'
                                .'|figurations(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:372)'
                                    .'|(?:\\.([^/]++))?(*:395)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:432)'
                                    .')'
                                .')'
                            .')'
                            .'|voiturages(?'
                                .'|(?:\\.([^/]++))?(*:471)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:508)'
                                .')'
                                .'|(?:\\.([^/]++))?(*:532)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:566)'
                                .'|(*:574)'
                            .')'
                        .')'
                        .'|v(?'
                            .'|alidation_errors/([^/]++)(?'
                                .'|(*:616)'
                            .')'
                            .'|oitures(?'
                                .'|(?:\\.([^/]++))?(*:650)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:684)'
                                .'|(?:\\.([^/]++))?(*:707)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:744)'
                                .')'
                            .')'
                        .')'
                        .'|avis(?'
                            .'|(?:\\.([^/]++))?(*:777)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:811)'
                            .'|(?:\\.([^/]++))?(*:834)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:871)'
                            .')'
                            .'|(*:880)'
                        .')'
                        .'|marques(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:925)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:951)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:989)'
                            .')'
                        .')'
                        .'|parametres(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1038)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1065)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1104)'
                            .')'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(*:1138)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1173)'
                            .'|(?:\\.([^/]++))?(*:1197)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1235)'
                            .')'
                        .')'
                        .'|espace\\-employe/(?'
                            .'|valider\\-avis/([^/]++)(*:1287)'
                            .'|refuser\\-avis/([^/]++)(*:1318)'
                        .')'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:1361)'
                    .'|wdt/([^/]++)(*:1382)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:1425)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:1463)'
                                .'|router(*:1478)'
                                .'|exception(?'
                                    .'|(*:1499)'
                                    .'|\\.css(*:1513)'
                                .')'
                            .')'
                            .'|(*:1524)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        46 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        65 => [[['_route' => 'api_errors', '_controller' => 'api_platform.action.error_page'], ['status'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        98 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        134 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        168 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        212 => [[['_route' => '_api_/disposes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Dispose', '_api_operation_name' => '_api_/disposes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        238 => [
            [['_route' => '_api_/disposes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Dispose', '_api_operation_name' => '_api_/disposes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/disposes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Dispose', '_api_operation_name' => '_api_/disposes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        276 => [
            [['_route' => '_api_/disposes/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Dispose', '_api_operation_name' => '_api_/disposes/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/disposes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Dispose', '_api_operation_name' => '_api_/disposes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        324 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        372 => [[['_route' => '_api_/configurations/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        395 => [[['_route' => '_api_/configurations{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        432 => [
            [['_route' => '_api_/configurations/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/configurations/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        471 => [[['_route' => '_api_/covoiturages{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        508 => [
            [['_route' => '_api_/covoiturages/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/covoiturages/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        532 => [[['_route' => '_api_/covoiturages{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        566 => [[['_route' => '_api_/covoiturages/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        574 => [[['_route' => 'app_covoiturage', '_controller' => 'App\\Controller\\CovoiturageController::index'], [], ['GET' => 0], null, false, false, null]],
        616 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        650 => [[['_route' => '_api_/voitures{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        684 => [[['_route' => '_api_/voitures/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        707 => [[['_route' => '_api_/voitures{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        744 => [
            [['_route' => '_api_/voitures/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/voitures/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        777 => [[['_route' => '_api_/avis{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        811 => [[['_route' => '_api_/avis/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        834 => [[['_route' => '_api_/avis{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        871 => [
            [['_route' => '_api_/avis/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/avis/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        880 => [[['_route' => 'app_avis', '_controller' => 'App\\Controller\\AvisController::index'], [], ['POST' => 0], null, false, false, null]],
        925 => [[['_route' => '_api_/marques/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        951 => [
            [['_route' => '_api_/marques{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/marques{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        989 => [
            [['_route' => '_api_/marques/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/marques/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1038 => [[['_route' => '_api_/parametres/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1065 => [
            [['_route' => '_api_/parametres{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/parametres{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1104 => [
            [['_route' => '_api_/parametres/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/parametres/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1138 => [[['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        1173 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1197 => [[['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1235 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1287 => [[['_route' => 'app_valider_avis', '_controller' => 'App\\Controller\\EmployeController::validerAvis'], ['id'], ['POST' => 0], null, false, true, null]],
        1318 => [[['_route' => 'app_refuser_avis', '_controller' => 'App\\Controller\\EmployeController::refuserAvis'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1361 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        1382 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        1425 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        1463 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        1478 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        1499 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        1513 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        1524 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
