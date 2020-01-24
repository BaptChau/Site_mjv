<?php

use App\Base\Bdd;

$id = $_POST['id'];

$bdd = new Bdd();

$sql = "DELETE FROM news WHERE id_news = ?";

$bdd->executeQueryNoReturn($sql,[$id]);

header('Location:'.$router->url('verifNews'));