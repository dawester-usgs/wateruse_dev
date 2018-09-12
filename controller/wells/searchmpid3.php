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

if ($type != 'mpid'){
	$searchID = "AND station.".$_GET['t']."_id = '".$_GET['id']."' ";
}else{
	$searchID="";
}

$query = "select 
				station.mpid, 
				owner.owner_nm,
				owner.owner_id,
				diverter.diverter_nm,
				diverter.diverter_id,
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
					
				where
				station.mpid = '".$searchstring."'  
				".$searchID."
				order by station.mpid asc
				";
		
		
		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		
		oci_fetch_all($stid,$r);
		$rows_returned = OCI_NUM_ROWS($stid);
		
		
		$data = array();
		#print $query;
		if ($_GET['debug'] == '1') print $query.'--------'.$rows_returned;
		
		if ($rows_returned == 0){
			
			if ($_GET['t'] == 'Diverter'){
				$relayQuery = "NEW_DIVERTER_ID = '".$_GET['id']."'";
				$getDID = "NEW_DIVERTER_ID as DIVERTER_ID";
				$getOID = "STATION.OWNER_ID";
				$joinDID = "inner join diverter on station_relay.new_diverter_id = diverter.diverter_id";
				$joinOID = "inner join owner on station.owner_id = owner.owner_id ";
			}elseif ($_GET['t'] == 'Owner'){
				$relayQuery = "NEW_OWNER_ID = '".$_GET['id']."'";
				$getOID = "STATION.OWNER_ID";
				$getDID = "NEW_OWNER_ID as OWNER_ID";
				$joinOID = "inner join owner on station_relay.new_owner_id = owner.owner_id";
				$joinDID = "inner join owner on station.owner_id = owner.owner_id ";
			}
		
			$query = "select 
				station.mpid, 
				owner.owner_nm,
				diverter.diverter_nm,
				".$getDID .",
				".$getOID .",
				station.source_cd,
				Station.Local_Desc,
				Station.Action_Cd,
				station.county_cd,
				station.state_cd,
				county.county_nm
				from station 
					inner join county on station.county_cd = county.county_cd
					inner join station_relay on station.mpid = station_relay.mpid
					inner join owner on station.owner_id = owner.owner_id 
					inner join diverter on station.diverter_id = diverter.diverter_id
					
					
				where
				station.mpid = '".$searchstring."' 
				AND ".$relayQuery."
				order by station.mpid asc";
		}else{
			$query ="select 
				station.mpid, 
				owner.owner_nm,
				owner.owner_id,
				diverter.diverter_nm,
				diverter.diverter_id,
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
					
				where
				station.mpid = '".$searchstring."'";
			
		}
		
		$parse = oci_parse($conn, $query);
		$err = oci_execute($parse);
		
		$data = array();
		while ($row = oci_fetch_array($parse, OCI_BOTH)){
				
				$hasData = $validate->ann_data_wells($row['MPID']);
			
				$state_nm = $validate->validate_statecd($row['STATE_CD']);
				
				$data[] = array("mpid" =>$row['MPID'],
										"use_cd" =>$row['USE_CD'],
										"owner_id" =>$row['OWNER_ID'],
										"owner_nm" =>$row['OWNER_NM'],
										"diverter_id" =>$row['DIVERTER_ID'],
										"diverter_nm" =>$row['DIVERTER_NM'],
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