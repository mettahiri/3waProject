<?php
include "model/AccueilModel.php";

class Accueil extends AccueilModel {
   private $FrontPageProducts =Array();

   public function getFrontPageProducts(Array $products){
              foreach($products as $product){
                if($this->productFrontPage($product)){
                    array_push(  
                         $this->FrontPageProducts, 
                         $this->productFrontPage($product)
                     );
                }
              }
              return $this->FrontPageProducts;
   }
   
}
$accueil = new Accueil();
// $count = $accueil->countProducts()["total"];

// $productId = [
//     rand(1,$count),
//     rand(1,$count),
//     rand(1,$count)
// ];
//$frontPage = $accueil->getFrontPageProducts($productId);

$accueil->getCategories();

$productTitle = [
    "node",
    "react",
    "git"
];

$accueil = new Accueil();
$frontPage = $accueil->getFrontPageProducts($productTitle);
$accueil->getCategories();

include "view/accueil.phtml"
?>