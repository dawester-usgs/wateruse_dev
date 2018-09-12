<?php 
header("Content-type:application/json");
include("../includes/config.php");

$stid = oci_parse($conn, "select county_cd, county_nm from county where county_cd NOT IN ('151','153','154') order by county_cd");
$err = oci_execute($stid);
$data = array();

while ($row = oci_fetch_array($stid, OCI_BOTH)){
        $cd = $row[0];
        $nm = $row[1];
		$data[] = array('cd' => $cd, 
						'nm' => $nm);
		
}
echo json_encode($data);


?>