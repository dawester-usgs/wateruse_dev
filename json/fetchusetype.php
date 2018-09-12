<?php 
header("Content-type:application/json");
include("../includes/config.php");

$stid = oci_parse($conn, "SELECT * FROM USE_TYPE WHERE FLAG = 'Y' and ACTIVE = 'Y' AND USE_CD <> 'IR' /* AND  USE_CD <> 'WS'*/ ORDER BY USE_CD ASC");
$err = oci_execute($stid);
$data = array();


while ($row = oci_fetch_array($stid, OCI_BOTH)){
        $use_cd = $row['USE_CD'];
        $use_nm = $row['USE_NM'];
		$active = $row['ACTIVE'];
		$flag = $row['FLAG'];
		if ($use_cd == 'AG'){
			
			$use_nm = "AGRICULTURE / IRRIGATION";
			$use_cd = "AG','IR";
			
		}
		
		$data[] = array('use_cd' => $use_cd,
						'use_nm' => $use_nm,
						'active'=>$active,
						'flag' => $flag);
		
}
echo json_encode($data);


?>