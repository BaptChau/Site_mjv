<?php

use App\Models\WeekendResults;
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
$result = new WeekendResults();

$tab = $result->read();

// dump($tab);

?>

<div class="container">
    <br>
    <?php foreach ($tab as $key => $value) : ?>
    <form action="<?= $router->url('deleteWeekend',$_POST)?>" method="post">
        <div class="card border-success mb-3" style="max-width: 20rem;">
            <div class="card-header"><?= $value['weekend'] ?></div>
            <div class="card-body">
                <p class="card-text"><?= $value['results'] ?></p>
            </div>
            <input name="id" type="text" value="<?= $value['id_results']?>" hidden >
            <button type="submit" class="btn btn-danger" >Supprimer</button>
        </div>
        </form>
    <?php endforeach; ?>
</div>
