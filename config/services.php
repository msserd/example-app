<?php
/**
 * Конфигурации для интеграций со сторонними сервисами
 * @docs https://github.com/laravel/laravel/blob/11.x/config/services.php
 */

return [
    'dummy_json' => [
        'base_url' => env('DUMMY_JSON_BASE_URL', 'https://dummyjson.com'),
        'username' => env('DUMMY_JSON_USERNAME', ''),
        'password' => env('DUMMY_JSON_PASSWORD', ''),
    ]
];
