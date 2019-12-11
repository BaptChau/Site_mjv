<?php

use App\Base\Bdd;
use App\Models\Article;

$bd = new Bdd();

$idArticleReported = substr(strstr($_SERVER['REQUEST_URI'],'id='),3);

$article = $bd->executeQueryReturnObject($bd->getArticleById(),[$idArticleReported]);

$articleReported = new Article($article->titre,$article->contenu,$article->auteur);

$articleReported->updateReportedStatut([':report'=>true,':id'=>$idArticleReported]);

header('Location:'.$router->url('calepin'));
