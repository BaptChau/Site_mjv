<?php

use App\Models\Article;


$title = $_POST['titre'];
$contenu = $_POST['contenu'];
$auteur = $_POST['auteur'];

$article = new Article($title,$contenu,$auteur);
// dump($article->isValid());
if ($article->isValid()) {
    $article->save();
    
    header('Location:'.$router->url('dashboard'));
}

else {
    header('Location:'.$router->url('addArticle'));
    
}
    


