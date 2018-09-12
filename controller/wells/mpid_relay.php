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
	$isAbandonedConds = "AND station.action_cd IN ('AB','IA')";
}elseif ($isAbandoned =="no"){
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
				county.county_nm,
				 station_relay.new_diverter_id,
                station_relay.new_owner_id,
				ann_data.wyear,
				ann_data.mpid as ann_datampid,
					ann_data.use_cd  ,
					ann_data.paid
					from station 
					/*inner join ann_data on station.mpid = ann_data.mpid*/
					inner join county on station.county_cd = county.county_cd
					
					left join ann_data on station.mpid = ann_data.mpid
				".$join."
				left join station_relay on  station_relay.mpid = station.mpid 
				where ".$conds."
				
			
				".$method."
				".$county."
				".$paid."
				".$filterme."
				".$isAbandonedConds."
				and station.mpid not in (select mpid from station_relay where wyear= '".$_GET['y']."')
				
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
				county.county_nm,
				station_relay.new_diverter_id,
                station_relay.new_owner_id,
				ann_data.wyear,
				ann_data.mpid as ann_datampid,
					ann_data.use_cd  ,
					ann_data.paid
					from station 
					/*inner join ann_data on station.mpid = ann_data.mpid*/
					inner join county on station.county_cd = county.county_cd
					inner join diverter on station.diverter_id = diverter.diverter_id
					inner join owner on station.owner_id = owner.owner_id
					left join ann_data on station.mpid = ann_data.mpid
				left join station_relay on  station_relay.mpid = station.mpid 
			
				where station.diverter_id = '".$_GET['q']."'
				AND station.owner_".$z." = '".$_GET['z']."'
				
				".$isAbandonedConds."
				".$filterme."	
				
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
				
				and station.mpid not in (select mpid from station_relay where wyear= '".$_GET['y']."')
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
				county.county_nm,
				     station_relay.new_diverter_id,
                station_relay.new_owner_id,
				ann_data.wyear,
					(select mpid from ann_data where wyear ='".$_GET['y']."' and diverter_id ='".$_GET['q']."') as ann_datampid,
					ann_data.use_cd  ,
					ann_data.paid
					from station 
					/*inner join ann_data on station.mpid = ann_data.mpid*/
					inner join county on station.county_cd = county.county_cd
					inner join diverter on station.diverter_id = diverter.diverter_id
					inner join owner on station.owner_id = owner.owner_id
					left join ann_data on station.mpid = ann_data.mpid
				left join station_relay on  station_relay.mpid = station.mpid 
			
				where station.owner_id = '".$_GET['q']."' 
				AND station.diverter_".$z." = '".$_GET['z']."'
				
				".$isAbandonedConds."
				".$filterme."
				
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
				
				and station.mpid not in (select mpid from station_relay where wyear= '".$_GET['y']."')
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
				county.county_nm,
				     station_relay.new_diverter_id,
                station_relay.new_owner_id,
				(select mpid from ann_data where wyear ='".$_GET['y']."' and diverter_id ='".$_GET['q']."') as ann_datampid, as ann_datampid,
                ann_data.use_cd  ,
                ann_data.paid
				ann_data.wyear,
				from station 
				/*inner join ann_data on station.mpid = ann_data.mpid*/
				inner join county on station.county_cd = county.county_cd
				inner join owner on station.owner_id = owner.owner_id 
				inner join diverter on station.diverter_id = diverter.diverter_id 
				inner join facility on station.facility_id = facility.facility_id
				left join ann_data on station.mpid = ann_data.mpid
				left join station_relay on station.mpid = station_relay.mpid
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
	$query = "select station.mpid,
					diverter.diverter_nm as NAME,
					diverter.diverter_id  as DID,
					owner.owner_nm as NAME2,
					owner.owner_id as OID,
					/*ann_data.use_cd, */
					station.source_cd,
					/*ann_data.paid,*/
					Station.Local_Desc,
					Station.Action_Cd,
					station.county_cd,
					county.county_nm
					ann_data.wyear,
					(select mpid from ann_data where wyear ='".$_GET['y']."' and diverter_id ='".$_GET['q']."') as ann_datampid,
					ann_data.use_cd  ,
					ann_data.paid
					from station 
					/*inner join ann_data on station.mpid = ann_data.mpid*/
					inner join county on station.county_cd = county.county_cd
					inner join diverter on station.diverter_id = diverter.diverter_id
					inner join owner on station.owner_id = owner.owner_id
					left join ann_data on station.mpid = ann_data.mpid
					".$join."
					where mpid = '".$searchstring."' 
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
	
	
	if ($_GET['debug'] == '1') print $query;
	
		$data = array();
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				#$hasData = $validate->ann_data_wells($row['MPID']);
				#$q = "select mpid from exdata where mpid = '".$row['MPID']."'";
				
				$hasPayment = $row['PAID'];
		
				$use_cd =$row['USE_CD'];
		
				
				
							
		
				#$hasPayment = $hasPayment == null ? $hasPayment ='No' : $hasPayment = 'Y';
				$use_cd = $use_cd == null ? $use_cd ='N/A' : $use_cd;
			
			
				
				#if ($_GET['debug'] == '1') {print $query." ====================---'";  print $hasPayment.' ennd';}
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
				
				$hasData = ($row['ANN_DATAMPID'] != null && $row['WYEAR'] != null)? $hasData = 'Yes' : $hasData =  'No';
				
			
				if ($_GET['t'] !='Facility'){
					
					$data[] = array("mpid" =>$row['MPID'],
										"name" =>$row['NAME'],
										"name2" =>$row['NAME2'],
										"owner_id" =>$row['OID'],
										"diverter_id" =>$row['DID'],
										"source_cd" => $row['SOURCE_CD'],
										"use_cd" =>$use_cd,
										"paid" => $hasPayment,
										"data" => $hasData,
										"local_desc" => $row['LOCAL_DESC'],
										"action" => $row['ACTION_CD'],
										"county_cd" => $row['COUNTY_CD'],
										"county_nm" => $row['COUNTY_NM'],
										"year" => $_GET['y'],
										"moved" => '0'
										);			
				}else{
					
					$data [] = array("mpid" =>$row['MPID'],
										"facility_id" =>$row['FACILITY_ID'],
										"facility_nm" =>$row['FACILITY_NM'],
										"owner_id" =>$row['OWNER_ID'],
										"owner_nm" =>$row['OWNER_NM'],
										"diverter_id" =>$row['DIVERTER_ID'],
										"diverter_nm" =>$row['DIVERTER_NM'],
										"source_cd" => $row['SOURCE_CD'],
										"use_cd" =>$row['USE_CD'],
										"paid" => $hasPayment,
										"data" => $hasData,
										"local_desc" => $row['LOCAL_DESC'],
										"action" => $row['ACTION_CD'],
										"county_cd" => $row['COUNTY_CD'],
										"county_nm" => $row['COUNTY_NM'],
										"year" => $row['WYEAR'],
										"moved" => '0'
										);	
										
					
				}
				
		
		}
		
		
	$k = 0;
	
	
	/*
	$checkRelay  = "SELECT * FROM STATION_RELAY
										WHERE 
											".$relayQuery2."
											AND WYEAR = '".$_GET['y']."'
										";
										
	$parserP = oci_parse($conn, $checkRelay);
	$errP = oci_execute($parserP);	
	
	
	
	
	$data2 = array();
	
	while ($rowx = oci_fetch_array($parserP,OCI_BOTH)){
		
				
				                        
				
				
				#print_r($rowx);
			
		
		
	
	}
	*/
	

	
	if ($_GET['t'] == 'Diverter'){
	
		$relayQuery2 = "NEW_DIVERTER_ID = '".$_GET['q']."' /*OR OLD_DIVERTER_ID = '".$_GET['q']."'*/";
		$getDID = "NEW_DIVERTER_ID as DID";
		$getOID = "NEW_OWNER_ID as OID";
	}elseif ($_GET['t'] == 'Owner'){
		$relayQuery2 = "NEW_OWNER_ID = '".$_GET['q']."' /*OR OLD_OWNER_ID = '".$_GET['q']."'*/";
		$getDID = "NEW_DIVERTER_ID as DID";
		$getOID = "NEW_OWNER_ID as OID";
	}
	$validateRelay = new validate();
	

	/** GET RELAY STATION **/ 
	
	
	$addRelayStation = "SELECT 
				
				station.mpid,
				".$t_name." as NAME,
				".$t_nameOpposite." as NAME2,
				owner.owner_id as OID,
				diverter.diverter_id as DID,
				station_relay.new_diverter_nm,
				station_relay.new_owner_nm,
				/*ann_data.use_cd, */
				station.source_cd,
				/*ann_data.paid,*/
				Station.Local_Desc,
				Station.Action_Cd,
				station.county_cd,
				county.county_nm,
				station_relay.old_diverter_id,
				station_relay.old_owner_id,
				station_relay.new_diverter_id,
				station_relay.new_owner_id,
				station_relay.move_type,
				
				ann_data.mpid as ann_datampid,
					ann_data.use_cd as ann_datausecd,
					ann_data.paid
					from station
					left join ann_data on station.mpid = ann_data.mpid
				inner join county on station.county_cd = county.county_cd
				inner join station_relay on station.mpid = station_relay.mpid
				".$join."
				
				where  ".$relayQuery2."
							
				
			
				".$method."
				".$county."
				".$paid."
				".$filterme."
				".$isAbandonedConds."
				
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
				AND   station_relay.wyear  IN ('".$_GET['y']."')
				AND ".$t_name." not like '%ABANDON%'
				AND ".$t_name." not like '%REMOVE%'
				AND ".$t_name." not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				AND station.action_cd is not null
				order by station.mpid asc
								
									";
					
				if ($_GET['debug'] == '1') print '\n <br><br>'.$addRelayStation;
				$parser = oci_parse($conn, $addRelayStation);
				$err = oci_execute($parser);
			
				$type_raw2 = strtoupper($type_raw);
				while ($row2 = oci_fetch_array($parser, OCI_BOTH)){
					
				
					
					
							$hasPayment = $row['PAID'];
					
							$use_cd =$row['USE_CD'];
					
						
						#$hasPayment = $hasPayment == null ? $hasPayment ='No' : $hasPayment = 'Y';
						$use_cd = $use_cd == null ? $use_cd ='N/A' : $use_cd;
					
				
						
						
						
						#if ($_GET['debug'] == '1') {print $addRelayStation;print $fetch_num_rows.' ====================---';  print $hasPayment.' ennd';}
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
						
						$hasData = $row2['ANN_DATAMPID'] != null ? $hasData = 'Yes' : $hasData =  'No';
						
						
							#use the original diverter name
							if ($_GET['t'] == 'Diverter'){
								if (is_null($row2['NEW_OWNER_NM'])){
									$name = $row2['NAME'];
									$name2 = $row2['NEW_DIVERTER_NM'];
								}elseif (is_null($row2['NEW_OWNER_NM']) && is_null($row2['NEW_DIVERTER_NM'])){
									$name = $row2['NAME'];
									$name2 = $row2['NAME2'];
								}else{
									$name = $row2['NEW_OWNER_NM'];
									$name2 = $row2['NEW_DIVERTER_NM'];
								}
							}else{
								if (is_null($row2['NEW_DIVERTER_NM'])){
									$name = $row2['NAME'];
									$name2 = $row2['NEW_OWNER_NM'];
								}elseif (is_null($row2['NEW_OWNER_NM']) && is_null($row2['NEW_DIVERTER_NM'])){
									$name = $row2['NAME'];
									$name2 = $row2['NAME2'];
								}else{
									$name = $row2['NEW_OWNER_NM'];
									$name2 = $row2['NEW_DIVERTER_NM'];
								}
							}
						
							
									
							
						
						// if (!is_null($row2['NEW_OWNER_NM'])){
							// #use the originaldiverter name
							// if ($_GET['t'] == 'Owner'){
								// $name = $row2['NEW_DIVERTER_NM'];
							// }else{
								// $name2=$row2['NEW_OWNER_NM'];
							// }
							
						// }else{
							// #use the  faux  diverter name
							// if ($_GET['t'] == 'Owner'){
								// $name = $row2['NAME2'];
							// }else{
								// $name2=$row2['NAME'];
							// }
						
						// }
						
						
						if (!is_null($row2['NEW_DIVERTER_ID'])){
							#use the faux diverter id
							$did = $row2['NEW_DIVERTER_ID'];
							$origdid = $row2['DID'];
						}else{
							#use the original diverter id
							$did = $row2['DID'];
							$origdid = '';
						}
						
						
						if (!is_null($row2['NEW_OWNER_ID'])){
							#use the faux diverter name
							$oid=$row2['NEW_OWNER_ID'];
							$origoid = $row2['OID'];
						}else{
							#use the original owner id
							$oid=$row2['OID'];
							$origoid = '';
						}
						
						$movetype = $row2['MOVE_TYPE'];
						if ($movetype == 'COMPLETE_STATION'){
							
							if ($_GET['t'] =='Diverter'){
								if ($row2['NEW_DIVERTER_ID'] != $_GET['q']){
								
								}else{
									$data2[] = array("mpid" =>$row2['MPID'],
															"name" =>$name,
															"name2" =>$name2,
															"owner_id" =>$oid,
															"diverter_id" =>$did,
															"source_cd" => $row2['SOURCE_CD'],
															"use_cd" =>$use_cd,
															"paid" => $hasPayment,
															"data" => $hasData,
															"local_desc" => $row2['LOCAL_DESC'],
															"action" => $row2['ACTION_CD'],
															"county_cd" => $row2['COUNTY_CD'],
															"county_nm" => $row2['COUNTY_NM'],
															"year" => $_GET['y'],
															"moved" => '1',
															"orig_oid" =>$origoid,
															"orig_did" =>$origdid,
															
															);
									
									
								}
							}else if ($_GET['t'] == 'Owner'){
								if ($row2['NEW_OWNER_ID'] != $_GET['q']){
								
								}else{
									$data2[] = array("mpid" =>$row2['MPID'],
															"name" =>$name,
															"name2" =>$name2,
															"owner_id" =>$oid,
															"diverter_id" =>$did,
															"source_cd" => $row2['SOURCE_CD'],
															"use_cd" =>$use_cd,
															"paid" => $hasPayment,
															"data" => $hasData,
															"local_desc" => $row2['LOCAL_DESC'],
															"action" => $row2['ACTION_CD'],
															"county_cd" => $row2['COUNTY_CD'],
															"county_nm" => $row2['COUNTY_NM'],
															"year" => $_GET['y'],
															"moved" => '1',
															"orig_oid" =>$origoid,
															"orig_did" =>$origdid,
															
															);
									
									
								}
							}
							
							
							
						}else{
							$data2[] = array("mpid" =>$row2['MPID'],
														"name" =>$name,
														"name2" =>$name2,
														"owner_id" =>$oid,
														"diverter_id" =>$did,
														"source_cd" => $row2['SOURCE_CD'],
														"use_cd" =>$use_cd,
														"paid" => $hasPayment,
														"data" => $hasData,
														"local_desc" => $row2['LOCAL_DESC'],
														"action" => $row2['ACTION_CD'],
														"county_cd" => $row2['COUNTY_CD'],
														"county_nm" => $row2['COUNTY_NM'],
														"year" => $_GET['y'],
														"moved" => '1',
														"orig_oid" =>$origoid,
														"orig_did" =>$origdid,
														
														);
						
						}
				
				
				}
				
				#print_r ($data2);
	if (!empty($data2)){
		$combinedData = array_merge ($data,$data2);
		echo json_encode($combinedData);
	}else{
		echo json_encode($data);
	}
	
		




?>