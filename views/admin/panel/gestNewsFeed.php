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

$allNews = $bdd->executeQuery($bdd->getAllNews());
// dump($articleToValidate);
?>

<br>
<div class="conatiner">
<h1>Liste des article :</h1>
<table class="table table-hover table-bordered">
    <thead class="table-primary">
        <td>Titre</td>
        <td>Contenu</td>
        <td>Action</td>
    </thead>
    <tbody>
        <?php foreach($allNews as $key => $value): ?>
            <tr>
                <td><?php echo $value['titre'] ?></td>
                <td><?php echo $value['contenu'] ?></td>
                <td>
                    <a href="<?= $router->url('editArticle',['id'=>$value['id_news']]) ?>" class="btn btn-info">Editer</a>
                    <form action="<?= $router->url('deleteNews', $_POST)?>" method="post" onsubmit="return confirm('Etes vous sûr ?')" style="display: inline-block">
                    <input type="hidden" name="id" value="<?= $value['id_news']?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <!-- <a href="" class="btn btn-danger">Supprimer</a> -->
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= $router->url('addArticle') ?>" class="btn btn-success float-right">Ajout d'un article</a>
</div>