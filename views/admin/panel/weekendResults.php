<?php

use App\Auth;
use App\Base\Bdd;
use App\Models\WeekendResults;

session_start();
$bdd = new Bdd();
$auth = new Auth($bdd->getConnexion());
$user = $auth->user();

if ($user === null) {
    // dump($_SESSION);
    // dump($user);
    header('Location:' . $router->url('index'));
}
$repo = new WeekendResults();

$results = $repo->read();
?>


<div class="container">

<table class="table table-stripped table-hover">
    <thead class="table-primary">
        <th>
            Date :
        </th>
        <th>
            Results :
        </th>
        <th>
            Actions :
        </th>
    </thead>
    <tbody>
        <?php foreach($results as $k => $v): ?>
        <tr>
            <td>
                <?= $v['weekend'] ?>
            </td>
            <td>
                <?= $v['results']?>
            </td>
            <td>
            <form action="<?= $router->url('resultsGest', [$_POST, "method"=>"EDIT"]) ?>" method="post" style="display: inline-block">
                        <input type="hidden" name="id" value="<?= $v['id_results'] ?>">
                        <input type="hidden" name="week" value="<?= $v['weekend'] ?>">
                        <input type="hidden" name="results" value="<?= $v['results'] ?>">

                        <button class="btn btn-warning" type="submit">Editer</button>
                    </form>
                    <form action="<?= $router->url('resultsGest', [$_POST, "method"=>"DELETE"]) ?>" 
                    onsubmit="return confirm('Etes vous sûr(e) ?')"
                    method="post" style="display: inline-block">
                        <input type="hidden" name="id" value="<?= $v['id_results'] ?>">

                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<a href="<?= $router->url('createWeek') ?>" class="btn btn-success float-right">Ajouter Résultats</a>
</div>