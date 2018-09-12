<?php 	
include ("includes/config.php");  
 if(!defined('BASE_PATH')) {
   die('Direct access not permitted');
}; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta charset="UTF-8">
<?php include ("includes/header_config.php"); ?>
<script>
// OBFUSCATE ME LATER :d
function microtime(floatnumber){
	
	var unixtime_ms = (new Date).getTime();
	var seconds = Math.floor(unixtime_ms/1000);
	return floatnumber ? (unixtime_ms/1000) : (unixtime_ms - (seconds * 1000))/1000+ '';
}


function getResult(absURL,c,ctxt,yf,yt,h,sm,sw,usecd,siccd,aquifer){
		
		$("#span_result").empty();
		$("#download-div").empty();
		$("#result-div").hide();
		$("#result-tbl").empty();
		$(".pager").empty();
		$(".loading-div").show();
		$(".loading-div").append(" <img src = '../wateruse/includes/css/img/loading.gif' height='30'> </img><span> Loading data. Please Wait...</span> ");	
		$("#submit_data").attr("disabled","disabled");
		var downloadfiletype;
		var reportabsURL;
		var countyabsURL;
		var hucabsURL;
		var streamabsURL;
		var watersourceabsURL;
		var sourceabsURL;
		var yearfromabsURL;
		var yeartoabasURL;
		var usecdabsURL;
		var aquiferabsURL;
			if (c !="all"){
				countyabsURL = "&countycd="+c;	
			}else{
				countyabsURL ="&countycd=all";
			}
			if (h !="all"){
				hucabsURL = "&huc=all";
			}else{
				hucabsURL = "&huc=all";
			}
			if (sm !="all"){
				streamabsURL = "&streamnm="+sm
			}else{
				streamabsURL = "&streamnm=all"
			}
			if (sw !="all"){
				sourceabsURL = "&watersource="+sw;
			}else{
				sourceabsURL = "&watersource=all";
			}
			if (usecd !="all"){
				usecdabsURL = "&use_cd="+usecd;
			}else{
				usecdabsURL = "&use_cd=all";
			}
			if (siccd !="all"){
				siccdabsURL = "&sic_cd="+siccd;
			}else{
				siccdabsURL = "&sic_cd=all";
			}
			if (aquifer !="all"){
				aquiferabsURL = "&aquifer="+aquifer;
			}else{
				aquiferabsURL = "&aquifer=all";
			}
				
		
		if (yt != null){
			yearRange ="("+yf+"-"+yt+")";
		}else{
			yearRange ="("+yf+")";
		}
		$.ajax ({
			
			TYPE: "GET",
			url: "../wateruse/controller/getResult"+absURL,
			ContentType:"application/json",
			dataType:"jsonp",
			success:function(data){
				
				$('body,html').animate({scrollTop : 625}, 500);
				$("#result-div").show();
				$(".result-div").focus();
				var err = $.trim(data);
				reportabsURL = absURL;
				
				
				
				if (err == 0){
					$(".loading-div").empty();
					$(".loading-div").hide();
					$("#submit_data").removeAttr("disabled");
					$("#span_result").append("No Search Results in About "+microtime()+" milliseconds. Please try again.");	
					//$("#span_result").append("<a href='../wateruse/controller/getResult.php"+reportabsURL+"' id ='debugger'> Click to debug result </a>");	
					$("#result-tbl").empty();
					
				}
				else{
					
					$("#span_result").empty();
					$(".loading-div").empty();
					$(".loading-div").hide();
					$("#submit_data").removeAttr("disabled");
					
					
					/*debug only 
					
					if (c.length < 2){
						$("#span_result").append("Number of Result for "+ctxt+" are "+data.length+" in About "+microtime()+" milliseconds");
						$("#span_result").append("<a href='../wateruse2/controller/getResult.php"+reportabsURL+"' id ='debugger'> Click to debug result </a>");	
					
					}else if (c.lenght >2){
						$("#span_result").append("Number of Result for "+c.length+" keywords  are "+data.length+" in About "+microtime()+" milliseconds");	
						$("#span_result").append("<a href='../wateruse2/controller/getResult.php"+reportabsURL+"' id ='debugger'> Click to debug result </a>");	
					
					}else{
						
						if (c == "all"){
							$("#span_result").append("Number of Result for Statewide is "+data.length+" in About "+microtime()+" milliseconds");	
							$("#span_result").append("<a href='../wateruse2/controller/getResult.php"+reportabsURL+"' id ='debugger'> Click to debug result </a>");	
						}else{
							$("#span_result").append("Number of Result for "+c.length+" keywords  are "+data.length+" in About "+microtime()+" milliseconds");	
							$("#span_result").append("<a href='../wateruse2/controller/getResult.php"+reportabsURL+"' id ='debugger'> Click to debug result </a>");		
						}
						
					}
					
					*/
					
					
					
					$("#download-div").append("<label for ='downloads'> Download this dataset as  </label> <select id='downloads'><option value=''>Select Type</option> <option value='csv'><i class='icon-file-text'></i>Comma Separated Value (CSV)</option> <!-- <option value ='pdf'> PDF </option>--></select>");
				
					$("#downloads").change(function(){
						downloadfiletype = $(this).val();
						//@params c,ctxt,yf,yt,h,sm,sw
						
						if (downloadfiletype == "csv"){
							//window.open("../wateruse/controller/report.php?q="+all
							//append the URL :)
							
							reportabsURL = "?q="+downloadfiletype+countyabsURL+hucabsURL+streamabsURL+sourceabsURL+"&yearfrom="+yf+"&yearto="+yt+usecdabsURL+siccdabsURL+aquiferabsURL+"&ilf=true";
							window.open("../wateruse/controller/getResult"+reportabsURL, "___blank");
							//document.title("Report for" +ctxt);
							//console.log(reportabsURL);
							
						}else if (downloadfiletype == "pdf"){
							reportabsURL = "?q="+downloadfiletype+countyabsURL+hucabsURL+streamabsURL+sourceabsURL+"&yearfrom="+yf+"&yearto="+yt+usecdabsURL+siccdabsURL+aquiferabsURL+"&ilf=true";
							var ReportWindow = window.open("../wateruse/controller/reports.php"+reportabsURL, "___blank");
							//ReportWindow = document.title("PDF for" +ctxt);
							//console.log(reportabsURL);
						}
					});
					
					$("#result-tbl thead th").css("padding","15px");
					var k =1;
				
					
					$("#result-tbl").append("<thead><tr><th>County</th><th>Year</th><th>HUC</th><th>Water Source</th><th>Stream Name</th><th>Aquifer</th><th>MPID</th><th>Local Description</th><th>Longitude</th><th>Latitude</th><th>Use Type</th><th>Crop Type</th><th>Diverter ID</th><th>Diverter Name</th><th>Owner ID</th><th>Owner Name</th><th>Facility ID</th><th>Facility Name</th></tr></thead>");				
					
					$.each(data, function (i,item) {
						
					if (data[i] != "" ){
						
						var owner;
						var facility_id;
						var aquifer;
					
						owner = data[i].owner_id;
						facility_id= data[i].facility_id;
						aquifer = data[i].aquifer;
					
						if (facility_id == '0'){
							facility_id = 'N/A';
						}
					
							
						
						if (data[i].facility_nm == null){
							data[i].facility_nm = "N/A";
						}
						if (data[i].stream_nm == null){
							data[i].stream_nm = "N/A";
						}
						if (aquifer == '110ALVM' || aquifer == '112ALVM' || aquifer == '112TRRC'){
							aquifer = "Alluvium";
						}else if (aquifer == '124CCFK'){
							aquifer = "Cockfield Formation";
						}else if (aquifer == '124CRVR'){
							aquifer = "Cane River Formation";
						}else if (aquifer == '12405MP' || aquifer == '124SPRT'){
							aquifer = "Sparta-Memphis Sand";
						}else if (aquifer == '125CLTN' || aquifer == '125MDWY'){
							aquifer = "Clayton Formation";
						}else if (aquifer == '211NCTC'){
							aquifer = "Nacatoch Sand"
						}else if (aquifer == '212TOKO'){
							aquifer = "Tokio Formation";
						}else if (aquifer == '212TRNT'){
							aquifer = "Trinity Formation";
						}else if (aquifer == '300PLZC' || aquifer == '300PLZC' ||aquifer == '326ATOK' || aquifer == '330ARKS' || aquifer == '331PKTN' || aquifer == '360ODVC' || aquifer == '364EVRN' || aquifer == '364STPR' || aquifer == '367CTTR' || aquifer == '367GNTR'  || aquifer == '367GSCD' || aquifer == '367RBDX' || aquifer == '368PWLL' || aquifer ==  '370CMBR' || aquifer == '371POTS'){
							aquifer = "Rocks of Paleozoic age undifferentiated";
						}
			
						
						var $ws= data[i].ws;
						if ($ws == "GW"){
							$ws = "GROUND WATER";
						}else if ($ws == "SW"){
							$ws = "SURFACE WATER";
						}
						var $crop = $("#crop").val();
						if (data[i].owner_id != null && data[i].diverter_id !=null){
							$("#result-tbl").append("<tr><td>" +data[i].county_nm+" ("+data[i].county_cd+") </td><td>" + data[i].wyear + "</td><td>" + data[i].huc + "</td><td>" + $ws + "</td><td>" + data[i].stream_nm + "</td><td>"+aquifer+"</td><td>" + data[i].mpid + "</td><td>" + data[i].local_desc + "</td><td>" + data[i].longt + "</td><td>" + data[i].lat + "</td><td>" + data[i].use_nm + "</td><td>" + data[i].sic_nm + "</td><td>"+data[i].diverter_id+"</td><td>"+data[i].diverter_nm+"</td><td>"+data[i].owner_id+"</td><td>"+data[i].owner_nm+"</td><td>"+facility_id+"</td><td>"+data[i].facility_nm+"</td></tr> ");
						
						}
					
						k++;
						}
					});
						$("#result-tbl").append("<tfoot id='lefooter'><tr><td>County</td><td>Year</td><td>HUC</td><td>Water Source</td><td>Stream Name</td><td>Aquifer</td><td>MPID</td><td>Local Description</td><td>Longitude</td><td>Latitude</td><td>Use Type</td><td>Crop Type</td><td>Diverter ID</td><td>Diverter Name</td><td>Owner ID</td><td>Owner Name</td><td>Facility ID</td><td>Facility Name</td></tr></tfoot>");				
						$("#result-tbl td").css("padding","15px");
						
						$("#result-tbl").DataTable({
							fixedHeader:true,
							destroy: true,
							searching: true,
							scrollX:true,
							scrollY:true,
							scrollCollapse: true,
							responsive:true,
							
							sDom: '<"top"<"actions">lfi<"clear">><"clear">rtp<"bottom">'
							}); 
						
	
					
						
				}
				
			
			},
			error:function(err, ajaxOptions, throwError){
				//alert("Status:"+ err.status +"\n"+ throwError);
				$("#submit_data").removeAttr("disabled");
				if (err.status == '500'){
					
					var asktodownloadCSV = confirm ("Error: Unable to fetch Data. The Data set is too big. Please limit your search queries ("+throwError+"). Would you like to download it on CSV instead?");
					if (asktodownloadCSV == true){
						downloadfiletype = 'csv';
						reportabsURL = "?q="+downloadfiletype+countyabsURL+hucabsURL+streamabsURL+sourceabsURL+"&yearfrom="+yf+"&yearto="+yt+usecdabsURL+siccdabsURL+aquiferabsURL+"&ilf=true";
						var reportWidnwindow = window.open("../wateruse/controller/reports.php"+reportabsURL, "___blank");	
						$(".loading-div").empty();
						$("#result-tbl").DataTable({
						destroy: true});
						$("#result-tbl_wrapper").hide();
						$(".main").focus();
						$("#result-tbl").empty();
						
						$("#select-year-from").prop("selectedIndex","0");
						$("#select-year-to").prop("selectedIndex","0");
						$("#select-year-to").val("");
						$("#select-year-to").empty();
						return true;
					}else{
						
						$(".loading-div").empty();
						$("#result-tbl").DataTable({
						destroy: true});
						$("#result-tbl_wrapper").hide();
						$(".main").focus();
						$("#result-tbl").empty();
						$("#submit_data").removeAttr("disabled");
						$("#select-year-from").prop("selectedIndex","0");
						$("#select-year-to").prop("selectedIndex","0");
						$("#select-year-to").val("");
						$("#select-year-to").empty();
						return false;
					}
						
					
				}else if (err.status == '200'){
					alert("Error on Dataset");
					// add contact details?
					 
				}
				
			}
				
			
		})
	

}

function fetchcounty(){
	$("#cd").empty();
	$("#cd").append('<option disabled>Loading data please wait...<option>');
	$.ajax ({
			type: "POST",
			url: "../wateruse/json/fetchcounty",
			ContentType: "application/json",
			dataType: "json",
			success:function(data){
				$("#cd").empty();
				$.each (data, function (i,item){
					$("#cd").append("<option value='"+data[i].cd+"'>"+data[i].nm+"</option>");
				});
				$("#cd").select2();
			}
	});

}
function fetchhuc(){
		$("#huc").empty();
		$("#huc").append('<option disabled>Loading data please wait...<option>');
		$.ajax ({
				type: "POST",
				url: "../wateruse/json/fetchhuc",
				ContentType: "application/json",
				dataType: "json",
				success:function(data){
					$("#huc").empty();
					$.each (data, function (i,item){
						$("#huc").append('<option value = "\''+data[i].huc+'\'">'+data[i].huc+'</option> ');
					});
					$("#huc").select2();
				}
		});

}
function fetchstream(){
		$("#stream").empty();
		$("#stream").append('<option disabled>Loading data please wait...<option>');
		$.ajax ({
				type: "POST",
				url: "../wateruse/json/fetchstream",
				ContentType: "application/json",
				dataType: "json",
				success:function(data){
					$("#stream").empty();
					$("#stream").append('<option value = "\'UNKNOWN\',\'--\',\'null\'">UNKNOWN</option> ');
					$.each (data, function (i,item){
						$("#stream").append('<option value = "\''+data[i].stream_nm+'\'">'+data[i].stream_nm+'</option> ');
					});
					$("#stream").select2();
				}
		});
	
}
function fetchusetype(){
		$("#use").empty();
		$("#use").append('<option disabled>Loading Data please wait...<option>');
		$.ajax ({
				type: "POST",
				url: "../wateruse/json/fetchusetype",
				ContentType: "application/json",
				dataType: "json",
				success:function(data){
					$("#use").empty();
					$.each (data, function (i,item){
						if (data[i].use_cd != 'AG' || data[i].use_cd != 'IR'){
							
							
						$("#use").append('<option value = "\''+data[i].use_cd+'\'">'+data[i].use_nm+'</option> ');
							
						}
						
					
					});
					$("#use").select2();
				}
		});

}

function fetchcroptype(use_cd){
		$("#crop").empty();
		$("#crop").append('<option disabled>Loading Data please wait...<option>');
		$.ajax ({
				type: "POST",
				url: "../wateruse/json/fetchcroptype?use_cd="+use_cd,
				ContentType: "application/json",
				dataType: "json",
				success:function(data){
					$("#crop").empty();
					$.each (data, function (i,item){
						$("#crop").append('<option value = "\''+data[i].sic_cd+'\'">'+data[i].sic_nm+' ('+data[i].sic_cd+')</option> ');
					});
					$("#crop").select2();
				}
		});

}

function yearfromddl(){
		// get Current Year
		var currYear = new Date().getFullYear();
		// this is constant as required
		var startYear = '1985';
		// loop the difference. In this, the year will be dynamic 
		var $i;
		$("#select-year-from").append("<option value ='' default> Select Year</option>");
		for ($i =startYear; $i<=currYear; $i++){
			$("#select-year-from").append("<option value='"+$i+"'>"+$i+"</option>");
		}
}

function yeartoddl(year){

		// destroy select-year-to everytime the function is called
		$("#select-year-to").empty();
		// get Current Year
		var currYear = new Date().getFullYear();
		// startYear will be based on the input 
		var startYear = year;
		// loop the difference. In this, the year will be dynamic 
		var $i;
		for ($i =startYear; $i<=currYear; $i++){
			$("#select-year-to").append("<option value='"+$i+"'>"+$i+"</option>");
		}
		
}

$(document).ready(function(){

	// POPULAT LIST
	fetchcounty(); // Fetch county on db
	fetchhuc(); //fetch huc on db
	fetchstream(); //fetch stream on db
	fetchusetype(); //fetch usetype on db
	fetchcroptype('all'); // fetch croptype on default
	var page = $("#the_decider").val();
	var the_decider  = null;
	if (page == 'pub'){
		the_decider = "wupd";
	}else{
		the_decider = "wuid";
	}
	$("#use").change(function(){
		var use_cd = $(this).val();
		if (use_cd == null){
			fetchcroptype('all');	 //fetch croptype on db
		}else{
			fetchcroptype(use_cd);
		}
	});

	yearfromddl(); // generate date
	
	
	/* INITIATE WHAT'S HIDDEN OR ANY VARIABLES	*/
	var year;
	
	$("#download-div").show();
	$("#deselect").hide();
	$("#sw").select2();
	$("#aquifer").select2();
	
	/* call yearto function to pass the value of select-year-from selectbox */
	$("#select-year-from").change(function(){
		year = $(this).val();
		yeartoddl(year);
	});
	$("#use-type-info").simpletip({content:"It will populate the Input box below.",fixed: true});
	$("#huc-type-info").simpletip({content:"Huc is Hydrologic unit. <a href='http://water.usgs.gov/GIS/huc.html' target='__blank'>Click this for more Information.</a> ",fixed: true});
	$("#select-year-to-lbl").simpletip({content:"Important! Please Select a year.",fixed: true});
	$("#wateruse-type-info").simpletip({content:"Note: Lorem Ipsum Dolor set amet ..."})
	
	// trigger submit data btn


	$("#submit_data").click(function(){
	
		var county = $("#cd").val();
		var huc = $("#huc").val();
		var sw = $("#sw").val();
		var stream_nm = $("#stream").val();
		var use_cd = $("#use").val();
		var sic_cd = encodeURIComponent($("#crop").val());
		var countytxt = $("#cd option:selected").text();
		var yearfrom = $("#select-year-from").val();
		var yearto = $("#select-year-to").val();
		var aquifer = $("#aquifer").val();
		
		
		var absurl_yearto = "";
		var keyword;
		/* empty message div every trigger */
		$(".message").empty();
		
		if (yearto != null){
			absurl_yearto = "&yearto="+yearto
		}
		if (yearfrom != "" ){
			
			if (county == null){
				county = 'all';
			}
			if (huc == null){
				huc = 'all';
			}
			if (sw == null){
				sw = 'all';
			}
			if (stream_nm == null){
				stream_nm = 'all';
			}
			if (use_cd == null){
				use_cd = 'all';
			}
			if (sic_cd == 'null'){
				sic_cd = 'all';
			}	
			if (aquifer == null){
				aquifer = 'all';
			}
			
			
			if (county == 'all' || stream_nm == 'all' && sic_cd == 'all' && use_cd == 'all'){
					var askme = confirm('The site might crash because the dataset is too big. Continue anyways?');
					if (askme == true){
						keyword = "?p="+the_decider+"&countycd="+county +"&yearfrom="+yearfrom+absurl_yearto+"&huc="+huc+"&watersource="+sw+"&streamnm="+stream_nm+"&use_cd="+use_cd+"&sic_cd="+sic_cd+"&aquifer="+aquifer;
						console.debug(keyword);
						getResult(keyword, county,countytxt ,yearfrom,yearto,huc,stream_nm,sw,use_cd,sic_cd,aquifer);
						return true;
					
					}else{
						return false;
						
					}
			}else{
					keyword = "?p="+the_decider+"&countycd="+county +"&yearfrom="+yearfrom+absurl_yearto+"&huc="+huc+"&watersource="+sw+"&streamnm="+stream_nm+"&use_cd="+use_cd+"&sic_cd="+sic_cd+"&aquifer="+aquifer;
					//console.debug(keyword);
					getResult(keyword, county,countytxt ,yearfrom,yearto,huc,stream_nm,sw,use_cd,sic_cd,aquifer);
				
			}
		
			//console.debug(keyword);
			
		}else{
			$("#span_result").empty();
			$("#download-div").empty();

			$(".message").append("<div id ='error'> <img src = '../wateruse/includes/css/img/error.svg' height='18'></img> <span id ='spandacan' > Please select a year. <span id ='close'> (click to dismiss)</span> </span></div>");
		
			
			$('#select-year-from').css(
						{
							border: "3px solid red",
							opacity: "0.2"
						}).animate(
						{
							borderWidth:"1px",
							opacity: "1"
						},500);
		
			$(".message #close").css("cursor","pointer");
			$("#error #close").click (function(){
				$(".message").empty();
				$("#error").empty();
				$('#select-year-from').css("border-color","rgb(169, 169, 169)").animate({borderWidth:"1px"},300);
		
			});
			$("#error #close").click(function(){
				$('#select-year-from').css("border-color","rgb(169, 169, 169)").animate({borderWidth:"1px"},300);
		
			});
			$("#select-year-from").change(function(){
				$(".message").empty();
				$("#error").empty();
				$('#select-year-from').css("border-color","rgb(169, 169, 169)").animate({borderWidth:"1px"},300);
			});
		}
		
		
	});
	
	
});
</script>
</head>
<body>
<?php include("header_new.php"); ?>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <img src = "../wateruse/includes/css/img/wuseloading.gif" id='loading'>
    <div class='loading'> Loading </div>
  </div>

</div>
<div class= 'main'>
	<!--Select County:<input type ='text' id ='search'> -->

<div class='params-div'>
<?php 
$page = $_GET['q'];
if (empty($page)){
		echo '<h3> Water Use Public Search &nbsp; <label><a href="#" id ="wateruse-type-info"><img src = "../wateruse/includes/css/img/info.png"></img></a></label> </h3>';
}
 

 if ($_SESSION){
	 
	if ($page == 'pub' || $page == 'public' ||$page == 'public_data') { 
		echo '<h3> Water Use Public Search &nbsp; <label><a href="#" id ="wateruse-type-info"><img src = "../wateruse/includes/css/img/info.png"></img></a></label> </h3>';
	}
	elseif ($page == 'int' || $page == 'internal' || $page == 'internal_data'){
		echo '<h3> Water Use Search </h3>';
	}else{
		echo '<script> window.location.href ="../wateruse/page-not-found"; </script>';
	
	}
	
 }else{
	 
	 if ($page == 'pub' || $page == 'public' ||$page == 'public_data') { 
		echo '<h3> Water Use Public Search &nbsp; <label><a href="#" id ="wateruse-type-info"><img src = "../wateruse/includes/css/img/info.png"></img></a></label> </h3>';
	}
	elseif ($page == 'int' || $page == 'internal' || $page == 'internal_data'){
		echo '<script>alert("Login is required. Please login to continue."); window.location.href ="../wateruse/accounts/?redirect=internal";</script>';
	}else{
		
		echo '<script> window.location.href ="../wateruse/page-not-found"; </script>';
	}
 }
 ?>
	<div class='message'> </div>
		<table class='params-tbl'>
			<tr>
				<td><label for='cd'>County:&nbsp;</label></td>
				<td><select id='cd' class='chosen-ddl' multiple ='true' data-placeholder='Statewide' name='county[]'></select></td>
			</tr>
			<tr>
				<td><label for='huc'>HUC Code:&nbsp;</label></td>
				<td><select id ='huc' class='chosen-ddl' multiple = 'true' data-placeholder='All HUCS' name = 'huc[]'> </select>
				<label><a href="#" id ='huc-type-info'><img src = "../wateruse/includes/css/img/info.png"></img></a></label></td>
			</tr>
			<tr>
				<td><label for='huc'>Water Source:&nbsp;</label></td>
				<td><select id ='sw' class='chosen-ddl' multiple = 'true' data-placeholder='All Sources' name ='ws[]'>
					<option value="'sw'"> Surface Water </option>
					<option value ="'gw'"> Ground Water </option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for='stream'>Stream Name:&nbsp;</label></td>
				<td><select id ='stream' class='chosen-ddl' multiple = 'true' data-placeholder='All Streams' name = 'stream[]'> </select></td>
			</tr>
			<tr>
				<td><label for ='aquifer'>Aquifer:&nbsp;</td>
				<td><select class='chosen-ddl' name='prin_aquifer' multiple= 'true' id="aquifer" data-placeholder = 'All Aquifers'>
	
					<option value="Deposits">Alluvium</option>
					<option value="Cockfield">Cockfield Formation</option>
					<option value="Cane">Cane River Formation</option>
					<option value="Sparta">Sparta-Memphis Sand</option>
					<option value="Wilcox">Wilcox Group undifferentiated</option>
					<option value="Clayton">Clayton Formation</option>
					<option value="Nacatoch">Nacatoch Sand</option>
					<option value="Tokio">Tokio Formation</option>
					<option value="Trinity">Trinity Group</option>
					<option value="Rocks">Rocks of Paleozoic Age undifferentiated</option>
					<option value='Unknown'>Others</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for = 'select-year-from'>Use Category:&nbsp; </label></td>
				<td><select id='use' class = 'chosen-ddl' multiple = 'true' data-placeholder='All Use Category' name = 'usetype[]'> </select>
				<label><a href="#" id ='use-type-info'><img src = "../wateruse/includes/css/img/info.png"></img></a></label> </td>
			</tr>
			<tr>
				<td><label for = 'select-year-from'>Use Type:&nbsp;</label></td>
				<td><select id='crop' class = 'chosen-ddl' multiple = 'true' data-placeholder='All Use Type' name = 'crop[]'> </select> 
				</td>
			</tr>
			<tr>
				<td><label for = 'select-year-from'>Year Range:&nbsp;</label></td>
				<td><select id='select-year-from' class='year-select'></select> 
				<label for ='select-year-to'> to </label>
				<select id='select-year-to' class='year-select'></select>
				<label for ='select-year-to' id ="select-year-to-lbl"><span style='color:red'>*</span></label></td>
			</tr>
			<tr>
				<td><button id ='submit_data'>Submit Data</button></td>
			</tr>
		</table>
</div>
<input type='hidden' value = '<?php $page = $_GET['q']; print $page;?>' id='the_decider' />
<div class="loading-div">&nbsp;&nbsp;</div>
<div id="cs-result"><div id ="span_result"> </div> <div id="download-div"> </div></div>
<div class='result-div'> <table id = "result-tbl"></table ></div>
</div>
<a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>
</body></html>



