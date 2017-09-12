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
        'client_id' => '522266017981414',
        'client_secret' => '1111de024afea8a4ca31ef8e9d6ef8f9',
        'redirect' => 'http://my-library.dev/auth/facebook/callback',
    ],

        'google' => [
        'client_id' => '934329031419-1qk7r3sfk9ha24q3hi14rdmke3u7dm68.apps.googleusercontent.com',
        'client_secret' => 'Fx7f9URHRr4-xjqWF0E2Q_Ez',
        'redirect' => 'http://my-library.dev/auth/google/callback',
    ],


];
