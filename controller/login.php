<?php
include "model/LoginModel.php";

class Login extends LoginModel {
    private $error="";
    function sendDataUser(Array $data){
        if(isset($data["submit"])) {

            $user = Array(
                 "email"      => htmlentities($data["email"]),
                 "mdp"        => htmlentities($data["mdp"]),
            );
            
            if(!empty($user["email"]) && !empty($user["mdp"])){  

                    if($this->logIn($user) && password_verify($user["mdp"], $this->logIn($user)["mdp"])){
                        $this->userToSession($this->logIn($user));
                        header("location:index");
                    }else{
                        $this->setErrorMessage("Email ou Mot de passe invalid !");
                    }
                }else{
                    $this->setErrorMessage("Remplissez tout les champs !");
                }  
            }
        }
    
    function setErrorMessage(String $msg) {
        $this->error = $msg ;
    }

    function getErrorMessage(){
        return  $this->error ;
    }
    
   
}

$users = new Login();
$users->sendDataUser($_POST);
$error = $users->getErrorMessage();
include "view/login.phtml"
?>