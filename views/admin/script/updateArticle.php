<?php

use App\Models\News;

$news = $_POST['id_news'];
$title = $_POST['titre'];
$contenu = $_POST['contenu'];
$auteur = intval($_POST['auteur']);

$article = new News($title,$contenu,$auteur);
// dump($article);
// dump($article->isValid());

if ($article->isValid()) {
    $article->update([':titre'=>$title,':contenu'=>$contenu,':id'=>$news]);
    
    header('Location:'.$router->url('dashboard'));
}

else {
    header('Location:'.$router->url('addArticle'));
    
}
    


