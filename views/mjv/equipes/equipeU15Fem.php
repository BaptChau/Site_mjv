<?php

use App\Models\Link;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

$link = new Link();

$u15f = $link->read('u15F');

?>


<h1>Equipe -15 Feminine</h1>
<div>

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?= $u15f[0]['link'] ?>" allowfullscreen></iframe>
    </div>

    <h3>Le mot du responsable de l'equipe Vincent Varinot : </h3>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corporis eligendi cupiditate quidem accusantium provident, soluta natus ipsum minus officia, reprehenderit odio similique obcaecati pariatur labore inventore perferendis. Aspernatur, blanditiis.
    </p>
</div>