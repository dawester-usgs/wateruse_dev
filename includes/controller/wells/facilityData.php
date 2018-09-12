<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 
$validate = new validate();

$q = htmlentities($_GET['facility_id']);
$table = htmlentities($_GET['type']);
## Initiate REST##

$q1 = explode ('(',$q);

// $facility_id = trim($q1[1],')');


// if (is_numeric($q1[0])){
	// $facility_id= trim($q1[1],')');
// }else{
	// $facility_id = $q1[0];
	// print 'aaahhhh';
// }


if (is_numeric(trim($q1[0]))){
	$facility_id = trim($q1[0]);
}else{
	$facility_id= trim($q1[1],')');
}


$wyear = $_GET['wyear'];

switch ($table){
	case 'WS';
	$table = 'WSUPPLY';
	break;

	case 'MI';
	$table = 'MINING';
	break;
	
	case 'IN';
	$table = 'MINING';
	break;
	
	case 'CO';
	$table = 'COMMERCIAL';
	break;

	
}



$sql = "SELECT * from 
			".$table." 
		where 
		facility_id = '".$facility_id."'
		AND wyear ='".$wyear."'
		";
$parserSQL = oci_parse($conn, $sql);
$err = oci_execute($parserSQL);
// print $sql;

$data = array();
while ($row = OCI_FETCH_ARRAY($parserSQL,OCI_BOTH)){

	if ($table == "WSUPPLY"){
		$data [] = array("facility_id"=> $row['FACILITY_ID'],
					"wyear"=> $row['WYEAR'],
					"use_cd"=> $row['USE_CD'],
					"sic_code"=> $row['SIC_CODE'],
					"facility_name"=> $row['FAC_NAME'],
					"record_meth"=> $row['RECORD_METH'],
					"loss_amt"=> $row['LOSS_AMT'],
					"ent_units"=> $row['ENT_UNITS'],
					"dom_pop_serv"=> $row['DOM_POP_SERV'],
					"dom_del_amt"=> $row['DOM_DEL_AMT'],
					"dom_no"=> $row['DOM_NO'],
					"com_del_amt"=> $row['COM_DEL_AMT'],
					"com_no"=> $row['COM_NO'],
					"ind_del_amt"=> $row['IND_DEL_AMT'],
					"ind_no"=> $row['IND_NO'],
					"min_del_amt"=> $row['MIN_DEL_AMT'],
					"min_no"=> $row['MIN_NO'],
					"agr_del_amt"=> $row['AGR_DEL_AMT'],
					"agr_no"=> $row['AGR_NO'],
					"irr_del_amt"=> $row['IRR_DEL_AMT'],
					"irr_no"=> $row['IRR_NO']
				);
	}else{
		$data [] = array("facility_id"=> $row['FACILITY_ID'],
						"wyear"=> $row['WYEAR'],
						"use_cd"=> $row['USE_CD'],
						"sic_code"=> $row['SIC_CODE'],
						"second_sic_code"=> $row['SECOND_SIC_CODE'],
						"facility_name"=> $row['FAC_NAME'],
						"loss_amt"=> $row['LOSS_AMT'],
						"ent_units"=> $row['ENT_UNITS'],
						);
	}
	
	
}
echo json_encode($data);

?>