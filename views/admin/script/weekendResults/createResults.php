<?php

use App\Auth;
use App\Base\Bdd;
use App\Models\WeekendResults;

session_start();
$bdd = new Bdd();
$auth = new Auth($bdd->getConnexion());
$user = $auth->user();

if ($user === null) {
    // dump($_SESSION);
    // dump($user);
    header('Location:' . $router->url('index'));
}

$data = $_POST;


$weekend = new WeekendResults();

$weekend->create($_POST['date'],$_POST['results']);

header('Location:'.$router->url('createResult'));

