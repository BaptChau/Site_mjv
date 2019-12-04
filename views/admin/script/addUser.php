<?php

use App\Base\Bdd;
dump($_POST);
if (!isset($_POST['security']) || $_POST['security'] !== 'Ate95mhe67!' ) {
    header('Location:'.$router->url('index'));
}
else{

$bdd = new Bdd();

$params = [null, $_POST['identifiant'],password_hash($_POST['password1'],PASSWORD_DEFAULT),$_POST['pnom'].' '.$_POST['nom']];

$exec = $bdd->executeQueryNoReturn($bdd->createUser(),$params);

if ($exec) {
    // dump($_POST);    
    header('Location:'.$router->url('dashboard'));
}

else{
    header('Location:'.$router->url('newUser'));
}


}