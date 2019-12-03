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
$article = $bdd->executeQuery($bdd->getLast5Article());
$auteur = $bdd->executeQuery($bdd->getNewsByUser(), [$_SESSION['auth']]);
// dump($auteur);
?>
<div class="container">

    <div class="row">
        
        <div class="col-md">
            <h4>Vos dérniers articles :</h4>
            <?php foreach ($auteur as $key => $value) : ?>
                <div class="card border-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header"> <?php  echo($value['titre']) ?></div>
                    <div class="card-body">
                        <h4 class="car-title"></h4>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($value['contenu'])) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="col-md">
            <h4> 5 dernier calepin :</h4>
            <?php
            foreach ($article as $key => $value) :
                ?>
                <div class="card mb-3" style="max-width: 20rem;">
                    <div class="card-header">
                        <?php echo ($value['titre']) ?>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle mb2 text-muted">
                            <?php echo ($value['auteur']) ?>
                        </div>
                        <?php echo nl2br(htmlspecialchars($value['contenu'])) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>