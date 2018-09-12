<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 

//$type = $_GET['type'];
#$searchstring =strtoupper(mysql_escape_string($_GET['q']));



//$conds = is_numeric($searchstring) ? $type."_id = ".$searchstring : $type."_nm = '".$searchstring."'";


//$whereconditions  = $_GET['directquery'] != '1' ? "WHERE ".$type."_id like '%".$searchstring."%' OR ".$type."_nm like '%".$searchstring."%'" :  "WHERE ".$conds;


$query = "select  * from station_relay where old_".$_GET['type']."_id = '".$_GET['id']."'";
					//WHERE name = '".$searchstring."'";
					
		
	#print  $query;
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();

	if ($_GET['debug'] == '1') print $query;
	
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				$data[] = array("mpid" => $row['MPID'],
								"new_owner_id" => $row['NEW_OWNER_ID'],
								"new_owner_nm" => $row['NEW_OWNER_NM'],
								"new_diverter_id" => $row['NEW_DIVERTER_ID'],
								"new_diverter_nm" => $row['NEW_DIVERTER_NM'],
								"mdate" => $row['MDATE'],
								"mname" => $row['MNAME'],
								"cdate" => $row['CDATE'],
								"cname" => $row['CNAME'],
								"old_owner_id" => $row['OLD_OWNER_ID'], 
								"old_diverter_id" => $row['OLD_DIVERTER_ID'],
								"wyear" => $row['WYEAR'],
								"move_type" => $row['NEW_OWNER_ID'],
								);
				
		}
	
	echo json_encode($data);



?>