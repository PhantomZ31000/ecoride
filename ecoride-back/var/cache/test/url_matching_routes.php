<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'app_accueil', '_controller' => 'App\\Controller\\AccueilController::index'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/connexion' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\AuthentificationController::login'], null, null, null, false, false, null]],
        '/deconnexion' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\AuthentificationController::logout'], null, null, null, false, false, null]],
        '/avis' => [[['_route' => 'app_avis', '_controller' => 'App\\Controller\\AvisController::index'], null, null, null, false, false, null]],
        '/covoiturage' => [[['_route' => 'app_covoiturage', '_controller' => 'App\\Controller\\CovoiturageController::index'], null, null, null, false, false, null]],
        '/espace-employe' => [[['_route' => 'app_espace_employe', '_controller' => 'App\\Controller\\EmployeController::index'], null, null, null, false, false, null]],
        '/profil' => [[['_route' => 'app_profil', '_controller' => 'App\\Controller\\ProfilController::index'], null, null, null, false, false, null]],
        '/proposition' => [[['_route' => 'app_proposition', '_controller' => 'App\\Controller\\PropositionController::index'], null, null, null, false, false, null]],
        '/recherche' => [[['_route' => 'app_recherche', '_controller' => 'App\\Controller\\RechercheController::recherche'], null, null, null, false, false, null]],
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
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:398)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:436)'
                                    .')'
                                .')'
                            .')'
                            .'|voiturages(?'
                                .'|(?:\\.([^/]++))?(*:475)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:509)'
                                .'|(?:\\.([^/]++))?(*:532)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:569)'
                                .')'
                            .')'
                        .')'
                        .'|v(?'
                            .'|alidation_errors/([^/]++)(?'
                                .'|(*:612)'
                            .')'
                            .'|oitures(?'
                                .'|(?:\\.([^/]++))?(*:646)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:680)'
                                .'|(?:\\.([^/]++))?(*:703)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:740)'
                                .')'
                            .')'
                        .')'
                        .'|avis(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:776)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:814)'
                            .')'
                        .')'
                        .'|marques(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:860)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:886)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:924)'
                            .')'
                        .')'
                        .'|parametres(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:973)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:999)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1037)'
                            .')'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1074)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1113)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/espace\\-employe/(?'
                    .'|valider\\-avis/([^/]++)(*:1168)'
                    .'|refuser\\-avis/([^/]++)(*:1199)'
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
            [['_route' => '_api_/disposes/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Dispose', '_api_operation_name' => '_api_/disposes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/disposes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Dispose', '_api_operation_name' => '_api_/disposes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        324 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        372 => [[['_route' => '_api_/configurations/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        398 => [
            [['_route' => '_api_/configurations{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/configurations{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        436 => [
            [['_route' => '_api_/configurations/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/configurations/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Configuration', '_api_operation_name' => '_api_/configurations/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        475 => [[['_route' => '_api_/covoiturages{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        509 => [[['_route' => '_api_/covoiturages/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null]],
        532 => [[['_route' => '_api_/covoiturages{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        569 => [
            [['_route' => '_api_/covoiturages/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/covoiturages/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Covoiturage', '_api_operation_name' => '_api_/covoiturages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        612 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        646 => [[['_route' => '_api_/voitures{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        680 => [[['_route' => '_api_/voitures/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        703 => [[['_route' => '_api_/voitures{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        740 => [
            [['_route' => '_api_/voitures/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/voitures/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Voiture', '_api_operation_name' => '_api_/voitures/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        776 => [
            [['_route' => '_api_/avis{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => '_api_/avis{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        814 => [
            [['_route' => '_api_/avis/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/avis/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/avis/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Avis', '_api_operation_name' => '_api_/avis/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        860 => [[['_route' => '_api_/marques/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        886 => [
            [['_route' => '_api_/marques{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/marques{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        924 => [
            [['_route' => '_api_/marques/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/marques/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Marque', '_api_operation_name' => '_api_/marques/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        973 => [[['_route' => '_api_/parametres/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        999 => [
            [['_route' => '_api_/parametres{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/parametres{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1037 => [
            [['_route' => '_api_/parametres/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/parametres/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Parametre', '_api_operation_name' => '_api_/parametres/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1074 => [
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        1113 => [
            [['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1168 => [[['_route' => 'app_valider_avis', '_controller' => 'App\\Controller\\EmployeController::validerAvis'], ['id'], null, null, false, true, null]],
        1199 => [
            [['_route' => 'app_refuser_avis', '_controller' => 'App\\Controller\\EmployeController::refuserAvis'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
