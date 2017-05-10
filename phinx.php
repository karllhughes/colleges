<?php

return [
    'paths' => [
        'migrations' => '/var/www/html/migrations',
        'seeds' => '/var/www/html/seeds',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'production',
        'production' => [
            'adapter' => $_ENV['DB_ADAPTER'],               // 'pgsql' or 'mysql'
            'host' => $_ENV['DB_HOSTNAME'] ?: 'localhost',  // Name of the database host
            'user' => $_ENV['DB_USERNAME'] ?: '',           // Database user
            'pass' => $_ENV['DB_PASSWORD'] ?: '',           // Database password
            'name' => $_ENV['DB_DATABASE'] ?: '',           // Database name
            'port' => $_ENV['DB_PORT'] ?: '',               // Database port
            'charset'=> $_ENV['DB_CHARSET'] ?: 'utf8',
        ],
    ]
];