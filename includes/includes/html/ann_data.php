<?php 	
include ("includes/config.php");  
 if(!defined('BASE_PATH')) {
   die('Direct access not permitted');
}; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<?php include ("includes/header_config.php"); ?>
<script>

function microtime(floatnumber){
	
	var unixtime_ms = (new Date).getTime();
	var seconds = Math.floor(unixtime_ms/1000);
	return floatnumber ? (unixtime_ms/1000) : (unixtime_ms - (seconds * 1000))/1000+ '';
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
					$("#cd").append("<option value='"+data[i].cd+"'>"+data[i].nm+" ("+data[i].cd+")</option>");
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


function year(){
		// get Current Year
		var currYear = new Date().getFullYear();
		// this is constant as required
		var startYear = '1985';
		// loop the difference. In this, the year will be dynamic 
		var $i;
		$("#select-year").append("<option value ='' default> Select Year</option>");
		for ($i =startYear; $i<=currYear; $i++){
			$("#select-year").append("<option value='"+$i+"'>"+$i+"</option>");
		}
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
function warnPrint(){
	
	$("body").keydown(function(k){
		
		if (k.ctrlKey && k.which == 80){
			return alert("Warning! If you wish to print this Report as PDF. Please Download it using the Download as [\"Download this Report as\"] below the Submit Button");
		}
	});
}

function preciseRound(num,numofdec){
	var decimal = 1;
	for (var i=0; i<numofdec; i++){
		decimal += "0";
	}
    return Math.round(num * decimal) / decimal;
}
function getAnnualData(keyword,typeofStats,county,year,huc,water_source,stream_nm,aquifer){
	$(".message").empty();
	//empty result-tbl every time this function get called
	$("#statistics-disclaimer").hide();
	$("#report-title").empty();
	$("#span_result").empty();
	$("#download-div").empty();
	$("#graph-div").empty();
	$("#graph-div").attr("style","display:none");
	$("#result-div").hide();
	$("#result-tbl").empty();
	$("#submit_data").attr("disabled","disabled");
	$(".loading-div .loading").append(" <img src = '../wateruse/includes/css/img/loading.gif' height='30'> </img><span> Loading data. Please Wait...</span> ");	
	$.ajax ({
			
		TYPE: "GET",
		url: "../wateruse/controller/annData"+keyword,
		ContentType:"application/json",
		dataType:"json",
		success:function(data){
			
			$("#submit_data").attr("enabled","enabled");
		},
		error:function(err,ajaxOptions, throwError){
			alert(err.status);
		}
	});
}

$(document).ready(function(){
	fetchcounty();
	fetchhuc();
	fetchstream();
    year();
	$("#sw").change(function(){
		var watersource = $(this).val();
		if (watersource == "'sw'"){
			$("#aquifer-td").hide(); 
		}else{
			$("#aquifer-td").show(); 
		}
	});
	$("#sw").select2();
	$("#aquifer").select2();
	$("#select-year").select2();
	
	$("#blob-type").select2();

	$("#statistics-disclaimer").hide();
	
	
	
	$("#submit_data").click(function(){
		var county = $("#cd").val();
	
		var huc = $("#huc").val();
		var water_source = $("#sw").val();
		var stream_nm = $("#stream").val();
		var aquifer = $("#aquifer").val();
		var year = $("#select-year").val();
		var the_decider = $("#the_decider").val();
		var file_type = $("#blob-type").val();
		var keyword;
		var county_name = "";
		var i = 0;
		 
		$("#cd option:selected").each(function(){
			county_name +=  " | " +$(this).text();
			i++;
		});
		
		
		if (county_name != ""){
			
			county_name = county_name.substr(2);
			
		}else{
			county_name = 'Statewide';
		}
		
		
		if (county == null){
			county = 'all';
		}
		
		
		if (huc == null){
			huc = 'all';
		}
		if (water_source == null){
			water_source = 'all';
		}
		if (stream_nm == null){
			stream_nm = 'all';
		}
		if (water_source == null){
			water_source = 'all';
		}
		if (aquifer == null){
			aquifer = 'all';
		}
		if (year == ""){
			$(".message").append("<div id ='error'> <img src = '../wateruse/includes/css/img/error.svg' height='18'></img> <span id ='spandacan' > Please select a year. <span id ='close'> (click to dismiss)</span> </span></div>");
		}else{
			if (the_decider != "surfacewater"){
				keyword = "?p="+the_decider+"&countycd="+county +"&year="+year+"&huc="+huc+"&watersource="+water_source+"&streamnm="+stream_nm+"&aquifer="+aquifer;
			}else{
				keyword = "?p="+the_decider+"&countycd="+county +"&year="+year+"&huc="+huc+"&watersource='sw'&streamnm="+stream_nm+"&aquifer="+aquifer;
			}
			
			window.location.href = "../wateruse/controller/annData"+keyword+"&q="+file_type;
			
			//window.location.href = "../wateruse/controller/annData"+keyword+"&q="+file_type;
			//getAnnualData(keyword,the_decider,county_name,year,huc,water_source,stream_nm,aquifer);
		}
		$("#error #close").click (function(){
			$(".message").empty();
			$("#error").empty();
			$('#select-year').css("border-color","rgb(169, 169, 169)").animate({borderWidth:"1px"},300);
		
		});
		$("#tools-overlay #closemodal-graph").click(function(evt){
				var display = $("#graphPie").css("display");
				if(display == 'block'){
					$("#myModal .modal-content #tools-overlay").hide();
					$("#myModal .modal-content #graph-overlay ").hide();		
					$("#myModal .modal-content #choice-overlay").show();
					modalDefaults.choiceSize();
				}
				$("#myModal").css("display","none");
				
		});
	});
	
});
</script>
<body>

<?php include("header_new.php"); ?>

<div class= 'main'>
<div id = 'svgdataurl'></div>
	<div id="myModal" class="modal">

	  <!-- Modal content -->

	  <div class="modal-content" >
	
	  <?php $page = $_GET['q'];
		if ($page == 'monthly'){
			echo "<div id='choice-overlay'><a id='closemodal-graph'><i class ='fa  fa-close'></i> </a> <div id ='choice'>Please select option: </div>";
			echo "<div class ='chartChoice-div'><ul><li> <a id='pie' class='graphChoice'><i class='fa fa-pie-chart'></i>  Pie Chart</a></li>
				<li><a id='bar' class='graphChoice'><i class='fa fa-bar-chart'></i>  Bar Chart</a></li></ul></div>
				</div>";
			echo '<div id="tools-overlay" style="display:none;">
				<a id="back"><i class="fa fa-arrow-left"></i></a>
			<a id="closemodal-graph"> <i class ="fa fa-close"></i> </a> 
			<button id="download-graph"><i class="icon-download "></i> Download Graph as Image </button>
			</div><div id="graph-overlay" style="display:none;"> ';
			echo "<div id='graphBar'></div> <div id='graphPie'></div> <div id='graphPieOthers'></div>";
			echo '<canvas width="1500" height="500" style="display:none" id="c1"></canvas></div>';
			
		}else{
			echo '<div id="tools-overlay" style="display:none;">
				<a id="back"><i class="fa fa-arrow-left"></i></a>
			<a id="closemodal-graph"> <i class="fa  fa-close"></i></a>
			<button id="download-graph"><i class="icon-download "></i> Download Graph as Image </button>
			</div><div id="graph-overlay" style="display:none;"> ';
			echo "<div id='graphPie'></div> <div id='graphPieOthers'></div>";
			echo '<canvas width="1500" height="500" style="display:none" id="c1"></canvas></div>';
			
		} ?>
	 </div>
	 

	</div>
	
<div class='params-div'>
		<div class='message'> </div>
		<?php 
		$isSWREP = false;
		$page = $_GET['q'];
		if (!empty($page)){
			if ($page == 'wells') { 
				echo '<h3> Reported Withdrawals from Registered Wells  </h3>';
			}else{
				echo '<script> window.location.href ="../wateruse/page-not-found"; </script>';
			}	
		}else{
			echo '<script> window.location.href ="../wateruse/page-not-found"; </script>';
			
		}
		?>
		
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
			<?php if ($isSWREP == false) {?>
			<tr>
				<td><label for='sw'>Water Source:&nbsp;</label></td>
				<td><select id ='sw' class='chosen-ddl' data-placeholder='All Sources' name ='ws'>
					<option value ="'gw'"> Ground Water </option>
					<option value="'sw'"> Surface Water </option>
					
					</select>
				</td>
			</tr>
			<?php } ?>
			
			<tr id='aquifer-td'>
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
				<td><label for = 'select-year'>Year Range:&nbsp;</label></td>
				<td><select id='select-year' class='year-select-2'></select> 
				<label for ='select-year' id ="select-year-to-lbl"><span style='color:red'>*</span></label></td>
		
			</tr>
			<tr>
				<td><label for = 'select-year'>Download Report as :&nbsp;</label></td>
				<td><select id='blob-type' class='year-select-2' data-placeholder ='Select Type of File'><option value='CSV' data-icon='fa-file-excel-o'> Comma Separated Value</option><option value='PDF' data-icon ='fa-file-pdf'>PDF Document</option></select> 
				<label for ='select-year' id ="select-year-to-lbl"><span style='color:red'>*</span></label></td>
		
			</tr>
			<tr>
				<td><button id ='submit_data'>Generate Report</button></td>
			</tr>
		</table>
</div>

<input type='hidden' value = '<?php $page = $_GET['q']; print $page;?>' id='the_decider' />
<div class="loading-div">&nbsp;&nbsp;</div>
<div id="cs-result"><div id ="span_result"> </div> <div id="download-div"> </div><div id="graph-div"> </div></div>
<div id ="report-title"> </div><div class='result-div'><table id = "result-tbl"></table ></div>
</div>

<div class ='disclaimer' id ='statistics-disclaimer'><h4>Disclaimer</h4> Water-use data is entered both remotely and onsite. Therefore, these data represent water use data available as of the date retrieved. Data in this table are to be considered prelimnary due to the fact not all data has been entered and/or validated.</div>
<a href="#" id="return-to-top"> <i class="icon-chevron-up"></i></a>
</body>


