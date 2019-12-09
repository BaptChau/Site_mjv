<?php

use App\Models\News;

$title = $_POST['titre'];
$contenu = $_POST['contenu'];
$auteur = intval($_POST['auteur']);

$article = new News($title,$contenu,$auteur);
// dump($article);
// dump($article->isValid());

if ($article->isValid()) {
    $article->save();
    
    header('Location:'.$router->url('dashboard'));
}

else {
    header('Location:'.$router->url('addArticle'));
    
}
    


