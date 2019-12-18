<?php

use App\Base\Bdd;
// dump($_POST);

$bdd = new Bdd();

if ($_POST['delete'] !== strval(1)) {
    header('Location:'.$router->url('allUser'));
}

else{
    // dump(intval([$_POST['delete']]));
    if($bdd->executeQueryNoReturn($bdd->deleteUser(),[$_POST['id_user']])){
        header('Location:'.$router->url('index'));

    }
    else{
    header('Location:'.$router->url('allUser'));

    }
    
    
}
