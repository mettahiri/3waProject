<?php

if(!empty($_GET['page']) AND is_file('controller/'.$_GET['page'].'.php')){
	include 'controller/'.$_GET['page'].'.php';
	
}else{
	
	include 'controller/accueil.php';
}

?>