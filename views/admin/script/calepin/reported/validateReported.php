<?php

use App\Base\Bdd;
use App\Models\Article;

$bd = new Bdd();

$id_article = substr(strstr($_SERVER['REQUEST_URI'],'id='),3);

$articleToCheck = $bd->executeQueryReturnObject($bd->getReportedArticle(),[$id_article]);

$article = new Article($articleToCheck->titre,$articleToCheck->contenu,$articleToCheck->auteur,$articleToCheck->adminValid);
dump($articleToCheck);
// dump($article->setReported(true));
dump($article);
dump($article->updateReportedStatut([':report'=>strval(0),':id'=>$id_article]));

header('Location:'.$router->url('verifCalpin'));