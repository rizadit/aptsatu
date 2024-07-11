<?php
return [
    'environment' => env('APP_ENV'),
    'client_id' => env('KEMENKEUID_CLIENT_ID'),
    'url_callback' =>  env('KEMENKEUID_CALLBACK'),

    'base_uri' => env('KEMENKEU_BASE_URI'),
    'endsession' => [
        'endpoint' => env('KEMENKEU_ENDSESSION_ENDSESSION', 'endsession')
    ]
];
