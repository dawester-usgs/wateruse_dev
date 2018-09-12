<?php 

	
	if(!defined('BASE_PATH')) {
		echo '<script> window.location.href ="https://wise.er.usgs.gov/'+$dir+'/forbidden"; </script>';
 
	}; 
/*** content goes there at the bottom **/	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta charset="UTF-8">
<meta description = "wateruse,wells">
<?php 

	
	$bootstrap =  new bootstrap_ui();
	print $bootstrap->allow_bootstrap();
	include '../includes/header_config.php';
	
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style>

html {
	height:auto;
	
}
body {
	padding:0;
	margin:0;
	overflow-x:hidden;
    font-size:15px
    line-height: 1.25em;
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    background: #f9f9f9;
    color: #555;
	height:100%;
	width:100%;
}
#main-title{
padding-bottom:50px;

}
#search-box{
	width:300px;
}
#result-table {
	
	border:1px solid #f6f6f6;
	
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}

.tt-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 0px;
	padding: 8px 0;
	width: 350px;
}
.tt-suggestion {
	font-size: 12px;  /* Set suggestion dropdown font size */
	padding: 3px 20px;
}
.tt-suggestion:hover {
	cursor: pointer;
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
#search-box{
	width:300px;
}
#the-centers{
	margin-top:10px;
}

legend {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    
}
fieldset{
	border:1px solid #f9f9f9 !important;
}

.modal-content{
	position:relative;
	right:25%;
	width:1000px;
	height:800px;
}

.modal-body{
	width:auto !important;
	height:auto !important;
}
#map{ 
		position: absolute;
		top:0; 
		bottom:0; 
		right:0; 
		left:0; 
		//width: 700px;
		height: 600px;

}
#the-mpidtbl{
	margin-top:50px;
	font-size:14px;
	border:1px solid #c8cbd1;
	background: white;
	width:100%;
	height:100%;
}
.important{
	color:#e53030;
}
.error{
	border: 1px solid red !important;
}
/*.select2-selection--single{
	border:1px solid red !important;
}*/

#scrollable-dropdown-menu .tt-dropdown-menu {
  max-height: 150px;
  overflow-y: auto;
}


</style>

<script>

#var universal_id;
#var universal_nm;
#function getInfo(t,q,x){
#	
#	absURL = "?page=1&x="+x+"&type="+t+"&q="+q;
#	$("#filter").attr("disabled",true);
#	$.ajax ({
#			
#			TYPE: "GET",
#			url: "../controller/wells/type"+absURL,
#			ContentType:"application/json",
#			dataType:"json",
#			async: "false",
#			success:function(data){
#				var list =  new Array();
#				$.each(data, function(i,item){
#					if ($.isNumeric(q) == false){
#						list.push(data[i].nm+ ' ('+data[i].id+')');	
#					}else{
#						list.push(data[i].id+ ' ('+data[i].nm+')');	
#					}
#						
#					
#				});
#				var isEmpty = list.length;
#				if (isEmpty<1){
#					$('#result-table').empty();
#					$("#filter").attr("disabled",true);
#				}else{
#					$("#filter").removeAttr("disabled");
#				}
#				
#				 $(' #scrollable-dropdown-menu .typeahead').typeahead('destroy');
#				var list = new Bloodhound({
#					datumTokenizer: Bloodhound.tokenizers.whitespace,
#					queryTokenizer: Bloodhound.tokenizers.whitespace,
#					local: list
#				});
#								
#				$('#scrollable-dropdown-menu .typeahead').typeahead(null, {
#				  name: 'list',
#				  limit: 10,
#				  source: list,
#				  
#				});
#				/*
#		
#				$('#scrollable-dropdown-menu .typeahead').typeahead({
#					hint: true,
#					highlight: true, 
#					minLength: 1, 
#				},
#				
#				{
#					name: 'list',
#					source: list
#				});
#					*/
#					NProgress.done(true);
#					//$("#filter").removeAttr("disabled");
#			},
#			error:function(err, ajaxOptions, throwError){
#				alert("Internal Server Error! Please contact the administrator");
#			}
#	});
#	
#}
#
#function checkInfo(t,q){
#	
#	absURL = "?type="+t+"&q="+q+"&directquery=1";
#	//console.log(absURL);
#	$("#filter").attr("disabled",true);
#	$.ajax ({
#			
#			TYPE: "GET",
#			url: "../controller/wells/type"+absURL,
#			ContentType:"application/json",
#			dataType:"json",
#			async: "false",
#			success:function(data){
#				if (!$.trim(data)){
#					alert (" No Existing for "+t + " "+q+ ". Please Try Again.");
#					$("#filter").attr("disabled",false);
#					
#			}else{
#				$("#search-box").attr("readOnly",true);
#				$("#filter").text("Deselect");
#				$("#filter").attr("disabled",false);
#				
#				var list =  new Array();
#					$.each(data, function(i,item){
#							//alert (decodeURI(item.nm) + ' selected');
#							universal_id = item.id;
#							universal_nm = item.nm;
#					})
#				$('#the-modal').modal('show');  
#			}
#			},
#			error:function(err, ajaxOptions, throwError){
#				alert("Internal Server Error! Please contact the administrator");
#			}
#	});
#	
#}
#function init() {
#
#		key_count_global = 0;
#		$("#search-box").on("keypress", function() {
#			key_count_global++;
#			setTimeout("lookup("+key_count_global+")", 500);//Function will be called 1 seconds after user stops typing.
#		});
#}
#function lookup(key_count) {
#		var searchQuery = $("#search-box");
#		var t = $("#type").val();
#		var x = $("#x").val();
#		
#		if(key_count == key_count_global) {
#	
#				if (searchQuery.val() != "" ){
#					getInfo(t,searchQuery.val(),x);
#				}
#				l = $('#z').val();
#			
#				if (l == 'true'){
#					$(this).val($(this).val().replace(/[^\d].+/, ""));
#						if ((event.which < 48 || event.which > 57)) {
#								event.preventDefault();
#						}
#				}
#			
#		}
#}
#
#var idleTime = 0;
#function timerIncrement() {
#		idleTime = idleTime + 1;
#		if (idleTime > 2) { // 1 min
#			var x = confirm('No activity detected for 45 seconds would you like to continue? Press \'Ok\' to continue or Press \'Cancel\' to close this window');
#			
#			if (x == false){
#				window.close();
#			}else{
#				return false;
#			}
#		
#		}
#}
#$(document).ready(function(){
#	init();
#	/* idle time */
#	 //Increment the idle time counter every minute.
#    var idleInterval = setInterval(timerIncrement, 12000); // 2 minutes
#
#    //Zero the idle timer on mouse movement.
#    $(this).mousemove(function (e) {
#        idleTime = 0;
#    });
#	$(this).click(function (e) {
#        idleTime = 0;
#    });
#    $(this).keypress(function (e) {
#        idleTime = 0;
#    });
#	
#	
#	var t = $("#type").val()
#	var searchLabel = $("#searchLabel");
#	var searchQuery = $("#search-box");
#	var typenm = $("#typenm").val();
#	var typeid = $("#typeid").val();
#	if (typenm != ""){
#		var string = decodeURIComponent(typenm);
#		//string = string.replace(/%20/g, " ");
#		//string = string.replace(/%2F/g, "/"");
#		searchQuery.val(string);
#		searchLabel.html('Search by '+t+'\'s Name');
#		searchQuery.prop("disabled",false);
#		$("#filter").text('Deselect');
#		$("#filter").removeAttr('disabled');
#		
#		universal_id = typeid;
#		universal_nm = typenm;
#		
#		 alert("Map Succesfully Loaded. Press 'Okay' to continue.");  $("#the-modal").modal('show');
#	}else{
#		searchQuery.attr("disabled",true);
#		$("#filter").attr("disabled","true");	
#	}
#	
#	
#	//searchQuery.attr("disabled",true);
#	
#	$(".select-type").click(function(){
#		var text = $(this).text();
#		switch (text){
#		
#			case 'Search by '+t+'\'s ID':
#				searchLabel.html('Search by '+t+'\'s ID');
#				$('.typeahead').typeahead('destroy');
#				searchQuery.removeAttr("disabled");
#				$("#z").val('true');
#				//$("#the-centers").remove('col-md-4 col-md-offset-4').addClass('col-md-4 col-md-offset-3');
#				
#			break;	
#			case 'Search by '+t+'\'s Name':
#				searchLabel.html('Search by '+t+'\'s Name');
#				$('.typeahead').typeahead('destroy');
#				searchQuery.removeAttr("disabled");
#				$("#z").val('false');
#				//$("#the-centers").remove('col-md-4 col-md-offset-4').addClass('col-md-4 col-md-offset-3');
#			break;
#			case 'Search by '+t+'\'s ID/Name':
#				searchLabel.html('Search by '+t+'\'s ID/Name');
#				$('.typeahead').typeahead('destroy');
#				searchQuery.removeAttr("disabled");
#				$("#z").val('false');
#				//$("#the-centers").remove('col-md-4 col-md-offset-4').addClass('col-md-4 col-md-offset-3');
#			break;
#			default:
#				searchLabel.html('Select by');
#				$('.typeahead').typeahead('destroy');
#				
#			break;
#		}
#	});
#		
#		
#	$("#filterbycounty").click(function(){
#			var check = $(this).is(":checked");
#			//$("#search-box").val("");
#			if (check){
#			$("#x").val('sc');
#				$(".tt-menu").text(decodeURI(" Please hit Enter and Click the Box above"));
#			}else{
#				$("#x").val('');
#				//$('.typeahead').typeahead('val', '');
#				$(".tt-menu").text(decodeURI(" Please hit Enter and Click the Box above"));
#			}
#		});
#$("#filter").click(function(){
#		var this_text = $(this).text();
#		this_text = $.trim(this_text);
#		var query = encodeURIComponent(searchQuery.val());
#		
#		if (this_text == 'Select'){
#			checkInfo(t,query)	
#		}else{
#			searchQuery.val("");
#			searchQuery.removeAttr("readOnly");
#			$(this).text("Select");
#			$("#the-mpidtbl").empty();
#			
#		}
#		
#
#});
#	
#searchQuery.one("keypress",function(){
#		NProgress.start();	
#		
#});
#	
#//validate form 
#
#
#
#});//end event
#

</script>
</head>
<body>
<!--
<div class ="cols-md-xs cols-md-offset-3">

<table class= "table">
<tr>
<th> HEADER 1 </th>
<th> HEADER 2 </th>
</tr>
<tbody>
<tr>
<td> HEADER 1 </td>
<td> HEADER 2 </td>
</tr>
</tbody>
 </table>
 </div> !-->
<?php 

/*******************
 *** HTML begins ***
 *******************/

/***********************
 ** JavaScript Begins **
 ***********************/
#printf("<script type=\"text/javascript\">\n");
#
#printf(" function stream(sent)\n{ \n");
#printf("if (sent != \"all\") \n return;\n");
#printf(" stream_name = prompt(\"Enter Stream Name to Add to List: \\nOnly first 15 characters will be used \",\"UNKNOWN\"); \n");
#printf(" stream_name = stream_name.substr(0,15); \n");
#printf(" stream_name = stream_name.toUpperCase(); \n");
#printf(" document.form3.stream_nm.options.length = 0; \n");
#printf(" document.form3.stream_nm.options[0] = null; \n");
#printf(" document.form3.stream_nm.options[0] = new Option (stream_name,stream_name); \n");
#
# for (i = 0; i < no_streams; i++)
#   {
#   printf("document.form3.stream_nm.options[%d] = null; \n",i+1);
#   printf(" document.form3.stream_nm.options[%d] = new Option ('%s','%s');\n",i+1,county_water_src[i].stream_nm,county_water_src[i].stream_nm);
#   }
#
#printf(" document.form3.stream_nm.options[%d] = null; \n",i+1);
#printf(" document.form3.stream_nm.options[%d] = new Option ('ADD NAME TO LIST','all'); \n",i+1);
#printf(" document.form3.stream_nm.options[0].selected = true; \n } \n");
#
#printf(" function drill(sent)\n{ \n");
#printf("if (sent != \"all\") \n return;\n");
#printf(" driller_name = prompt(\"Enter Driller's Name to Add to List: \\nOnly first 25 characters will be used \",\"UNKNOWN\"); \n");
#printf(" driller_name = driller_name.substr(0,25); \n");
#printf(" driller_name = driller_name.toUpperCase(); \n");
#printf(" document.form3.driller_nm.options.length = 0; \n");
#printf(" document.form3.driller_nm.options[0] = null; \n");
#printf(" document.form3.driller_nm.options[0] = new Option (driller_name,driller_name); \n");
#
# for (i = 1; i < no_drillers; i++)
#   {
#   printf("document.form3.driller_nm.options[%d] = null; \n",i+1);
#   printf(" document.form3.driller_nm.options[%d] = new Option (\"%s\",\"%s\");\n",i+1,cnst_driller[i].name,cnst_driller[i].name);
#   }
#
#printf(" document.form3.driller_nm.options[%d] = null; \n",i+1);
#printf(" document.form3.driller_nm.options[%d] = new Option ('ADD NAME TO LIST','all'); \n",i+1);
#printf(" document.form3.driller_nm.options[0].selected = true; \n } \n");
#
#
#
#printf(" function aquifer_min(sent)\n{ \n");
#printf("  if (sent == \"all\")  { \n");
#printf(" document.form3.prin_aquifer.options.length = 0; \n");
#printf(" document.form3.prin_aquifer.options[0] = null; \n");
#printf(" document.form3.prin_aquifer.options[0] = new Option ('%s','%s'); \n",stations.prin_aquifer,stations.prin_aquifer);
#printf(" document.form3.prin_aquifer.options[1] = null; \n");
#printf(" document.form3.prin_aquifer.options[1] = new Option ('UNKNOWN','UNKNOWN'); \n");
#    for (i=0;i<aquifer_all_count; i++)
#        {
#        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+2);
#        printf(" document.form3.prin_aquifer.options[%d] = new Option ('%s- %s','%s'); \n",i+2,aquifer[i].aquifer_cd,aquifer[i].aquifer_nm,aquifer[i].aquifer_cd);
#        }
#        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+2);
#        printf(" document.form3.prin_aquifer.options[%d] = new Option ('AQUIFERS IN MY COUNTY ONLY','one');  \n",i+1);
#        printf(" document.form3.prin_aquifer.options[0].selected = true; \n } \n");
#
#printf("  if (sent == \"one\")  { \n");
#printf(" document.form3.prin_aquifer.options.length = 0; \n");
#printf(" document.form3.prin_aquifer.options[0] = null; \n");
#printf(" document.form3.prin_aquifer.options[0] = new Option ('%s','%s'); \n",stations.prin_aquifer,stations.prin_aquifer);
#printf(" document.form3.prin_aquifer.options[1] = null; \n");
#printf(" document.form3.prin_aquifer.options[1] = new Option ('UNKNOWN','UNKNOWN'); \n");
#printf(" document.form3.prin_aquifer.options[2] = null; \n");
#printf(" document.form3.prin_aquifer.options[2] = new Option ('N/A','N/A'); \n");
#for (i=0;i<aquifer_one_count; i++)
#        {
#        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+3);
#        printf(" document.form3.prin_aquifer.options[%d] = new Option ('%s - %s','%s'); \n",i+3,aquifer_county[i].aquifer_cd,aquifer_county[i].aquifer_nm,aquifer_county[i].aquifer_cd);
#        }
#        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+3);
#        printf(" document.form3.prin_aquifer.options[%d] = new Option ('SHOW ALL AQUIFERS','all'); \n",i+3);
#        printf(" document.form3.prin_aquifer.options[0].selected = true; \n } \n");
#
#printf("} \n");
#
#printf("function validate5(form5,what)\n { \n");
#
#printf("la = parseFloat(document.form3.latitude.value);\n");
#printf("lo = parseFloat(document.form3.longitude.value);\n");
#printf("document.form5.latitude.value = document.form3.latitude.value;\n");
#printf("document.form5.longitude.value = document.form3.longitude.value;\n");
#printf("\n");
#printf("if ((la>363500) || (la<310000) || (isNaN(la))  \n");
#printf(" || (lo>945000) || (lo<893701) || (isNaN(lo)) )\n");
#printf("   alert(\"The latitude and longitude are outside of the state.\" + lo +\"   \"+ la);\n");
#printf("else { \n");
#printf("   lat1   = parseFloat(document.form5.latitude.value.charAt(0));\n");
#printf("   lat2   = parseFloat(document.form5.latitude.value.charAt(1));\n");
#printf("   lat3   = parseFloat(document.form5.latitude.value.charAt(2));\n");
#printf("   lat4   = parseFloat(document.form5.latitude.value.charAt(3));\n");
#printf("   lat5   = parseFloat(document.form5.latitude.value.charAt(4));\n");
#printf("   lat6   = parseFloat(document.form5.latitude.value.charAt(5));\n");
#printf("   dd_lat = (lat1*10+lat2+lat3/6+lat4/60+lat5/360+lat6/3600);\n");
#printf("  if (document.form3.longitude.value.charAt(0) != \"0\") {\n");
#printf("   lon1   = parseFloat(document.form5.longitude.value.charAt(0));\n");
#printf("   lon2   = parseFloat(document.form5.longitude.value.charAt(1));\n");
#printf("   lon3   = parseFloat(document.form5.longitude.value.charAt(2));\n");
#printf("   lon4   = parseFloat(document.form5.longitude.value.charAt(3));\n");
#printf("   lon5   = parseFloat(document.form5.longitude.value.charAt(4));\n");
#printf("   lon6   = parseFloat(document.form5.longitude.value.charAt(5));\n");
#printf("   dd_lon = lon1*10+lon2+lon3/6+lon4/60+lon5/360+lon6/3600;\n } \n");
#printf("  else { \n");
#printf("   lon1   = parseFloat(document.form5.longitude.value.charAt(1));\n");
#printf("   lon2   = parseFloat(document.form5.longitude.value.charAt(2));\n");
#printf("   lon3   = parseFloat(document.form5.longitude.value.charAt(3));\n");
#printf("   lon4   = parseFloat(document.form5.longitude.value.charAt(4));\n");
#printf("   lon5   = parseFloat(document.form5.longitude.value.charAt(5));\n");
#printf("   lon6   = parseFloat(document.form5.longitude.value.charAt(6));\n");
#printf("   dd_lon = lon1*10+lon2+lon3/6+lon4/60+lon5/360+lon6/3600;\n } \n");
#printf("   document.form5.map_well_feature_points.value = \"-\"+dd_lon+\" \"+dd_lat;\n");
#printf("    }  \n");
#
#printf("  if (what == \"aquifer\")  {	\n");
#printf("   document.form5.action = \"%s/MAPS/aquifer_det.phtml\";\n",pathfile);
#printf("   document.form5.map_well_feature_points.value = document.form3.well_depth.value;\n");
#printf("   document.form5.map_well_feature_points.name  = \"well_depth\";\n");
#printf("   document.form5.map_well_projection.value = document.form3.prin_aquifer.value;\n");
#printf("   document.form5.map_well_projection.name  = \"prin_aquifer\";\n } \n \n");
#printf("document.form5.submit(); \n }	\n");
#
#printf(" function validate(form3) { \n");
#
#printf(" if (\"  \" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value) { \n") ;
#printf(" alert(\"Action Code is a required field!\");  \n");
#printf("document.form3.action_cd.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if (\"  \" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value) { \n") ;
#printf(" alert(\"Source Type is a required field !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if (\"\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value) { \n") ;
#printf(" alert(\"Source Type is a required field!\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ((\"GW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
#printf(" && (\"RL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
#printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ((\"SW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
#printf(" && (\"RL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
#printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ((\"FW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
#printf(" && (\"RL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
#printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ((\"TW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
#printf(" && (\"WD\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
#printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ((\"GW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
#printf(" && (\"DL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
#printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ((\"SW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
#printf(" && (\"DL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
#printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ((\"FW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
#printf(" && (\"DL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
#printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
#printf("document.form3.source_type.focus(); \n");
#printf(" return (false);         } \n");
#
#printf(" else if ( (\"N/A\"  == document.form3.stream_nm.options[document.form3.stream_nm.selectedIndex].value) && \n");
#printf("     (\"SW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)){\n");
#printf(" alert(\"Please select a Water Source !\");  \n");
#printf("document.form3.stream_nm.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.well_depth.value.charAt(0)) && ");
#printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Well Depth is a required field !\");  \n");
#printf("document.form3.well_depth.focus(); \n");
#printf(" return (false);                } \n");
#
#printf("else if ((\"\"  == document.form3.well_depth.value.charAt(0)) && ");
#printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Well Depth is a required field !\");  \n");
#printf("document.form3.well_depth.focus(); \n");
#printf(" return (false);                } \n");
#
#
#printf(" else if ((\" \" == document.form3.driller_nm.value.charAt(0)) && ");
#printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Driller Name is a required field!\");  \n");
#printf("document.form3.driller_nm.focus(); \n");
#printf(" return (false);                } \n");
#
#
#printf("else if ((\"\"  == document.form3.driller_nm.value.charAt(0)) && \n");
#printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Driller Name is a required field!\");  \n");
#printf("document.form3.driller_nm.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.date_drilled.value.charAt(0)) && ");
#printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Drill Date is a required field!\");  \n");
#printf("document.form3.date_drilled.focus(); \n");
#printf(" return (false);                } \n");
#
#printf("else if ((\"\"  == document.form3.date_drilled.value.charAt(0)) && \n");
#printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Drill Date is a required field!\");  \n");
#printf("document.form3.date_drilled.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.date_drilled.value.charAt(0)) && ");
#printf("     (\"SW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Drill Date is a required field!\");  \n");
#printf("document.form3.date_drilled.focus(); \n");
#printf(" return (false);                } \n");
#
#printf("else if ((\"\"  == document.form3.date_drilled.value.charAt(0)) && \n");
#printf("     (\"SW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
#printf(" alert(\"Drill Date is a required field!\");  \n");
#printf("document.form3.date_drilled.focus(); \n");
#printf(" return (false);                } \n");
#
#
#printf(" else if (\"\"  == document.form3.huc.options[document.form3.huc.selectedIndex].value) {\n");
#printf(" alert(\"HUC is a required field !\");  \n");
#printf("document.form3.huc.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\"\"  == document.form3.quad1.options[document.form3.quad1.selectedIndex].value) || \n");
#printf("         (\"--\" == document.form3.quad1.options[document.form3.quad1.selectedIndex].value)) { \n");
#printf(" alert(\"Quad is a required field !\");  \n");
#printf("document.form3.quad1.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\"\"  == document.form3.quad2.options[document.form3.quad2.selectedIndex].value) || \n");
#printf("         (\"--\" == document.form3.quad2.options[document.form3.quad2.selectedIndex].value)) { \n");
#printf(" alert(\"Quad is a required field!\");  \n");
#printf("document.form3.quad2.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.section.value.charAt(0) ) || ");
#printf("     (\"\"  == document.form3.section.value.charAt(0))) {\n");
#printf(" alert(\"Section is a required field !\");  \n");
#printf("document.form3.section.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.township.value.charAt(0) ) || ");
#printf("     (\"\"  == document.form3.township.value.charAt(0))) {\n");
#printf(" alert(\"Township is a required field!\");  \n");
#printf("document.form3.township.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.range.value.charAt(0) ) || ");
#printf("     (\"\"  == document.form3.range.value.charAt(0))) {\n");
#printf(" alert(\"Range is a required field!\");  \n");
#printf("document.form3.range.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.altitude.value.charAt(0) ) || ");
#printf("     (\"\"  == document.form3.altitude.value.charAt(0))) {\n");
#printf(" alert(\"Altitude is a required field !\");  \n");
#printf("document.form3.altitude.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.pump_hp.value.charAt(0) ) || ");
#printf("     (\"\"  == document.form3.pump_hp.value.charAt(0))) {\n");
#printf(" alert(\"Pump Horsepower is a required field!\");  \n");
#printf("document.form3.pump_hp.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if ((\" \" == document.form3.pipe_diam.value.charAt(0)) || ");
#printf("     (\"\"  == document.form3.pipe_diam.value.charAt(0))) {\n");
#printf(" alert(\"Pipe Diameter is a required field!\");  \n");
#printf("document.form3.pipe_diam.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if (\"\"  == document.form3.power_tp.options[document.form3.power_tp.selectedIndex].value) { \n");
#printf(" alert(\"Power Type is a required field!\");  \n");
#printf("document.form3.power_tp.focus(); \n");
#printf(" return (false);                } \n");
#
#printf(" else if (\"\"  == document.form3.diversion_meth.options[document.form3.diversion_meth.selectedIndex].value) { \n");
#printf(" alert(\"Pump Type is a required field!\");  \n");
#printf("document.form3.diversion_meth.focus(); \n");
#printf(" return (false);                } \n");
#
#printf("else \n return (true); \n  } \n \n");
#printf("</script></head>\n");
#printf("<body onload=\"document.form3.reset();document.form3.local_desc.focus();\"><center>\n");
	#
include("E:\inetpub\wwwroot\wells\myfunctions.php");
	
session_start();
#global $menu_button, $remote_user, $decOnly, $intOnly;
foreach ($_REQUEST as $key => $value)
	$key = $value;

$mpid = $_REQUEST["thempid"]; 

$sql2 = "SELECT table_name, column_name, data_type, data_length FROM USER_TAB_COLUMNS WHERE table_name = 'STATION'";
$j=0;
$stid = connectme($sql2);
while ($row = oci_fetch_array($stid, OCI_BOTH))
{
	$named[$j] = $row[1];
	$lower[$j] = strtolower($row[1]);
	$j++;
}

###################################
# Return First all rows Function ##
###################################
printf("<center><h3><hr>Modify Measurement Point<hr></h3>\n");


for ($m=0;$mpid[$m]!="";$m++) {

$sql = "select * from station where mpid = '$mpid[0]' ";
$stid = connectme($sql);
while ($row = oci_fetch_array($stid, OCI_BOTH))
{

  for ($cols=0;$named[$cols]!= "";$cols++)
  	{
	$column = $named[$cols];
	$$column =  "$row[$column]";
	}

$OWNER_NM 		= first_row("select owner_nm    from owner    where owner_id   ='$OWNER_ID'");
$DIVERTER_NM 		= first_row("select diverter_nm from diverter where diverter_id='$DIVERTER_ID'");
$FACILITY_NM 		= first_row("select facility_nm from facility where facility_id='$FACILITY_ID'");

printf("<table border=\"1\">\n");
printf("<tr><th align='center' colspan=\"3\">\n");
printf("Measurement Point Information ( %s )\n",$mpid[0]);

/***
printf("<form method=\"get\" name=\"form1\" action=\"%s\">\n",program);
printf("<input type=\"hidden\" value=\"change_mod_mpi_ownersearch\" name=\"control\">\n");
printf("<input type=\"hidden\" value=\"%d\" name=owner_id>\n",stations.owner_id);
printf("<input type=\"hidden\" value=\"%d\" name=diverter_id>\n",stations.diverter_id);
printf("<input type=\"hidden\" value=\"%s\" name=mpid>\n",stations.mpid);
printf("<input type=\"hidden\" value=\"%d\" name=facility_id>\n",stations.facility_id);
printf("<input type=\"hidden\" value=\"%s\" name=idtype>\n",idtype);
***/
printf("</th></tr><tr><td class=\"regc\">Owner: %s (%d) </td>\n",$OWNER_NM,$OWNER_ID);

#printf("<br><input type=\"submit\" value=\"Change Owner\"></form></td>");

#printf("<form method=\"get\" name=\"form2\" action=\"%s\">\n",program);
#printf("<input type=\"hidden\" value=\"change_mod_mpi_divertersearch\" name=\"control\">\n");
#printf("<input type=\"hidden\" value=\"%d\" name=\"owner_id\">\n",stations.owner_id);
#printf("<input type=\"hidden\" value=\"%d\" name=\"diverter_id\">\n",stations.diverter_id);
#printf("<input type=\"hidden\" value=\"%s\" name=\"mpid\">\n",stations.mpid);
#printf("<input type=\"hidden\" value=\"%d\" name=\"facility_id\">\n",stations.facility_id);
#printf("<input type=\"hidden\" value=\"%s\" name=\"idtype\">\n",idtype);

printf("<td class=\"regc\">Diverter: %s (%d)</td> \n",$DIVERTER_NM,$DIVERTER_ID);

#printf("<br><input type=\"submit\" value=\"Change Diverter\"></form></td>");
#printf("<form method=\"get\" name=\"form4\" action=\"%s\">\n",program);
#printf("<input type=\"hidden\" value=\"change_mod_mpi_facilitysearch\" name=\"control\">\n");
#printf("<input type=\"hidden\" value=\"%d\" name=\"owner_id\">\n",stations.owner_id);
#printf("<input type=\"hidden\" value=\"%d\" name=\"diverter_id\">\n",stations.diverter_id);
#printf("<input type=\"hidden\" value=\"%s\" name=\"mpid\">\n",stations.mpid);
#printf("<input type=\"hidden\" value=\"%d\" name=\"facility_id\">\n",stations.facility_id);
#printf("<input type=\"hidden\" value=\"%s\" name=\"idtype\">\n",idtype);
#
#
  if ($FACILITY_ID==0)
	printf("<td>Facility: None</td>\n");
  else  printf("<td class=\"regc\">Facility ID: %s (%d) nbsp; \n",$FACILITY_NM,$FACILITY_ID);
#  else	printf("%d \n",stations.facility_id);
#
#printf("<br><input type=\"submit\" value=\"Change Facility\"></form></td></tr>");
#printf("<form method=\"get\" name=\"form3\" action=\"%s\" onSubmit=\"return validate(form3)\">\n",program);
#printf("<input type=\"hidden\" value=\"update_mpid\" name=\"control\">\n");

#if (strcmp(wyear,"") !=0)
#printf("<input type=\"hidden\" value=\"%s\" name=\"wyear\">\n",wyear);
#printf("<input type=\"hidden\" value=\"%d\" name=\"owner_id\">\n",stations.owner_id);
#printf("<input type=\"hidden\" value=\"%d\" name=\"diverter_id\">\n",stations.diverter_id);
#printf("<input type=\"hidden\" value=\"%d\" name=\"facility_id\">\n",stations.facility_id);
#printf("<input type=\"hidden\" value=\"%s\" name=\"mpid\">\n",stations.mpid);
#printf("<input type=\"hidden\" value=\"%s\" name=\"datum\">\n",datum);
#printf("<input type=\"hidden\" value=\"%s\" name=\"idtype\">\n",idtype);
#printf("<tr><td class=\"reg\" colspan=\"3\">Local Description: &nbsp;\n");
#printf("<input type=\"text\" class=\"formatme\" onFocus=\"this.select()\"size=\"25\" name=\"local_desc\" ");
#printf("value=\"%s\" maxlength=\"25\"></td></tr>\n",stations.local_desc);

printf("<tr><td class=\"val\">Action Code: &nbsp;<select name=action_cd>\n");
printf("  <option value=\"%s\" selected>%s\n",$ACTION_CD,$ACTION_CD);
printf("  <option value=\"AB\">Abandoned 	\n");
printf("  <option value=\"WD\">Withdrawal	\n");
printf("  <option value=\"DL\">Delivered	\n");
printf("  <option value=\"RL\">Released		\n");
printf("  <option value=\"PR\">Production	\n");
printf("  <option value=\"IA\">Inactive  	\n");
printf("  </select>\n");

printf("</td><td class=\"val\">Source (SW,GW): &nbsp; \n");
printf("	<select name=source_type> \n");
printf("	  <option value=\"%s\" selected>%s \n",$SOURCE_CD,$SOURCE_CD);
printf("	  <option value=\"SW\">Surface Water \n");
printf("	  <option value=\"GW\">Ground Water \n");
printf("	  <option value=\"FW\">Facility Water \n");
printf("	  <option value=\"TW\">Transferred Water \n");
printf("	  <option value=\"SP\">Spring Water \n");
printf("	</select></td>\n");
printf("<td class=\"reg\">Tract#:&nbsp;<input type=\"text\" onFocus=this.select() ");
printf("value=\"%s\" class=\"formatme\" name=\"tract\" size=\"5\" maxlength=\"5\">\n",$TRACT);
printf("&nbsp; &nbsp; Farm:&nbsp;<input type=\"text\" onFocus=\"this.select()\" size=5 ");
printf("name=\"farm\" class=\"formatme\" value=\"%s\" maxlength=\"5\"></td>\n",$FARM);

printf("</tr><tr></td><td class=\"reg\">Quad #: &nbsp; \n");
printf("<input type=\"text\" onFocus=\"this.select();\" value=\"%s\" name=\"quadno\" \n",$QUADNO);
printf("maxlength=\"4\" size=\"4\" class=\"formatme\" ></td>\n");
printf("<td class=\"reg\">Operator #: &nbsp;<input type=\"text\" onFocus=this.select() value=\"%s\" ",$opnum);
printf("name=\"opnum\" size=\"5\" maxlength=\"5\" class=\"formatme\"></td>\n");
printf("</td><td class=\"reg\">Well #: &nbsp;<input type=\"text\" onFocus=\"this.select()\" value=\"%s\" ",$WELL_NO);
printf("name=\"well_no\" size=\"10\" maxlength=\"10\" class=\"formatme\"> </td>\n");
printf("</tr><tr><td colspan=\"2\" class=\"val\">Surface Water Source Name: &nbsp; \n");

printf("<select name=\"stream_nm\" onChange=\"stream(document.form3.stream_nm.options[selectedIndex].value);\">\n");

printf("<option selected value=\"%s\">%s </option>\n",$STREAM_NM,$STREAM_NM);
printf("<option value=\"UNKNOWN\">UNKNOWN</option>\n");
printf("<option value=\"N/A\">N/A</option>\n");

$sql3 = "select * from COUNTY_WATER_SRC where county_cd = '$COUNTY_CD'";
$stid = connectme($sql3);
while ($rowed = oci_fetch_array($stid, OCI_BOTH))
   printf("<option value=\"%s\"> %s </option>\n",$rowed[2],$rowed[2]);

printf("<option value=\"all\">ADD NAME TO LIST</option></select></td>\n");

printf("<td class=\"val\">Dam: &nbsp; \n");
if ($DAM == "Y")
		$checker=="";
printf("<input type=\"radio\" value=\"Y\" check%sed name=\"dam\">Yes\n",$checker);
printf("<input type=\"radio\" value=\"N\" %s name=\"dam\">No </td></tr>\n",$checker);

printf("<tr><td class=\"val\" colspan=\"3\">Aquifer Code: &nbsp;\n");
printf("<select name=\"prin_aquifer\" onChange=\"aquifer_min(document.form3.prin_aquifer.options[selectedIndex].value);\">\n");

if ($AQUIFER_CD != "")
	printf("<option value=\"%s\"selected >%s </option>\n",$AQUIFER_CD, $AQUIFER_CD);


printf("<option value=\"%s\">%s </option>\n",$PRIN_AQUIFER,$PRIN_AQUIFER);
printf("<option value=\"UNKNOWN\">UNKNOWN</option>\n");
printf("<option value=\"N/A\">N/A</option>\n");

$sql3 = "select * from AQUIFER_COUNTY where county_cd = '$COUNTY_CD'";
$stid = connectme($sql3);
while ($rowed = oci_fetch_array($stid, OCI_BOTH))
   printf("<option value=\"%s\"> %s </option>\n",$rowed[2],$rowed[2]);

printf("<option value=\"all\">SHOW ALL AQUIFERS </option></select>\n");
printf("<input type=\"button\" value=\"Test Aquifer\" onclick=\"validate5(form5,'aquifer')\">\n");
printf("</td></tr><tr><td colspan=\"3\" class=\"val\">Driller Name: &nbsp;\n");
printf("<select name=\"driller_nm\" onChange=\"drill(document.form3.driller_nm.options[selectedIndex].value);\">\n");

printf("<option selected value=\"%s\">%s </option>\n",$DRILLER_NM,$DRILLER_NM);
printf("<option value=\"UNKNOWN\">UNKNOWN</option>\n");
printf("<option value=\"N/A\">N/A</option>\n");

$sql3 = "select * from CNST_DRILLER";
$stid = connectme($sql3);
while ($rowed = oci_fetch_array($stid, OCI_BOTH))
   printf("<option value=\"%s\"> %s </option>\n",$rowed[1],$rowed[1]);
$sql3 = "select * from INSTALLER";
$stid = connectme($sql3);
while ($rowed = oci_fetch_array($stid, OCI_BOTH))
   printf("<option value=\"%s\"> %s </option>\n",$rowed[1],$rowed[1]);
$sql3 = "select * from CNST_CONTRACTOR";
$stid = connectme($sql3);
while ($rowed = oci_fetch_array($stid, OCI_BOTH))
   printf("<option value=\"%s\"> %s </option>\n",$rowed[1],$rowed[1]);

printf("<option value=\"all\">ADD NAME TO LIST</option></select></td>\n");


printf("</td></tr><tr><td colspan=\"2\" class=\"val\">\n");
printf("Date Well Drilled or Relift Installed: \n");
printf("<input type=\"text\" onFocus=\"this.select()\" name=\"date_drilled\"  class=\"formatme\" ");
printf("size=\"10\" value=\"%s\" maxlength=\"10\"></td>\n",$DATE_DRILLED );
printf("<td class=\"val\">Well Depth: &nbsp; \n <input type=\"text\" class=\"formatme\"  onFocus=\"this.select()\" value=\"%s\" name=\"well_depth\" size=\"4\" maxlength=\"4\"></td></tr>\n",$WELL_DEPTH);
printf("<tr><th colspan=\"3\">Location of Withdrawal</th>\n");
printf("</tr><td class=\"reg\">County: &nbsp; \n");
printf("<select name=\"county_cd\">\n");

$st = connectme("select county_cd as cd, county_nm as nm from county where county_cd < 150");
while ($rowed = oci_fetch_array($st, OCI_BOTH))
 {
      if ($COUNTY_CD ==  $rowed[0])
	      	printf("<option selected value=\"%s\">%s </option>\n",$rowed[0],$rowed[1]);
      else 	printf("<option value=\"%s\">%s</option> \n",$rowed[0], $rowed[1]);
 }

printf("</td><td class=\"reg\">State: Arkansas &nbsp;\n");
printf("<input type=\"hidden\" name=\"state\" value=\"%s\">\n",$STATE_CD);
printf("</td><td class=\"val\">HUC: &nbsp; \n");
printf("<select name=\"huc\">\n");

printf(" <option value=\"%s\" selected>%s\n",$HUC,$HUC);
printf(" <option value=\"08010100\">08010100\n");
printf(" <option value=\"08020100\">08020100\n");
printf(" <option value=\"08020203\">08020203\n");
printf(" <option value=\"08020204\">08020204\n");
printf(" <option value=\"08020205\">08020205\n");
printf(" <option value=\"08020301\">08020301\n");
printf(" <option value=\"08020302\">08020302\n");
printf(" <option value=\"08020303\">08020303\n");
printf(" <option value=\"08020304\">08020304\n");
printf(" <option value=\"08020401\">08020401\n");
printf(" <option value=\"08020402\">08020402\n");
printf(" <option value=\"08030100\">08030100\n");
printf(" <option value=\"08040101\">08040101\n");
printf(" <option value=\"08040102\">08040102\n");
printf(" <option value=\"08040103\">08040103\n");
printf(" <option value=\"08040201\">08040201\n");
printf(" <option value=\"08040202\">08040202\n");
printf(" <option value=\"08040203\">08040203\n");
printf(" <option value=\"08040204\">08040204\n");
printf(" <option value=\"08040205\">08040205\n");
printf(" <option value=\"08040206\">08040206\n");
printf(" <option value=\"08040207\">08040207\n");
printf(" <option value=\"08050001\">08050001\n");
printf(" <option value=\"08050002\">08050002\n");
printf(" <option value=\"11010001\">11010001\n");
printf(" <option value=\"11010003\">11010003\n");
printf(" <option value=\"11010004\">11010004\n");
printf(" <option value=\"11010005\">11010005\n");
printf(" <option value=\"11010006\">11010006\n");
printf(" <option value=\"11010007\">11010007\n");
printf(" <option value=\"11010008\">11010008\n");
printf(" <option value=\"11010009\">11010009\n");
printf(" <option value=\"11010010\">11010010\n");
printf(" <option value=\"11010011\">11010011\n");
printf(" <option value=\"11010012\">11010012\n");
printf(" <option value=\"11010013\">11010013\n");
printf(" <option value=\"11010014\">11010014\n");
printf(" <option value=\"11070206\">11070206\n");
printf(" <option value=\"11070208\">11070208\n");
printf(" <option value=\"11070209\">11070209\n");
printf(" <option value=\"11110103\">11110103\n");
printf(" <option value=\"11110104\">11110104\n");
printf(" <option value=\"11110201\">11110201\n");
printf(" <option value=\"11110202\">11110202\n");
printf(" <option value=\"11110203\">11110203\n");
printf(" <option value=\"11110204\">11110204\n");
printf(" <option value=\"11110205\">11110205\n");
printf(" <option value=\"11110206\">11110206\n");
printf(" <option value=\"11110207\">11110207\n");
printf(" <option value=\"11140105\">11140105\n");
printf(" <option value=\"11140106\">11140106\n");
printf(" <option value=\"11140108\">11140108\n");
printf(" <option value=\"11140109\">11140109\n");
printf(" <option value=\"11140201\">11140201\n");
printf(" <option value=\"11140203\">11140203\n");
printf(" <option value=\"11140205\">11140205\n");
printf(" <option value=\"11140302\">11140302\n");
printf(" <option value=\"11140304\">11140304 </select>\n");	

printf("</tr><tr>\n");
printf("<td class=\"reg\"><div class=\"val\">\n");
printf("<select name=\"quad1\"><option value=\"%s\" selected>%s\n",$QUAD1, $QUAD1);
printf(" <option value=\"SW\">SW\n");
printf(" <option value=\"SE\">SE\n");
printf(" <option value=\"NW\">NW\n");
printf(" <option value=\"NE\">NE\n");
printf("</select> &#188; of \n");
printf("<select name=\"quad2\">\n");
printf("<option value=\"%s\" selected>%s\n",$QUAD2,$QUAD2);
printf(" <option value=\"SW\">SW\n");
printf(" <option value=\"SE\">SE\n");
printf(" <option value=\"NW\">NW\n");
printf(" <option value=\"NE\">NE\n");
printf(" </select> &#188; <br></div>\n");

printf("</td><td class=\"reg\">\n");

  printf("<div class=\"val\">Section <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"section\" size=\"2\" maxlength=\"2\" >\n",$SECTION);

  printf("Township <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"township\" size=\"3\" maxlength=\"3\" >\n",$TOWNSHIP);

printf("</td><td class=\"reg\">\n");

  printf("<div class=\"val\">Range <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"range\" size=\"3\" maxlength=\"3\" >\n",$RANGE);

printf("</td></tr><tr><td class=\"val\">Latitude: &nbsp; \n");
printf("<input type=\"text\" class=\"formatme\" onFocus=this.select() value=\"%s\" size=\"6\" maxlength=\"6\" name=\"latitude\"></td>\n",$LATITUDE);
printf("</td><td class=\"val\">Longitude: &nbsp;\n");
printf("<input type=\"text\" class=\"formatme\" onFocus=this.select() value=\"%s\" name=\"longitude\" size=\"7\" maxlength=\"7\">\n",$LONGITUDE); 
printf("</td><td class=\"val\">Altitude: &nbsp;\n <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" ");
printf("value=\"%.2f\" name=\"altitude\" size=\"8\"></td>\n",$ALTITUDE);

printf("<tr><th colspan=\"3\">\n");
printf("<input type=\"button\" value=\"Map this Latitude and Longitude or Find New Point\" onClick=validate5(form5); >\n");
printf("</td></tr>\n");
printf("<tr><th colspan=\"3\">Pump Information</th>\n");

printf("</tr><tr><td class=\"val\">Pump Horsepower: &nbsp; <input class=\"formatme\" type=\"text\" onFocus=\"this.select();\" \n");
printf("value=\"%s\" name=\"pump_hp\" size=\"3\" maxlength=\"3\"></td>\n",$PUMP_HP);
printf("</td><td colspan=\"2\" class=\"val\">Discharge Pipe Diameter: &nbsp; \n");
printf("<input type=\"text\" onFocus=\"this.select();\" value=\"%s\" name=pipe_diam size=\"2\" class=\"formatme\" maxlength=\"2\"></td></tr>\n",$PIPE_DIAM);

printf("<tr><td class=\"val\">Power Type: \n");
printf("<select name=\"power_tp\">\n");
printf("  <option value=\"%s\" selected>%s\n",$POWER_TP,$POWER_TP);
printf("  <option value=\"ELC\">ELC</option>\n");
printf("  <option value=\"LPG\">LPG</option>\n");
printf("  <option value=\"DSL\">DSL</option>\n");
printf("  <option value=\"OTH\">OTH</option>\n </select>\n");


printf("</td><td colspan=\"2\" class=\"val\">Diversion Method:\n");
printf("<select name=\"diversion_meth\">\n");
printf("  <option value=\"%s\" selected>%s</option>\n",$DIVERSION_METH, $DIVERSION_METH);
printf("  <option value=\"STP\">STP</option>\n");
printf("  <option value=\"PTP\">PTP</option>\n");
printf("  <option value=\"GRV\">GRV</option>\n");
printf("  <option value=\"OTH\">OTH \n</option></select>");

printf("</td></tr><tr><td class=\"val\">Flow Meter:\n");
printf("&nbsp; &nbsp; \n");

if (($METER_FLG=="Y") || ($METER_FLG =="y"))
  {
   printf("<input checked type=\"radio\" value=\"Y\" name=\"meter_flg\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input type=\"radio\" value=\"N\" name=\"meter_flg\">No\n");
  } else {
   printf("<input type=\"radio\" value=\"Y\" name=\"meter_flg\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input checked type=\"radio\" value=\"N\" name=\"meter_flg\">No\n");
  }


printf("</td><td colspan=\"2\" class=\"val\">Reclaimed Waste:\n");
printf("&nbsp; &nbsp; \n");

if ( ($REC_WASTE =="Y") || ($REC_WASTE == "y"))
  {
   printf("<input checked type=\"radio\" value=\"Y\" name=\"rec_waste\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input type=\"radio\" value=\"N\" name=\"rec_waste\">No\n");
  }
else
  {
   printf("<input type=\"radio\" value=\"Y\" name=\"rec_waste\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input checked type=\"radio\" value=\"N\" name=\"rec_waste\">No\n");
  }

printf("<tr><td class=\"head_center\">\n");

printf("<input type=\"button\" value=\"Main Menu\" \n");
printf("onClick=window.location=\"%s/index.html\"></td>\n",$pathfile);
printf("<td colspan=\"2\" class=\"head_center\"> \n");
printf("<input type=\"submit\" value=\"Update Measurement Point\">\n");
printf("</td></tr></table></form>\n");
printf("<p class=\"val\">Denotes Required Fields</p>\n");
printf("<p class=\"val\">(If the data for a required field is unknown or non applicable then use --)</p>\n");
printf("<form method=\"get\" name=\"form5\" action=\"%s/MAPS/general.phtml\">\n",$pathfile);
printf("<input type=\"hidden\" name=\"owner_id\"    value=\"%d\">\n",$OWNER_ID);
printf("<input type=\"hidden\" name=\"diverter_id\" value=\"%d\">\n",$DIVERTER_ID);
printf("<input type=\"hidden\" name=\"facility_id\" value=\"%d\">\n",$FACILITY_ID);
printf("<input type=\"hidden\" name=\"idtype\"	    value=\"%s\">\n",$IDTYPE);
printf("<input type=\"hidden\" name=\"mpid\"        value=\"%s\">\n",$MPID);
printf("<input type=\"hidden\" name=\"latitude\"    value=\"%s\">\n",$LATITUDE);
printf("<input type=\"hidden\" name=\"longitude\"   value=\"%s\">\n",$LONGITUDE);
printf("<input type=\"hidden\" name=\"where\"       value=\"modify_mpid\">\n");
printf("<input type=\"hidden\" name=\"idtype\"      value=\"%s\">\n",$IDTYPE);
printf("<input type=\"hidden\" name=\"map_well_feature_points\" value=\"\">\n");
printf("<input type=\"hidden\" name=\"map_well_projection\" value=\"proj=latlong,datum=%s\">\n",$DATUM);
printf("</form>\n");
 }
} ## End of mpids $m

?>
</body></html>
