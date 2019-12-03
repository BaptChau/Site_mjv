<?php

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

use App\Base\Bdd;

$base = new Bdd();

$arr = $base->executeQuery($base->getArticle());
// dump($arr);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <a href="<?= $router->url('calepinNew') ?>" class="btn btn-primary btn-lg m-4 ">Nouvel article</a>

        </div>
    </div>
</div>

<div class="container-fluid">
    <?php foreach ($arr as $key => $value) :  ?>
        <div class="jumbotron">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo ($value['titre']) ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo ($value['auteur']) ?></h6>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($value['contenu'])) ?></p>
                </div>
            </div>
        </div>


    <?php endforeach; ?>

</div>