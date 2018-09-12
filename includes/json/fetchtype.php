<?php 
header("Content-type:application/json");
include("../includes/config.php");

$type = $_GET['t'];
$stid = oci_parse($conn, "select * from ".$type." where ".$type."_id = (select max(".$type."_id) from ".$type.")");
$err = oci_execute($stid);
$data = array();


//print "select * from ".$type." where ".$type."_id = (select max(".$type."_id) from ".$type.")";
while ($row = oci_fetch_array($stid, OCI_BOTH)){
        $id = $row[0];
		$id +=1;
		$data[] = array(
						'id' => $id);
		
}
echo json_encode($data);


?>