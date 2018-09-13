<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1120224634748024', //Facebook API
        'client_secret' => '7303691d807eaff92bbb1657b96b1e', //Facebook Secret
        'redirect' => 'http://deelgood.com.dev/login/facebook/callback',
    ],

    'github' => [
        'client_id' => env('d372a1a7f9d2280f23c9'),         // Your GitHub Client ID
        'client_secret' => env('531a8bf2b01f77799cd73d5753cf164acae5f8b5'), // Your GitHub Client Secret
        'redirect' => 'http://deelgood.com.dev/login/github/callback',
    ],

];
