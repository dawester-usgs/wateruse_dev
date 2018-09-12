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
$hasData = $_GET['isData'];
$r = $_GET['type'];
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

if ($t ==1){
	$query = "select 
				*
				from exdata
				
				where
				exdata.mpid = '".$mpid."' AND
				/* exdata.diverter_id = '".$diverter."' AND
				 exdata.owner_id = '".$owner."' AND*/
				exdata.wyear = '".$year."' 
				order by exdata.cdate asc
				";
}elseif ($t==2){
	$query = "select 
				*
				from ann_data
			
				where
				ann_data.mpid = '".$mpid."' AND
				/* ann_data.diverter_id = '".$diverter."' AND
				 ann_data.owner_id = '".$owner."' AND*/
				ann_data.wyear = '".$year."' 
				order by ann_data.mpid asc
				";
}
elseif ($t==3){
	
	$facconds  ="";
	$facJoin ="";
	if ($r == 'fac'){
		$facconds = " AND station.facility_id = '".$facility."'";
		$fac = " station.facility_id, facility.facility_nm,";
		$facJoin= "inner join facility on station.facility_id = facility.facility_id";
	}
	
	if ($hasData == 'Yes'){
		$query = "select  
			ann_data.mpid, 
				owner.owner_nm,
				owner.owner_id,
				diverter.diverter_id,
				diverter.diverter_nm,
				ann_data.use_cd, 
				ann_data.paid,
				ann_data.wyear
				from ann_data 

							
					inner join diverter on ann_data.diverter_id = diverter.diverter_id
					inner join owner on ann_data.owner_id = owner.owner_id	
				where
				ann_data.mpid = '".$mpid."' and 
				ann_data.wyear = '".$year."'
				
				/*AND
				ann_data.diverter_id = '".$diverter."' AND
				ann_data.owner_id = '".$owner."' 
				*/
				order by ann_data.mpid asc
				";
	}else{
		$query = "select station.mpid,
						owner.owner_nm,
						owner.owner_id,
						diverter.diverter_id,
						diverter.diverter_nm,
						station.source_cd,
						station.action_cd,
									station.prin_aquifer,
									station.rec_waste,
									station.subtype,
									station.quad1,
									station.quad2,
									station.opnum,
									station.perm_agncy,
									station.wellno,
									station.pump_hp,
									station.power_tp,
									station.diversion_meth,
									station.pipe_diam,
									station.well_depth,
									station.stream_nm,
									station.latitude,
									station.longitude,
									station.altitude,
									station.date_drilled,
									station.driller_nm,
									station.huc,
									station.state_cd,
									station.county_cd,
									station.quadno,
									station.quad1,
									station.quad2,
									station.section,
									station.township,
									station.range,
									station.dam,
									station.local_desc,
									station.tract,
									station.farm,
									station.longitude_dd,
									station.latitude_dd,
									station.county_cd,
									state.state_ab as state_nm,
									county.county_nm, 
									".$fac."
									meter.meter_flg from station 
				
					Left Join Meter On Station.Mpid = Meter.Mpid
										Inner Join county On Station.county_cd = county.county_cd
										Inner Join state On Station.state_cd = state.state_cd
										inner join diverter on Station.diverter_id = diverter.diverter_id
										inner join owner on Station.owner_id = owner.owner_id	
										".$facJoin."
					where 
					station.mpid = '".$mpid."' AND
					station.diverter_id = '".$diverter."' AND
					station.owner_id = '".$owner."' 
					
						order by station.mpid asc
					";
				
	}
	
	
}




		$stid = oci_parse($conn, $query);
		$err = oci_execute($stid);
		$data = array();
		
		if ($_GET['debug'] == '1') print $query;
		
		$data = array();
		$data2 = array();
		
		while ($rows = oci_fetch_array($stid, OCI_BOTH)){
				if ($r != 'fac'){
					$hasData = $validate->ann_data_wells($rows['MPID']);
					
				}else{
					$facconds = " AND station.facility_id = '".$facility."'";
					$fac = " station.facility_id, facility.facility_nm,";
					$facJoin= "inner join facility on station.facility_id = facility.facility_id";
				}
				
				
				$state_nm = $validate->validate_statecd($rows['STATE_CD']);
					if ($t =='3'){
					
						if ($hasData == 'Yes'){
							$searchStation = "SELECT 
									station.mpid,
									station.source_cd,
									station.action_cd,
									station.prin_aquifer,
									station.rec_waste,
									station.subtype,
									station.quad1,
									station.quad2,
									station.opnum,
									station.perm_agncy,
									station.wellno,
									station.pump_hp,
									station.power_tp,
									station.diversion_meth,
									station.pipe_diam,
									station.well_depth,
									station.stream_nm,
									station.latitude,
									station.longitude,
									station.altitude,
									station.date_drilled,
									station.driller_nm,
									station.huc,
									station.state_cd,
									station.county_cd,
									station.quad1,
									station.quadno,
									station.quad2,
									station.section,
									station.township,
									station.range,
									station.dam,
									station.local_desc,
									station.tract,
									station.farm,
									station.longitude_dd,
									station.latitude_dd,
									station.county_cd,
									state.state_ab as state_nm,
									county.county_nm, 
									".$fac."
									meter.meter_flg from station 
				
					Left Join Meter On Station.Mpid = Meter.Mpid
										Inner Join county On Station.county_cd = county.county_cd
										Inner Join state On Station.state_cd = state.state_cd
										inner join diverter on Station.diverter_id = diverter.diverter_id
										inner join owner on Station.owner_id = owner.owner_id	
										".$facJoin."
									WHERE 
										station.MPID = '".$rows['MPID']."'
										
									";
								
								$parse = oci_parse($conn, $searchStation);
								$err2 = oci_execute($parse);
									
					
								if ($_GET['debug'] == '1') print $searchStation;
								while ($row2 = oci_fetch_array($parse, OCI_BOTH)){		
									$datax  = $row2;
									
								}
								
								if (!empty($datax)){
									$data2 = array_merge($rows,$datax);
								}else{
									$data2 = $rows;
								}
								
						}else{
						
								$data2 = $rows;
						}
						
								
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
										'ent_dec' =>$rows['DEC'],
										'ent_units' => $rows['ENTERED_UNITS'],
										'centroid' => $rows['CENTROID']
									
									
									
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