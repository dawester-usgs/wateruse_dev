<?php 
header("Content-type:application/json");
include("../includes/config.php");

$typeReport  = 'O';
$filter = $_GET['filter'];
$q = strtoupper($_GET['q']);
$q =  str_replace("'", "''", $q);
$filterConds = '';

if ($filter == '1'){
	if ($_SESSION['COUNTY_CD'] != '151' && $_SESSION['COUNTY_CD'] != '153'){
		$filterConds = "report_county.type_cd = '".$typeReport."'
							and  report_county.county_cd = '".$_SESSION['COUNTY_CD']."' AND
							OWNER_NM not like '%%ABAND%%' AND";
			$filterJoin	 ="INNER JOIN REPORT_COUNTY ON Owner.owner_id = REPORT_COUNTY.ID";
			if (strpos($a, 'abandon') !== false) {
			$filter1=		"DIVERTER_NM not like '%%ABAND%%' AND";
			$filterConds  .= ' '.$filter1;
		}
		
	}
	
}


if (is_numeric($q)){
	$conds = "OWNER_ID like '%%".$q."%%'";
}
else{
	$conds = "OWNER_NM like '%%".$q."%%'";
}

	#$conds = "OWNER_NM like '%%".$q."%%' OR  OWNER_ID like '%%".$q."%%' ";

	
	
	$query = "SELECT DISTINCT OWNER_NM, OWNER_ID FROM OWNER 
							".$filterJoin."
							
							INNER JOIN STATE ON owner.mstate = state.state_ab
							WHERE 
							".$filterConds."
							".$conds."
							
							
							ORDER BY OWNER_NM ASC";
							
							if ($_GET['debug'] == '1' ) print $query;
	
$stid = oci_parse($conn, $query);
							
							
						
$err = oci_execute($stid);
$data = array();


while ($row = oci_fetch_array($stid, OCI_BOTH)){
      
        $owner_nm = $row['OWNER_NM'];
		$owner_id = $row['OWNER_ID'];
		
		
		$data[] = array('id' => $owner_id,
						'nm' => $owner_nm);
						
		
}
echo json_encode($data);


?>