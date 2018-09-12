<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 
$validate = new validate();

$type = strtolower($_GET['t']);
$searchstring = strtoupper($_GET['q']);
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
				station.mpid, 
				owner.owner_nm,
				owner.owner_id,
				diverter.diverter_nm,
				diverter.diverter_id,
				facility.facility_id,
				facility.facility_nm,
				
				station.source_cd,
			
				Station.Local_Desc,
				Station.Action_Cd,
				station.county_cd,
				station.state_cd,
				county.county_nm
				from station 

				inner join county on station.county_cd = county.county_cd
				inner join owner on station.owner_id = owner.owner_id 
				inner join diverter on station.diverter_id = diverter.diverter_id
				inner join facility on station.facility_id = facility.facility_id
				where
				station.mpid = '".$searchstring."'
				order by station.mpid asc
				";

		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		$data = array();
		#print $query;
		if ($_GET['debug'] == '1') print $query;
		
		$data = array();
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				$hasData = $validate->ann_data_wells($row['MPID']);
			
				$state_nm = $validate->validate_statecd($row['STATE_CD']);
				
				$data[] = array("mpid" =>$row['MPID'],
										"action_cd" =>$row['ACTION_CD'],
										"owner_id" =>$row['OWNER_ID'],
										"owner_nm" =>$row['OWNER_NM'],
										"diverter_id" =>$row['DIVERTER_ID'],
										"diverter_nm" =>$row['DIVERTER_NM'],
										"facility_id" =>$row['FACILITY_ID'],
										"facility_nm" =>$row['FACILITY_NM'],
										"local_desc" => $row['LOCAL_DESC'],
										"state_cd" => $row['STATE_CD'],
										"state_nm" => $state_nm,
										"county_cd" => $row['COUNTY_CD'],
										"county_nm" => $row['COUNTY_NM'],
										"wyear" => $row['WYEAR'],
										);
										
				
		
		}
		echo json_encode($data);
?>