
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
	#print 'save ann data';
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


#print_r ($_POST);
$arrconds = array();
$arr = array();
foreach ($_POST as $key =>$value){
	if ($key == 'did'){
		$arrconds = array($key=> $value);
	}elseif ($key == 'oid'){
		$arrconds[$key] = $value;
	}elseif($key == 'year'){
		$arrconds[$key] = $value;
	}elseif($key == 'mpid-h'){
		$arrconds[$key] = $value;
	}elseif($key == 'flow_meter'){
		$arrconds[$key] = $value;
	}elseif($key == 'method'){
		$arrconds[$key] = $value;
	}elseif($key == 'use_cd'){
		$arrconds[$key] = $value;
	}else{
		if ($key != 'county_cd'){
			$arr[$key] = $value;
		}
	
	}

}


$arr = array_diff(array_map('trim', $arr), array(''));						
#$arr = $_POST;						
		
$update = $sql->updateMpid($arr,'updateinfo',$arrconds);

?>