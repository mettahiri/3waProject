<?php
include "model/MesCommandesModel.php";

class MesCommandes extends MesCommandesModel {
    public function sendId(Int $id) {
        if(!empty($id)) {
            return $this->getCommandes($id);
        }else {
            header("location:index");
        }
    }
}
  

$mesCommandes = new MesCommandes;
if(isset($_SESSION["user"]["id"])){
    $commandes = $mesCommandes->sendId($_SESSION["user"]["id"]);
    include "view/mesCommandes.phtml";
} else {
   header("location:index");
}
?>