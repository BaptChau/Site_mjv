<?php
// $title = 'StarBattle';

use App\Base\Bdd;

$con = new Bdd();
$arr = $con->getLast5Article();

?>

<div class="row">
    <div class="col">
        <h1>Les 5 derniers articles du calepin :</h1>

        <?php

foreach ($arr as $key => $value) :
    
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

    <div class="col">
        <h1>Les résultats du week-end : </h1>
    </div>
</div>