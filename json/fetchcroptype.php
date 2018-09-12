<?php 
header("Content-type:application/json");
include("../includes/config.php");
$use_cd = $_GET['use_cd'];

if ($use_cd == 'all'){
	$sqlQuery = "SELECT DISTINCT(SIC_CODES.SIC_NM),SIC_CODES.SIC_CD   FROM SIC_CODES
					INNER JOIN USE_TYPE ON SIC_CODES.USE_CD = USE_TYPE.USE_CD 
					ORDER BY SIC_NM ASC";
}else{
	$sqlQuery = "SELECT DISTINCT(SIC_CODES.SIC_NM),SIC_CODES.SIC_CD   FROM SIC_CODES
					INNER JOIN USE_TYPE ON SIC_CODES.USE_CD = USE_TYPE.USE_CD 
					WHERE USE_TYPE.USE_CD IN (".$use_cd.")
					ORDER BY  SIC_NM ASC";
}

$stid = oci_parse($conn, $sqlQuery);
//print $sqlQuery;
$err = oci_execute($stid);
$data = array();


while ($row = oci_fetch_array($stid, OCI_BOTH)){
        $use_cd = $row['USE_CD'];
        $sic_cd = $row['SIC_CD'];
		$sic_nm = $row['SIC_NM'];
		$data[] = array('sic_nm' => $sic_nm,
						'sic_cd' => $sic_cd);
		
}
echo json_encode($data);


?>