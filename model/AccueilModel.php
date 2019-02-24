<?php
include "conf/Config.php";
class AccueilModel extends Config {
    protected $test1 ;

    public function productFrontPage(String $titre) {
       $req = $this->pdo->prepare("SELECT * FROM produits WHERE titre LIKE :titre");
       $req->execute([
           "titre" =>"%".$titre."%"
       ]);
       return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function  getCategories(){
        $req = $this->pdo->prepare("SELECT * FROM categorie");
        $req->execute();
        $_SESSION["categorie"] =  $req->fetchAll(PDO::FETCH_ASSOC);
    }
    public function  countProducts(){
        $req = $this->pdo->prepare("SELECT COUNT(*) as total FROM produits");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}

?>