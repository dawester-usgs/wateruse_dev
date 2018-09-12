<?php 

include '../includes/config.php';


$logged = (empty($_SESSION['USER_ID'])) ? header("Location:https://wise.er.usgs.gov/wateruse/accounts/?redirect=wells") : $logged = true;

if ($logged == true){
	include('../includes/html/wells/maincenter.php');

}

?>