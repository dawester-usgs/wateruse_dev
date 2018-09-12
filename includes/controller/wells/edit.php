<?php
header("Content-type:application/json");
include ("../../includes/config.php"); 


$sql = new sql();


if ($_POST['pay'] == 'Y'){
	$insert = $sql->insert($_POST,'paymentgateway');
	//print '1';
}else{
	
	$insert = $sql->insert($_POST,'ann_data');
	#print 'save ann data';
}

//echo json_encode('success');
//print $insert;


?>