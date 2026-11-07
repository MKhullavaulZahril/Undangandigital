<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Kredensial Admin HTTP Basic Auth
    |--------------------------------------------------------------------------
    | Menggunakan kredensial dari file .env (ADMIN_USERNAME & ADMIN_PASSWORD).
    | Digunakan oleh middleware AdminBasicAuth untuk autentikasi rute /admin.
    */
    'username' => env('ADMIN_USERNAME'),
    'password' => env('ADMIN_PASSWORD'),
];
