<?php
namespace App;
require '../vendor/autoload.php';


use App\Models\User;
use PDO;
class Auth
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login(string $username, string $password): ?User{
        $query = $this->pdo->prepare('SELECT * FROM user where username = :usrn');
        //user correspondant unsername
        $query->execute(['usrn'=>$username]);
        
        $user = $query->fetchObject(User::class);
        // dump($password);
        // dump(password_get_info($password));
        // dump($user->password);
        // dump(password_get_info($user->password));
        // dump(\password_verify($user->password,$password));

        // dump($user);
        //password_verify
        if ($user === false) {
            return null;
        }
        if(password_verify($password, $user->password)){
          if (session_status() === PHP_SESSION_NONE) {
            \session_start();
        }  
        $_SESSION['auth'] = $user -> id;
        return $user;
    }

        return null;
    }

    public function user(): ?User{



    }

    public function logout(){

        if (session_status()=== PHP_SESSION_ACTIVE) {
            session_destroy();
        }

        
    }
}
