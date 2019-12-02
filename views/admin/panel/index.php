<?php

use App\Auth;
use App\Base\Bdd;
use App\Models\User;

$usrname = $_POST['identifiant'];
$pass = $_POST['password'];
$bd = new Bdd();
$auth = new Auth($bd->getConnexion());

$user = $auth ->login($usrname,$pass);
  

// $conn = $bd -> connexionUser($usrname,$pass);
if ($user instanceof User) {

    if(session_id()){
    //  dump($_POST);   
    }
    else {
        header('Location:'.$router->url('index'));
    }
}
else {
    header('Location:'.$router->url('index'));

}
    ?>