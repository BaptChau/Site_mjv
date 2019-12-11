<?php

use App\Base\Bdd;
use App\Models\Article;

$bdd = new Bdd();
$id_news = substr(strstr($_SERVER['REQUEST_URI'],'id='),3);

$newsToEdit = $bdd->executeQueryReturnObject($bdd->getArticleById(),[$id_news]);
// dump($newsToEdit);
// exit();
$admin = null;
if ($newsToEdit->adminValid == 0) {
    $admin = false;
}
elseif ($newsToEdit->adminValid == 1) {
    $admin = true;
}
$article = new Article($newsToEdit->titre,$newsToEdit->contenu,$newsToEdit->auteur,$admin);
if($admin){
    $article->updateValidStatut([':valid'=>false,':id'=>strval($id_news)]);

}

else{
    
    $article->updateValidStatut([':valid'=>true,':id'=>strval($id_news)]);
}

header('Location:'.$router->url('dashboard'));
