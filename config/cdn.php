<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Serveur de fichier statics
    |--------------------------------------------------------------------------
    |
    | l'hôte sera utilisé pour la recherche des fichiers statics. L'objectif
    | étant de déchargé le serveur créé à l'aide `php artisan serve`. Il faut 
    | avant il faut use_cdn soit à true.
    |
    */
    'use_cdn' => env('RESAC_USE_CDN', false),
    'cdn_host' => env('RESAC_CDN_HOST', env('APP_URL')),

];
