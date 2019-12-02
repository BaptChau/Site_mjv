<?php
session_unset();
?>


<form action="<?= $router->url('validUser',$_POST) ?>" method="post">
    <div class="container">
        <div class="col">
            <div class="row">
                <div class="col">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" name="identifiant" id="identifiant" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="psswd">Mot de passe</label>
                    <input type="password" name="password" id="psswd" class="form-control" onkeyup="crypt()" >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </div>
        </div>
    </div>
</form>