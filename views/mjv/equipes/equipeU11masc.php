<?php

use App\Models\Link;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

$link = new Link();

$u11 = $link->read('u11');
?>


<h1>Equipe -11 Masc</h1>
<div>

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?= $u11[0]['link'] ?>" allowfullscreen></iframe>
    </div>

    <h3>Le mot du responsable de l'equipe Jérome Lorrain : </h3>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, laboriosam.
    </p>
</div>