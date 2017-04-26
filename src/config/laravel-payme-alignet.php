<?php

return [
    'payme' => [
        'url'                 => env('PAYME_URL'),
        'commerce_id'         => env('PAYME_COMMERCE_ID'),
        'commerce_secret_key' => env('PAYME_COMMERCE_SECRET'),
        'acquirer_id'         => env('PAYME_ACQUIRER_ID'),
    ],
];