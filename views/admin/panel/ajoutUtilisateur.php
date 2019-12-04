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
    <form action="<?= $router->url('addUser',$_POST) ?>" method="POST" class="form" id="formUser">
        <div class="col">
            <div class="row">
                <div class="col">
                    <label for="pnom">Prénom</label>
                    <input type="text" name="pnom" id="pnom" class="form-control" require>
                </div>
                <div class="col">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" require>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" name="identifiant" id="identifiant" class="form-control" require>

                    <label for="passwrd">Mot de Passe</label>
                    <input type="password" name="password1" id="passwrd" class="form-control" onkeyup="conf()" require>

                    <label for="passwrdConf">Confirmation</label>
                    <input type="password" name="password2" id="passwrdConf" class="form-control" onkeyup="conf()" require>


                </div>

            </div>
            <br>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Ajouter</button>

                </div>
                <div class="col">
                    <button type="reset" class="btn btn-danger">Vider</button>
                </div>

            </div>
        </div>
        <br>
        <div class="row">
        <div class="col" id="error">

        </div>
        </div>
        <input type="text" name="security" value="Ate95mhe67!" hidden>
    </form>
</div>

<script>
    function conf() {
        var pass1 = document.getElementById('passwrd').value;
        // console.log(pass1);
        var conf = document.getElementById('passwrdConf').value;
        // console.log(conf)
        var same = pass1.localeCompare(conf);

        if (same !== 0) {
            document.getElementById('error').innerHTML = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Mot de passe et confirmation different</strong></div>"
        } else {
            document.getElementById('error').empty;
            document.getElementById('error').innerHTML = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Mot de passe confirmé</strong></div>"
        }
    }
</script>