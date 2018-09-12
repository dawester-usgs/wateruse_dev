<?php 


header("Content-type:application/json");
include ("../../includes/config.php"); 


// print_r ($_GET);
$convert = new converter();
$validate = new validate();
$range = $_GET['range']."".$_GET['range_direction'];
$township = $_GET['township']."".$_GET['township_direction'];

$condSection = $_GET['section'] != null ? "AND section = '".$_GET['section']."'" : $condSection = "";



if ($_GET['prin_aquifer']){
	foreach ($_GET['prin_aquifer'] as $v){
		$whereCondition .="";
	}
}
 // $whereCondition ="station.mpid <> null "; //massive filler
		$lat = $_GET['latitude'];
		$lon = $_GET['longitude'];
		
		
		// var_dump(is_float($_GET['latitude']));
		// print $lat;
		
		// if (is_float($lat)){
			// print 'yes';
		// }
		// if (is_float(floatval($lat)) && is_float(floatval($lon))){
		
			// $lat = $convert->convertDMStoDD($lat,"lat");
			// $lon = $convert->convertDMStoDD($lon,"lon");
		// }else{
			// $lat = $_GET['latitude'];
		// $lon = $_GET['longitude'];
		
		// }
		
		$latz = intval($lat);
		/** check if decimal or not  somehow the effing floatval wont work */
		if (strlen($latz) >2){
			$lat = $convert->convertDMStoDD($lat,"lat");
			$lon = $convert->convertDMStoDD($lon,"lon");
		}
		
		/**
		$rad = ($_GET['radius'] * 1.60934); // convert it to KM
		// $R =6371; // earth's mean radius in Km. 

			// $maxLat = $lat + rad2deg($rad/$R);
			// $minLat = $lat - rad2deg($rad/$R);
			// $maxLon = $lon + rad2deg(asin($rad/$R) / cos(deg2rad($lat)));
			// $minLon = $lon - rad2deg(asin($rad/$R) / cos(deg2rad($lat)));
			
			
			 $earthRadius = 6371;

			  // latitude in radians
			  $lat = (($lat*pi())/180); 

			  // longitude in radians
			  $lon = (-($lon*pi())/180); 
			  // angular distance covered on earth's surface
			  $d = ($rad/$earthRadius);  
			  
			  
			  // $points = array();
			  
			  
			  // /** SO WHAT IM DOING HERE IS TO GET ALL THE POINT WITHIN THE X RADIUS BY USING THE COSINE LAW **/
			  // /** SINCE WE DONT WANT TO OVERLOAD THE DATABSE BY QUERYING THREE HUNDRED SIXTY LAT/LNG WE'LL JUST GET THE FIRST AND THE LAST LAT/LNG 
			  // THEN COMPARE THE DISTANCE BETWEEN THOSE TWO. SIMPLE BUT NOT SO ACCRUATE**/
			  // for ($i = 0; $i <= 180; $i++) {
				  
				  
				  // $bearing = $i * (pi() / 180); // radius
				   // $latitude = asin(sin($lat) * cos($d) + cos($lat) * sin($d) * cos($bearing));
				   // $longitude = (($lon + atan2(sin($bearing) * sin($d) * cos($lat), cos($d)-sin($lat)*sin($latitude))) * 180) / pi();
				   // $latitude = ($latitude*180) /pi();
				  
				   // if ($i == 0){
					   // $firstLat = $latitude;
					   // $firstLng = $longitude;
				   // }else if ($i == 179){
					   // $lastLat = $latitude;
						// $lastLng = $longitude;
				   // }
				 
				// print $longitude.'\\\n';
			  // }
			   // print '<br>'.$firstLat.' and '.$lastLat.'\\n';
			   // print '<br>'.$firstLng.' and '.$lastLng.'\\n';
		/* 
		 Where latitude_dd Between :minLat And :maxLat
            and longitude_dd Between :minLon And :maxLon
		
		*/
		
		function distance($lat1, $lng1, $lat2, $lng2) {
			// convert latitude/longitude degrees for both coordinates
			// to radians: radian = degree * π / 180
			$lat1 = deg2rad($lat1);
			$lng1 = deg2rad($lng1);
			$lat2 = deg2rad($lat2);
			$lng2 = deg2rad($lng2);

			// calculate great-circle distance
			$distance = acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($lng1 - $lng2));

			// distance in human-readable format:
			// earth's radius in km = ~6371
			return 6371 * $distance;
		}
		
		
		// $distance = ($_GET['radius'] * 1.60934);
		$distance =  ($_GET['radius']);
		$radius = 6371;
		
			
		$maxLat = $lat + rad2deg($distance / $radius);
		$minLat = $lat - rad2deg($distance / $radius);
		
		
		$maxLng = $lon + rad2deg($distance / $radius / cos(deg2rad($lat)));
		$minLng = $lon - rad2deg($distance / $radius / cos(deg2rad($lat)));
		
			// print '======='.$maxlng.'==='.$minlng;
		
		
foreach ($_GET as $key => $value){
	$key =htmlentities($key);

	
	if ($key != "range" && $key != "range_direction" && $key !="township_direction"
			&& $key !="township" && $key != "debug" && $key !="year" 
			&& $key != "radius" && $key !="latitude" && $key !="longitude" 
			&& $key !="meter" && $key !="prin_aquifer" && $key !="action_cd" 
			&& $key !="owner" && $key !="diverter"&& 
			$key !="county_cd" && $key !="debug" && $key !="state_cd" 
			&& $key !="action_cd" && $key !="source_cd" && $key !="owner" && $key !="diverter" && $key !="facility" ){
			
			$whereCondition .=" AND ".$key." like  '%".strtoupper($value)."%' ";
	}else{
			if ($key == "meter"){
				$whereCondition .= "meter.".$key."_flg ='".$value."'";
				// $whereCondition .= $key." = '".$value."' AND ";
			}else if ($key == "owner"){
				$owner = explode("(",$value);
			
				if (!is_numeric($owner[0])){
					$owner_id = rtrim($owner[1],")");
					// print $owner[1];
				}else{
					$owner_id = $owner[0];
					
					# this means that they pick the number first than the name
				}
				$whereCondition .= "AND station.".$key."_id ='".$owner_id."'";
				
			}
			else if ($key == "diverter"){
				$diverter = explode("(",$value);
			
				if (!is_numeric($diverter[0])){
					$diverter_id = rtrim($diverter[1],")");
					// print $owner[1];
				}else{
					$diverter_id = $diverter[0];
					
					# this means that they pick the number first than the name
				}
				$whereCondition .= "AND station.".$key."_id ='".$diverter_id."'";
				
			}
			else if ($key == "facility"){
				$facility = explode("(",$value);
			
				if (!is_numeric($facility[0])){
					$facility_id = rtrim($facility[1],")");
					// print $owner[1];
				}else{
					$facility_id = $facility[0];
					
					# this means that they pick the number first than the name
				}
				$whereCondition .= "AND station.".$key."_id ='".$facility_id."'";
				
			}
			
	}
}	
	
if ($_GET['prin_aquifer']){
	$commaValue ="";
	foreach($_GET['prin_aquifer'] as $v){
		if ($v != 'Evr'){
			$prin_aquifer = $validate-> validate_aquifer($v); 
			// $commaValue .= '"'.$prin_aquifer.'",';
			
			$commaValue .=$prin_aquifer;
		}
		
	}
	$whereCondition .= "AND ".rtrim($commaValue, 'AND');
	// $whereCondition .="prin_aquifer IN (".$value.")";
	
	
}


if ($_GET['county_cd']){
	$commaValue ="";
	foreach($_GET['county_cd'] as $v){
		if ($v != 'Evr'){
			$commaValue .= "'".$v."',";
		}
		
	}
	$county_cd =rtrim($commaValue, ',');
	$whereCondition .= "AND station.county_cd IN (".$county_cd.") ";

}

if ($_GET['state_cd']){
	$commaValue ="";
	foreach($_GET['state_cd'] as $v){
		if ($v != 'Evr'){
			$commaValue .= "'".$v."',";
		}
		
	}
	$state_cd =rtrim($commaValue, ',');
	$whereCondition .= "AND station.state_cd IN (".$state_cd.") ";

}
if ($_GET['action_cd']){
	$commaValue ="";
	foreach($_GET['action_cd'] as $v){
		if ($v != 'Evr'){
			$commaValue .= "'".$v."',";
		}
		
	}
	$action_cd =rtrim($commaValue, ',');
	$whereCondition .= "AND station.action_cd IN (".$action_cd.") ";

}
if ($_GET['source_cd']){
	$commaValue ="";
	foreach($_GET['source_cd'] as $v){
		if ($v != 'Evr'){
			$commaValue .= "'".$v."',";
		}
		
	}
	$source_cd =rtrim($commaValue, ',');
	$whereCondition .= "AND station.source_cd IN (".$source_cd.") ";

}
if ($minLat != 0 && $maxLng !=0 && $distance != 0){
	$whereCondition .= " AND latitude_dd Between '".$minLat."' and '".$maxLat."'  ";
	$whereCondition .= "AND longitude_dd Between '-".$minLng."' and '-".$maxLng."' ";
}else{
	if ($_GET['latitude']){
			if ($key == "meter"){
		$whereCondition .= "meter.".$key."_flg ='".$value."'";
		// $whereCondition .= $key." = '".$value."' AND ";
	}
	if ($key !="owner" || $key != "diverter"){
		$whereCondition .=" AND ".$key." =  '".strtoupper($value)."' ";
	}
	}
	
}


// $whereCondition .= "latitude_dd Between '".$firstLat."' and '".$lastLat."'  ";
// $whereCondition .= "longitude_dd Between '".$firstLng."' and '".$lastLng."' ";


if ($_GET['range'] != "" && $_GET['township']){
	$whereCondition .= " range ='".$range."' AND
						township = '".$township."'";
}

$query = "SELECT 					distinct meter.meter_flg,
									station.diverter_id,
									station.owner_id,
									station.facility_id,
									diverter.diverter_nm,
									owner.owner_nm,
							
									station.mpid,
									station.source_cd,
									station.action_cd,
									station.prin_aquifer,
								
									station.stream_nm,
									station.latitude,
									station.longitude,
									
									station.state_cd,
									station.county_cd,
									
									station.section,
									station.township,
									station.range,
							
									station.local_desc,
									
									station.longitude_dd,
									station.latitude_dd,
							
									state.state_ab as state_nm,
									ann_data.use_cd,
									ann_data.paid,
									county.county_nm
									
									 from station 
				
					Left Join Meter On Station.Mpid = Meter.Mpid
					Left join ann_data on station.mpid = ann_data.mpid
						Inner Join county On Station.county_cd = county.county_cd
							Inner Join state On Station.state_cd = state.state_cd
										inner join diverter on Station.diverter_id = diverter.diverter_id
										inner join owner on Station.owner_id = owner.owner_id	
			where 
				ann_data.wyear = '".$_GET['year']."' ".$whereCondition."   
				 /*and station.mpid ='32521290393801' <= for testing this is out of place the lat long is at holly bluff Misssippi */
			";


	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);

	
		$columns= "";
			for ($i = 1; $i <= $ncols; $i++) {
				$column_name  = oci_field_name($parser1, $i);
				$comma = ',';
				if ($i <$ncols){
						$x = $column_name.$comma;
				}else{
						$x = $column_name;
				}
				$columns .=$x;
			
		
			}
			
	if ($_GET['debug'] == '1') print $query;
	
		$data = array();
		$dataStation= array();
		$dataStation2 = array();
		while ($row = oci_fetch_assoc($stid)){
			
			// foreach ($results as $i => $result) {
				// $resultDistance = distance($lat, $lng, $result['lat'], $result['lng']);
				// if ($resultDistance > $distance) {
					// unset($results[$i]);
				// }
			// }
		
			$resultDistance = distance($lat, $long, $row['LATITUDE_DD'], $row['LONGITUDE_DD']);
			if ($row['LATITUDE_DD'] == '0' && $row['LONGITUDE_DD']== 0){
				$lat = $convert->convertDMStoDD($row['LATITUDE'],"lat");
				$lon = $convert->convertDMStoDD($row['LONGITUDE'],"lng");
			}else{
				$lat = $row['LATITUDE_DD'];
				$lon = $row['LONGITUDE_DD'];
			}
		
			
			
			$dataStation[] = array("METER_FLG" => utf8_encode($row['METER_FLG']),
									"DIVERTER_ID" => utf8_encode($row['DIVERTER_ID']),
									"OWNER_ID" => utf8_encode($row['OWNER_ID']),
									"FACILITY_ID" => utf8_encode($row['FACILITY_ID']),
									"DIVERTER_NM" => utf8_encode($row['DIVERTER_NM']),
									"OWNER_NM" => utf8_encode($row['OWNER_NM']),
									"FACILITY_NM" => utf8_encode($row['FACILITY_NM']),
									"MPID" => utf8_encode($row['MPID']),
									"SOURCE_CD" =>utf8_encode($row['SOURCE_CD']),
									"ACTION_CD" => utf8_encode($row['ACTION_CD']),
									"PRIN_AQUIFER" => utf8_encode($row['PRIN_AQUIFER']),
									
									"LATITUDE" => utf8_encode($row['LATITUDE']),
									"LONGITUDE" => utf8_encode($row['LONGITUDE']),
									
									"STATE_CD" => utf8_encode($row['STATE_CD']),
									"SECTION" => utf8_encode($row['SECTION']),
									"TOWNSHIP" => utf8_encode($row['TOWNSHIP']),
									"RANGE" => utf8_encode($row['RANGE']),
									"DAM" => utf8_encode($row['DAM']),
									"LOCAL_DESC" => utf8_encode($row['LOCAL_DESC']),
									
									"LATITUDE_DD" => round($lat,'4'),
									"LONGITUDE_DD" => round($lon,'4'),
									"COUNTY_CD" => utf8_encode($row['COUNTY_CD']),
									"STATE_NM" => utf8_encode($row['STATE_NM']),
									"USE_CD" => utf8_encode($row['USE_CD']),
									"PAID" => utf8_encode($row['PAID']),
									"COUNTY_NM" => utf8_encode($row['COUNTY_NM'])
									);
					
		
		}
		
		// print_r ($dataStation);
		
		// $data = array_merge($dataStation,$dataAnnData);
			// print $queryAnnData;
	// $data= array_map("htmlentities", $dataStation);
	
	if (!is_null($dataStation)){
		echo json_encode($dataStation);
	}else{
		echo json_encode("No data");
	}
		
 ?>