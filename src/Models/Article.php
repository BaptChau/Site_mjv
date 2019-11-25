<?php

namespace App\Models;

use App\Base\Bdd;

require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';


class Article 
{
    private $title;

    private $author;
    
    private $content;

    private $pdo;

    public function __construct(string $titre, string $contenu, string $auteur)
    {
        $this->title = $titre;
        $this->author = $auteur;
        $this->content = $contenu;
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
            return fasle;
        }

        else{

           $bdCon = $this->pdo->getConnexion();

           $sql = "INSERT INTO calepin VALUES (NULL,? ,? ,?)";
           $stmt = $bdCon-> prepare($sql);
           $nText = $this->getContent();
           $nTitle = $this->getTitle();
           $nAuthor = $this->getAuthor();
            try {
                //code...
                $arr = array($nTitle,$nText,$nAuthor);
                $bool = $stmt -> execute($arr);
                var_dump($bool);
                var_dump($arr);
                return $bool;
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }


        return false;
    }
}

// $art = new Article('Test Obj','text test Obj','Bapt');
// $art->save();