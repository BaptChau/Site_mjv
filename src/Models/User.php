<?php

namespace App\Models;

use App\Base\Bdd;

class User
{

    /**
     * Nom d'utilisateur
     *
     * @var string
     */
    private $username;

    /**
     * Mot de passe de l'utilisateur
     *
     * @var string
     */
    private $password;

    /**
     * Identité de l'utilisateur
     *
     * @var string
     */
    private $identite;

    public function __construct(string $nUsername, string $nPassword,string $nIdentite)
    {
        $this->username = $nUsername;
        $this->password = \password_hash($nPassword,PASSWORD_DEFAULT);;
        
        $this->identite = $nIdentite;
    }

    /**
     * Get nom d'utilisateur
     *
     * @return  string
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set nom d'utilisateur
     *
     * @param  string  $username  Nom d'utilisateur
     *
     * @return  self
     */ 
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get mot de passe de l'utilisateur
     *
     * @return  string
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set mot de passe de l'utilisateur
     *
     * @param  string  $password  Mot de passe de l'utilisateur
     *
     * @return  self
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get identité de l'utilisateur
     *
     * @return  string
     */ 
    public function getIdentite()
    {
        return $this->identite;
    }

    /**
     * Set identité de l'utilisateur
     *
     * @param  string  $identite  Identité de l'utilisateur
     *
     * @return  self
     */ 
    public function setIdentite(string $identite)
    {
        $this->identite = $identite;

        return $this;
    }
}
