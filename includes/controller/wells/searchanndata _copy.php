<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 
$validate = new validate();


$mpid = strtoupper($_GET['mpid']);
$year = strtoupper($_GET['year']);
$diverter = strtoupper($_GET['diverter']);
$owner = strtoupper($_GET['owner']);
$facility = strtoupper($_GET['facility']);
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
$r = $_GET['type'];
	$facconds  ="";
	if ($r == 'fac'){
		$facconds = " AND station.facility_id = '".$facility."'";
	}

	$checkRelay  = "SELECT * FROM STATION_RELAY
										WHERE 
											MPID = '".$_GET['mpid']."'
											AND WYEAR = '".$_GET['year']."'
										";
										
	$parserP = oci_parse($conn, $checkRelay);
	$errP = oci_execute($parserP);	
	
	
	$rowRelay = oci_fetch_array($parserP,OCI_BOTH);
	
	
	if ($rowRelay){
		$extraCondsStation = "station.diverter_id = '".$rowRelay['OLD_DIVERTER_ID']."'  AND
				station.owner_id = '".$rowRelay['OLD_OWNER_ID']."' ";
				
				
		if ((!is_null($rowRelay['OLD_DIVERTER_ID'])) && ($rowRelay['OLD_OWNER_ID'])){
			
			$extraCondsExData = "exdata.diverter_id = '".$rowRelay['NEW_DIVERTER_ID']."'  AND
				exdata.owner_id = '".$rowRelay['OLD_OWNER_ID']."'  AND";
				
			$extraCondsAnnData = "ann_data.diverter_id = '".$rowRelay['NEW_DIVERTER_ID']."'  AND
				ann_data.owner_id = '".$rowRelay['OLD_OWNER_ID']."'  AND";
				
			
		}else if (($rowRelay['OLD_DIVERTER_ID']) && (!is_null($rowRelay['OLD_OWNER_ID']))){
			
			$extraCondsExData = "exdata.diverter_id = '".$rowRelay['OLD_DIVERTER_ID']."'  AND
				exdata.owner_id = '".$rowRelay['NEW_OWNER_ID']."'  AND";

			$extraCondsAnnData = "ann_data.diverter_id = '".$rowRelay['OLD_DIVERTER_ID']."'  AND
				ann_data.owner_id = '".$rowRelay['NEW_OWNER_ID']."'  AND";
		}elseif ($rowRelay['OLD_DIVERTER_ID'] && $rowRelay['OLD_OWNER_ID']){
		
			$extraCondsExData = "exdata.diverter_id = '".$rowRelay['NEW_DIVERTER_ID']."'  AND
				exdata.owner_id = '".$rowRelay['NEW_OWNER_ID']."'  AND";
				
			$extraCondsAnnData = "ann_data.diverter_id = '".$rowRelay['NEW_DIVERTER_ID']."'  AND
				ann_data.owner_id = '".$rowRelay['NEW_OWNER_ID']."'  AND";
		}
		
				
	
	}else{
		$extraCondsStation = "station.diverter_id = '".$diverter."'  AND
				station.owner_id = '".$owner."' ";
				
		$extraCondsExData = "exdata.diverter_id = '".$diverter."'  AND
				exdata.owner_id = '".$owner."'  AND";
		$extraCondsAnnData = "ann_data.diverter_id = '".$diverter."'  AND
				ann_data.owner_id = '".$owner."' AND";		
	}
if ($t ==1){
	$query = "select 
				*
				from exdata
				
				where
				exdata.mpid = '".$mpid."' AND
				".$extraCondsExData."
				
				exdata.wyear = '".$year."' 
				order by exdata.cdate asc
				";
}elseif ($t==2){
	$query = "select 
				*
				from ann_data
			
				where
				ann_data.mpid = '".$mpid."' AND
				
				".$extraCondsAnnData."
				ann_data.wyear = '".$year."' 
				order by ann_data.mpid asc
				";
}
elseif ($t==3){
	
	
	## GET THE OLD DIVERTER FROM STATION_RELAY
	$query = "select  
				station.*,
				county.county_nm, 
				meter.meter_flg,
				owner.owner_nm,
				diverter.diverter_nm
				from station
				Left Join Meter On Station.Mpid = Meter.Mpid
				Inner Join county On Station.county_cd = county.county_cd
				INNER JOIN owner on station.owner_id =owner.owner_id
				INNER JOIN diverter on station.diverter_id =diverter.diverter_id
				where
				station.mpid = '".$mpid."' AND
				".$extraCondsStation."
				".$facconds."
				order by station.mpid asc
				";
				
			#	print $query;
}


		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		$data = array();
		
		if ($_GET['debug'] == '1') print $query;
		
		$data = array();
		$data2 = array();
		while ($rows = oci_fetch_array($stid, OCI_BOTH)){
				
				$hasData = $validate->ann_data_wells($rows['MPID']);
			
				$state_nm = $validate->validate_statecd($rows['STATE_CD']);
					if ($t =='3'){
						$data2 = $rows;		
					
					}else{
						$data[] = array(
								
										"crop_cd" => $rows['CROP_CD'],
										"acres_irr" => $rows['ACRES_IRR'],
										"irr_meth" => $rows['IRR_METH'],
										"app_rate" =>$rows['APP_RATE'],
										"tot_amt" => $rows['TOT_AMOUNT'],
										'ann_amt' =>$rows['ANN_AMT'],
										'method' =>$rows['METHOD'],
										'restrictions' =>$rows['RESTRICTIONS'],
										'salinity' => $rows['SALINITY'],
										'treatment' => $row['TREATMENT'], // Treatment

										'jan' =>  $rows['ENT_JAN'],
										'feb' => $rows['ENT_FEB'],
										'mar' => $rows['ENT_MAR'],
										'apr' =>$rows['ENT_APR'],
										'may' =>$rows['ENT_MAY'],
										'jun' =>$rows['ENT_JUN'],
										'jul' =>$rows['ENT_JUL'],
										'aug' =>$rows['ENT_AUG'],
										'sep' =>$rows['ENT_SEP'],
										'oct' =>$rows['ENT_OCT'],
										'nov' =>$rows['ENT_NOV'],
										'dec' =>$rows['ENT_DEC'],
										'who' =>$rows['WHO'],
										'paid' =>$rows['PAID'],
										'ent_ann_amt' =>$rows['ENT_ANN_AMT'],
										'ent_jan' =>$rows['JAN'],
										'ent_feb' =>$rows['FEB'],
										'ent_mar' =>$rows['MAR'],
										'ent_apr' =>$rows['APR'],
										'ent_may' =>$rows['MAY'],
										'ent_jun' =>$rows['JUN'],
										'ent_jul' =>$rows['JUL'],
										'ent_aug' =>$rows['AUG'],
										'ent_sep' =>$rows['SEP'],
										'ent_oct' =>$rows['OCT'],
										'ent_nov' =>$rows['NOV'],
										'ent_dec' =>$rows['DEC']
									
									
									
										);
					}
					
						
		}
			
		 if ($t == '3'){
			
			 foreach($data2 as $key => $val){
				 if (!is_numeric ($key)){
					 $key = strtolower($key);
					 $k[$key] = $val;
					//$data [] = array ($data);
				 }
			 }
			 $data  = array($k);
		 }
		
		echo json_encode($data);
?>