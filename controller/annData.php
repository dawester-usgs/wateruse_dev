<?php 

header("Content-type:application/json");
include ("../includes/config.php"); 

	/* INITIATE CLASS */
	$validate = new validate();
	$sql = new sql();
	$debug = new debug();
	$generate = new reports();
	/* INITIATE CLASS */
	$maintable = "station";
	/** INITIATE VARIABLES **/
	$county_cd = $_GET['countycd']; 
	$year = $_GET['year']; 
	$huc = $_GET['huc'];
	$stream_nm = $_GET['streamnm'];
	$use_cd = $_GET['use_cd'];
	$raw_use_cd = $_GET['use_cd'];
	$sic_cd = $_GET['sic_cd'];
	$raw_sic_cd = $_GET['sic_cd'];
	$aquifer = $_GET['aquifer'];
	$flag = $_GET['q'];
	$the_decider = $_GET['p'];
	$ws = htmlentities($_GET['watersource']);
	$private = 0;
	$flagDebug = $debug->isDebug($flag);
	if (!$_SESSION){
		
			$no_direct_access =false;
		
	}
	
	if ($no_direct_access == true){
		echo "no direct access allowed. Please Login to Continue.";
	}else{
		if ($the_decider == 'wells'){
			$the_decider = '1FRWELLS';
			
			if ($county_cd == '021'){
				$hucWEST = "'08020302','11010007','11010008'";
				$hucEAST = "'08020203'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}elseif ($county_cd == '031'){
				$hucWEST = "'08020205','08020302'";
				$hucEAST = "'08020203','08020204'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}elseif ($county_cd == '037'){
				$hucWEST = "'08020205','08020302'";
				$hucEAST = "'08020203'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}
			elseif ($county_cd == '055'){
				$hucWEST = "'08020302','11010007','11010013'";
				$hucEAST = "'08020203'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}
			elseif ($county_cd == '077'){
				$hucWEST = "'08020205','08020304'";
				$hucEAST = "'08020100','08020203'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}
			elseif ($county_cd == '111'){
				$hucWEST = "'08020205','08020302'";
				$hucEAST = "'08020203','08020204'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}elseif ($county_cd =='123'){
				$hucWEST = "'08020205','08020302','08020304'";
				$hucEAST = "'08020203'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}else{
				
				$hucWEST = "'08020304','08020302','11010008','08020205','11010007','11010013'";
				$hucEAST= "'08020204','08020100','08020203'";
					$hucWEST = $sql->conditions($hucWEST,'huc');
					$hucEAST = $sql->conditions($hucEAST,'huc');
			}
			$water_source = $_GET['watersource'];
			if  ($water_source == "'sw'"){
				$addMoreRows = ",station.stream_nm, station.huc";
				$addMoreGroupBy = ",station.stream_nm, station.huc";
			}
			$raw_sic = $validate->validate_usecd($raw_sic_cd);
			// validate class->validate_aquifer function ('TO DO DATA');
			$prin_aquifer = $validate-> validate_aquifer($aquifer);
			$countyx = explode(",",$county_cd);
			if ($county_cd == 'all'){
				$thisiPromiseyou = true;
				$county_cdEW = $sql->conditions("'021','031','037','055','077','111','123'",'station.county_cd');
			}
			foreach ($countyx as $countyfips){
				
				if ($countyfips == '021' || $countyfips == '031' || $countyfips =='037' || $countyfips == '055' || $countyfips =='077' || $countyfips =='111' || $countyfips =='123'){
					$county_cdEW = $sql->conditions($countyfips,'station.county_cd');
					$thisiPromiseyou = true;
				}
			}
		
				$county_cd = $sql->conditions($county_cd,'station.county_cd');
					
				
	
			
		
			$huc = $sql->conditions($huc,'huc');
			$water_source = $sql->conditions(strtoupper($water_source),'station.source_cd');
			$stream_nm = $sql->conditions($stream_nm,'station.stream_nm');
			$use_cd = $sql->conditions($use_cd, 'ann_data.use_cd');
			$wyear = $sql->conditions($year, 'wyear-ann');
			$joinSQL1 = $sql->join("ann_data","INNER","station.mpid");
			$joinSQL2 = $sql->join("county","INNER","station.county_cd");
			$joinSQL3 = $sql->join("use_type","INNER","ann_data.use_cd");
			//$groupBy = "GROUP BY COUNTY_NM, Ann_Data.Use_Cd, Use_Type.Use_Nm, station.prin_aquifer";
			$groupBy = "GROUP BY COUNTY_NM, Ann_Data.Use_Cd, Use_Type.Use_Nm".$addMoreGroupBy;
			$joinSQL = $joinSQL1.' '.$joinSQL2.' '.$joinSQL3;	
			
		//	$groupBy = "GROUP BY county_nm, ann_data.USE_CD, use_nm";
			$rows = strtoupper ("
					sum((ann_data.ann_amt)/3.06888324597)/365 as mgal, 
					count(station.mpid) as occurences, 
					county_nm, 
					ann_data.use_cd,
					use_type.use_nm
					/*,station.prin_aquifer*/
					 ".$addMoreRows);
				
			if ($aquifer == "all"){
				
				$deposits = "Deposits";
				$deposits2= $validate-> validate_aquifer($deposits);
				$cockfield = "Cockfield";
				$cockfield2 = $validate-> validate_aquifer($cockfield);
				$cane =  "Cane";
				$cane2 = $validate-> validate_aquifer($cane);
				$sparta =  "Sparta";
				$sparta2 = $validate-> validate_aquifer($sparta);
				$wilcox = "Wilcox";
				$wilcox2 = $validate-> validate_aquifer($wilcox);
				$clayton = "Clayton";
				$clayton2 = $validate-> validate_aquifer($clayton);
				$nacatoch = "Nacatoch";
				$nacatoch2 = $validate-> validate_aquifer($nacatoch);
				$tokio = "Tokio";
				$tokio2 = $validate-> validate_aquifer($tokio);
				$rocks = "Rocks";
				$rocks2 = $validate-> validate_aquifer($rocks);
				$trinity = "Trinity";
				$trinity2 = $validate-> validate_aquifer($trinity);
				$others = "Others/Unknown";
				$others2 = $validate-> validate_aquifer("Unknown");
			
			
				$aquifer_arr = array();
				
				$use_cd = array('AG','IR','CO','IN',"'PF','PG','PH','PN'",'MI','WS');
				$toCSVarray = array();
				## create new array to pass to CSV 
			
				if ($deposits2){
					$whereConditionsSQLAL = $county_cd.$use_cat.$huc.$deposits2.$water_source.$wyear;
					$whereConditionsSQLALEast = $county_cdEW.$use_cat.$deposits2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLALWest = $county_cdEW.$use_cat.$deposits2.$water_source.$hucWEST.$wyear;
					$type1 = $deposits;
				}
				if  ($cockfield2){
					$whereConditionsSQLCOCK = $county_cd.$use_cat.$huc.$cockfield2.$water_source.$wyear;
					$whereConditionsSQLCOCKEast = $county_cdEW.$use_cat.$cockfield2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLCOCKWest = $county_cdEW.$use_cat.$cockfield2.$water_source.$hucWEST.$wyear;
					$type2 = $cockfield;
				}
				if ($sparta2){
					$whereConditionsSQLAHOO = $county_cd.$use_cat.$huc.$sparta2.$water_source.$wyear;
					$whereConditionsSQLAHOOEast = $county_cdEW.$use_cat.$sparta2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLAHOOWest = $county_cdEW.$use_cat.$sparta2.$water_source.$hucWEST.$wyear;
					$type3 = $sparta;
				}
				if ($cane2){
					$whereConditionsSQLCANE = $county_cd.$use_cat.$huc.$cane2.$water_source.$wyear;
					$whereConditionsSQLCANEEast = $county_cdEW.$use_cat.$sparta2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLCANEWest = $county_cdEW.$use_cat.$sparta2.$water_source.$hucWEST.$wyear;
					$type4 = $cane;
				}
				if ($wilcox2){
					$whereConditionsSQLCOX = $county_cd.$use_cat.$huc.$wilcox2.$water_source.$wyear;
					$whereConditionsSQLCOXEast = $county_cdEW.$use_cat.$wilcox2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLCOXWest = $county_cdEW.$use_cat.$wilcox2.$water_source.$hucWEST.$wyear;
					$type5 = $wilcox;
				}
				if ($clayton2){
					$whereConditionsSQLCLAY = $county_cd.$use_cat.$huc.$clayton2.$water_source.$wyear;
					$whereConditionsSQLCLAYEeast = $county_cdEW.$use_cat.$clayton2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLCLAYWest = $county_cdEW.$use_cat.$clayton2.$water_source.$hucWEST.$wyear;
					$type6 = $clayton;
				}
				if ($nacatoch2){
					$whereConditionsSQLNAC = $county_cd.$use_cat.$huc.$nacatoch2.$water_source.$wyear;
					$whereConditionsSQLNACEast = $county_cdEW.$use_cat.$nacatoch2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLNACWest = $county_cdEW.$use_cat.$nacatoch2.$water_source.$hucWEST.$wyear;
					$type7 = $nacatoch;
				}
				if ($tokio2){
					$whereConditionsSQLTOK = $county_cd.$use_cat.$huc.$tokio2.$water_source.$wyear;
					$whereConditionsSQLTOKEast = $county_cdEW.$use_cat.$tokio2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLTOKWest = $county_cdEW.$use_cat.$tokio2.$water_source.$hucWEST.$wyear;
					$type8 = $tokio;
				}
				if ($rocks2){
					$whereConditionsSQLROCK= $county_cd.$use_cat.$huc.$rocks2.$water_source.$wyear;
					$whereConditionsSQLROCKEast =$county_cdEW.$use_cat.$rocks2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLROCKWest = $county_cdEW.$use_cat.$rocks2.$water_source.$hucWEST.$wyear;
					$type9 = $rocks;
				}
				if ($trinity2){
					$whereConditionsSQLTRI= $county_cd.$use_cat.$huc.$trinity2.$water_source.$wyear;
					$whereConditionsSQLTRIEast = $county_cdEW.$use_cat.$trinity2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLTRIWest = $county_cdEW.$use_cat.$trinity2.$water_source.$hucWEST.$wyear;
					$type10 = $trinity2;
				}
				
				if ($others2){
					$whereConditionsSQLOTHERS= $county_cd.$use_cat.$huc.$others2.$water_source.$wyear;
					$whereConditionsSQLOTHERSEast = $county_cdEW.$use_cat.$others2.$water_source.$hucEAST.$wyear;
					$whereConditionsSQLOTHERSWest = $county_cdEW.$use_cat.$others2.$water_source.$hucWEST.$wyear;
					$type11 = $others;
				}
				$resultsALLU = $sql->select($maintable, $whereConditionsSQLAL, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type1);
				
				$resultsCOCK = $sql->select($maintable, $whereConditionsSQLCOCK, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type2);
				$resultsAHOO = $sql->select($maintable, $whereConditionsSQLAHOO, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type3);				
				$resultsCANE = $sql->select($maintable, $whereConditionsSQLCANE, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type4);				
				$resultsCOX = $sql->select($maintable, $whereConditionsSQLCOX, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type5);					
				$resultsCLAY = $sql->select($maintable, $whereConditionsSQLCLAY, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type6);				
				$resultsNAC= $sql->select($maintable, $whereConditionsSQLNAC, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type7);				
				$resultsTOK= $sql->select($maintable, $whereConditionsSQLTOK, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type8);				
				$resultsROCK= $sql->select($maintable, $whereConditionsSQLROCK, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type9);				
				$resultsTRI= $sql->select($maintable, $whereConditionsSQLTRI, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type10);						
				$resultsOTHERS= $sql->select($maintable, $whereConditionsSQLOTHERS, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type11);				
				if ($thisiPromiseyou == true){
					## WEST AND EAST CROWLEY RIDGE QUERY ###
					# ALLUVIUM ,DEPOSITS, QUARTERNARY AGE
					$resultsALLUWest = $sql->select($maintable, $whereConditionsSQLALWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type1,"W");
					$resultsALLUEast = $sql->select($maintable, $whereConditionsSQLALEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type1,"E");
					## COCKFIELD FORMATION
					$resultsCOCKWest = $sql->select($maintable, $whereConditionsSQLCOCKWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type2,"W");
					$resultsCOCKEast = $sql->select($maintable, $whereConditionsSQLCOCKEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type2,"E");
					## SPARTA AHOOO AWHOOOO 
					$resultsAHOOWest = $sql->select($maintable, $whereConditionsSQLAHOOWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type3,"W");
					$resultsAHOOEast = $sql->select($maintable, $whereConditionsSQLAHOOEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type3,"E");
					## CANE
					$resultsCANEWest = $sql->select($maintable, $whereConditionsSQLCANEWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type4,"W");
					$resultsCANEEast = $sql->select($maintable, $whereConditionsSQLCANEEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type4,"E");
					## COX 
					$resultsCOXWest = $sql->select($maintable, $whereConditionsSQLCOXWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type5,"W");
					$resultsCOXEast = $sql->select($maintable, $whereConditionsSQLCOXEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type5,"E");
					## CLAY
					$resultsCLAYWest = $sql->select($maintable, $whereConditionsSQLCLAYWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type6,"W");
					$resultsCLAYEast = $sql->select($maintable, $whereConditionsSQLCLAYEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type6,"E");
					## Nacatoch
					$resultsNACWest = $sql->select($maintable, $whereConditionsSQLNACWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type7,"W");
					$resultsNACEast = $sql->select($maintable, $whereConditionsSQLNACEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type7,"E");
					## TOK
					$resultsTOKWest = $sql->select($maintable, $whereConditionsSQLTOKWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type8,"W");
					$resultsTOKEast = $sql->select($maintable, $whereConditionsSQLTOKEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type8,"E");
					## Rock
					$resultsROCKWest = $sql->select($maintable, $whereConditionsSQLROCKWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type9,"W");
					$resultsROCKEast = $sql->select($maintable, $whereConditionsSQLROCKEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type9,"E");
					## TRI 
					$resultsTRIWest = $sql->select($maintable, $whereConditionsSQLTRIWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type10,"W");
					$resultsTRIEast = $sql->select($maintable, $whereConditionsSQLTRIEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type10,"E");
					## OTHERS 
					$resultsOTHERSWest= $sql->select($maintable, $whereConditionsSQLOTHERSWest, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type11,'W');				
					$resultsOTHERSEast= $sql->select($maintable, $whereConditionsSQLOTHERSEast, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$type11,'E');		
				}
						
						
				########################################		
				
	/*bruh*/	//$resultsCOCK = $sql->select($maintable, $whereConditionsSQLCO, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy);
				if (empty($resultsALLU)){
					$resultALLU = (is_array($resultALLU))?$resultALLU:array($resultALLU);
					$resultALLU[] = array();
					$resultALLU = array ("");
					
				}
				if (empty($resultsCOCK)){
					$resultsCOCK = (is_array($resultsCOCK))?$resultsCOCK:array($resultsCOCK);
					$resultsCOCK[] = array();
					$resultsCOCK = array ("");
				}
				if (empty($resultsAHOO)){
					$resultsAHOO = (is_array($resultsAHOO))?$resultsAHOO:array($resultsAHOO);
					$resultsAHOO[] = array();
					$resultsAHOO = array ("");
				}
				if (empty($resultsCANE)){
					$resultsCANE = (is_array($resultsCANE))?$resultsCANE:array($resultsCANE);
					$resultsCANE[] = array();
					$resultsCANE = array ("");
				}
				if (empty($resultsCLAY)){
					$resultsCLAY = (is_array($resultsCLAY))?$resultsCLAY:array($resultsCLAY);
					$resultsCLAY[] = array();
					$resultsCLAY = array ("");
				}
				if (empty($resultsCOX)){
					$resultsCOX = (is_array($resultsCOX))?$resultsCOX:array($resultsCOX);
					$resultsCOX[] = array();
					$resultsCOX = array ("");
				}
				if (empty($resultsNAC)){
					$resultsNAC = (is_array($resultsNAC))?$resultsNAC:array($resultsNAC);
					$resultsNAC[] = array();
					$resultsNAC = array ("");
				}
				if (empty($resultsTOK)){
					$resultsTOK = (is_array($resultsTOK))?$resultsTOK:array($resultsTOK);
					$resultsTOK[] = array();
					$resultsTOK = array ("");
				}
				if (empty($resultsROCK)){
					$resultsROCK = (is_array($resultsROCK))?$resultsROCK:array($resultsROCK);
					$resultsROCK[] = array();
					$resultsROCK = array ("");
				}
				
				if (empty($resultsTRI)){
					$resultsTRI = (is_array($resultsTRI))?$resultsTRI:array($resultsTRI);
					$resultsTRI[] = array();
					$resultsTRI = array ("");
				}
				if (empty($resultsOTHERS)){
					$resultsOTHERS = (is_array($resultsOTHERS))?$resultsOTHERS:array($resultsOTHERS);
					$resultsOTHERS[] = array();
					$resultsOTHERS = array ("");
				}
				
				## WEST AND EAST CROWLEY RIDGE QUERY ###
					## ALLUVIUM
					if (empty($resultsALLUWest)){
						$resultsALLUWest = (is_array($resultsALLUWest))?$resultsALLUWest:array($resultsALLUWest);
						$resultsALLUWest[] = array();
						$resultsALLUWest = array ("");
					}
					if (empty($resultsALLUEast)){
						$resultsALLUEast = (is_array($resultsALLUEast))?$resultsALLUEast:array($resultsALLUEast);
						$resultsALLUEast[] = array();
						$resultsALLUEast = array ("");
					}
					## sparta
					if (empty($resultsAHOOEast)){
						$resultsAHOOEast = (is_array($resultsAHOOEast))?$resultsAHOOEast:array($resultsAHOOEast);
						$resultsAHOOEast[] = array();
						$resultsAHOOEast = array ("");
					}
					if (empty($resultsAHOOWest)){
						$resultsAHOOWest = (is_array($resultsAHOOWest))?$resultsAHOOWest:array($resultsAHOOWest);
						$resultsAHOOWest[] = array();
						$resultsAHOOWest = array ("");
					}
					# CANE 
					if (empty($resultsCANEEast)){
						$resultsCANEEast = (is_array($resultsCANEEast))?$resultsCANEEast:array($resultsCANEEast);
						$resultsCANEEast[] = array();
						$resultsCANEEast = array ("");
					}
					if (empty($resultsCANEWest)){
						$resultsCANEWest = (is_array($resultsCANEWest))?$resultsCANEWest:array($resultsCANEWest);
						$resultsCANEWest[] = array();
						$resultsCANEWest = array ("");
					}
					# CLAY 
					if (empty($resultsCLAYEast)){
						$resultsCLAYEast = (is_array($resultsCLAYEast))?$resultsCLAYEast:array($resultsCLAYEast);
						$resultsCLAYEast[] = array();
						$resultsCLAYEast = array ("");
					}
					if (empty($resultsCLAYWest)){
						$resultsCLAYWest = (is_array($resultsCLAYWest))?$resultsCLAYWest:array($resultsCLAYWest);
						$resultsCLAYWest[] = array();
						$resultsCLAYWest = array ("");
					}
					# COCK 
					if (empty($resultsCOCKEast)){
						$resultsCOCKEast = (is_array($resultsCOCKEast))?$resultsCOCKEast:array($resultsCOCKEast);
						$resultsCOCKEast[] = array();
						$resultsCOCKEast = array ("");
					}
					if (empty($resultsCOCKWest)){
						$resultsCOCKWest = (is_array($resultsCOCKWest))?$resultsCOCKWest:array($resultsCOCKWest);
						$resultsCOCKWest[] = array();
						$resultsCOCKWest = array ("");
					}
					# COX 
					if (empty($resultsCOXEast)){
						$resultsCOXEast = (is_array($resultsCOXEast))?$resultsCOXEast:array($resultsCOXEast);
						$resultsCOXEast[] = array();
						$resultsCOXEast = array ("");
					}
					if (empty($resultsCOXWest)){
						$resultsCOXWest = (is_array($resultsCOXWest))?$resultsCOXWest:array($resultsCOXWest);
						$resultsCOXWest[] = array();
						$resultsCOXWest = array ("");
					}
					# NAC
					if (empty($resultsNACEast)){
						$resultsNACEast = (is_array($resultsNACEast))?$resultsNACEast:array($resultsNACEast);
						$resultsNACEast[] = array();
						$resultsNACEast = array ("");
					}
					if (empty($resultsNACWest)){
						$resultsNACWest = (is_array($resultsNACWest))?$resultsNACWest:array($resultsNACWest);
						$resultsNACWest[] = array();
						$resultsNACWest = array ("");
					}
					## TOK 
					if (empty($resultsTOKEast)){
						$resultsTOKEast = (is_array($resultsTOKEast))?$resultsTOKEast:array($resultsTOKEast);
						$resultsTOKEast[] = array();
						$resultsTOKEast = array ("");
					}
					if (empty($resultsTOKWest)){
						$resultsTOKWest = (is_array($resultsTOKWest))?$resultsTOKWest:array($resultsTOKWest);
						$resultsTOKWest[] = array();
						$resultsTOKWest = array ("");
					}
					## ROCK 
					if (empty($resultsROCKEast)){
						$resultsROCKEast = (is_array($resultsROCKEast))?$resultsROCKEast:array($resultsROCKEast);
						$resultsROCKEast[] = array();
						$resultsROCKEast = array ("");
					}
					if (empty($resultsROCKWest)){
						$resultsROCKWest = (is_array($resultsROCKWest))?$resultsROCKWest:array($resultsROCKWest);
						$resultsROCKWest[] = array();
						$resultsROCKWest = array ("");
					}
					## TRI
					if (empty($resultsTRIEast)){
						$resultsTRIEast = (is_array($resultsTRIEast))?$resultsTRIEast:array($resultsTRIEast);
						$resultsTRIEast[] = array();
						$resultsTRIEast = array ("");
					}
					if (empty($resultsTRIWest)){
						$resultsTRIWest = (is_array($resultsTRIWest))?$resultsTRIWest:array($resultsTRIWest);
						$resultsTRIWest[] = array();
						$resultsTRIWest = array ("");
					}
					## Others/Unknown
					if (empty($resultsOTHERSEast)){
						$resultsOTHERSEast = (is_array($resultsOTHERSEast))?$resultsOTHERSEast:array($resultsOTHERSEast);
						$resultsOTHERSEast[] = array();
						$resultsOTHERSEast = array ("");
					}
					if (empty($resultsOTHERSWest)){
						$resultsOTHERSWest = (is_array($resultsOTHERSWest))?$resultsOTHERSWest:array($resultsOTHERSWest);
						$resultsOTHERSWest[] = array();
						$resultsOTHERSWest = array ("");
					}
					
				########################################
				
				$results = array_merge(
									$resultsALLU,
									$resultsALLUWest,
									$resultsALLUEast,
									$resultsAHOO,
									$resultsAHOOEast,
									$resultsAHOOWest,
									$resultsCANE,
									$resultsCANEEast,
									$resultsCANEWest,
									$resultsCLAY,
									$resultsCLAYEast,
									$resultsCLAYWest,
									$resultsCOCK,
									$resultsCOCKEast,
									$resultsCOCKWest,
									$resultsCOX,
									$resultsCOXEast,
									$resultsCOXWest,
									$resultsNAC,
									$resultsNACEast,
									$resultsNACWest,
									$resultsOTHERS,
									$resultsOTHERSEast,
									$resultsOTHERSWest
									);
				
				
	
				if ($flagDebug == '1'){
					echo json_encode($results);
				}
				elseif($flagDebug == 'CSV'){
					$generate->toCSV($results,false,$the_decider,$year,$ws);
				}
				elseif($flagDebug == 'PDF'){
					
					if ($_GET['watersource'] == "'gw'"){
						
						if (empty($results)){
							
							$use_cat_array = array("AGRICULTURE",
															"COMMERCIAL",
															"INDUSTRIAL",
															"IRRIGATION",
															"MINING",
															"FOSSIL-FUELED POWER",
															"GEOTHERMAL POWER",
															"HYDROELECTRIC POWER",
															"NUCLEAR ENERGY POWER",
															"WATER SUPPLIER");
							$county_nm = $validate->validate_countycd($_GET['countycd']);
							
							foreach ($use_cat_array as $use_cat){
								$results = array();
								foreach ($county_nm as $county){
									
									$results []= array ("mgal" => 0,
													"occurences" => 0,
													"use_cat" => $use_cat,
													"county_nm" => $county,
													"stream_nm"=> null,
													"aquifer" => $aquifer
													);
									
								}
							}
							
						//	$generate->alert("No data available...");
			
						$generate->toPDF($results,$the_decider,$year);	
						
						
							
						}else{
						
								$generate->toPDF($results,$the_decider,$year);	
						}
					
					}
					else{
						
						echo 'Surface Water Report Coming Soon...';
					}	
				}
				
				
			}else{//** $aquifer != all;
					
			
				if ($aquifer == "Deposits"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}
				elseif ($aquifer == "Sparta"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}
				elseif ($aquifer == "Cockfield"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}
				elseif ($aquifer == "Cane"){
					$aqprin_aquiferuifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Wilcox"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Clayton"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Nacatoch"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Tokio"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Rocks"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Rocks"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Trinity"){
					$prin_aquifer= $validate-> validate_aquifer($aquifer);
				}elseif ($aquifer == "Others/Unknown"){
					$prin_aquifer= $validate-> validate_aquifer("Unknown");
				}
				//** if the county is empty it will show table with zeroes instead of not displaying it **?
				
				
				/*$counties = explode(",",$_GET['countycd']);
				$toMergeResults = array();
				foreach ($counties as $county_cd){
					//$county = $validate->conditions($county_cd,"station.county_cd");
				}*/
					$county = $sql->conditions($_GET['countycd'],'station.county_cd');
				
					$whereConditionsSQL = $county.$huc.$water_source.$prin_aquifer.$wyear;
					
					$results = $sql->select($maintable, $whereConditionsSQL, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy,$aquifer);
			
			
				if ($flagDebug == '1'){
					echo json_encode($results);
				}elseif($flagDebug == 'CSV'){
					$generate->toCSV($results,false,$the_decider,$year,$ws);
				}elseif($flagDebug == 'PDF'){
					
					if ($_GET['watersource'] == "'gw'"){
						
						if (empty($results)){
							
							$use_cat_array = array("AGRICULTURE",
															"COMMERCIAL",
															"INDUSTRIAL",
															"IRRIGATION",
															"MINING",
															"FOSSIL-FUELED POWER",
															"GEOTHERMAL POWER",
															"HYDROELECTRIC POWER",
															"NUCLEAR ENERGY POWER",
															"WATER SUPPLIER");
							$county_nm = $validate->validate_countycd($_GET['countycd']);
							
							foreach ($use_cat_array as $use_cat){
								$results = array();
								foreach ($county_nm as $county){
									
									$results []= array ("mgal" => 0,
													"occurences" => 0,
													"use_cat" => $use_cat,
													"county_nm" => $county,
													"stream_nm"=> null,
													"aquifer" => $aquifer
													);
									
								}
							}
							
							$generate->toPDF($results,$the_decider,$year);	
						}else{
							
						
							$generate->toPDF($results,$the_decider,$year);	
						}
					
					}
					else{
						echo 'Surface Water Report Coming Soon...';
					}
					
				}
			}
	
		}

		
	}	
		
		

	

?>