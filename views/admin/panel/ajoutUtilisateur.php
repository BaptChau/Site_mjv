<?php

use App\Auth;
use App\Base\Bdd;

session_start();
$bdd = new Bdd();
$auth = new Auth($bdd->getConnexion());
$user = $auth->user();

if ($user === null) {
    // dump($_SESSION);
    // dump($user);
    header('Location:' . $router->url('index'));
}
?>
<div class="container">
    <form action="" method="POST" class="form">
    <div class="col">
        <div class="row">
            <div class="col">
                <label for="pnom">Prénom</label>
                <input type="text" name="pnom" id="pnom" class="form-control">
            </div>
            <div class="col">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <label for="identifiant">Identifiant</label>
            <input type="text" name="identifiant" id="identifiant" class="form-control">

            <label for="passwrd">Mot de Passe</label>
            <input type="password" name="password1" id="passwrd"  class="form-control">

            <label for="passwrdConf">Confirmation</label>
            <input type="password" name="password2" id="passwrdConf"  class="form-control">

            <button type="reset" class="btn btn-danger">Vider</button>
            <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </div>
    </div>
    </form>
</div>