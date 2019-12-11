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
$articleToDelete = $bdd->executeQuery($bdd->getReportedArticle());
dump($articleToDelete);
?>
<br>
<div class="container">
        <h1>Article à valider :</h1>
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
            <tr>
                <td><?php echo $value['titre'] ?></td>
                <td><?php echo $value['contenu'] ?></td>
                <td>
                 <a href="<?= $router->url('validCalepin',['id'=>$value['id_article']]) ?> " class="btn btn-success">Valider</a>
                 <a href="<?= $router->url('unvalidCalepin',['id'=>$value['id_article']]) ?>" class="btn btn-danger">Supprimer</a>
                    
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<br>
<div class="container">
        <h1>Article validé :</h1>
    <table class="table table-hover table-bordered">
        <thead class="table-primary">
        <tr>
            <td>Titre</td>
            <td>Contenu</td>
            <td>Supprimer ?</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($articleToDelete as $key => $value): ?>
            <tr>
                <td><?php echo $value['titre'] ?></td>
                <td><?php echo $value['contenu'] ?></td>
                <td>
                 <a href="<?= $router->url('validCalepin',['id'=>$value['id_article']]) ?> " class="btn btn-success">Valider</a>
                 <a href="" class="btn btn-danger">Supprimer</a>
                    
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
