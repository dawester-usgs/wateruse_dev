<?php 
# SORRY FOR THE OLD SCHOOL CODES :(

header("Content-type:application/json");
include ("../../includes/config.php"); 

$type = $_GET['type'];
$searchstring =strtoupper($_GET['q']);
$validate = new validate();
#print_r ($_SESSION);
$s=explode("(",$searchstring);
$searchstring = trim($s[0]);

$id =  rtrim($s[1],')');
#print $id;
#$conds = is_numeric($searchstring) ? $type."_id = ".$searchstring : $type."_nm = '".$searchstring."'";

$conds =is_numeric($searchstring) ? $type."_id = '".$s[0]."'" : $type."_id = '".$id ."'";//AND ".$type."_nm ='".$searchstring."' ";

#$whereconditions  = $_GET['directquery'] != '1' ? "WHERE ".$type."_id like '%".$searchstring."%' OR ".$type."_nm like '%".$searchstring."%'" :  "WHERE ".$conds;

$searchstring = str_replace("'", "''", $searchstring);
$whereconditions  = $_GET['directquery'] != '1' ? "WHERE ".$type."_id like '%".$searchstring."%' OR ".$type."_nm like '%".$searchstring."%'" :  "WHERE ".$conds;

switch($type){
	case 'Owner':
	$typeReport = 'O';
	break;
	
	case 'Diverter':
	$typeReport = 'D';
	break;
	
	case 'Facility':
	$typeReport = 'F';
	break;

}




if ($_SESSION['COUNTY_CD'] == '153' or $_SESSION['COUNTY_CD'] == '151' or $_SESSION['USER_COUNTY'] == '153' or $_SESSION['USER_COUNTY'] == '151' ){
	$reportInnerJoin = "";
	$reportConds = "";

}else{
	
	if ($_GET['page'] == '1'){ // i cannot editt this to where this variable will cease to exist but it has now :(
	
		if ($_GET['x'] == null || $_GET == "")
		{
			$reportInnerJoin = "";
			$reportConds = "";
			
		}elseif($_GET['x'] == 'sc'){
		
			$reportInnerJoin = "INNER JOIN report_county  ON ".$type.".".$type."_id = report_county.id 
											";
			$reportConds = "and report_county.type_cd = '".$typeReport."' 
								and  report_county.county_cd = '".$_SESSION['COUNTY_CD']."' and 
								".$type.".".$type."_nm not like '%ABANDON%' AND
								".$type.".".$type."_nm not like '%DELETE%'";
		
			
		}
		
	}else{
		 // $reportInnerJoin = "INNER JOIN report_county  ON ".$type.".".$type."_id = report_county.id ";
		// $reportConds = "and report_county.type_cd = '".$typeReport."' 
					// and  report_county.county_cd = '".$_SESSION['COUNTY_CD']."'  and 
					// ".$type.".".$type."_nm not like '%ABANDON%'";
		$reportInnerJoin = "";
		$reportConds = "";
	}
	
	
}

if ($type == 'Facility'){
	$reportInnerJoinFacility = "INNER JOIN OWNER ON FACILITY.OWNER_ID  = OWNER.OWNER_ID
										INNER JOIN DIVERTER ON FACILITY.DIVERTER_ID = DIVERTER.DIVERTER_ID
										";
	$rowsFacility = ",diverter.diverter_nm";					
}else{
	$reportInnerJoinFacility = "";
}
					
					#print_r ($_SESSION);
					
					
			if ($type == 'MPID')	{
					$query = "Select mpid,station.owner_id,owner_nm, diverter.diverter_id,diverter_nm from station 
									inner join owner on station.owner_id = owner.owner_id
									inner join diverter on station.diverter_id = diverter.diverter_id
									where mpid  like  '%%".$searchstring."%%' ";
			}else{
					$query = "select distinct ".$type.".*, 
									state.state_cd as mstate_cd,
									county.county_cd,county.county_nm ".$rowsFacility." from ".$type." 
									INNER JOIN COUNTY ON ".$type.".county_cd = county.county_cd
									INNER JOIN STATE ON ".$type.".state_cd = state.state_ab OR ".$type.".state_cd = state.state_cd
						
									".$reportInnerJoinFacility."
									".$reportInnerJoin."
									". $whereconditions."   ".$reportConds."
									
									ORDER BY ".$type."_nm ASC";
			}				
		
					
		#USER_COUNTY
	#print  $query;
	$stid = oci_parse($conn, $query);
	$err = oci_execute($stid);
	$data = array();
	

	
		if ($_GET['debug'] == '1') print $query; 
	
		while ($row = oci_fetch_array($stid, OCI_BOTH)){
					//	print_r ($row);
				if ($type == 'Facility') {
			
				
					$state_nm = $validate->validate_statecd2($row[10]);
					$mstate_nm =  $validate->validate_statecd2($row[13]);
					
					$data[] = array("id" =>$row['FACILITY_ID'],
										"nm" =>$row['FACILITY_NM'],
										"use_cd" =>$row['USE_CD'],
										"phone" =>$row['PHONE'], 
										"location" =>utf8_encode(ucfirst($row['LOCATION'])), 
										"city" =>ucfirst($row['CITY']), 
										"county_cd" =>$row['COUNTY_CD'], 
										"county_nm" =>utf8_encode($row['COUNTY_NM']), 
										"state_cd" =>$row[10], 
										"state_nm" => utf8_encode($state_nm),
										"mstreet" =>utf8_encode($row['MSTREET']), 
										"mcity" =>ucfirst($row['MCITY']), 
										"mstate" =>$row[13], 
										"mstate_nm" =>utf8_encode($mstate_nm), 
										"zip" =>$row['ZIP'], 
										"fowner_id" => $row['OWNER_ID'],
										"fowner_nm" => $row['OWNER_NM'],
										"fdiverter_id" => $row['DIVERTER_ID'],
										"fdiverter_nm" => $row['DIVERTER_NM'],
										"comment" =>utf8_encode(htmlentities($row['COMMENTS'])),
										"rzip" =>$row['RZIP'],
										"state" =>$row['MSTATE_CD'],
										"permit"=> $row['PERMIT']
										
										);
				
									
				}elseif ($type == 'MPID'){
					$data[] = array("id" =>$row[0],
											"oid"=>$row[1],
											"oname"=>$row[2],
											"did" =>$row[3],
											"dname" =>$row[4]);
					
				}else{
					$state_nm =  $validate->validate_statecd2($row[7]);
					$mstate_nm =  $validate->validate_statecd2($row[10]);
					#print $state_nm;
				
					$data[] = array("id" =>$row[0],
										"nm" =>utf8_encode($row[1]),
										"use_cd" =>$row[2],
										"phone" =>$row[3], 
										"location" =>utf8_encode(ucfirst($row[4])), 
										"city" =>utf8_encode(ucfirst($row[5])), 
										"county_cd" =>$row[6], 
											"county_nm" =>utf8_encode($row['COUNTY_NM']), 
										"state_cd" =>$row[7], 
										"state_nm" =>utf8_encode($state_nm), 
										"mstreet" =>utf8_encode($row[8]), 
										"mcity" =>utf8_encode(ucfirst($row[9])), 
										"mstate" =>$row[10], 
										"mstate_nm" =>$mstate_nm, 
										"zip" =>$row[11], 
										"county_nm" =>utf8_encode($row['COUNTY_NM']),
										"comment" =>utf8_encode(htmlentities($row['COMMENTS'])),
										"rzip" =>$row['RZIP'],
										"state" =>utf8_encode($row['MSTATE_CD'])
										
										);
						
				}
				 // $row = array_map('utf8_encode', $row);
				// array_push($data,$row);

			// $data = utf8_converter($data);
			
		}
		
		
		
		// $data = array_map('utf8_encode', $data);
		echo json_encode($data);
	

?>