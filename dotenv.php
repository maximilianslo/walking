<?php
require '/var/www/walking/vendor/autoload.php';

$factory = new Dotenv\Environment\DotenvFactory([
        new Dotenv\Environment\Adapter\EnvConstAdapter(),
        new Dotenv\Environment\Adapter\PutenvAdapter(),
]);

$dotenv = Dotenv\Dotenv::create(__DIR__, null, $factory);
$dotenv->load();
