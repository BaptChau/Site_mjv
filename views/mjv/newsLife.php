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


                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <h3><?php echo ($value['titre']) ?></h3>
                    </div>

                    <div class="card-body">
                        <blockquote class="blockquote">
                            <h4 class="card-title"> </h4>
                            <h6 class="card-subtitle mb-2 text-muted">

                            </h6>

                            <p class="card-text"><?php echo nl2br(htmlspecialchars($value['contenu'])) ?></p>
                            <footer class="card-blockquote"><cite title="Source title"> <span class="badge badge-pill badge-success">
                                <?php
                                    $auth = ($bd->executeQuery($bd->getAuthor(), [$value['id_news']]));
                                    $auteur = $auth['0']['identite'] ?? '';
                                    echo ($auteur);
                                ?></span>
                                </cite></footer>
                        </blockquote>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <div class="col">
        <div class="container">
            <h2>Résultats des derniers weekends :</h2>
            <?php foreach ($resultWeeks as $key => $value) : ?>



                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <h3><?php echo ("Weekend du : " . date_format(new DateTime($value['weekend']), 'd/m/Y')) ?></h3>
                    </div>

                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($value['results'])) ?></p>
                            </cite></footer>
                        </blockquote>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</div>