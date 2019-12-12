<?php

namespace App\Base;

use \PDO;

class Bdd
{
    /**
     * 
     * @var PDO
     */
    protected $connexion;

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
        $req = "SELECT * FROM `calepin` WHERE adminValid = 1 order by id_article DESC ";

        return $req;
    }
    
    public function getLast5Article(){
        $req = "SELECT * FROM `calepin` WHERE adminValid = 1 ORDER BY id_article DESC LIMIT 5 ";
      

        return $req;
    }

    public function getNonValidArticle(){

        $sql = "SELECT * FROM `calepin` WHERE adminValid = false";

        return $sql;
    }

    public function getArticleById():string{
        $sql = "SELECT * FROM `calepin` WHERE id_article = ?";

        return $sql;
    }

    public function getReportedArticle():string{
        $sql = "SELECT * FROM `calepin` WHERE `reported` = true";
        return $sql;
       }

       public function getReportedArticleById():string{
        $sql = "SELECT * FROM `calepin` WHERE `reported` = true and id_article = ?";
        return $sql;
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

    public function getNewsByUser(){
        $sql = "SELECT * FROM news WHERE auteur = ? ORDER BY id_news DESC";

        return $sql;
    }

    public function getAllNews(){
        $sql = "SELECT * FROM news ORDER BY id_news DESC";


        return $sql;
    }

    public function getLast5News(){
        $sql = "SELECT * FROM news ORDER BY id_news DESC limit 5";
        return $sql;
    }

    public function getNewsById():string{
        $sql = "SELECT * FROM news WHERE id_news = ?";
        
        return $sql;
    }

    public function getResultsOfTheWeek() :string {
        $sql = "SELECT * from week_end_results where weekofyear(`weekend`) = ?";
        return $sql;

    }

    public function getLast5Results() :string {
        $sql = "SELECT * FROM week_end_results ORDER BY id_results DESC LIMIT 5";

        return $sql;
    }

    public function getAuthor(){
        $sql = "SELECT identite FROM user where id_user = (SELECT auteur FROM news WHERE id_news = ?)";

        return $sql;
    }


    public function createUser(){
        $sql = "INSERT INTO user VALUES (?,?,?,?)";

        return $sql;
    }

    public function deleteUser(){
        $sql = "DELETE FROM `user` WHERE id_user = ? ";

        return $sql;
    }

    public function getAllUser(){
        $sql = "SELECT id_user,identite, username FROM user";

        return $sql;
    }

    public function executeQuery(string $sql, array $params = []) :array {
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute($params);
        $arr = $stmt->fetchAll();

        return $arr;
    }

    public function executeQueryReturnObject(string $sql, array $params = []){
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute($params);
        $arr = $stmt->fetchObject();

        return $arr;
    }

    public function executeQueryNoReturn(string $sql, array $params = []) {
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }

    
}
