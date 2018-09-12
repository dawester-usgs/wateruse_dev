<?php
header("Content-type:application/json");
include ("../../includes/config.php"); 


$sql = new sql();

$insert = $sql->insert($_POST,'ann_data_crop','');

	


?>