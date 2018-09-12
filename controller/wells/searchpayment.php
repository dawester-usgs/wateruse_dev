<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 
$validate = new validate();


$mpid = strtoupper($_GET['mpid']);
$year = strtoupper($_GET['year']);
$diverter = strtoupper($_GET['diverter']);
$owner = strtoupper($_GET['owner']);
$t= $_GET['t'];
/*
$type = $validate->validate_type_wells($type,$searchstring);


$join = $type[0];
$conds = $type[1];
$t_name = $type[2];
$year = $_GET['year'] == 'all' ? '' : "AND  ann_data.wyear ='".$_GET['year']."'";
$method = $validate->validate_method_wells($_GET['method']);
$method = isset($method) ? "AND ann_data.method ='".$method."'" : '';
$paid = isset($_GET['paid']) ? "AND ann_data.paid ='".strtoupper($_GET['paid'])."'" : '';
$county = isset($_GET['county_cd']) ? "AND station.county_cd ='".$_GET['county_cd']."'" : '';

*/
	$query = "select 
				*
				from account
			
				where
				account.mpid = '".$mpid."' AND
				/* account.diverter_id = '".$diverter."' AND
				account.owner_id = '".$owner."' AND*/
				account.wyear = '".$year."' 
				order by account.mpid asc
				";



		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		$data = array();
		
		if ($_GET['debug'] == '1') print $query;
		
		$data = array();
		while ($rows = oci_fetch_array($stid, OCI_BOTH)){
				
				$hasData = $validate->ann_data_wells($rows['MPID']);
			
				$state_nm = $validate->validate_statecd($rows['STATE_CD']);
				
					$data[] = array(
									
										'date_paid' =>$rows['DATE_PAID'],
										'check_no' =>$rows['CHECK_NO'],
										'pay_type' =>$rows['PAY_TYPE'],
									
									
										);
		
		}
		echo json_encode($data);
?>