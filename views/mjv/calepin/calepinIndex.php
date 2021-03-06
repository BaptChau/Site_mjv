<?php

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';

use App\Base\Bdd;

$base = new Bdd();

$arr = $base->executeQuery($base->getArticle());
// dump($arr);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <a href="<?= $router->url('calepinNew') ?>" class="btn btn-primary btn-lg m-4 ">Nouvel article</a>

        </div>
    </div>
</div>

<div class="container-fluid">
    <?php foreach ($arr as $key => $value) :  ?>
<div class="card mt-4">
<div class="card-header"><h3><?php echo ($value['titre']) ?></h3></div>

  <div class="card-body">
    <blockquote class="blockquote">
    <h4 class="card-title"><?php echo ($value['auteur']) ?> </h4>
    <h6 class="card-subtitle mb-2 text-muted"><a href="<?= $router->url('calepinReport',['id'=>$value['id_article']]) ?>" class="badge badge-pill badge-danger" > Signaler</a></h6>

    <p class="card-text"><?php echo nl2br(htmlspecialchars($value['contenu']) )?></p>
      <footer class="card-blockquote"><cite title="Source title">    <span class="badge badge-pill badge-light"><?php if($value['reported'] == 1) echo 'Cet Article a été signalé !' ?></span>
</cite></footer>
    </blockquote>
  </div>
</div>
    <?php endforeach; ?>

</div>