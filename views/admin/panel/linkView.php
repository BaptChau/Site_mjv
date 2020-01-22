<?php
use App\Auth;
use App\Base\Bdd;
use App\Models\Link;

session_start();
$bdd = new Bdd();
$auth = new Auth($bdd->getConnexion());
$user = $auth->user();

if ($user === null) {
    // dump($_SESSION);
    // dump($user);
    header('Location:' . $router->url('index'));
}

$link = new Link();

$all = $link->index();

// dump($all);

?>

<table class="table table-hover table-stripped mt-4">
    <thead class="table table-dark">
        <tr>
            <th>
                Libelle :
            </th>
            <th>
                Link :
            </th>
            <th>
                Action:
            </th>
        </tr>
        <tbody>
            <?php foreach ($all as $k => $v): ?>
            <tr>
                <td>
                    <?= $v['libelle'] ?>
                </td>
                <td>
                    <a href="<?= $v['link'] ?>"><?= $v['link'] ?></a>
                    
                </td>
                <td>
                    <form action="<?= $router->url('linkgest', [$_POST, "method"=>"EDIT"]) ?>" method="post" style="display: inline-block">
                        <input type="hidden" name="libelle" value="<?= $v['libelle'] ?>">
                        <input type="hidden" name="link" value="<?= $v['link'] ?>">
                        <button class="btn btn-warning" type="submit">Editer</button>
                    </form>
                    <form action="<?= $router->url('linkgest', [$_POST, "method"=>"DELETE"]) ?>" method="post" style="display: inline-block">
                        <input type="hidden" name="libelle" value="<?= $v['libelle'] ?>">
                        <input type="hidden" name="link" value="<?= $v['link'] ?>">

                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </thead>
</table>

<a href="<?= $router->url('gestionLink') ?>" class="btn btn-success float-right">Ajouter un lien</a>
