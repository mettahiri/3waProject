<?php
include "model/PanierModel.php";

class Panier extends PanierModel {

    function envoiAuPanier(Int $id,Int $qtt,String $taille) {

        if(!empty($id) && !empty($qtt) && !empty($taille) ){
            $this->ajouterAuPanier($id,$qtt,$taille);
        } else {
            header("location:index");
        }

    }

    public function viderLePanier($v) {
        if($v){
           unset($_SESSION["panier"]) ;
        }
    }
     

}

$panier = new Panier();

if(isset($_POST["submit_panier"])){
    if(isset ($_POST["id"], $_POST["quantity"], $_POST["taille"] )){
            $panier->envoiAuPanier((int) $_POST["id"],(int) $_POST["quantity"], $_POST["taille"] );
    }
    header("location:index?page=produit&id=".$_POST['id']."");
}

if(isset ($_GET["v"])) {
    if( $_GET["v"] == true || $_GET["v"] == false){
            $panier->viderLePanier($_GET["v"]);
    }
}
if(isset ($_GET["s"])) {
            $panier->supprimerQauntite((int) $_GET["s"]);
}
if(isset ($_GET["a"])) {
            $panier->ajouterQauntite((int) $_GET["a"]);
}

include "view/panier.phtml";
?>