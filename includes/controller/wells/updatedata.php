
<?php
/*
header("Content-type:application/json");
include ("../../includes/config.php"); 


$sql = new update();


if ($_POST['edit'] == 'annual_data'){
	$insert = $sql->updatedata($_POST,'edit_anndata');
	//print '1';
}elseif ($_POST['edit'] == 'station'){
	
	$insert = $sql->updatedata($_POST,'edit_station');
	#print 'save ann data';
}elseif ($_POST['edit'] == 'pay'){
	
	$insert = $sql->updatedata($_POST,'edit_payment');
	#print 'save ann data';
}
//echo json_encode('success');
//print $insert;
*/ 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 


$sql = new update();

//$_GET['type'] == 'annData'){

$update = $sql->updateData($_POST);

?>