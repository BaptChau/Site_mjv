<?php

use App\Models\Link;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

$link = new Link();

$u15m = $link->read('u15m');

?>


<h1>Equipe -15 Masculine</h1>
<div>

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?= $u15m[0]['link'] ?>" allowfullscreen></iframe>
    </div>

    <h3>Le mot des responsables de l'equipe Louis Zanon et Gaetan Mathieu : </h3>
    <p>
        Louis : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos possimus laboriosam distinctio minima odit fuga?
    </p>
    <p>
        Gaetan : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis, aliquam.
    </p>
</div>