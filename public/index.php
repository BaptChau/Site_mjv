<?php

require '../vendor/autoload.php';



$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views');
$router
    ->get('/', 'mjv/index', 'index')
    //Routes pour les equipes
    ->get('/equipe/smasc', 'mjv/equipes/equipeAdulteMasc', 'smasc')
    ->get('/equipe/sfem', 'mjv/equipes/equipeAdulteFem', 'smfem')
    ->get('/equipe/u18masc', 'mjv/equipes/equipeU18masc', 'u18masc')
    ->get('/equipe/u18fem', 'mjv/equipes/equipeU18Fem', 'u18fem')
    ->get('/equipe/u15masc', 'mjv/equipes/equipeU15masc', 'u15masc')
    ->get('/equipe/u15fem', 'mjv/equipes/equipeU15Fem', 'u15fem')
    ->get('/equipe/u11masc', 'mjv/equipes/equipeU11masc', 'u11masc')
    ->get('/equipe/babyhand', 'mjv/equipes/babyhand', 'babyhand')
    //Routes pour le calepin
    //cause AltoRouter
    ->get('/calepin', 'mjv/calepin/calepinIndex', 'calepin')
    ->get('/calepin/new', 'mjv/calepin/newArticle', 'calepinNew')
    //Route à propos
    ->get('/a-propos', 'mjv/aPropos', 'about')
    //Route contact
    ->get('/contact', 'mjv/contact', 'contact')
    //Route news feed
    ->get('/news', 'mjv/newsLife','news')
    //Formulaire 
    ->get('/admin','admin/connexionAdm','adminPanel')
    ->post('/admin/addUser/valid','admin/script/addUser','addUser')
    ->post('/admin/allUser/delete','admin/script/deleteUser','deleteUser')
    ->post('/admin/new/article','admin/script/addArticle','newArticle')


    //Validation de formulaire
    ->post('/calepin/new/validator','mjv/calepin/validator','articleValid')
    ->post('/admin/conn','admin/panel/index','validUser')

    //Déconnexion
    ->get('/logout','admin/logout','logout')

    //Pages Admin
    ->get('/admin/dashboard','admin/panel/dashboard','dashboard')
    ->get('/admin/addUser','admin/panel/ajoutUtilisateur','newUser')
    ->get('/admin/allUser','admin/panel/viewAllUser','allUser')
    ->get('/admin/addArticle','admin/panel/ajoutArticle','addArticle')
    ->run();
