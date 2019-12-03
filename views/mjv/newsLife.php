<?php

use App\Base\Bdd;

$bd = new Bdd();

$news = $bd->executeQuery($bd->getAllNews());
?>
<div class="container">
    <?php foreach ($news as $key => $value): ?>
        <div class="jumbotron">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo ($value['titre']) ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?php 
                        $auth = ($bd->executeQuery($bd->getAuthor(),[$value['auteur']]))['0'];
                        echo( $auth['identite']);
                         ?>
                    </h6>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($value['contenu'])) ?></p>
                </div>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
</div>