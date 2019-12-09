<?php
namespace App\Models;

use App\Base\Bdd;
use Exception;

class News {

    private $id_news;

    private $titre;

    private $contenu;

    private $auteur;

    private $pdo;

    public function __construct($title, $content,$author)
    {
        $this->titre = $title;
        $this->contenu = $content;
        $this->auteur = $author;

        $this->pdo = new Bdd();

    }


    /**
     * Get the value of auteur
     */ 
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of id_news
     */ 
    public function getId_news()
    {
        return $this->id_news;
    }

    /**
     * Set the value of id_news
     *
     * @return  self
     */ 
    public function setId_news($id_news)
    {
        $this->id_news = $id_news;

        return $this;
    }

    public function isValid() :bool {
        if (gettype($this->getTitre()) === 'string' &&
            gettype($this->getContenu()) === 'string' &&
            gettype($this->getAuteur()) === 'integer'
            
            ) {
                return true;
            
        }

        return false;
    }

    public function save() :bool {
        if ($this == null){
            throw new Exception("Erreur article vide", 12);
            return false;
        }
        elseif (empty($this->getContenu())
                || empty($this->getTitre())

                && $this->isValid()
                ){

            throw new Exception("Certain champs sont vide", 11);
            return false;
        }

        else{

           $bdCon = $this->pdo->getConnexion();

           $sql = "INSERT INTO `news` VALUES (NULL,? ,? ,?)";
           $stmt = $bdCon-> prepare($sql);
           $nText = $this->getContenu();
           $nTitle = $this->getTitre();
           $nAuthor = $this->getAuteur();
           dump($this);
            try {
                //code...
                $arr = array($nTitle,$nText,$nAuthor);
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
}