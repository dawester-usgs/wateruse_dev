<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 


$query = " select unique(page_link) from audit_trail ORDER BY page_link";
					//WHERE name = '".$searchstring."'";zz
				
		
	#print  $query;
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();

	if ($_GET['debug'] == '1') print $query;
	
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				$data[] = array("page_link" =>$row[0]);
				
		}
	
	echo json_encode($data);



?>