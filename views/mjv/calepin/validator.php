<?php

use App\Models\Article;
// dump($_POST);
$author = $_POST['auteur'];
$content = $_POST['contenu'];
$title = $_POST['titre'];
$validArticle = '0';

$article = new Article($title,$content,$author,$validArticle);
// dump($article);
$article->save();

header('Location: '.$router->url('calepin'));
