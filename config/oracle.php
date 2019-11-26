<?php

return [
    'oracle' => [
        'driver' => 'oracle',
        'host' => env('DB_ORACLE_HOST', ''),
        'port' => env('DB_ORACLE_PORT', ''),
        'database' => env('DB_ORACLE_CONNECTION', ''),
        'service_name' => env('DB_ORACLE_SERVICE_NAME', ''),
        'username' => env('DB_ORACLE_USERNAME', ''),
        'password' => env('DB_ORACLE_PASSWORD', ''),
        'charset' => env('DB_ORACLE_CHARSET', ''),
        'prefix' => env('DB_ORACLE_PREFIX', ''),
    ]
];
