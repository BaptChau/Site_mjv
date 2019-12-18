<?php
// $title = 'StarBattle';

use App\Base\Bdd;


$con = new Bdd();
$date = new DateTime();
$week = $date->format('W');
$calpin = $con->executeQuery($con->getLast5Article());
$news = $con->executeQuery($con->getLast5News());
$results = $con->executeQuery($con->getResultsOfTheWeek(),[strval($week-1)]);
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>

<div class="row">
    <div class="col-md">
        <h1>Les 5 derniers articles du calepin :</h1>

        <?php

foreach ($calpin as $key => $value) :
    
    ?>
    <div class="container">
        <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header"><?php echo $value['titre'] ?></div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $value['auteur'] ?></h4>
                    <p class="card-text"><?php echo $value['contenu'] ?></p>
                </div>
            </div>
        </div>
        
        <?php endforeach; ?>
    </div>

    <div class="col-md">
        <h1>Les résultats du week-end : </h1>
        <?php foreach ($results as $key => $value):?>
            <div class="container">
                <div class="card border-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header">Weekend du : <?php  echo(date_format(new DateTime($value['weekend']),'d/m/Y')) ?></div>
                    <div class="card-body">
                        <h4 class="car-title"></h4>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($value['results'])) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-md">
        <h1>Quoi de neuf :</h1>
        <?php foreach ($news as $key => $value):?>
        <div class="container">
                <div class="card border-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header"><?php  echo($value['titre']) ?></div>
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($value['contenu'])) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>