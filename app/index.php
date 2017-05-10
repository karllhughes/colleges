<?php

include '../vendor/autoload.php';

// DB Connection
$api = new PHP_CRUD_API([
    'dbengine' => $_ENV['DB_ENGINE'],                   // 'PostgreSQL' or 'MySQL'
    'hostname' => $_ENV['DB_HOSTNAME'] ?: 'localhost',  // Name of the database host
    'username' => $_ENV['DB_USERNAME'] ?: '',           // Database user
    'password' => $_ENV['DB_PASSWORD'] ?: '',           // Database password
    'database' => $_ENV['DB_DATABASE'] ?: '',           // Database name
    'charset'=> $_ENV['DB_CHARSET'] ?: 'UTF8',          // 'UTF8' or 'utf8'
    'table_authorizer' => function($cmd, $db, $tab) {
        return $tab !== "phinxlog"; // Ignores the migrations table
    },
]);

$api->executeCommand();
