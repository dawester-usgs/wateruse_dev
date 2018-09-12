<?php 
header("Content-type:application/json");
include ("../includes/config.php"); 

	$validate = new validate();
	$sql = new sql();
	$debug = new debug();
	$generate = new reports();
	$maintable = "exdata";
	$county_cd = $_GET['countycd'];
	$year = $_GET['year'];
	$huc = $_GET['huc'];
	$water_source = $_GET['watersource'];
	$stream_nm = $_GET['streamnm'];
	$aquifer = $_GET['aquifer'];
	$the_decider = $_GET['p'];
	$flag = $_GET['q'];
	$flagDebug = $debug->isDebug($flag);
		

	$filetype = $_GET['filetype'];
	if ($no_direct_access == true){
		echo "shooo go away! :)";
	}else{
		
		$prin_aquifer = $validate->validate_aquifer($aquifer); 
		$county_cd = $sql->conditions($county_cd,'station.county_cd-agg');
		$huc = $sql->conditions($huc,'huc');
		$water_source = $sql->conditions(strtoupper($water_source),'station.source_cd');
		$stream_nm = $sql->conditions($stream_nm,'station.stream_nm');
		$wyear = $sql->conditions($year, 'wyear-agg');
		// $wyearSWReports = $sql->conditions($year, 'wyear-agg-sw');
		
		
		if ($the_decider == "crops"){
			//$flagDebug = "1";
			$joinsic_cds = $sql->join("sic_codes","INNER","exdata.crop_cd");
			
			$joinstation = $sql->join("station","INNER","station.mpid");
			$joinSQL = $joinstation.' '.$joinsic_cds;
			// if ($county_cd ){
				// $wyear = $wyear. "AND";
			// }
			
		
			$whereConditionsSQL =$county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
			$rows = strtoupper(" CROP_CD, SIC_NM, COUNT(CROP_CD) as occurence,
								SUM(ACRES_IRR) as sum_acres, SUM(APP_RATE) sum_apprate, 
								(SUM(APP_RATE) / COUNT(CROP_CD)) as average, MIN(APP_RATE) as min_r, MAX(APP_RATE) as max_r, SUM(TOT_AMOUNT) as total_amt, 
								PERCENTILE_DISC(0.75) WITHIN GROUP (ORDER BY APP_RATE DESC) as twentyfifth ,
								PERCENTILE_DISC(0.5) WITHIN GROUP (ORDER BY APP_RATE DESC) as fiftieth,
								PERCENTILE_DISC(0.25) WITHIN GROUP (ORDER BY APP_RATE DESC) as seventyfifth,
								VARIANCE (APP_RATE) as variance_r,  STDDEV(APP_RATE) as stddev_r");
			$groupBy = "GROUP BY CROP_CD, SIC_NM";		
			$the_decider = "1FRCROPS";
		}
		elseif ($the_decider == 'monthly'){
			//$flagDebug = "1";
			$joinsic_cds = $sql->join("sic_codes","INNER","exdata.crop_cd");
			$joinstation = $sql->join("station","INNER","station.mpid");
			$joinann_data = $sql->join("ann_data","INNER","exdata.mpid");
			$joinSQL = $joinstation.' '.$joinsic_cds.' '.$joinann_data;
			// if ($county_cd ){
				// $wyear = $wyear. "AND";
			// }
			
			$joinWhereSQL = "exdata.wyear = ann_data.wyear AND
							";
							
		
			$whereConditionsSQL =$county_cd.$huc.$water_source.$stream_nm.$prin_aquifer.$wyear;
			$rows = strtoupper(" CROP_CD, SIC_NM, COUNT(CROP_CD) as occurence,
								SUM(ACRES_IRR) as sum_acres,  SUM(TOT_AMOUNT) as total_amt,
								sum(jan) as jan, sum(feb) as feb, sum(mar) as mar,
								sum(apr) as apr, sum(may) as may, 
								sum (jun) as jun, sum (jul) as jul, 
								sum(aug) as aug, sum(sep) as sept, 
								sum(oct) as oct, sum(nov) as nov, 
								sum(dec) as dec");
			$groupBy = "GROUP BY CROP_CD, SIC_NM";			
			$the_decider = "1FRMONTH";
			
		}elseif ($the_decider == 'surfacewater'){ ## surface water report ##
	
			$maintable = "station";
			//$flagDebug = "1";
			$rows = strtoupper(" DISTINCT(STATION.STREAM_NM) as stream_nm, 
								COUNT(STATION.MPID) as occurences, 
								SUM (ann_data.ann_amt) as ann_amt");
			$joinstation = $sql->join("station-ann_data","INNER","station.mpid");
			$joinSQL = $joinstation.' '.$joinsic_cds.' '.$joinann_data;
			if ($county_cd){
				$county_cd = 'AND '.$county_cd;
			}
		
			$whereConditionsSQL =$county_cd.$huc.$stream_nm.$prin_aquifer.$wyearSWReports;				
			$joinWhereSQL = " STATION.SOURCE_CD IN ('SW') AND ANN_DATA.USE_CD IN ('','IR','AG') AND  STATION.STREAM_NM IN (SELECT DISTINCT WATER_SRC_NM FROM COUNTY_WATER_SRC) 
							AND ";
			$groupBy = "GROUP BY STATION.STREAM_NM";		
			$the_decider = "1FRSWREPORT";
		}
		
		$results = $sql->select($maintable, $whereConditionsSQL, $joinSQL,"default","default",$joinWhereSQL,$flagDebug,$the_decider,$rows,$groupBy);
		if ($filetype){
			$csvData  = array();
			if ($the_decider == '1FRSWREPORT'){
				foreach ($results as $val){
				
						$csvData [] = array ($val['stream_nm'],
										$val['occurences'],
										$val['ann_amt'],
										$val['computation'],
										"0",
										"0",
										"0",
										$val['occurences'],
										"0",
										$val['computation']);
				}
				if ($filetype == 'csv'){
					$generate->toCSV($csvData,false,$the_decider);
				}elseif ($filetype == 'PDF'){
					
					$generate->toPDF($csvData,$the_decider,$year);
					
				}else{
					$generate->toDoc($csvData,$the_decider,$year);
				}
			}elseif ($the_decider == '1FRCROPS'){
				foreach ($results as $val){
					$csvData [] = array ($val['sic_nm'],
										$val['occurences'],
										$val['sum_acres'],
										$val['average'],
										$val['min'],
										$val['twentyfifth'],
										$val['fiftieth'],
										$val['seventyfifth'],
										$val['max'],
										$val['variance'],
										$val['std_dev'],	
										$val['tot_amt']);
				}
				if ($filetype == 'csv'){
					$generate->toCSV($csvData,false,$the_decider);
				}elseif ($filetype == 'PDF'){
					$generate->toPDF($csvData,$the_decider,$year);	
				}else{
					$generate->toDoc($csvData,$the_decider,$year);
				}
			}elseif ($the_decider == '1FRMONTH'){
				foreach ($results as $val){
					$csvData [] = array ($val['sic_nm'],
										$val['occurences'],
										$val['sum_acres'],
										$val['jan'],
										$val['feb'],
										$val['mar'],
										$val['apr'],
										$val['may'],
										$val['jun'],
										$val['jul'],
										$val['aug'],	
										$val['sept'],	
										$val['oct'],	
										$val['nov'],	
										$val['dec'],	
										$val['tot_amt']);
				}
				if ($filetype == 'csv'){
					$generate->toCSV($csvData,false,$the_decider);
				}elseif ($filetype == 'PDF'){
					$generate->toPDF($csvData,$the_decider,$year);
				}else{
					$generate->toDoc($csvData,$the_decider,$year);
				}
			}
			//print_r ($csvData);
			
			
		}else{
			echo json_encode($results);
		}
		
		
	}
	
?>