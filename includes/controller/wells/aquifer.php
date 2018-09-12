<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 

//$type = $_GET['type'];
#$searchstring =strtoupper(mysql_escape_string($_GET['q']));



//$conds = is_numeric($searchstring) ? $type."_id = ".$searchstring : $type."_nm = '".$searchstring."'";


//$whereconditions  = $_GET['directquery'] != '1' ? "WHERE ".$type."_id like '%".$searchstring."%' OR ".$type."_nm like '%".$searchstring."%'" :  "WHERE ".$conds;


$query = "select  distinct(aquifer_nm),aquifer_cd from aquifer_county order by aquifer_nm";
					//WHERE name = '".$searchstring."'";
					
		
	#print  $query;
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();

	if ($_GET['debug'] == '1') print $query;
	
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				$data[] = array("id" =>$row['AQUIFER_CD'],
										"nm" =>$row['AQUIFER_NM']
										);
				
		}
	
	echo json_encode($data);



?>