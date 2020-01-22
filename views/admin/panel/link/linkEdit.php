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
// dump($_SESSION);
$libelleEdit = $_SESSION['libelle'];
$linkEdit = $_SESSION['link'];

$link = new Link();
?>

<form action="<?= $router->url('linkgest', [$_POST, "method"=>"PUT"]) ?>" method="post" class="mt-4">
    <div class="form-group">
        <label for="libelle">Nom du liens</label>
        <input type="text" name="libelle" class="form-control" id="libelle" value="<?= $libelleEdit ?>" required>
    </div>
    <div class="form-group">
    <label for="link">URL</label>
    <input type="url" name="link" class="form-control" id="link" value="<?= $linkEdit ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Modifier</button>
</form>
