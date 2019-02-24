<?php
include "conf/Config.php";
class InscriptionModel extends Config {
    protected $user;
    
    public function signUp(Array $user){

        $this->user = $user;
        $req = $this->pdo->prepare(
                       "INSERT INTO utilisateur(nom, email, mdp, adresse) 
                        VALUES(:nom, :email, :mdp, :adresse)"
                    );

        $res = $req->execute([
            "nom" => $user['nom'],
            "email" => $user['email'],
            "mdp" => $user['mdp'],
            "adresse" => $user['adresse']
        ]);
        return $res;
    }
    public function userToSession(){
        $req = $this->pdo->query("SELECT * FROM utilisateur ORDER BY id DESC LIMIT 1");
        $_SESSION["user"] = $req->fetch(PDO::FETCH_ASSOC);
        unset($_SESSION["user"]["mdp"]) ;
    }

}

?>