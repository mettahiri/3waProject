<?php
include "model/InscriptionModel.php";

class Inscription extends InscriptionModel {
  private $error = "";
    function sendDataUser(Array $data){
            $user = Array(
                 "nom"        => htmlentities($data["nom"]),
                 "email"      => htmlentities($data["email"]),
                 "mdp"        => htmlentities($data["mdp"]),
                 "mdpConfirm" => htmlentities($data["mdpConfirm"]),
                 "adresse"    => htmlentities($data["adresse"])
            );
            if(!empty($user["nom"]) && !empty($user["email"]) && 
                !empty($user["mdp"]) && !empty($user["mdpConfirm"]) && 
                !empty($user["adresse"])){  
                if(preg_match("#^\s*[a-zA-Z]{2,12}\s*$#",$user["nom"])) {
                        if(preg_match("#^\s*[a-zA-Z_\.]{3,25}@[a-zA-Z]{2,20}\.[a-zA-Z]{2,5}\s*$#",$user["email"])) {
                                if(preg_match("#^\s*[a-zA-Z]{2,12}\s*$#",$user["mdp"])) {
                                    if ($user["mdp"] === $user["mdpConfirm"]){
                                    $user["mdp"] = password_hash($user["mdp"], PASSWORD_DEFAULT);
                                        if($this->signUp($user)){
                                            $this->userToSession();
                                            header("location:index");
                                        }else{
                                            $this->setErrorMessage("Email deja existant !");
                                        }
                                    }else{
                                        $this->setErrorMessage("Mot de passe a vérifier !");
                                    }   

                                }else {
                                    $this->setErrorMessage("Le mot de passe est invalide!");
                                }
                    }else {
                        $this->setErrorMessage("L'email est invalide !");
                    }   
                } else {
                    $this->setErrorMessage("Le nom est invalide !");
                }
            }else{
                $this->setErrorMessage("Remplissez tout les champs !");
            }
    }

    function setErrorMessage(String $msg) {
        $this->error = $msg ;
    }

    function getErrorMessage(){
        return  $this->error ;
    }
   
}

$users = new Inscription();
if(isset($_POST["submit"])) $users->sendDataUser($_POST);
$error = $users->getErrorMessage();

include "view/inscription.phtml";
?>