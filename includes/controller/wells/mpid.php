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
	$queryAnnData = "";
}elseif ($isAbandoned =="no"){
	$isAbandonedConds = "AND station.action_cd NOT IN ('AB','IA')";
	
	$queryAnnData = "AND station.mpid not IN (SELECT MPID from ann_data where wyear = '".$_GET['y']."')";
}

$filterme = $filterbycounty == 'undefined'  || $filterbycounty == null  || $filterbycounty == 'nf' ?  ""  : "AND station.county_cd = '".$filterbycounty."'";



$type = $validate->validate_type_wells($type,$searchstring);

#print_r($type);

$join = $type[0];
$conds = $type[1];

$t_name = $type[2];
$t_nameOpposite = $type[3];
$condsAnnData = $type[4];

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





#print $search_string;



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
				".$queryAnnData."
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND ".$t_name." not like '%ABANDON%'
				AND ".$t_name." not like '%REMOVE%'
				AND ".$t_name." not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				 
				order by station.mpid asc
				";

}elseif ($_GET['t']  == 'Diverter2'){
	$checkifExistinAnndata= $validate->validate_ann_data($_GET['q'],$_GET['z']);
	if ($checkifExistinAnndata == 'Yes'){
		$queryAnnData = $queryAnnData;
	}else{
		$queryAnnData ="";
	}
	// print $checkifExistinAnndata;
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
				
			
				where


				station.diverter_id = '".$_GET['q']."'
				AND station.owner_".$z." = '".$_GET['z']."'
				
				".$isAbandonedConds."
				".$filterme."	
				".$queryAnnData." 
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				 
			
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND  diverter.diverter_nm not like '%ABANDON%'
				
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				 
				order by station.mpid asc
				 ";
	
}elseif ($_GET['t'] == 'Owner2'){
	
			
	# $type= $validate->validate_station_wells(DIVERTER_ID,OWNER_ID);
	$checkifExistinAnndata= $validate->validate_ann_data($_GET['z'],$_GET['q']);
	if ($checkifExistinAnndata == 'Yes'){
		$queryAnnData = $queryAnnData;
	}else{
		$queryAnnData ="";
	}
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
				
				".$isAbandonedConds."
				".$filterme."
				".$queryAnnData."
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
				
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				 
			
				
				/*AND station.local_desc not like '%ABANDON%'
				AND station.local_desc not like '%DELETE%'*/
	
				AND  diverter.diverter_nm not like '%ABANDON%'
				
				AND owner.owner_nm not like '%ABANDON%'
				AND owner.owner_nm not like '%REMOVE%'
				AND owner.owner_nm not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				 
				order by station.mpid asc
				 ";
}
elseif ($_GET['t'] == 'Facility'){
	$query = "select 
				station.mpid, 
				station.facility_id,
				facility.facility_nm,
				
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
				".$queryAnnData." 
				AND ".$t_name." not like '%ABANDON%'
				AND ".$t_name." not like '%REMOVE%'
				AND ".$t_name." not like '%DELETE%'
					/*
					AND station.action_cd <> 'AB'
					AND station.action_cd <> '--'*/
				 
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
					/*ann_data.wyear*/
					from station 
					/*inner join ann_data on station.mpid = ann_data.mpid*/
					inner join county on station.county_cd = county.county_cd
					inner join diverter on station.diverter_id = diverter.diverter_id
					inner join owner on station.owner_id = owner.owner_id
					".$join."
					where station.mpid = '".$searchstring."' 
					".$method."
					".$county."
					".$paid."
					".$filterme."
					
					".$queryAnnData." 
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
					 
					order by station.mpid asc
					
					";
}

			
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$datagetStationOnly = array();
	
	
	$datagetAnnDataOnly = array();
	#print $query;
	
	$k = 0;
	if ($_GET['debug'] == '1') print $query;
	
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				
				
				$hasData ='No';
				$use_cd = 'N/A';
				$hasPayment ='No';
				
			
				if ($_GET['t'] !='Facility'){
					$type = "";
					$typeOpposite ="";
			
					if ($_GET['t'] == 'Diverter' || $_GET['t'] =='Owner2'){
							$type ="owner_nm";
							$typeOpposite ="diverter_nm";
						}elseif ($_GET['t'] == 'Owner' ||$_GET['t'] =='Diverter2'){
							$typeOpposite ="owner_nm";
							$type ="diverter_nm";
						}else{
							$type="diverter_nm";
							$typeOpposite="owner_nm";
						}
					$datagetStationOnly[] = array("mpid" =>$row['MPID'],
										$type =>$row['NAME'],
										$typeOpposite =>$row['NAME2'],
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
										"year" => $_GET['y']
										);			
				}else{
					$datagetStationOnly [] = array("mpid" =>$row['MPID'],
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
										"year" => $row['WYEAR']
										);	
				}
				
		
		}
		##################################################################################################
		###################################### GET ANN_DATA MPID #########################################
		##################################################################################################
		if ($_GET['t']  == 'Diverter'  || $_GET['t'] == 'Owner'){
				$query = "select 
							ann_data.mpid, 
							".$t_name." as NAME,
							".$t_nameOpposite." as NAME2,
							".$typeo.".".$typeo."_id as  ".$t1."ID,
							".$_GET['t'] .".".$_GET['t'] ."_id as ".$t2."ID,
							ann_data.use_cd, 
							ann_data.paid,
							ann_data.wyear
							from ann_data 

							
							inner join diverter on ann_data.diverter_id = diverter.diverter_id
							inner join owner on ann_data.owner_id = owner.owner_id	
						
							where ".$condsAnnData."
							".$method."
							".$county."
							".$paid."
							".$filterme."
						
							AND ann_data.wyear = '".$_GET['y']."'
							
				
							AND ".$t_name." not like '%ABANDON%'
							AND ".$t_name." not like '%REMOVE%'
							AND ".$t_name." not like '%DELETE%'
								
							order by ann_data.mpid asc
							";

			}elseif ($_GET['t']  == 'Diverter2'){
				
				$query = "SELECT 
							ann_data.mpid, 
							diverter.diverter_nm as NAME,
							owner.owner_nm as NAME2,
							diverter.diverter_id as DID,
							owner.owner_id as OID,
							ann_data.use_cd, 
							ann_data.paid,
							ann_data.wyear
							from ann_data 
							
							inner join diverter on ann_data.diverter_id = diverter.diverter_id
							inner join owner on ann_data.owner_id = owner.owner_id	
							
						
							where ann_data.diverter_id = '".$_GET['q']."'
							AND ann_data.owner_".$z." = '".$_GET['z']."'
							
							".$method."
							".$county."
							".$paid."
							".$filterme."
						
							
							AND ann_data.wyear = '".$_GET['y']."'
							
							AND owner.owner_nm not like '%ABANDON%'
							AND owner.owner_nm not like '%REMOVE%'
							AND owner.owner_nm not like '%DELETE%'
						
				
							order by ann_data.mpid asc
							 ";
				
			}elseif ($_GET['t'] == 'Owner2'){
				$query = "SELECT ann_data.mpid, 
							diverter.diverter_nm as NAME2,
							owner.owner_nm as NAME,
							diverter.diverter_id as DID,
							owner.owner_id as OID,
							ann_data.use_cd,
							ann_data.paid,
							ann_data.wyear
							from ann_data 
							
							inner join diverter on ann_data.diverter_id = diverter.diverter_id
							inner join owner on ann_data.owner_id = owner.owner_id	
							
							
						
							where ann_data.owner_id = '".$_GET['q']."' 
							AND ann_data.diverter_".$z." = '".$_GET['z']."'
							
						
							".$method."
							".$county."
							".$paid."
							".$filterme."
						
				
							AND owner.owner_nm not like '%ABANDON%'
							AND owner.owner_nm not like '%REMOVE%'
							AND owner.owner_nm not like '%DELETE%'
								
							AND ann_data.wyear = '".$_GET['y']."'

							order by ann_data.mpid asc
							 ";
			}
			 elseif ($_GET['t'] == 'Facility'){
				 $query = "select 
							ann_data.mpid, 
							diverter.diverter_nm,
							owner.owner_nm,
							diverter.diverter_id,
							owner.owner_id,
							ann_data.use_cd, 
							ann_data.paid,
							ann_data.wyear
		
							from ann_data 
							
							inner join diverter on ann_data.diverter_id = diverter.diverter_id
							inner join owner on ann_data.owner_id = owner.owner_id 
							inner join facility on ann_data.diverter_id = facility.diverter_id
							
							where ".$condsAnnData."
						
							".$method."
							".$county."
							".$paid."
							".$filterme."
							
							AND ann_data.wyear = '".$_GET['y']."'
							AND ".$t_name." not like '%ABANDON%'
							AND ".$t_name." not like '%REMOVE%'
							AND ".$t_name." not like '%DELETE%'
							
							order by ann_data.mpid asc
							";
			}
			else{
				$query = "select station.mpid,
								diverter.diverter_nm as NAME,
								diverter.diverter_id  as DID,
								owner.owner_nm as NAME2,
								owner.owner_id as OID,
								ann_data.use_cd,
								station.source_cd,
								ann_data.paid,
								Station.Local_Desc,
								Station.Action_Cd,
								station.county_cd,
								county.county_nm,
								ann_data.wyear
								from station 
								inner join ann_data on station.mpid = ann_data.mpid
								inner join county on station.county_cd = county.county_cd
								inner join diverter on station.diverter_id = diverter.diverter_id
								inner join owner on station.owner_id = owner.owner_id
								".$join."
								where station.mpid = '".$searchstring."' 
								".$method."
								".$county."
								".$paid."
								/* ".$filterme."*/
								AND ann_data.wyear = '".$_GET['y']."'
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
								 
								order by station.mpid asc
								
								";
			}

						
				$stid = oci_parse($conn, $query);
				$err = oci_execute($stid);
				
			if ($_GET['debug'] == '1') print $query;
			while ($row = oci_fetch_array($stid, OCI_BOTH)){
				
				
				
				$hasData ='No';
				$use_cd = 'N/A';
				$hasPayment ='No';
				
				$searchStation = "SELECT 
									source_cd,
									local_desc,
									county.county_cd,
									county.county_nm,
									action_cd
								FROM 
									Station
                                    inner join county on station.county_cd = county.county_cd
									WHERE 
										MPID = '".$row['MPID']."'
										
									";
						
								
					$parse = oci_parse($conn, $searchStation);
					$err2 = oci_execute($parse);
					
					while ($row2 = oci_fetch_array($parse, OCI_BOTH)){
						$county_cd = $row2['COUNTY_CD'];
						$county_nm = $row2['COUNTY_NM'];
						$local_desc = $row2['LOCAL_DESC'];
						$source_cd = $row2['SOURCE_CD'];
						$action_cd = $row2['ACTION_CD'];
						
						#print $searchStation;
					}
					
					
					if ($_GET['t'] !='Facility'){
						$type = "";
						$typeOpposite ="";
						if ($_GET['t'] == 'Diverter' || $_GET['t'] =='Owner2'){
							$type ="owner_nm";
							$typeOpposite ="diverter_nm";
						}elseif ($_GET['t'] == 'Owner' ||$_GET['t'] =='Diverter2'){
							$typeOpposite ="owner_nm";
							$type ="diverter_nm";
						}else{
							$type="diverter_nm";
							$typeOpposite="owner_nm";
						}
						$datagetAnnDataOnly[] = array("mpid" =>$row['MPID'],
											$type =>$row['NAME'],
											$typeOpposite =>$row['NAME2'],
											"owner_id" =>$row['OID'],
											"diverter_id" =>$row['DID'],
											"source_cd" => $source_cd,
											"use_cd" =>$row['USE_CD'],
											"paid" => $row['PAID'],
											"data" => "Yes",
											"local_desc" => $local_desc,
											"action" => $action_cd,
											"county_cd" => $county_cd,
											"county_nm" => $county_nm,
											"year" => $_GET['y']
											);			
					}else{
						
						#FACILITY AND MPID
						$datagetAnnDataOnly [] = array("mpid" =>$row['MPID'],
											"facility_id" =>$row['FACILITY_ID'],
											"facility_nm" =>$row['FACILITY_NM'],
											"owner_id" =>$row['OWNER_ID'],
											"owner_nm" =>$row['OWNER_NM'],
											"diverter_id" =>$row['DIVERTER_ID'],
											"diverter_nm" =>$row['DIVERTER_NM'],
											"source_cd" => $row['SOURCE_CD'],
											"use_cd" =>$row['USE_CD'],
											"paid" => $row['PAID'],
											"data" => "Yes",
											"local_desc" => $local_desc,
											"action" => $action_cd,
											"county_cd" => $county_cd,
											"county_nm" => $county_nm,
											"year" => $_GET['y']
											);	
					}
					
		
		}
		
		
		$data = array_merge ($datagetAnnDataOnly,$datagetStationOnly);
		
		echo json_encode($data);




?>