<?php

use App\Auth;
use App\Base\Bdd;

$bdd = new Bdd();
$auth = new Auth($bdd->getConnexion());
$user = $auth->user();

if ($user === null) {
    // dump($_SESSION);
    // dump($user);
    header('Location:' . $router->url('index'));
}

// dump($user);

$arr = $bdd->executeQuery($bdd->getAllUser());

// dump($arr);
?>

<h1>Liste des utilisateurs:</h1>

<div class="container">

    <table class="table table-bordered table-hover ">
        <thead class="table-primary">
            <td>Identité:</td>
            <td>Username:</td>
            <td>Action:</td>
        </thead>
        <tbody>
            <?php foreach ($arr as $key => $value) : ?>
                <tr>
                    <td>
                        <?php echo $value['identite'] ?>
                    </td>
                    <td>
                        <?php echo $value['username'] ?>
                    </td>
                    <td>
                        <?php if($value['id_user'] === $user->id_user):?>
                        <a class="btn btn-info" data-toggle="modal" data-target="#changeMdp" >Changer mot de passe</a>
                        <a class="btn btn-danger" href="" data-toggle="modal" data-target="#suppAccount" >Supprimer</a>
                        <?php else:?>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#askDelete" >Demander Suppréssion</a>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal" id="changeMdp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Changer le mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="" method="post">
                            <label for="">Ancien mot de passe :</label>
                            <input type="text" name="oldPass" class="form-control-sm">
                            <label for="">Nouveau mot de passe :</label>
                            <input type="password" name="newPass" class="form-control-sm">
                            <label for="">Confirmation du nouveau :</label>
                            <input type="password" name="newPassConf" class="form-control-sm">
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<div class="modal" id="askDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Changer le mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="" method="post">
                            <label for="">Demande de suppréssion:</label>
                            <select name="cause" id="" class="form-control-sm">
                                <option value="1">Plus au club</option>
                                <option value="2">Piratage</option>
                                <option value="3">Oublie mot de passe</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<div class="modal" id="suppAccount">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Etes vous sûr ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Cette action est définitive !</p>
        <form action="<?= $router->url('deleteUser',$_POST) ?>" method="post">
            <input type="text" name="id_user" value="<?php echo $user->id_user ?>" hidden require>
            <input type="text" name="delete" value="1" hidden require>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>