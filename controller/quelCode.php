<?php
include "model/SearchModel.php";

class QuelCode extends SearchModel {
    protected $searched;

    public function searching($txt) {
      $this->searched = $this->searchProduct($txt);
    }

    public function getSearchedProduct(){
        return $this->searched;
    }
}

$search = new QuelCode();

if(isset($_GET["searching"])) {
    
    $s = $_GET["searching"];
    $search->searching(htmlentities($s));
    if($search->getSearchedProduct()){
        $produit = $search->getSearchedProduct();
        include "view/quelCode.phtml";
    } else {
        header("location:index");

    }
   
}else {
        header("location:index");
}



?>