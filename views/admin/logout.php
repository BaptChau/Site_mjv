<?php

use App\Auth;
use App\Base\Bdd;

$bd = new Bdd();
$auth = new Auth($bd->getConnexion());
$auth->user();
$auth -> logout();

header('Location:'.$router->url('index'));