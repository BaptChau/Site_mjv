<?php

use App\Models\Link;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

$link = new Link();

$u18 = $link->read('u18m');

?>


<h1>Equipe -18 Masculine</h1>
<div>

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?= $u18[0]['link'] ?>" allowfullscreen></iframe>
    </div>

    <h3>Le mot des responsables de l'equipe Nicolas Jacquot et Fabien Denis : </h3>
    <p>
        Nicolas : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos possimus laboriosam distinctio minima odit fuga?
    </p>
    <p>
        Fabien : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis, aliquam.
    </p>
</div>