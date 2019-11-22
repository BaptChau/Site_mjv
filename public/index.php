<?php

require '../vendor/autoload.php';



$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__).DIRECTORY_SEPARATOR.'views');
$router 
    ->get('/', 'mjv/index', 'index')
    //Routes pour les equipes
    ->get('/equipe/smasc','mjv/equipes/equipeAdulteMasc','smasc')
    ->get('/equipe/sfem','mjv/equipes/equipeAdulteFem','smfem')
    ->get('/equipe/u18masc','mjv/equipes/equipeU18masc','u18masc')
    ->get('/equipe/u18fem','mjv/equipes/equipeU18Fem','u18fem')
    ->get('/equipe/u15masc','mjv/equipes/equipeU15masc','u15masc')
    ->get('/equipe/u15fem','mjv/equipes/equipeU15Fem','u15fem')
    ->get('/equipe/u11masc','mjv/equipes/equipeU11masc','u11masc')
    ->get('/equipe/babyhand','mjv/equipes/babyhand','babyhand')
    //Routes pour le calepin
    ->get('/calepin','mjv/calepin/calepinIndex','calepin')
    ->get('/calepin/new','mjv/calepin/newArticle','calepinNew')
    

    ->run();
