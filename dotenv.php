<?php
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$factory = new Dotenv\Environment\DotenvFactory([
        new Dotenv\Environment\Adapter\EnvConstAdapter(),
        new Dotenv\Environment\Adapter\PutenvAdapter(),
]);

$dotenv = Dotenv\Dotenv::create(__DIR__, null, $factory);
$dotenv->load();
