<?php

namespace App\Models;

use App\Base\Bdd;

class Link extends Bdd
{

    public function index()
    {
        $sql = "SELECT * FROM link";
        return $this->executeQuery($sql);
    }

    public function create($lib, $link)
    {
        $sql = "INSERT INTO link VALUES (?,?) ON DUPLICATE KEY UPDATE link = ?";

        return $this->executeQuery($sql,[$lib,$link,$link]);
    }

    public function read($lib)
    {
        $sql = "SELECT * FROM link WHERE libelle = ?";

        return $this->executeQuery($sql,[$lib]);
    }
    public function update($lib,$link)
    {
        $sql = "UPDATE link SET link = ? WHERE libelle = ?";

        return $this->executeQuery($sql,[$link,$lib]);
    }

    public function delete($lib)
    { 
        $sql = "DELETE * from link where libelle = ?";
        return $this->executeQuery($sql,[$lib]);
    }
}
