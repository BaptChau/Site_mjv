<?php

namespace App\Models;

use Exception;
use App\Base\Bdd;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';


class Article 
{
    private $title;

    private $author;
    
    private $content;

    private $validAdmin;

    private $reported;

    private $pdo;

    public function __construct(string $titre, string $contenu, string $auteur, bool $validAdmin = false)
    {
        $this->title = $titre;
        $this->author = $auteur;
        $this->content = $contenu;
        $this->validAdmin = $validAdmin;
        $this->reported = false;
        $this->pdo = new Bdd();
    }


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of validAdmin
     */ 
    public function getValidAdmin()
    {
        return $this->validAdmin;
    }

    /**
     * Set the value of validAdmin
     *
     * @return  self
     */ 
    public function setValidAdmin($validAdmin)
    {
        $this->validAdmin = $validAdmin;

        return $this;
    }

    public function isValid() :bool {
        if (gettype($this->getTitle()) === 'string' &&
            gettype($this->getContent()) === 'string' &&
            gettype($this->getAuthor()) === 'integer'
            
            ) {
                return true;
            
        }

        return false;
    }

    public function updateValidStatut(array $params){
        
        $sql = "UPDATE `calepin` SET `adminValid` = :valid WHERE `calepin`.`id_article` = :id  ";
        $this->pdo->executeQuery($sql,$params);
        

    }


    public function updateReportedStatut(array $params){
        $sql = "UPDATE `calepin` SET `reported` = :report WHERE `calepin`.`id_article` = :id  ";
        $this->pdo->executeQuery($sql,$params);
    }

    public function unValidArticle(array $params){
        $sql = "DELETE FROM `calepin` WHERE `id_article` = :id";

        $this->pdo->executeQuery($sql,$params);
    }

    public function save () : bool 
    {
        if ($this == null){
            throw new Exception("Erreur article vide", 12);
            return false;
        }
        elseif (empty($this->getContent())
                || empty($this->getTitle())
                || empty($this->getAuthor())
                ){

            throw new Exception("Certain champs sont vide", 11);
            return false;
        }

        else{

           $bdCon = $this->pdo->getConnexion();

           $sql = "INSERT INTO `calepin` VALUES (NULL,? ,? ,?,?,?)";
           $stmt = $bdCon-> prepare($sql);
           $nText = $this->getContent();
           $nTitle = $this->getTitle();
           $nAuthor = $this->getAuthor();
           $validAdmin = $this->getValidAdmin() ? '1':'0';
           $isReported = $this->getReported()? '1':'0';
           
           dump($this);
            try {
                //code...
                $arr = array($nTitle,$nText,$nAuthor,$validAdmin,$isReported);
                $bool = $stmt -> execute($arr);
                // var_dump($bool);
                // dump($arr);
                return $bool;
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }


        return false;
    }

    

    /**
     * Get the value of reported
     */ 
    public function getReported()
    {
        return $this->reported;
    }

    /**
     * Set the value of reported
     *
     * @return  self
     */ 
    public function setReported($reported)
    {
        $this->reported = $reported;

        return $this;
    }
}

// $art = new Article('Test Obj','text test Obj','Bapt');
// $art->save();