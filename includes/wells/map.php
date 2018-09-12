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
.overlap{
	z-index:9999999 !important;
	position:absolute;
	width:500px;
	background-color:white;
	top:90%;
	padding:10px;

}


.overlap .legend {
	display:inline-flex;
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
		//height: 600px;

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
					
					usgsWellsMapping.QueryData(null,item,'c');
				});
				
			}
		});
}


function queryStringUrlReplacement(url, param, value) {
	
    var re = new RegExp("[\\?&]" + param + "=([^&#]*)"), match = re.exec(url), delimiter, newString;

    if (match === null) {
        // append new param
        var hasQuestionMark = /\?/.test(url); 
        delimiter = hasQuestionMark ? "&" : "?";
        newString = url + delimiter + param + "=" + value;
    } else {
        delimiter = match[0].charAt(0);
        newString = url.replace(re, delimiter + param + "=" + value);
    }

    return newString;
}
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
					//this.getDataFromLayer();
					
						
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
						  opacity : 0.50,
						  minZoom : 12,
						  maxZoom :18
						}).addTo(map);
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
					DDLat = DDLat.toFixed(6); 
					
					DDLng = parseFloat((DegreeLng+DDLngMS)*-1);
					DDLng = DDLng.toFixed(6); 
					return [DDLat,DDLng];
				},
				QueryData : function(e, arr,c){
					var ctr = 0;
					var latlng = [];
				
					if (arr.latitude_dd == '0' && arr.longitude_dd == '0'){
						ConvertedLatLng = usgsWellsMapping.convertToDD(parseInt(arr.latitude).toString(),parseInt(arr.longitude).toString());
						latlng = [ConvertedLatLng[0],ConvertedLatLng[1]];
					}else{
						latlng = [arr.latitude_dd,arr.longitude_dd];
					}
					
					
							boundary = L.esri.query({
								url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8'
							});
							// L.esri.request(url, {}, function(error, response){
							  // if(error){
								// console.log(error);
							  // } else {
								// console.log(response.name);
							  // }
							// });
							boundary.nearby(latlng,1);
							
								
								boundary.run(function(error,featureCollection,response){
									
									isBound = featureCollection.features.length;
									
										if (isBound ==1){
											var url = arr.mpid+','+arr.year+','+arr.diverter_id+','+arr.owner_id;
											var rawUrl = 'thempid='+arr.mpid+'&'+'type='+arr.type+'&';
											
											var rData =
											arr.data == 'Yes' ? rData = arr.data+' (<a id="edit-anndata" onClick="return usgsWellsMapping.edit('+url+');"> Edit Annual Data </a>)' 
											: rData = arr.data + ' (<a id="add-anndata" onClick="return usgsWellsMapping.add(null);"> Add Annual Data </a>)';
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
				}
} //@end mapping				
var universal_id;
var universal_nm;

$(document).ready(function(){
	$(".overlap").empty();
	usgsWellsMapping.wellMapInit();
	
	var q= $("#id").val();
	var y= $("#year").val();
	var t= $("#type").val();
	var tn= $("#typenm").val();
	var nm= $("#nm").val();
	var z= $("#typeid").val();
	
	if (z){
		
		// if (z!=''){
			// $(".overlap").html( "Your view is filtered by : "+tn+ " (" +z+ ")");
		// }else{
			// $(".overlap").html( "Your view is filtered by : "+tn+ " (" +z+ ")");
		// }		
		$(".overlap").html( "Your view is filtered by : "+tn+ " (" +z+ ")");
		if (t =='Diverter'){
			t = 'Owner2';
			z= $("#id").val();
			q= $("#typeid").val();
		}else{
			t = 'Diverter2';
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
	getListofMPID(q,y,t,z);
	
	
//validate form 



});//end event


</script>

 
</head>

<body>

<?php 
		if (!empty($_GET)){

			$t = $_GET['type'];
			
		}else{
			
			echo '<script> 
							alert("There is an error.\n Error 1P: Undefined P-var.\nPlease hit okay to continue " )
							window.location.href = "https://wise.er.usgs.gov/wateruse/wells/";	
					</script>';

			//window.location.href = "https://wise.er.usgs.gov/wateruse/wells/";
		}
		# include '../includes/html/header_new.php'; 
		echo "<input type='hidden' id='type' value='".$t."'>";
		echo "<input type='hidden' id='id' value='".$_GET['id']."'>";
		echo "<input type='hidden' id='nm' value='".$_GET['nm']."'>";
		if (!$_SESSION['COUNTY_CD']){
			echo "<input type='hidden' id='county' value='".$_SESSION['USER_COUNTY']."'>";
		}else{
			echo "<input type='hidden' id='county' value='".$_SESSION['COUNTY_CD']."'>";
		}

?>	
		<div > 
			<div class="overlap">  </div>
			<div class="overlap2"> <button> XD</button></div>
		</div>
		<div id="map"></div>
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
		<?php echo "<input type='hidden' id='year' name= 'year' value='".$_GET['year']."'>" ?>
		<?php echo "<input type='hidden' id='usecd' name= 'use_cd' value='".$_GET['usecd']."'>"?>
		<?php echo "<input type='hidden' id='method' name= 'method' value='".$_GET['method']."'>"?>
		<?php echo "<input type='hidden' id='typeid' name= 'typeid' value='".$_GET['typeid']."'>"?>
		<?php echo "<input type='hidden' id='typenm' name= 'typenm' value='".$_GET['typenm']."'>"?>
		<?php echo "<input type='hidden' id='nm' name= 'nm' value='".$_GET['nm']."'>"?>
		<?php echo "<input type='hidden' id='id' name= 'id' value='".$_GET['id']."'>"?>
			
	</body>

</html>