<?php
class Config{
	
	 protected $pdo;
	 public function __construct() 
	 {
		
		/**
		 * Se connecter ici a la base de donner
		 */
		$this->connexion("localhost","products","root","");

		 if (session_status() == PHP_SESSION_NONE) {
         session_start();
		}

		
		 $this->creationDePanier();
		
	 }
    // GETTER CONNEXION
	public function connexion($host=null,$dbname=null,$user=null,$password=null){
		
		 $this->setBdd($host,$dbname,$user,$password);
		
	}

	// SETTER  CONNEXION
	protected function setBdd($host,$dbname,$user,$password){	   
			$this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname.";charset=utf8",$user,$password);
	}

	// PANIER
	 protected function creationDePanier(){
		
        if (!isset($_SESSION['panier'])){
            $_SESSION['panier']=array();
            $_SESSION['panier']['libelleProduit'] = array();
            $_SESSION['panier']['qteProduit'] = array();
            $_SESSION['panier']['prixProduit'] = array();
            $_SESSION['panier']['img'] = array();
			$_SESSION['panier']['taille'] = array();
			$_SESSION['panier']['quantiteGlobal'] ="";
        }

        return true;
    } 



}
?>