<?php
header("Content-type:application/json");
include ("../../includes/config.php"); 


$sql = new sql();

$insert = $sql->insert($_POST,'multipaymentgateway',null);
//echo json_encode('success');
//print $insert;



?>