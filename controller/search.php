<?php
include "model/SearchModel.php";

class Search extends SearchModel {
    protected $searched;

    public function searching($txt) {
      $this->searched = $this->searchProduct($txt);
    }

    public function getSearchedProduct(){
        return $this->searched;
    }
}

$search = new Search();

if(isset($_GET["searching"])) {

    $search->searching( htmlentities($_GET["searching"]) );
    if($search->getSearchedProduct()){
            echo json_encode($search->getSearchedProduct());

    } else {
            echo json_encode([["error"=>"Aucun résultat trouvé"]]);
    }
}

?>