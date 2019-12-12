<?php
namespace App\Models;

use App\Base\Bdd;

class Entrainement extends Bdd{

    
    public function getAll(){
        $sql = "SELECT * FROM entrainement";

        return $this->executeQuery($sql);
    }

    public function getEquipe(){
        $sql = "SELECT equipe from entrainement";

        return $this->executeQuery($sql);
    }


}