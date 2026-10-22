<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Repository Url
    |--------------------------------------------------------------------------
    |
    | The url of the Prismic Repository
    |
    */

    'repository_url' => env('PRISMIC_REPOSITORY_URL'),

    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    |
    | Default language. Only used for multilanguage sites
    |
    */

    'language' => env('PRISMIC_LANGUAGE', 'en-us'),

];
