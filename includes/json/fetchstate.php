<?php 
header("Content-type:application/json");
include("../includes/config.php");

$stid = oci_parse($conn, "select state_ab, state_nm,state_cd from state order by state_ab");
$err = oci_execute($stid);
$data = array();

while ($row = oci_fetch_array($stid, OCI_BOTH)){
        $cd = $row[0];
        $nm = $row[1];
        $id = $row[2];
		$data[] = array('ab' => $cd, 
						'nm' => $nm,
						'id' => $id);
		
}
echo json_encode($data);


?>