<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 

//$type = $_GET['type'];
#$searchstring =strtoupper(mysql_escape_string($_GET['q']));



//$conds = is_numeric($searchstring) ? $type."_id = ".$searchstring : $type."_nm = '".$searchstring."'";


//$whereconditions  = $_GET['directquery'] != '1' ? "WHERE ".$type."_id like '%".$searchstring."%' OR ".$type."_nm like '%".$searchstring."%'" :  "WHERE ".$conds;

$mpid = $_GET['m'];
$year = $_GET['y'];
$diverter_id = $_GET['d'];
$owner_id = $_GET['o'];


$query = "select 
					*
					from ann_data 
					
					where 
					mpid = '".$mpid."' 
					and wyear = '".$year."'
					and diverter_id ='".$diverter_id."'
					and owner_id ='".$owner_id."'
					";
					//WHERE name = '".$searchstring."'";
					
		
	#print  $query;
	
		$parser_nr = oci_parse($conn,$query);
		$err2 = oci_execute($parser_nr);
		oci_fetch_all($parser_nr,$r);
		$fetch_num_rows = OCI_NUM_ROWS($parser_nr);
		
		
		
		if ($_GET['debug'] == '1') print $query;
		
		
	
	
	echo json_encode($fetch_num_rows);



?>