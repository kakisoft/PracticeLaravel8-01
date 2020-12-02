<?php

return [

    'param01' => 'value01',

    'paramset01' => [
        'child01' => 'daily',
        'child02' => storage_path('logs/laravel.log'),
        'child03' => env('LOG_LEVEL', 'debug'),
        'child04' => 14,
    ],

    'ref_env' => env('CACHE_DRIVER', 'file'),

];
