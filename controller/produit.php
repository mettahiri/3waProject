<?php
include "model/ProduitModel.php";

class Produit extends ProduitModel {
   
    function ficheProduit( $id) {

         if(isset($id) && !empty($id) && $this->getProduct($id)){
            return $this->getProduct($id);
        }else {
            header("location:index");
        }
    }
}

$p = new Produit();
$produit = $p->ficheProduit($_GET["id"]);
include "view/produit.phtml";
?>