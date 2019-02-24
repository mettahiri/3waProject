<?php
include "conf/Config.php";
class PanierModel extends Config {

    protected function idProduit($id) {
       $req = $this->pdo->prepare("SELECT * FROM produits WHERE id = :id");
       $req->execute([
           "id" => $id
       ]);
       return $req->fetch(PDO::FETCH_ASSOC);
    }

    protected function ajouterAuPanier(Int $id=null,$qtt,$taille){
            
		  if(!is_null($id)){
			  
			 $produit = $this->idProduit($id);
			 
			 if(!empty($produit)){
				 
				$this->ajouterArticle( $produit["titre"] , $qtt ,$taille, $produit["prix"],$produit["img"]);
				 
			 }
		  }
    }

    protected function ajouterArticle($libelleProduit,$qteProduit,$taille,$prix,$img){
		
		if($this->creationDePanier()){
			
			$positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
            $positionTaille = array_search($taille, $_SESSION['panier']['taille']);
            
                if ($positionProduit !==false){

                    if($positionTaille !== false){
                         $_SESSION['panier']['qteProduit'][$positionTaille] += $qteProduit ;
                    }else {
                        array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
                        array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
                        array_push( $_SESSION['panier']['prixProduit'],$prix);
                        array_push( $_SESSION['panier']['img'],$img);
                        array_push( $_SESSION['panier']['taille'],$taille);
                    }
                     
				}else{
                        array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
                        array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
                        array_push( $_SESSION['panier']['prixProduit'],$prix);
                        array_push( $_SESSION['panier']['img'],$img);
                        array_push( $_SESSION['panier']['taille'],$taille);
                }
                
            $this->quantiteGlobal();
            $this->montantGlobal();
		}
    }

    public function quantiteGlobal(){
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['qteProduit']); $i++)
        {
            $total += $_SESSION['panier']['qteProduit'][$i];
        }
        $_SESSION['panier']['quantiteGlobal']=$total;
    }
    
    public function montantGlobal(){
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
        {
            $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
        }
        $_SESSION['panier']["prixGlobal"] = $total;
    }
    public function supprimerQauntite($s) {
        if($_SESSION["panier"]["qteProduit"][$s] !=0){
                      $_SESSION["panier"]["qteProduit"][$s] -=1 ;
        }
           $this->quantiteGlobal();
            $this->montantGlobal();
           header("location:index?page=panier");
    }
     public function ajouterQauntite($a) {
          $_SESSION["panier"]["qteProduit"][$a] +=1 ;
           $this->quantiteGlobal();
            $this->montantGlobal();

           header("location:index?page=panier");
    }
}
?>