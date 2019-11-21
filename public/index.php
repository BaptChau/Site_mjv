<?php

require '../vendor/autoload.php';



// $whoops = new \Whoops\Run;
// $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();

$router = new App\Router(dirname(__DIR__).DIRECTORY_SEPARATOR.'views');
$router 
    ->get('/', 'mjv/index', 'index')
    ->get('/equipe/smasc','mjv/equipes/equipeAdulte','teams')
    ->run();
