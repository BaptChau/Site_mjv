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
    public $username;

    /**
     * Mot de passe de l'utilisateur
     *
     * @var string
     */
    public $password;

    /**
     * Identité de l'utilisateur
     *
     * @var string
     */
    public $identite;

    /**
     * id de l'utilisateur dans la base 
     *
     * @var int 
     */
    public $id_user;
    
}
