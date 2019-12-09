<?php

use App\Base\Bdd;
// dump($_POST);

$bdd = new Bdd();

if ($_POST['delete'] !== strval(1)) {
    header('Location:'.$router->url('allUser'));
}

else{
    
dump(  $bdd->executeQueryNoReturn($bdd->deleteUser(),[intval([$_POST['delete']])]));
    header('Location:'.$router->url('index'));
    
}
