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
    header('Location:'.$router->url('index'));
}
$arr = $bdd->getLast5Article();
?>

<div class="col-3">
    <?php
        foreach ($arr as $key => $value):
    ?>
    <div class="card">
        <div class="card-header">
            <?php echo($value['titre']) ?>
        </div>
        
        <div class="card-body">
            <div class="card-subtitle mb2 text-muted">
                <?php echo($value['auteur']) ?>
            </div>
            <?php echo($value['contenu']) ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>

