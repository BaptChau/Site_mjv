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

$id_news = substr(strstr($_SERVER['REQUEST_URI'],'id'),3);

$newsToEdit = $bdd->executeQuery($bdd->getNewsById(),[$id_news])[0];

// dump($newsToEdit);
?>


<div class="container">
    <form action="<?= $router->url('saveEditedArticle',$_POST) ?>" method="post">

        <label for="titre">Titre de l'article</label>
        <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $newsToEdit['titre'] ?>">
        <label for="contenu">Corps de l'article</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10" class="form-control"><?php echo $newsToEdit['contenu'] ?></textarea>
        <br>
        <input type="text" name="auteur" hidden value="<?php echo $user->id_user ?>">
        <input type="text" name="id_news" hidden value="<?php echo $newsToEdit['id_news'] ?>">

        <button type="submit" class="btn btn-success ">Modifier</button>

    </form>
</div>