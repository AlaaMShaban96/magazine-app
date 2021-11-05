<?php

return [
    /*
    |--------------------------------------------------------------------------
    | List your email providers
    |--------------------------------------------------------------------------
    |
    | Enjoy a life with multimail
    |
    */
    'use_default_mail_facade_in_tests' => true,

    'emails'  => [
        'report@al-mjala.com' => [
            'pass'          => env('MAIL_PASSWORD_REPORT'),
            'username'      => env('MAIL_USERNAME_REPORT'),
            // 'from_name'     => 'Max Musterman',
            // 'reply_to_mail' => 'reply@example.com',
        ],
        'no-reply@al-mjala.com'  => [
            'pass'          => env('MAIL_PASSWORD_NO_REPLY'),
            'username'      => env('MAIL_USERNAME_NO_REPLY'),
        ],
    ],

    'provider' => [
        'default' => [
            'host'      => env('MAIL_HOST'),
            'port'      => env('MAIL_PORT'),
            'encryption' => env('MAIL_ENCRYPTION'),
        ],
    ],

];
