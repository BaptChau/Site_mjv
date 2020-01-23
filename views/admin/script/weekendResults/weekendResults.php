<?php

use App\Auth;
use App\Base\Bdd;
use App\Models\Link;
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

if (isset($_SESSION['libelle'])) unset($_SESSION['libelle']);
if (isset($_SESSION['link'])) unset($_SESSION['link']);

$repo = new WeekendResults();

dump($_POST);

$id = isset($_POST['id']) ? $_POST['id'] : '';
$week = isset($_POST['week']) ? $_POST['week'] : '' ;
$result = isset($_POST['results']) ? $_POST['results'] : '';

$method = mb_substr($_SERVER['REQUEST_URI'],15);
dump($method);
switch ($method) {
    case 'CREATE':
        $repo->create($week,$result);
        header('Location:'.$router->url('showresults'));
        break;
    case 'PUT':
        dump($_POST);
        dump($repo->update($id,$week,$result));
        header('Location:'.$router->url('showresults'));
        break;
    case 'DELETE':
        $repo->delete($id);
        header('Location:'.$router->url('showresults'));

        break;
    case 'EDIT':
        $_SESSION['week'] = $week;
        $_SESSION['week_id'] = $id;
        $_SESSION['result'] = $result;
        header('Location:'.$router->url('editWeek'));
        break;
    default:
    header('Location:'.$router->url('showresults'));
        
        break;
}
