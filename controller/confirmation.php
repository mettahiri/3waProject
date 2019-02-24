<?php
include "model/ConfirmationModel.php";

class Confirmation extends ConfirmationModel {

    function getUserData(){
        if(!empty($_SESSION["user"]["email"])) {
            return $_SESSION["user"];
        } else {
            return false;
        }
    }

    function laCommande() {
        if(!empty($_SESSION["panier"]["libelleProduit"]) ){
            return $_SESSION["panier"];
        }
    }
}

$confirmation = new Confirmation();
// var_dump($confirmation-> getUserData());
// var_dump($confirmation-> laCommande());

include "view/confirmation.phtml";
?>