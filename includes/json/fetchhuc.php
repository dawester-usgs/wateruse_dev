<?php 
header("Content-type:application/json");
include("../includes/config.php");

$stid = oci_parse($conn, "SELECT huc FROM hucs ORDER BY huc ASC");
$err = oci_execute($stid);
$data = array();

while ($row = oci_fetch_array($stid, OCI_BOTH)){
        $huc = $row[0];
		$data[] = array('huc' => $huc);
		
}
echo json_encode($data);


?>