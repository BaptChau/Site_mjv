<?php

use App\Base\Bdd;
use App\Models\Article;

$bd = new Bdd();

$id_calepin = substr(strstr($_SERVER['REQUEST_URI'],'id='),3);

$newsToDelete = $bd->executeQueryReturnObject($bd->getArticleById(),[$id_calepin]);

// dump($newsToDelete);
$article = new Article($newsToDelete->titre,$newsToDelete->contenu,$newsToDelete->auteur,$newsToDelete->adminValid);
dump($article);

$article->unValidArticle([':id'=>$id_calepin]);

header('Location:'.$router->url('verifCalpin'));