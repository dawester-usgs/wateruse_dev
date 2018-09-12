<?php 
################################################################################
########################## 	THIS IS A CONFIG FILE ######################################
######################## SHARED BY WATERUSE AND WELLS #################################
###############################################################################
########################## I LOVE YOU MEH BABY :* #####################################

ini_set('max_execution_time','0');
ini_set('memory_limit', '-1');
set_time_limit(0);
session_start();

## PREPARE THE FALSE TOKEN ##
$token = bin2hex(mcrypt_create_iv(64, MCRYPT_DEV_RANDOM));
define('BASE_PATH', TRUE);
define('LOGIN', $_SESSION['USER_ID']);

if(!defined('LOGIN')) {

		echo '<script> window.location.href ="https://wise.er.usgs.gov/"+$dir+"/forbidden"; </script>';
 
}

$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
require ('fpdf/html_table.php');

$isDev = true;

$dir = $isDev == true ? $dir = "wateruse_dev" : $dir = "wateruse";

$disable =0;
	if ($disable  == 1){
		if( $_SERVER['REQUEST_URI'] == '/wateruse/wells/'){
			if ($_SESSION['USER_ID'] != 'alexe'){
			header("location:https://wise.er.usgs.gov/wateruse/undermaintenance.php");
			}	
			
		}
	}
	
	
ERROR_REPORTING(~E_ALL);
$wateruseheader = "	In 1977, the Congress of the United States recognized the need for uniform,
					current, and reliable information on water use and directed the U.S. Geological Survey (USGS)
					to establish a National Water-Use Information Program (NWUIP) to complement the Survey's data
					on the availability and quality of the Nations water resources. Since 1985 site-specific water-use 
					data for several categories have been collected and compiled annually by the Arkansas Natural Resources 
					Commission (ANRC) in cooperation with the USGS.Data for the irrigation and livestock ( animal specialties )
					categories are reported through the Conservation District Offices in each county. Site-specific water-use 
					data for public supply, commercial, industrial, mining, power generation, irrigation and livestock 
					( stock and animal specialties ) are stored in the USGS Arkansas Water Science Center's Water-Use Data Base
					System (WUDBS). Water-use data for domestic (self-supplied) and livestock (stock) are not required to report
					to ANRC. In some categories it is necessary to supplement these data from other sources. These sources include
					public agencies, industries, public utilities, other organizations, and individuals. Estimates are made by the USGS
					based on population and average consumptive-use rates for categories where data are either incomplete or are not required
					to report. Water-use data for several categories are aggregated by county, 4 and 8 digit hydrologic unit, and by aquifer and stored in the Aggregated Water-Use Data System (AWUDS).";

					
/* //not working. it should work >:( //					
class db{
	private $db_user = "wudba";
	private $db_pwd = "G00dy2shus";
	private $db_con = "wudb";
	private $exec_mode;
	
		function dbcon($db_user, $db_pwd, $db_con, $exec_mode= OCI_COMMIT_ON_SUCCESS)
            {
                $this->db_user = $db_user;
                $this->db_pwd = $db_pwd;
                $this->db_con = $db_con;
               // $this->exec_mode = $exec_mode;
                $this->GetConn();
            }
            function GetConn()
            {
				
                if(!$this->conn = OCILogon($this->db_user, $this->db_pwd, $this->db_con))
                    {
                        $err = OCIError();
                        trigger_error('Failed to establish a connection: ' .
                                                            $err['message']);
                    }else{
						$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
						
					}
            }
	
}*/	
		###### and so, Alexe the Creator created the joinSQL, joinSQLFacility, joinSQLFacilityAll entities and this is where the Wateruse Universe emerges from nothingness ######
			/*$joinSQL = "INNER JOIN ann_data on station.mpid = ann_data.mpid 
								INNER JOIN diverter on station.diverter_id = diverter.diverter_id 
								INNER JOIN owner on station.owner_id = owner.owner_id
								INNER JOIN county on station.county_cd =  county.county_cd 
								INNER JOIN use_type on ann_data.use_cd = use_type.use_cd
								INNER JOIN sic_codes on ann_data.use_cd = sic_codes.use_cd
										";*/
			$joinSQL = "INNER JOIN ann_data on station.mpid = ann_data.mpid 
								INNER JOIN diverter on station.diverter_id = diverter.diverter_id 
								INNER JOIN owner on station.owner_id = owner.owner_id
								INNER JOIN county on station.county_cd =  county.county_cd 
								INNER JOIN use_type on ann_data.use_cd = use_type.use_cd
								INNER JOIN sic_codes on exdata.crop_cd = sic_codes.sic_cd ";
								
			$joinSQLFacility = "inner join ann_data on station.mpid = ann_data.mpid 
									inner join diverter on station.diverter_id = diverter.diverter_id 
									inner join owner on station.owner_id = owner.owner_id 
									inner join use_type on ann_data.use_cd = use_type.use_cd 
									inner join county on station.county_cd =  county.county_cd
									inner join facility on station.diverter_id = facility.diverter_id
									";
						
			$joinSQLFacilityAll = 	"inner join ann_data on station.mpid = ann_data.mpid 
									inner join diverter on station.diverter_id = diverter.diverter_id 
									inner join owner on station.owner_id = owner.owner_id 
									inner join use_type on ann_data.use_cd = use_type.use_cd 
									inner join county on station.county_cd =  county.county_cd
									inner join facility on station.diverter_id = facility.diverter_id
									inner join sic_codes on ann_data.use_cd = sic_codes.use_cd		
									";			

class bootstrap_ui {
	
	function allow_bootstrap(){
		return '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
			integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
			 ';
	}
	
}			
class encrypt {
	function cipherpwd($data) {
	## ANTI SQL INJECTION ##
	$data = str_replace("\"", "\\\"", $data); 
	## simple encryption ##
	$data = md5($data);
	return $data;
	}
	
} 
		##############################################################################
class reports {

	function toCSV($arr = null,$isLargeFile,$the_decider,$y){
	
	
		if (empty($arr)){
			print "ERROR: the Array is Empty";
		
			
		}else{
			
			if ($isLargeFile == false){
				$lefilename = round(microtime(true));
				$file = fopen('php://output','rw');
				ob_start();
				// print the header
				
				try {
					
					
					if ($the_decider == '1FRSWREPORT'){
						$headers = "Water Source,Agriculture SW Meas. Point,Agriculture SW Ac. Ft. /Yr,Agriculture SW M. Gal/D,Mun & Ind. Meas. Pt,Mun & Ind. Meas. Ac. Ft. /Yr.,Mun & Ind. Meas. M. Gal. /D.,SW Total Meas Pt.,SW Total Ac. Ft. /Yr.,SW Total M. Gal./D.\n";
					}elseif ($the_decider == '1FRCROPS'){
						$headers ="Crop Name,Number of Reported Applications,Summation of Acres,Average,Minimum,25th Percentile,50th Percentile,75th Percentile,Maximum,Variances,Standard Deviation,Total Applied (Acres-Free)\n";
					}elseif ($the_decider == '1FRMONTH'){
						$headers ="Crop Name,Number of Reported Applications,Summation of Acres,Januray,February,March,April,May,June,July,August,September,October,November,December,Total Applied (Acres-Free)\n";
					}elseif ($the_decider == '1FRWELLS'){
						$headers = $y ."  Reported Withdrawals of Groundwater from Registered Wells by Aquifer County and Use Type for Arkansas\n";
						$headers .= "[Mgal/d million gallons per day West withdrawals from part of County west of Crowleys Ridge East withdrawals from part of County east of Crowleys Ridge]\n\n";
						
							if ($_GET['watersource'] == "'sw'"){
								$headers .= "County Name, Use Category/Type, # of Wells, Mgal/d. ,Stream Name,Huc\n\n";
							}else{
								$headers .= "County Name, Use Category/Type, # of Wells, Mgal/d. ,Aquifer\n\n";
							}
						
					}else{
						
						$headers = "County,County ID,Year,Huc,Water Source,MPID,Longitude,Latitude,Local Description,Stream Name,Use Type,Crop Type,Aquifer,January,February,March,April,May,June,July,August,September,October,November,December,Aggregate,Diverter ID,Owner ID, Facility ID,Rec_waste,Sub Type,Quadno,Opnum,Perm_agency,well_no,pump_hp,power_tp,div_meth,pipe_diam,well_depth,date_drilled,driller_nm,quad1,quad2,section,range,tract,mstamp,method,restrictions,salinity,treatment,irr_meth,who,paid,entered_units,min_oid,next_oid,min_did,next_did,min_fid,next_fid,max_fid\n";
					
					}
					
					#write headers
					fwrite($file,$headers);	
				
					
					$i = 1;
					
	

					$csvResult = [];
					asort($arr);
					foreach($arr as $list){
						
					
						/*array_walk_recursive($list, function($item) use (&$csvResult) {
								$csvResult[] = $item;
						  });*/
						
						// print the contents
					
					
						
						//fputcsv($file,$list);
						if ($the_decider == '1FRWELLS'){
							$numwells =0;
						
							$use_cat = $list['use_cat'];
							$county_nm =$list['county_nm'];
							$occurences = $list['occurences'];
							if ($_GET['watersource'] == "'sw'"){
								$s = $list['stream_nm'].','.$list['huc'];
							}else{
								$s = $list['aquifer'];
							}
							
							
							$mgal = $list['mgal'];

									if ($use_cat == 'AGRICULTURE'){
										$occurencesAG = $occurences;
										
										
									}elseif ($use_cat =='IRRIGATION'){
										$occurencesIR = $occurences;
									}
									
								
							
							
									if ($use_cat == 'AGRICULTURE' || $use_cat =='IRRIGATION'){
										
											//$use_cat = 'Agriculture/Irrigation';
											$occurencesx = $occurencesAG + $occurencesIR;
											
										if ($use_cat !='AGRICULTURE'){
												$a = $county_nm.",Agriculture/Irrigation,".$occurencesx.",".$mgal.",".$s."\n";
												if (!empty($county_nm) && !empty($use_cat) && !empty($occurences) && !empty($mgal) && !empty($s)){
							
												fwrite($file,$a);	
								
											}
										}
										
								
									
									}else{
										
										$a = $county_nm.",".$use_cat.",".$occurences.",".$mgal.",".$s."\n";
										if (!empty($county_nm) && !empty($use_cat) && !empty($occurences) && !empty($mgal) && !empty($s)){
									
											fwrite($file,$a);	
								
										}
							
									}
									
						
							
							
						}else{
							fputcsv($file,$list);
							
						}
						
						
						
						$i++;
					}
					
					
					if ($the_decider == '1FRWELLS'){
						
					}
					$string = ob_get_clean();
					
					
					header("Pragma: public");
					header("Expires: 0");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header("Cache-Control: private",false);
					header("Content-Type: application/octet-stream");
					header("Content-Disposition: attachment; filename=".$lefilename.".csv");
					header("Content-Transfer-Encoding: binary");
					exit($string); 
					fclose($filename); 
				}
				catch (Exception $e){
					echo "Unable to Download file". $e;
				}
				
			
			}else{
				
				//echo 'save the file and download it';
				$lefilename = round(microtime(true));
				$file = fopen('php://output','w');
				ob_start();
				// print the header
				
				try {
					$headers = "County,County ID,Year,Huc,Water Source,MPID,Longitude,Latitude,Local Description,Stream Name,Use Type,Crop Type,Aquifer,January,February,March,April,May,June,July,August,September,October,November,December,Aggregate,Diverter ID,Diverter Name,Owner ID,Owner Name, Facility ID,Facility Name,Rec_waste,Sub Type,Quadno,Opnum,Perm_agency,well_no,pump_hp,power_tp,div_meth,pipe_diam,well_depth,date_drilled,driller_nm,quad1,quad2,section,range,tract,mstamp,method,restrictions,salinity,treatment,irr_meth,who,paid,entered_units,min_oid,next_oid,min_did,next_did,min_fid,next_fid,max_fid\n";
					fwrite($file,$headers);		
					
					foreach($arr as $key => $list){
						$csvResult = [];
						/*array_walk_recursive($list, function($item) use (&$csvResult) {
								$csvResult[] = $item;
						  });
						*/
						fputcsv($file,$list);	
					}
					
					$string = ob_get_clean();
					
					header("Pragma: public");
					header("Expires: 0");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header("Cache-Control: private",false);
					header("Content-Type: application/octet-stream");
					header("Content-Disposition: attachment; filename=".$lefilename.".csv");
					header("Content-Transfer-Encoding: binary");
					exit($string);
					fclose($filename); 
				}
				catch (Exception $e){
					echo "Unable to Download file". $e;
				}
				
			}
			
		}
	
	}
	function toPDF($arr,$the_decider,$year){
		## STATIC HEADERS ONLY ##
	
		
		if ($the_decider == '1FRCROPS'){
			$pdf=new PDF('P','mm',array(475,320));
			
			$pdf->AddPage('L');
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetTitle('Crop Statistics Report for '.$year);
			$pdf->SetSubject('Crop Statistics Report');
			
			##meta header##
			$pdf->SetFont('Arial','',15);
			$pdf->SetKeywords('crops,statistics, PDF, wateruse, aggregate, USGS');
			$pdf->Cell(0, 30, 'Crop Statistics Report for '.$year, 0, false, 'C', 0, '', 0, false, 'T', 'M' );
			$pdf->SetFont('Arial','',12);
			$html .='<table nobr="true" border="1">
				<br><br><br><br><br><br><br><br><tr>
				<td width=375 height=100>Crops</td>
				<td width=250 height=100 rowspan=3>Number of Application Reported</td>
				<td width=150 height=100>Summation Acres</td>
				<td width=85 height=100>Average</td>
				<td width=85 height=100>Minimum</td>
				<td width=125 height=100>25 Percentile</td>
				<td width=125 height=100>50th Percentile</td>
				<td width=125 height=100>75th Percentile</td>
				<td width=85 height=100>Maximum</td>
				<td width=85 height=100>Variance</td>
				<td width=155 height=100>Standard Deviation</td>
				<td width=150 height=100>Total Acres-Free</td>
				</tr>'; 
		}elseif ($the_decider == '1FRMONTH'){
			$pdf=new PDF('P','mm',array(625,400));
			
			$pdf->AddPage('L');
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetTitle('Monthly Statistics Report for '.$year);
			$pdf->SetSubject('Monthly Statistics Report');
			$pdf->SetFont('Arial','',15);
			$pdf->SetKeywords('Montly,statistics, PDF, wateruse, aggregate, USGS');
			$pdf->Cell(0, 30, 'Crop Statistics Report for '.$year, 0, false, 'C', 0, '', 0, false, 'T', 'M' );
			$pdf->SetFont('Arial','',12);
			$html .='<table nobr="true" border="1">
				<br><br><br><br><br><br><br><br><tr>
				<td width=375 height=100>Crops</td>
				<td width=250 height=100 rowspan=3>Number of Application Reported</td>
				<td width=150 height=100>Summation Acres</td>
				<td width=85 height=100>January</td>
				<td width=85 height=100>February</td>
				<td width=125 height=100>March</td>
				<td width=125 height=100>April</td>
				<td width=125 height=100>May</td>
				<td width=85 height=100>June</td>
				<td width=85 height=100>July</td>
				<td width=155 height=100>August</td>
				<td width=150 height=100>September</td>
				<td width=150 height=100>October</td>
				<td width=150 height=100>November</td>
				<td width=150 height=100>December</td>
				<td width=150 height=100>Total Acres-Free</td>
				</tr>'; 
		}elseif ($the_decider == '1FRSWREPORT'){
			$pdf=new PDF('P','mm',array(625,400));
			
			$pdf->AddPage('L');
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetTitle('Surface Water Statistics Report for '.$year);
			$pdf->SetSubject('Crop Statistics Report');
			$pdf->SetFont('Arial','',15);
			$pdf->SetKeywords('surface water,statistics, PDF, wateruse, aggregate, USGS');
			$pdf->Cell(0, 30, 'Surface Water Statistics Report for  '.$year, 0, false, 'C', 0, '', 0, false, 'T', 'M' );
			$pdf->SetFont('Arial','',12);
			$html .='<table nobr="true" border="1">
				<br><br><br><br><br><br><br><br><tr>
				<td width=375 height=100>Water Source</td>
				<td width=250 height=100 rowspan=3>Agriculture SW Meas. Pts.</td>
				<td width=200 height=100>Agriculture Ac.Ft./ Yr.</td>
				<td width=200 height=100>Agriculture M. Gal./D.</td>
				<td width=200 height=100>Mun & Ind. Meas. Pts.</td>
				<td width=200 height=100>Mun & Ind. Ac.Ft./ Yr.</td>
				<td width=200 height=100>Mun & Ind. M. Gal./D.</td>
				<td width=250 height=100 rowspan=3>SW Total Meas. Pts.</td>
				<td width=200 height=100 rowspan=3>SW Total Ac.Ft./ Yr.</td>
				<td width=250 height=100 rowspan=3>SW Total M. Gal./D.</td>
				
				</tr>'; 
		}else{
			$pdf=new PDF('P','mm',array(625,425));
			$pdf->AddPage('L');
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetTitle($year.'  Reported Withdrawals of Groundwater from Registered Wells by Aquifer, County and Use Type for Arkansas');
			$pdf->SetSubject('Annual Data Statistics Report');
			$pdf->SetFont('Arial','',12);
			$pdf->SetKeywords('annual data,statistics, PDF, wateruse, aggregate, USGS');
		//	$pdf->Cell(0, 30, 'Surface Water Statistics Report for  '.$year, 0, false, 'C', 0, '', 0, false, 'T', 'M' );
			$pdf->SetFont('Arial','',12);
			$html .='<table nobr="false" border="1">';
			/*
			
				<thead><tr>
					<td width=2400 height=100> '.$year.' Reported Withdrawals of Groundwater from Registered Wells by Aquifer, County and Use Type for Arkansas </td>
				</tr>
				<tr>
					<td width=2400 height=50> [Mgal/d, million gallons per day; West, withdrawals from part of County west of Crowleys Ridge; East, withdrawals from part of County east of Crowleys Ridge]</td>
				</tr>
				<tr>
					<td width=2400 height=50>&nbsp;</td>
				</tr>
				
				<tr>
					<td width=200 height=50> Use Type</td>
					<td width=200 height=50>  Alluvium </td>
					<td width=200 height=50>  Cockfield Formation</td>
					<td width=200 height=50>  Sparta-Memphis Sand </td>
					<td width=150 height=50>  Cane River </td>
					<td width=150 height=50>  Wilcox Group </td>
					<td width=200 height=50>  Clayton Formation </td>
					<td width=200 height=50>  Nacatoch Sand </td>
					<td width=200 height=50>  Tokio Formation </td>
					<td width=150 height=50>  Trinity Group </td>
					<td width=200 height=50>  Paleozonic Undiff. </td>
					<td width=200 height=50>  All Other Aquifers</td>
					<td width=150 height=50>  Total</td>
				</tr>
				<tr>
					<td width=200 height=50>&nbsp;<td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50> Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50> Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50> Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50>  Wells </td>
				
				</tr>
				</thead>
				';*/
		}
		//$pdf->setMargin(20,0,20);
		
		$totalnum = count($arr);
		
		$i=0;
		
		foreach ($arr as $data){
			
			if ($the_decider == '1FRCROPS'){
				$html .='<tr>
					<td width=375 height=100 rowspan=3>'.$data[0].'</td>
					<td width=250 height=100>'.$data[1].'</td>
					<td width=150 height=100>'.$data[2].'</td>
					<td width=85 height=100>'.$data[3].'</td>
					<td width=85 height=100>'.$data[4].'</td>
					<td width=125 height=100>'.$data[5].'</td>
					<td width=125 height=100>'.$data[6].'</td>
					<td width=125 height=100>'.$data[7].'</td>
					<td width=85 height=100>'.$data[8].'</td>
					<td width=85 height=100>'.$data[9].'</td>
					<td width=155 height=100>'.$data[10].'</td>
					<td width=150 height=100>'.$data[11].'</td>
					</tr>'; 
			}elseif ($the_decider == '1FRMONTH'){
				$html .='<tr>
					<td width=375 height=100>'.$data[0].'</td>
					<td width=250 height=100 rowspan=3>'.$data[1].'</td>
					<td width=150 height=100>'.$data[2].'</td>
					<td width=85 height=100>'.$data[3].'</td>
					<td width=85 height=100>'.$data[4].'</td>
					<td width=125 height=100>'.$data[5].'</td>
					<td width=125 height=100>'.$data[6].'</td>
					<td width=125 height=100>'.$data[7].'</td>
					<td width=85 height=100>'.$data[8].'</td>
					<td width=85 height=100>'.$data[9].'</td>
					<td width=155 height=100>'.$data[10].'</td>
					<td width=150 height=100>'.$data[11].'</td>
					<td width=150 height=100>'.$data[12].'</td>
					<td width=150 height=100>'.$data[13].'</td>
					<td width=150 height=100>'.$data[14].'</td>
					<td width=150 height=100>'.$data[15].'</td>
					</tr>'; 		
			}elseif ($the_decider == '1FRSWREPORT'){
				
				$html .='<tr>
					<td width=375 height=100>'.$data[0].'</td>
					<td width=250 height=100 rowspan=3>'.$data[1].'</td>
					<td width=200 height=100>'.$data[2].'</td>
					<td width=200 height=100>'.$data[3].'</td>
					<td width=200 height=100>'.$data[4].'</td>
					<td width=200 height=100>'.$data[5].'</td>
					<td width=200 height=100>'.$data[6].'</td>
					<td width=250 height=100 rowspan=3>'.$data[7].'</td>
					<td width=200 height=100 rowspan=3>'.$data[8].'</td>
					<td width=250 height=100 rowspan=3>'.$data[9].'</td>
					</tr>'; 
			}
			
			
					/*
			if ($i%2 == 0){
			$html.='<tr><td width="150 height="30">'.$data['county_nm'].' ('.$data['county_cd'].')'.'</td>
					<td width="75" height="30">'.$data['wyear'].'</td>
					<td width="150" height="30">'.$data['ws'].'</td>
					<td width="175" height="30">'.$data['stream_nm'].'</td>
					<td width="175" height="30">'.$data['mpid'].'</td>
					<td width="300" height="30">'.$data['local_desc'].'</td>
					<td width="100" height="30">'.$data['longt'].'</td>
					<td width="100" height="30">'.$data['lat'].'</td>
					<td width="150" height="30">'.$data['use_nm'].'</td>
					<td width="300" height="30">'.$data['sic_nm'].'</td>
				</tr>'; 
			}*/
			
			
			if (!empty($data['county_nm'])){
				$county[] = $data['county_nm'];
				asort($county);
			}
			
			$i++;
		}
		
		$uniq_arr = array_unique($county);
		//print_r ($uniq_arr);
	
		if ($the_decider == '1FRWELLS'){
					
			$i =0;
			foreach ($uniq_arr as $county){
				##iterate by 4s 
				if ($i % 4 == 0){
					$html .='<thead><tr>
					<td width=2400 height=100> '.$year.' Reported Withdrawals of Groundwater from Registered Wells by Aquifer, County and Use Type for Arkansas </td>
				</tr>
				<tr>
					<td width=2400 height=50> [Mgal/d, million gallons per day; West, withdrawals from part of County west of Crowleys Ridge; East, withdrawals from part of County east of Crowleys Ridge]</td>
				</tr>
				<tr>
					<td width=2400 height=50>&nbsp;</td>
				</tr>
				
				<tr>
					<td width=200 height=50> Use Type</td>
					<td width=200 height=50>  Alluvium </td>
					<td width=200 height=50>  Cockfield Formation</td>
					<td width=200 height=50>  Sparta-Memphis Sand </td>
					<td width=150 height=50>  Cane River </td>
					<td width=150 height=50>  Wilcox Group </td>
					<td width=200 height=50>  Clayton Formation </td>
					<td width=200 height=50>  Nacatoch Sand </td>
					<td width=200 height=50>  Tokio Formation </td>
					<td width=150 height=50>  Trinity Group </td>
					<td width=200 height=50>  Paleozonic Undiff. </td>
					<td width=200 height=50>  All Other Aquifers</td>
					<td width=150 height=50>  Total</td>
				</tr>
				<tr>
					<td width=200 height=50>&nbsp;<td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50> Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50> Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50> Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=100 height=50>  Mgal/d. </td><td width=100 height=50>  Wells </td>
					<td width=75 height=50>  Mgal/d. </td><td width=75 height=50>  Wells </td>
				
				</tr>
				</thead>
				';
				}
				$i++;
				$county_r = explode(" ",$county);
				
				$countyname = strtolower($county);
				$countyname = ucfirst($countyname);
				if ($county_r[1] == '(EAST)'|| $county_r [2] =='(EAST)'){
					$html .='<tr>
					<td width=2400 height=50 bgcolor="#5274D2" align="CENTER"><b>'.$countyname.' County </b></td></tr>';
				}elseif ($county_r[1] == '(WEST)'|| $county_r [2] =='(WEST)'){
					$html .='<tr>
					<td width=2400 height=50 bgcolor="#FA79C7" align="CENTER"><b>'.$countyname.' County </b></td></tr>';
				}else{
					$html .='<tr>
					<td width=2400 height=50 bgcolor="#dcddea" align="CENTER"><b>'.$countyname.' County</b></td></tr>';
				}
				/*
				if ($county_r[1] == '(EAST)'|| $county_r [2] =='(EAST)'){
					$html .= '<tr>
					<td width=200 height=50 bgcolor="#c9cbea">  AGRICULTURE </td>
					
					</tr>';
					$html .='<tr>
						<td width=200 height=50  bgcolor="#c9cbea">  COMMERCIAL </td>
						</tr>'; 
					$html .='<tr>
						<td width=200 height=50  bgcolor="#c9cbea">  INDUSTRIAL </td>
						</tr>'; 
					$html .='<tr>
						<td width=200 height=50 bgcolor="#c9cbea">  IRRIGATION </td>
						</tr>'; 	
					$html .='<tr>
						<td width=200 height=50 bgcolor="#c9cbea">  MINING </td>
						</tr>';	
					$html .='<tr>
						<td width=200 height=50 bgcolor="#c9cbea">  POWER </td>
						</tr>'; 
					$html .='<tr>
						<td width=200 height=50 bgcolor="#c9cbea">  PUBLIC SUPPLY </td>
						</tr>'; 	
					$html .='<tr>
						<td width=200 height=50 bgcolor="#c9cbea">  TOTAL: </td>
						</tr>'; 	
					$html .='<tr>
						<td width=2400 height=50 bgcolor="#c9cbea">&nbsp;</td>
						</tr>'; 	
					
				}
				elseif ($county_r[1] == '(WEST)'|| $county_r [2] =='(WEST)'){
					$html .= '<tr>
						<td width=200 height=50  bgcolor="#f9c5f5">  AGRICULTURE </td>
					</tr>';
					$html .='<tr>
						<td width=200 height=50  bgcolor="#f9c5f5">  COMMERCIAL </td>
						</tr>'; 
					$html .='<tr>
						<td width=200 height=50  bgcolor="#f9c5f5">  INDUSTRIAL </td>
						</tr>'; 
					$html .='<tr>
						<td width=200 height=50  bgcolor="#f9c5f5">  IRRIGATION </td>
						</tr>'; 	
					$html .='<tr>
						<td width=200 height=50  bgcolor="#f9c5f5">  MINING </td>
						</tr>';	
					$html .='<tr>
						<td width=200 height=50  bgcolor="#f9c5f5">  POWER </td>
						</tr>'; 
					$html .='<tr>
						<td width=200 height=50 bgcolor="#f9c5f5">  PUBLIC SUPPLY </td>
						</tr>'; 	
					$html .='<tr>
						<td width=200 height=50 bgcolor="#f9c5f5">  TOTAL: </td>
						</tr>'; 	
					$html .='<tr>
						<td width=2400 height=50  bgcolor="#f9c5f5">&nbsp;</td>
						</tr>'; 	
					
				}*/
				
		
			
			$mgal=0;
			$occurences=0;
			############################################# START AGRICULTURE ####################################
			## AGRICULTURE - ALLUVIUM ##
			$html .= '<tr>
					<td width=200 height=50>  AGRICULTURE </td>
					';
			$AG = false;
			foreach ($arr as $raw_data){
				
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Alluvium'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$AG = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($AG == false){
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ Alluvium
			
			$Cock = false;
			## AGRICULTURE - Cockfield
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//`($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Cockfield'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cock = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			
			if ($Cock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ cockfield
			
			
			$SpartaX = false;
			## AGRICULTURE - Sparta
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Sparta'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$SpartaX = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($SpartaX == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			##END IR _ Sparta
			
			$Cane = false;
			## AGRICULTURE - Cane
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Cane'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cane = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Cane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$Wilcox = false;
			## AGRICULTURE - Wilcox
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Wilcox'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Wilcox = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Wilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$clayton = false;
			## AGRICULTURE - clayton
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Clayton'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$clayton = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($clayton == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$nacatoch = false;
			## AGRICULTURE - nacatoch
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Nacatoch'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$nacatoch = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($nacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$tokio = false;
			## AGRICULTURE - tokio
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Tokio'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$tokio = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($tokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$trinity = false;
			## AGRICULTURE - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Trinity'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$trinity = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($trinity == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			$rocks = false;
			## AGRICULTURE - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Rocks'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$rocks = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($rocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$others = false;
			## IRRIGATION - Others
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
					
						if ($raw_data['aquifer'] == 'Others/Unknown'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$others = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($others == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$mgalTotAgri = 0; 
			$occurencesTotAgri = 0;
			## AGRICULTURE - Total
			$total = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					
					if ($raw_data['use_cat'] == 'AGRICULTURE'){
						if ($raw_data['mgal']){
							
						//$mgal = round($raw_data['mgal'],2);
							if ($raw_data['aquifer'] == 'Alluvium'){
								$mgalTotAgri+=$raw_data['mgal'];
								$mgalTotAgri= round($mgalTotAgri,2);
							}
							
						
						}
						if ($raw_data['occurences']){
							$occurencesTotAgri+=($raw_data['occurences']);
							
						}
							$total = true;
					}
					
					
					
				}
			
				
			}
			if ($total == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotAgri.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotAgri.'</td>';
			}
			# end tag </tr> 
			$html .='</tr>';
			###################################### END AG ##################################################
		
	############################################# START COMMERCIAL ####################################
			## IRRIGIATION - ALLUVIUM ##
			$html .= '<tr>
					<td width=200 height=50>  COMMERCIAL </td>
					';
			$AG = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Alluvium'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$AG = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($AG == false){
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ Alluvium
			
			$Cock = false;
			## COMMERCIAL - Cockfield
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Cockfield'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cock = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			
			if ($Cock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ cockfield
			
			
			$SpartaX = false;
			## COMMERCIAL - Sparta
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Sparta'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$SpartaX = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($SpartaX == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			##END IR _ Sparta
			
			$Cane = false;
			## COMMERCIAL - Cane
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Cane'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cane = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Cane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$Wilcox = false;
			## COMMERCIAL - Wilcox
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Wilcox'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Wilcox = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Wilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$clayton = false;
			## COMMERCIAL - clayton
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Clayton'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$clayton = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($clayton == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$nacatoch = false;
			## COMMERCIAL - nacatoch
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Nacatoch'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$nacatoch = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($nacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$tokio = false;
			## COMMERCIAL - tokio
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Tokio'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$tokio = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($tokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$trinity = false;
			## COMMERCIAL - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Trinity'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$trinity = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($trinity == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			$rocks = false;
			## COMMERCIAL - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Rocks'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$rocks = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($rocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$others = false;
			## COMMERCIAL - Others
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
					
						if ($raw_data['aquifer'] == 'Others/Unknown'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$others = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($others == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			## COMMERCIAL - Total
			$mgalTotCO = 0; 
			$occurencesTotCO = 0;
			$total = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					
					if ($raw_data['use_cat'] == 'COMMERCIAL'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotCO+=$raw_data['mgal'];
							$mgalTotCO= round($mgalTotCO,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotCO+=($raw_data['occurences']);
							
						}
							$total = true;
					}
					
					
					
				}
			
				
			}
			if ($total == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotCO.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotCO.'</td>';
			}
			# end tag </tr> 
			$html .='</tr>';
			###################################### END CO ##################################################	
			
			############################################# START INDUSTRIAL ####################################
			## IRRIGIATION - ALLUVIUM ##
			$html .= '<tr>
					<td width=200 height=50>  INDUSTRIAL </td>
					';
			$AG = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Alluvium'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$AG = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($AG == false){
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ Alluvium
			
			$Cock = false;
			## INDUSTRIAL - Cockfield
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Cockfield'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cock = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			
			if ($Cock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ cockfield
			
			
			$SpartaX = false;
			## INDUSTRIAL - Sparta
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Sparta'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$SpartaX = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($SpartaX == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			##END IR _ Sparta
			
			$Cane = false;
			## INDUSTRIAL - Cane
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Cane'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cane = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Cane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$Wilcox = false;
			## INDUSTRIAL - Wilcox
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Wilcox'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Wilcox = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Wilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$clayton = false;
			## INDUSTRIAL - clayton
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Clayton'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$clayton = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($clayton == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$nacatoch = false;
			## INDUSTRIAL - nacatoch
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Nacatoch'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$nacatoch = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($nacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$tokio = false;
			## INDUSTRIAL - tokio
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Tokio'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$tokio = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($tokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$trinity = false;
			## INDUSTRIAL - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Trinity'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$trinity = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($trinity == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			$rocks = false;
			## INDUSTRIAL - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Rocks'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$rocks = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($rocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$others = false;
			## INDUSTRIAL - Others
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
					
						if ($raw_data['aquifer'] == 'Others/Unknown'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$others = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($others == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			## INDUSTRIAL - Total
			$mgalTotIN = 0; 
			$occurencesTotIN = 0;
			$total = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					
					if ($raw_data['use_cat'] == 'INDUSTRIAL'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotIN+=$raw_data['mgal'];
							$mgalTotIN= round($mgalTotIN,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotIN+=($raw_data['occurences']);
							
						}
							$total = true;
					}
					
					
					
				}
			
				
			}
			if ($total == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotIN.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotIN.'</td>';
			}
			# end tag </tr> 
			$html .='</tr>';
			###################################### END IND ##################################################	
			
			
	############################################# START IRRIGATION ####################################
			## IRRIGIATION - ALLUVIUM ##
			$html .= '<tr>
					<td width=200 height=50>  IRRIGATION </td>
					';
			$AG = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Alluvium'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$AG = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($AG == false){
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ Alluvium
			
			$Cock = false;
			## IRRIGATION - Cockfield
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Cockfield'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cock = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			
			if ($Cock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ cockfield
			
			
			$SpartaX = false;
			## IRRIGATION - Sparta
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Sparta'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$SpartaX = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($SpartaX == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			##END IR _ Sparta
			
			$Cane = false;
			## IRRIGATION - Cane
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Cane'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cane = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Cane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$Wilcox = false;
			## IRRIGATION - Wilcox
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Wilcox'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Wilcox = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Wilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$clayton = false;
			## IRRIGATION - clayton
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Clayton'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$clayton = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($clayton == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$nacatoch = false;
			## IRRIGATION - nacatoch
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Nacatoch'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$nacatoch = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($nacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$tokio = false;
			## IRRIGATION - tokio
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Tokio'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$tokio = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($tokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$trinity = false;
			## IRRIGATION - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Trinity'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$trinity = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($trinity == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			$rocks = false;
			## IRRIGATION - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Rocks'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$rocks = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($rocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$others = false;
			## IRRIGATION - Others
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'IRRIGATION'){
					
						if ($raw_data['aquifer'] == 'Others/Unknown'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$others = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($others == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$mgalTotIR = 0; 
			$occurencesTotIR = 0;
			## IRRIGATION - Total
			$total = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					
					if ($raw_data['use_cat'] == 'IRRIGATION'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotIR+=$raw_data['mgal'];
							$mgalTotIR= round($mgalTotIR,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotIR+=($raw_data['occurences']);
							
						}
							$total = true;
					}
					
					
					
				}
			
				
			}
			if ($total == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium">'.$mgalTotIR.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotIR.'</td>';
			}
			# end tag </tr> 
			$html .='</tr>';
			###################################### END IR ##################################################
			############################################# START MINING ####################################
			## MINING - ALLUVIUM ##
			$html .= '<tr>
					<td width=200 height=50>  MINING </td>
					';
			$AG = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Alluvium'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$AG = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($AG == false){
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$Cock = false;
			## MINING - Cockfield
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Cockfield'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cock = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			
			if ($Cock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ cockfield
			
			
			$SpartaX = false;
			## MINING - Sparta
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Sparta'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$SpartaX = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($SpartaX == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			##END IR _ Sparta
			
			$Cane = false;
			## MINING - Cane
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Cane'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cane = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Cane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$Wilcox = false;
			## MINING - Wilcox
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Wilcox'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Wilcox = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Wilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$clayton = false;
			## MINING - clayton
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Clayton'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$clayton = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($clayton == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$nacatoch = false;
			## MINING - nacatoch
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Nacatoch'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$nacatoch = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($nacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$tokio = false;
			## MINING - tokio
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Tokio'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$tokio = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($tokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$trinity = false;
			## MINING - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Trinity'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$trinity = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($trinity == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			$rocks = false;
			## MINING - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Rocks'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$rocks = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($rocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$others = false;
			## MINING - Others
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'MINING'){
					
						if ($raw_data['aquifer'] == 'Others/Unknown'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$others = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($others == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			## MINING - Total
			$mgalTotMI = 0; 
			$occurencesTotMI = 0;
			$total = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				
					
					if ($raw_data['use_cat'] == 'MINING'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotMI+=$raw_data['mgal'];
							$mgalTotMI= round($mgalTotMI,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotMI+=($raw_data['occurences']);
							
						}
							$total = true;
					}
					
					
					
				}
			
				
			}
			if ($total == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotMI.'</td>
						<td width=75 height=50 class="alluvium"> '.$occurencesTotMI.'</td>';
			}
			# end tag </tr> 
			$html .='</tr>';
			###################################### END MINING!! ##################################################
			
			############################################# START POWER ####################################
			## POWER - ALLUVIUM ##
			$html .= '<tr>
					<td width=200 height=50>  POWER </td>
					';
			$AG = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Alluvium'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$AG = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($AG == false){
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END POWER _ Alluvium
			
			$Cock = false;
			## POWER - Cockfield
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Cockfield'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cock = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			
			if ($Cock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END POWER _ cockfield
			
			
			$SpartaX = false;
			## POWER - Sparta
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER'){
						if ($raw_data['aquifer'] == 'Sparta'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$SpartaX = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($SpartaX == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			##END POWER_ Sparta
			
			$Cane = false;
			## POWER - Cane
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';

					}
					
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Cane'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cane = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Cane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$Wilcox = false;
			## POWER - Wilcox
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Wilcox'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Wilcox = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Wilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$clayton = false;
			## POWER - clayton
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER'
					|| $raw_data['use_cat'] == 'GEOTHERMAL POWER' || 
					$raw_data['use_cat'] == 'HYDROELECTRIC POWER' || 
					$raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
						
						if ($raw_data['aquifer'] == 'Clayton'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$clayton = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($clayton == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$nacatoch = false;
			## POWER - nacatoch
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Nacatoch'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$nacatoch = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($nacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$tokio = false;
			## POWER - tokio
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Tokio'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$tokio = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($tokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$trinity = false;
			## POWER - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Trinity'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$trinity = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($trinity == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			$rocks = false;
			## POWER - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
					
						if ($raw_data['aquifer'] == 'Rocks'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$rocks = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($rocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$others = false;
			## POWER - Others
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER')
					{
						$use_cat = 'POWER';;
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER'){
					
						if ($raw_data['aquifer'] == 'Others/Unknown'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$others = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($others == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			## POWER - Total
			$mgalTotPO = 0; 
			$occurencesTotPO = 0;
			$total = false;
			foreach ($arr as $raw_data){
				
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' || $raw_data['use_cat'] == 'GEOTHERMAL POWER' || $raw_data['use_cat'] == 'HYDROELECTRIC POWER' || $raw_data['use_cat'] == 'NUCLEAR ENERGY POWER'){
						$use_cat = 'POWER';;
					}
					if ($raw_data['use_cat'] == 'FOSSIL-FUELED POWER' ){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotPO+=$raw_data['mgal'];
							$mgalTotPO= round($mgalTotPO,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotPO+=($raw_data['occurences']);
							
						}
							$total = true;
					}
					
					
					
				}
			
				
			}
			if ($total == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotPO.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotPO.'</td>';
			}
			# end tag </tr> 
			$html .='</tr>';
			###################################### END POWER  ##################################################	
			
			############################################# START WATER SUPPLIER ####################################
			## WATER SUPPLIER - ALLUVIUM ##
			$html .= '<tr>
					<td width=200 height=50>  PUBLIC SUPPLY </td>
					';
			$AG = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Alluvium'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$AG = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($AG == false){
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ Alluvium
			
			$Cock = false;
			## WATER SUPPLIER - Cockfield
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Cockfield'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cock = true;

						}
						
						
					}
					
					
					
				}
			
				
			}
			
			if ($Cock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			## END IR _ cockfield
			
			
			$SpartaX = false;
			## WATER SUPPLIER - Sparta
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Sparta'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$SpartaX = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($SpartaX == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			##END IR _ Sparta
			
			$Cane = false;
			## WATER SUPPLIER - Cane
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Cane'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Cane = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Cane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$Wilcox = false;
			## WATER SUPPLIER - Wilcox
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Wilcox'){
						
							$html .='<td width=75 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurences.'</td>';
							$Wilcox = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($Wilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			
			
			$clayton = false;
			## WATER SUPPLIER - clayton
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Clayton'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$clayton = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($clayton == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$nacatoch = false;
			## WATER SUPPLIER - nacatoch
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Nacatoch'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$nacatoch = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($nacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			$tokio = false;
			## WATER SUPPLIER - tokio
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Tokio'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$tokio = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($tokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$trinity = false;
			## WATER SUPPLIER - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Trinity'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$trinity = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($trinity == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}
			$rocks = false;
			## WATER SUPPLIER - Trinity
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Rocks'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$rocks = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($rocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			$others = false;
			## WATER SUPPLIER - Others
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				//print_r($raw_data);
					if ($raw_data['mgal']){
						$mgal = round($raw_data['mgal'],2);
					}
					if ($raw_data['occurences']){
						$occurences = $raw_data['occurences'];
					}
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
					
						if ($raw_data['aquifer'] == 'Others/Unknown'){
						
							$html .='<td width=100 height=50 class="alluvium"> '.$mgal.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurences.'</td>';
							$others = true;
							
						}
						
						
					}
					
					
					
				}
			
				
			}
			if ($others == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}
			
			## WATER SUPPLIER - Total
			$mgalTotWS = 0; 
			$occurencesTotWS = 0;
			$total = false;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				
					
					if ($raw_data['use_cat'] == 'WATER SUPPLIER'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotWS+=$raw_data['mgal'];
							$mgalTotWS= round($mgalTotWS,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotWS+=($raw_data['occurences']);
							
						}
							$total = true;
					}
					
					
					
				}
			
				
			}
			if ($total == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotWS.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotWS.'</td>';
			}
			# end tag </tr> 
			$html .='</tr>';
			###################################### END WATER SUPPLIER!! ##################################################
			
			### ZE TOTAL PER AQUIFERS ## 
			$html .='<tr><td width=200 height=50 class="cockfield"> <b> Total: </b> </td>
					';
			
			## ZE NUMBERS 
			
			$mgalTotAllu = 0;
			$occurencesTotAllu = 0;	
			
			$mgalTotCock = 0;
			$occurencesTotCock = 0;	
			
			$mgalTotSparta = 0;
			$occurencesTotSparta = 0;
			
			$mgalTotCane = 0;
			$occurencesTotCane = 0;
			
			$mgalTotClay = 0;
			$occurencesTotClay= 0;	
			
			$mgalTotWilcox =0;
			$occurencesTotWilcox =0;
			$mgalTotNacatoch = 0;
			$occurencesTotNacatoch = 0;	
			
			$mgalTotTokio = 0;
			$occurencesTotTokio = 0;	
			
			$mgalTotTrinity = 0;
			$occurencesTrinity = 0;	
			
			$mgalTotRocks = 0;
			$occurencesRocks = 0;
			
			$mgalTotOthers = 0;
			$occurencesTotOthers = 0;	

			$mgalTot =0;
			$occurencesTot =0;
			foreach ($arr as $raw_data){
			
				if ($county == $raw_data['county_nm']){
				
					
					if ($raw_data['aquifer'] == 'Alluvium'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotAllu+=$raw_data['mgal'];
							$mgalTotAllu= round($mgalTotAllu,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotAllu+=($raw_data['occurences']);
							
						}
					$totalAlluvium = true;
					}elseif ($raw_data['aquifer'] == 'Cockfield'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotCock+=$raw_data['mgal'];
							$mgalTotCock= round($mgalTotAllu,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotCock+=($raw_data['occurences']);
							
						}
					$totalCock= true;
					}
					elseif ($raw_data['aquifer'] == 'Sparta'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotSparta+=$raw_data['mgal'];
							$mgalTotSparta= round($mgalTotSparta,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotSparta+=($raw_data['occurences']);
							
						}
					$totalSparta= true;
					}
					elseif ($raw_data['aquifer'] == 'Cane'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotCane+=$raw_data['mgal'];
							$mgalTotCane= round($mgalTotCane,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotCane+=($raw_data['occurences']);
							
						}
					$totalCane= true;
					}
					elseif ($raw_data['aquifer'] == 'Wilcox'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotWilcox+=$raw_data['mgal'];
							$mgalTotWilcox= round($mgalTotCane,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotWilcox+=($raw_data['occurences']);
							
						}
					$totalWilcox= true;
					}
					elseif ($raw_data['aquifer'] == 'Clayton'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotClay+=$raw_data['mgal'];
							$mgalTotClay= round($mgalTotClay,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotClay+=($raw_data['occurences']);
							
						}
					$totalClay= true;
					}
					elseif ($raw_data['aquifer'] == 'Nacatoch'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotNacatoch+=$raw_data['mgal'];
							$mgalTotNacatoch= round($mgalTotNacatoch,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotNacatoch+=($raw_data['occurences']);
							
						}
					$totalNacatoch= true;
					}
					elseif ($raw_data['aquifer'] == 'Tokio'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotTokio+=$raw_data['mgal'];
							$mgalTotTokio= round($mgalTotTokio,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotTokio+=($raw_data['occurences']);
							
						}
					$totalTokio= true;
					}
					elseif ($raw_data['aquifer'] == 'Trinity'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotTrinity+=$raw_data['mgal'];
							$mgalTotTrinity= round($mgalTotTokio,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotTrinity+=($raw_data['occurences']);
							
						}
					$totalTrinity= true;
					}
					elseif ($raw_data['aquifer'] == 'Rocks'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotRocks+=$raw_data['mgal'];
							$mgalTotRocks= round($mgalTotRocks,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotRocks+=($raw_data['occurences']);
							
						}
					$totalRocks= true;
					}
					elseif ($raw_data['aquifer'] == 'Others/Unknown'){
						if ($raw_data['mgal']){
						//$mgal = round($raw_data['mgal'],2);
							$mgalTotOthers+=$raw_data['mgal'];
							$mgalTotOthers= round($mgalTotOthers,2);
						}
						if ($raw_data['occurences']){
							$occurencesTotOthers+=($raw_data['occurences']);
							
						}
					$totalOthers= true;
					}
					
				}
			
				
			}
			if ($totalAlluvium == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotAllu.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurencesTotAllu.'</td>';
			}
			if ($totalCock == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotCock.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurencesTotCock.'</td>';
			}
			if ($totalSparta == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotSparta.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurencesTotSparta.'</td>';
			}
			if ($totalCane == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotCane.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotCane.'</td>';
			}
			if ($totalWilcox == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotWilcox.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotWilcox.'</td>';
			}
			if ($totalClay == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotClay.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurencesTotClay.'</td>';
			}
			if ($totalNacatoch == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotNacatoch.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurencesTotNacatoch.'</td>';
			}
			if ($totalTokio == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotTokio.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurencesTotTokio.'</td>';
			}
			if ($totalTokio == false){
				
				$html .='<td width=75 height=50 class="cockfield"> 0 </td>
					<td width=75 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=75 height=50 class="alluvium"> '.$mgalTotTokio.'</td>
							<td width=75 height=50 class="alluvium"> '.$occurencesTotTokio.'</td>';
			}
			if ($totalRocks == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotRocks.'</td>
							<td width=100 height=50 class="alluvium"> '.$occurencesTotRocks.'</td>';
			}
			if ($totalOthers == false){
				
				$html .='<td width=100 height=50 class="cockfield"> 0 </td>
					<td width=100 height=50 class="cockfield"> 0 </td>';
			}else{
				$html .='<td width=100 height=50 class="alluvium"> '.$mgalTotOthers.'</td>
						<td width=100 height=50 class="alluvium"> '.$occurencesTotOthers.'</td>';
			}
			
			$mgalTot = $mgalTotAgri+$mgalTotCO+$mgalTotIR+$mgalTotIN+$mgalTotMI+$mgalTotPO+$mgalTotWS;
			$occurencesTot = $occurencesTotAgri+$occurencesTotCO+$occurencesTotIR+$occurencesTotIN+$occurencesTotMI+$occurencesTotPO+$occurencesTotWS;
			## total of total of aquifers - BRUH
			$html .='<td width=75 height=50 class="alluvium"> '.$mgalTot.'</td>
						<td width=75 height=50 class="alluvium"> '.$occurencesTot.'</td>';
			
			# end tag </tr> 
			
			$html .='</tr>';
			
			## END ZE TOTAL
			
			## BLANK SPACE FOR ACCESIBILITY DESIGN
			$html .='<tr><td width=2400 height=50 >&nbsp;</td></tr>';
		}## END 
		
		
			function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
	}## END MAIN LOOP
	
		$html.='</table> ';
		/*if (!empty($html)){
			print $html;
		}else{
			echo 'problem';
		}*/
	
		$pdf->WriteHTML($html);
		$lefilename = round(microtime(true).".pdf");
		$pdf->Output();
		
		
		
		
	}
	function toDoc($arr,$year,$the_decider){
		//require_once __DIR__ . '/../bootstrap.php';
		echo "Under construction coming soon!";
		///use PhpOffice\PhpWord\Settings;
		
	
	}
	
	
}
class validate {
	
	function ann_data_wells($mpid){
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			$sqlQuery2 = "SELECT ann_data.mpid  FROM ann_data inner join exdata on ann_data.mpid = exdata.mpid where ann_data.mpid = '".$mpid."'";
			
			$parser = oci_parse($conn,$sqlQuery2);
			$err= oci_execute($parser);
			oci_fetch_all($parser,$r);
			$rows_returned = OCI_NUM_ROWS($parser);
			
			
			if ($rows_returned > 0){
				#print '1';
				return 'Yes';
			}else{
				return 'No';
			}
			#return $rows_returned;
			
	}
	function validate_method_wells($q){
		switch($q){
			case 'estimated':
			return 'E';
			break;
			
			case 'measured':
			return 'M';
			break;
			
			case 'metered':
			return 'C';
			break;
			
		}
	}
	
	function validate_type_wells($type,$searchstring){
		
		switch ($type){
			case 'diverter':
			$conds = "station.diverter_id = '".$searchstring."'";
			$join  = "inner join owner on station.owner_id = owner.owner_id 
						  inner join diverter on station.diverter_id = diverter.diverter_id";
			$type_name  = "owner.owner_nm";
			$type_name2  = "diverter.diverter_nm";
			break;
			
			case 'owner':
			$conds = "station.owner_id = '".$searchstring."'";
			$join  = "inner join owner on station.owner_id = owner.owner_id 
							inner join diverter on station.diverter_id = diverter.diverter_id";
			$type_name2 = "owner.owner_nm";
			$type_name  = "diverter.diverter_nm";
			break;
			
			case 'facility':
			$conds = "station.facility_id =  '".$searchstring."'";
			$join  = "inner join owner on station.owner_id = owner.owner_id 
						inner join diverter on station.diverter = owner.diverter 
							inner join facility on station.facility_id = facility.facility_id";
			$type_name  = "facility.facility_nm";
			break;
		}
		$data = array($join,$conds,$type_name,$type_name2);
		return $data;
	
	}
	function validate_countynm($data){
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			$sqlQuery = "SELECT county_cd FROM COUNTY where county_nm = '".strtoupper($data)."'";
		
			$parser = oci_parse($conn,$sqlQuery);
			$err = oci_execute($parser);
			//$data = array();
			while ($row = oci_fetch_array($parser,OCI_BOTH)){
				$data= $row['COUNTY_CD'];
				
			}
			return $data;
	}
	
	
	function validate_aquifer($data){
		
			$aquifer = explode(",",$data);
			
			foreach ($aquifer as $aquifers)
			{
				
				$filler = "''";
				if ($aquifers == 'Deposits'){
					$deposits = "'110ALVM','112ALVM','112TRRC'";
				}
				if ($aquifers == 'Cockfield'){
					$cockfield = $filler.",'124CCFK'";
				}
				if ($aquifers == 'Cane'){
					$cane =  $filler.",'124CRVR'";
				}
				if ($aquifers == 'Sparta'){
					$sparta =  $filler.",'12405MP','124SPRT'";
				}
				if ($aquifers == 'Wilcox'){
					$wilcox = $filler.",'124WLCX'";
				}
				if ($aquifers == 'Clayton'){
					$clayton = $filler.",'125CLTN','125MDWY'";
				}
				if ($aquifers == 'Nacatoch'){
					$nacatoch = $filler.",'211NTC'";
				}
				if ($aquifers == "Tokio"){
					$tokio = $filler.",'212TOKO'";
				}
				if ($aquifers == "Trinity"){
					$tokio = $filler.",'218TRNT'";
				}
				if ($aquifers == 'Rocks'){
				
					$rocks = $filler.",'300PLZC','326ATOK','330ARKS','331PKTN','360ODVC','364EVRN','364STPR','367CTTR','367GNTR','367GSCD','367RBDX','368PWLL','370CMBR','371POTS'";
				}
				if ($aquifers == 'Unknown'){ ## and all other Aquifers
				
					$others = "'110ALVM','112ALVM','112TRRC','124CCFK','12405MP','124SPRT',
					'124WLCX','125CLTN','125MDWY','211NTC','212TOKO','218TRNT','300PLZC','326ATOK',
					'330ARKS','331PKTN','360ODVC','364EVRN','364STPR','367CTTR','367GNTR','367GSCD','367RBDX','368PWLL','370CMBR','371POTS'";
					$unknown = true;
				}
			}
			
			if ($data == 'all'){
				$prin_aquifer = '';
				
				
			}else{
				$prin_aquifer = $deposits.$cockfield.$cane.$sparta.$wilcox.$clayton.$nacatoch.$tokio.$rocks.$others;
				if ($unknown == true){
					$prin_aquifer = " AND station.prin_aquifer NOT IN(".$prin_aquifer.")";
				}else{
			
					$prin_aquifer = " AND station.prin_aquifer IN(".$prin_aquifer.")";
				}
				
			}
		
		if (empty($prin_aquifer)){
			return "";
		}else{
			return $prin_aquifer;
		}
		
		
		
	}
	
	function validate_usecd($sic_nm){
		//print 'hjsdfhjdfs';
		
		if ($sic_nm != "all"){
			$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			$sqlQuery = "SELECT * FROM sic_codes where sic_nm IN (".$sic_nm.")";
			
			$parser = oci_parse($conn,$sqlQuery);
			$err = oci_execute($parser);
			$data = array();
			while ($row = oci_fetch_array($parser,OCI_BOTH)){
				$data[] = $row['USE_CD'];
				
			}
			
		}else{
			
			$data[] = "all";
	
		}
		return $data;
	
	}
	function validate_countycd($county_cd){
		//print 'hjsdfhjdfs';
		
		if ($sic_nm != "all"){
			$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			$sqlQuery = "SELECT * FROM COUNTY where county_cd IN (".$county_cd.")";
			

			$parser = oci_parse($conn,$sqlQuery);
			$err = oci_execute($parser);
			$data = array();
			while ($row = oci_fetch_array($parser,OCI_BOTH)){
				$data[]= $row['COUNTY_NM'];
				
			}
			
		}else{
			
			$data[] = "all";
	
		}
		return $data;
	
	}
	
	function validate_statecd($state_cd){
		//print 'hjsdfhjdfs';
		
	
			$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			$sqlQuery = "SELECT * FROM STATE where state_cd IN (".$state_cd.")";
			
			#print $sqlQuery;
			$parser = oci_parse($conn,$sqlQuery);
			$err = oci_execute($parser);
			$data = array();
			while ($row = oci_fetch_array($parser,OCI_BOTH)){
				$data = $row['STATE_AB'];
				
			}
			
		return $data;
	
	}
	function validate_statecd2($state_cd){
		//print 'hjsdfhjdfs';
		
	
			$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			$sqlQuery = "SELECT * FROM STATE where state_cd IN (".$state_cd.")";
			
		//	print $sqlQuery;
			$parser = oci_parse($conn,$sqlQuery);
			$err = oci_execute($parser);
			$data = array();
			while ($row = oci_fetch_array($parser,OCI_BOTH)){
				$data = $row['STATE_NM'];
				
			}
			
		return $data;
	
	}
	function validate_user($u,$ep){
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			
		$login_ok = false;
	
		$sqlQuery = "SELECT USER_ID, USER_TYPE,COUNTY_NM,COUNTY_CD,COMPANY_NM FROM USERS 
					WHERE USER_ID = '".$u."' 
					AND PASS_WD ='".$ep."'";
		
		$parser = oci_parse($conn,$sqlQuery);
		$err = oci_execute($parser);
		## FOR UNKNOWN REASONS, OCI:PDO DRIVERS WONT ALLOW MULTIPLE EXECUTION WITH ONE PARSER ##
		$parser_nr = oci_parse($conn,$sqlQuery);
		$err = oci_execute($parser_nr);
		$num_rows = OCI_FETCH_ALL ($parser_nr,$r);
		#########################################################################################
		
		$row = oci_fetch_array($parser,OCI_BOTH);
		
		if ($num_rows == 1){
			$_SESSION = $row;
			$login_ok = true;
			return $login_ok;
			
		}
	
	}
	
} // End of Class (my favorite thing... just student things)


class debug {
	function isDebug($flag){
		if ($flag == 'debug'){
			return '1';
			
		}elseif($flag == 'PDF' || $flag == 'pdf'){
			return 'PDF';
		}else{
			return 'CSV';
		}
	}
}	
class sql {
	function conditions ($data,$type,$raw_data){
		$conditions = "";
		
		$conditionData = strtolower($data);
		
		if ($conditionData != 'all'){
			if ($type == "station.county_cd"){
				$conditions = " AND ". $type." IN (".$data.")";
			}elseif ($type == "station.county_cd-agg"){
				$conditions = " station.county_cd IN (".$data.")";
			
			}elseif ($type == "sic_code") {
				$conditions = " AND sic_codes.".$type." IN (".$data.")";
			}elseif ($type == "crop_cd") {
				$conditions = " AND exdata.".$type." IN (".$data.")";
			}elseif ($type == "wyear"){
				$conditions = " AND ann_data.".$type." BETWEEN ".$data;
			}elseif ($type == "wyear-agg"){
				$conditions = " exdata.wyear ='".$data."'";
			}elseif ($type == "wyear-agg-sw"){
				$conditions = " ann_data.wyear ='".$data."'";
			}elseif ($type == "wyear-ann"){
				$conditions = " ann_data.wyear = '".$data."'";
			}else{
				$conditions = " AND ".$type." IN (".$data.")";
				
			}
			
		}

		return $conditions;
	}
	function join($data,$jointype,$jointable) {
		$joinsql = "";
	
		if ($data == "exdata"){
			
			$joinsql .= " ".$jointype." JOIN ".$data." ON station.mpid = ".$data.".mpid";
			//$joinsql .= " ".$jointype." JOIN owner ON ann_data.owner_id = ".$data.".owner_id ";
			
		}elseif ($data == "industrial"){
			$joinsql = " ".$jointype." JOIN ".$data." ON ann_data.diverter_id = ".$data.".diverter_id ";
			//$joinsql .= " ".$jointype." JOIN owner ON station.facility_id = ".$data.".facility_id ";
		}
		if ($data == "mining"){
			$joinsql = " ".$jointype." JOIN  ".$data." ON ann_data.diverter_id = ".$data.".diverter_id";
			//$joinsql .= " ".$jointype." JOIN owner ON station.facility_id = ".$data.".facility_id ";
		}
		if ($data == "commercial"){
			
			$joinsql .= " ".$jointype." JOIN ".$data." ON ann_data.diverter_id = ".$data.".diverter_id";
			//$joinsql .= " ".$jointype." JOIN owner ON ann_data.owner_id = ".$data.".owner_id ";
			
		}
		if ($data == "wsource"){
			$joinsql = " ".$jointype." JOIN ".$data." ON ann_data.diverter_id = ".$data.".diverter_id";
			//$joinsql .= " ".$jointype." JOIN owner ON station.facility_id = ".$data.".facility_id ";
		}
		if ($data == "sic_codes"){
			$joinsql = " ".$jointype. " JOIN ". $data . " ON ". $jointable. " = ". $data. ".sic_cd";
		}
		if ($data == "exdata_power"){
			$joinsql = " ".$jointype." JOIN POWER ON ann_data.diverter_id = power.diverter_id";
			$joinsql .= " ".$jointype." JOIN ".$data." ON station.mpid = ".$data.".mpid";
			
		}
		if ($data == "facility"){
			$joinsql  = " ".$jointype." JOIN ".$data." ON station.diverter_id = facility.diverter_id";
		}
		if ($data == "exdata_commercial"){
			
			$joinsql .= " ".$jointype." JOIN ".$data." ON station.mpid = ".$data.".mpid";
			//$joinsql .= " ".$jointype." JOIN owner ON ann_data.owner_id = ".$data.".owner_id ";
			
		}
		if ($data == "wsupply"){
			$joinsql .= " ".$jointype." JOIN ".$data." ON ann_data.diverter_id = ".$data.".diverter_id";
			//$joinsql .= " ".$jointype." JOIN owner ON ann_data.owner_id = ".$data.".owner_id ";
			
		}
		/* Fur Aggregate */
		if ($data == "station"){
			$joinsql .= " ".$jointype." JOIN ".$data." ON exdata.mpid =".$data.".mpid";
			
		}
		if ($data == "ann_data"){
			$joinsql .= " ".$jointype." JOIN ".$data." ON station.mpid =".$data.".mpid";
			
		}
		if ($data == "station-ann_data"){
			$data = explode("-",$data);
			
			$joinsql .= " ".$jointype." JOIN ".$data[1]." ON ".$data[0].".mpid =".$data[1].".mpid";
			
		}
		if ($data == "county"){
			$joinsql .= " ".$jointype." JOIN ".$data." ON station.county_cd =".$data.".county_cd";
		}
		if ($data == "use_type"){
			$joinsql .= " ".$jointype." JOIN ".$data." ON ann_data.use_cd =".$data.".use_cd";
		}
		
		/* FIN */
		
		return $joinsql;
		
		
	
		
	}
	function select ($tablenm,$conditions,$join,$sort,$sortrows,$joinsqlWhere,$flagDebug,$pcfsd,$rows,$groupby,$type,$loc){
		//PCFSD = "Private Code for Sensitive Data"
		// main/"mother" table depends on the user
	
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
		
		if ($sortrows == "default"){
			$sortrows = "station.county_cd";
		}
		if ($sort == "ASC"){
			$sorted = " ORDER BY ".$sortrows." ASC";
		}elseif ($sort == "DESC") {
			$sorted = " ORDER BY ".$sortrows." DESC";
		}else{
			// ASCENDING WILL BE THE DEFAULT
			$sorted = " ORDER BY ".$sortrows." ASC";
		}

		if ($rows !=null){
			$sqlQuery = "SELECT ".$rows." FROM ".$tablenm." ".$join." WHERE ".$joinsqlWhere." ".$conditions.' '.$groupby;			
		
		}else{
			$sqlQuery = "SELECT * FROM ".$tablenm." ".$join." WHERE ".$joinsqlWhere." ".$conditions.$sorted;					
		}
		$parser = oci_parse($conn,$sqlQuery);
		$err = oci_execute($parser);
		
		$parser_nr = oci_parse($conn,$sqlQuery);
		$err2 = oci_execute($parser_nr);
		oci_fetch_all($parser_nr,$r);
		$fetch_num_rows = OCI_NUM_ROWS($parser_nr);
		
		
				if ($flagDebug == '1'){
					print "||******************* WARNING! YOU ARE IN  DEBUG MODE! ********************||\n\n";
					print "||******************* NOTE: If you see two SQL queries that are exactly the same, DO NOT PANIC! just copy the either one. However, If you have two or more unique SQL Query you have to copy everything because the result of those Queries will be merge into one. ********************||\n\n";
					print "The SQL Query is:\n\n".$sqlQuery."\n\n";
					print "=========================================\n\n";
					print "Date Accesed: ".date("m/j/Y h:i:s",time()). " (GMT-5) ||\n\n";
					print "All Rows fetched: ".$fetch_num_rows."                   	 ||\n\n";
					print "Detail(s):                          	 ||\n\n";
					print "Table Name: ".$tablenm. "                      ||\n\n";
					print "Method: SELECT all 	   	         ||\n\n";
					print "=========================================\n\n\n\n\n";
					print "||******************* Result in JSON  *******************||\n\n";
			
				}
		
	
		
		$data = array();
		$i = 1;
		
		while ($row = oci_fetch_array($parser,OCI_BOTH)){
			if ($rows !=null && $pcfsd == "1FRCROPS"){
					
						$crop_cd = $row['CROP_CD'];
						$sic_nm = $row['SIC_NM'];
						$occurences = $row['OCCURENCE'];					
						$sum_acres = round($row['SUM_ACRES'],2);
						$sum_apprate = round($row['SUM_APPRATE'],2);
						$avg =  round($row['AVERAGE'],2);
						$min =  round($row['MIN_R'],2);
						$max =  round($row['MAX_R'],2);
						$tot_amt =  round($row['TOTAL_AMT'],2);
						if ($occurences > 3){
							$twentyfifth =  round($row['TWENTYFIFTH'],2);
							$fiftieth =  round($row['FIFTIETH'],2);
							$seventyfifth =  round($row['SEVENTYFIFTH'],2);
							$variance = round($row['VARIANCE_R'],2);
							$std_dev = round($row['STDDEV_R'],2);
						}elseif ($occurences > 1 && $occurences <4){
							$twentyfifth =  "*****";
							$fiftieth =  round($row['FIFTIETH'],2);
							$seventyfifth = "*****";
							$variance = round($row['VARIANCE_R'],2);
							$std_dev = round($row['STDDEV_R'],2);
						}else{
							$twentyfifth =  "*****";
							$fiftieth =  "*****";
							$seventyfifth = "*****";
							$variance =  "*****";
							$std_dev =  "*****";
						}
						
						
						
						
						$data[] = array(
									"crop_cd" => $crop_cd,
									"sic_nm" => $sic_nm,
									"occurences" => $occurences,
									"sum_acres"=> $sum_acres,
									"sum_apprate" => $sum_apprate,
									"average" => $avg,
									"min"=> $min,
									"max"=> $max,
									"tot_amt"=> $tot_amt,
									"twentyfifth" => $twentyfifth,
									"fiftieth"=> $fiftieth,
									"seventyfifth" => $seventyfifth,
									"variance"=> $variance,
									"std_dev"=> $std_dev
								);
						
			}elseif ($rows !=null && $pcfsd == "1FRMONTH"){
						$crop_cd = $row['CROP_CD'];
						$sic_nm = $row['SIC_NM'];
						$occurences = $row['OCCURENCE'];					
						$sum_acres = round($row['SUM_ACRES'],2);
						$jan = round($row['JAN'],2);
						$feb = round($row['FEB'],2);
						$mar = round($row['MAR'],2); //roxas
						$apr = round($row['APR'],2); //tayo, sumakit ang ulo ko ..
						$may = round($row['MAY'],2); //james may - top gear, brian may - queen
						$jun = round($row['JUN'],2); 
						$jul = round($row['JUL'],2); 
						$aug = round($row['AUG'],2); //mented reality
						$sept = round($row['SEPT'],2); 
						$oct = round($row['OCT'],2); 
						$nov = round($row['NOV'],2); 
						$dec = round($row['DEC'],2); 
						$tot_amt =  round($row['TOTAL_AMT'],2);
						
						
						$data[] = array(
									"crop_cd" => $crop_cd,
									"sic_nm" => $sic_nm,
									"occurences" => $occurences,
									"sum_acres" => $sum_acres,
									"tot_amt" => $tot_amt,
									"jan"=> $jan,
									"feb" => $feb,
									"mar" => $mar,
									"apr"=> $apr,
									"may"=> $may,
									"jun"=> $jun,
									"jul" => $jul,
									"aug"=> $aug,
									"sept" => $sept,
									"oct" => $oct,
									"nov" => $nov,
									"dec" => $dec
								);
						
			}elseif ($rows !=null && $pcfsd == "1FRSWREPORT") {
						$stream_nm = $row['STREAM_NM'];
						$occurences = $row['OCCURENCES'];
						$ann_amt  =  round($row['ANN_AMT'],2);
						$computation= round($row['ANN_AMT']/1119.966,2);
						
						
							
						$data[] = array(
									"stream_nm" => $stream_nm,
									"occurences" => $occurences,
									"ann_amt" => $ann_amt,
									"computation" => $computation);
			}elseif ($rows !=null && $pcfsd == "1FRWELLS"){
				
						
						$mgal = $row['MGAL'];
						$occurences = $row['OCCURENCES'];
						$use_cat = $row['USE_NM'];
						$aquifer = $row['PRIN_AQUIFER'];
						$stream = $row['STREAM_NM'];
						$county = $row['COUNTY_NM'];
						$huc = $row['HUC'];
						if ($type == 'Deposits'){
							$type = 'Alluvium';
						}
						
						if ($county != "CLAY" && $county != "ST FRANCIS" && $county != "POINSETT" && $county != "LEE" && $county != "GREENE" && $county != "CROSS" && $county != "CRAIGHEAD"){
								
								if ($_GET['watersource'] == "'sw'"){
									
									$data[] = array(
										"mgal" => $mgal,
										"occurences" => $occurences,
										"use_cat" => $use_cat,
										"county_nm" => $county,
										"stream_nm" => $stream,
										"aquifer"=>$type);
								}else{
									$data[] = array(
										"mgal" => $mgal,
										"occurences" => $occurences,
										"use_cat" => $use_cat,
										"county_nm" => $county,
										"aquifer"=>$type,
										"huc"=>$huc);
								}
								
						}else{
							if ($loc == "W"){
								$countyx = $row['COUNTY_NM'].' (WEST)';
							}elseif($loc == "E"){
								$countyx = $row['COUNTY_NM'].' (EAST)';
							}else{
								$countyx = $row['COUNTY_NM'];
							}
							//print $county;
								if ($_GET['watersource'] != "'sw'"){
									$data[] = array(
										"mgal" => $mgal,
										"occurences" => $occurences,
										"use_cat" => $use_cat,
										"county_nm" => $countyx,
										"stream_nm" => $stream,
										"aquifer"=>$type);
								}else{
									$data[] = array(
										"mgal" => $mgal,
										"occurences" => $occurences,
										"use_cat" => $use_cat,
										"county_nm" => $countyx,
										"stream_nm" => $stream,
										"huc"=>$huc);
								}
						}
						
						
						
				
				
			}else{
						$county_id = $row['COUNTY_CD'];
						$year = $row['WYEAR'];
						$county_nm = $row['COUNTY_NM'];
						$source_cd = $row['SOURCE_CD'];
						$huc = $row['HUC'];
						$mpid = $row['MPID'];
						$local_desc = $row['LOCAL_DESC'];
						$stream_nm = $row['STREAM_NM'];
						$sic_nm = $row['SIC_NM'];
						$use_nm = $row['USE_NM'];
						$aquifer = $row['PRIN_AQUIFER'];
						
						if ($pcfsd == '1FRGR'){
							$long = "Not Available For Public Use";
							$lat = "Not Available For Public Use";
						}elseif ($pcfsd =='1FRRP'){
							$long = "Not Available";
							$lat = "Not Available";
						}else{
							$long = $row['LONGITUDE'];
							$lat = $row['LATITUDE'];
						}
						// DECLARE EM ALL..						
						$owner_id = $row['OWNER_ID'];
						$div_id = $row['DIVERTER_ID'];
						$fac_id = $row['FACILITY_ID'];
						$aquifer = $row['PRIN_AQUIFER'];
						$rec_waste = $row['REC_WASTE'];
						$subtype = $row['SUBTYPE'];
						$quadno = $row['QUADNO'];
						$opnum = $row['OPNUM'];
						$perm_agency = $row['PERM_AGENCY'];
						$wellno = $row['WELLNO'];
						$pump_hp = $row['PUMP_HP'];
						$power_tp = $row['POWER_TP'];
						$div_meth = $row['DIVERSION_METH'];  // MR. WHITE AGREES
						$pipe_diam = $row['PIPE_DIAM'];
						$well_depth = $row['WELL_DEPTH'];
						$date_drilled = $row['DATE_DRILLED'];
						$driller_nm = $row['DRILLER_NM'];
						$quad1 = $row['QUAD1'];
						$quad2 = $row['QUAD2'];
						$section = $row['SECTION'];
						$range = $row['RANGE'];
						$dam = $row['DAM'];
						$tract = $row['FARM'];
						$mstamp = $row['MPSTAMP'];
						$method = $row['METHOD'];
						$restrictions = $row['RESTRICTIONS'];
						$salinity = $row['SALINITY'];
						$treatment = $row['TREATMENT'];
						$irr_meth = $row['IRR_METH'];   // MR. WHITE AGREES
						$who = $row['WHO'];    // THE LONGEST TV SERIES EVER
						$paid = $row['PAID'];
						$entered_units = $row['ENTERED_UNITS'];
						$min_oid = $row['MIN_OID'];
						$next_oid = $row['NEXT_OID'];
						$min_did = $row['MIN_DID'];
						$next_did = $row['NEXT_DID'];
						$min_fid = $row['MIN_FID'];
						$max_fid = $row['MAX_FID'];
						$next_fid = $row['NEXT_FID'];
						$diverter_nm = $row['DIVERTER_NM'];
						$owner_nm  = $row['OWNER_NM'];
						$facility_nm  = $row['FACILITY_NM'];
						
						if ($rows ==null){
								$data[] = array("county_nm" => $county_nm,
										"county_cd" => $county_id,
										"wyear"=> $year,
										"huc" => $huc,
										"ws" => $source_cd,
										'mpid'=>$mpid,
										'longt'=>$long,
										'lat'=>$lat,
										'local_desc'=>$local_desc,
										'stream_nm'=> $stream_nm,
										'sic_nm'=>$sic_nm,
										'use_nm'=>$use_nm,
										'aquifer'=>$aquifer,
										"jan" => $row['JAN'],
										"feb" => $row['FEB'],
									    "mar" => $row['MAR'],
									    "apr" => $row['APR'],
									    "may" => $row['MAY'],
									    "jun" => $row['JUN'],
									    "jul" => $row['JUL'],
									    "aug" => $row['AUG'],
										"sept"=> $row['SEP'],
										"oct" => $row['OCT'],
										"nov" => $row['NOV'],
										"dec" => $row['DEC'],
									    "agg" => $row['ANN_AMT'],
										'diverter_id'=>$div_id,
										'diverter_nm'=>$diverter_nm,
										'owner_id'=>$owner_id,
										'owner_nm'=>$owner_nm,
										'facility_id'=>$fac_id,
										'facility_nm'=>$facility_nm,
										'aquifer'=>$aquifer,
										'rec_waste'=>$rec_waste,
										'subtype'=>$subtype,
										'quadno'=>$quadno,
										'opnum'=>$opnum,
										'perm_agency'=>$perm_agency,
										'well_no'=>$well_no,
										'opnum'=>$opnum,
										'perm_agency'=>$perm_agency,
										'well_no'=>$wellno,
										'pump_hp'=>$pump_hp,
										'power_tp'=>$power_tp,
										'div_meth'=>$div_meth,
										'pipe_diam'=>$pipe_diam,
										'well_depth'=>$well_depth,
										'date_drilled'=>$date_drilled,
										'driller_nm'=>$driller_nm,
										'quad1'=>$quad1,
										'quad2'=>$quad2,
										'section'=>$section,
										'range'=>$range,
										'tract'=>$tract,
										'mstamp'=>$mstamp,
										'method'=>$method,
										'restrictions'=>$restrictions,
										'salinity'=>$salinity,
										'treatment'=>$treatment,
										'irr_meth'=>$irr_meth,

										);
							}else{
									$data[] = array("county_nm" => $county_nm,
										"county_cd" => $county_id,
										"wyear"=> $year,
										"huc" => $huc,
										"ws" => $source_cd,
										'mpid'=>$mpid,
										'longt'=>$long,
										'lat'=>$lat,
										'local_desc'=>$local_desc,
										'stream_nm'=> $stream_nm,
										'sic_nm'=>$sic_nm,
										'use_nm'=>$use_nm,
										'aquifer'=>$aquifer,
										'diverter_nm'=>$diverter_nm,
										'owner_id'=>$owner_id,
										'owner_nm'=>$owner_nm,
										'facility_id'=>$fac_id,
										'facility_nm'=>$facility_nm);
							}
						}
					
						
			$i++;
				
		}
	
		if (!empty($data))
		{
			
			return $data;
			
			
			
		}else{
			
			return null;
		}

	
	
	
	}
	
	function insert ($rows =array(),$table_nm){
		$validate = new validate();
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
		//array_push($rows, 'xD');
		
		/*$sql= "INSERT
					INTO ".$table_nm." 
					VALUES (
						".$rows[0]."
					)	
					";
		*/
		$sql = "SELECT * FROM ".$table_nm;
		$parser1 = oci_parse($conn,$sql);
		$err = oci_execute($parser1,OCI_DESCRIBE_ONLY);
		$ncols = oci_num_fields($parser1);
		$maxncols = $ncols;
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
		$sql2 = "SELECT * FROM ANN_DATA";
		$parser2 = oci_parse($conn,$sql2);
		$err = oci_execute($parser2,OCI_DESCRIBE_ONLY);
		$ncols2 = oci_num_fields($parser2);
		$maxncols = $ncols2;
		$columns2= "";
		for ($i = 1; $i <= $ncols2; $i++) {
			$column_name  = oci_field_name($parser2, $i);
			$comma = ',';
			if ($i <$ncols2){
					$x = $column_name.$comma;
			}else{
					$x = $column_name;
			}
			$columns2 .=$x;
		
	
		}
		
		$stringvalue = '';
		$county_cd= $validate->validate_countynm($rows['county_cd']);
		
		if ($table_nm == 'station'){
			if (!$rows['well_depth']){
				$rows['well_depth'] = "";
			}
			
			$stationArray = array($rows['oid'],
												$rows['did'],
												'0',
												$rows['action_cd'],
												$rows['source_cd'],
												$rows['mpid'].'01',
												$rows['aquifer'],
												$rows['rec_waste'],
												null,
												strtoupper($rows['quad_no']),
												strtoupper($rows['operator_no']),
												null,
												strtoupper($rows['well_no']),
												strtoupper($rows['pump_hp']),
												strtoupper($rows['power_tp']),
												strtoupper($rows['diversion_meth']),
												strtoupper($rows['pipe_diam']),
												strtoupper($rows['well_depth']),
												strtoupper($rows['stream_nm']),
												strtoupper($rows['latDMS']),
												strtoupper($rows['lngDMS']),
												strtoupper($rows['elevation']),
												strtoupper($rows['date_drilled']),
												strtoupper($rows['driller']),
												strtoupper($rows['huc']),
												'05',
												strtoupper($county_cd),
												strtoupper($rows['quad1']),
												strtoupper($rows['quad2']),
												strtoupper($rows['section']),
												strtoupper($rows['township']),
												strtoupper($rows['range']),
												strtoupper($rows['dam']),
												strtoupper($rows['local_desc']),
												strtoupper($rows['tract_no']),
												strtoupper($rows['farm_no']),
												'm',
												date('d-M-y'),
												$_SESSION['USER_ID'],
												null,
												null,
												strtoupper($rows['lngDD']),
												strtoupper($rows['latDD'])
												);
								
				$annDataArray = array($rows['oid'],
												$rows['did'],
												$rows['action_cd'],
												$rows['use_cd'],
												$rows['source_cd'],
												$rows['mpid'].'01',
												$rows['year'],
												'0',
												$rows['method'],
												null,
												null,
												null,
												null,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												null,
												$rows['paid'],
												'm',
												date('d-M-y'),
												$_SESSION['USER_ID'],
												null,
												null,
												null,
												null,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												null,
												date('d-M-y'),
												$_SESSION['USER_ID'],
												null
												);
												
			$meterArray = array($rows['mpid'].'01', 
									$rows['flow_meter']);
				
			$string =rtrim(implode("', '", $stationArray), ',');		
			$values =  "'".$string."'";
			$Query= " INTO ".$table_nm." (".$columns.") VALUES (".$values.")";
			
			
			$string3 =rtrim(implode("', '", $meterArray), ',');	
			$values3 ="'".$string3."'";
			$Query3= "  INTO METER (meter.MPID,METER_FLG) VALUES (".$values3.")";
			
			$sqlQuery = "INSERT ALL 
								".$Query." 		
								".$Query3." 		
								SELECT * FROM dual
							";
			
			
			$parser = oci_parse($conn,$sqlQuery);
			$errAdd = oci_execute($parser);
			
			$parserMeter = oci_parse($conn,$Query3);
			$err2 = oci_execute($parserMeter);
				
			#print $sqlQuery;
			#print $Query3;
			if ($errAdd){
				echo json_encode('success');
			}else{
			 
				echo json_encode('error');
			}
		}elseif ($table_nm == "ann_data"){
				#print_r ($rows);	
				$ctr = $rows['id'];
				$convert_this = new converter();
				
				for ($i=1; $i<=$ctr; ++$i){
					
					if ($rows['crop_cd'.$i] == '-001'){
						$rows['rate'.$i] = 0;
						$rows['acres'.$i] =0;
						$rows['total'.$i] =0;
					}
					$exdataArray= array($rows['owner_id'],
										$rows['diverter_id'],
										$rows['mpid'],
										$rows['year'],
										$rows['crop_cd'.$i],
										$rows['acres'.$i],
										$rows['method'.$i],
										$rows['rate'.$i],
										$rows['total'.$i],
										'n',
										null,
										null,
										date('d-M-y'),
										$_SESSION['USER_ID']
										);
					$string1 =rtrim(implode("', '", $exdataArray), ',');		
					$values1 =  "'".$string1."'";
					$sqlQuery1 = "INSERT INTO EXDATA VALUES (".$values1.")";
					$parser = oci_parse($conn,$sqlQuery1);
					$err = oci_execute($parser);
					
				#	print $sqlQuery1;
				}
				
					$jan = $rows['jan'] == null ? 0 : $rows['jan'];
					$feb = $rows['feb'] == null ? 0 : $rows['feb'];
					$mar = $rows['mar'] == null ? 0 : $rows['mar'];
					$apr = $rows['apr'] == null ? 0 : $rows['apr'];
					$may = $rows['may'] == null ? 0 : $rows['may'];
					$jun = $rows['jun'] == null ? 0 : $rows['jun'];
					$jul = $rows['jul'] == null ? 0 : $rows['jul'];
					$aug = $rows['aug'] == null ? 0 : $rows['aug'];
					$oct = $rows['oct'] == null ? 0 : $rows['oct'];
					$sept = $rows['sept'] == null ? 0 : $rows['sept'];
					$nov = $rows['nov'] == null ? 0 : $rows['nov'];
					$dec = $rows['dec'] == null ? 0 : $rows['dec'];
					$units = 'ACFT';
					
					$jan_conv = $convert_this->convert_anndata($units,$jan);
					$feb_conv = $convert_this->convert_anndata($units,$feb);
					$mar_conv = $convert_this->convert_anndata($units,$mar);
					$apr_conv = $convert_this->convert_anndata($units,$apr);
					$may_conv = $convert_this->convert_anndata($units,$may);
					$jun_conv = $convert_this->convert_anndata($units,$jul);
					$jul_conv = $convert_this->convert_anndata($units,$jun);
					$aug_conv = $convert_this->convert_anndata($units,$aug);
					$sept_conv = $convert_this->convert_anndata($units,$sept);
					$oct_conv = $convert_this->convert_anndata($units,$oct);
					$nov_conv = $convert_this->convert_anndata($units,$nov);
					$dec_conv = $convert_this->convert_anndata($units,$dec);
					$total_monthly = $convert_this->convert_anndata($units,$rows['total_monthly']);
					
					#print_r($rows);
					
				
					#print_r ($anndataArray2);
					/*
					
					
			*/
				/*	$sqlQuery2 = "UPDATE ANN_DATA SET ";

					foreach ($anndataArray2 as $cols => $value){
				
							$sqlQuery2 .= $cols."='". $value."', ";
							
						
					}
					$sqlQuery2 = rtrim($sqlQuery2, ", ");
				
					
					foreach ($annDataArrayConds as $cols => $value){
						$condSQL .= $cols."= '".$value."' and ";
						
					}
					$condSQL = rtrim($condSQL, "and ");
					
				
					#print_r($rows);
					
					
					#print $sqlQuery2. ' WHERE '.$condSQL;
					$sqlQueryUpdateAnnData = $sqlQuery2. ' WHERE '.$condSQL;
					
					#print $sqlQueryUpdateAnnData;*/
					
					$annDataArray = array($rows['oid'],
												$rows['did'],
												$rows['action_cd'],
												$rows['use_cd'],
												$rows['source_cd'],
												$rows['mpid'].'01',
												$rows['year'],
												'0',
												$rows['method'],
												null,
												null,
												null,
												null,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												null,
												$rows['paid'],
												'm',
												date('d-M-y'),
												$_SESSION['USER_ID'],
												null,
												null,
												null,
												null,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												0,
												null,
												date('d-M-y'),
												$_SESSION['USER_ID'],
												null
												);
							$annDataArray2 = array(
										'owner_id' => $rows['owner_id'],
										'diverter_id' => $rows['diverter_id'],
										'action_cd' => $rows['action_cd'],
										'use_cd' => $rows['use_cd'],
										'source_cd' => $rows['source_cd'],
										'mpid' => $rows['mpid'],
										'wyear'=>$rows['year'],
										'ann_amt' =>$total_monthly,
										'method' =>$rows['method'],
										'restrictions' =>$rows['restrictions'],
										'salinity' => $rows['salinity'],
										'treatment' => null, // Treatment
										'irr_meth' => null, // irr_meth
										'jan' => $jan_conv,
										'feb' => $feb_conv,
										'mar' => $mar_conv,
										'apr' =>$apr_conv,
										'may' =>$may_conv,
										'jun' =>$jun_conv,
										'jul' =>$jul_conv,
										'aug' =>$aug_conv,
										'sep' =>$sept_conv,
										'oct' =>$oct_conv,
										'nov' =>$nov_conv,
										'dec' =>$dec_conv,
										'who' =>$rows['who'],
										'paid' =>'N',
										'mstamp' =>'y',
										'mdate' =>date('d-M-y'),
										'mname' =>$_SESSION['USER_ID'],
										'from_mpid' =>null,
										'to_mpid' =>null,
										'from_diverter_id' =>null,
										'to_diverter_id' =>null,
										'ent_ann_amt' =>$rows['total_monthly'],
										'ent_jan' =>$jan,
										'ent_feb' =>$feb,
										'ent_mar' =>$mar,
										'ent_apr' =>$apr,
										'ent_may' =>$may,
										'ent_jun' =>$jun,
										'ent_jul' =>$jul,
										'ent_aug' =>$aug,
										'ent_sep' =>$sept,
										'ent_oct' =>$oct,
										'ent_nov' =>$nov,
										'ent_dec' =>$dec,
										'entered_units' =>$units,
										'cdate' =>date('d-M-y'),
										'cname' =>$_SESSION['USER_ID'],
										'centroid' =>null
										);
										
					$annDataArrayConds = array('owner_id' => $rows['owner_id'],
										'diverter_id' => $rows['diverter_id'],
										'mpid' =>$rows['mpid'],
										);						
					$string2 =rtrim(implode("', '", $annDataArray2), ',');	
					
					#print count($annDataArray2).'alex pogi';
					$values2 ="'".$string2."'";
					$Query2= "INSERT INTO ANN_DATA (".$columns2.") VALUES (".$values2.")";
					
					$parser1 = oci_parse($conn,$Query2);
					$err1 = oci_execute($parser1);
					
				#	print_r ($rows);
					#print $Query2;
					
					#print_r($annDataArray2);
					
					if ($err1){
						
						echo json_encode('success');
					}else{
					 
						echo json_encode('error');
					}	
				
				
				
			
				
		
		}else if($table_nm  == 'paymentgateway'){
			
			$validate = new validate();
			$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			
			$sqlCounter = "SELECT MAX(TRANS_ID) FROM ACCOUNT";
			$sqlCounter = "SELECT MAX(TRANS_ID) FROM ACCOUNT";
			$parser = oci_parse($conn,$sqlCounter);
			$err2 = oci_execute($parser);
			
			$row = oci_fetch_array($parser,OCI_BOTH);
			$transID =  ($row[0]+1);
			$newDate = date("d-M-y", strtotime($rows['dateacct']));
		
			
			$accountArray = array($rows['owner_id'],
										$rows['diverter_id'],
										$rows['mpid'],
										$rows['who'],
										$rows['year'],
										$rows['checknoacct'],
										$rows['amtacct'],
										$newDate,
										null,
										date('d-M-y'), 
										$_SESSION['USER_ID'],
										null,
										null,
										$rows['paytypeacc'],
										null,
										null,
										$transID,
										);
				$sqlQueryUpdate2= "UPDATE ANN_DATA SET PAID = 'Y' 
												where mpid ='".$rows['mpid']."'
												AND diverter_id = '".$rows['diverter_id']."'
												AND owner_id = '".$rows['owner_id']."'
												AND wyear = '".$rows['year']."'
												";		
				
				$string1 =rtrim(implode("', '", $accountArray), ',');		
				$values1 =  "'".$string1."'";
				$sqlQuery1 = "INSERT INTO ACCOUNT  VALUES (".$values1.")";
				$parser = oci_parse($conn,$sqlQuery1);
				$parser2 = oci_parse($conn,$sqlQueryUpdate2);
				$err2 = oci_execute($parser);
				$errp = oci_execute($parser2);
			
				
				$successInsert =0;
				$successUpdate =0;
				if ($err2){
					$successInsert=1;
				}
				if ($errp){
					$successUpdate =1;
				}
				
				
				 
				
				if ($errp && $err2){
					echo json_encode('success');
				}else{
					echo json_encode('error');
				}
				

		}else if($table_nm  == 'multipaymentgateway'){
			
			$validate = new validate();
			$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			
			$sqlCounter = "SELECT MAX(TRANS_ID) FROM ACCOUNT";
			$parser = oci_parse($conn,$sqlCounter);
			$err2 = oci_execute($parser);
			
			$row = oci_fetch_array($parser,OCI_BOTH);
			$transID =  ($row[0]+1);
			$newDate = date("d-M-y", strtotime($rows['dateacct']));
			
			$i=0;
			#print_r($rows);
			
			
			$x =  explode(",", $rows['multimpid']);
			$accountArr = array('year' => $rows['year']
										
										);
			
			$i=1;
			$mpidArr = array();
			foreach ($x as $exploded){
				$y = explode(":", $exploded);
				$mpid  = $y[1];
				$dAndO = explode("&",$y[0]);
				
				$diverter_id  =  $dAndO[0];
				$owner_id =  $dAndO[1];
				#$mpidArr = array('mpid' => $mpid);
				
				
				$multiPaymentArray = array(
															$owner_id,
															$diverter_id,
															$mpid,
															$rows['who'],
															$rows['year'],
															$rows['checknoacct'],
															$rows['amtacct'],
															$newDate,
															null,
															date('d-M-y'), 
															$_SESSION['USER_ID'],
															null,
															null,
															$rows['paytypeacc'],
															null,
															null,
															$transID,
										);	
											
														
															
				#$accountArr  = array_merge($accountArr,$mpidArr);					
				$sqlQueryUpdate2= "UPDATE ANN_DATA SET PAID = 'Y' 
												where mpid ='".$mpid."'
												AND diverter_id = '".$diverter_id."'
												AND owner_id = '".$owner_id."'
												AND wyear = '".$rows['year']."'
												";			
				$i +=1;
				
					#print $sqlQueryUpdate2;
			#	print_r ($mpidArr);
					
				#	print $sqlQueryInsertAccount;
				
					$accountString =rtrim(implode("', '", $multiPaymentArray), ',');		
							$accountValues =  "'".$accountString."'";
							$sqlQueryInsertAccount = "INSERT INTO ACCOUNT  VALUES (".$accountValues.")";
					
					$parser = oci_parse($conn,$sqlQueryInsertAccount);
					$parser2 = oci_parse($conn,$sqlQueryUpdate2);
				
					$err2 = oci_execute($parser);
					$errp = oci_execute($parser2);
			
				
			}
			#print $x2;
		
		
			
			
			
			
		
			
			
				
				 
				
				if ($errp && $err2){
					echo json_encode('success');
				}else{
					echo json_encode('error');
				}
				

		}elseif ($table_nm == 'saveodf'){
			$validate = new validate();
			$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
			//array_push($rows, 'xD');
			
			$nm = strtoupper($rows['nm']);
			$sqlInsert= "INSERT 
						INTO ".strtoupper($rows['type'])."
						VALUES (
							'".$rows['id']."',
							'".$nm."',
							'".$rows['use_cd']."',
							'".$rows['phone']."',
							'".$rows['location']."',
							'".$rows['city']."',
							'".$rows['county_cd']."',
							'".$rows['state']."',
							'".$rows['maddress']."',
							'".$rows['mcity']."',
							'".$rows['mstate']."',
							'".$rows['zip']."',	
							'',
							'".date('d-M-y')."',
							'".$_SESSION['USER_ID']."',
							'',
							'',
							'".$rows['comment']."'
							'".$rows['rzip']."'
							)";
				
				$saveod= array($rows['id'],
										strtoupper($rows['nm']),
										$rows['use_cd'],
										$rows['phone'],
										$rows['location'],
										$rows['city'],
										$rows['county_cd'],
										$rows['state'],
										$rows['maddress'],
										$rows['mcity'],
										$rows['mstate'],
										$rows['zip'],
										null,
										date('d-M-y'),
										$_SESSION['USER_ID'],
										null,
										null,
										$rows['comment'],
										$rows['rzip']
										);
					$string1 =rtrim(implode("', '", $saveod), ',');		
					$values1 =  "'".$string1."'";
					$sqlQuery1 = "INSERT INTO ".$rows['type']." VALUES (".$values1.")";
					$parser = oci_parse($conn,$sqlQuery1);
					$err2 = oci_execute($parser);
			#print_r ($rows);
			#print $sqlQuery1;
			
			#$parseInsert = oci_parse($conn,$sqlInsert);
		#	#$err2 = oci_execute($parseInsert);
			if ($err2){
				echo json_encode('success');
			}else{
				
				echo json_encode('error');
			}
			
			
		}
		
			
			
		
	
		
	
			
		
	}
}

class update {
	function updateinfo($arr = array(), $type){
		
		$validate = new validate();
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
		$nm = strtoupper(trim($arr['nm']));
		
		$type = $arr['type'];
		$facilityOwnerAndDiverter = "";
		#print_r ($arr);
		if ($type == "Diverter"){
			$table_nm = "Diverter";
		}elseif ($type == "Owner"){
			$table_nm = "Owner";
		}elseif ($type == "Facility"){
			$table_nm = "Facility";
			
		$fac_diverter = explode ('(', $arr['fac_diverter']);
		$diverter_id = str_replace(')','',$fac_diverter);
		$diverter_id = $diverter_id[1] ? $diverter_id = $diverter_id[1] :$diverter_id = $arr['fac_diverter'];
		
		/*******************************************/
		$fac_owner = explode ('(', $arr['fac_owner']);
		$owner_id = str_replace(')','',$fac_owner);	
		$owner_id = $owner_id[1] ? $owner_id = $owner_id[1]: $owner_id = $arr['fac_owner'];
		$owner_nm = trim($fac_owner[0]);

			$facilityOwnerAndDiverter = ",".$table_nm.".owner_id = '".$owner_id."',".$table_nm.".diverter_id = '".$diverter_id."',".$table_nm.".owner_nm ='".$owner_nm."'";
		}
		#print_r($arr);
	#	print $county_cd;
		
			$county_cd  = $validate->validate_countynm($arr['county']);
			$SetCounty = 	$table_nm.".county_cd ='".$county_cd."',";

			$sqlQuery = "UPDATE 
							".$table_nm." 
							SET 
							".$table_nm.".".$table_nm."_nm = '".$nm."', 
							".$table_nm.".phone = '".trim($arr['phone'])."', 
							".$table_nm.".city = '".strtoupper($arr['rcity'])."', 
							".$table_nm.".location = '".strtoupper($arr['location'])."', 
							".$SetCounty."
							".$table_nm.".state_cd = '".strtoupper($arr['rstate'])."', 
							".$table_nm.".mstreet = '".strtoupper(trim($arr['maddress']))."', 
							".$table_nm.".mcity = '".strtoupper($arr['mcity'])."', 
							".$table_nm.".mstate = '".strtoupper($arr['mstate'])."', 
							".$table_nm.".zip = '".$arr['zip']."', 
							".$table_nm.".mdate = '".date('d-M-y')."', 
							".$table_nm.".mname= '".$_SESSION['USER_ID']."',
							".$table_nm.".comments= '".html_entity_decode($arr['comment'])."',
							".$table_nm.".rzip= '".html_entity_decode($arr['rzip'])."'
							".$facilityOwnerAndDiverter."
							WHERE
							".$table_nm.".".$table_nm."_id= '".$arr['id']."'
							";
	
					#print $sqlQuery;
					$parser1 = oci_parse($conn,$sqlQuery);
					$err1 = oci_execute($parser1);
				#	oci_free_statement($parser1);
					
					if ($err1){
						echo json_encode('success');
					}else{
					 
						echo json_encode('error');
				}	
	}
	function updateMpid($arr =array(),$k,$arrconds= array()){
		
		/*
		$arr = array_map('strtoupper', $arr);

		
		$validate = new validate();
		$convert_this = new converter();
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
	

		if ($arr['new_diverter']){
			$newDiverter = explode('(',$arr['new_diverter']);
			$newDiverter = str_replace(')','',$newDiverter[1]);
			$newDiverterSQL = "diverter_id = '".$newDiverter."',";
		}
		if ($arr['new_owner']){
			$newOwner = explode('(',$arr['new_owner']);
			$newOwner = str_replace(')','',$newOwner[1]);
			$newOwnerSQL = "owner_id = '".$newOwner."',";
		}
		

			$sqlUpdateMPID =  "UPDATE STATION SET ";
			
		
		foreach( $arr as $key => $value){
			
			if ($key == 'mpid-h'){
				$key = "mpid";
			}elseif ($key == 'new_owner'){
				$newOwner = explode('(',$arr['new_owner']);
		
				
				$newOwner = str_replace(')','',$newOwner[1]);
				
			
				$value = $newOwner;
			
				$key = "owner_id";
			}
			elseif ($key == 'new_diverter'){
				$newDiverter = explode('(',$arr['new_diverter']);
				$newDiverter = str_replace(')','',$newDiverter[1]);
				
				if (is_numeric($newDiverter)){
			
				print $newDiverter;
				$value = $newDiverter;
				
				
				$key = "diverter_id";
			}elseif ($key == 'elevation'){
				$key = "altitude";
			}elseif ($key == 'lngDD'){
				$key = 'longitude_dd';
			}elseif ($key == 'latDD'){
				$key = 'latitude_dd';
			}elseif ($key == 'latDMS'){
				$key= 'latitude';
			}elseif($key == 'lngDMS'){
				$key = 'longitude';
			}elseif ($key == 'driller'){
				$key = 'driller_nm';
			}elseif ($key == 'county_station'){
				$key = 'county_cd';
			}elseif ($key == 'aquifer'){
				$key = 'prin_aquifer';
			}elseif ($key == 'source_nm'){
				$key = 'stream_nm';
			}elseif ($key == 'tract_no'){
				$key = 'tract';
			}elseif ($key == 'farm_no'){
				$key = 'farm';
			}elseif ($key == 'mpid-new'){
				$key ='mpid';
			}
				$setQuery = $key."= '".$value."', ";
				$sqlUpdateMPID .= $setQuery;
		}
		
		# $sqlSet =rtrim(trim($sqlUpdateMPID),',');
		$sqlSet  = $sqlUpdateMPID;
		$whereConds = "where diverter_id = '".$arrconds['did']."' AND owner_id= '".$arrconds['oid']."' AND mpid = '".$arrconds['mpid-h']."'";
		
		
		$sqlStation  =  $sqlSet." MDATE = '".date('d-M-y')."', MNAME= '".$_SESSION['USER_ID']."' ". $whereConds;
		if ($arr['mpid-new']){
			$setnewMPID = "MPID = '".$arr['mpid-new']."',";
		}
		$sqlMeter = "UPDATE METER SET ".$setnewMPID." METER_FLG = '".$arrconds['flow_meter']."' WHERE MPID ='".$arrconds['mpid-h']."'";
		$sqlAnnData = "UPDATE ANN_DATA SET ".$setnewMPID." ".$newDiverterSQL." ".$newOwnerSQL." source_cd = '".$arr['source_cd']."', action_cd = '".$arr['action_cd']."', MDATE = '".date('d-M-y')."', MNAME= '".$_SESSION['USER_ID']."' WHERE MPID ='".$arrconds['mpid-h']."'";
		$sqlExData = "UPDATE  EXDATA SET ".$setnewMPID." ".$newDiverterSQL." ".$newOwnerSQL."	MDATE = '".date('d-M-y')."', MNAME= '".$_SESSION['USER_ID']."'  WHERE MPID ='".$arrconds['mpid-h']."'";
	
		print $sqlStation. "\n\n";
		#print $sqlMeter. "\n";
		#print $sqlExData. "\n";
		#print $sqlAnnData. "\n";
	

	
		$parserStation= oci_parse($conn,$sqlStation);
		$errStation = oci_execute($parserStation);	
		
		$parserMeter= oci_parse($conn,$sqlMeter);
		$errMeter = oci_execute($parserMeter);	 
		
		$parserAnnData= oci_parse($conn,$sqlAnnData);
		$errAnnData = oci_execute($parserAnnData);	
		
	
		$parserExdata= oci_parse($conn,$sqlExData);
		$errExdata = oci_execute($parserExdata);
		

		if ($errStation && $errMeter && $errAnnData && $errExdata){
			echo json_encode('success');
		}else{
			echo json_encode('error');
		}
		
	}
		*/

	function updateData($arr =array()){
		function preg_grep_key($pattern, $input) {
				return preg_grep($pattern, array_keys($input));
		}
	
		$validate = new validate();
		$convert_this = new converter();
		$conn = oci_connect('wudba', 'G00dy2shus', 'wudb') or die (oci_error($conn));
		$nm = strtoupper(trim($arr['nm']));
		$county = count($arr['county_cd']);
		$k  = $arr['id'];
		#print_r ($arr);
		$pay = $arr['pay'];
	/*	if (count(preg_grep_key('/^new-crop_cd/', $arr)) === 0) {
				$k =0;
		} else {
				
			$tae = count(preg_grep_key('/^new-crop_cd/', $arr));
			$k = $tae;
				
		}*/
		
	
	
					$jan = $arr['jan'] == null ? 0 : $arr['jan'];
					$feb = $arr['feb'] == null ? 0 : $arr['feb'];
					$mar = $arr['mar'] == null ? 0 : $arr['mar'];
					$apr = $arr['apr'] == null ? 0 : $arr['apr'];
					$may = $arr['may'] == null ? 0 : $arr['may'];
					$jun = $arr['jun'] == null ? 0 : $arr['jun'];
					$jul = $arr['jul'] == null ? 0 : $arr['jul'];
					$aug = $arr['aug'] == null ? 0 : $arr['aug'];
					$oct = $arr['oct'] == null ? 0 : $arr['oct'];
					$sept = $arr['sept'] == null ? 0 : $arr['sept'];
					$nov = $arr['nov'] == null ? 0 : $arr['nov'];
					$dec = $arr['dec'] == null ? 0 : $arr['dec'];
					$units = 'ACFT';
					
					$jan_conv = $convert_this->convert_anndata($units,$jan);
					$feb_conv = $convert_this->convert_anndata($units,$feb);
					$mar_conv = $convert_this->convert_anndata($units,$mar);
					$apr_conv = $convert_this->convert_anndata($units,$apr);
					$may_conv = $convert_this->convert_anndata($units,$may);
					$jun_conv = $convert_this->convert_anndata($units,$jul);
					$jul_conv = $convert_this->convert_anndata($units,$jun);
					$aug_conv = $convert_this->convert_anndata($units,$aug);
					$sept_conv = $convert_this->convert_anndata($units,$sept);
					$oct_conv = $convert_this->convert_anndata($units,$oct);
					$nov_conv = $convert_this->convert_anndata($units,$nov);
					$dec_conv = $convert_this->convert_anndata($units,$dec);
					$total_monthly = $convert_this->convert_anndata($units,$arr['total_monthly']);
	
	
				
		#print_r($arr);
		if ($pay == null){
			$sqlSearchExistingMPID1 = "SELECT * FROM  EXDATA";
			for ($i = 0; $i<=$k; $i++){
				
					if ($arr['new-crop_cd'.$i]){
					
						$exdataArray= array($arr['owner_id'],
										$arr['diverter_id'],
										$arr['mpid'],
										$arr['wyear'],
										$arr['new-crop_cd'.$i],
										$arr['new-acres'.$i],
										$arr['new-method'.$i],
										$arr['new-rate'.$i],
										$arr['new-total'.$i],
										'n',
										null,
										null,
										date('d-M-y'),
										$_SESSION['USER_ID']
										);
								$string1 =rtrim(implode("', '", $exdataArray), ',');		
								$values1 =  "'".$string1."'";
								$sqlQuery1 = "INSERT INTO EXDATA VALUES (".$values1.")";
								#print $sqlQuery1;
							$parserAdd= oci_parse($conn,$sqlQuery1);
							$errAdd = oci_execute($parserAdd);
						
					}elseif ($arr['crop_cd'.$i]){
				
						if ($arr['crop_cd'.$i] == $arr['last-crop'.$i] and
								$arr['acres'.$i] == $arr['last-acres'.$i]  and
									
								$arr['rate'.$i] == $arr['last-rate'.$i] ){
								
								
								
						}else{
							
							$sqlExData = "UPDATE 
										EXDATA
										SET 
											EXDATA.WYEAR = '".$arr['wyear']."',
											EXDATA.CROP_CD = '". $arr['crop_cd'.$i]."',
											EXDATA.ACRES_IRR = '". $arr['acres'.$i]."',
											EXDATA.IRR_METH = '". $arr['method'.$i]."',
											EXDATA.APP_RATE = '". $arr['rate'.$i]."',
											EXDATA.TOT_AMOUNT = '". $arr['total'.$i]."',
											EXDATA.MDATE = '".date('d-M-y')."',
											EXDATA.MNAME= '".$_SESSION['USER_ID']."'
																			
										WHERE
											
											EXDATA.OWNER_ID = '".$arr['owner_id']."' AND
											EXDATA.DIVERTER_ID = '".$arr['diverter_id']."' AND
											EXDATA.MPID = '".$arr['mpid']."' AND
											EXDATA.CROP_CD = '".$arr['last-crop'.$i]."' AND
											EXDATA.ACRES_IRR = '".$arr['last-acres'.$i]."' AND
											
											EXDATA.APP_RATE = '".$arr['last-rate'.$i]."' AND
											EXDATA.WYEAR = '".$arr['wyear']."'
										";
						}
							
					$parser1 = oci_parse($conn,$sqlExData);
					$err1 = oci_execute($parser1);
							
					}
					
				
			
				
					if ($arr['delete-me-crop'.$i] != null){
						$deleteData = " DELETE FROM EXDATA 
													WHERE 
														EXDATA.OWNER_ID = '".$arr['owner_id']."' AND
														EXDATA.DIVERTER_ID = '".$arr['diverter_id']."' AND
														EXDATA.MPID = '".$arr['mpid']."' AND
														EXDATA.CROP_CD = '".$arr['delete-me-crop'.$i]."' AND
														EXDATA.ACRES_IRR = '".$arr['last-acres'.$i]."' AND
														EXDATA.APP_RATE = '".$arr['last-rate'.$i]."' AND
														EXDATA.WYEAR = '".$arr['wyear']."'";
		
						$parser1 = oci_parse($conn,$deleteData);
						$errDel = oci_execute($parser1);				
					
					}
					
			}
					
					
			
				$sqlAnnData ="UPDATE ANN_DATA
									SET	
										ANN_DATA.WYEAR = '".$arr['wyear']."',
										ANN_DATA.ANN_AMT = '".$arr['total_monthly']."',
										ANN_DATA.METHOD = '".$arr['method']."',
										ANN_DATA.RESTRICTIONS  = '".$arr['restrictions']."',
										ANN_DATA.SALINITY  = '".$arr['salinity']."',
										ANN_DATA.JAN  = '".$jan_conv."',
										ANN_DATA.FEB  = '".$feb_conv."',
										ANN_DATA.MAR  = '".$mar_conv."',
										ANN_DATA.APR  = '".$apr_conv."',
										ANN_DATA.MAY  = '".$may_conv."',
										ANN_DATA.JUN  = '".$jun_conv."',
										ANN_DATA.JUL = '".$jul_conv."',
										ANN_DATA.AUG = '".$aug_conv."',
										ANN_DATA.SEP = '".$sept_conv."',
										ANN_DATA.OCT = '".$oct_conv."',
										ANN_DATA.NOV = '".$nov_conv."',
										ANN_DATA.DEC = '".$dec_conv."',
										ANN_DATA.MDATE = '".date('d-M-y')."',
										ANN_DATA.MNAME= '".$_SESSION['USER_ID']."',
										ANN_DATA.ENT_JAN = '".$jan."',
										ANN_DATA.ENT_FEB = '".$feb."',
										ANN_DATA.ENT_MAR = '".$mar."',
										ANN_DATA.ENT_APR = '".$apr."',
										ANN_DATA.ENT_MAY = '".$may."', 
										ANN_DATA.ENT_JUN = '".$jun."', 
										ANN_DATA.ENT_JUL = '".$jul."', 
										ANN_DATA.ENT_AUG = '".$aug."',
										ANN_DATA.ENT_SEP = '".$sept."',
										ANN_DATA.ENT_OCT = '".$oct."',
										ANN_DATA.ENT_NOV = '".$nov."',
										ANN_DATA.ENT_DEC = '".$dec."',
										ANN_DATA.ENTERED_UNITS = '".$units."'
								WHERE
										ANN_DATA.OWNER_ID = '".$arr['owner_id']."' AND
										ANN_DATA.DIVERTER_ID = '".$arr['diverter_id']."' AND
										ANN_DATA.MPID = '".$arr['mpid']."' AND
										ANN_DATA.WYEAR = '".$arr['wyear']."'
										";
					//print $sqlAnnData;	
					$parser = oci_parse($conn,$sqlAnnData);
					$err = oci_execute($parser);	
						
					#	print $sqlAnnData;
					
					if ($err1 && $err || $errAdd){
						echo json_encode('success');
					}else{
						echo json_encode('error');
					}
							
					
		}else{
			//payment
			
			$sqlCounter = "SELECT MAX(TRANS_ID) FROM ACCOUNT";
			$parser = oci_parse($conn,$sqlCounter);
			$err2 = oci_execute($parser);
					
			$row = oci_fetch_array($parser,OCI_BOTH);
			$transID =  ($row[0]+1);
			$meterArray = array($arr['mpid'].'01', 
									"Y");
		
			$string3 =rtrim(implode("', '", $meterArray), ',');	
			$values3 ="'".$string3."'";
			$newDate = date("d-M-y", strtotime($arr['dateacct']));
			$accountArray = array($arr['owner_id'],
										$arr['diverter_id'],
										$arr['mpid'],
										$arr['who'],
										$arr['year'],
										$arr['checknoacct'],
										$arr['amtacct'],
										$newDate,
										null,
										date('d-M-y'), 
										$_SESSION['USER_ID'],
										null,
										null,
										$rows['paytypeacc'],
										null,
										null,
										$transID,
										);
									
				$string1 =rtrim(implode("', '", $accountArray), ',');		
				$values1 =  "'".$string1."'";
			if ($arr['isPaid'] == "No"){
				
					
					$Query3= "INSERT INTO METER (meter.MPID,METER_FLG) VALUES (".$values3.")";
					
					$updateAnnPayment = "UPDATE ANN_DATA
															SET	ANN_DATA.PAID ='Y',
																ANN_DATA.MDATE ='".date('d-M-y')."' ,
																ANN_DATA.MNAME ='".$_SESSION['USER_ID']."' 
															WHERE 
															ANN_DATA.OWNER_ID = '".$arr['owner_id']."' AND
															ANN_DATA.DIVERTER_ID = '".$arr['diverter_id']."' AND
															ANN_DATA.MPID = '".$arr['mpid']."' AND 
															ANN_DATA.WYEAR = '".$arr['wyear']."'";
															
				
					$updateAccount = "INSERT INTO ACCOUNT  VALUES (".$values1.")";
					
			
				
			}else{
					$Query3= "UPDATE  METER SET METER_FLG = 'Y' 
										WHERE MPID = '".$arr['mpid']."'";
					
					$updateAnnPayment = "UPDATE ANN_DATA
															SET	ANN_DATA.PAID ='Y' ,
																ANN_DATA.MDATE ='".date('d-M-y')."' ,
																ANN_DATA.MNAME ='".$_SESSION['USER_ID']."'
															WHERE 
															ANN_DATA.OWNER_ID = '".$arr['owner_id']."' AND
															ANN_DATA.DIVERTER_ID = '".$arr['diverter_id']."' AND
															ANN_DATA.MPID = '".$arr['mpid']."' AND 
															ANN_DATA.WYEAR = '".$arr['wyear']."'";
															
					$updateAccount = "UPDATE ACCOUNT
															SET	
																WHO_PAID  ='".$arr['who']."' ,
																CHECK_NO ='".$arr['checknoacct']."' ,
																AMOUNT ='".$arr['amtacct']."' ,
																DATE_PAID ='".$newDate."' ,
																MDATE ='".date('d-M-y')."',
																MNAME ='".$_SESSION['USER_ID']."',
																PAY_TYPE ='".$arr['paytypeacc']."' 
															WHERE 
															OWNER_ID = '".$arr['owner_id']."' AND
															DIVERTER_ID = '".$arr['diverter_id']."' AND
															MPID = '".$arr['mpid']."' AND 
															WYEAR = '".$arr['wyear']."'";
			}
			
					//print $updateAccount;
		
			$parser = oci_parse($conn,$Query3);
			$err = oci_execute($parser);	
					
			$parser2 = oci_parse($conn,$updateAnnPayment);
			$err2 = oci_execute($parser2);	
		
			$parser3 = oci_parse($conn,$updateAccount);
			$err3 = oci_execute($parser3);	
		
			#print $updateAnnPayment;
			if ($err && $err2 && $err3 && $errDel){
					echo json_encode('successs');
			}else{
					echo json_encode('error');
			}
						
		}
	
		/*for ($i =0; $i<=; $i++){
			print $i;
				$sqlQuery = "UPDATE 
							EXDATA
							SET 
							WYEAR = '".$arr['wyear']."',
							CROP_CD = '".$arr['crop_	cd']."',
							
							WHERE
							".$table_nm.".".$table_nm."_id= '".$arr['id']."'
							";
				print $sqlQuery;
		}*/
	
	
	}
}
class converter{
	
	function convert_anndata($u,$d){
		if ($d != 0){
			#everything is converted into ACFT
			if ($u == 'MG'){
			  $given_amount = $d;
			  $converted_amount = $given_amount * 3.0684;
			 
			 
			}else if ($u == 'MGD'){
				$given_amount = $d;
				$converted_amount = 1119.966 * $given_amount;
				$amt = sprintf('%f',$converted_amount);
			}else if ($u == 'GAL'){
				$given_amount 	= $d;
				$converted_amount	= $given_amount/325851;
				$amt = sprintf('%f',$converted_amount);
			}else{
				$amt = $d;
				
			}
			
		}else{
			$amt = 0;
		}
		
			#$amt = round ($amt, 2);
			return $amt;		
	}
	
}


$cipher = new encrypt();



	


				
?>