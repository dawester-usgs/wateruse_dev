<?php 

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
if ($_GET['q'] == 'int'){
	include("includes/html/search.php");
	
	
}else{
	include("includes/html/home.php");

}


?>