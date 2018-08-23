<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', 'fcubsuat.kbzbank.com.mm'),
        'host'           => env('DB_HOST', 'dr01-scan.kbzbank.com.mm'),
        'port'           => env('DB_PORT', '1580'),
        'database'       => env('DB_DATABASE', ''),
        'username'       => env('DB_USERNAME', 'KBZAPICFGDEV'),
        'password'       => env('DB_PASSWORD', 'k8zapi'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],
];
