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

$articleToValidate = $bdd->executeQuery($bdd->getNonValidArticle());
dump($articleToValidate);
?>

<div class="container">
    <table class="table table-hover table-bordered">
        <thead class="table-primary">
        <tr>
            <td>Titre</td>
            <td>Contenu</td>
            <td>Valider ?</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($articleToValidate as $key => $value): ?>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>