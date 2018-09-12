<?php 
header("Content-type:application/json");
include("../includes/config.php");

$stid = oci_parse($conn, "SELECT DISTINCT(water_src_nm) FROM county_water_src ORDER BY water_src_nm ASC");
$err = oci_execute($stid);
$data = array();

while ($row = oci_fetch_array($stid, OCI_BOTH)){
        $stream_nm = $row[0];
		$data[] = array('stream_nm' => $stream_nm);
		
}
echo json_encode($data);


?>