<?php

use App\Base\Bdd;
use App\Models\Article;

$bdd = new Bdd();
$id_news = substr(strstr($_SERVER['REQUEST_URI'],'id='),3);

$newsToEdit = $bdd->executeQueryReturnObject($bdd->getArticleById(),[$id_news]);

$article = new Article($newsToEdit->titre,$newsToEdit->contenu,$newsToEdit->auteur,$newsToEdit->adminValid);
if($article->adminValid){
    $article->updateValidStatut([':valid'=>false,':id'=>strval($id_news)]);

}

else{
    
    $article->updateValidStatut([':valid'=>true,':id'=>strval($id_news)]);
}

header('Location:'.$router->url('dashboard'));
