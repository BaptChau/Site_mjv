<?php

namespace App\Base;
use \PDO;

class Bdd
{
    /**
     * 
     * @var PDO
     */
    private $connexion;

    public function __construct()
    {
        $this->connexion = new PDO('mysql:host=localhost;dbname=mjv','root','',[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    }

    


    /**
     * Get the value of connexion
     *
     * @return  PDO
     */ 
    public function getConnexion()
    {
        return $this->connexion;
    }

    public function getArticle(){
        $req = "SELECT * FROM `calepin` order by id_article DESC ";
        $stmt = $this-> connexion -> prepare($req);
        $stmt->execute();
        $arr = $stmt ->fetchAll();

        return $arr;
    }
    
}