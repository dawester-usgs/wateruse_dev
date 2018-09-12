<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 

$mpid = $_GET['mpid'];

$validate = new validate();

$mpid = $validate->validateMPID($mpid);
$data = array();

$data []= array("new_mpid"=>$mpid[0]);


echo json_encode($data);

?>