<?php 
	
include '../includes/config.php';

if(!defined('BASE_PATH')) {
		echo '<script> window.location.href ="https://wise.er.usgs.gov/wateruse/forbidden"; </script>';
 
}; 
/*** content goes there at the bottom **/	
$logged = (empty($_SESSION['USER_ID'])) ? header("Location:https://wise.er.usgs.gov/wateruse/accounts/?redirect=wells") : $logged = true;

if ($logged == true){
	include('../includes/html/wells/map.php');

}

?>