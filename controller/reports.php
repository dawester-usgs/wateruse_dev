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
	$yearfrom = $_GET['yearfrom']; 
	$yearto = $_GET['yearto'];
	$huc = $_GET['huc'];
	$water_source = $_GET['watersource'];
	$stream_nm = $_GET['streamnm'];
	$use_cd = $_GET['use_cd'];
	$raw_use_cd = $_GET['use_cd'];
	$sic_cd = $_GET['sic_cd'];
	$raw_sic_cd = $_GET['sic_cd'];
	$aquifer = $_GET['aquifer'];
	$year = $yearfrom." AND ".$yearto;
	$flag = $_GET['q'];
	$the_decider = $_GET['p'];
	$private = 0;
	if (!$_SESSION){
		if ($the_decider == 'wuid'){
			$no_direct_access =true;
		}
	}
	
	if ($no_direct_access == true){
		echo "no direct access allowed. Please Login to Continue.";
	}else{
	

	/** INITIATE VARIABLES **/
	/** check USE_CD **/
	$flagDebug = $debug->isDebug($flag);
	
	// conditions(variable,table name.row);
		
			$raw_sic = $validate->validate_usecd($raw_sic_cd);
			// validate class->validate_aquifer function ('TO DO DATA');
			$prin_aquifer = $validate-> validate_aquifer($aquifer); 
			$county_cd = $sql->conditions($county_cd,'station.county_cd');
			$huc = $sql->conditions($huc,'huc');
			$water_source = $sql->conditions(strtoupper($water_source),'station.source_cd');
			$stream_nm = $sql->conditions($stream_nm,'station.stream_nm');
			$use_cd = $sql->conditions($use_cd, 'ann_data.use_cd');
			$wyear = $sql->conditions($year, 'wyear');
			
			$k = 1;
			
			if ($raw_use_cd != 'all' && $raw_sic_cd == 'all'){
					$raw_use_cat  = str_replace("'","",$raw_use_cd);
					$use_cd = explode (",",$raw_use_cat);
					$isAG = false;
					$isIR = false;
					foreach ($use_cd as $key => $raw_use_cd){
			
							if ($raw_use_cd == 'AG'){
								$isAG = true;
							}
							if ($raw_use_cd == 'IR'){
								$isIR = true;
							}
							if ($raw_use_cd == 'IN'){
								$isIN = true; // that's what i said *wink wink*
							}
							if ($raw_use_cd == 'CO'){
								$isCO = true;
							}
							if ($raw_use_cd == 'PF'){
								$isPF = true;
							}
							if ($raw_use_cd == 'PG'){
								$isPG = true;
							}
							if ($raw_use_cd == 'PH'){
								$isPH = true;
							}	
							if ($raw_use_cd == 'PN'){
								$isPN = true;
							}
							if ($raw_use_cd == 'MI'){
								$isMI = true;
							}
							if ($raw_use_cd == 'WS'){
								$isWS = true;
							}
					}
					
					###############################################################
					## EXDATA TABLE LEVEL GENERATE DATA FROM AGRI AND IRRIGATION ##
					###############################################################
					
					if ($isAG == true){
						
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata.wyear = ann_data.wyear
											AND ann_data.use_cd in ('AG')";
							
							//$sic_cd =  $sql->conditions($sic_cd,'crop_cd',$raw_sic_cd);
							$joinExdata = $sql->join("exdata","INNER");
							$joinSQL1 = $joinSQL." ".$joinExdata;
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							
							if ($k <= 2){
								
								$resultAG= $sql->select($maintable,$whereConditionsSQL,$joinSQL1,"default","default",$joinWhereSQL,$flagDebug,$private);
								// check if array is empty
								if(empty($resultAG)){
									//convert null, 0, or nonexisting $resultAG to an array
									$resultAG = (is_array($resultAG))?$resultAG:array($resultAG);
									$resultAG[] = array();
									$resultAG = array ("");
								}
								
							}
							
						
					} else{	
					
						$resultAG = (is_array($resultAG))?$resultAG:array($resultAG);
						$resultAG[] = array();
						$resultAG = array ("");
					}
					
					
					
					if ($isIR == true){
						
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata.wyear = ann_data.wyear
											AND ann_data.use_cd in ('IR')";
							
							//$sic_cd =  $sql->conditions($sic_cd,'crop_cd',$raw_sic_cd);
							$joinExIR = $sql->join("exdata","INNER");
							$joinSQL2 =$joinSQL.''.$joinExIR;
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							
							if ($k <= 2){
								$resultIR= $sql->select($maintable,$whereConditionsSQL,$joinSQL2,"default","default",$joinWhereSQL,$flagDebug,'0');
								if (empty($resultIR)){
								$resultIR = (is_array($resultIR))?$resultIR:array($resultIR);
								$resultIR[] = array();
								$resultIR = array ("");
								}
							}
							
					}else{	
					
						$resultIR = (is_array($resultIR))?$resultIR:array($resultIR);
						$resultIR[] = array();
						$resultIR = array ("");
					}
					print 'asd';
					#############################################################
					####################### END THIS ############################
					#############################################################
				
				
				
					######################################################################
					##### FACILITY TABLE LEVEL GENERATE DATA FROM IN,CO,POWERS,MI,WS #####
					######################################################################
					
					
					## INDUSTRIAL ##
					if ($isIN == true){
							
							$joinIndustrial1 = $sql->join("industrial","INNER");
							$joinIndustrial2 = $sql->join("sic_codes","INNER","industrial.sic_code");
							$joinFacility1 = $sql->join("facility","INNER");
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND industrial.wyear = ann_data.wyear
											AND ann_data.use_cd in ('IN')";
							
							$joinSQL4 = $joinSQLFacility.' '.$joinIndustrial1;
							$joinSQL4 .=' '.$joinIndustrial2;
						
							//$sic_cd =  $sql->conditions($sic_cd,'sic_code');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							if ($k == 1){
								$resultIN= $sql->select($maintable,$whereConditionsSQL,$joinSQL4,"default","default",$joinWhereSQL,$flagDebug,"0");
								// Check if array is empty
								if (empty($resultIN)){
									// convert null, 0, nonexisting $resultIN to an array 
									$resultIN = (is_array($resultIN))?$resultIN:array($resultIN);
									$resultIN[] = array();
									$resultIN = array ("");
								}
							}
							
							
					}else{	
					
						$resultIN = (is_array($resultIN))?$resultIN:array($resultIN);
						$resultIN[] = array();
						$resultIN = array ("");
					}
					## COMMERCIAL ##
					if ($isCO == true){
					
							if ($yearto < '2008'){
										
								$exdata_joinCommercial1 = $sql->join("sic_codes","INNER","commercial.sic_code");
								$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND commercial.wyear = ann_data.wyear
											AND ann_data.use_cd in ('CO')";
								$joinCommercial = $sql->join("commercial","INNER");
								
								$joinSQL5 = $joinSQLFacility.' '.$joinCommercial;
								$joinSQL5 .=' '.$exdata_joinCommercial1;
								$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
								$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
								if ($k == 1){
									$resultCO= $sql->select($maintable,$whereConditionsSQL,$joinSQL5,"default","default",$joinWhereSQL,$flagDebug,"0");
									if (empty($resultCO)){
									$resultCO = (is_array($resultCO))?$resultCO:array($resultCO);
									$resultCO[] = array();
									$resultCO = array ("");
									}
								}
							}else{
								$exdata_joinCommercial1a = $sql->join("sic_codes","INNER","commercial.sic_code");
								$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND commercial.wyear = ann_data.wyear
											AND ann_data.use_cd in ('CO')";
								$joinCommercial = $sql->join("commercial","INNER");
								
								$joinSQL5a = $joinSQLFacility.' '.$joinCommercial;
								$joinSQL5a .=' '.$exdata_joinCommercial1a;
								$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
								$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
								if ($k == 1){
									$resultCO= $sql->select($maintable,$whereConditionsSQL,$joinSQL5a,"default","default",$joinWhereSQL,$flagDebug,"0");
									if (empty($resultCO)){
									$resultCO = (is_array($resultCO))?$resultCO:array($resultCO);
									$resultCO[] = array();
									$resultCO = array ("");
									}
								}
								
								$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_commercial.wyear = ann_data.wyear
											";
								$joinCommercialEx = $sql->join("exdata_commercial","INNER");
								
								$joinSQL5b = $joinSQLFacility.' '.$joinCommercialEx;
								$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
								$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
								if ($k == 1){
									$resultCO2= $sql->select($maintable,$whereConditionsSQL,$joinSQL5b,"default","default",$joinWhereSQL,$flagDebug,"0");
									if (empty($resultCO2)){
									$resultCO2 = (is_array($resultCO2))?$resultCO2:array($resultCO2);
									$resultCO2[] = array();
									$resultCO2 = array ("");
									}
								}
								$resultCO = array_merge($resultCO,$resultCO2);
							}
							
					}else{	
					
						$resultCO = (is_array($resultCO))?$resultCO:array($resultCO);
						$resultCO[] = array();
						$resultCO = array ("");
					}
					
					
					## POWER -- FOSSIL ##
					if ($isPF == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							$joinSQL6 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL6 .=$joinIndustrial2.' '.$sic_cdsPower;
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PF') ";

							$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							if ($k < 5){
								$resultPF= $sql->select($maintable,$whereConditionsSQL,$joinSQL6,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPF)){
									$resultPF = (is_array($resultPF))?$resultPF:array($resultPF);
									$resultPF[] = array();
									$resultPF = array ("");
								}
							}
							
					}else{
						
							$resultPF = (is_array($resultPF))?$resultPF:array($resultPF);
							$resultPF[] = array();
							$resultPF = array ("");
							
					}
					
					## POWER -- GEOTHERMAL ##
					if ($isPG == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PG') ";
						
							$joinSQL7 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL7 .=$joinIndustrial2.' '.$sic_cdsPower;
							

							$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							if ($k < 5){
								$resultPG= $sql->select($maintable,$whereConditionsSQL,$joinSQL7,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPG)){
									$resultPG = (is_array($resultPG))?$resultPG:array($resultPG);
									$resultPG[] = array();
									$resultPG = array ("");
								}
							}
							
					}else{
							$resultPG = (is_array($resultPG))?$resultPG:array($resultPG);
							$resultPG[] = array();
							$resultPG = array ("");
					}
					## POWER -- HYDROELECTRIC ##
					if ($isPH == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PH') ";
						
							$joinSQL8 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL8.=$joinIndustrial2.' '.$sic_cdsPower;
							

							$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							if ($k < 5){
								$resultPH= $sql->select($maintable,$whereConditionsSQL,$joinSQL8,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPH)){
									$resultPH = (is_array($resultPH))?$resultPH:array($resultPH);
									$resultPH[] = array();
									$resultPH = array ("");
								}
							}
							
					}else{
							$resultPH = (is_array($resultPH))?$resultPH:array($resultPH);
							$resultPH[] = array();
							$resultPH = array ("");
					}
					## POWER -- NUCLEAR ##
					if ($isPN == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PN') ";
						
							$joinSQL9 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL9.=$joinIndustrial2.' '.$sic_cdsPower;
							

							$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							if ($k < 5){
								$resultPN = $sql->select($maintable,$whereConditionsSQL,$joinSQL8,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPN)){
									$resultPN = (is_array($resultPN))?$resultPN:array($resultPN);
									$resultPN[] = array();
									$resultPN = array ("");
								}
							}
							
					}else{
							$resultPN = (is_array($resultPN))?$resultPN:array($resultPN);
							$resultPN[] = array();
							$resultPN = array ("");
					}
					## MINING ##
					if ($isMI == true){
						
							$joinMining = $sql->join("mining","INNER");
						
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND mining.wyear = ann_data.wyear
											AND ann_data.use_cd in ('MI')";
							//$sic_cd =  $sql->conditions($sic_cd,'sic_cd');
							$sic_cdsMining = $sql->join("sic_codes","INNER","mining.sic_code");
							$joinSQL10 = $joinSQLFacility.' '.$joinMining;
							$joinSQL10 .=' '.$sic_cdsMining;
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							if ($k == 1){
								$resultMI= $sql->select($maintable,$whereConditionsSQL,$joinSQL10,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultMI)){
									$resultMI = (is_array($resultMI))?$resultMI:array($resultMI);
									$resultMI[] = array();
									$resultMI = array ("");
								}
							}
							
							
					}else{
						$resultMI = (is_array($resultMI))?$resultMI:array($resultMI);
						$resultMI[] = array();
						$resultMI = array ("");
					}
					
					## WATER SUPPLIER ##
					
					if ($isWS == true){
							$joinWSupply = $sql->join("wsupply","INNER");
							//$joinExdataWS = $sql->join("exdata","INNER");
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND wsupply.wyear = ann_data.wyear
											AND ann_data.use_cd in ('WS')";
							//$sic_cd =  $sql->conditions($sic_cd,'sic_code');
							
							$joinSQL11 = $joinSQLFacility.' '.$joinWSupply; //.$joinExdataWS;

							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
							if ($k == 1){
								if ($the_decider == 'wupd'){
									$private = '1FRGR';
								}else{
									$private = "0";
								}
								
								$resultWS= $sql->select($maintable,$whereConditionsSQL,$joinSQL11,"default","default",$joinWhereSQL,$flagDebug,$private);
								if (empty($resultWS)){
									$resultWS = (is_array($resultWS))?$resultWS:array($resultWS);
									$resultWS[] = array();
									$resultWS = array ("");
								}
							}
							
					}else{
						$resultWS = (is_array($resultWS))?$resultWS:array($resultWS);
						$resultWS[] = array();
						$resultWS = array ("");
					}
					###############
					### END THIS ##
					###############
					
					
					/* 
						THIS WILL MERGE ALL THE EXISTING ARRAYS FROM ABOVE INTO ONE SINGLE ARRAY
						
					*/
					$mergeResult1 = array_merge($resultAG,$resultIR,$resultIN,$resultCO,$resultPF,$resultPG,$resultPH,$resultPN,$resultMI,$resultWS);
					//print_r ($mergeResult1);
					if ($_GET['q'] == 'csv'){
						$generate->toCSV($mergeResult1);
					}else{
						echo "We only support CSV Downloads. Sorry";
					}
					
				
				
			}else{
				
				#########################
				##CROP SPECIFIC SEARCH ##
				#########################
				
					$raw_use_cat  = str_replace("'","",$raw_use_cd);
					$use_cd = explode (",",$raw_use_cat);
					$isAG = false;
					$isIR = false;
					
					foreach ($use_cd as $key => $raw_use_cd){
							
							if ($raw_use_cd == 'AG'){
								$isAG = true;
							}
							if ($raw_use_cd == 'IR'){
								$isIR = true;
							}
							if ($raw_use_cd == 'IN'){
								$isIN = true; // that's what i said *wink wink*
							}
							if ($raw_use_cd == 'CO'){
								$isCO = true;
							}
							if ($raw_use_cd == 'PF'){
								$isPF = true;
							}
							if ($raw_use_cd == 'PG'){
								$isPG = true;
							}
							if ($raw_use_cd == 'PH'){
								$isPH = true;
							}	
							if ($raw_use_cd == 'PN'){
								$isPN = true;
							}
							if ($raw_use_cd == 'MI'){
								$isMI = true;
							}
							if ($raw_use_cd == 'WS'){
								$isWS = true;
							}
							if ($raw_use_cd == 'all'){
								$isAll = true;
							}
					
					}
					
					##########################################################################
					## EXDATA TABLE LEVEL GENERATE DATA FROM AGRI AND IRRIGATION - SPECIFIC ##
					##########################################################################
					if ($isAG == true){
						
							
							$joinExdata = $sql->join("exdata","INNER");
							$joinSQL1 = $joinSQL." ".$joinExdata;
							$joinWhereSQL = "station.source_cd = ann_data.source_cd 
											AND exdata.wyear = ann_data.wyear 
											AND ann_data.use_cd in ('AG')";
							$exdataCropCD = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$exdataCropCD.$wyear;
							## for "rogue" data lol ##
							
							$joinIndustrial2 = $sql->join("sic_codes","INNER","industrial.sic_code");
							$joinSQL2 = $joinSQLFacilityAll;
							$joinWhereSQL2 = "station.source_cd = ann_data.source_cd 
											";
							if ($k <= 2){
								$resultAGRogue =  $sql->select($maintable,$whereConditionsSQL,$joinSQL2,"default","default",$joinWhereSQL2,$flagDebug,$private);
								$resultAG= $sql->select($maintable,$whereConditionsSQL,$joinSQL1,"default","default",$joinWhereSQL,$flagDebug,$private);
								// check if array is empty
								
								if(empty($resultAG)){
									//convert null, 0, or nonexisting $resultAG to an array
									$resultAG = (is_array($resultAG))?$resultAG:array($resultAG);
									$resultAG[] = array();
									$resultAG = array ("");
									$resultAG = $resultAGRogue;
								}else{
									if (empty($resultAGRogue)){
									$resultAGRogue = (is_array($resultAGRogue))?$resultAGRogue:array($resultAGRogue);
									$resultAGRogue[] = array();
									$resultAGRogue = array ("");
									}else{
										
										$resultAG = array_merge($resultAG,$resultAGRogue);
									}
								
									
								}
							
								
								
								
								
							}
							
							
					} else{	
					
						$resultAG = (is_array($resultAG))?$resultAG:array($resultAG);
						$resultAG[] = array();
						$resultAG = array ("");
						## for "rogue" data lol ##
						$resultFacility = (is_array($resultFacility))?$resultFacility:array($resultFacility);
						$resultFacility[] = array();
						$resultFacility = array ("");
					}
					
					
					
					if ($isIR == true){
						
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata.wyear = ann_data.wyear
											AND ann_data.use_cd in ('IR')";
							
							//$sic_cd =  $sql->conditions($sic_cd,'crop_cd',$raw_sic_cd);
							$joinExIR = $sql->join("exdata","INNER");
							$exdataCropCD = $sql->conditions($sic_cd, 'sic_cd');
							$joinSQL2 =$joinSQL.''.$joinExIR;
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$exdataCropCD.$wyear;
							
							if ($k <= 2){
								$resultIR= $sql->select($maintable,$whereConditionsSQL,$joinSQL2,"default","default",$joinWhereSQL,$flagDebug,$private);
								if (empty($resultIR)){
								$resultIR = (is_array($resultIR))?$resultIR:array($resultIR);
								$resultIR[] = array();
								$resultIR = array ("");
								}
							}
							
					}else{	
					
						$resultIR = (is_array($resultIR))?$resultIR:array($resultIR);
						$resultIR[] = array();
						$resultIR = array ("");
					}
					
					#############################################################
					####################### END THIS ############################
					#############################################################
					
					
					#################################################################################
					##### FACILITY TABLE LEVEL GENERATE DATA FROM IN,CO,POWERS,MI,WS - SPECIFIC #####
					#################################################################################
					
					
					## SPECIFIC -- INDUSTRIAL ##
					if ($isIN == true){
							
							$joinIndustrial1 = $sql->join("industrial","INNER");
							$joinIndustrial2 = $sql->join("sic_codes","INNER","industrial.sic_code");
							$joinFacility1 = $sql->join("facility","INNER");
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND industrial.wyear = ann_data.wyear
											AND ann_data.use_cd in ('IN')";
						
							$joinSQL4 = $joinSQLFacility.' '.$joinIndustrial1;
							$joinSQL4 .=' '.$joinIndustrial2;
							$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
						
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
							if ($k == 1){
								$resultIN= $sql->select($maintable,$whereConditionsSQL,$joinSQL4,"default","default",$joinWhereSQL,$flagDebug,"0");
								// Check if array is empty
								if (empty($resultIN)){
									// convert null, 0, nonexisting $resultIN to an array 
									$resultIN = (is_array($resultIN))?$resultIN:array($resultIN);
									$resultIN[] = array();
									$resultIN = array ("");
								}
							}
							
							
					}else{	
					
						$resultIN = (is_array($resultIN))?$resultIN:array($resultIN);
						$resultIN[] = array();
						$resultIN = array ("");
					}
					## SPECIFIC -- COMMERCIAL ##
					if ($isCO == true){
							 
							//$joinCommercial = $sql->join("exdata_commercial","FULL","exdata_commercial.sic_code");
							if ($yearto < '2008'){
								$exdata_joinCommercial1 = $sql->join("sic_codes","INNER","commercial.sic_code");
								$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND commercial.wyear = ann_data.wyear
											AND ann_data.use_cd in ('CO')";
								$joinCommercial = $sql->join("commercial","INNER");
								
								$joinSQL5 = $joinSQLFacility.' '.$joinCommercial;
								$joinSQL5 .=' '.$exdata_joinCommercial1;
								$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
								$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
								if ($k == 1){
									$resultCO= $sql->select($maintable,$whereConditionsSQL,$joinSQL5,"default","default",$joinWhereSQL,$flagDebug,"0");
									if (empty($resultCO)){
									$resultCO = (is_array($resultCO))?$resultCO:array($resultCO);
									$resultCO[] = array();
									$resultCO = array ("");
									}
								}
							}else{
								$exdata_joinCommercial1 = $sql->join("sic_codes","INNER","commercial.sic_code");
								$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND commercial.wyear = ann_data.wyear
											AND ann_data.use_cd in ('CO')";
								$joinCommercial = $sql->join("commercial","INNER");
								
								$joinSQL5a = $joinSQLFacility.' '.$joinCommercial;
								$sic_cd =  $sql->conditions($sic_cd,'sic_code',$raw_sic_cd);
								$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
								if ($k == 1){
									$resultCO= $sql->select($maintable,$whereConditionsSQL,$joinSQL5a,"default","default",$joinWhereSQL,$flagDebug,"0");
									if (empty($resultCO)){
									$resultCO = (is_array($resultCO))?$resultCO:array($resultCO);
									$resultCO[] = array();
									$resultCO = array ("");
									}
								}
								
								$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_commercial.wyear = ann_data.wyear
											";
								$joinCommercialEx = $sql->join("exdata_commercial","INNER");
								
								$joinSQL5b = $joinSQLFacility.' '.$joinCommercialEx;
								$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
								$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
								if ($k == 1){
									$resultCO2= $sql->select($maintable,$whereConditionsSQL,$joinSQL5b,"default","default",$joinWhereSQL,$flagDebug,"0");
									if (empty($resultCO2)){
									$resultCO2 = (is_array($resultCO2))?$resultCO2:array($resultCO2);
									$resultCO2[] = array();
									$resultCO2 = array ("");
									}
								}
								$resultCO = array_merge($resultCO,$resultCO2);
							}
							
					}else{	
					
						$resultCO = (is_array($resultCO))?$resultCO:array($resultCO);
						$resultCO[] = array();
						$resultCO = array ("");
					}
					
					
					## SPECIFIC POWER -- FOSSIL ##
					if ($isPF == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							$joinSQL6 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL6 .=$joinIndustrial2.' '.$sic_cdsPower;
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PF') ";

							$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
							if ($k < 5){
								$resultPF= $sql->select($maintable,$whereConditionsSQL,$joinSQL6,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPF)){
									$resultPF = (is_array($resultPF))?$resultPF:array($resultPF);
									$resultPF[] = array();
									$resultPF = array ("");
								}
							}
							
					}else{
						
							$resultPF = (is_array($resultPF))?$resultPF:array($resultPF);
							$resultPF[] = array();
							$resultPF = array ("");
							
					}
					
					## SPECIFIC  POWER -- GEOTHERMAL ##
					if ($isPG == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PG') ";
						
							$joinSQL7 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL7 .=$joinIndustrial2.' '.$sic_cdsPower;
							

							$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
							if ($k < 5){
								$resultPG= $sql->select($maintable,$whereConditionsSQL,$joinSQL7,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPG)){
									$resultPG = (is_array($resultPG))?$resultPG:array($resultPG);
									$resultPG[] = array();
									$resultPG = array ("");
								}
							}
							
					}else{
							$resultPG = (is_array($resultPG))?$resultPG:array($resultPG);
							$resultPG[] = array();
							$resultPG = array ("");
					}
					## SPECIFIC  POWER -- HYDROELECTRIC ##
					if ($isPH == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PH') ";
						
							$joinSQL8 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL8.=$joinIndustrial2.' '.$sic_cdsPower;
							

						$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
							if ($k < 5){
								$resultPH= $sql->select($maintable,$whereConditionsSQL,$joinSQL8,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPH)){
									$resultPH = (is_array($resultPH))?$resultPH:array($resultPH);
									$resultPH[] = array();
									$resultPH = array ("");
								}
							}
							
					}else{
							$resultPH = (is_array($resultPH))?$resultPH:array($resultPH);
							$resultPH[] = array();
							$resultPH = array ("");
					}
					## SPECIFIC -- NUCLEAR ##
					if ($isPN == true){
							$sic_cdsPower = $sql->join("sic_codes","INNER","power.sic_code");
							$joinExdata = $sql->join("power","INNER");
							$joinIndustrial2 = $sql->join("exdata_power","INNER","exdata_power.sic_code");
							
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND exdata_power.wyear = ann_data.wyear
											AND ann_data.use_cd IN ('PN') ";
						
							$joinSQL9 = $joinSQLFacility.' '.$joinExdata;
							$joinSQL9.=$joinIndustrial2.' '.$sic_cdsPower;
							

							$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
							if ($k < 5){
								$resultPN = $sql->select($maintable,$whereConditionsSQL,$joinSQL8,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultPN)){
									$resultPN = (is_array($resultPN))?$resultPN:array($resultPN);
									$resultPN[] = array();
									$resultPN = array ("");
								}
							}
							
					}else{
							$resultPN = (is_array($resultPN))?$resultPN:array($resultPN);
							$resultPN[] = array();
							$resultPN = array ("");
					}
					## SPECIFIC MINING ##
					if ($isMI == true){
						
							$joinMining = $sql->join("mining","INNER");
						
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND mining.wyear = ann_data.wyear
											AND ann_data.use_cd in ('MI')";
							//$sic_cd =  $sql->conditions($sic_cd,'sic_cd');
							$sic_cdsMining = $sql->join("sic_codes","INNER","mining.sic_code");
							$joinSQL10 = $joinSQLFacility.' '.$joinMining;
							$joinSQL10 .=' '.$sic_cdsMining;
							$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
							if ($k == 1){
								$resultMI= $sql->select($maintable,$whereConditionsSQL,$joinSQL10,"default","default",$joinWhereSQL,$flagDebug,"0");
								if (empty($resultMI)){
									$resultMI = (is_array($resultMI))?$resultMI:array($resultMI);
									$resultMI[] = array();
									$resultMI = array ("");
								}
							}
							
							
					}else{
						$resultMI = (is_array($resultMI))?$resultMI:array($resultMI);
						$resultMI[] = array();
						$resultMI = array ("");
					}
					
					## SPECIFIC WATER SUPPLIER ##
					if ($isWS == true){
							$joinWSupply = $sql->join("wsupply","INNER");
							//$joinExdataWS = $sql->join("exdata","INNER");
							$joinWhereSQL = "station.source_cd = ann_data.source_cd
											AND wsupply.wyear = ann_data.wyear
											AND ann_data.use_cd in ('WS')";
							//$sic_cd =  $sql->conditions($sic_cd,'sic_code');
							
							$joinSQL11 = $joinSQLFacility.' '.$joinWSupply; //.$joinExdataWS;
							$sic_cd = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$sic_cd.$wyear;
							if ($k == 1){
								if ($the_decider == 'wupd'){
									$private = '1FRGR';
								}else{
									$private = "0";
								}
								
								$resultWS= $sql->select($maintable,$whereConditionsSQL,$joinSQL11,"default","default",$joinWhereSQL,$flagDebug,$private);
								if (empty($resultWS)){
									$resultWS = (is_array($resultWS))?$resultWS:array($resultWS);
									$resultWS[] = array();
									$resultWS = array ("");
								}
							}
							
					}else{
						$resultWS = (is_array($resultWS))?$resultWS:array($resultWS);
						$resultWS[] = array();
						$resultWS = array ("");
					}
					
					if ($isAll == true){
						
							$joinExdata = $sql->join("exdata","INNER");
							$joinIndustrial2 = $sql->join("sic_codes","INNER","industrial.sic_code");
							$joinSQL1 = $joinSQL." ".$joinExdata;
							$joinSQL2 = $joinSQLFacilityAll;
							$joinWhereSQL1 = "station.source_cd = ann_data.source_cd 
											AND exdata.wyear = ann_data.wyear 
											";
							$joinWhereSQL2 = "station.source_cd = ann_data.source_cd 
											";
							$exdataCropCD = $sql->conditions($sic_cd, 'sic_cd');
							$whereConditionsSQL = $county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$exdataCropCD.$wyear;
							
							if ($k <= 2){
								
								$resultCrops= $sql->select($maintable,$whereConditionsSQL,$joinSQL1,"default","default",$joinWhereSQL1,$flagDebug,$private);
								$resultFacility =  $sql->select($maintable,$whereConditionsSQL,$joinSQL2,"default","default",$joinWhereSQL2,$flagDebug,$private);
								// check if array is empty
								if(empty($resultCrops)){
									//convert null, 0, or nonexisting $resultAG to an array
									$resultCrops = (is_array($resultCrops))?$resultCrops:array($resultCrops);
									$resultCrops[] = array();
									$resultCrops = array ("");
								}
								if (empty($resultFacility)){
									$resultFacility = (is_array($resultFacility))?$resultFacility:array($resultFacility);
									$resultFacility[] = array();
									$resultFacility = array ("");
								}
								
							}
							
					}else{
							$resultCrops = (is_array($resultCrops))?$resultCrops:array($resultCrops);
							$resultCrops[] = array();
							$resultCrops = array ("");
							$resultFacility = (is_array($resultFacility))?$resultFacility:array($resultFacility);
							$resultFacility[] = array();
							$resultFacility = array ("");
					}
					###############
					### END THIS ##
					###############
				if  ($isAll == true){
					$mergeResultsALL = array_merge($resultCrops,$resultFacility);
				
					if ($_GET['q'] == 'csv'){
						$generate->toCSV($mergeResultsALL);
					}else{
						echo "We only support CSV Downloads. Sorry";
					}
					
				}else{
					$mergeResults2 = array_merge ($resultAG,$resultIR,$resultIN,$resultCO,$resultPF,$resultPG,$resultPH,$resultPN,$resultMI,$resultWS);
					if ($_GET['q'] == 'csv'){
						$generate->toCSV($mergeResults2);
					}else{
						echo "We only support CSV Downloads. Sorry";
					}
					
					
				}
				
				
				
			
			}
			
	}	
		
		

	

?>