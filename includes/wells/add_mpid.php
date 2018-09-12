<?php 
	
	if(!defined('BASE_PATH')) {
		echo '<script> window.location.href ="https://wise.er.usgs.gov/wateruse/forbidden"; </script>';
 
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
	height:820px;
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
		height: 575px;

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
 .label {
    font-weight: 700;
    text-transform: uppercase;
    text-align: center;
    margin-top: -1em;
  }

  .label div {
    position: relative;
    left: -50%;
    text-shadow: 0px 2px 1px rgba(255,255,255,0.85);
  }

</style>
<script>

var universal_id;
var universal_nm;

function getInfo(t,q,x){
	
	absURL = "?page=1&x="+x+"&type="+t+"&q="+q;
	//$("#filter").attr("disabled",true);
	$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/type"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				var list =  new Array();
				$.each(data, function(i,item){
					if ($.isNumeric(q) == false){
						list.push(data[i].nm+ ' ('+data[i].id+')');	
					}else{
						list.push(data[i].id+ ' ('+data[i].nm+')');	
					}
						
					
					
							
					
				});
				var isEmpty = list.length;
				if (isEmpty<1){
					$('#result-table').empty();
				//	$("#filter").attr("disabled",true);
				}else{
					$("#filter").removeAttr("disabled");
				}
				
				 $(' #scrollable-dropdown-menu .typeahead').typeahead('destroy');
				var list = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.whitespace,
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					local: list
				});
								
				$('#scrollable-dropdown-menu .typeahead').typeahead(null, {
				  name: 'list',
				  limit: 10,
				  source: list,
				  
				});
				/*
		
				$('#scrollable-dropdown-menu .typeahead').typeahead({
					hint: true,
					highlight: true, 
					minLength: 1, 
				},
				
				{
					name: 'list',
					source: list
				});
					*/
					NProgress.done(true);
					//$("#filter").removeAttr("disabled");
			},
			error:function(err, ajaxOptions, throwError){
				alert("Internal Server Error! Please contact the administrator");
			}
	});
	
}

function checkInfo(t,q){
	
	absURL = "?type="+t+"&q="+q+"&directquery=1";
	//console.log(absURL);
//	$("#filter").attr("disabled",true);
	$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/type"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				if (!$.trim(data)){
					alert (" No Existing for "+t + " "+q+ ". Please Try Again.");
					//$("#filter").attr("disabled",false);
					
			}else{
				///$("#search-box").attr("readOnly",true);
				$("#filter").text("Deselect");
			//	$("#filter").attr("disabled",false);
				
				var list =  new Array();
					$.each(data, function(i,item){
							//alert (decodeURI(item.nm) + ' selected');
							universal_id = item.id;
							universal_nm = item.nm;
					})
				$('#the-modal').modal('show');  
			}
			},
			error:function(err, ajaxOptions, throwError){
				alert("Internal Server Error! Please contact the administrator");
			}
	});
	
}
function init() {

		/*key_count_global = 0;
		$("#search-box").on("keypress", function() {
			key_count_global++;
			setTimeout("lookup("+key_count_global+")", 500);//Function will be called 1 seconds after user stops typing.
		});*/
		$('#search-box').keypress(function(e){
			var key = e.which;
		
			if (key ==13){	
				NProgress.start();
				lookup();
			}
					
		});
}
function lookup() {
		var searchQuery = $("#search-box");
		var t = $("#type").val();
		var x = $("#x").val();
		
		
	
				if (searchQuery.val() != "" ){
					getInfo(t,searchQuery.val(),x);
				}
				l = $('#z').val();
			
				if (l == 'true'){
					$(this).val($(this).val().replace(/[^\d].+/, ""));
						if ((event.which < 48 || event.which > 57)) {
								event.preventDefault();
						}
				}
			
		
}

var idleTime = 0;
function timerIncrement() {
		idleTime = idleTime + 1;
		if (idleTime > 15) { 
			var x = confirm('No activity detected for 15 minutes would you like to continue? Press \'Ok\' to continue or Press \'Cancel\' to close this window');
			
			if (x == false){
				window.close();
			}else{
				return false;
			}
		
		}
}

function getListofMPID (q,y,t,z){
	//console.log(t,q,s,y,f,o,a,filter,z);
	//NProgress.start();
	//$("#add-new-anndata").hide();
	
	if (y == undefined || y ==null){
		y = parseInt((new Date).getFullYear()-1);
	}
	
	NProgress.start();	
	var absURL = url = "?t="+t+"&q="+q+"&y="+y+"&z="+z+"&a=no";
	
	
	var linkify;
	$.ajax ({
		
			TYPE: "GET",
			url: "../controller/wells/map_mpid"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				NProgress.done();		
				$.each(data,function(i,item){
					
					usgsWellsMapping.QueryExistingPts(null,item,'c');
				});
				
			}
		});
}

$(document).ready(function(){
	init();
	/* idle time */
	 //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 12000); // 2 minutes

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
	$(this).click(function (e) {
        idleTime = 0;
    });
    /*$(this).keypress(function (e) {
        idleTime = 0;
    });
	
	*/
	var t = $("#type").val()
	var searchLabel = $("#searchLabel");
	var searchQuery = $("#search-box");
	var typenm = $("#typenm").val();
	var typeid = $("#typeid").val();
	var facility_owner = $("#facility_owner_id").val();
	var facility_diverter = $("#facility_diverter_id").val();
	//searchQuery.prop("disabled",false);
	//console.log(searchQuery);
	if (t != "Facility"){
		if (typenm != ""){
			var string = decodeURIComponent(typenm);
			//string = string.replace(/%20/g, " ");
			//string = string.replace(/%2F/g, "/"");
			searchQuery.val(string);
			searchLabel.html('Search by '+t+'\'s Name');
			//searchQuery.prop("disabled",false);
			$("#filter").text('Deselect');
			$("#filter").removeAttr('disabled');
			
			universal_id = typeid;
			universal_nm = typenm;
			
			 alert("Map Succesfully Loaded. Press 'Okay' to continue.");  $("#the-modal").modal('show');
		}else{
			//searchQuery.attr("disabled",true);
		//	$("#filter").attr("disabled","true");	
		}
		
	}else{
		if (facility_diverter != null || facility_owner !=null){
			var string = decodeURIComponent(typenm);
			//string = string.replace(/%20/g, " ");
			//string = string.replace(/%2F/g, "/"");
			searchQuery.val(string);
			searchLabel.html('Search by '+t+'\'s Name');
			//searchQuery.prop("disabled",false);
			$("#filter").text('Deselect');
			$("#filter").removeAttr('disabled');
			
			universal_id = typeid;
			universal_nm = typenm;
			
			 alert("Map Succesfully Loaded. Press 'Okay' to continue.");  $("#the-modal").modal('show');
		}
	}
	
	
	//searchQuery.attr("disabled",true);
	
	$(".select-type").click(function(){
		/*var text = $(this).text();
		switch (text){
		
			case 'Search by '+t+'\'s ID':
				searchLabel.html('Search by '+t+'\'s ID');
				$('.typeahead').typeahead('destroy');
				searchQuery.removeAttr("disabled");
				$("#z").val('true');
				//$("#the-centers").remove('col-md-4 col-md-offset-4').addClass('col-md-4 col-md-offset-3');
				
			break;	
			case 'Search by '+t+'\'s Name':
				searchLabel.html('Search by '+t+'\'s Name');
				$('.typeahead').typeahead('destroy');
				searchQuery.removeAttr("disabled");
				$("#z").val('false');
				//$("#the-centers").remove('col-md-4 col-md-offset-4').addClass('col-md-4 col-md-offset-3');
			break;
			case 'Search by '+t+'\'s ID/Name':
				searchLabel.html('Search by '+t+'\'s ID/Name');
				$('.typeahead').typeahead('destroy');
				searchQuery.removeAttr("disabled");
				$("#z").val('false');
				//$("#the-centers").remove('col-md-4 col-md-offset-4').addClass('col-md-4 col-md-offset-3');
			break;
			default:
				searchLabel.html('Select by');
				$('.typeahead').typeahead('destroy');
				
			break;
		}*/
	});
		
		
	$("#filterbycounty").click(function(){
			var check = $(this).is(":checked");
			//$("#search-box").val("");
			if (check){
			$("#x").val('sc');
				$(".tt-menu").text(decodeURI(" Please hit Enter and Click the Box above"));
			}else{
				$("#x").val('');
				//$('.typeahead').typeahead('val', '');
				$(".tt-menu").text(decodeURI(" Please hit Enter and Click the Box above"));
			}
		});
		$("#filter").click(function(){
				var this_text = $(this).text();
				this_text = $.trim(this_text);
				var query = encodeURIComponent(searchQuery.val());
				
				if (this_text == 'Select'){
					checkInfo(t,query)	
				}else{
					searchQuery.val("");
					searchQuery.removeAttr("readOnly");
					$(this).text("Select");
					$("#the-mpidtbl").empty();
					
				}
				

		});
			$("#form-async").submit(function(evt){
					evt.preventDefault();
						var data = $(this).serialize();
						var url = $(this).attr('action');
						var $val = 0;
						
						
						$(".required").each(function(){
							if ($(this).val() == '' || $(this).val() == '--'){
								$val = 1;
								//console.log('when val is null this is the value =>' + $(this).val() + $(this)[0].name);
								$(this).addClass('error');
							}else{
								$(this).removeClass('error');	
							}
						});
						if ($val > 0) {
							alert('Please enter the hightlighted values');
							return false;
						}else{
							$.ajax({
								url:url, 
								type:'POST',
								data:data,
								success:function(data){
										if(data == 'success'){
											//window.location = 'https://wise.er.usgs.gov/wateruse/wells';
											opener.document.fad.refresh_me.value='1';
											window.close();
											alert('Succesfully saved!');
										}else{
											alert('Data Exist - A MPID is already located at this point');
										}
								  }
							});
						}
					});
/*searchQuery.one("keypress",function(){
		NProgress.start();	
		
});*/
	var q= $("#id").val();
	var y= $("#year").val();
	var type= $("#type-othermap").val();
	var tn= $("#typenm").val();
	var z= $("#typeid").val();
	
	if (tn =='all' || tn != ''){
		$(".overlap").html( "Your view is filtered by : "+tn+ " (" +z+ ")");
		
		if (type =='Diverter'){
			type = 'Owner';
			z= $("#id").val();
			q= $("#typeid").val();
		}else{
			type = 'Diverter';
			q= $("#typeid").val();
			z= $("#id").val(); 
			
		}
	}else{ //
		$(".overlap").append('<div class="legend">  Legend:    <a id="hide-overlap"> (Hide Legend) </a></div> ');
		$(".overlap").append('<div class="legend"> <div style="background-color:#c4112f; width:10px; height:10px; margin-right:5px;"></div> No Annual Data Available.</div>');
		$(".overlap").append('<div class="legend">  <div style="background-color:#398dcd; width:10px; height:10px; margin-right:5px;"></div> Has data </div> ');
		$(".overlap").append('<div class="legend">  <div id="tae" style="position:relative;left:101%;top:-62px;float:left;	transform: rotate(90deg); transform-origin: left top 0;"> <a id="show-overlap" style="cursor:pointer;"> Show Legend</a> </div> </div> ');
		$(".overlap").css("display","grid");
		
		$("#tae").hide();
		$("#hide-overlap").click(function(e){
			console.log(screen.width);
			e.preventDefault();
			$("#tae").show();
			$(".overlap").animate({
				  left: '-32%'
			  });
			//$(".overlap").toggle();
		});
		
		$("#show-overlap").click(function(e){
			e.preventDefault();
			$("#tae").hide();
			$(".overlap").animate({
				  left: '0'
			  });
		});
		
	}
	getListofMPID(q,y,type,z);
//validate form 



});//end event


</script>

 
</head>

<body>

<?php 
		if (!empty($_GET)){

			$t = $_GET['type'];
			if ($t == 'Diverter'){
				$t = 'Owner';
			}else if ($t == 'Owner'){
				$t = 'Diverter';
			}
		}else{
			
			echo '<script> 
							alert("There is an error.\n Error 1P: Undefined P-var.\nPlease hit okay to continue " )
							window.location.href = "https://wise.er.usgs.gov/wateruse/wells/";	
					</script>';

			//window.location.href = "https://wise.er.usgs.gov/wateruse/wells/";
		}
	
		# include '../includes/html/header_new.php'; 
		echo "<input type='hidden' id='type' value='".$t."'>";
		echo "<input type='hidden' id='type-othermap' value='".$_GET['type']."'>";
		echo "<input type='hidden' id='id' value='".$_GET['id']."'>";
		echo "<input type='hidden' id='nm' value='".$_GET['nm']."'>";
		if (!$_SESSION['COUNTY_CD']){
			echo "<input type='hidden' id='county' value='".$_SESSION['USER_COUNTY']."'>";
		}else{
			echo "<input type='hidden' id='county' value='".$_SESSION['COUNTY_CD']."'>";
		}
	
?>
<input type='hidden' id='z'>
<input type='hidden' id='x'>
	<div class="container" id="container">
	
		<div class="row">
		<div class="col-md-5 col-md-offset-5" id ="main-title">
				<h3> Measurement Point Center</h3>
		</div>
			<div class="col-lg-4 col-lg-offset-3" id="the-centers" >
					 <div class="form-group">
						<div class="input-group">
							<div class="input-group-btn" >
								<div class="btn-group"> 
									<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="select-type">
										<span data-bind="label" id="searchLabel">Search by <?php echo $t; ?>'s ID/Name </span> <span class="caret"></span>
									</button> 
									<!-- <ul class="dropdown-menu" role="menu">
										<li><a href="#" class="select-type">Search by <?php echo $t; ?>'s ID/Name</a></li>
									
									</ul>-->
								</div>
							
								<div class="btn-group"> 
									<label class="btn btn-primary">
										<input type="checkbox" id="filterbycounty" checked> Filter by my County 
									</label>
								</div>
							</div> 
						
						<div id="scrollable-dropdown-menu">					
								<input type="search" class="form-control typeahead tt-query" id="search-box" placeholder="<-- Select Type"/>
						</div>
							<span class="input-group-btn">
								<button id="filter" class="btn btn-primary btn-block">
									Select 
								</button>
							</span>
						</div>
					 </div>
				
			</div>
		
			<br><br>
			<br><br>
			
		</div>
		<?php 
				
						#print_r ($_GET);
					
		?>
		<div class="row">
	
			<form method="POST" id="form-async" action="../controller/wells/savemp">
				<?php $type = $_GET['type'];
							if ($type == 'Owner' ){
					
									echo "<input type='hidden' id='oid' name= 'oid' value='".$_GET['id']."'>";
									echo "<input type='hidden' id='did' name= 'did'>";
							}elseif ($type=='Diverter') {
								echo "<input type='hidden' id='did' name= 'did' value='".$_GET['id']."'>";
								echo "<input type='hidden' id='oid' name= 'oid'>";
							}elseif ($type=='Facility'){
								echo "<input type='hidden' id='fid' name ='fid' value = '".$_GET['id']."'>";
								echo "<input type='hidden' id='fnm' name ='fnm' value = '".$_GET['nm']."'>";
								
								echo "<input type='hidden' id='facility_owner_id' name= 'oid' value='".$_GET['facility_owner_id']."'>";
								 echo "<input type='hidden' id='facility_owner_nm' name= 'facility_owner_nm' value='".$_GET['facility_owner_nm']."'>";
								
								echo "<input type='hidden' id='facility_diverter_id' name= 'did' value='".$_GET['facility_diverter_id']."'>";
								echo "<input type='hidden' id='facility_diverter_nm' name= 'facility_diverter_nm' value='".$_GET['facility_diverter_nm']."'>";
							}
				 ?>
				<?php echo "<input type='hidden' id='year' name= 'year' value='".$_GET['year']."'>" ?>
				<?php echo "<input type='hidden' id='usecd' name= 'use_cd' value='".$_GET['usecd']."'>"?>
				<?php echo "<input type='hidden' id='method' name= 'method' value='".$_GET['method']."'>"?>
				<?php echo "<input type='hidden' id='typeid' name= 'typeid' value='".$_GET['typeid']."'>"?>
				<?php echo "<input type='hidden' id='typenm' name= 'typenm' value='".$_GET['typenm']."'>"?>
			
				
				
			
				
				
				<table id="the-mpidtbl" class="table">
					
				</table>
				
			</form>
			
		</div>
		
		<!-- <button type="button" class="btn btn-primary center"  data-toggle="modal" data-target="#the-modal" id="toggle-data">Toggle Map</button>
		<div class="modal fade" id="the-modal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
		  <div class="modal-dialog" role="document" style="z-index:1;">
			<div class="modal-content" >
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="the-modal-label">Mapping Tool</h4>
				
			  </div>
			  
				<div class="modal-body">
					<div id="map"></div>
				</body>
						
				</div>
			
			  </div>
			  <!-- <div class="modal-footer">
				
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
			</div> -->
			<!--<button type='button'  data-toggle="modal" data-target="#the-modal" id="toggle">Toggle Map </button>-->
			
		
			<div class="modal fade" id="the-modal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" >
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label">Mapping Tool</h4>
						<h5 class="modal-title" id="the-modal-label">Pick a point ot Graph my Latitude and Longitude</h5>
						<div id="set-latlng" style="margin-top:10px;"> 
							<label for ="the-lat"> Latitude: </label> <input type="number" id="the-lat">&nbsp;
							<label for="the-lng">Longitude: </label> <input type="number" id="the-lng" min="-1">&nbsp;
							<button id="this-tomap"> Search</button>
						</div>
						<div id="set-latlng" style="margin-top:10px;"> 
							<span> Example: Decimal Degrees (DD): Latitude: 34.7465 Longitude: 92.2896
							
							  </span> 
						</div>
						
						<div id="set-latlng" style="margin-top:10px;"> 
							<span> Degrees, Minutes, Seconds (DMS): Latitude:  344447 Longitude: 921723 (no spaces)
							  </span> 
						</div>
						<div id="set-latlng" style="margin-top:10px;"> 
							<span><a data-toggle="collapse" href="#AdvSearch" id="adv-search-link" aria-expanded="false" aria-controls="AdvSearch">
								Advance Search
							  </a>
							 </span>
						</div>
						<div id="AdvSearch" class="collapse"  style="margin-top:10px; margin-left:50px;"> 
							<p>
								Search location by Section/Range/Township
							</p>
							<div> 
								<label for="the-lng"> Township: </label> 
									<input type="text"  class="adv-imprnt"  id="adv-township" maxlength="4" size="4">&nbsp;
									<select id="adv-township-direction">																	
										<option value="N"> N </option>
										<option value ="E"> E </option>
										<option value ="W"> W </option>
										<option value ="S"> S </option>
									</select> &nbsp;  
								<label for="the-lng"> Range: </label> 
									<input type="text" class="adv-imprnt" id="adv-range" maxlength="4" size="4"> 
									<select id="adv-range-direction">	
										<option value="N"> N </option>
										<option value ="E"> E </option>
										<option value ="W"> W </option>
										<option value ="S"> S </option>
									</select>
								<label for ="the-lat"> Section: </label> 
									<input type="number" id="adv-section" style="width:50px;" disabled>&nbsp; 
								<button id="this-tomapAdv"> Search</button>
							</div>
						</div>
						<div id="set-latlng" style="margin-top:10px;"> 
							<span style="color:red;"> <strong>NOTE: SECTION BOUNDARIES WILL APPEAR WHEN ZOOMED IN.
								</strong>
							  </span> 
						</div>
					  </div>
					  <div class="modal-body">
							<div id="map"></div>
					  </div>
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div> -->
					</div>
				  </div>
				</div>
			<script>
			
	
			
			
	var getJSONData = {
					
				initData: function(){
					
						
					var date = new Date();
					var yearnow = date.getFullYear();
					//$(".select2").select2();
					$("#hideme").hide();
					$("input[name='well_depth']").attr("readOnly",true);
					$("#date-drilled").attr("readOnly",true);
					$("#status-div").html("Loading : 0%");
			
					this.getOwner(1);
					key_count_global = 0;
					$("#list-owner").on("keypress", function() {
							key_count_global++;
							setTimeout("lookup_owner("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
						});
					
					$("#list-diverter").on("keypress", function() {
							key_count_global++;
							setTimeout("lookup_diverter("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
						});
						
					$("#filter-owner").click(function(){
						$("#list-owner").val('');
							var $k = $(this).is(":checked");
							if ($k == true){
								$("#list-owner").val('');
								//console.log(isEmpty);
								 $('#list-owner ').typeahead('destroy');
							}
					});
					$("#filter-diverter").click(function(){
						
							var $k = $(this).is(":checked");
							if ($k == true){
								$("#list-diverter").val('');
							
							}
					});
					$("#date-drilled").datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '1985:'+yearnow
						
					});
					$("#source_cd").on('change',function(){
						
						var source_cd  = $(this).val();
						if (source_cd == 'GW'){
							$("#hideme").show();
							$("input[name='well_depth']").addClass("required");
							$("input[name='well_depth']").attr("readOnly",false);
							
							$("#driller").addClass("required");
							$("#date-drilled").addClass("required");
							$(".driller-imp").show();
							$(".hidesw").show();
						}else if (source_cd == 'SW'){
							//$("#date-drilled").removeClass("required");
							$("#driller").removeClass("required");
							$("#aquifer").removeClass("required");
							$(".driller-imp").hide();
							$(".hidesw").hide();
							$("#hideme").hide();
							$("input[name='well_depth']").val('');
							$("input[name='well_depth']").removeClass("required");
							$("input[name='well_depth']").attr("readOnly",true);

						}else if (source_cd == 'SP'){
							$("#date-drilled").removeClass("required");
							$("#driller").removeClass("required");
							$("#aquifer").removeClass("required");
							$(".driller-imp").hide();
							$(".hidesw").hide();
							$("#hideme").hide();
							$("input[name='well_depth']").val('');
							$("input[name='well_depth']").removeClass("required");
							$("input[name='well_depth']").attr("readOnly",true);

						}else{
							$("#hideme").hide();
							$(".hidesw").show();
							$("input[name='well_depth']").val('');
							$("input[name='well_depth']").removeClass("required");
							$("input[name='well_depth']").attr("readOnly",true);
							
							$("#driller").addClass("required");
							$("#date-drilled").addClass("required");
							$(".driller-imp").show();
						}
				
					});
					$("#draft").click(function(){
							$("#saveasdraft").attr('name','saveasdraft');
							$("#saveasdraft").val('true');
								
					});
					$("#save").click(function(){
						$("#saveasdraft").val('false');
								
					});
					$("#date-drilled-unknown").click(function(){
							if ($(this).is(':checked')){
								$("#date-drilled").val('Unknown');
								$("#label-date-drilled-unknow").text('Uncheck to select a date');
								$("#date-drilled").datepicker("destroy");
								$("#date-drilled").removeClass('error');
							}else{
								$("#date-drilled").val('');
								$("#date-drilled").addClass('error');
								$("#label-date-drilled-unknown").text('Check if unknown');
								$("#date-drilled").datepicker();
							}
							
						});
						
				
				
				var inputQuantity = [];
							//$(function() {
										  $(".numbers").each(function(i) {
											inputQuantity[i]=this.defaultValue;
											 $(this).data("idx",i); // save this field's index to access later
										  });
										  $(".numbers").on("keyup", function (e) {
											var $field = $(this),
												val=this.value,
												$thisIndex=parseInt($field.data("idx"),10); // retrieve the index
											//window.console && console.log($field.is(":invalid"));
											  //  $field.is(":invalid") is for Safari, it must be the last to not error in IE8
											if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
												this.value = inputQuantity[$thisIndex];
												return;
											} 
											if (val.length > Number($field.attr("maxlength"))) {
											  val=val.slice(0, 5);
											  $field.val(val);
											}
											inputQuantity[$thisIndex]=val;
										  });      
							//});
				},
				
				getDriller:function(seleted_driller){
							
						$("#driller").empty();
						$("#driller").append('<option disabled>Loading Data please wait...<option>');
						
			
						$.ajax ({
								type: "POST",
								url: "../controller/wells/driller",
								ContentType: "application/json",
								dataType: "json",
								success:function(data){
									$("#driller").empty();
									$("#driller").append('<option value="">--</option>');	
									$("#driller").append('<option value="UNKNOWN">UNKNOWN</option>');	
									$.each (data, function (i,item){
										if (data[i].use_cd != 'AG' || data[i].use_cd != 'IR'){
											if (item.nm == seleted_driller){
												$("#driller").append('<option value = "'+data[i].nm+'" selected>'+data[i].nm+'</option> ');
											}else{ 
												$("#driller").append('<option value = "'+data[i].nm+'">'+data[i].nm+'</option> ');
											}
										}
									});
								
								}
						});
				},
				getAquifer: function(selected_aquifer){
					$("#aquifer").empty();
					$("#aquifer").empty();
					$("#aquifer").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../controller/wells/aquifer",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#aquifer").empty();	
								$("#aquifer").append('<option value="">--</option>');	
								$("#aquifer").append('<option value="UNKNOWN">UNKNOWN</option>');	
								$.each (data, function (i,item){
									
									if (data[i].use_cd != 'AG' || data[i].use_cd != 'IR'){
										
										if (item.id == selected_aquifer ){
											$("#aquifer").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
										}
										else{
											$("#aquifer").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										}
									}
								});
								
							}
					});
				},
				getCounty: function(selected_county){
					$("#county_station").empty();
					$("#county_station").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchcounty",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#county_station").empty();	
								$("#county_station").append('<option value="">--</option>');	
								$.each (data, function (i,item){
									
									if (item.cd == selected_county){
										$("#county_station").append('<option value = '+data[i].cd+' selected>'+data[i].nm+'</option> ');	
									}
									else{
										$("#county_station").append('<option value = '+data[i].cd+'>'+data[i].nm+'</option> ');	
									}
								
								});
								
							}
					});
				},
				getState: function(selected_state){
					$("#state_county").empty();
					$("#state_county").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchstate",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#state_county").empty();	
								$("#state_county").append('<option value="">--</option>');	
								$.each (data, function (i,item){
	
									if (item.id == selected_state){
										$("#state_county").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
									}
									else{
										$("#state_county").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										
									}
								});
								
							}
					});
				},
				getOwner: function(filter,query){
					var l = 0;
					NProgress.start();
					$("#list-owner").empty();
					$("#status-div").empty();
					/*
					$("#list-owner").append('<option disabled>Loading Owner please wait...<option>');
					var owner = $("#owner_id-h").val();
					
					$.ajax ({
							type: "GET",
							url: "../json/fetchowner?filter="+filter,
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#list-owner").empty();	
								$("#list-owner").append('<option value="">--</option>');	
								$.each (data, function (i,item){
								
										$("#list-owner").append('<option value = '+data[i].id+'>'+data[i].nm+' ('+data[i].id+')</option> ');	
									 
									l++;
								});
								for (var $i=0; $i<=l; ++$i){
									$percentage = (($i/l)*100);
									if ($percentage <100){
										$("#status-div").html("Loading :"+$percentage+ '%');
									}else{
										$("#status-div").html("Succesfully Loaded :"+$percentage+ '%');
									}
									
									
								}
								
								getJSONData.getDiverter(1);
								NProgress.done();
							}
					});*/
									
					$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchowner?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list =  new Array();
								$.each(data, function(i,item){
										list.push(data[i].nm+ ' ('+data[i].id+')');	
									
								});
								var isEmpty = list.length;
								
								//console.log(isEmpty);
								 $('#list-owner ').typeahead('destroy');
									var list = new Bloodhound({
										datumTokenizer: Bloodhound.tokenizers.whitespace,
										queryTokenizer: Bloodhound.tokenizers.whitespace,
										local: list
								});
								
								 $('#list-owner').typeahead(null, {
								  name: 'list',
								  limit: 15,
								  source: list,
									 templates: {
										empty: '<div class="empty-message" style="padding-left:5px; z-index:9999 !important;"> No result for '+query+' </div>'
									  }
								  
								});
							
								/*		
						
								$('#scrollable-dropdown-menu .typeahead').typeahead({
									hint: true,
									highlight: true, 
									minLength: 1, 
								},
								
								{
									name: 'list',
									source: list
								});
									*/
									NProgress.done(true);
									
							},
							error:function(err, ajaxOptions, throwError){
								alert("Internal Server Error! Please contact the administrator");
							}
							
					});
					//	$("#list-owner").css("width","500px");
				
				},
				getDiverter: function(filter,query){
						NProgress.start();
						$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchdiverter?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list =  new Array();
								$.each(data, function(i,item){
										list.push(data[i].nm+ ' ('+data[i].id+')');	
									
								});
								var isEmpty = list.length;
								
								//console.log(isEmpty);
								 $('#list-diverter').typeahead('destroy');
									var list = new Bloodhound({
										datumTokenizer: Bloodhound.tokenizers.whitespace,
										queryTokenizer: Bloodhound.tokenizers.whitespace,
										local: list
								});
								
								 $('#list-diverter').typeahead(null, {
								  name: 'list',
								  limit: 15,
								  source: list,
									 templates: {
										empty: '<div class="empty-message" style="padding-left:5px; z-index:9999 !important;"> No result for '+query+' </div>'
									  }
								  
								});
							
								/*		
						
								$('#scrollable-dropdown-menu .typeahead').typeahead({
									hint: true,
									highlight: true, 
									minLength: 1, 
								},
								
								{
									name: 'list',
									source: list
								});
									*/
									NProgress.done(true);
									
							},
							error:function(err, ajaxOptions, throwError){
								alert("Internal Server Error! Please contact the administrator");
							}
							
					});
				},
				appendStationDynamic: function(m,o,d,y,owner_nm,diverter_nm){
					var latitude_dd;
					var longitude_dd;
					$.ajax ({
					TYPE: "GET",
					url: "../controller/wells/searchanndata?t=3&mpid="+m+"&owner="+o+"&diverter="+d,
					ContentType:"application/json",
					dataType:"json",
					async: "false",
					
						success:function(data){
							$.each(data,function(i,item){
								//console.log(data);
									$("#list-owner").attr("placeholder",owner_nm);
									$("#list-diverter").attr("placeholder",diverter_nm);
									$("#local_desc_station").val(item.local_desc);
									$("#action_cd_station").val(item.action_cd);
									$("#source_cd_station").val(item.source_cd);
									$("#tract_no_station").val(item.tract);
									$("#farm_no_station").val(item.farm);
									$("#quad_no_station").val(item.quadno);
									$("#operator_no_station").val(item.wellno);	
									$("#well_no_station").val(item.wellno);
									$("#source_nm_station").val(item.stream_nm);		
									$("input:radio[name='dam']").val([item.dam]);
									getJSONData.getDriller(item.driller_nm);
									getJSONData.getAquifer(item.prin_aquifer);
									$("#date-drilled").val(item.date_drilled);
									getJSONData.getCounty(item.county_cd);
									getJSONData.getState(item.state_cd);
									$("#huc_station").html("<a href='#' id ='aHuc_station'>"+item.huc+"</a>");
									$("#quad1_station").val(item.quad1);
									$("#quad2_station").val(item.quad2);
									$("input[name='section']").val(item.section);
									$("input[name='township']").val(item.township);
									$("input[name='elevation']").val(item.altitude);
									$("input[name='range']").val(item.range);
									$("input[name='pump_hp']").val(item.pump_hp);
									$("input[name='pipe_diam']").val(item.pipe_diam);
									$("input[name='huc']").val(item.huc);
								
									latitude_dd = parseFloat(item.latitude_dd);
									longitude_dd = parseFloat(item.longitude_dd);
								
									$("span[name='lat']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" +  item.latitude+ " / " + latitude_dd.toFixed(3) + "</a>");
									$("input[name='latDMS']").val(item.latitude);
									$("input[name='latDD']").val(item.latitude_dd);
									$("span[name='lng']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" +  item.longitude+ " / " +longitude_dd.toFixed(3) + "</a>");
									$("input[name='lngDMS']").val(item.longitude);
									$("input[name='lngDD']").val(item.longitude_dd);
									$("select[name='power_tp']").val(item.power_tp);
									$("select[name='diversion_meth']").val(item.diversion_meth);
									$("input:radio[name='flow_meter']").val([item.meter_flg]);
									$("input:radio[name='rec_waste']").val([item.rec_waste]);
									
							});
						}
					});
				},
				
			}
			
		/** END OF  STATION APPEND 	 **/ 
		var usgsWellsMapping = {
				EsriBaseLayer : 'https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png',
				map: null,
				wellsLayer:null,
				largeMapShown:false,
				layer: [2,3,8,9,10],
				data : [],
			
			wellMapInit : function(){
				
					var BaseLayer = L.tileLayer(this.EsriBaseLayer,{attribution:false});
					var satLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {attribution:false}),
						  streetLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false}),
						  topoLayer = L.tileLayer('https://server.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false});
						//  elevLayer = L.tileLayer('https://server.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false});
						  
					map = L.map('map',{
					  fullscreenControl: true,
					  fullscreenControlOptions: {
						position: 'topleft'
					  },
					  layers: [satLayer,streetLayer, topoLayer]
					}).setView([34.746483  , -92.289597], 7); /* SET THE VIEW FOCUSED ON LITTLE ROCK,AR*/
						
					var baseLayers = {
						"Sattelite": satLayer,
						"Street": streetLayer,
						"Topographic": topoLayer
					};

					
					
					L.control.layers(baseLayers).addTo(map);
					L.esri.basemapLayer('Gray',{attribution:false}).addTo(map);
					this.getLayer();
					this.getDataFromLayer();
					
					var scale = L.control.scale().addTo(map); 

					// Get the label.
					var metres = scale._getRoundNum(map.containerPointToLatLng([0, map.getSize().y / 2 ]).distanceTo( map.containerPointToLatLng([scale.options.maxWidth,map.getSize().y / 2 ])))
					  label = metres < 1000 ? metres + ' m' : (metres / 1000) + ' km';
						
				},
				
				getLayer : function(){
					L.esri.featureLayer({
						url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8',
						color: '#BA454E',
						opacity: 0.25,
						attribution:'<a href="http://www.doi.gov/">Department of Interior </a>  |  <a href="http://www.usgs.gov"> U.S Geological Survey</a> | <a href="http://ar.usgs.gov"> Arkansas Water Science Center </a>'
					  }).addTo(map);
					  
					 // map.on("zoomstart", function (e) { console.log("ZOOMSTART", e); });
					  
					  
					  	var url = "https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/9";
					
						L.esri.featureLayer({
						  url: url,
						  opacity : 0.20,
						  minZoom : 12,
						  maxZoom :18
						}).addTo(map);
				},
				
				
				getDataFromLayer: function(e,input){
						map.closePopup();
					if (!input){
							map.on('click',function(e){
								this.setView(e.latlng, 15)
								usgsWellsMapping.QueryData(e,null,'c');
								
								
							});
							
							
						
					}else{
							//console.log(null,i);
							var  lat= input[0];
							var lng = input[1];
						
							if(lat.indexOf('.') !== -1 && lng.indexOf('.') !== -1)
							{
								
								var k = [];
								var lngneg;
								if (input[1] < 1){
									lngneg = parseFloat(input[1]);
								
								}else{
									lngneg = parseFloat((input[1])*-1);
									
								}
								var k = [lat,lngneg]
								usgsWellsMapping.QueryData(null,k,'s');
								
								map.zoomIn(15);
								map.panTo(k);
							}else{
								
								if (lat.toString().length<7 && lng.toString().length <7){
									var newInput = this.convertToDD(lat,lng)
									usgsWellsMapping.QueryData(null,newInput,'s');
									map.zoomIn(15);
									map.panTo(newInput);

								}else{
									alert('Invalid Input. Lat/lng in DMS should not be more than 7 characters long!');
									map.closePopup();
								}
								
								
							}

							
							
					}
					
				},
				advSearch : function (range,section,township){
					
					
					var query = L.esri.query({
							url:'https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/9'
						});
				
					var whereQuery;
					var rangeQuery;
					var sectionQuery;
					var townshipQuery;
					var labels = {};
					rangeQuery = range != "" ? "RANGE = '"+range+"'" : range = '';
					sectionQuery = section != "" ? " AND SECTION_ = '"+section+"'" : section = '';
					townshipQuery = township != "" ? " AND TOWNSHIP = '"+township+"'" : township = '';
					
					whereQuery = rangeQuery+sectionQuery+townshipQuery;
					
				
					// console.log(whereQuery);
					query.where(whereQuery).bounds(function(error, latLngBounds, response){
						 
						 // if (label != undefined){
							 // map.eachLayer(function (layer) {
								// if (layer._zooming == false && layer._leaflet_id != '41' && layer._leaflet_id != '42'){
									
									 // map.removeLayer(layer);
								// }							
							// });
						 // }
						// console.log(labels[e]);
						if (error){
							alert(error['message']);
							map.eachLayer(function (layer) {
								if (layer._zooming == false && layer._leaflet_id != '41' && layer._leaflet_id != '42'){
									
									 map.removeLayer(layer);
								}							
							});
						}else{
							map.fitBounds(latLngBounds);
							map.zoomIn(1);
						}
						
					});
					
					
			
					var sectionBoxes = L.esri.featureLayer({
						url:'https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/9',
						minZoom : 11,
						maxZoom :18,
						color:'black',
						fillColor: 'none',
						weight:0.1,
						minZoom : 12,
						maxZoom :18,
						where: whereQuery
					}).addTo(map);
					
	
					  sectionBoxes.on('createfeature', function(e){

						var id = e.feature.id;
						var feature = sectionBoxes.getFeature(id);
						var center = feature.getBounds().getCenter();
						sectionBoxes.redraw(id);
						var label = L.marker(center, {
						  icon: L.divIcon({
							iconSize: null,
							className: 'label',
							html: '<div style="color:black; font-size:20px" class="section_label">' + e.feature.properties.section_ + '</div>'
						  })
						}).addTo(map);
						labels[id] = label;
					  });
						
					  sectionBoxes.on('addfeature', function(e){
						var label = labels[e.feature.id];
						if(label){
						  label.addTo(map);
						}
						
					  });

					  sectionBoxes.on('removefeature', function(e){
						var label = labels[e.feature.id];
						if(label){
						  map.removeLayer(label);
						}
					  });
						// query.where("section_ ='"+section+"'").run(function(a, b, c){
							
							// console.log(b, c,a);
							
						 // });
				},
				convertToDMS : function(latlng){
						
						deg = Math.abs(latlng);	
						var d = Math.floor(deg);
						var minfloat = (deg - d)*60;
						var m = Math.floor(minfloat);

						var secfloat = (minfloat-m)*60;
						var s = Math.round(secfloat);
						// After rounding, the seconds might become 60. These two
						// if-tests are not necessary if no rounding is done.
						
						if (s==60) {
							m++;
							s=0;
						}
						if (m==60) {
							d++;
							m=0;
						}

						if (m < 10) {
							m = "0" + m;
					   }
						if (s < 10) {
						  s = "0" + s;
					   }
						return "" + d + m + s;
						
					
					
				 
					
					 // return "" + d + m + s;
					   //return [lat_r,lng_r];
				},
				convertToDD : function (lat,lng){
					var DegreeLat;
					var MinsLat;
					var SecsLat;
					var DDLatMS;
					var DDLat;
					
					var DegreeLng;
					var MinsLng;
					var SecsLng;
					var DDLngMS;
					var DDLng;

					for(indx in lat){
					  DegreeLat = parseInt(lat[0] + lat[1]);
					  MinsLat = parseInt(lat[2] + lat[3]);
					  SecsLat = parseInt(lat[4]+ lat[5]);
					  
					  MinsLat = (MinsLat/60);
					  SecsLat = (SecsLat/3600);
					  DDLatMS =  (MinsLat+SecsLat);
					
					  
					}
					for(indx in lng){
					  DegreeLng = parseInt(lng[0] + lng[1]);
					  MinsLng= parseInt(lng[2] + lng[3]);
					  SecsLng = parseInt(lng[4]+ lng[5]);
					  
					  MinsLng = (MinsLng/60);
					  SecsLng = (SecsLng/3600);
					  DDLngMS =  (MinsLng+SecsLng);
					
					  
					}
					
				
					DDLat = parseFloat(DegreeLat+DDLatMS);
					DDLat = DDLat.toFixed(4); 
					
					DDLng = parseFloat((DegreeLng+DDLngMS)*-1);
					DDLng = DDLng.toFixed(4); 
					return [DDLat,DDLng];
				},
				QueryData : function(e,input,c){
					//console.log('1', input);
					var latlng;
					if (!e){
						latlng= input;
						elevlat= input[0];
						elevlng =input[1];
						//alert('no e');
					}else{
					
						latlng = e.latlng;
						elevlat = e.latlng.lat;
						elevlng =e.latlng.lng;
						
					//	console.log(latlng);
					}
					boundary = L.esri.query({
										url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8'
								});
								boundary.nearby(latlng,1);
								boundary.run(function(error,featureCollection,response){
									isBound = featureCollection.features.length;
								
								if (isBound ==1){
									$.each(usgsWellsMapping.layer,function(i,item){
										console.log(item);
										var url = 'https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/'+item
										
										var dynamicQuery =L.esri.query({
													url:url,
													returnGeometry:false
											});
										dynamicQuery.nearby(latlng,1);
										dynamicQuery.run(function(error,featureCollection,response){
											console.log(response);
											if(featureCollection !=null || featureCollection != "undefined"){
											
												if (item == '2'){
													quad_nm = featureCollection.features[0].properties.quad_name;
													$("#quad_nm").val(quad_nm);
													
												}else if (item =='9'){
													//console.log(featureCollection)
													
													section = featureCollection.features[0].properties.section_;
													county = featureCollection.features[0].properties.county;
													township = featureCollection.features[0].properties.township;
													range = featureCollection.features[0].properties.range;
												
													$("#section").val(section);
													$("#county2").val(county);
													$("#township").val(township.replace(" ",""));
													//$("#township").val(township);
													$("#range").val(range.replace(" ",""));
												}else if (item == '3'){
													onefourthquad = featureCollection.features[0].properties.quad_name;
													direction = featureCollection.features[0].properties.direction;
													$("#onefourth").val(quad_nm);
													$("#direction").val(direction);	
												}/*else if(item=='8'){
													huc = featureCollection.features[0].properties.HUC12;
													huc  = huc.slice(0,-4);
													$("#huc").val(huc);
												}*/
												
											}

											});
											
											var urlhuc = 'https://hydro.nationalmap.gov/arcgis/rest/services/wbd/MapServer/6'; 
											
											var dynamicQueryHucOnly = L.esri.query({
													url:urlhuc,
													returnGeometry:false
											});
											dynamicQueryHucOnly.nearby(latlng,1);
											
											 if(item=='8'){
												 dynamicQueryHucOnly.run(function(error,featureCollection,reponse){
													huc2 = featureCollection.features[0].properties.HUC12;
													huc2 = huc2.slice(0,-4);
													$("#huc").val(huc2);	
												});
												 
												 
										 }
									});
									
									$.ajax({
											type: 'GET',
											url: 'https://nationalmap.gov/epqs/pqs.php?x='+elevlng+'&y='+elevlat+'&units=Feet'+'&output=json',
											ContentType:"application/json",
											dataType:"json",
											async: "false",
											success:function(data){
												$.each(data,function(i,item){
													elevation = data['USGS_Elevation_Point_Query_Service'].Elevation_Query['Elevation'];
													if (elevation){
															$("#elevation").val(elevation);
														}
															
													});
												}

										});
										$("#lat").val(elevlat);
										$("#lng").val(elevlng);
									var quad1 = $("#quad_nm").val();
									var onefourth1 = $("#onefourth").val();
									var section1 = $("#section").val();
									var range1 = $("#range").val();
									var township1 = $("#township").val();
									var lat1 = $("#lat").val();
									var lng1 = $("#lng").val();
									var direction1 = $("#direction").val();
									var elevation1 = $("#elevation").val();
									var county1 = $("#county2").val();
									var huc = $("#huc").val();
									var content = "Click me again to load the data";
									var x;
								
									var elevlatDMS = usgsWellsMapping.convertToDMS(elevlat);
									var elevlngDMS = usgsWellsMapping.convertToDMS(elevlng);
									
									var $mpid = elevlatDMS+elevlngDMS+'01';
									var mpid = usgsWellsMapping.checkMPIDexist($mpid);
									var $newMPID = $("#mraz").val();
									
									
									
									if (quad1 !='' && section1 !='' && range1 !='' && township1 !='' /*&&lat !='' && lng !='' */&& direction1 !='' && county1 !='' && huc !='' && elevation1 !=''){
									
											var linktoAppend = '<a href="#" id="assoc" onClick="return usgsWellsMapping.appendData();"> Use this Information </a>';
											content = 'Information for County: <strong>'+county1+'</strong>\
															<br>\
															Latitude: <strong>'+elevlat+'</strong>\
															<br>\
															Longitude: <strong>'+elevlng+'</strong>\
															<br>\
															Latitude (Degree Minutes Seconds): <strong>'+elevlatDMS+'</strong>\
															<br>\
															Longitude (Degree Minutes Seconds): <strong>'+elevlngDMS+'</strong>\
															<br>\
															Quad name: <strong>'+quad1+'</strong>\
															<br>\
															Section: <strong>'+section+'</strong>\
															<br>\
															Range: <strong>'+range1+'</strong>\
															<br>\
															Township: <strong>'+township1+'</strong>\
															<br>\
															HUC: <strong>'+huc+'</strong>\
															<br>\
															Direction: <strong>'+direction1+'</strong>\
															<br>\
															Altitude in Feet (ft): <strong>'+elevation1+'</strong>\
															<br>\
															<br>\
															<strong> NOTE: IDENTIFY THE QUARTER OF QUARTER FIRST BEFORE PROCEEDING. </strong>\
															<br>\
															'+linktoAppend+'\
															';
											
										}else{
											
											
											c == 'c' ? content = '<a href= "#" id="load-content-onemoretime"> Click me  to load the data </a>' : content = 'Hit the Search Button again or hit this <a href= "#" id="load-content-onemoretime"> Link </a>!';
										
											//content = 'Due to poor internet connection or server issues with data provider, some of the data may not load right away. <br> Click the map to try loading the data again. <br> If problem persist please refer to the manual by clicking <a href="https://wise.er.usgs.gov/wateruse/wells/help.html#mapping" target="_blank"> this link </a>';
										}
										var popup = L.popup();
											popup
											.setLatLng(latlng)
											.setContent(content)
											.openOn(map);
											
									
											$('#load-content-onemoretime').click(function(e){
												
												e.preventDefault();
												usgsWellsMapping.QueryData(null,[lat1,lng1],'c');
											});
									
										
								}else{
									var popup = L.popup();
											popup
											.setLatLng(latlng)
											.setContent('Out of bounds')
											.openOn(map);
									
								}
								
								
								
									
							});
								
				},
				edit: function (mpid,year,did,oid,editMPID,editPayment) {
					
					if (editMPID){
						window.open('https://wise.er.usgs.gov/'+$dir+'/wells/measpt?mpid='+mpid+'&year='+year+'&diverter='+did+'&owner='+oid+'&openModalEdit=yes');
					}else if (editPayment){
						window.open('https://wise.er.usgs.gov/'+$dir+'/wells/measpt?mpid='+mpid+'&year='+year+'&diverter='+did+'&owner='+oid+'&openModalPayment=yes');
					}else{
						window.open('https://wise.er.usgs.gov/'+$dir+'/wells/measpt?mpid='+mpid+'&year='+year+'&diverter='+did+'&owner='+oid);
					}
					
				},
				add: function(mpid){
					alert('This feature will be implemented soon! :)');
					//window.open('https://wise.er.usgs.gov/'+$dir+'/wells/measpt?mpid='+mpid+'&year='+year+'&diverter='+did+'&owner='+oid);
				},
				QueryExistingPts: function(e, arr,c){
					var ctr = 0;
					var latlng = [];
				
					latlng = [arr.latitude_dd,arr.longitude_dd];
					//console.log(latlng);
							boundary = L.esri.query({
								url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8'
							});
							boundary.nearby(latlng,1);
								boundary.run(function(error,featureCollection,response){
								
									isBound = featureCollection.features.length;

										if (isBound ==1){
											var url = arr.mpid+','+arr.year+','+arr.diverter_id+','+arr.owner_id;
											var rawUrl = 'thempid='+arr.mpid+'&'+'type='+arr.type+'&';
											
											var rData =
											arr.data == 'Yes' ? rData = arr.data+' (<a id="edit-anndata" onClick="return usgsWellsMapping.edit('+url+');"> Edit Annual Data </a>)' 
											: rData = arr.data + ' (<a id="add-anndata" onClick="return usgsWellsMapping.add('+rawUrl+');"> Add Annual Data </a>)';
											var k1 = '1';	
											
											var rPayment = 
											arr.paid == 'Yes' ? rPayment = arr.paid+' (<a id="edit-anndata" onClick="return usgsWellsMapping.edit('+url+',null,'+k1+');"> Edit Payment </a>)' 
											: rPayment = arr.paid + ' (<a id="add-anndata" onClick="return usgsWellsMapping.edit('+url+',null,'+k1+');"> Add Payment </a>)';
											
											
											
											var content = arr.year+' Information for MPID: <strong> '+arr.mpid+ '</strong><br />\
																	<hr>\
																	<strong>  Diverter: </strong>'+arr.diverter_nm+'('+arr.diverter_id+') <br />\
																	<strong>  Owner: </strong>'+arr.owner_nm+'( '+arr.owner_id+')<br />\
																	<strong>  Use Type: </strong>'+arr.use_cd+' '+arr.source_cd+'<br />\
																	<strong>  Paid: </strong>'+rPayment+'<br />\
																	<strong>  Data: </strong>'+rData+'<br />\
																	<strong>  Action: </strong>'+arr.action+'<br />\
																	<strong>  County: </strong>'+arr.county_nm+' ('+arr.county_cd+')<br />\
																	<strong>  Latitude (Decimal Degree): </strong>'+arr.latitude_dd+'<br />\
																	<strong>  Latitude (DMS): </strong>'+arr.latitude+'<br />\
																	<strong>  Longitude (Decimal Degree): </strong>'+arr.longitude_dd+'<br />\
																	<strong>  Longitude (DMS): </strong>'+arr.longitude+'<br /><br /> \
																	<a id="edit-mpid" onClick="return usgsWellsMapping.edit('+url+','+k1+',null);"> View/Edit this Meas. Pt. </a> <br />\
																	';
											var iconURL;
											
											if (arr.data != 'Yes'){
												var iconURL = L.icon({
													iconUrl: '../includes/css/img/marker-icon-red.png',
													iconSize:     [20,30]
													
												});
											}else{
												var iconURL = L.icon({
													iconUrl: '../includes/css/img/marker-icon.png',
													iconSize:     [20,30]
													
												});
											}
											var marker = L.marker(latlng,{icon: iconURL})
												.addTo(map)
												
												.openPopup()
												.on('click',onClick);
											function onClick(event) {
												event.target.bindPopup(content);
											}
											
											
										}
										
								}); //@end boundary
							
					ctr++;
				},
				checkMPIDexist: function(mpid){
					
					$.ajax ({
			
						TYPE: "GET",
						url: "../controller/wells/checkmpid?mpid="+mpid,
						ContentType:"application/json",
						dataType:"json",
						async: "false",
						success:function(d){
							if ($.trim(d)){
								$.each(d,function(i,item){
							
									$("#mraz").val(item.new_mpid);
								});
							}else{
								$("#mraz").val(mpid);
							}
							
						}
					});

					
				},
				
				appendData : function(){
					$("#the-centers").remove('col-md-4 col-md-offset-4').addClass('col-md-4 col-md-offset-3')
					var lat = $("#lat").val();
					var lng = $("#lng").val();
					var latDMS = usgsWellsMapping.convertToDMS(lat);
					var lngDMS = usgsWellsMapping.convertToDMS(lng);
					var  type = $("#type").val();
					
					var f_nm = $('#fnm').val();
					var f_id = $('#fid').val();
					
					var fowner_nm = $('#facility_owner_nm').val();
					var fowner_id = $('#facility_owner_id').val();
					
						
					var fdiverter_nm = $('#facility_diverter_nm').val();
					var fdiverter_id = $('#facility_diverter_id').val();
					
					var m;
					var n;
					if (type == 'Diverter'){
						 m = 'Owner';
						 n = 'Diverter';
						 $("#oid").val($("#id").val());
						 $("#did").val(universal_id);
					}else{
						 m = 'Diverter';
						  n = 'Owner';
						  $("#did").val($("#id").val());
						   $("#oid").val(universal_id);
					}
					$("#the-mpidtbl").empty();
			
					$('#the-modal').modal('hide');
					
					var ODF;
					var F;
				
					if (type =='Facility'){
						ODF = '<td colspan="3">Owner:  '+fowner_nm+'(<a href="#" name="oid">'+fowner_id+'</a>) </td>\
									<td colspan="2">Diverter: '+fdiverter_nm+'(<a href="#"  name="did">'+fdiverter_id+'</a>)</td>';
						F = '	<td colspan ="4"> Facility: '+f_nm+'('+f_id+')</td> \
									<td> &nbsp; </td> ';
						
					}else{
							ODF = '<td>'+n+':  '+universal_nm+'(<a href="#" name="oid">'+universal_id+'</a>) </td><td> '+m+': '+$("#nm").val()+'(<a href="#"  name="did">'+$("#id").val()+'</a>)</td>\
															<td> Facility:  N/A </td>';	
					}
					
					
					$("#the-mpidtbl").append('<tbody>\
														<tr>\
															<th colspan="5"> <center>Measurement Point Information ID : <span name="mpid"> '+$("#mraz").val()+'</span></center> <input type="hidden" name="mpid" value='+$("#mraz").val()+' /></th>\
														</tr>\
														<tr>'+ODF+'</tr>\
														<tr>'+F+'</tr>\
														<tr>\
															<td colspan="5"> Local Description: <input type="text" name="local_desc" style= "width:300px;" class="required"> <span class="important">*</span></td>\
														</tr>\
														<tr>\
															<td colspan="2"> Action Code: \
																	<select name="action_cd" class="select2 required">\
																		<option value="--">--</option>\
																		<option value="WD">Withdrawal</option>\
																		<option value="DL">Delivered</option>\
																		<option value="RL">Released</option>\
																		<option value="PR">Production</option>\
																	</select><span class="important">*</span>\
															</td>\
															<td> Source: \
																	<select name="source_cd" id="source_cd"  class="select2 required">\
																		<option value="">--</option>\
																		<option value="SW">Surface Water</option>\
																		<option value="GW">Ground Water</option>\
																		<option value="SP">Spring Water</option>\
																		<option value="TW">Transferred Water</option>\
																		<option value="FW">Facility Water</option>\
																	</select><span class="important">*</span>\
															</td>\
															<td> Tract #:  <input type="text"  name="tract_no" maxlength="5" /></td> \
															<td>Farm #:  <input type="text" name="farm_no" maxlength="5" /> </td>\
														</tr>\
														<tr>\
															<td colspan="2"> Quad #: <input type="text" name="quad_no" maxlength="4" /></td>\
															<td colspan="2"> Operator #: <input type="text" name="operator_no" maxlength="5" ></td>\
															<td> Well #: <input type="text" name="well_no" maxlength="10" /></td>\
														</tr>\
														<tr>\
															<td colspan="2"> Source Name: <input type="text"  name="source_nm" style="width:300px;"></td><span class="important">*</span>\
															<td colspan="2"> Dam <input type="radio" value="Y" name="dam" class="required" >Yes<span class="important">*</span> <input type="radio" value="N" name="dam" class="required">No<span class="important">*</span></td>\
															<td> &nbsp; </td>\
														</tr>\
														<tr class="hidesw">\
															<td colspan="5">\
															<div >\
															Aquifer Code:  <select name="aquifer" id="aquifer" name="aquifer"  class="select2 required" style="width:30%;"></select><span class="important driller-imp">*</span></td>\
															</div>\
														</tr>\
														<tr class="hidesw">\
															<td colspan="5">\
															<div> \Driller Name: <select name="driller" id="driller" name="driller_nm"  class="select2 required" style="width:30%;"></select>\
																<span class="important driller-imp">*</span>\
																</div></td>\
														</tr>\
														<tr>\
															<td colspan="2"> Date Well Drilled or Relift Installed: <input type="text" id="date-drilled" name="date_drilled" class="required" /> <input type="checkbox" id="date-drilled-unknown" class="required" /><label for="date-drilled-unknown" id="label-date-drilled-unknown">Check if unknown</label><span class="important driller-imp">*</span> </td>\
															<td colspan="2"><div  id="hideme"> Well Depth: <input type="number" class="numbers" name="well_depth" step="any" maxlength="4"><span class="important">*</span></div></td>\
															<td> &nbsp; </td>\
														</tr>\
														<tr>\
															<th colspan="5"> <center>Location of Withdrawal</center></th>\
														</tr>\
														<tr>\
															<td colspan="2"> County: <span name="county">'+$('#county2').val()+'</span> <input type="hidden" name="county_cd" value="'+$("#county2").val()+'" name="state_cd"></td>\
															<td colspan="2"> State:  Arkansas</td>\
															<td> HUC: <span name="huc">'+$("#huc").val()+'</span> <input type="hidden" value="'+$("#huc").val()+'" name="huc"></td>\
														</tr>\
														<tr>\
															<td colspan="2"> \
																<select name="quad1"  class="select2 required">\
																	<option value="">--</option>\
																	<option value="SW">SW</option>\
																	<option value="SE">SE</option>\
																	<option value="NW">NW</option>\
																	<option value="NE">NE</option>\
																</select>\
																&frac14;<span class="important">*</span> of \
																<select name="quad2"  class="select2 required">\
																	<option value="">--</option>\
																	<option value="SW">SW</option>\
																	<option value="SE">SE</option>\
																	<option value="NW">NW</option>\
																	<option value="NE">NE</option>\
																</select>\ &frac14;<span class="important">*</span></td>\
															<td> Section:  <input type="text" name="section" value="'+$("#section").val()+'" class="required"><span class="important">*</span></td>\
															<td> Township: <input type="text" name="township" value="'+$("#township").val()+'" class="required"><span class="important">*</span></td>\
															<td> Range: <input type="text" name="range" value="'+$("#range").val()+'" class="required"> <span class="important">*</span> </td>\
														</tr>\
														<tr>\
															<td> Latitude: <span name="lat">'+$("#lat").val()+'</span> <input type="hidden" name="latDMS" value="'+latDMS+'" ><input type="hidden" name="latDD" value="'+$("#lat").val()+'" ></td>\
															<td> Longitude <span name="lng">'+$("#lng").val()+'</span> <input type="hidden" name="lngDMS" value="'+lngDMS+'"><input type="hidden" name="lngDD" value="'+$("#lng").val()+'" ></td>\
															<td> Altitude: <input type="text" name="elevation" value="'+$("#elevation").val()+'" class="required"> <span class="important">*</span></td>\
															<td>&nbsp;</td>\
															<td>&nbsp;</td>\
														</tr>\
														<tr>\
															<th colspan="5"> <center>Pump Information</center></th>\
														</tr>\
														<tr>\
															<td colspan="3"> Pump Horsepower: <input type="number" name="pump_hp" class="required numbers" step="any" maxlength="3" /><span class="important">*</span></td>\
															<td colspan="2"> Discharge Pipe Diameter (inches) : <input type="number" name="pipe_diam" class="required numbers" step="any" maxlength="2" ><span class="important">*</span></td>\
														\
														</tr>\
														<tr>\
															<td colspan="3"> Power Type:\
																<select name="power_tp"  class="select2 required" style="width:10%">\
																	<option value="">--</option>\
																	<option value="ELC">ELC</option>\
																	<option value="LPG">LPG</option>\
																	<option value="DSL">DSL</option>\
																	<option value="OTH">OTH</option>\
																</select><span class="important">*</span></td>\
															<td colspan="2"> Pump Type: \
																	<select name="diversion_meth"  class="select2 required" style="width:15%">\
																		<option value="">--</option>\
																		<option value="STP">STP </option>\
																		<option value="PTP">PTP </option>\
																		<option value="GRV">GRV </option>\
																		<option value="OTH">OTH </option>\
																	</select><span class="important">*</span></td>\
														</tr>\
														<tr>\
															<td colspan="2"> Flow Meter <input type="radio" value="Y" name="flow_meter" class="required">Yes<span class="important">*</span> <input type="radio" value="N" name="flow_meter" class="required">No<span class="important">*</span></td>\
															<td colspan="3"> Reclaimed Waste: <input type="radio" value="Y" name="rec_waste" class="required" >Yes<span class="important">*</span> <input type="radio" value="N"  name="rec_waste" class="required">No<span class="important">*</span></td>\
														</tr>\
														<tr>\
															\
															<td colspan="5"> <center><input type="submit" id="add" class="btn btn-primary" value="Add Measuring Point"></center></td>\
														</tr>\
														</tbody>');
														/*<!-- <td colspan="2"><center><input type="s
														ubmit" id="draft" class="btn btn-primary" value="Save Measuring Point as Draft"><input type="hidden"  id="saveasdraft"></center></th>*/
								                getJSONData.initData();     
								                getJSONData.getAquifer();     
								                getJSONData.getDriller();     
				}
		} /** end mapping **/
		
			 
	  
	  
	

	  $(document).ready(function(){
	
		usgsWellsMapping.wellMapInit();
	
			$('#the-modal').on('shown.bs.modal', function() {
				map.invalidateSize();
			});
			$("#this-tomap").click(function(){
				var lat= $("#the-lat").val();
				var lng= $("#the-lng").val();
				
				if (lat != "" && lng != ""){
					var latlng= [lat,lng];
					usgsWellsMapping.getDataFromLayer(null,latlng);
					
				}
				if (lat == "" || lng == ""){
					alert("Lat or Long should not be blank");
					map.closePopup();
				}
			});
			$("#this-tomapAdv").click(function(){
				var range= $("#adv-range").val();
				var rangeDirection= $("#adv-range-direction").val();
				var section= $("#adv-section").val();
				var township= $("#adv-township").val();
				var townshipDirection= $("#adv-township-direction").val();
			
				range = range+" "+rangeDirection;
				township = township+" "+townshipDirection;
				
					usgsWellsMapping.advSearch(range,section,township);

			});
			
			$(".adv-imprnt").on("blur",function(){
				var twnshp = $("#adv-township").val();
				var rng = $("#adv-range").val();
				
				if (twnshp !="" && rng !=""){
					$("#adv-section").removeAttr("disabled");
				}else{
					$("#adv-section").attr("disabled",true);
				}
				
				
			});
			$(".adv-imprnt").on("keypress keyup",function (event) {    
			   $(this).val($(this).val().replace(/[^\d].+/, ""));
				if ((event.which < 48 || event.which > 57)) {
					event.preventDefault();
				}
			});
			var $k=1;
			
			$('#adv-search-link').click(function(){
				if ($k % 2 == 0){
					$(".modal-content").animate({height:820},200)
				}else{
					$(".modal-content").animate({height:900},200)
				}
				$k++;
			});

	  });
		
			
			</script>
		  </div>
		  <input type='hidden' id='quad_nm'>
		<input type='hidden' id='onefourth'>
		<input type='hidden' id='section'>
		<input type='hidden' id='range'>
		<input type='hidden' id='township'>
		<input type='hidden' id='lat'>
		<input type='hidden' id='lng'>
		<input type='hidden' id='direction'>
		<input type='hidden' id='elevation'>
		<input type='hidden' id='county2'>
		<input type='hidden' id='huc'>
		<input type='hidden' id='mraz'>
		  
	</div>
	<body>

</html>