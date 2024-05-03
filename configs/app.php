<?php

return [
    'db' => [
        'driver' => $_ENV['DB_DRIVER'] ?? 'mysql',
        'host' => $_ENV['DB_HOST'] ?? 'localhost',
        'database' => $_ENV['DB_DATABASE'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
    ],
];