<?php

include './vendor/autoload.php';

// Default parameters
$_SERVER['SCRIPT_NAME'] = "";
$_GET['page'] = $_GET['page'] ?? '1,100';
$_GET['order'] = $_GET['order'] ?? 'id';

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

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $api->executeCommand();
} else {
    header("HTTP/1.1 401 Unauthorized");
    echo "Not authorized.";
    exit;
}
