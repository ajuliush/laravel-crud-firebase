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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'firebase' => [
        'api_key' => 'AIzaSyArAvU2VrhArp9i4HLSw9IZ7KS9yAHyYz4',
        'auth_domain' => 'laravel-crud-9a25e.firebaseapp.com',
        'database_url' => 'https://laravel-crud-9a25e-default-rtdb.firebaseio.com/',
        'project_id' => 'laravel-crud-9a25e',
        'storage_bucket' => 'laravel-crud-9a25e.appspot.com',
        'messaging_sender_id' => '859332226246',
        'app_id' => '1:859332226246:web:8d6b1789d72e088e303bc7',
        'measurement_id' => 'G-HBPPH016X3',
    ],

];
