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
    
    public function getLast5Article(){
        $req = "SELECT * FROM `calepin` ORDER BY id_article DESC LIMIT 5 ";
        $stmt = $this->connexion->prepare($req);
        $stmt->execute();
        $arr = $stmt -> fetchAll();

        return $arr;
    }

    public function connexionUser($username, $password): bool
    {
        $sql = "SELECT id_user from user where username = ? AND `password` = ?  ";

        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($username,$password));
        $arr = $stmt -> fetchAll();

        if (sizeof($arr)>1 || sizeof($arr) == 0) {
            return false;
        }
        else {
            session_start();
            return true;
        }
    }
}
