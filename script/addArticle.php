<?php

use App\Models\Article;
// dump($_POST);
$author = $_POST['auteur'];
$content = $_POST['contenu'];
$title = $_POST['titre'];

$article = new Article($title,$content,$author);
// dump($article);
$article->save();


header('Location: '.$router->url('calepin'));
