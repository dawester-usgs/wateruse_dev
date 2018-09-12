<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 
$validate = new validate();

$type = strtolower($_GET['t']);
$type_raw = strtolower($_GET['t']);
$searchstring = strtoupper($_GET['q']);
$filterbycounty = $_GET['f'];
$isAbandoned = $_GET['a'];



if ($isAbandoned == 'ab'){
	$isAbandonedConds = "AND station.action_cd NOT IN ('AB','IA')";
}

$filterme = $filterbycounty == 'undefined'  || $filterbycounty == null  || $filterbycounty == 'nf' ?  ""  : "AND station.county_cd = '".$filterbycounty."'";


$type = $validate->validate_type_wells($type,$searchstring);

#print_r($type);

$join = $type[0];
$conds = $type[1];
$t_name = $type[2];
$t_nameOpposite = $type[3];

$typeo = $_GET['t'] == 'Diverter' ? ($typeo = "owner") : $typeo = "diverter";
$t1 = $_GET['t'] == 'Diverter' ? ($t1 = "O") : $t1 = "D";

$t2 = $_GET['t'] == 'Diverter' ? $t = 'D' : $t = 'O';
#$year = $_GET['year'] == 'all' ? '' : "AND  ann_data.wyear ='".$_GET['year']."'";
$method = $validate->validate_method_wells($_GET['method']);
$method = isset($method) ? "AND ann_data.method ='".$method."'" : '';
$paid = isset($_GET['paid']) ? "AND ann_data.paid ='".strtoupper($_GET['paid'])."'" : '';
$county = isset($_GET['county_cd']) ? "AND station.county_cd ='".$_GET['county_cd']."'" : '';

#print_r($type);

if (is_numeric($_GET['z'])){
	$z = "id";
}else{
	$z = "nm";
}

print $search_string;
if ($_GET['t']  == 'Diverter'  || $_GET['t'] == 'Owner'){
	$query = "select 
				station.mpid, 
				".$t_name." as NAME,
				".$t_nameOpposite." as NAME2,
				".$typeo.".".$typeo."_id as  ".$t1."ID,
				".$_GET['t'] .".".$_GET['t'] ."_id as ".$t2."ID,
				/*ann_data.use_cd, */
				station.source_cd,
				/*ann_data.paid,*/
				Station.Local_Desc,
				Station.Action_Cd,
				station.county_cd,
				county.county_nm
				/*ann_data.wyear*/
				from station 
				/*inner join ann_data on station.mpid = ann_data.mpid*/
				inner join county on station.county_cd = county.county_cd
				".$join."
				
				where ".$conds."
				
			
				".$method."
				".$county."
				".$paid."
				".$filterme."
				".$isAbandonedConds."
			
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND ".$t_name." not like '%ABANDON%'
				AND ".$t_name." not like '%REMOVE%'
				AND ".$t_name." not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				AND station.action_cd is not null
				order by station.mpid asc
				";

}elseif ($_GET['t']  == 'Diverter2'){
	
	$query = "SELECT station.mpid, 
				diverter.diverter_nm as NAME,
				owner.owner_nm as NAME2,
				diverter.diverter_id as DID,
				owner.owner_id as OID,
				/*ann_data.use_cd, */
				station.source_cd,
				/*ann_data.paid,*/
				Station.Local_Desc,
				Station.Action_Cd,
				station.county_cd,
				county.county_nm
				/*ann_data.wyear*/
				from station 
				/*inner join ann_data on station.mpid = ann_data.mpid*/
				inner join county on station.county_cd = county.county_cd
				inner join owner on station.owner_id = owner.owner_id
				inner join diverter on station.diverter_id = diverter.diverter_id
				
			
				where station.diverter_id = '".$_GET['q']."'
				AND station.owner_".$z." = '".$_GET['z']."'
				
				AND station.action_cd NOT IN ('AB','IA')
			
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				AND station.action_cd is not null
			
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND  diverter.diverter_nm not like '%ABANDON%'
				
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				AND station.action_cd is not null
				order by station.mpid asc
				 ";
	
}elseif ($_GET['t'] == 'Owner2'){
	$query = "SELECT station.mpid, 
				diverter.diverter_nm as NAME2,
				owner.owner_nm as NAME,
				diverter.diverter_id as DID,
				owner.owner_id as OID,
				/*ann_data.use_cd, */
				station.source_cd,
				/*ann_data.paid,*/
				Station.Local_Desc,
				Station.Action_Cd,
				station.county_cd,
				county.county_nm
				/*ann_data.wyear*/
				from station 
				/*inner join ann_data on station.mpid = ann_data.mpid*/
				inner join county on station.county_cd = county.county_cd
				inner join owner on station.owner_id = owner.owner_id
				inner join diverter on station.diverter_id = diverter.diverter_id
				
			
				where station.owner_id = '".$_GET['q']."' 
				AND station.diverter_".$z." = '".$_GET['z']."'
				
				AND station.action_cd NOT IN ('AB','IA')
			
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				AND station.action_cd is not null
			
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND  diverter.diverter_nm not like '%ABANDON%'
				
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				AND station.action_cd is not null
				order by station.mpid asc
				 ";
}
elseif ($_GET['t'] == 'Facility'){
	$query = "select 
				station.mpid, 
				station.facility_id,
				facility.facility_nm,
				facility.use_cd,
				station.diverter_id,
				diverter.diverter_nm,
				station.owner_id,
				owner.owner_nm,
				/*ann_data.use_cd, */
				station.source_cd,
				/*ann_data.paid,*/
				Station.Local_Desc,
				Station.Action_Cd,
				station.county_cd,
				county.county_nm
				/*ann_data.wyear*/
				from station 
				/*inner join ann_data on station.mpid = ann_data.mpid*/
				inner join county on station.county_cd = county.county_cd
				inner join owner on station.owner_id = owner.owner_id 
				inner join diverter on station.diverter_id = diverter.diverter_id 
				inner join facility on station.facility_id = facility.facility_id
				
				where ".$conds."
			
				".$method."
				".$county."
				".$paid."
				".$filterme."
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND ".$t_name." not like '%ABANDON%'
				AND ".$t_name." not like '%REMOVE%'
				AND ".$t_name." not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				AND station.action_cd is not null
				order by station.mpid asc
				";
}
else{
	
	
		
	$checkRelay  = "SELECT * FROM STATION_RELAY
										WHERE 
											
											MPID = '".$_GET['q']."'
											AND WYEAR = '".$_GET['y']."'
											";
										
	$parserP = oci_parse($conn, $checkRelay);
	$errP = oci_execute($parserP);	
	
	
	$rowRelay = oci_fetch_array($parserP,OCI_BOTH);
	
	#print_r ($rowRelay);

		
	if ($rowRelay['NEW_DIVERTER_ID']){
		$join ="inner join station_relay on station.mpid = station_relay.mpid
				inner join diverter on station_relay.new_diverter_id = diverter.diverter_id
				inner join owner on station.owner_id = owner.owner_id";
	}else if ($rowRelay['NEW_OWNER_ID']){
		$join ="inner join station_relay on station.mpid = station_relay.mpid
				inner join diverter on station.diverter_id= diverter.diverter_id
				inner join owner on station_relay.new_owner_id = owner.owner_id";
	}else if (($rowRelay['NEW_DIVERTER_ID']) && ($rowRelay['NEW_OWNER_ID'])){
		$join ="inner join station_relay on station.mpid = station_relay.mpid
				inner join diverter on station_relay.new_diverter_id = diverter.diverter_id
				inner join owner on station_relay.new_owner_id = owner.owner_id
				";
	}else{
		$join ="inner join diverter on station.diverter_id = diverter.diverter_id
				inner join owner on station.owner_id = owner.owner_id
				";
	}
	
	$query = "select station.mpid,
					diverter.diverter_nm,
					diverter.diverter_id ,
					owner.owner_nm ,
					owner.owner_id ,
					/*ann_data.use_cd, */
					station.source_cd,
					/*ann_data.paid,*/
					Station.Local_Desc,
					Station.Action_Cd,
					station.county_cd,
					county.county_nm,
					state.state_ab 
					/*ann_data.wyear*/
					from station
					/*inner join ann_data on station.mpid = ann_data.mpid*/
					inner join county on station.county_cd = county.county_cd
					inner join owner on station.owner_id = owner.owner_id
					inner join state on station.state_cd = state.state_cd
					
					".$join."
					where station.mpid = '".$searchstring."' 
					".$method."
					".$county."
					".$paid."
					".$filterme."
				/*	AND station.local_desc not like '%ABANDON%'
					AND station.local_desc not like '%DELETE%'
		*/
					AND owner.owner_nm not like '%ABANDON%'
					AND  owner.owner_nm not like '%REMOVE%'
					AND owner.owner_nm  not like '%DELETE%'
					
					
					AND diverter.diverter_nm not like '%ABANDON%'
					AND  diverter.diverter_nm not like '%REMOVE%'
					AND diverter.diverter_nm  not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
					AND station.action_cd is not null
					order by station.mpid asc
					
					";
					
}

			
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();
	
	
	
	#print $query;
	
	$k = 0;
	if ($_GET['debug'] == '1') print $query;
	
		$data = array();
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				#$hasData = $validate->ann_data_wells($row['MPID']);
				#$q = "select mpid from exdata where mpid = '".$row['MPID']."'";
				if ($_GET['t']  == 'Diverter'  || $_GET['t'] == 'Owner'){
						$query2 =  "SELECT * FROM ann_data 
											where mpid ='".$row['MPID']."' 
											AND ".$type_raw."_id ='".$_GET['q']."'
											AND wyear='".$_GET['y']."'";
				
				}else if ($_GET['t'] == 'Facility'){
						$arr = $validate->validate_facilityTable($row['USE_CD']);
						$join = $arr[0];
						$table = $arr[1];
						$query2 =  "SELECT * FROM ann_data
										".$join." 
										AND ann_data.mpid = '".$row['MPID']."'
										AND ann_data.use_cd in ('".$row['USE_CD']."') 
										AND ".$table.".facility_id = '".$_GET['q']."'
										AND  ann_data.wyear  = '".$_GET['y']."'
										";
					
				}else{
						$query2 =  "SELECT * FROM ann_data 
											where mpid ='".$row['MPID']."' 
									
											AND wyear='".$_GET['y']."'";
				}
				$stid2 = oci_parse($conn, $query2);
				$err2 = oci_execute($stid2);		

				
			while ($rowr = oci_fetch_array($stid2,OCI_BOTH)){
				$hasPayment = $rowr['PAID'];
		
				$use_cd =$rowr['USE_CD'];
		
				
				
							
		
			}
				
				#$hasPayment = $hasPayment == null ? $hasPayment ='No' : $hasPayment = 'Y';
				$use_cd = $use_cd == null ? $use_cd ='N/A' : $use_cd;
			
			
				$parser_nr = oci_parse($conn,$query2);
				$err2 = oci_execute($parser_nr);
				oci_fetch_all($parser_nr,$r);
				$fetch_num_rows = OCI_NUM_ROWS($parser_nr);
				
				
				
				if ($_GET['debug'] == '1') {print $query2;print $fetch_num_rows.' ====================---';  print $hasPayment.' ennd';}
				/*
				if ($fetch_num_rows == 1){
					if ($hasPayment == null){
						$hasPayment = 'No';
					}
					
				}else{
					$hasPayment = 'No';
				}*/
				
			
				
				if ($hasPayment == 'Y' || $hasPayment == 'y') {
					$hasPayment = 'Yes';
				}elseif ($hasPayment == 'N' || $hasPayment == 'n'){
					$hasPayment = 'No';
				}else{
					$hasPayment = 'No'; 
				}
				
				$hasData = $fetch_num_rows > 0 ? $hasData = 'Yes' : $hasData =  'No';
				
				if ($_GET['t'] == 'Diverter'){
					$relayQuery2 = "NEW_DIVERTER_ID = '".$_GET['q']."'";
					$getDID = "NEW_DIVERTER_ID as DID";
					$getOID = "STATION.OWNER_ID as OID";
				}elseif ($_GET['t'] == 'Owner'){
					$relayQuery2 = "NEW_OWNER_ID = '".$_GET['q']."'";
					$getDID = "STATION.DIVERTER_ID as DID";
					$getOID = "NEW_OWNER_ID as OID";
				}
			
	
				if ($_GET['t'] !='Facility'){
				
					$data[] = array("mpid" =>$row['MPID'],
										"owner_nm" =>$row['OWNER_NM'],
										"diverter_nm" =>$row['DIVERTER_NM'],
										"owner_id" =>$row['OWNER_ID'],
										"diverter_id" =>$row['DIVERTER_ID'],
										"source_cd" => $row['SOURCE_CD'],
										"use_cd" =>$use_cd,
										"paid" => $hasPayment,
										"data" => $hasData,
										"local_desc" => $row['LOCAL_DESC'],
										"action" => $row['ACTION_CD'],
										"county_cd" => $row['COUNTY_CD'],
										"county_nm" => $row['COUNTY_NM'],
										"year" => $_GET['y'],
										"state_nm" => $row['STATE_AB']
										);			
				}
				
		
		}
		echo json_encode($data);




?>