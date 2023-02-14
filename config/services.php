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

    'firebase' => [
        'server_key' => "AAAA4J55kFM:APA91bFH1ZNzufN3azK6iq-bVTLBaenVzmpZq3yLvLDF1NbvN9TVzpsZbbUf0L94bmQzSBb3UfPFRV99xyJnmJCQbkJv1uCVssPWJKrwzfEavUKtpSHyVc30uf83komuscJySuovJ_rH",
        'send_url' => "https://fcm.googleapis.com/fcm/send",
    ],

];
