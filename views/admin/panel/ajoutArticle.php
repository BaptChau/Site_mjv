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

?>


<div class="container">
    <form action="<?= $router->url('newArticle',$_POST) ?>" method="post">

        <label for="titre">Titre de l'article</label>
        <input type="text" name="titre" id="titre" class="form-control">
        <label for="contenu">Corps de l'article</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10" class="form-control"></textarea>
        <br>
        <input type="text" name="auteur"  value="<?php echo $user->id_user ?>">
        <button type="submit" class="btn btn-success ">Ajouter</button>

    </form>
</div>