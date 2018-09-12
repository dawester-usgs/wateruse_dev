<?php 
header("Content-type:application/json");
include("../includes/config.php");

$typeReport  = 'F';
$filter = $_GET['filter'];
$q = strtoupper($_GET['q']);

$filterConds = '';

if ($filter == '1'){
	if ($_SESSION['COUNTY_CD'] != '151' && $_SESSION['COUNTY_CD'] != '153'){
		$filterConds = "report_county.type_cd = '".$typeReport."'
							and  report_county.county_cd = '".$_SESSION['COUNTY_CD']."' AND";
							
		if (strpos($a, 'abandon') !== false) {
			$filter1=		"FACILITY_NM not like '%%ABAND%%' AND";
			$filterConds  .= ' '.$filter1;
		}
		
		
	}
	
}
if (is_numeric($q)){
	$conds = "FACILITY_ID like '%%".$q."%%'";
}
else{
	$conds = "FACILITY_NM like '%%".$q."%%'";
}


$query = "SELECT  DISTINCT FACILITY_NM, FACILITY_ID FROM FACILITY 
							/*INNER JOIN REPORT_COUNTY ON FACILITY.COUNTY_CD = REPORT_COUNTY.ID*/
							WHERE 
							".$filterConds."
							".$conds."
												
							AND FACILITY_NM not like '%%REMOVE%%'
							AND FACILITY_NM not like '%%DELET%%'
							AND FACILITY_NM not like '%%UNKNOWN%%'
							AND FACILITY_NM not like '%%*%%'
							AND FACILITY_NM not like '%%--%%'
							AND FACILITY_NM not like '%%//%%'
							AND FACILITY_NM not like '%%0000000%%'
							ORDER BY FACILITY_NM ASC";
							
$stid = oci_parse($conn, $query);

if ($_GET['debug'] == '1') print $query;				
$err = oci_execute($stid);
$data = array();


while ($row = oci_fetch_array($stid, OCI_BOTH)){
      
        $fnm = $row['FACILITY_NM'];
		$fid = $row['FACILITY_ID'];
		
		
		$data[] = array('id' => $fid,
						'nm' => $fnm);
						
		
}
echo json_encode($data);


?>