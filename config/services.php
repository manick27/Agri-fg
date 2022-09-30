<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1976044042551714',
        'client_secret' => '45ad367ca4f231cee0af5548747f1903',
        'redirect' => 'https://test.neverlost.ntb-entreprise.de/callback/facebook',
    ],

    'google' => [
        'client_id' => '976510864484-qo73i4dm12fimdi4102tavrpq03puil1.apps.googleusercontent.com',
        'client_secret' => 'Pe0dRAttjAmzB2l3UeZ7Kl08',
        'redirect' => 'https://test.neverlost.ntb-entreprise.de/callback/google',
    ],

];
