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
        'domain' => env('sandboxc7530f876ec44d40a8fd514b4a56ba51.mailgun.org'),
        'secret' => env('key-b3e8c321081bf1e33f0f3a6963cff51c'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('817f25ddd4a193e063f470726fcbc43cda219ca7'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '966279046848027',
        'client_secret' => '77d29c82bdd50871ada15295d2785df7',
        'redirect' => 'http://localhost:8000/callback',
    ],

];
