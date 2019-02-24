<?php
include "conf/Config.php";
class CategorieModel extends Config {
    public function getProductByCategorie($id) {
        $req = $this->pdo->prepare("SELECT * FROM produits WHERE id_categorie=:id ORDER BY id DESC");
         $req->execute([
            "id" => $id
        ]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>