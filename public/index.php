<?php

require '../vendor/autoload.php';



$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__).DIRECTORY_SEPARATOR.'views');
$router 
    ->get('/', 'mjv/index', 'index')
    ->get('/equipe/smasc','mjv/equipes/equipeAdulteMasc','smasc')
    ->get('/equipe/sfem','mjv/equipes/equipeAdulteFem','smfem')
    ->get('/equipe/u18masc','mjv/equipes/equipeU18masc','u18masc')
    ->run();
