<?php
include "conf/Config.php";
class SuccessModel extends Config {
    
    public function saveCommande(Array $commande){
      
        $req = $this->pdo->prepare(
                       "INSERT INTO commande(utilisateur_id, commande, prix_total, adresse_livraison, etat) 
                        VALUES(:id_user, :commande, :prixGlobal, :adresse, :etat)"
                    );

         $req->execute([
            "id_user"    =>  $commande['id_user'],
            "commande"   => $commande['commande'],
            "prixGlobal" => $commande['prixGlobal'],
            "adresse"    => $commande['adresse'],
            "etat"       => $commande['etat']
        ]);
    }

}

?>