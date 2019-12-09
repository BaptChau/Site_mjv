<?php

use App\Base\Bdd;

$bd = new Bdd();

$news = $bd->executeQuery($bd->getAllNews());
$resultWeeks = $bd->executeQuery($bd->getLast5Results());
?>
<div class="row">
    <div class="col">

        <div class="container">
            <h2>Quoi de neuf au club ?</h2>
            <?php foreach ($news as $key => $value) : ?>
                <hr>
                <div class="jumbotron">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ($value['titre']) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php
                                    $auth = ($bd->executeQuery($bd->getAuthor(), [$value['id_news']]));
                                    echo ($auth['0']['identite']);
                                    ?>
                            </h6>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($value['contenu'])) ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <div class="col">
        <div class="container">
            <h2>Résultats des derniers weekends</h2>
            <?php foreach ($resultWeeks as $key => $value) : ?>
                <hr>
                <div class="jumbotron">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ("Weekend du : " . date_format(new DateTime($value['weekend']), 'd/m/Y')) ?></h5>

                            <p class="card-text"><?php echo nl2br(htmlspecialchars($value['results'])) ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>