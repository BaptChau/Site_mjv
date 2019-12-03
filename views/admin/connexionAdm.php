<?php
session_unset();
?>
<div class="card card-login mx-auto mt-5">
    <div class="card-header bg-dark text-light">Login</div>
    <div class="card-body bg-dark text-light">
        <form action="<?= $router->url('validUser', $_POST) ?>" method="post">

            <div class="form-group">
                <div class="form-label-group">
                    <label for="inputEmail">Identifiant</label>
                    <input type="text" name="identifiant" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
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
</div>
</div>
</div>