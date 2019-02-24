<?php
include "conf/Config.php";
class ProduitModel extends Config {

  public function getProduct( $id) {
       $req = $this->pdo->prepare("SELECT * FROM produits WHERE id=:id");
       $req->execute([
           "id" => $id
       ]);
       return $req->fetch(PDO::FETCH_ASSOC);
    }
}
?>