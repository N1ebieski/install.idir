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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id'     => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    ],

    'twitter-oauth-2' => [
        'client_id'     => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
    ],

    'recaptcha_v2' => [
        'secret_key' => env('RECAPTCHA_V2_SECRET_KEY'),
        'site_key'   => env('RECAPTCHA_V2_SITE_KEY'),
    ],

    'recaptcha_invisible' => [
        'secret_key' => env('RECAPTCHA_INVISIBLE_SECRET_KEY'),
        'site_key'   => env('RECAPTCHA_INVISIBLE_SITE_KEY'),
    ],

    'cashbill' => [
        'transfer' => [
            'url' => env('CASHBILL_TRANSFER_URL'),
            'service' => env('CASHBILL_TRANSFER_SERVICE'),
            'key' => env('CASHBILL_TRANSFER_KEY'),
            'currency' => 'PLN',
            'lang' => 'PL'
        ],
        'code_sms' => [
            'check_url' => env('CASHBILL_CODE_SMS_CHECK_URL'),
            'currency' => 'PLN'
        ],
        'code_transfer' => [
            'check_url' => env('CASHBILL_CODE_TRANSFER_CHECK_URL'),
            'url' => env('CASHBILL_CODE_TRANSFER_URL'),
            'currency' => 'PLN'
        ]
    ],

    'paypal' => [
        'paypal_express' => [
            'username' => env('PAYPAL_USERNAME'),
            'password' => env('PAYPAL_PASSWORD'),
            'signature' => env('PAYPAL_SIGNATURE'),
            'sandbox' => env('PAYPAL_SANDBOX'),
            'currency' => 'PLN',
            'lang' => 'PL',
            'check_url' => env('PAYPAL_CHECK_URL'),
            'sandbox_check_url' => env('PAYPAL_SANDBOX_CHECK_URL')
        ]
    ],

    'googlemap' => [
        'api_key' => env('GOOGLEMAP_API_KEY')
    ],

    'gus' => [
        'api_key' => env('GUS_API_KEY')
    ],

    'openai' => [
        'api_key' => env('OPENAI_API_KEY')
    ]

];
