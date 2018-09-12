<?php 
header("Content-type:application/json");
include("../includes/config.php");

$typeReport  = 'D';
$filter = $_GET['filter'];
$q = strtoupper($_GET['q']);
$q =  str_replace("'", "''", $q);
$filterConds = '';

if ($filter == '1'){
	if ($_SESSION['COUNTY_CD'] != '151' && $_SESSION['COUNTY_CD'] != '153'){
		$filterConds = "report_county.type_cd = '".$typeReport."'
							and  report_county.county_cd = '".$_SESSION['COUNTY_CD']."' AND";
		$filterJoin = "INNER JOIN REPORT_COUNTY ON DIVERTER.Diverter_id = REPORT_COUNTY.ID";	
		if (strpos($a, 'abandon') !== false) {
			$filter1=		"DIVERTER_NM not like '%%ABAND%%' AND";
			$filterConds  .= ' '.$filter1;
		}
		
		
	}
	
}


if (is_numeric($q)){
	$conds = "DIVERTER_ID like '%%".$q."%%'";
}
else{
	$conds = "DIVERTER_NM like '%%".$q."%%'";
}


$query = "SELECT  DISTINCT DIVERTER_NM, DIVERTER_ID FROM DIVERTER 
							".$filterJoin."
							INNER JOIN STATE ON Diverter.mstate = state.state_ab
							WHERE 
							".$filterConds."
							".$conds."
	
							ORDER BY DIVERTER_NM ASC";
							
$stid = oci_parse($conn, $query);

if ($_GET['debug'] == '1') print $query;				
$err = oci_execute($stid);
$data = array();


while ($row = oci_fetch_array($stid, OCI_BOTH)){
      
        $DIVERTER_nm = $row['DIVERTER_NM'];
		$DIVERTER_id = $row['DIVERTER_ID'];
		
		
		$data[] = array('id' => $DIVERTER_id,
						'nm' => $DIVERTER_nm);
						
		
}
echo json_encode($data);


?>