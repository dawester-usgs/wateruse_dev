<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 

$type = $_GET['type'];
$searchstring =htmlspecialchars (strtoupper($_GET['q']));



			if ($type == "Diverter"){
				$assoc = "Owner";
				$assoc2 = "Diverter";
			}elseif ($type == "Owner"){
				$assoc = "Diverter";
				$assoc2 = "Owner";
			}

$s=explode("(",$searchstring);
$searchstring = trim($s[0]);
$searchstringid = str_replace(")","",trim($s[1]));

$conds = is_numeric($searchstring) ? $type."_id = ".$searchstring : $type."_id = '".$searchstringid."'";


$whereconditions  = $_GET['directquery'] != '1' ? "WHERE ".$type."_id like '%".$searchstring."%' OR ".$type."_nm like '%".$searchstring."%'" :  "WHERE ".$conds;


if ($type =="MPID"){
	$query = "select 
						station.mpid,
						station.owner_id,
						owner.owner_nm,
						station.diverter_id,
						diverter.diverter_id
					from station 
					inner join diverter on station.diverter_id = diverter.diverter_id
					inner join owner on station.owner_id = owner_id
	
					";
}else{
	
	$checkRelay  = "SELECT * FROM STATION_RELAY
										WHERE 
											new_".$conds."
										";
										

	$query = "select 
							distinct(station.diverter_id), 
							station.owner_id, 
							".$type.".phone, 
							".$assoc.".".$assoc."_nm, 
							".$assoc.".use_cd,
							diverter.diverter_id
							
							from station 
							INNER JOIN ".$assoc." ON station.".$assoc."_id = ".$assoc.".".$assoc."_id 
							
							INNER JOIN ".$type." ON station.".$type."_id = ".$type.".".$type."_id
							LEFT JOIN station_relay ON station.mpid = station_relay.mpid
							where ".$type.".".$conds." ORDER BY ".$assoc.".".$assoc."_nm ASC";
	
}
			
	#print $query;
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();

	if ($_GET['debug'] == '1') print $query;
	
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
			if ($type == 'Diverter'){
				$id = $row[1];
			}else if ($type == 'Owner'){
				$id = $row['DIVERTER_ID'];
			}
				$data[] = array("id" =>$id,
										"phone" =>$row[2],
										"nm" => $row[3],
										"usecd" => $row['USE_CD']
										);
				
		}
	
	echo json_encode($data);



?>