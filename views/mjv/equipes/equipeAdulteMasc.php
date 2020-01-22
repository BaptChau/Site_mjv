<?php

use App\Models\Link;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

$link = new Link();

$sm1 = $link->read("sm1");

$sm2 = $link->read("sm2");

?>


<h1>Equipes adultes Masculine</h1>
<div>
    <h2>Equipe 1 :</h2>

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?= $sm1[0]['link'] ?>" allowfullscreen></iframe>
    </div>

    <h3>Le mot du responsable de l'equipe Luc Chaudron : </h3>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ab maxime numquam sapiente quasi sequi id placeat nesciunt corporis veritatis.
    </p>
</div>
<hr>
<div>
    <h2>Equipe 2 : </h2>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?= $sm2[0]['link'] ?>" allowfullscreen></iframe>
    </div>
    <h3>Le mot du responsable de l'equipe Jérémy Curman : </h3>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem, nesciunt?
</div>