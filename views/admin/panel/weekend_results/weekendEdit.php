<?php
use App\Auth;
use App\Base\Bdd;


session_start();
$bdd = new Bdd();
$auth = new Auth($bdd->getConnexion());
$user = $auth->user();

if ($user === null) {
    // dump($_SESSION);
    // dump($user);
    header('Location:' . $router->url('index'));
}

?>
<h2>Résultats du weekend :</h2>
    <div class="col">


        <form action="<?= $router->url('resultsGest', [$_POST, "method"=>"PUT"]) ?>" method="post">
            <div class="row">
                <input type="hidden" name="id" value="<?= $_SESSION['week_id'] ?>">
                <label for="date">Date</label>
                <input type="date" name="week" id="date" value="<?= $_SESSION['week'] ?>" class="form-control">
            </div>
            <br>
            <div class="row">
                <label for="resultat">Résultats</label>
                <textarea name="results" id="resultat" cols="30" rows="10" class="form-control"><?= $_SESSION['result'] ?></textarea>
            </div>
            <br>
            <div class="row">
                <button type="submit" class="btn btn-lg btn-success">Modifier</button>
            </div>
        </form>

    </div>
</div>