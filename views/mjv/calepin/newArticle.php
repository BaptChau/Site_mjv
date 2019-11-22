<form action="" method="post">
    <fieldset>
        <legend>Nouvel Article dans le calepin :</legend>
        <label for="nom">Qui écrit ?</label>
        <input type="text" require name="auteur" id="nom" class="form-control" placeholder="Jean-Pierre Tartenpion">

        <label for="titre">Titre</label>
        <input type="text" require name="titre" class="form-control" id="titre" placeholder="Exemple: Info match [-18]">

        <label for="contenu">Corps de l'article</label>
        <textarea name="contenu" require class="form-control" id="contenu" cols="30" rows="10" placeholder="Quel est l'horaire du match -18 de ce week-end ?"></textarea>
    </fieldset>
        <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
</form>

<?php
require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';
use App\Models\Article;

$art = new Article('test1','Loremipsokndezaihfcoipdsqjvichjqzoslkfoijhcekkf$opicjenjsd^pfoihcebrnspfijcperijkskfôieczkqjkcojencodj', 'baptiste');
$art->save();