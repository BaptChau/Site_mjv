EDIT<?php

// dump($_POST);
// dump($_SERVER);

use App\Auth;
use App\Base\Bdd;
use App\Models\Link;

session_start();
$bdd = new Bdd();
$auth = new Auth($bdd->getConnexion());
$user = $auth->user();

if ($user === null) {
    // dump($_SESSION);
    // dump($user);
    header('Location:' . $router->url('index'));
}
$repo = new Link();
$libelle = $_POST['libelle'];
$link = $_POST['link'];

$method = mb_substr($_SERVER['REQUEST_URI'],12);
switch ($method) {
    case 'CREATE':
        $repo->create($libelle,$link);
        header('Location:'.$router->url('allLink'));

        
        break;
    
    case 'DELETE':
        echo 'suppression';
        break;

    case 'EDIT':
        $_SESSION['libelle'] = $libelle;
        $_SESSION['link'] = $link;
        // dump($_POST);
        header('Location:'.$router->url('editLink'));;
        break;
 
    case 'PUT':
        $repo->update($libelle,$link);
        header('Location:'.$router->url('allLink'));

        break;

    default:
        header('Location:'.$router->url('allLink'));
        break;

}