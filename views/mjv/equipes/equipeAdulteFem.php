<?php

use App\Models\Link;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

$link = new Link();
$arr = $link->read("sf");

// dump($arr);
?>


<h1>Equipes adultes Féminine</h1>
<div>
    <h2>Equipe 1 :</h2>

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?= $arr[0]['link'] ?>" allowfullscreen></iframe>
    </div>

    <h3>Le mot du responsable de l'equipe Olivier LeNormand : </h3>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem earum nam, beatae qui ex, odio doloremque est, exercitationem dolorem tempore aperiam dolores nemo modi architecto? Numquam, voluptatem. Exercitationem, quos quia.
    </p>
</div>