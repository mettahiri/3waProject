<?php
include "conf/Config.php";
class MesCommandesModel extends Config {
    public function getCommandes($id) {
        $req = $this->pdo->prepare("SELECT * FROM commande WHERE utilisateur_id=:id ORDER BY id DESC");
         $req->execute([
            "id" => $id
        ]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>