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

        //password_verify
        if ($user === false) {
            return null;
        }
        if(password_verify($password, $user->password)){
          if (session_status() === PHP_SESSION_NONE) {
            \session_start();
            $_SESSION['__id__'] = session_id();

        }  
        
        $_SESSION['auth'] = $user->id_user;
        $_SESSION['__identite__'] = $user->identite;
        return $user;
    }

        return null;
    }

    public function user(): ?User{

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            $_SESSION['__id__'] = session_id();
        }
        $id = $_SESSION['auth'] ?? null;
        // dump($id);
        // dump($_SESSION);
        if ($id === null) {
            return null;
        }

        $query = $this->pdo->prepare('SELECT * FROM user where id_user = ?');
        //user correspondant unsername
        $query->execute([$id]);
        
        $user = $query->fetchObject(User::class);
        // dump($user);
        // dump($id);

        return $user ?:null;

    }

    public function logout(){

        if (session_status()=== PHP_SESSION_ACTIVE) {
            session_destroy();
        }

        
    }
}
