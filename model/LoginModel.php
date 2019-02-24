<?php
include "conf/Config.php";
class LoginModel extends Config {
    public function logIn(Array $data) {
        $req = $this->pdo->prepare("SELECT * FROM utilisateur WHERE email=:email");
        $req->execute([
            "email" => $data['email']
        ]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

     public function userToSession($user){
        $_SESSION["user"] = $user;
       unset($_SESSION["user"]["mdp"]) ;
    }
}

?>