<?php
include "model/SuccessModel.php";

class Success extends SuccessModel {
    function sendDataCommand(Array $data){
            $commande = Array(
                 "id_user"      => (int) htmlentities($data["id_user"]),
                 "commande"     => htmlentities($data["commande"]),
                 "prixGlobal"   => (float) htmlentities($data["prixGlobal"]),
                 "etat"         => htmlentities($data["etat"]),
                 "adresse"      => htmlentities($data["adresse"]),
            );
            
            if(!empty($commande["adresse"]) ){                  
                    $this->saveCommande($commande);
                     unset($_SESSION["panier"]) ;
            }else{
                $this->setErrorMessage("Adresse Invalide");
            }
        }  
    function setErrorMessage(String $msg) {
        $_SESSION["adresseError"] = $msg ;
        header("location:index?page=confirmation");
    }
    
   
}
$commande = new Success();
if(isset($_POST)) $commande->sendDataCommand($_POST);
header("refresh:3;url=index");
include "view/success.phtml";
?>