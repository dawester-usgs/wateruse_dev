<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 


 if ($_SESSION['USER_ID']){
	if ($_SESSION['USER_TYPE'] == 'admin' || $_SESSION['USER_TYPE'] =='usgs' ||  $_SESSION['USER_TYPE']=='anrc'){
		$whereConds = "";
	}else{
		$whereConds = " WHERE user_type NOT IN ('admin','usgs','anrc')";
	}
	$query = " select unique(user_id) from users   ".$whereConds." ORDER BY user_id";
					//WHERE name = '".$searchstring."'";zz
				
		
	#print  $query;
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();

	if ($_GET['debug'] == '1') print $query;
	
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
			
			
			if (!is_numeric($row[0]) && $row[0] !=null){
					$data[] = array("user_id" =>$row[0]);
			}
			
				
		}
	
	echo json_encode($data);
 }else{
	 print 'cant access this';
 }

?>