<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 

//$type = $_GET['type'];
#$searchstring =strtoupper(mysql_escape_string($_GET['q']));



//$conds = is_numeric($searchstring) ? $type."_id = ".$searchstring : $type."_nm = '".$searchstring."'";


//$whereconditions  = $_GET['directquery'] != '1' ? "WHERE ".$type."_id like '%".$searchstring."%' OR ".$type."_nm like '%".$searchstring."%'" :  "WHERE ".$conds;


$query = "select * from cnst_contractor order by  NAME asc";
					//WHERE name = '".$searchstring."'";
					
		
	#print  $query;
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();

	if ($_GET['debug'] == '1') print $query;
	
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				$data[] = array("id" =>$row[0],
										"nm" =>$row[1]
										);
				
		}
	
	echo json_encode($data);



?>