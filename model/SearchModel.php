<?php
include "conf/Config.php";

class SearchModel extends Config {
     public function searchProduct(String $titre) {
       $req = $this->pdo->prepare("SELECT * FROM produits WHERE titre LIKE :titre OR description LIKE :description");
       $req->execute([
           "titre" => "%".$titre."%",
           "description" => "%".$titre."%"
       ]);
       return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>