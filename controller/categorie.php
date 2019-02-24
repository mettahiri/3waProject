<?php
include "model/CategorieModel.php";

class Categorie extends CategorieModel {
    public function sendId(Int $id) {
        if(!empty($id) && $this->getProductByCategorie($id) ) {
            return $this->getProductByCategorie($id);
        }else {
            header("location:index");
        }
    }
}
$categorie = new Categorie;
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $produits = $categorie->sendId($id);
    include "view/categorie.phtml";

} else {
   header("location:index");
}
?>