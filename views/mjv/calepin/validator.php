<?php

use App\Models\Article;

$author = $_POST['auteur'];
$content = $_POST['contenu'];
$title = $_POST['titre'];

$article = new Article($title,$content,$title);

$article->save();

//dump($_POST);

header('Location: '.$router->url('calepin'));
