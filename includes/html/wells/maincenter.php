<?php 
	
	if(!defined('BASE_PATH')) {
		echo '<script> window.location.href ="https://wise.er.usgs.gov/'+$dir+'/forbidden"; </script>';
 
	}; 
/*** content goes there at the bottom **/	
?>

<?php 
	
	
	$bootstrap =  new bootstrap_ui();
	print $bootstrap->allow_bootstrap();
	
	include '../includes/header_config.php';
	
	
?>


<?php  if ($isDev == true) { ?><div style="height:20px;background-color: red; color: white; text-align:center;width:100%;"> HALT! THIS IS A TEST DEVELOPMENT PAGE. YOU MAY AND WILL EXPERIENCE BUGS</div> <?php  } ?>
<a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>



<style>
a{
	cursor:pointer;
}
.disable {
  
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
}
#nprogress{
	z-inder:99999 !important;
}
.btn-group{
	z-index:99999 !Important;
}
#the-modal{
	overflow-y: scroll;

}
.modal {
	   overflow: visible;
}
@media only screen and  (min-width: 1640px )  and (max-width:2000px){
	#quick-edit-mpid .modal-content{
		width:135px;
		right: 50%;
	}
}

@media only screen and  (min-width: 1129px)  and (max-width:1640px){
	#the-modal .modal-dialog{
	    width: 500px;
		right: 10%;
	}
	#quick-edit-mpid .modal-content{
		width:1000px;
		right: 20%;
	}
}
@media only screen and  (min-width: 1064px)  and (max-width:1128px){
	#the-modal .modal-dialog{
	    width: 500px;
		right: 10%;
	}
	#quick-edit-mpid .modal-content{
		width: 1000px;
		right: 32%;
	}
}
@media only screen and  (min-width: 768px)  and (max-width:1064px){
	#the-modal .modal-dialog{
	    width: 300px;
		right: 27%;
	}
	#quick-edit-mpid .modal-content{
		width:700px;
		right: 15%;
		
	}
}
body {
	padding:0;
	margin:0;
	overflow-x:hidden;
    font-size:15px !Important;
    line-height: 1.25em;
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    background: #f9f9f9;
    color: #555;
	height:40%;
	width:100%;
}
.container {
	z-index:-1;
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
.ui-datepicker{
	z-index:999999 !important;
}
.table .nested-table{
	font-size:15px;
}
.table-row-title{
	width:500px;
}
.table-row-content{
	width:300px;
	padding-left:20px;
}

#table-header-txt{
	font-size:14px !important;
	padding:4px;
	text-align:center;
}


#table-header-list{
	font-size:14px !important;
	padding:4px;
	text-align:center;
}
.font-bold{
font-weight:bold;
}
#result-table-th{

	background: -moz-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* ff3.6+ */
	background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #0D87D4), color-stop(1%, #0F88D4), color-stop(100%, #ffffff)); /* safari4+,chrome */
	background: -webkit-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* safari5.1+,chrome10+ */
	background: -o-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* opera 11.10+ */
	background: -ms-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* ie10+ */
	background: linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* w3c */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#0D87D4',GradientType=1 ); /* ie6-9 */
}

.table-contents{
	display:inline-flex;
	
	
}
.pull-left{
	margin-left:5px;
}
.table-row-title
{
	padding-left:100px;
	padding-right:300px;
}
	
.table-header-txt2{
	font-size:12px;
	
}
#add-data{
	margin-top:50px;
}
.table-address-headers{
	text-align:center;
	font-size:16px;
	font-weight:650;
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
	width: 100%;
	line-height:30px;
	
}
.tt-suggestion {
	font-size: 15px;  /* Set suggestion dropdown font size */
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
 #scrollable-dropdown-menu .tt-menu {
   max-height: 500px;
   overflow-y: auto;
  
 }
 
.nested-table{
	background-color:transparent !important;
	padding:0;
	margin:0;
}
.table-contents-list{
	display:inline-flex;
	width:824px;
}

.table-contents-list-radio-header1{
	margin-left:50px;
	width:50px;
}
.table-contents-list-header{
	border-left:1px solid #f6f6f6;
	margin-left:150px;
	width:200px;
	
}
.center{
	display:block;
	margin: 0 auto;
}
#the-anndatacenter,#the-anndata{
	font-size:14px;
	
}
#the-anndata{
	margin-top:25px;
	border:1px solid #f6f6f6;
}
.modal-content{
	position:relative;
	right:37%;
	width:1200px;
}

.bdt thead th {
    cursor: pointer;
}

.bdt .sort-icon {
    width: 10px;
    display: inline-block;
    padding-left: 5px;
}

.search-form {
    margin-right: 25px;
}

#table-footer {
    margin-bottom: 15px;
}

#table-footer a, #table-footer button {
    outline: none;
}

#table-footer .form-horizontal .control-label {
    text-align: left;
    margin: 0 15px;
}

#table-footer .pagination {
    margin: 0 15px;
}

#table-footer .pagination li:not(.active) {
    cursor: pointer;
}

.disable-sorting {
    cursor: auto !important;
}

#the-results{
	margin-top:10px;
}

#the-modal2 .modal-content{
	width:1500px;
	margin-left:-70%;
	margin-top:-1%;
	overflow-x:hidden;
}

#the-modalMap .modal-content{
	position:relative;
	right:25%;
	width:1000px;
	height:825px;
}
#the-modalMap{
		z-index:99999 !important;
}
#the-modalMap .modal-body{
	width:auto !important;
	height:auto !important;
	z-index:99999 !important;
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

.error{
	border: 1px solid red !important;
}
.marker-cluster-small {
	background-color: rgba(181, 226, 140, 0.6);
	}
.marker-cluster-small div {
	background-color: rgba(110, 204, 57, 0.6);
	}

.marker-cluster-medium {
	background-color: rgba(241, 211, 87, 0.6);
	}
.marker-cluster-medium div {
	background-color: rgba(240, 194, 12, 0.6);
	}

.marker-cluster-large {
	background-color: rgba(253, 156, 115, 0.6);
	}
.marker-cluster-large div {
	background-color: rgba(241, 128, 23, 0.6);
	}

	/* IE 6-8 fallback colors */
.leaflet-oldie .marker-cluster-small {
	background-color: rgb(181, 226, 140);
	}
.leaflet-oldie .marker-cluster-small div {
	background-color: rgb(110, 204, 57);
	}

.leaflet-oldie .marker-cluster-medium {
	background-color: rgb(241, 211, 87);
	}
.leaflet-oldie .marker-cluster-medium div {
	background-color: rgb(240, 194, 12);
	}

.leaflet-oldie .marker-cluster-large {
	background-color: rgb(253, 156, 115);
	}
.leaflet-oldie .marker-cluster-large div {
	background-color: rgb(241, 128, 23);
}

.marker-cluster {
	background-clip: padding-box;
	border-radius: 20px;
	}
.marker-cluster div {
	width: 30px;
	height: 30px;
	margin-left: 5px;
	margin-top: 5px;

	text-align: center;
	border-radius: 15px;
	font: 12px "Helvetica Neue", Arial, Helvetica, sans-serif;
	}
.marker-cluster span {
	line-height: 30px;
	}
.leaflet-cluster-anim .leaflet-marker-icon, .leaflet-cluster-anim .leaflet-marker-shadow {
	-webkit-transition: -webkit-transform 0.3s ease-out, opacity 0.3s ease-in;
	-moz-transition: -moz-transform 0.3s ease-out, opacity 0.3s ease-in;
	-o-transition: -o-transform 0.3s ease-out, opacity 0.3s ease-in;
	transition: transform 0.3s ease-out, opacity 0.3s ease-in;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.0/leaflet.markercluster-src.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.0/MarkerCluster.css" />
<script>
var typingTimer;                //timer identifier
var doneTypingInterval = 1350;  //time in ms, 5 second for example




	var mainCenterErrorHandling = {
		getMessage : function (type,msg){
			switch (type){		
				case 'destroy':
				$(".msg").empty();
				break;
				
				
				case 'err':
				$(".msg").html('<div class="alert alert-danger" role="alert">\
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
								<span aria-hidden="true">&times;</span>\
							  </button>\
								' + msg + '\
							</div>');
				break;
				
				case 'warning':
					$(".msg").html('<div class="alert alert-warning" role="alert">\
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
								<span aria-hidden="true">&times;</span>\
							  </button>\
								' + msg + '\
							</div>');
				break;
				
				case 'warning-2':
					var $k = '<div class="alert alert-warning" role="alert" style="width:700px;">\
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
								<span aria-hidden="true">&times;</span>\
							  </button>\
								' + msg + '\
							</div>';
					return $k;
				break;
			}
		},
		
		checkCrucialData : function (data,type){
			var $z ="";
			
			$.each(data,function(i,item){
				
				if (type == 'gen'){
					
					if (item.local_desc == null){
						$z = ' <span class="first-warning" style="color:red;padding-left:5px;"> <strong>LOCAL DESCRIPTION must not be null.</strong></span> <br>';
						// console.log('empty');
					}
					if (item.action == null){
						$z += ' <span class="first-warning" style="color:red;padding-left:5px;"> <strong> ACTION must not be null.</strong></span> <br>';
						// console.log('empty2');
					}
					
				}
					
			});
			
			// console.log($z);
			if ($z != ""){
				// $("#the-anndatacenter .show-stats").empty();
				$('.show-stats').empty();
				$('.show-stats')
									.html('<td>'
											+mainCenterErrorHandling
												.getMessage("warning-2", "Warning! SOME INFORMATION NEEDS ATTENTION <br>"+$z+"<br>This Information needs immediate action(s)!")+'</td>\
											');
			}else{
				$('.show-stats').empty();
			}
			
			
		}
	};




function getInfo(t,q,x){
	var m;
	absURL = "?page=1&x="+x+"&type="+t+"&q="+q;
	//$("#filter").attr("disabled",true);
	
	
	$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/type"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				$("#type-nm-2").val('');
				$("#type-id-2").val('');
				var list =  new Array();
				$.each(data, function(i,item){
					if ($.isNumeric(q) == false){
						list.push(data[i].nm+ ' ('+data[i].id+')');	
					}else{
						if (t == 'MPID'){
							list.push(data[i].id+ '');	
						}else{
							list.push(data[i].id+ ' ('+data[i].nm+')');	
						}
						
					}
	
					
				});
				var isEmpty = list.length;
				if (isEmpty<1){
					$('#result-table').empty();
					$("#filter").attr("disabled",true);
					
					 var message = 'No Result found for "'+decodeURIComponent(q)+'". Please try again.';
					 mainCenterErrorHandling.getMessage("err",message);
						
				}else{
					$("#filter").removeAttr("disabled");
					mainCenterErrorHandling.getMessage("destroy");
				}
				//console.log(isEmpty);
				 $('#scrollable-dropdown-menu .typeahead').typeahead('destroy');
					var list = new Bloodhound({
						datumTokenizer: Bloodhound.tokenizers.whitespace,
						queryTokenizer: Bloodhound.tokenizers.whitespace,
						local: list
				});
				
				$('#scrollable-dropdown-menu .typeahead').typeahead(null, {
				  name: 'list',
				  limit: 25,
				  source: list,
					 templates: {
						    empty: '<div class="empty-message tt-suggestion" style="padding-left:5px; overflow: hidden; text-overflow: ellipsis;"> No result for '+t+': "'+q+'" </div>'
					
					  }
				  
				});
			
				NProgress.done(true);
					
			},
			error:function(err, ajaxOptions, throwError){
				// alert("Internal Server Error (1MC) ! Please contact the administrator");
				
				 var message = 'Critical Error! Fail to getInfo().'+throwError;
				 mainCenterErrorHandling.getMessage("err",message);
					
			}
			
	});
	
	
	
}
/*
function lookup_owner(key_count) {
						
					
				var searchQuery = $("#list-owner");
				var t = $("#type").val();
				var x = $("#x").val();

				if(key_count == key_count_global) {
						
				
					var query = encodeURIComponent(searchQuery.val());
					
				if (query != ""){
							if ($("#filter-owner").is(':checked')){
								getJSONData.getOwner(1,query);
							}else{
								getJSONData.getOwner(0,query);
							}	
					
					
					}
						
					
				}
	}
function lookup_diverter(key_count,t) {
						
					
				var searchQuery = $("#list-diverter");
				var t = $("#type").val();
				var x = $("#x").val();
				// console.log(key_count)
				if(key_count == key_count_global) {
						
			
					var query = encodeURIComponent(searchQuery.val());
					
				if (query != ""){
					
							if ($("#filter-diverter").is(':checked')){
								getJSONData.getDiverter(1,query);
							}else{
								getJSONData.getDiverter(0,query);
							}	
					}
						
					
				}
}*/


function appendInfo(t,q){
	$("#result-table").empty();
	absURL = "?type="+t+"&q="+q+"&directquery=1";
	var $diverter_nm;
	var $owner_nm;
	var l =0;

	$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/type"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
						NProgress.done();
			if (!$.trim(data)){
			
				 var message = 'No Result found for "'+decodeURIComponent(q)+'". Please try again.';
				 mainCenterErrorHandling.getMessage("err",message);
					
			}else{
					// mainCenterErrorHandling.checkCrucialDatacheckCrucialData(data,'type-odf'); /*type-odf  = search ODF*/ disabled for now
					
					$("#result-table").show();
					 $("#error-msg").parent().hide();
					$("#error-msg").show();
					$.each(data, function(i,item){
						// console.log(item);
						$("#usecd").val(item.use_cd);
						$("#just-ignore-me").val(t);
						$("#just-ignore-me-too").val(item.id);
						$("#type").val(t);
						$("#id").val(item.id);
						$("#nm").val(item.nm);
						var $editBtn ="";
						if (t != "MPID"){
							$editBtn ='<a href="#" id="editInfo">(Edit)</a>';
						}
						
						
						$("#result-table").append('<thead>\
																						<tr>\
																						<th id="result-table-th"> <div id="table-header-txt" >'+t+' Information &nbsp; &nbsp; &nbsp; '+$editBtn +'</div></th>\
																						</tr>\
																					</thead>');			
																					
					
						if (t=="MPID"){
						
								$("#result-table").append('<tr>\
																					<td> \
																					<div class="table-contents">\
																						<div class="table-row-title" id="type"> '+t+':</div>\
																						<div class="table-row-content" id ="id"> '+item.id+' </div> \
																					</div> \
																					</td>\
																				</tr>');
										
							$("#result-table").append('<tr>\
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title" id="type">  Owner Name/ID:</div>\
																	<div class="table-row-content editable-dropdown-fowner" id ="id"> '+item.oname+' ('+item.oid+')</div> \
																</div> \
																</td>\
																</tr>\
																<tr>\
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title" id="type">  Diverter Name/ID:</div>\
																	<div class="table-row-content editable-dropdown-fdiverter" id ="id"> '+item.dname+' ('+item.did+') </div> \
																</div> \
																</td>\
															</tr>');
															
															
								$("#result-table").append('<tfoot>\
																						<tr>\
																						<th id="result-table-th">&nbsp;</th>\
																						</tr>\
																					</tfoot>');			
																					
																	
						}else{
					
											if (t == "Facility"){
												$("#result-table").append('<tr>\
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title" id="type">  Owner Name/ID:</div>\
																	<div class="table-row-content editable-dropdown-fowner" id ="id"> '+item.fowner_nm+' ('+item.fowner_id+')</div> \
																</div> \
																</td>\
																</tr>\
																<tr>\
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title" id="type">  Diverter Name/ID:</div>\
																	<div class="table-row-content editable-dropdown-fdiverter" id ="id"> '+item.fdiverter_nm+' ('+item.fdiverter_id+') </div> \
																</div> \
																</td>\
														</tr>');
											}
											$("#result-table").append('<tr>\
																					<td> \
																					<div class="table-contents">\
																						<div class="table-row-title" id="type"> '+t+' ID:</div>\
																						<div class="table-row-content" id ="id"> '+item.id+' </div> \
																					</div> \
																					</td>\
																				</tr>');
										
										
											$("#result-table").append('<tr>\
																					<td> \
																					<div class="table-contents">\
																						<div class="table-row-title" id="type"> '+t+' Name:</div>\
																						<div class="table-row-content editable" id ="name" name="nm" onkeypress="return (this.innerText.length <= 40)"> '+item.nm+' </div> \
																					</div> \
																					</td>\
																				</tr>');
											$("#result-table").append('<tr> \
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title">Phone Number:</div> \
																	<div class="table-row-content editable"  id="phone" name="phone">'+item.phone+'</div> \
																	</div> \
																</td>\
																</tr>');	
										if (t == "Facility"){
											$("#result-table").append('<tr> \
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title">Use Type: </div> \
																	<div class="table-row-content editable-dropdown-use-cd"  id="use_cd" name="use_cd">'+item.use_cd+'</div> \
																	</div> \
																</td>\
																</tr>');
											$("#result-table").append('<tr> \
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title">PWS or Permit #:</div> \
																	<div class="table-row-content editable"  id="permit" name="permit">'+item.permit+'</div> \
																	</div> \
																</td>\
																</tr>');					
										}
										$("#resullt-table").append('<tr>\
																										<td> \
																										<div class="table-contents">\
																											<div class="table-row-title"  id="county-title">county of  '+t+':</div>\
																											<div class="table-row-content editable" id="county" name="county">'+item.county+'</div> \
																										</div> \
																										</td>\
																	</tr>');
							
										$("#result-table").append('<tr><td><div class="table-header-txt2">\
																		<div class="table-address-headers"><strong>Address</strong></div>\
																		<table class="table nested-table">\
																		<th class="table-address-headers">Mailing</th>\
																		<th class="table-address-headers">Residential</th>\
																				<tr>\
																					<td>\
																				<div class="table-contents">\
																						Address: <div id="table-address-mailing" class=" table-row-content editable" name="mtreet" onkeypress="return (this.innerText.length <= 50)">'+item.mstreet+' </div>\
																					</div>\
																					<td>\
																						<div class="table-contents">\
																						Address: <div  id="table-address-residential" class="table-row-content editable" name="location" onkeypress="return (this.innerText.length <= 50)">'+item.location+'</div>\
																					  </div>\
																					  </td>\
																			</tr>\
																			<tr>\
																			 <td>\
																				<div class="table-contents">\
																					<div> City: </div><div id="table-mcity-mailing" class=" table-row-content editable" name="mcity" onkeypress="return (this.innerText.length <= 50)">'+item.mcity+'</div>\
																				</div>\
																			</td>\
																			<td>\
																				<div class="table-contents">\
																					<div> City: </div><div id="table-rcity-residential" class="table-row-content editable" name="rcity" onkeypress="return (this.innerText.length <= 50)">'+item.city+'</div>\
																				</div>\
																			</td>\
																			</tr>\
																			<tr>\
																				<td>\
																					<div class="table-contents">\
																						<div> State: </div> <div id="table-mstate-mailing" class="table-row-content editable-dropdown-mstate" name="mstate" onkeypress="return (this.innerText.length <= 2)">'+ item.mstate_nm +'</div>\
																					</div>\
																				</td>\
																				<td>\
																					<div class="table-contents">\
																						<div> State: </div> <div id="table-rstate-residential" class="table-row-content editable-dropdown-rstate" name="rstate" onkeypress="return (this.innerText.length <= 2)">'+ item.state_nm +'</div>\
																					</div>\
																				</td>\
																			</tr>\
																			<tr>\
																				<td>\
																					<div class="table-contents">\
																						<div> ZIP code: </div><div id="table-zip-mailing" name="zip" class="table-row-content editable numbersonly" onkeypress="return (this.innerText.length <= 8)">'+ item.zip+'</div>\
																					</div>\
																				  </td>\
																				  <td>\
																					<div class="table-contents">\
																						<div> ZIP code: </div><div id="table-rzip-residential" name="zip" class="table-row-content editable numbersonly" onkeypress="return (this.innerText.length <= 8)">'+ item.rzip+'</div>\
																					</div>\
																				  </td>\
																			</tr>\
																			<tr>\
																				<td>\
																				<div class="table-contents">\
																				  <div> County:  </div> <div id="table-county-mailing" class="table-row-content editable-dropdown-mcounty"  id="mcountymcountynm" name="mcountynm">' + item.county_nm+'</div></td>\
																				  </div>\
																				<td>\
																				<div class="table-contents">\
																					 &nbsp;&nbsp;\
																				  </div></td>\
																			</tr>\
																			<tr id="hide-me-not">\
																				<td>\
																				<div class="table-contents">\
																				  Comment: <div id="table-comment" class="editable table-row-content"  id="comment" name="comment"  onkeypress="return (this.innerText.length <= 200)">' + item.comment+'</div></td>\
																				  </div>\
																				<td>\
																				<div class="table-contents">\
																					 &nbsp;&nbsp;\
																				  </div></td>\
																			</tr>\
																			</div>\
																			</tr>\
																</table>\
																</div></td></tr>');															
																										
						}
						if (item.fowner_id != null || item.fdiverter_id !=null){
							$("#facility-diverter").val(item.fdiverter_id);
							$("#facility-diverternm").val(item.fdiverter_nm);
							$("#facility-owner").val(item.fowner_id);
							$("#facility-ownernm").val(item.fowner_nm);
						}
						
										
						var k = 0 ;
						$(".editable").css({
							"max-width" : "200px",
					
							
							
						});
							
						$("#phone").inputmask("(999) 999-9999");
					$('#editInfo').click(function(evt){
							evt.preventDefault();
							k = k + 1;
								
								getJSONData.getCounty(item.county_cd);
								
							if (k % 2 != 0){
								$('.editable').css("border","1px solid red");
								$('.editable').attr("contenteditable","true");
								
								
								$("#phone").inputmask("(999) 999-9999");
								
								if (item.comment == null || item.comment == ""){
									$("#table-comment").click(function(){
										$(this).html("");
									});
								}
								
								$('#editInfo').html("(Save)");
								$('.editable-dropdown-mcounty').empty();
								$('.editable-dropdown-rcounty').empty();
								$('.editable-dropdown-fowner').empty();
								$('.editable-dropdown-fdiverter').empty();
								
								$('.editable-dropdown-fowner').css({
																			"position" : "relative",
																			"left" : "-50px"																			
																		});
								$('.editable-dropdown-fdiverter').css({
																			"position" : "relative",
																			"left" : "-50px"																			
																		});
								$('.editable-dropdown-fowner').append('<div style="display:inline-flex; float: left; line-height:2;">\
														<div class="input-group-btn" >\
																	<div class="btn-group" id="scrollable-dropdown-menu">\
																	<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="list-ownerfac" name="fac_owner"  placeholder=" Search Owner Name/ID" style="z-index:100"/>\
																	</div>\
																		<div class="btn-group"> \
																				<label class="btn btn-primary">\
																					<input type="checkbox" id="filter-owner" checked> Filter Owner by my County \
																				</label>\
																	</div> \
															</div> \
														</div>');
														
								$('.editable-dropdown-fdiverter').append('<div style="display:inline-flex; float: left; line-height:2;" >\
														<div class="input-group-btn" >\
																	<div class="btn-group" id="scrollable-dropdown-menu"  style="z-index: 1;">\
																	<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="list-diverterfac" name="fac_diverter" placeholder="Search Diverter Name/ID "/>\
																	</div>\
																		<div class="btn-group"  style="z-index: 1;"> \
																				<label class="btn btn-primary" >\
																					<input type="checkbox" id="filter-diverter" checked> Filter Diverter by my County \
																				</label>\
																	</div> \
															</div> \
														</div>');	
							
								
								getJSONData.facilityOD();
								
								
								$(".numbersonly").keypress(function (e) {
																	 //if the letter is not digit then display error and don't type anything
																	 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
																		//display error message
																	
																			   return false;
																	}
																});								
									$('.editable-dropdown-use-cd').empty();
								$('.editable-dropdown-use-cd').append('<select name="use_cd" id="use_cdFac"></select>');
								$('.editable-dropdown-use-cd').removeAttr('editable');
							
								$('.editable-dropdown-mcounty').append('<select class="county" name="county_cd" id="county_cd"></select>');
								$('.editable-dropdown-mstate').empty();
								$('.editable-dropdown-mstate').removeAttr('editable');
								$('.editable-dropdown-mstate').append('<select class="state" name="mstate" id="mstate"></select>');
								$('.editable-dropdown-rstate').empty();
								$('.editable-dropdown-rstate').removeAttr('editable');
								$('.editable-dropdown-rstate').append('<select class="state" name="rstate" id="rstate"></select>');
								
								
								getUseType(item.use_cd,"non-form");
								getJSONData.getState(item.state_cd,item.state);
								
									if (item.comment == null || item.comment == ""){
										item.comment = "N/A";
										$("#table-comment").css("width","300px");
									}
								
							
							}else{
								
							
							
								$('#editInfo').html("(Edit)");
								$('.editable').css("border","none");
								$('.editable').attr("contenteditable","false");
								
								var editables = $('.editable').val();
								
								
								var name = $("#name").text();
								var phone = $("#phone").text();
								var mstreet = $("#table-address-mailing").text();
								var location = $("#table-address-residential").text();
								var mcity = $("#table-mcity-mailing").text();
								var mstate = $("#mstate").val();
							
							//	var mstate_nm = $("#mstate option[value='"+item.state+"']").html();
							//	var mstate_nm = $("#mstate [data-id='"+ item.state_cd + "']").html();
								var mstate_nm = $("#mstate option[value='"+mstate+"']").html();
								var rcity = $("#table-rcity-residential").text();
								var rstate = $("#rstate").val();
								var rstate_nm = $("#rstate option[value='"+rstate+"']").html();
							//	var rstate_nm = $("#rstate option:contains(" + rstate + ")")
								var rzip = $("#table-rzip-residential").text();
								var zip = $("#table-zip-mailing").text();
								var county = $("#county_cd").val();
								var county_nm = $("#county_cd option[value='"+county+"']").html();
								var fac_owner = $("#list-owner").val();
							
								var comment = $("#table-comment").html();
								var use_cd = $("#use_cdFac").val();
								var permit = $("#permit").html();
								var fac_ownernm = $("#list-ownerfac").val();
								var fac_diverter = $("#list-diverterfac").val();
								
								$("#id-result").val(item.id);
								$("#t-result").val(t);							
								$("#nm-result").val(name);							
								$("#phone-result").val(phone);							
								$("#maddress-result").val(mstreet);							
								$("#location-result").val(location);							
								$("#mcity-result").val(mcity);							
								$("#rcity-result").val(rcity);							
								$("#zip-result").val(zip);
								$("#rzip-result").val(rzip);
								$("#permit-result").val(permit);
								$("#use_cd-result").val(use_cd);
								
							
								$("#comment-result").val(comment);
							
								if (t == "Facility"){
								
									
									$(".editable-dropdown-fowner").html(item.fowner_nm+' ('+item.fowner_id+')');
									$(".editable-dropdown-fdiverter").html(item.fdiverter_nm+' ('+item.fdiverter_id+')');
									$('.editable-dropdown-fowner').removeAttr('style');
									$('.editable-dropdown-fdiverter').removeAttr('style');
									 
									$("#fac-diverter").val(fac_diverter);
									$("#fac-ownername").val(fac_ownernm);
									$(".editable-dropdown-fowner").html(fac_ownernm);
									$(".editable-dropdown-fdiverter").html(fac_diverter);
									// console.log(item);
									$('.editable-dropdown-use-cd').html(item.use_cd);
								}
								
								
								if (county == "" || county == null ){
								
									$("#table-county-mailing").empty();
							
									$("#table-county-mailing").html(item.county_nm);
									$("#county-result").val(item.county_cd);
									$("#county-result_nm").val(item.county_nm);
								}else{
									$("#table-county-mailing").empty();
									$("#table-county-mailing").html(county_nm);
									$("#county-result_nm").val(county_nm);
									$("#county-result").val(county);
									
									
								}
							
								
								if (mstate == null || mstate == ""){
								
									$("#table-mstate-mailing").empty();
									$("#table-mstate-mailing").html(item.mstate_nm);
									$("#mstate-result").val(item.mstate);	
									
								}else{
									
									
									
									// mstate is not null or default '--'
									$("#table-mstate-mailing").empty();
									//append new mstate nm
									$("#table-mstate-mailing").html(mstate_nm);
									//set value on hidden mstate-result
									$("#mstate-result").val(mstate);
									$("#mstate-result_nm").val(mstate_nm);
								}
								
								
								if (rstate == null || rstate == ""){
								
									$("#table-rstate-residential").empty();
									$("#table-rstate-residential").html(item.state_nm);
									$("#rstate-result").val(item.state_cd);	
									$("#rstate-result_nm").val(item.state_nm);
									
								}else{
									
									// mstate is not null or default '--'
									$("#table-rstate-residential").empty();
									//append new mstate nm
									$("#table-rstate-residential").html(rstate_nm);
									//set value on hidden mstate-result
									$("#rstate-result").val(rstate);
									$("#rstate-result_nm").val(rstate_nm);
								}
							
								if (fac_ownernm =="" ){
									$(".editable-dropdown-fowner").html(item.fowner_nm+' ('+item.fowner_id+')');
									$("#fac-owner").val(item.fowner_id);
									$("#fac-ownername").val(item.fowner_nm);
									
								}else{
									
									$(".editable-dropdown-fowner").html(fac_owner);
									 $("#fac-owner").val(fac_owner);
									 $("#fac-ownername").val(fac_ownernm);
								}
								if (fac_diverter =="" ){
									$(".editable-dropdown-fdiverter").html(item.fdiverter_nm+' ('+item.fdiverter_id+')');
									$("#fac-diverter").val(item.fdiverter_id);
								}else{
									$(".editable-dropdown-fdiverter").html(fac_diverter);
									 $("#fac-diverter").val(fac_diverter);
								}
																			
								//$(".editable-dropdown-fdiverter").html(item.fdiverter_nm+' ('+item.fdiverter_id+')');
							//	$(".editable-dropdown-fdiverter").html(fac_diverter);
								
							
									var data = $("#info-form").serialize();
								
							
								$.ajax({
										TYPE: "POST",
										url: "../controller/wells/updateinfo",
										data: data,
										success:function(data){
											// console.log(data);
											alert('Information has been successfully updated for '+t+' with ID : '+item.id);
											//$('.typeahead').typeahead('val', '');
										}
								});
							
								
				
							
							}

							
							
						});
					
						
						if (t == "Diverter"){
							type = "Owner";
						}else if (t=="Owner"){
							type = "Diverter";
						}

						/** <[- IF I.E 11 -]>  **/
						if (!String.prototype.endsWith) {
						  String.prototype.endsWith = function(searchString, position) {
							  var subjectString = this.toString();
							  if (typeof position !== 'number' || !isFinite(position) || Math.floor(position) !== position || position > subjectString.length) {
								position = subjectString.length;
							  }
							  position -= searchString.length;
							  var lastIndex = subjectString.lastIndexOf(searchString, position);
							  return lastIndex !== -1 && lastIndex === position;
						  };
						}


						var namex = item.nm;
						var n = namex.endsWith("S");
						
						
						if (n == true){
							namex = item.nm+ "'";
						}else{
							namex = item.nm+ "'s";
						}
						if (t =='Diverter' || t== 'Owner'){
							$("#result-table").append('<tr>\
																	<th id="result-table-th"> <div id="table-header-list" >'+namex+' '+type+' List</div></th>\
																</tr>');
					
							$("#contents-header-id").html(t + " ID");
							$("#contents-header-name").html(t + " name");
							
							
						}else{
							$("#result-table").append('<tr>\
																	<th id="result-table-th"><div></div></th>\
																</tr>');
						}
						var currYear = new Date().getFullYear();
						getList(t,q,item.use_cd,item.id,currYear);
							
						var o = $("input[name='typeid'").val();
						url = '?'+$("#the-form").serialize();
						var y = $("#the-year").val();
						getMPID(t,item.id,url,y,'nf',o,'no');
						
				
					});
			}
			
				
			},
			error:function(err, ajaxOptions, throwError){
				console.log(err);
			}
			
	});
	
}


var use_cd;
function getList (t,q,u,f,y){

			$("#list").empty();
			
	var type;
			if (t == 'Owner' || t == 'Diverter' ){
					$.ajax ({
						
						TYPE: "GET",
						url: "../controller/wells/lists"+absURL,
						ContentType:"application/json",
						dataType:"json",
						async: "false",
						success:function(data){
								NProgress.done();
							var stringheader ='<tr><td><div class="table-contents-list">\
														<div class="table-contents-list-radio-header1">SELECT ALL<input type="radio" id="unselect-list" class="select-list" name="typeid" value="all"/></div>\
														<div class="table-contents-list-header">ID</div>\
														<div class="table-contents-list-header"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name</div>\
														<div class="table-contents-list-header">Use Code</div></td></tr>';
													
													
							$("#result-table").append(stringheader);
						
											
							 var id;
							$.each(data,function(i,item){
							
								use_cd = item.usecd;
								if (item.usecd == null){
									item.usecd = 'N/A';
								}
								
								var string2  = '<tr><td><div class="table-contents-list"  id="list"> \
														<div class="table-contents-list-radio-header1"><input type="radio" class="select-list" name="typeid" value="'+$.trim(item.nm)+'" data-id="'+item.id+'"/> </div>\
														<div class="table-contents-list-header">'+item.id+'</div>\
														<div class="table-contents-list-header">'+item.nm+'</div>\
														<div class="table-contents-list-header">'+item.usecd+'</div></td></tr>';
														
									$("#result-table").append(string2);
								id = item.id;
								/*<div class="table-contents-list-radio-header1"><input type="radio" class="select-list" name="selected"> </div>
								<div class="table-contents-list-header" id="list-id"></div>
								<div class="table-contents-list-header"  id="list-name"></div>
								<div class="table-contents-list-header"  id="list-usecd"></div>*/
							
								
								
							});
							
								$("input[name='typeid']").change(function(){
										var id=$(this).attr('data-id');
										
										$("#type-id-2").val(id);
										$("#type-nm-2").val(this.value);
										
										
											if (t == 'Diverter'){
												type= 'Owner2';
												typeWords = 'Diverter';
											}else if (t == 'Owner'){
												type = 'Diverter2';
												typeWords = 'Owner';
											}
										var y = $("#the-year").val();
										var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
										var a = $("#isAbandoned").is(":checked") ? a ='ab' : a = 'no';
											
								
										if (this.value != 'all'){
											$(".filter-notice").empty();
											var split_me = q.split('(');
											var id_splitted  = $.trim(split_me[1].replace(')',' '));
											
											if ($.isNumeric(id_splitted) == false){
												
												id_splitted = $.trim(split_me[0].replace(')',' '));
											}
											 id_splitted = decodeURI(id_splitted);
											 //a -> default to 'no' or literally no-abandoned
											getMPID (type,id,null,y,f,null,"no",'yes',id_splitted)
											
											// $("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+this.value+"("+id+") </strong></td></tr>");
											// $('.filter-notice').append("<td style='color:red;'> <strong> This Result is filter by the Owner : "+this.value+"("+id+") </strong></td>");
										}else{
											
											var split_me = q.split('(');
											var id_splitted =$.trim(split_me[1].replace(')',' '));
											//pogi
										
											if ($.isNumeric(id_splitted) == false){
												
												id_splitted = $.trim(split_me[0].replace(')',' '));
											}
											id_splitted = decodeURI(id_splitted);
											//call the original functions with all the original parameters
											$("#the-anndatacenter .filter-notice").empty();
											//getMPID(t,id_splitted,url,null,'nf',null,'ab');
											getMPID (t,id_splitted,url, null,f,null,a,id_splitted)
										}
								});
						
								
							
						
								
							
								$("#result-table").append('<tr><td><button type="button" class="btn btn-primary center" id="toggle-data" >Annual Data/Measuring Point(s)</button></td></tr>');
								$("#toggle-data").click(function(){
									var  editable = $("#name").attr("contenteditable");
									//console.log(editable);
									if (editable == 'true'){
										alert("Warning: You should save the data first before proceeding");
										return false;
									}else{
										
										$("#toggle-data").attr({
											"data-toggle": "modal",
											"data-target": "#the-modal"
											
										});
									}
								});
							
								
							
							
							
						},
						error:function(err, ajaxOptions, throwError){
							console.log(err);
						}
						
				});
			}else{
					if (t == 'Facility'){
						$("#result-table").append('<tr><td><button type="button" class="btn btn-primary center" id="toggle-facilitydata"  data-toggle="modal" data-target="#the-modalfacilitycenter">Facility Center</td></tr>');
						getFacilityCenter(t,q,u,f,y)
					}
				$("#result-table").append('<tr><td><button type="button" class="btn btn-primary center" id="toggle-data" >Annual Data/Measuring Point(s)</button></td></tr>');
				$("#toggle-data").click(function(){
									var  editable = $("#name").attr("contenteditable");
									//console.log(editable);
									if (editable == 'true'){
										alert("Warning: You should save the data first before proceeding");
										return false;
									}else{
										
										$("#toggle-data").attr({
											"data-toggle": "modal",
											"data-target": "#the-modal"
											
										});
										
									
										
										
									}
								});				
			}
				
	
}

function getFacilityCenter(t,q,u,f,y){
	
	$('#facility-center-tbl-1').empty();
	$('#facility-center-tbl-2').empty();
	$('#facility-center-tbl-1').css("width","100%");
	$('#facility-center-tbl-2').css("width","100%");
	var uHtml;
	var amt;
	
	var uHtmlWS;
	var amtWS;

	
	$('#facility-center-tbl-1').append('<tr>\
											<td>Use Type: </td>\
											<td> '+getUseType(u,"form")+' \
											<input type="hidden" name="use_cd" id="use_cd" value="'+u+'">\
											<input type="hidden" name="old_sic_cd1" id="old_sic_cd1">\
											<input type="hidden" name="old_sic_cd2" id="old_sic_cd2">\
											<input type="hidden" name="old_ent_loss_amt" id="old_ent_loss_amt">\
											<input type="hidden" name="old_ent_units" id="old_ent_units">\
											</td>\
										</tr>\
										<tr>\
											<td>Select Year  : </td>\
											<td> <select name="wyear" id="the-facilityear"></select> </td>\
										</tr>\
										<tr>\
										<td>Units: </td> \
											<td><select name= "ent_units" id="ent_units">\
													<option value="ACFT">Acre-Feet</option>\
													<option value="MG">Million Gallons</option>\
													<option value="MGD">Million Gallons per Day-Feet</option>\
													<option value="GAL">Gallons</option>\
												</select></td>\
										</tr>\
										<tr>\
											<td>Facility: </td> \
											<td> '+decodeURIComponent(q)+' <input type ="hidden" name="facility_id" value="'+f+'"></td>\
										</tr>\
										');
										
	
	/********************** TEMPLATE ********************************/
		uHtml = '<tr>\
						<td>Primary Sic Code: </td> \
						<td><select class="facility_form" id="crop1"></select></td>\
					</tr>\
					<tr>\
						<td>Secondary Sic Code: </td>\
						<td><select class="facility_form"  id="crop2"></select></td>\
				</tr>';
		amt =  '<tr>\
					<td>Internal Use amount or loss </td>\
					<td><input type="number" step ="any" id="ent_loss_amt" class="facility_form"  /></td>\
				</tr>';
	

		//getCrops('CO');
		
		uHtmlWS = '<tr>\
						<td colspan="1"> Sic Code: </td>\
						<td colspan="2"> Water Supply (4941) <input name="sic_cd" type="hidden" value="4941"/></td>\
					<tr>\
					<tr>\
						<td colspan="1"> Amounts Obtained from: </td>\
						<td colspan="2">\
							<select class="facility_form" id="fac_record_meth" name="record_meth">\
								 <option value="B">Billing Records</option>\
								 <option value="M">Meter Readings</option>\
								 <option value="P">Pump Capacity * Hours</option>\
								 <option value="O">Other</option>\
							</select>\
						</td>\
					</tr>\
					<tr>\
						<td colspan="1">Total Consumptive Water Use (Water Used for Maintenance) (12): </td>\
						<td colspan="2"><input type="number" class="facility_form" id="ent_loss_amt" step="any" size="11"></td>\
					</tr>\
					<tr>\
						<td colspan="1">Domestic Population Served (15): </td>\
						<td colspan="2"><input type="number" class="facility_form" id="dom_pop_serv" size="11"></td>\
					</tr>\
					<tr style="text-align:center;border-top: 2px solid black;">\
						<td colspan="4"> <strong> Deliveries to Users (16)</strong></td>\
					</tr>\
					<tr style="text-align:center;border-top: 2px solid black;">\
						<td colspan="4"> <strong> DO <u>NOT</u> INCLUDE WATER SOLD TO OTHER FACILITIES </strong></td>\
					</tr>';
					
		amtWS = '<tr>\
					<th>Water Furnished To</th>\
					<th>Total Water Delivered </th>\
					<th>Number of Connections\</th>\
				</tr>\
				<tr>\
					<td>Domestic Household</td>\
					<td><input type="number" class="facility_form" id="dom_del_amt" size="11"></td>\
					<td><input type="number" class="facility_form" id="dom_no" size="11"></td>\
				</tr>\
				<tr>\
					<td>Commercial</td>\
					<td><input type="number" class="facility_form" id="com_del_amt" size="11"></td>\
					<td><input type="number" class="facility_form" id="com_no" size="11"></td>\
				</tr>\
				<tr>\
					<td>Industrial</td>\
					<td><input type="number" class="facility_form" id="ind_del_amt" size="11"></td>\
					<td><input type="number" class="facility_form" id="ind_no" size="11"></td>\
				</tr>\
				<tr>\
					<td>Mining</td>\
					<td><input type="number" class="facility_form" id="min_del_amt" size="11"></td>\
					<td><input type="number" class="facility_form" id="min_no" size="11"></td>\
				</tr>\
				<tr>\
					<td>Agricultural</td>\
					<td><input type="number" class="facility_form" id="agr_del_amt" size="11"></td>\
					<td><input type="number" class="facility_form" id="agr_no" size="11"></td>\
				</tr>\
				<tr>\
					<td>Irrigation</td>\
					<td><input type="number" class="facility_form" id="irr_del_amt" size="11"></td>\
					<td><input type="number"  class="facility_form" id="irr_no" size="11"></td>\
				</tr>\
				<tr><td id="dontviewmepls"><td></tr>';
				
		amtPOWAH = '';
		$("#fac-usecd").val(u);
		
		
		
			if (u =='PF' || u =='PG' || u =='PH' || u =='PN'){
				$('#facility-center-tbl-2').append(uHtml+'\
													'+amtPOWAH);				
			}else if(u== 'WS'){
				$('#facility-center-tbl-2').append(
													uHtmlWS+amtWS
												);
			}else{
				$('#facility-center-tbl-2').append(uHtml+amt);
			}
			getFacData(q,u,y);
				$("#the-facilityear").change(function(){
					
					// $('#facility-center-tbl-2').empty();
						// getCrops(this.value);	
					getFacData(q,u,this.value);
				});				
			
		
	/****************************************************************/
		getCrops(u,null,null);
		yearfromddl();
		
		
		$(".facility_form").change(function(){
			var id = $(this).attr("id");
			$(this).attr("name",id);
			
		});
		
		// $(".facility_form2").change(function(){
			// var id = $(this).attr("id");
			// alert('added change');
			// $(this).attr("name",id);
			
		// });
}

function getFacData(q,u,y){

						$.ajax ({
			
							TYPE: "GET",
							url: "../controller/wells/facilityData?facility_id="+q+"&type="+u+"&wyear="+y,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								if ($.trim(data)){
									
									
									$(".facility_form").each(function(){
										var id = $(this).attr("id");
										$(this).attr("name",id);
										$("#dontviewmepls").append("<input type='hidden' name='prev_"+id+"' id='prev_"+id+"'>");
										
									});	
									
									$.each(data,function(i,item){
									
										$("#submit-facilityinfo").val('Update Information');
										$("#isUpdateFacility").val('Y');
										$("#ent_units").val(item.ent_units);
										$("#record_meth").val(item.record_meth);
										// $("input[name='ent_loss_amt']").val(item.ent_loss_amt);
										$("#ent_loss_amt").val(item.loss_amt);
										
										
										
										/** PREV **/
										$("#prev_ent_units").val(item.ent_units);
										$("#prev_fac_record_meth").val(item.record_meth);
										$("#old_ent_units").val(item.ent_units);
										$("#old_ent_loss_amt").val(item.loss_amt);
											
										// $("input[name='ent_loss_amt']").val(item.ent_loss_amt);
										$("#prev_ent_loss_amt").val(item.loss_amt);
										if (u =="WS"){
											$("#dom_pop_serv").val(item.dom_pop_serv);
											$("#dom_del_amt").val(item.dom_del_amt);
											$("#dom_no").val(item.dom_no);
											$("#com_del_amt").val(item.com_del_amt);
											$("#com_no").val(item.com_no);
											$("#ind_del_amt").val(item.ind_del_amt);
											$("#ind_no").val(item.ind_no);
											$("#min_del_amt").val(item.min_del_amt);
											$("#min_no").val(item.min_no);
											$("#agr_del_amt").val(item.agr_del_amt);
											$("#agr_no").val(item.agr_no);	
											$("#irr_del_amt").val(item.irr_del_amt);
											$("#irr_no").val(item.irr_no);
											
											
											/** PREV **/
											$("#prev_dom_pop_serv").val(item.dom_pop_serv);
											$("#prev_dom_del_amt").val(item.dom_del_amt);
											$("#prev_dom_no").val(item.dom_no);
											$("#prev_com_del_amt").val(item.com_del_amt);
											$("#prev_com_no").val(item.com_no);
											$("#prev_ind_del_amt").val(item.ind_del_amt);
											$("#prev_ind_no").val(item.ind_no);
											$("#prev_min_del_amt").val(item.min_del_amt);
											$("#prev_min_no").val(item.min_no);
											$("#prev_agr_del_amt").val(item.agr_del_amt);
											$("#prev_agr_no").val(item.agr_no);	
											$("#prev_irr_del_amt").val(item.irr_del_amt);
											$("#prev_irr_no").val(item.irr_no);
										}else{
											// onsole.log(item.sic_code,$("#crop1").val(item.sic_code).prop("selected",true));
											// $("#crop1").val(item.sic_code).prop("selected",true);
											// $("#crop2").val(item.second_sic_code).prop("selected",true);
											getCrops(u,item.sic_code,item.second_sic_code);
											
											$("#old_sic_cd1").val(item.sic_code);
											$("#old_sic_cd2").val(item.second_sic_code);
											
											
										}
										
									});
									
								}else{
									
										$(".facility_form").each(function(){
											var id = $(this).attr("id");
											$(this).attr("name",'');
											
										});	
										$("#submit-facilityinfo").val('Save Information');
										$("#isUpdateFacility").val('N');		
										$("#ent_units").val('ACFT');
										$("#record_meth").val('B');
										$("#ent_loss_amt").val('');
										$("#ent_loss_amt").val('');
										$("#dom_pop_serv").val('');
										
										if (u =="WS"){
											$("#dom_pop_serv").val('');
											$("#dom_del_amt").val('');
											$("#dom_no").val('');
											$("#com_del_amt").val('');
											$("#com_no").val('');
											$("#ind_del_amt").val('');
											$("#ind_no").val('');
											$("#min_del_amt").val('');
											$("#min_no").val('');
											$("#agr_del_amt").val('');
											$("#agr_no").val('');	
											$("#irr_del_amt").val('');
											$("#irr_no").val('');
										}else{
											
											$("#crop1").val('');
											$("#crop2").val('');
											
										}
										
									
								}
							}
						});
}
function getUseType(u,type){
	// var uHtml = '<select name="use_cd" id="fac-usecd">\
					// <option value="">Select Use Type</option>\
					// <option value="AG">Agriculture</option>\
					// <option value="CO">Commercial</option>\
					// <option value="LV">Livestock</option>\
					// <option value="MI">Mining</option>\
					// <option value="PF">Fossil-Fueled Power</option>\
					// <option value="PG">Geothermal Power	</option>\
					// <option value="PH">Hydroelectric Power</option>\
					// <option value="PN">Nuclear Energy Power</option>\
					// <option value="WS">Water Supplier	</option>\
					// <option value="ID">Irrigation District</option>\
				// </select>';	
				
	// $("#fac-usecd").val(u).attr('selected',true);
	// alert(u+type);
	if (type=="form"){
		
				var uHtml;
		if (u == 'WS'){
			uHtml = 'Water Supplier (WS)';
		}else if (u=='IN'){
			uHtml = 'Industrial (IN)';
		}else if (u=='AG'){
			uHtml = 'Agriculture (AG)';
		}else if (u=='CO'){
			uHtml = 'Commercial (CO)';
		}else if (u=='MI'){
			uHtml = 'Mining (MI)';
		}else if (u=='PF'){
			uHtml = 'Fossil-Fueled Power (PF)';
		}else if (u=='PG'){
			uHtml = 'Geothermal Power (PG)';
		}else if (u=='PH'){
			uHtml = 'Hydroelectric Power (PH)';
		}else if (u=='PN'){
			uHtml = 'Nuclear Energy Power (PN)';
		}else if (u=='LV'){
			uHtml = 'Livestock (LV)';
		}else if (u=='ID'){
			uHtml = 'Irrigation Discrtic (ID)';
		}
			return uHtml;
	}else{
		$("#use_cdFac").empty();	
		var uHtml = '\
					<option value="">Select Use Type</option>\
					<option value="AG">Agriculture (AG) </option>\
					<option value="CO">Commercial (CO) </option>\
					<option value="LV">Livestock (LV) </option>\
					<option value="MI">Mining (MI)</option>\
					<option value="PF">Fossil-Fueled Power (PF)</option>\
					<option value="PG">Geothermal Power	(PG)</option>\
					<option value="PH">Hydroelectric Power (PH)</option>\
					<option value="PN">Nuclear Energy Power (PN)</option>\
					<option value="WS">Water Supplier (WS)</option>\
					<option value="ID">Irrigation District (ID)</option>\
					';	
		
		$("#use_cdFac").append(uHtml);
		$("#use_cdFac").val(u).attr('selected',true);
		
		console.log($("#use_cd"));
	}

	
	
}
function getCrops(u,sic1,sic2){
		$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/cropsFac?q="+u,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				
				$("#crop1").empty();
				$("#crop2").empty();
				
				$("#crop1").append("<option value=''>UNKNOWN</option>");
				$("#crop2").append("<option value=''>UNKNOWN</option>");
				$.each(data,function(i,item){
					
					if (sic1 == item.id){
						$("#crop1").append("<option value='"+item.id+"' selected>"+item.nm+"</option>");
					}else{
						$("#crop1").append("<option value='"+item.id+"'>"+item.nm+"</option>");
					}
					if (sic2 == item.id){
						$("#crop2").append("<option value='"+item.id+"' selected>"+item.nm+"</option>");
					}else{
						$("#crop2").append("<option value='"+item.id+"'>"+item.nm+"</option>");
					}
				});
			
					
			},
			error:function(err, ajaxOptions, throwError){
				alert("Internal Server Error! (2MC) Please contact the administrator");
			}
		});
}
function getMPID (t,q,s,y,f,o,a,filter,z){
	//console.log(t,q,s,y,f,o,a,filter,z);
	NProgress.start();
	
	$("#the-anndata").removeClass('bdt');
	$("#the-anndata").empty();
	$("#table-footer .row").remove();
	
	$(".table-header").empty();
	$('.filter-notice').empty();
	$("#status-div-anndata").html(' <i class="fa fa-info-circle"></i>  Loading data... Please wait <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
	$("#add-new-multipayment").hide();
	$("#add-new-multimove").hide();
	$("#advance-search-modalMap").attr('is-advanceSearch','false');
	
	if (y == undefined || y ==null){
		y = parseInt((new Date).getFullYear()-1);
	}

	var absURL =  "?t="+t+"&q="+q+"&y="+y+"&f="+f+"&o="+o+"&a="+a+"&z="+z;

	
	var linkify;
	$.ajax ({
		
			TYPE: "GET",
			url: "../controller/wells/mpid"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				$("#status-div-anndata").empty();
				$("#status-div-anndata").removeClass();
				
				
				if (!$.trim(data)){
					NProgress.done();
											
								if (t !='MPID' || t !='Facility' || t !='Owner2' || t !='Diverter2'){
										$("#the-anndata").append('<thead>\
																		<tr>\
																		<th class="disable-sorting"><a hred="#" id="refresh-me"><i class="fa fa-refresh" aria-hidden="true" ></i> </a></th>\
																		<th class="sort">Count</th>\
																		<th class="sort">MPID  </th>\
																		<th class="sort">Name  </th>\
																		<th class="sort">Use Type  </th>\
																		<th class="sort">Paid  </th>\
																		<th class="sort">Data  </th>\
																		<th class="sort">Local Description  </th>\
																		<th class="sort">Action  </th>\
																		<th class="sort">County  </th>\
																		<th class="disable-sorting"> Multi-payment/Move </th>\
																		<th class="disable-sorting"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>\
																		</tr>\
																		</thead>');
											
								}else{
									$("#the-anndata").append('<thead>\
																		<tr>\
																		<th class="disable-sorting"><a hred="#" id="refresh-me"><i class="fa fa-refresh" aria-hidden="true" ></i> </a></th>\
																		<th class="disable-sorting">Count</th>\
																		<th class="sort">MPID  </th>\
																		<th class="sort">Owner Name  </th>\
																		<th class="sort">Diverter Name  </th>\
																		<th class="sort">Use Type  </th>\
																		<th class="sort">Paid  </th>\
																		<th class="sort">Data  </th>\
																		<th class="sort">Local Description  </th>\
																		<th class="sort">Action  </th>\
																		<th class="sort">County  </th>\
																		<th class="disable-sorting">Multi-payment/Move  </th>\
																		<th class="disable-sorting"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>\
																		</tr>\
																		</thead>');
								}
								$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:#33B8FF;'> <strong> NOTE: PLEASE MAKE SURE THAT THE Meas Pt. is not Abandoned.  Please use the toggle Above to show Inactive/Abandoned Meas. Pt.. </strong></td></tr>");
								$("#the-anndata").append('<tbody>\
																				<tr>\
																				<td  colspan=9 style="text-align:center;white-space:nowrap">No Data available</td>\
																				</tr>');
							$("#add-new-multipayment").hide();
							$("#add-new-multimove").hide();
																
					
				}else{
								NProgress.done();
								/** WARN THEM THAT CERTAIN CRUCIAL INFORMATION NEEDS ATTENTION**/
								mainCenterErrorHandling.checkCrucialData(data,'gen'); /*gen = general data*/
								
								$("#status").empty();
								if (t =='Diverter' || t== 'Owner'){
								
									$("#the-anndata").append('<thead>\
																			<tr>\
																			<th class="disable-sorting"><a hred="#" id="refresh-me"><i class="fa fa-refresh" aria-hidden="true" ></i> </a></th>\
																			<th class="disable-sorting">Count </th>\
																			<th class="sort">MPID  </th>\
																			<th class="sort">Diverter Name  </th>\
																			<th class="sort">Owner Name  </th>\
																			<th class="sort">Use Type  </th>\
																			<th class="sort">Paid  </th>\
																			<th class="sort">Data  </th>\
																			<th class="sort">Local Description  </th>\
																			<th class="sort">Action  </th>\
																			<th class="sort">County  </th>\
																					<th class="disable-sorting">\
																						<select class="multi">\
																								<option value="p"> Multi-payment </option>\
																								<option value="m"> Multi-move </option>\
																						</select>  <a href="#" class="tool-tip" data-toggle="tooltip" title="you must pick 2 or more MPID to use Multi-payment/Mult-move"> [?]</a> <input type="checkbox" id="checkboxall"> </th>\
																			<th class="disable-sorting"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>\
																			</tr>\
																			</thead>');
								}else{
									var showODFnm;
										if (t =='Diverter2' || t== 'Owner2'){
											showODFnm = '<th class="sort">Diverter Name </th>\
																	<th class="sort">Owner Name</th>';
										// }else if (t== 'Owner2'){
												// showODFnm = '<th class="sort">Diverter Name  </th>\
																	// <th class="sort">Owner Name  </th>';
										}else{
											showODFnm = '	<th class="sort">Owner Name  </th>\
																			<th class="sort">Diverter Name  </th>';
										}
										$("#the-anndata").append('<thead>\
																			<tr>\
																			<th class="disable-sorting"><a hred="#" id="refresh-me"><i class="fa fa-refresh" aria-hidden="true" ></i> </a></th>\
																			<th class="disable-sorting">Count</th>\
																			<th class="sort">MPID  </th>\
																			'+showODFnm+'\
																			<th class="sort">Use Type  </th>\
																			<th class="sort">Paid  </th>\
																			<th class="sort">Data  </th>\
																			<th class="sort">Local Description  </th>\
																			<th class="sort">Action  </th>\
																			<th class="sort">County  </th>\
																			<th class="disable-sorting">\
																						<select class="multi">\
																								<option value="p"> Multi-payment </option>\
																								<option value="m"> Multi-move </option>\
																						</select>  <a href="#" class="tool-tip" data-toggle="tooltip" title="you must pick 2 or more MPID to use Multi-payment/Mult-move"> [?]</a> <input type="checkbox" id="checkboxall"> </th>\
																			<th class="disable-sorting"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>\
																			</tr>\
																			</thead>');
								}
								
								
								var isData;					  
								var isPaid;			
								
								var ctr = 1;
								var countAll=0;
								var GWctr = 0;
								var SWctr= 0;
								var SPctr= 0;
								var TWctr= 0;
								var FWctr= 0;
								var disableMultiPayment;
								var removeDisable;
							
									
								
								$.each(data,function(i,item){
								
								
										if (t != 'Facility'){
											linkify = item.data == 'Yes' ? linkify = '<a href="https://wise.er.usgs.gov/'+$dir+'/wells/measpt?mpid='+item.mpid+'&year='+y+'&diverter='+item.diverter_id+'&owner='+item.owner_id+'&isData='+item.data+'" target="__blank">'+item.mpid+'</a>' : linkify = item.mpid;
											isData = item.data;
										}else{
											linkify = item.data == 'Yes' ? linkify = '<a href="https://wise.er.usgs.gov/'+$dir+'/wells/measpt?type='+t+'&mpid='+item.mpid+'&year='+y+'&diverter='+item.diverter_id+'&owner='+item.owner_id+'&isData='+item.data+'" target="__blank">'+item.mpid+'</a>' : linkify = item.mpid;
											isData = item.data;
										}
											
							
									 
									 if (item.paid === undefined || item.paid === null){
										 	isPaid = '<a href="#" id="quick-pay'+i+'">No</a>';
										
										}else {
											
												if (isData == 'Yes' && item.paid == 'Yes' || item.paid == 'Y'){
													isPaid = 'Yes';
													disableMultiPayment = "data-disable=true disabled=disabled";
													disableLink = "class='disable'";
													disableLink2 = "tool-tip disable";
											
												}else if (isData == 'Yes' && item.paid == 'No' || item.paid == 'N' ){
													isPaid = '<a href="#"  id="quick-pay'+i+'">No</a>';
													disableMultiPayment ="";
													disableLink ="";
													disableLink2 = "tool-tip";
												}else if (isData == 'Yes' && item.paid == 'No' || item.paid == 'N'){
													isPaid = '<a href="#"  id="quick-pay'+i+'">No</a>';
												}else{
														
													disableMultiPayment = 'data-disable=none';
													disableLink ="";
													disableLink2 = "tool-tip";
												}
												
												if (isData == 'No' && item.paid == 'No'){
													isPaid = 'Payment Unavailable. Please Enter Data.  <a href="#" class="tool-tip" data-toggle="tooltip" title="Please add data first"> [?]</a> ';
													disableMultiPayment = "data-disable=true disabled=disabled";
														
												}
												
											
									 }
									
									var $moved = '';
									if (item.moved =='1'){
										if (item.orig_oid != ''){
											$moved = '<a href="#" class="tool-tip" data-toggle="tooltip" title="this MPID has been moved to/from Owner_ID: '+item.orig_oid+'  ">*</a>';
										}else if(item.orig_did !=''){
											$moved = '<a href="#" class="tool-tip" data-toggle="tooltip" title="this MPID has been moved to/from Diverter_ID: '+item.orig_did+'  ">*</a>';
										}else{
											$moved = '<a href="#" class="tool-tip" data-toggle="tooltip" title="this MPID has been moved to/from both Diverter_ID: '+item.orig_did+' and/or  Owner_ID: '+item.orig_oid+'">*</a>';
										}
										
										
									}
									if ( t!= "Facility"){
											
										$("#the-anndata").append('<tbody>\
																			<tr> \
																			<td><input type="radio" value='+item.mpid+' id="the-mpid'+i+'" class="the-mpid" name="thempid" data-counter ="'+ctr+'"/></td>\
																			<td>'+ctr+'. </td>\
																			<td>'+linkify+' '+$moved+'</td>\
																			<td>'+item.diverter_nm+'('+item.diverter_id+')</td>\
																			<td>'+item.owner_nm+'('+item.owner_id+')</td>\
																			<td>'+item.use_cd+' '+item.source_cd+'</td>\
																			<td>'+isPaid+'</td>\
																			<td>'+isData+'</td>\
																			<td>'+item.local_desc+'</td>\
																			<td>'+item.action+'</td>\
																			<td>'+item.county_nm+' ('+item.county_cd+')</td>\
																			<td><input type="checkbox" value= "'+item.mpid+'" id="payment-mpid'+i+'" class="mp-mpid" '+disableMultiPayment+' data="'+isData+'" data-id="'+i+'" data-owner="'+item.owner_id+'" data-diverter="'+item.diverter_id+'"/></td>\
																			<td><a href="#quick-edit-mpid" id="quick-edit'+i+'"> Edit  <a href="#" class="tool-tip" data-toggle="tooltip" title="edit a MPID"> [?]</a>  </a></td>\
																			<td><input type="hidden" id="diverter_id'+i+'"   value="'+item.diverter_id+'"></td>\
																			<td><input type="hidden" id="owner_id'+i+'" value="'+item.owner_id+'"></td>\
																			<td><input type="hidden" id="hasData'+i+'" value="'+isData+'"></td>\
																			</tr>\
																		</tbody>');
									
									}
									else if ( t== "Facility"){
										
										
										$("#the-anndata").append('<tbody>\
																			<tr> \
																			<td><input type="radio" value='+item.mpid+' id="the-mpid'+i+'" class="the-mpid" name="thempid"/></td>\
																			<td>'+ctr+'. </td>\
																			<td>'+linkify+'</td>\
																			<td>'+item.diverter_nm+'('+item.diverter_id+')</td>\
																			<td>'+item.owner_nm+'('+item.owner_id+')</td>\
																			<td>'+item.use_cd+' '+item.source_cd+'</td>\
																			<td>'+isPaid+'</td>\
																			<td>'+isData+'</td>\
																			<td>'+item.local_desc+'</td>\
																			<td>'+item.action+'</td>\
																			<td>'+item.county_nm+' ('+item.county_cd+')</td>\
																			<td><input type="checkbox" value= "'+item.mpid+'" id="payment-mpid'+i+'" class="mp-mpid"  '+disableMultiPayment+' data="'+isData+'" data-id="'+i+'"/></td>\
																			<td><a href="#quick-edit-mpid" id="quick-edit'+i+'">Edit  <a href="#" class="tool-tip" data-toggle="tooltip" title="edit a MPID"> [?]</a>  </a></td>\
																			<td><input type="hidden" id="diverter_id'+i+'" value="'+item.diverter_id+'"></td>\
																			<td><input type="hidden" id="owner_id'+i+'" value="'+item.owner_id+'"></td>\
																			<td><input type="hidden" id="facility_id'+i+'" value="'+item.facility_id+'"></td>\
																			<td><input type="hidden" id="hasData'+i+'" value="'+isData+'"></td>\
																			</tr>\
																		</tbody>');
									}else{
										
										$("#the-anndata").append('<tbody>\
																			<tr > \
																			<td><input type="radio" value='+item.mpid+' id="the-mpid'+i+'" class="the-mpid" name="thempid"/></td>\
																			<td>'+ctr+'. </td>\
																			<td>'+linkify+'</td>\
																			<td>'+item.name2+'</td>\
																			<td>'+item.name+'</td>\
																			<td>'+item.use_cd+' '+item.source_cd+'</td>\
																			<td>'+isPaid+'</td>\
																			<td>'+isData+'</td>\
																			<td>'+item.local_desc+'</td>\
																			<td>'+item.action+'</td>\
																			<td>'+item.county_nm+' ('+item.county_cd+')</td>\
																			<td><input type="checkbox" value= "'+item.mpid+'" id="payment-mpid'+i+'" class="mp-mpid"  '+disableMultiPayment+' data="'+isData+'" data-id="'+i+'"/></td>\
																			<td><a href="#" id="quick-edit'+i+'">Edit  <a href="#" class="tool-tip" data-toggle="tooltip" title="edit a MPID"> [?]</a>  </a></td>\
																			<td><input type="hidden" id="diverter_id'+i+'"   value="'+item.diverter_id+'"></td>\
																			<td><input type="hidden" id="owner_id'+i+'" value="'+item.owner_id+'"></td>\
																			<td><input type="hidden" id="hasData'+i+'" value="'+isData+'"></td>\
																			</tr>\
																		</tbody>');
								
									}
									
									ctr++;
									countAll++;
									
									switch (item.source_cd){
											case 'GW':
											GWctr++;
											break;
											
											case 'SW':
											SWctr++;
											break;
											
											case 'SP':
											SPctr++;
											break;
											
											case 'TW':
											TWctr++;
											break;
											
											case 'FW':
											FWctr++;
											break;
										
									}
									
									
									
									
									$("#quick-pay"+i).click(function(e){
										e.preventDefault();
										$("#quick-paymodal").modal({show:true});
										$("#payment-mpid").html(item.mpid);
										$("#payment_mpid").val(item.mpid);
										var owner = $("#owner_id"+i).val();
										var diverter = $("#diverter_id"+i).val();
										$(".payment-oid").val(owner);
										$(".payment_oid").html(owner);
										$(".payment-did").val(diverter);
										$(".payment_did").html(diverter);
										$("#payment_year").val(y);
										//console.log( $("#owner_id"+i).val());
									});
									
									$("#quick-edit"+i).click(function(e){
										e.preventDefault();
										$("#quick-edit-mpid").modal('show');
										//alert("owner id"+item.owner_id);
										$("input[name='mpid-h']").val(item.mpid);
										$("#mpid-span").html(item.mpid);
										$("input[name='oid']").val(item.owner_id);
										$("input[name='did']").val(item.diverter_id);
										
										getJSONData.appendStationDynamic(item.mpid,item.owner_id,item.diverter_id,y,item.name,item.name2,t,item.facility_id,item.facility_nm,item.owner_nm,item.diverter_nm,item.data);
									});
									$("#actioncd").val(item.action);
									$("#sourcecd").val(item.source_cd);
									
								
									if (item.data == 'Yes'){
											if (y == item.year){
												$('#the-mpid'+i).attr('disabled',true);
											
											}else{
												$('#the-mpid'+i).removeAttr('disabled');
											
											}
										}else{
												item.data == 'Yes' ? $('#the-mpid'+i).attr('disabled',true ): $('#the-mpid'+i).removeAttr('disabled');
										}
									
									NProgress.done();
									/*<div class="table-contents-list-radio-header1"><input type="radio" class="select-list" name="selected"> </div>
									<div class="table-contents-list-header" id="list-id"></div>
									<div class="table-contents-list-header"  id="list-name"></div>
									<div class="table-contents-list-header"  id="list-usecd"></div>*/
									
								}); //ennd 
								
								/*
								$(".multi").click(function(e){
										e.preventDefault();
										var mp = $(".mp-mpid");
										$(".multi").text( ($(".multi").text() == 'Multi-Move') ? 'Multi-Payment': 'Multi-Move');
										mp.removeAttr('disabled');
										mp.each(function(){
											if ($(".multi").text() == "Multi-Payment"){
												var isDisabled = $(this).attr("data-disable");
													
													if (isDisabled == "true"){
														$(this).attr('disabled',true);
														$(this).removeAttr('checked');
													}
											}
											
											
										});
										
										/*console.log(isDisabled)
										
									
								});
								*/
								$(".multi").change(function(e){
									var val = $(this).val();
									var mp = $(".mp-mpid");
									var t = $(this).val();
									mp.removeAttr('disabled');
								
											if (val == 'p'){
												$(".mp-mpid").removeAttr('checked');
												mp.removeAttr('disabled');
												mp.each(function(){
													
														var isDisabled = $(this).attr("data-disable");
														var hasData = $(this).attr("data");
															if (isDisabled == "true"){
																$(this).attr('disabled',true);
																$(this).removeAttr('checked');
																$("#checkboxall").removeAttr('checked');
																$(this).attr('checked',true);
															}
															if (hasData == "No"){
																$(this).attr('disabled',true);
															}

												});
												$("#add-new-multipayment").hide();
												$("#add-new-multimove").hide();
											
											}else{
												$(".mp-mpid").removeAttr('checked');
												mp.each(function(){
													// var hasData = $(this).attr("data");
													
														var isDisabled = $(this).attr("data-disable");
														var hasData = $(this).attr("data");
														
															if (hasData =="No"){
																//$(this).attr('disabled',true);
																$(this).removeAttr('checked');
																$(this).removeAttr('disabled');
																$("#checkboxall").removeAttr('checked');
																$(this).attr('checked',true);
															}else{
																$(this).attr('disabled',true);
															}
															
												});
												
												$("#add-new-multimove").hide();
												$("#add-new-multipayment").hide();
											}
			
								});
								$(".the-mpid").change(function(){
									if( $(this).is(":checked") ){ // check if the radio is checked
										var ct = $(this).attr("data-counter");
										 $("#selected-mpid-bro").val(ct);
									}
								});
								$("#max-mpid-bro").val(countAll);
								// $('#the-anndatacenter .show-stats').remove();
							
								$('.statistics').html('<tr> <td> <i class="fa fa-bar-chart" aria-hidden="true"></i> Statistics:  </td></tr>\
														<tr class="show-stats"><td style="padding-left:25px">Total Number of Sites: '+countAll+'</td></tr>\
															<tr class="show-stats"><td  style="padding-left:35px">Surface Water: '+SWctr+' </td></tr>\
															<tr class="show-stats" ><td  style="padding-left:35px">Ground Water: '+GWctr+ '</td></tr>\
															<tr class="show-stats"><td  style="padding-left:35px">Spring Water: '+SPctr+' </td></tr>\
															<tr class="show-stats"><td  style="padding-left:35px">Transferred Water: '+TWctr+' </td></tr>\
															<tr class="show-stats"><td  style="padding-left:35px">Facility Water: '+FWctr+' </td></tr>\
														');
								
				
								$("#showaudittrail").click(function(e){
									e.preventDefault();
									var auditurl;	
									
									auditurl = 'https://wise.er.usgs.gov/'+$dir+'/wells/move_trail?id='+q+"&type="+t;
									
									if ($isDev == true){
										window.open (auditurl ,'Multi-move Audit Trail','scrollbars=yes, width=850, height=850, top =0, right=960');
									}
									else{
										alert('This feature is currently disabled and on active development. We will release this soon');
									}
									
								});
								/*$('#the-anndatacenter').append('<tr class="show=stats">\
																	<td> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="../wells/wellsReport'+absURL+'"> Print Measurement Point Information</a> </td>\
																</tr>');
								*/
								
								
								$('.the-mpid').change(function(e){
									$(this).is(':checked') ? $("#add-new-anndata").show() : $("#add-new-anndata").hide();
									$(this).is(':checked') ? $("#modify-mpid").show() : $("#modify-mpid").hide();
								});
							
								$("#add-new-multipayment").hide();
								$("#add-new-multimove").hide();
								
								$("#multipayment_year").val(y);
								$("#multipayment_type").val(t);
								
								
								$("#checkboxall").click(function(){		
										
										$("#listmpid").empty();
										$("#listmpid-multimove").empty();
										
										
										var hasData = $(".mp-mpid").attr('data');
										if (hasData == 'Yes'){
											$(".mp-mpid").not(':disabled').prop('checked', $(this).prop('checked'));
										}
										//	$(this).is(':checked') ? ($("#add-new-multipayment").show(), $("#add-new-multimove").show()) : ($("#add-new-multipayment").hidemodal("hide"), ("#add-new-multimove").hidemodal("hide") );
											var t = $(".multi").val();
										
											if ($("#checkboxall").is(':checked')){
												if($("input.mp-mpid:checked").length > 1) {
														if (t !='p'){
															$("#add-new-multimove").show();
																
														}else{
															$("#add-new-multipayment").show();
														}
												}
												
											}else{
													
												$("#add-new-multimove").hide();
												$("#add-new-multipayment").hide();
											}
										
											// var x = $("input.mp-mpid").filter(':checked').map(function(item) {
												// return this;
											// }).get();
										// console.log(x);
											// $.each(x,function(i,item){
												// var ctr = item.attributes[5].value;
												
												// var xDiverter = $("#diverter_id"+ctr).val();
												// console.log(item);
												// var xOwner = $("#owner_id"+ctr).val();
												// var xData = $("#hasData"+ctr).val();
												// $("#listmpid").append("<input type='hidden' value='"+item.value+"' name='multimpid"+i+"'><input type='hidden' value='"+xDiverter+"' name='diverter_id"+i+"'><input type='hidden' value='"+xOwner+"' name='owner_id"+i+"'><input type='hidden' value='"+xData+"' name='hasData"+i+"'>");
												// $("#listmpid-multimove").append("<input type='hidden' value='"+item+"' name='multimpid"+i+"'><input type='hidden' value='"+xDiverter+"' name='diverter_id"+i+"'><input type='hidden' value='"+xOwner+"' name='owner_id"+i+"'><input type='hidden' value='"+xData+"' name='hasData"+i+"'>");
												// $("#listmpid-multimove").append(item.attributes[5].value+" is moved to Diverter/Owner => "+xDiverter+"/"+xOwner+ "<br />");
											// });										
											var mpctr =0;
											$("#listmpid-multimove").append("Here's the list of MPID you selected: <br/> <br/>");
											$(".mp-mpid:checked").each(function(){
												
													var old_diverter = $(this).attr("data-diverter");
													var old_owner = $(this).attr("data-owner");
													var hasdata = $(this).attr("data");
													var mpid = $(this).val();
													// console.log(old_owner,old_diverter);
													$("#listmpid").append("<input type='hidden' value='"+mpid+"' name='multimpid"+mpctr+"'><input type='hidden' value='"+old_diverter+"' name='diverter_id"+mpctr+"'><input type='hidden' value='"+old_owner+"' name='owner_id"+mpctr+"'><input type='hidden' value='"+hasdata+"' name='hasData"+mpctr+"'>");
													$("#listmpid-multimove").append("<input type='hidden' value='"+mpid+"' name='multimpid"+mpctr+"'><input type='hidden' value='"+old_diverter+"' name='diverter_id"+mpctr+"'><input type='hidden' value='"+old_owner+"' name='owner_id"+mpctr+"'><input type='hidden' value='"+hasdata+"' name='hasData"+mpctr+"'>");
													$("#listmpid-multimove").append("MPID: '"+mpid+"'; hasData: '"+hasdata+"'; Owner: '"+old_owner+"'; Diverter: '"+old_diverter+"' <br />");
													mpctr++;
											});
										
										$("#multipayment-mpid").html($("input.mp-mpid:checked").length);
										$("#multimove-mpid").html($("input.mp-mpid:checked").length);
										var z; 
										
											var ctr = $("input.mp-mpid:checked").length;
											$("#multictr").val(ctr);
											$("#ctr").val(ctr);
											ctr = (ctr * 10);
											
										
											$("#totamtacct").val(ctr);
									});
								
								// this -> if they click it one by one instead of the check all checkbox
								var i=1;
								var multipaymentmpid;		
								var multimovempid;		
								$("input.mp-mpid").on("change", function(evt) {
									
									$("#listmpid").empty();
									$("#listmpid-multimove").empty();
									
										var data_id = $(this).attr('data-id');

									   if($("input.mp-mpid:checked").length > 0) {
												var t = $(".multi").val();
												if ($(this).is(':checked')){
														if (t !='p'){
															$("#add-new-multimove").show();
														}else {
															$("#add-new-multipayment").show();
														}
												}else{
													$("#add-new-multimove").hide();
													$("#add-new-multipayment").hide();
												}
												$("#multipayment-mpid").html($("input.mp-mpid:checked").length);
												$("#multimove-mpid").html($("input.mp-mpid:checked").length);
												$("#ctr").val($("input.mp-mpid:checked").length);
												$("#multictr").val($("input.mp-mpid:checked").length);
												if ($("input.mp-mpid:checked")){
													multipaymentmpid = $(this).val();
													multimovempid = $(this).val();
													//$("#listmpid").append('<div class ="multi" id="'+multipaymentmpid+'"> '+i+ '.)'+ multipaymentmpid +'  </div>'); 	
												}
												
												var ctr = $("input.mp-mpid:checked").length;
												ctr = (ctr * 10);
												$("#totamtacct").val( ctr );
												
												
												var x = $("input.mp-mpid").filter(':checked').map(function(item) {
													return this.value;
														}).get();
														
												
												//("#listmpid").append("<input type='hidden' value='"+xDiverter+"' name='diverter_id"+i+"'><input type='hidden' value='"+xOwner+"' name='owner_id"+i+"'>");
												//$("#listmpid-multimove").append("<input type='hidden' value='"+xDiverter+"' name='diverter_id"+i+"'><input type='hidden' value='"+xOwner+"' name='owner_id"+i+"'>");
												$.each(x,function(i,item){	
													$("#listmpid").append("<input type='hidden' value='"+item+"' name='multimpid"+i+"'>");
													$("#listmpid-multimove").append("<input type='hidden' value='"+item+"' name='multimpid"+i+"'>");
													
														
												});	
												
												var y = $("input.mp-mpid").filter(':checked').map(function(item) {
													return $(this).attr('data-diverter');
													}).get();
													
												$.each(y,function(i,item){
													$("#listmpid").append("<input type='hidden' value='"+item+"' name='diverter_id"+i+"'>");
													$("#listmpid-multimove").append("<input type='hidden' value='"+item+"' name='diverter_id"+i+"'>");
														
													
												});	
												
												
												var z = $("input.mp-mpid").filter(':checked').map(function(item) {
													return $(this).attr('data-owner');
													}).get();
												$.each(z,function(i,item){
													$("#listmpid").append("<input type='hidden' value='"+item+"' name='owner_id"+i+"'>");
													$("#listmpid-multimove").append("<input type='hidden' value='"+item+"' name='owner_id"+i+"'>");
													
												});	
												
												var d = $("input.mp-mpid").filter(':checked').map(function(item) {
													return $(this).attr('data');
													}).get();
													
												$.each(d,function(i,item){
													$("#listmpid").append("<input type='hidden' value='"+item+"' name='hasData"+i+"'>");
													$("#listmpid-multimove").append("<input type='hidden' value='"+item+"' name='hasData"+i+"'>");
													
												});	
									   }else{
											$("#add-new-multipayment").hide();
											$("#add-new-multimove").hide();
											//multipaymentmpid="";
													
									   }
									 
										i+=1;
								});
							
								$("#the-anndata").bdt();
								
								// $(".close").click(function(){
									// console.log($("#table-footer .row"));
									
								// });
								$("#mutlipayment_year").val(y);
								$("#multipayment_type").val(t);
								
								
								//$("#listmpid").append('<div> MPID: ' + multipaymentmpid +'  </div>');
								
								$("#refresh-me").click(function(){
									
									var z = $("input[name='typeid']:checked").attr("data-id");
									if (z) {
										if (z =="all"){
										z="";
										}else{	
											q = $("#just-ignore-me-too").val();
																			
										}
									}else{
										getMPID (t,q,s,y,f,o,a,null,z);
									}
									$("#add-new-anndata").hide();
									//$("#modify-mpid").hide();
									/*$("#the-anndata").bdt({showSearchForm: 0,
													showEntriesPerPageField: 0
										});*/
								});
							
								
							
									$("#search").attr("placeholder","Search Table");
								
									$('.tool-tip').tooltip();
											
								
								/*
								$('#the-mpid-selectall').click(function(e){
									
									if(this.checked){
										
										$('.the-mpid').each(function(){
											$(this).attr("disabled") == "disabled" ? this.checked = false: this.checked = true; $("#add-new-anndata").show();
									
										});
									}else{
										$('.the-mpid').each(function(){
											this.checked = false;
											$("#add-new-anndata").hide();
										});
									}
								});
								*/
			
				}
				
			},
			error:function(err, ajaxOptions, throwError){
				console.log(err);
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
		
		var FiscalYearStartat = '10';
		var month = new Date().getMonth(); 
		var select; 
		var currWaterYear;
	
		if (month >=10){
			 currWaterYear = currYear;
		}else{
			currWaterYear = (currYear-1);
		}
		for ($i =currYear; $i>=startYear; $i--){
			
			
		
				$("#advance-search-the-year").append("<option value='"+$i+"'>"+$i+"</option>");
				$("#the-year").append("<option value='"+$i+"'>"+$i+"</option>");
				$("#the-facilityear").append("<option value='"+$i+"'>"+$i+"</option>");
				
					
		//	$("#the-year").val(currWaterYear);
	//	$("#the-facilityear").val(currWaterYear);
			
		}
		
		// $("#the-year").find('option:contains('+currWaterYear+')').attr('selected',true);
		
		//$("#the-year").append("<option value='all'>All Years</option>");
		$("#year").val(currWaterYear);
		$("#the-year").val(currWaterYear);
		$("#advance-search-the-year").val(currWaterYear);
	//	$("input[name='year']").val(currWaterYear);
		
}

/*

	function init() {

		key_count_global = 0;

		
		$("#search-box").on("keyup", function() {
			
			key_count_global++;
			setTimeout("lookup("+key_count_global+")", 500);//Function will be called 1 second after user stops typing.
		});
	}
	function lookup(key_count) {
	
		console.log(key_count_global);
		if(key_count == key_count_global) {
				
			var type = searchLabel.text();
			var query = encodeURIComponent(searchQuery.val());
				if (type =='Select Type'){
					alert("Please Select Type");
					NProgress.done();
					
					$("#select-type").css(function(){
						boder: "1px solid red"
						
						
					});
				}else{
					if (query != ""){
						
								getInfo(type,query,x);
							
					}
				
				}
		}
	}
	*/
	
	function init(){
		/*$('#search-box').keyup(function(){
			
			clearTimeout(typingTimer);
			if ($('#search-box').val) {
				typingTimer = setTimeout(function(){
					//do stuff here e.g ajax call etc....
						var searchLabel = $("#searchLabel");
						var searchQuery = $("#search-box");
						
						var label = searchLabel.html();
						var t = $("#type").val();
						var x = $("#x").val();
						
							
					var type = searchLabel.text();
					var query = encodeURIComponent(searchQuery.val());
					if (type =='Select Type'){
						alert("Please Select Type");
						NProgress.done();
						
						$("#select-type").css(function(){
							boder: "1px solid red"
							
							
						});
					}else{
						if (query != ""){
							
									getInfo(type,query,x);
								
						}
					
					}
				}, doneTypingInterval);
			}
		});*/
		$('#search-box').keypress(function(e){
			
			var key = e.which;
			
			
			if (key ==13){
					var searchQuery = $(this);
						var searchLabel = $("#searchLabel");
						var label = searchLabel.html();
						var t = $("#type").val();
						var x = $("#x").val();
						
							
					var type = searchLabel.text();
					var query = encodeURIComponent(searchQuery.val());
					if (type =='Select Type'){
						alert("Please Select Type");
						NProgress.done();
						
						$("#select-type").css(function(){
							boder: "1px solid red"
							
							
						});
					}else{
						if (query != ""){
							NProgress.start();
								getInfo(type,query,x);
								
						}
					
					}
			}
					
		});
		
	}
var getJSONData = {
					
				initData: function(){
				
					$("#search-box").typeahead('destroy');
					$("#list-owner-edit").typeahead('destroy');
					$("#list-owner").typeahead('destroy');
					$("#list-diverter-edit").typeahead('destroy');
					$("#list-diverter").typeahead('destroy');
					var date = new Date();
					var yearnow = date.getFullYear();
					//$(".select2").select2();
					$("#hideme").hide();
					$("input[name='well_depth']").attr("readOnly",true);
					$("#date-drilled").attr("readOnly",true);
					$("#status-div").html("Loading : 0%");
			
					this.getOwner(1);
					key_count_global = 0;
					
					
			
					/*$("#list-owner-edit").keyup(function(){
							clearTimeout(typingTimer);
								
						if ($("#list-owner-edit").val) {
								typingTimer = setTimeout(function(){
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#list-owner-edit");
									var t = $("#type").val();
									var x = $("#x").val();
									var query = encodeURIComponent(searchQuery.val());
													
									if (query != ""){
										
											if ($("#filter-owner").is(':checked')){
												getJSONData.getOwner(1,query,"list-owner-edit");
											}else{
												getJSONData.getOwner(0,query,"list-owner-edit");
											}	
													
													
									}		
													
								}, doneTypingInterval);
							}
					});*/
					$("#list-owner-edit").keypress(function(e){
						var key = e.which;
						
						if (key == 13){
																			
								var searchQuery = $(this);
								var t = $("#type").val();
								var x = $("#x").val();
								var query = encodeURIComponent(searchQuery.val());
													
								if (query != ""){
										
									if ($("#filter-owner-edit").is(':checked')){
										getJSONData.getOwner(1,query,"list-owner-edit");
									}else{
										getJSONData.getOwner(0,query,"list-owner-edit");
									}	
								}	
						}
					});
					/*
					$("#list-diverter-edit").keyup(function(){
							clearTimeout(typingTimer);
								
						if ($("#list-diverter-edit").val) {
								typingTimer = setTimeout(function(){
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#list-diverter-edit");
									var t = $("#type").val();
									var x = $("#x").val();
									var query = encodeURIComponent(searchQuery.val());
													
									if (query != ""){
									
											if ($("#filter-owner").is(':checked')){
												getJSONData.getDiverter(1,query,"list-diverter-edit");
											}else{
												getJSONData.getDiverter(0,query,"list-diverter-edit");
											}	
													
													
									}		
													
								}, doneTypingInterval);
							}
					});*/
					$("#list-diverter-edit").keypress(function(e){
							clearTimeout(typingTimer);
						var key = e.which;
						
						if (key == 13){
									//do stuff here e.g ajax call etc....
																					
							var searchQuery = $("#list-diverter-edit");
							var t = $("#type").val();
							var x = $("#x").val();
							var query = encodeURIComponent(searchQuery.val());
													
							if (query != ""){
									
								if ($("#filter-diverter-edit").is(':checked')){
									getJSONData.getDiverter(1,query,"list-diverter-edit");
								}else{
									getJSONData.getDiverter(0,query,"list-diverter-edit");
								}	
													
													
							}		
													
						}
							
					});	
						
					/*$("#list-owner").keyup(function(){
							clearTimeout(typingTimer);
								
						if ($("#list-owner").val) {
								typingTimer = setTimeout(function(){
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#list-owner");
									var t = $("#type").val();
									var x = $("#x").val();
									var query = encodeURIComponent(searchQuery.val());
													
									if (query != ""){
										
											if ($("#filter-owner").is(':checked')){
												getJSONData.getOwner(1,query,"list-owner");
											}else{
												getJSONData.getOwner(0,query,"list-owner");
											}	
													
													
									}		
													
								}, doneTypingInterval);
							}
					});*/
				
					$("#list-owner").keypress(function(e){
						var key = e.which;
						
						if (key ==13){
							var searchQuery = $("#list-owner");
							var t = $("#type").val();
							var x = $("#x").val();
							var query = encodeURIComponent(searchQuery.val());
												
							if (query != ""){
								if ($("#filter-owner").is(':checked')){
									getJSONData.getOwner(1,query,"list-owner");
								}else{
									getJSONData.getOwner(0,query,"list-owner");
								}	
							}		
								
						}
												
							
					});
					$("#list-diverter").keypress(function(e){
						var key = e.which;
								if(key ==13){
							
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#list-diverter");
									var t = $("#type").val();
									var x = $("#x").val();
									var query = encodeURIComponent(searchQuery.val());
													
									if (query != ""){
									
											if ($("#filter-diverter").is(':checked')){
												getJSONData.getDiverter(1,query,"list-diverter");
											}else{
												getJSONData.getDiverter(0,query,"list-diverter");
											}	
													
													
									}
								}						
							
					});
						
					$("#list-facility").keyup(function(){
							clearTimeout(typingTimer);
								
						if ($("#list-facility").val) {
								typingTimer = setTimeout(function(){
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#list-facility");
										var t = $("#type").val();
										var x = $("#x").val();
										// console.log(key_count)
		
									var query = encodeURIComponent(searchQuery.val());
											
										if (query != ""){
											
													if ($("#filter-facility").is(':checked')){
														getJSONData.getFacility(1,query);
													}else{
														getJSONData.getFacility(0,query);
													}	
										}
													
								}, doneTypingInterval);
							}
					});
					
					$("#adv-list-owner").keypress(function(e){
						var key = e.which;
						
						
							var searchQuery = $("#adv-list-owner");
							var t = $("#type").val();
							var x = $("#x").val();
							var query = encodeURIComponent(searchQuery.val());
												
							if (query != ""){
								if ($("#adv-filter-owner").is(':checked')){
									getJSONData.getOwner(1,query,"adv-list-owner");
								}else{
									getJSONData.getOwner(0,query,"adv-list-owner");
								}	
							}		
								
						
												
							
					});
					$("#adv-list-diverter").keypress(function(e){
						var key = e.which;
								if(key ==13){
							
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#adv-list-diverter");
									var t = $("#type").val();
									var x = $("#x").val();
									var query = encodeURIComponent(searchQuery.val());
													
									if (query != ""){
									
											if ($("#adv-filter-diverter").is(':checked')){
												getJSONData.getDiverter(1,query,"adv-list-diverter");
											}else{
												getJSONData.getDiverter(0,query,"adv-list-diverter");
											}	
													
													
									}
								}						
							
					});
						
					$("#adv-list-facility").keyup(function(){
							clearTimeout(typingTimer);
								
						if ($("#list-facility").val) {
								typingTimer = setTimeout(function(){
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#adv-list-facility");
										var t = $("#type").val();
										var x = $("#x").val();
										// console.log(key_count)
		
									var query = encodeURIComponent(searchQuery.val());
											
										if (query != ""){
											
													if ($("#adv-filter-facility").is(':checked')){
														getJSONData.getFacility(1,query);
													}else{
														getJSONData.getFacility(0,query);
													}	
										}
													
								}, doneTypingInterval);
							}
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
					$("#filter-facility").click(function(){
						
							var $k = $(this).is(":checked");
							if ($k == true){
								$("#list-facility").val('');
							
							}
					});	
				
					$("#date-drilled").datepicker({
							keyupMonth: true,
							keyupYear: true,
							yearRange: '1985:'+yearnow
						
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
				facilityOD:function(){
					$("#list-ownerfac").keypress(function(e){
									var key = e.which;			
									if (key ==13){
										var searchQuery = $("#list-ownerfac");
										var t = $("#type").val();
										var x = $("#x").val();
										var query = encodeURIComponent(searchQuery.val());
															
										if (query != ""){
											if ($("#filter-ownerfac").is(':checked')){
												getJSONData.getOwner(1,query,"list-ownerfac");
											}else{
												getJSONData.getOwner(0,query,"list-ownerfac");
											}	
										}		
											
									}
															
										
								});
						$("#list-diverterfac").keypress(function(e){
									var key = e.which;			
									if (key ==13){
										var searchQuery = $("#list-diverterfac");
										var t = $("#type").val();
										var x = $("#x").val();
										var query = encodeURIComponent(searchQuery.val());
															
										if (query != ""){
											if ($("#filter-diverterfac").is(':checked')){
												getJSONData.getDiverter(1,query,"list-diverterfac");
											}else{
												getJSONData.getDiverter(0,query,"list-diverterfac");
											}	
										}		
											
									}
															
										
								});
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
					$("#aquifer_station").empty();
					$("#aquifer_station").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../controller/wells/aquifer",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#aquifer_station").empty();	
								$("#aquifer_station").append('<option value="UNKNOWN">UNKNOWN</option>');
								$.each (data, function (i,item){
									
									if (data[i].use_cd != 'AG' || data[i].use_cd != 'IR' || data[i].nm != 'UNKNOWN'){
										
										if (item.id == selected_aquifer ){
											$("#aquifer_station").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
										}
										else{
											$("#aquifer_station").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										}
									}
								});
								
							}
					});
				},
				getCounty: function(selected_county){
				
					$("#county_station").empty();
					//$("#county_cd").empty();
					$("#county_station").append('<option disabled>Loading Data please wait...<option>');
					//$("#county_cd").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchcounty",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								
								
								$("#county_station").empty();	
								//$("#county_cd").empty();	
								$("#county_station").append('<option value="">--</option>');	
								//$("#county_cd").append('<option value="">--</option>');	
								$("#adv_county_station").append('<option value="">Search all county</option>');
								$.each (data, function (i,item){
									//console.log(item);
										$("#county_station").append('<option value = '+item.cd+' >'+item.nm+'</option> ');	
										$("#county_cd").append('<option value = '+item.cd+' >'+item.nm+'</option> ');	
										$("#adv_county_station").append('<option value = '+item.cd+' >'+item.nm+'</option> ');	
									
									
										if (item.nm == selected_county){
										//	$("#county_station").append('<option value = '+item.cd+' selected>'+item.nm+'</option> ');	
										}
								/*	if (item.cd == selected_county){
										$("#county_station").append('<option value = '+item.cd+' selected>'+item.nm+'</option> ');	
										//$("#county_station").append('<option value = '+data[i].cd+' selected>'+data[i].nm+'</option> ');	
										//$("#county_cd").append('<option value = '+data[i].cd+' selected>'+data[i].nm+'</option> ');	
									}else if (item.nm = selected_county){
										$("#county_station").append('<option value = '+item.cd+' selected>'+item.nm+'</option> ');	
										//$("#county_station").append('<option value = '+data[i].cd+' selected>'+data[i].nm+'</option> ');	
										//$("#county_cd").append('<option value = '+data[i].cd+' selected>'+data[i].nm+'</option> ');	
									}
									else{
										$("#county_station").append('<option value = '+item.cd+' selected>'+item.nm+'</option> ');	
										//$("#county_station").append('<option value = '+data[i].cd+'>'+data[i].nm+'</option> ');	
										//$("#county_cd").append('<option value = '+data[i].cd+'>'+data[i].nm+'</option> ');	
									}*/
								
								});
								
									$("#county_station").val(selected_county);
									$("#county_cd").val(selected_county);
								
							}
					});
				},
				getState: function(selected_state,mailing_state){
					$("#state_county").empty();
					$("#mstate").empty();
					$("#rstate").empty();
					$("#state_county").append('<option disabled>Loading Data please wait...<option>');
					$("#mstate").append('<option disabled>Loading Data please wait...<option>');
					$("#rstate").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchstate",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#state_county").empty();	
								$("#mstate").empty();	
								$("#rstate").empty();	
								$("#state_county").append('<option value="">--</option>');	
								$("#mstate").append('<option value="">--</option>');	
								$("#rstate").append('<option value="">--</option>');
								$("#adv_state_station").append('<option value="">Search all state</option>');								
								$.each (data, function (i,item){
									/*
									if (item.id == selected_state){
										$("#state_county").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
	
									}else if (item.nm == selected_state){
										$("#rstate").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
									}else if (item.nm == mailing_state){
										
										$("#mstate").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
						
									}
									
								
									else{*/
									
										$("#state_county").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
								
								
										$("#mstate").append('<option value = '+data[i].ab+' data-id='+data[i].id+'>'+data[i].nm+'</option> ');	
										
										$("#rstate").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										$("#adv_state_station").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										
										
									/*}*/
								});
									$("#state_county").val(selected_state);	
									//$('#mstate').val(mailing_state);
									$("#rstate").val(selected_state)
							
									$("#mstate [data-id='"+ mailing_state + "']").attr('selected', 'selected');
									/*	console.log (selected_state,mailing_state)
									$("#rstate option:contains(" + selected_state + ")").attr('selected', 'selected');
									
									console.log (	$("#rstate option:contains(" + selected_state + ")"));
									
									$("#state_county option:contains(" + selected_state + ")").attr('selected', 'selected');*/
								
							}
					});
				},
				getOwner: function(filter,query,elmnt_id){
					var l = 0;
					
					//NProgress.configure({ parent:"#percentage-div"});
					
					$("#"+elmnt_id).empty();
					$("#status-div").empty();
					$("#percentage-div-edit").hide();
					$("#percentage-div").hide();
					$("#status-div").hide();
					$("#status-div-edit").hide();
					$("#status-div").html('');
					$("#status-div-edit").html('');	
								
					$.ajax ({
						   xhr: function () {
								var xhr = new window.XMLHttpRequest();
								var percentComplete =0;
								xhr.upload.addEventListener("progress", function (evt) {
									if (evt.lengthComputable) {
										
										var percentComplete = evt.loaded / evt.total;
										// console.log(percentComplete+'1');
									
										$("#status-div").html(percentComplete + '%');
										$("#percentage-div").progressbar({
											value: percentComplete * 100 
										});
										if (percentComplete === 1) {
											
											$("#status-div").empty();
										
										//	$("#status-div").html('Owner Succesfully loaded');
										//	$("#status-div-edit").html('Owner Succesfully loaded');
										}else{
												
												$("#status-div").show();
										}
									}
								}, false);
								xhr.addEventListener("progress", function (evt) {
									if (evt.lengthComputable) {
										$("#percentage-div-edit").show();
										$("#percentage-div").show();
										$("#status-div").show();
										$("#status-div-edit").show();
										
										var percentComplete = evt.loaded / evt.total;
										// console.log(percentComplete);
										
										$("#status-div").html('Loading ' + (percentComplete *100) + '%');
										$("#status-div-edit").html((percentComplete *100) + '%');
										$('#percentage-div').progressbar({
											value: percentComplete * 100 
										});
										
										$('#percentage-div-edit').progressbar({
											value: percentComplete * 100 
										});
										
										if (percentComplete === 1) {
											
											$("#status-div").empty();
										
											$("#status-div").html('Owner Succesfully loaded');
											$("#status-div-edit").html('Owner Succesfully loaded');
										}
									}
								}, false);
								return xhr;
							},
							TYPE: "GET",
							url: "../json/fetchowner?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list2 =  new Array();
								
								
							
								$.each(data, function(i,item){
										if ($.isNumeric(query) == false){
											list2.push(data[i].nm+ ' ('+data[i].id+')');	
										}else{
											
											list2.push(data[i].id+ ' ('+data[i].nm+')');	
										}
									
									
								});
								
								var isEmpty = list2.length;
									if (isEmpty<1){
										$('#result-table').empty();
										$("#filter").attr("disabled",true);
									}else{
										$("#filter").removeAttr("disabled");
									}
									//console.log(isEmpty);
									 
										 $("#"+elmnt_id).typeahead('destroy');
									
									 
										var list2 = new Bloodhound({
											datumTokenizer: Bloodhound.tokenizers.whitespace,
											queryTokenizer: Bloodhound.tokenizers.whitespace,
											local: list2
										});
									
									$("#"+elmnt_id).typeahead(null, {
									  name: 'list2',
									  limit: 25,
									  source: list2,
										 templates: {
												empty: '<div class="empty-message tt-suggestion" style="padding-left:5px; overflow: hidden; text-overflow: ellipsis;"> No result for : "'+query+'" </div>'
										  }
									  
									});
								//console.log(isEmpty);
								
							
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
								alert("Internal Server Error! (3MC) Please contact the administrator");
							}
							
					});
					//	$("#list-owner").css("width","500px");
				
				},
				getDiverter: function(filter,query,elmnt_id){
					
						//NProgress.configure({ parent:"#percentage-div"});
						
					$("#"+elmnt_id).empty();
					$("#status-div").empty();
					$("#percentage-div-edit").hide();
					$("#percentage-div").hide();
					$("#status-div").hide();
					$("#status-div-edit").hide();
							
					$("#status-div").html('');
					$("#status-div-edit").html('');	
					
					$.ajax ({
						   xhr: function () {
								var xhr = new window.XMLHttpRequest();
								xhr.upload.addEventListener("progress", function (evt) {
									if (evt.lengthComputable) {
									
										var percentComplete = evt.loaded / evt.total;
										// console.log(percentComplete);
										$('#percentage-div').show();
										
										
										$("#percentage-div").progressbar({
											value: percentComplete * 100 
										});
										if (percentComplete === 1) {
										
											$("#status-div").empty();
										
									//		$("#status-div").html('Diverter Succesfully loaded');
										}else{
											
													$("#status-div").hide();
										}
									}
								}, false);
								xhr.addEventListener("progress", function (evt) {
									if (evt.lengthComputable) {
											$("#percentage-div-edit").show();
											$("#percentage-div").show();
											$("#status-div").show();
											$("#status-div-edit").show();
											
											var percentComplete = evt.loaded / evt.total;
											// console.log(percentComplete);
											
											$("#status-div").html('Loading ' + (percentComplete *100) + '%');
											$("#status-div-edit").html((percentComplete *100) + '%');
											$('#percentage-div').progressbar({
												value: percentComplete * 100 
											});
											
											$('#percentage-div-edit').progressbar({
												value: percentComplete * 100 
											});
											
											if (percentComplete === 1) {
												
												$("#status-div").empty();
											
												$("#status-div").html('Diverter Succesfully loaded');
												$("#status-div-edit").html('Diverter Succesfully loaded');
											}
									}
								}, false);
								return xhr;
							},
							TYPE: "GET",
							url: "../json/fetchdiverter?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
							
								var list =  new Array();
								$.each(data, function(i,item){
										if ($.isNumeric(query) == false){
											list.push(data[i].nm+ ' ('+data[i].id+')');	
										}else{
											
											list.push(data[i].id+ ' ('+data[i].nm+')');	
										}
									
									
								});
								
							//	console.log(list,'alex');
								var isEmpty = list.length;
								var isEmpty = list.length;
									if (isEmpty<1){
										$('#result-table').empty();
										$("#filter").attr("disabled",true);
									}else{
										$("#filter").removeAttr("disabled");
									}
									//console.log(isEmpty);
									 $("#"+elmnt_id).typeahead('destroy');
										var list = new Bloodhound({
											datumTokenizer: Bloodhound.tokenizers.whitespace,
											queryTokenizer: Bloodhound.tokenizers.whitespace,
											local: list
									});
									
								$("#"+elmnt_id).typeahead(null, {
									  name: 'list',
									  limit: 25,
									  source: list,
										 templates: {
											empty: '<div class="empty-message tt-suggestion" style="padding-left:5px; overflow: hidden; text-overflow: ellipsis;"> No result for "'+query+'" </div>'
											/*empty: '<div class="empty-message" style="padding-left:5px"> No result for '+t+' '+q+' </div>'*/
										  }
									  
									});
								//console.log(isEmpty);
								
							
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
								alert("Internal Server Error! (4MC) Please contact the administrator");
							}
							
							
					});
				},
				getFacility: function(filter,query){
						NProgress.start();
					
						$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchfacility?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list =  new Array();
								$.each(data, function(i,item){
										if ($.isNumeric(query) == false){
											list.push(data[i].nm+ ' ('+data[i].id+')');	
										}else{
											
											list.push(data[i].id+ ' ('+data[i].nm+')');	
										}
									
									
								});
								
							//	console.log(list,'alex');
								var isEmpty = list.length;
								var isEmpty = list.length;
									if (isEmpty<1){
										$('#result-table').empty();
										$("#filter").attr("disabled",true);
									}else{
										$("#filter").removeAttr("disabled");
									}
									//console.log(isEmpty);
									 $(' #scrollable-dropdown-menu .typeahead').typeahead('destroy');
										var list = new Bloodhound({
											datumTokenizer: Bloodhound.tokenizers.whitespace,
											queryTokenizer: Bloodhound.tokenizers.whitespace,
											local: list
									});
									
									$('#scrollable-dropdown-menu .typeahead').typeahead(null, {
									  name: 'list',
									  limit: 25,
									  source: list,
										 templates: {
													empty: '<div class="empty-message tt-suggestion" style="padding-left:5px; overflow: hidden; text-overflow: ellipsis;"> No result for "'+query+'" </div>'
											/*empty: '<div class="empty-message" style="padding-left:5px"> No result for '+t+' '+q+' </div>'*/
										  }
									  
									});
								//console.log(isEmpty);
								
							
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
								alert("Internal Server Error! (5MC) Please contact the administrator");
							}
							
							
					});
				},
				appendStationDynamic: function(m,o,d,y,owner_nm,diverter_nm,t,facility_id,facility_nm,fac_owner,fac_diverter,isData){
				
					var latitude_dd;
					var longitude_dd;
					var absURL = "";
					// console.log(m,isData);
					if ( t == 'Facility'){
						absURL = "&type=fac&facility="+facility_id+"";
						$("#edit-facility").show();
					}else{
						if (facility_id == null){
							$("#edit-facility ").hide();
						}
						
						
					}
				
					$.ajax ({
						  xhr: function () {
								var xhr = new window.XMLHttpRequest();
								xhr.upload.addEventListener("progress", function (evt) {
									if (evt.lengthComputable) {
									
										var percentComplete = evt.loaded / evt.total;
										// console.log(percentComplete);
										$('#percentage-div').show();
										
										
										$("#percentage-div").progressbar({
											value: percentComplete * 100 
										});
										if (percentComplete === 1) {
										
											$("#status-div").empty();
										
									//		$("#status-div").html('Diverter Succesfully loaded');
										}else{
											
													$("#status-div").hide();
										}
									}
								}, false);
								xhr.addEventListener("progress", function (evt) {
									if (evt.lengthComputable) {
											$("#percentage-div-edit").show();
											$("#percentage-div").show();
											$("#status-div").show();
											$("#status-div-edit").show();
											
											var percentComplete = evt.loaded / evt.total;
											// console.log(percentComplete);
											
											$("#status-div").html('Loading ' + (percentComplete *100) + '%');
											$("#status-div-edit").html((percentComplete *100) + '%');
											$('#percentage-div').progressbar({
												value: percentComplete * 100 
											});
											
											$('#percentage-div-edit').progressbar({
												value: percentComplete * 100 
											});
											
											if (percentComplete === 1) {
												
												$("#status-div").empty();
											
												$("#status-div").html('MPID '+m+' Succesfully loaded');
												$("#status-div-edit").html('MPID '+m+' Succesfully loaded');
											}
									}
								}, false);
								return xhr;
							},
						TYPE: "GET",
						url: "../controller/wells/searchanndata?t=3&year="+y+"&isData="+isData+"&mpid="+m+"&owner="+o+"&diverter="+d+absURL,
						ContentType:"application/json",
						dataType:"json",
						async: "false",
						
						success:function(data){
							
							$.each(data,function(i,item){
								// console.log(item,'alex');
								
									$("#hasDataEdit").val(isData);
									if (t== 'Owner' || t=='Diverter'){
										$("#list-owner-edit").attr("placeholder",item.owner_nm + ' ('+item.owner_id+')');
										$("#list-diverter-edit").attr("placeholder",item.diverter_nm + ' ('+item.diverter_id+')');
										$("#list-owner").attr("placeholder",item.owner_nm + ' ('+item.owner_id+')');
										$("#list-diverter").attr("placeholder",item.diverter_nm + ' ('+item.diverter_id+')');
								
									}else{
										$("#list-owner-edit").attr("placeholder",item.owner_nm + ' ('+item.owner_id+')');
										$("#list-diverter-edit").attr("placeholder",item.diverter_nm + ' ('+item.diverter_id+')');
										$("#list-owner").attr("placeholder",item.owner_nm + ' ('+item.owner_id+')');
										$("#list-diverter").attr("placeholder",item.diverter_nm + ' ('+item.diverter_id+')');
										$(".list-owner-move").attr("placeholder",item.owner_nm + ' ('+item.owner_id+')');
										$(".list-diverter-move").attr("placeholder",item.diverter_nm + ' ('+item.diverter_id+')');
										$("#list-facility").attr("placeholder",item.facility_nm + ' ('+item.facility_id+')' );
									}
									
									
								
								
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
									
									if (item.source_cd != 'GW') {
										$(".hidesw").hide();
									}else{
											$("#hideme").show();
										getJSONData.getDriller(item.driller_nm);
										getJSONData.getAquifer(item.prin_aquifer);
										$("input[name='well_depth']").val(item.well_depth);
										$("input[name='well_depth']").removeAttr('readonly');
									}
									
									
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
									$("input[name='huc2']").val(item.huc2);
								
									latitude_dd = parseFloat(item.latitude_dd);
									longitude_dd = parseFloat(item.longitude_dd);
									
						
									$("input[name='latDMS']").val(item.latitude);
									$("input[name='lngDMS']").val(item.longitude);
									var ConvertedLatLng;
									ConvertedLatLng = usgsWellsMapping.convertToDD(parseInt(item.latitude).toString(),parseInt(item.longitude).toString());
									if (item.latitude_dd == '0' && item.latitude_dd == '0'){
										
										//console.log(ConvertedLatLng);
										$("input[name='latDD']").val(ConvertedLatLng[0]);
										$("input[name='lngDD']").val(ConvertedLatLng[1]);
										$("span[name='lat']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap' >" +  item.latitude+ " / " + ConvertedLatLng[0] + "</a>");
										$("span[name='lng']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap' >"  +  item.longitude+ " / " +ConvertedLatLng[1] + "</a>");
									}else{
										$("span[name='lat']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap' >" +  item.latitude+ " / " + latitude_dd.toFixed(3) + "</a>");
										$("input[name='latDD']").val(item.latitude_dd);
										$("span[name='lng']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap' >"  +  item.longitude+ " / " +longitude_dd.toFixed(3) + "</a>");
										$("input[name='lngDD']").val(item.longitude_dd);
									}
									
								
									$("select[name='power_tp']").val(item.power_tp);
									$("select[name='diversion_meth']").val(item.diversion_meth);
									$("input:radio[name='flow_meter']").val([item.meter_flg]);
									$("input:radio[name='rec_waste']").val([item.rec_waste]);
									
									
									$(".openMap").click(function(e){
										e.preventDefault();
									
										var arrayLatlng =[];
										if (item.latitude_dd == '0' && item.latitude_dd == '0'){
											
											arrayLatlng =[ConvertedLatLng[0],ConvertedLatLng[1]];
										}else{
											arrayLatlng = [item.latitude_dd,item.longitude_dd];
										}
										usgsWellsMapping.QueryData(null,arrayLatlng,'c');
								
									});
									
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
				layer: [2,3,8,9],
				data : [],
				bounds: [],
					
			refreshMap : function (){
				
				map.remove();
			
				usgsWellsMapping.wellMapInit();
				map._resetView([34.746483  , -92.289597], 7, true);
				map.closePopup();
			},
			wellMapInit : function(){
					// $("input['is-advanceSearch']").attr();
					
					L.Marker.prototype.animateDragging = function () {
  
					  var iconMargin, shadowMargin;
					  
					  this.on('dragstart', function () {
						if (!iconMargin) {
						  iconMargin = parseInt(L.DomUtil.getStyle(this._icon, 'marginTop'));
						  shadowMargin = parseInt(L.DomUtil.getStyle(this._shadow, 'marginLeft'));
						}
					  
						this._icon.style.marginTop = (iconMargin - 15)  + 'px';
						this._shadow.style.marginLeft = (shadowMargin + 8) + 'px';
					  });
					  
					  return this.on('dragend', function () {
						this._icon.style.marginTop = iconMargin + 'px';
						this._shadow.style.marginLeft = shadowMargin + 'px';
					  });
					};	
					
					var BaseLayer = L.tileLayer(this.EsriBaseLayer,{attribution:false});
					var satLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {attribution:false}),
						  streetLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false}),
						  topoLayer = L.tileLayer('https://server.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false});
						//  elevLayer = L.tileLayer('https://server.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false});
						  
					
					
					map = L.map('map',{
					  fullscreenControl: true,
					  fullscreenControlOptions: {
						position: 'topleft'
					  }
					  
					  }).setView([34.746483  , -92.289597], 7); /* SET THE VIEW FOCUSED ON LITTLE ROCK,AR*/
						
					var baseLayers = {
						"Sattelite": satLayer,
						"Street": streetLayer,
						"Topographic": topoLayer
					};
			
					
					
					
					L.control.layers(baseLayers).addTo(map);
					L.esri.basemapLayer('Gray',{attribution:false}).addTo(map);
					this.getLayer();
					
					// if (isAdvanceSearch){
						// this.QueryByRadius();
					// }else{
						 // this.getDataFromLayer();
					// }
					var scale = L.control.scale().addTo(map); 

					// Get the label.
					var metres = scale._getRoundNum(map.containerPointToLatLng([0, map.getSize().y / 2 ]).distanceTo( map.containerPointToLatLng([scale.options.maxWidth,map.getSize().y / 2 ])))
					  label = metres < 1000 ? metres + ' m' : (metres / 1000) + ' km';

					
						map.on('click',function(e){
							/* FIX ANNOYING ZOOMING */ 
							
							var zoomFix = this.getZoom();
							if (zoomFix < 13){
								
								zoomFix = 16;
							}
							this.setView(e.latlng, zoomFix)
							usgsWellsMapping.QueryData(e,null,'c');
							
							// usgsWellsMapping.setCircle([e.lat,e.lng] ,radius);
						});
				},
				setCircle : function(latLng, radius){
					
					radius = radius * 1609.34; /*convert miles to kilometers */
					if(!this.circle) {
						this.circle = L.circle(latLng, radius, {
							color: 'black',
							fillColor: 'white',
							fillOpacity: 0.3,
							strokeOpacity:0.1
						}).addTo(map);
					}
					else {
						
							this.circle.setLatLng(latLng);
							this.circle.setRadius(radius);
							this.circle.redraw();	
					}
					
					
					map.fitBounds(this.circle.getBounds());
					map.zoomIn(7);
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
						  opacity : 0.2,
						  minZoom : 12,
						  fillColor:'none',
						  strokeColor:'black',
						  weight:'0.5',
						  maxZoom :18
						}).addTo(map);
				},
				
				
				getDataFromLayer: function(e,input,type,radius){
						map.closePopup();
						
						// console.log(e,input,type,radius);
						
					
							var defaultNomralZoomLevel = 12;
							var getCurrentZoomLevel = map.getZoom();
							var zoomLevel = 7;
							

							if (zoomLevel == getCurrentZoomLevel){
								
								if (radius == 5){
										zoomLevel = (defaultNomralZoomLevel-1);
										
									}else if (radius == 10){
										zoomLevel = (defaultNomralZoomLevel-3);
										
									}else if (radius == 25){
										zoomLevel = (defaultNomralZoomLevel-6);
										
									}
									else if (radius == 50){
										zoomLevel = (defaultNomralZoomLevel-5);
										
									}
							}else{
								if (getCurrentZoomLevel < 7 || getCurrentZoomLevel >10){
									
									
									if (radius == 5){
										zoomLevel = (defaultNomralZoomLevel-1);
										
									}else if (radius == 10){
										zoomLevel = (defaultNomralZoomLevel-3);
										
									}else if (radius == 25){
										zoomLevel = (defaultNomralZoomLevel-6);
										
									}
									else if (radius == 50){
										zoomLevel = (defaultNomralZoomLevel-9);
										
									}
								
									
								}
							}
							
						
							
						
							//console.log(null,i);
							var  lat= input[0];
							var lng = input[1];
							var k = [];
							var lngneg;
								if (input[1] < 1){
									lngneg = parseFloat(input[1]);
								
								}else{
									lngneg = parseFloat((input[1])*-1);
									
								}
								var k = [lat,lngneg]
							
							if(lat.indexOf('.') !== -1 && lng.indexOf('.') !== -1)
							{
								

								if (type == "adv"){
									usgsWellsMapping.setCircle(k,radius);
	
									map.setView(k, zoomLevel);
								}else{
									usgsWellsMapping.QueryData(null,k,'s');
									map.zoomIn(15);
								}
							
								map.panTo(k);
							}else{
								
								if (lat.toString().length<7 && lng.toString().length <7){
									var newInput = this.convertToDD(lat,lng)
									if (type == "adv"){
										usgsWellsMapping.setCircle(newInput,radius);
										map.setView(newInput, zoomLevel);
									}else{
										usgsWellsMapping.QueryData(null,newInput,'s');
										map.zoomIn(15);
									}
									
									map.panTo(newInput);

								}else{
									alert('Invalid Input. Lat/lng in DMS should not be more than 7 characters long!');
									map.closePopup();
								}
								
								
							}

							
							
					
					
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
					DDLat = DDLat.toFixed(6); 
					
					DDLng = parseFloat((DegreeLng+DDLngMS)*-1);
					DDLng = DDLng.toFixed(6); 
					return [DDLat,DDLng];
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
				removeEverything: function(){
					
				},
				advanceSearch: function (type,latLng,radius){
				
							var adv_range = $("#adv-range").val();
							var adv_township = $("#adv-township").val();
							var adv_section = $("#adv-section").val();
							var adv_range_direction = $("#adv-range-direction").val();
							var adv_township_direction = $("#adv-township-direction").val();
							var radius = $("#adv-search-by-radius").val();
							var lat = $("#adv-lat").val();
							var lng = $("#adv-lng").val();
							var county_select_domtxt= $("#adv_county_station :selected");
							var county = [];
							   
							
							
							// console.log(county_select_domtxt);
							if (adv_range != "" && adv_township != ""){
								adv_range  = adv_range+' '+adv_range_direction;
								adv_township= adv_township+' '+adv_township_direction;
									
								usgsWellsMapping.getSectionTownshipRange(adv_range,adv_section,adv_township);
								
							}else if (lat != "" && lng !=""){
							
								usgsWellsMapping.getDataFromLayer(null,[lat,lng],"adv",radius);
							}else if (county_select_domtxt !=""){
								
								county_select_domtxt.each(function(i, selected){ 
									county[i] = $(selected).text(); 
									
								});
								// console.log(county);
								usgsWellsMapping.getCounty(county);
								
							}
				
				
						
					var adv_form = $('#adv-form :input').filter(function(index, element) {
									return $(element).val() != '';
								});
					 // Find disabled inputs, and remove the "disabled" attribute
					var disabled = adv_form.find(':input:disabled').removeAttr('disabled');
					$("#adv-section").removeAttr('disabled');

					 // serialize the form
					var data = adv_form.serialize();
						// console.log(data);
					$("#adv-section").attr('disabled',true);
					 // re-disabled the set of inputs that you previously enabled
					
					$.ajax({
						type: 'GET',
						url: '../controller/wells/advance_search?'+data,
						ContentType:"application/json",
						dataType:"json",
						async: "false",
						success:function(data){
							
							
							if ($.trim(data)){
								if (type == "toMap"){
									usgsWellsMapping.advanceSearchToMap(data);
								}else if (type =="toTable"){
									usgsWellsMapping.advanceSearchToTable(data);
								}else{
									usgsWellsMapping.advanceSearchToCSV(data);
								}
							}
							
						},error:function(err,resp){
							alert('Data Unavailable');
						}

					});
					disabled.attr('disabled','disabled');
				
				},
				advanceSearchToMap : function (data){
				
					var iconURL;
				

						// Update X and Y based on zoom level
						var x= 20; //Update x 
						var y= 30; //Update Y      

									
						iconURL = L.icon({
											iconUrl: '../includes/css/img/marker-icon-red.png',
											iconSize:     [x,y]
									});
									
						var theMarker;
							var markers = new L.markerClusterGroup();
							// var markers = new L.LayerGroup();
							
							/** OMG I DID IT AFTER 55 YEARS I FINALLY FIGURED IT OUT */
							if (markers != undefined){
								var isLayerexist;
								map.eachLayer(function (layer) {
									
									if (layer instanceof L.Marker ) {
											
										isLayerexist =true;				
									}else{
										isLayerexist =false;			
									}
									if (isLayerexist){
										map.removeLayer(layer);
									}
								});
							
							 }
							 var wyear = $("#advance-search-the-year").val();
							 $.each (data,function(i,item){
								 
								var wyear = $("#advance-search-the-year").val();
						
							
								// var latlng = usgsWellsMapping.convertToDD(item.LATITUDE,item.LONGITUDE);
								var latlng = [item.LATITUDE_DD,item.LONGITUDE_DD];
								// console.log(latlng);
								
								
								var latdd ;
								var lngdd;
								if (item.LATITUDE_DD == 0 || item.LONGITUDE_DD == 0){
									latdd = latlng[0];
									lngdd = latlng[1];
								}else{
									latdd = item.LATITUDE_DD;
									lngdd = item.LONGITUDE_DD;
									
								}		
								
								var url = item.MPID+','+wyear+','+item.DIVERTER_ID+','+item.OWNER_ID;
											var rawUrl = 'thempid='+item.MPID+'&'+'type='+item.TYPE+'&';
											
											var rData =
											item.data == 'Yes' ? rData = item.data+' (<a id="edit-anndata" onClick="return usgsWellsMapping.edit('+url+');"> Edit Annual Data </a>)' 
											: rData = item.data + ' (<a id="add-anndata" onClick="return usgsWellsMapping.add(null);"> Add Annual Data </a>)';
											var k1 = '1';	
											
											var rPayment = 
											item.PAID == 'Yes' ? rPayment = item.PAID+' (<a id="edit-anndata" onClick="return usgsWellsMapping.edit('+url+',null,'+k1+');"> Edit Payment </a>)' 
											: rPayment = item.PAID + ' (<a id="add-anndata" onClick="return usgsWellsMapping.edit('+url+',null,'+k1+');"> Add Payment </a>)';
											
											
											
											var content = 'Information for MPID: <strong> '+item.MPID+ '</strong><br />\
															<hr>\
															<strong>  Water Year : </strong>'+wyear+'<br /><br /> \
															<strong>  Paid  : </strong>'+item.PAID+'<br /> \
															<strong>  Diverter: </strong>'+item.DIVERTER_NM+'('+item.DIVERTER_ID+') <br />\
															<strong>  Owner: </strong>'+item.OWNER_NM+'( '+item.OWNER_ID+')<br />\
															<strong>  Source Type: </strong>'+item.SOURCE_CD+'<br />\
															<strong>  Action: </strong>'+item.ACTION_CD+'<br />\
															<strong>  County: </strong>'+item.COUNTY_NM+' ('+item.COUNTY_CD+')<br />\
															<strong>  State: </strong>'+item.STATE_NM+' ('+item.STATE_CD+')<br />\
															<strong>  Section: </strong>'+item.SECTION+' <br />\
															<strong>  Township: </strong>'+item.TOWNSHIP+' <br />\
															<strong>  Range: </strong>'+item.RANGE+' <br />\
															<strong>  Latitude (Decimal Degree): </strong>'+item.LATITUDE_DD+'<br />\
															<strong>  Latitude (DMS): </strong>'+item.LATITUDE+'<br />\
															<strong>  Longitude (Decimal Degree): </strong>'+item.LONGITUDE_DD+'<br />\
															<strong>  Longitude (DMS): </strong>'+item.LONGITUDE+'<br /><br /> \
															<strong>  Longitude (DMS): </strong>'+item.LONGITUDE+'<br /><br /> \
															<a id="edit-mpid" onClick="return usgsWellsMapping.edit('+url+','+k1+',null);"> View/Edit this Meas. Pt. </a> <br />\
																	';
							
								
								
									theMarker = L.marker(latlng,{icon: iconURL})
												.openPopup()
												.on('click',onClick); 	
									markers.addLayer(theMarker);
									function onClick(event) {
										event.target.bindPopup(content);
										
									}	
									
							 });
							 map.addLayer(markers);
							
				},
				advanceSearchToTable : function (data){
					// alert('1');
					$('#the-modal').modal('show');
					
					
					$("#the-anndata").append('<thead>\
																			<tr>\
																			<th class="disable-sorting"><a hred="#" id="refresh-me"><i class="fa fa-refresh" aria-hidden="true" ></i> </a></th>\
																			<th class="disable-sorting">Count</th>\
																			<th class="sort">MPID  </th>\
																			<th class="sort">Diverter </th>\
																			<th class="sort">Owner </th>\
																			<th class="sort">Facility </th>\
																			<th class="sort">Use Type  </th>\
																			<th class="sort">Paid  </th>\
																			<th class="sort">Data  </th>\
																			<th class="sort">Local Description  </th>\
																			<th class="sort">Action  </th>\
																			<th class="sort">County  </th>\
																			<th class="disable-sorting">\
																						<select class="multi">\
																								<option value="p"> Multi-payment </option>\
																								<option value="m"> Multi-move </option>\
																						</select>  <a href="#" class="tool-tip" data-toggle="tooltip" title="you must pick 2 or more MPID to use Multi-payment/Mult-move"> [?]</a> <input type="checkbox" id="checkboxall"> </th>\
																			<th class="disable-sorting"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>\
																			</tr>\
																			</thead>');
																			
						$.each(data,function(i,item){
								linkify = item.data == 'Yes' ? linkify = '<a href="https://wise.er.usgs.gov/'+$dir+'/wells/measpt?type='+t+'&mpid='+item.mpid+'&year='+y+'&diverter='+item.diverter_id+'&owner='+item.owner_id+'&isData='+item.data+'" target="__blank">'+item.mpid+'</a>' : linkify = item.mpid;
											isData = item.data;
								$("#the-anndata").append('<tbody>\
																			<tr> \
																			<td><input type="radio" value='+item.MPID+' id="the-mpid'+i+'" class="the-mpid" name="thempid"/></td>\
																			<td>'+ctr+'. </td>\
																			<td>'+linkify+'</td>\
																			<td>'+item.DIVERTER_NM+'('+item.DIVERTER_ID+')</td>\
																			<td>'+item.OWNER_NM+'('+item.OWNER_ID+')</td>\
																			<td>'+item.FACILITY_NM+'('+item.OWNER_ID+')</td>\
																			<td>'+item.USE_CD+' '+item.FACILITY_ID+'</td>\
																			<td>'+isPaid+'</td>\
																			<td>'+isData+'</td>\
																			<td>'+item.LOCAL_DESC+'</td>\
																			<td>'+item.ACTION+'</td>\
																			<td>'+item.COUNTY_NM+' ('+item.COUNTY_CD+')</td>\
																			<td><input type="checkbox" value= "'+item.MPID+'" id="payment-mpid'+i+'" class="mp-mpid"  '+disableMultiPayment+' data="'+isData+'" data-id="'+i+'"/></td>\
																			<td><a href="#quick-edit-mpid" id="quick-edit'+i+'">Edit  <a href="#" class="tool-tip" data-toggle="tooltip" title="edit a MPID"> [?]</a>  </a></td>\
																			<td><input type="hidden" id="diverter_id'+i+'" value="'+item.DIVERTER_ID+'"></td>\
																			<td><input type="hidden" id="owner_id'+i+'" value="'+item.OWNER_ID+'"></td>\
																			<td><input type="hidden" id="facility_id'+i+'" value="'+item.FACILITY_ID+'"></td>\
																			<td><input type="hidden" id="hasData'+i+'" value="'+isData+'"></td>\
																			</tr>\
																		</tbody>');
								
						});													
				},
				removeMakers : function (markers){
					 map.removeLayer(markers);
				},
				getSectionTownshipRange: function (range,section,township){
					
					var section;
					var idRemove = [];
					var query = L.esri.query({
							url:'https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/9'
						});
				
					var whereQuery;
					var rangeQuery;
					var sectionQuery;
					var townshipQuery;
					
					rangeQuery = range != "" ? "RANGE = '"+range+"'" : range = '';
					sectionQuery = section != "" ? " AND SECTION_ = '"+section+"'" : section = '';
					townshipQuery = township != "" ? " AND TOWNSHIP = '"+township+"'" : township = '';
					
					whereQuery = rangeQuery+sectionQuery+townshipQuery;
			
					
					var latLng;
					
					/** THIS IS ONLY TO REMOVE THE PERSISTENT LAYER */
					query.where(whereQuery).bounds(function(error, latLngBounds, response){
						// usgsWellsMapping.refreshMap();
					
						if (error){
							alert("Invalid Range/Township/Section.");
							// map.eachLayer(function (layer) {
								// if (layer._zooming == false && layer._leaflet_id != '41' && layer._leaflet_id != '42'){
									 // map.removeLayer(layer);
								// }							
							// });
						
						
						}else{
							 // $("#lat-NE").val(latLngBounds._northEast.lat);
							 // $("#lng-NE").val(latLngBounds._northEast.lng);
							 // $("#lat-SW").val(latLngBounds._southWest.lat);
							 // $("#lng-SW").val(latLngBounds._southWest.lng);
					
							map.fitBounds(latLngBounds);
							
							var defaultNomralZoomLevel = 12;
							var getCurrentZoomLevel = map.getZoom();
							var zoomLevel;
							
							
							
							if (defaultNomralZoomLevel == getCurrentZoomLevel){
								zoomLevel = 1;
								
							}else{
								if (getCurrentZoomLevel < 7 || getCurrentZoomLevel >10){
									
									zoomLevel = defaultNomralZoomLevel;
								}
							}
								
								
							map.zoomIn(zoomLevel);
							// console.log(getCurrentZoomLevel,zoomLevel);
							
						}
						
					});
					var labels = {};
					
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
						console.log(label);
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
				},
				getCounty: function (county){
					
					var isLayerexist;
								map.eachLayer(function (layer) {
									// console.log(layer instanceof L.CircleMarker);
									if (layer instanceof L.Marker  || layer instanceof L.CircleMarker) {
												
										isLayerexist =true;				
									}else{
										isLayerexist =false;			
									}
								
									if (isLayerexist){
										map.removeLayer(layer);
									}
								});

					var countyQuery = " COUNTY_NAM IN (";
					
					// console.log(county);
					
					 for (var i=0; i<county.length; i++){
						// console.log(county[i]);
						countyQuery += "'"+county[i]+"',";
					 }
					 countyQuery =  countyQuery.replace(/(^[,\s]+)|([,\s]+$)/g, '');
					 countyQuery  = countyQuery+")";
					 
					 
					 
					var labels = {};
					var countyBoxes = L.esri.featureLayer({
						url:'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8',
						minZoom : 7,
						maxZoom :18,
						color:'black',
						fillColor: 'green',
						weight:0.1,
						where:countyQuery
					}).addTo(map);
					
					
					  // console.log(countyBoxes);
						var idRemove = [];  
					countyBoxes.on('createfeature', function(e){
						
						var id = e.feature.id;
						var feature = countyBoxes.getFeature(id);
						// console.log(e);
						var center = feature.getBounds().getCenter();
						console.log(center);
						idRemove.push(e.feature.id);
						var label = L.marker(center, {
						  icon: L.divIcon({
							iconSize: null,
							className: 'label',
							html: '<div style="color:black; weight:0.3; font-size:20px">' + e.feature.properties.county_nam+ '</div>'
						  })
						}).addTo(map);
						labels[id] = label;
					  });
						
					  countyBoxes.on('addfeature', function(e){
						var label = labels[e.feature.id];
						if(label){
						  label.addTo(map);
						}
						
					  });

					  countyBoxes.on('removefeature', function(e){
						var label = labels[e.feature.id];
						
						if(label){
						  map.removeLayer(label);
						}
					  });
				},
				QueryData : function(e,input,c){
					// console.log('1', input);
					// var isLayerexist;
					// map.eachLayer(function (layer) {
						// if (layer instanceof L.Marker || layer instanceof L.CircleMarker) {
								
							// isLayerexist =true;				
						// }else{
							// isLayerexist =false;			
						// }
						// if (isLayerexist){
							// map.removeLayer(layer);
						// }
					// });
					// usgsWellsMapping.refreshMap();
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
						
						
					}
					boundary = L.esri.query({
										url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8'
								});
								boundary.nearby(latlng,1);
								boundary.run(function(error,featureCollection,response){
									isBound = featureCollection.features.length;
								
								if (isBound ==1){
									$.each(usgsWellsMapping.layer,function(i,item){
										// console.log(item);
										var url = 'https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/'+item
										
										var dynamicQuery =L.esri.query({
													url:url,
													returnGeometry:false
											});
										dynamicQuery.nearby(latlng,1);
										dynamicQuery.run(function(error,featureCollection,response){
											
											if(featureCollection !=null || featureCollection != "undefined"){
											
												if (item == '2'){
													quad_nm = featureCollection.features[0].properties.quad_name;
													$("#quad_nm").val(quad_nm);
													
												}else if (item =='9'){
												
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
													console.log(featureCollection,'alex');
													
													huc2 = featureCollection.features[0].properties.HUC12;
													
													huc2  = huc2.slice(0,-4);
													
													$("#huc2").val(huc2);
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
												
													huc2  = huc2.slice(0,-4);
													
													$("#huc2").val(huc2);	
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
									var huc2 = $("#huc2").val();
									

									var x;
											// console.log(elevlat);	
									var elevlatDMS = usgsWellsMapping.convertToDMS(elevlat);
									var elevlngDMS = usgsWellsMapping.convertToDMS(elevlng);
									
									$("#latDMS").val(elevlatDMS);
									$("#lngDMS").val(elevlngDMS);
								
									if (quad1 !='' && section1 !='' && range1 !='' && township1 !='' /*&&lat !='' && lng !='' */&& direction1 !='' && county1 !='' && huc2 !='' && elevation1 !=''){
									
											var linktoAppend = '<a href="#" id="assoc" onClick="return usgsWellsMapping.appendData();"> Use this Information </a>';
											content = 'Information for County: <strong>'+county1+'</strong>\
															<br>\
															Latitude: <strong>'+lat1+'</strong>\
															<br>\
															Longitude: <strong>'+lng1+'</strong>\
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
															HUC: <strong>'+huc2+'</strong>\
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
				
				appendData : function(){
									var quad1 = $("#quad_nm").val();
									var onefourth1 = $("#onefourth").val();
									var section1 = $("#section").val();
									var range1 = $("#range").val();
									var township1 = $("#township").val();
									var latDD = parseFloat($("#lat").val());
									var lngDD = parseFloat($("#lng").val());
									var direction1 = $("#direction").val();
									var elevation1 = $("#elevation").val();
									var county1 = $("#county2").val();
									var huc2 = $("#huc2").val();
									var latDMS = $("#latDMS").val();
									var lngDMS = $("#lngDMS").val();
									//console.log(huc2);
									$('#the-modalMap').modal('hide');
									$("body").addClass("modal-open");
								
									$('#county_station option:contains('+county1.toUpperCase()+')').attr('selected', true);
									$('input[name="county_cd"]').val(county1); ///.pro('selected',true);
									$('#aHuc_station').text(huc2);
									$('input[name="huc2"]').val(huc2);
									$('#stat-section').val(section1);
									$('#stat-township').val(township1);
									$('#stat-range"]').val(range1);
									
									/* convert lat long */
									/* LAT */
									
									
									$("span[name='lat']").empty();
									$("span[name='lat']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" + latDMS + " / " + latDD.toFixed(3)  + "</a>");
									$("input[name='latDMS']").val(latDMS);
									$("input[name='latDD']").val(latDD);
									/* LNG */
									
									$("span[name='lng']").empty();
									$("span[name='lng']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" +  lngDMS + " / " +lngDD.toFixed(3) + "</a>");
									$("input[name='lngDMS']").val(lngDMS);
									$("input[name='lngDD']").val(lngDD);
							
									$('input[name="elevation"]').val(elevation1);

									$('#mpid-span').text(latDMS+lngDMS+'01');
								
									// $("input[name='mpid-new']").val(latDMS+lngDMS+'01');
								
									
									
				}
		}

$(document).on('show.bs.modal', '.modal', function (event) {
		var zIndex = 1040 + (10 * $('.modal:visible').length);
         $(this).css('z-index', zIndex);
          setTimeout(function() {
               $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
});
var functionDone = false;

function checkRefreshMe(){
		
		// console.log('check');
		 // var x = setInterval(function(){
			var r = $("#refresh-me-bro").val();
	
				if (r){
					refreshMe(r);
					 $("#refresh-me-bro").val('');		
					clearInterval();
					
							
				}
		
		// }, 500,(0));
		// functionDone = true;	
		//clearInterval(x);
	
}
function refreshMe(r){
	if (r){
		var t= $("#just-ignore-me").val();
									var q= $("#just-ignore-me-too").val();
									
									var clickedmeyear = false;
									var z = $("input[name='typeid']").is(":checked") ;

									if (z){
										var z_id = $("input[name='typeid']:checked").attr("data-id");
										if (z_id == 'all'){
												z= "";
										}else{
											
											if (t == 'Diverter'){
												t= 'Owner2';
												typeWords = 'Diverter';
												/*q =z_id;
												z_id  = q;*/
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
											//	console.log($("#the-anndatacenter"));
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}else if (t == 'Owner'){
												t = 'Diverter2';
												typeWords = 'Owner';
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}	
										}
									}
									
										var y = $("#the-year").val();
										var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
										

										var a = $("#isAbandoned").is(":checked") ? a ='ab' : a = 'no';
										var o = $("#type-nm-2").val();
									
										$("#year").val(y);
										
										//var o = $("input[name='typeid'").val();
								
										getMPID(t,q,null,y,f,o,a,"yes",z_id);
	}
	
}
function getNextMPID(){
	
	// console.log('get');
	
		 // var x = setInterval(function(){
			
			
			var r = $("#next-mpid-bro").val();
			var success = false;
				if (r){
				
					$("#the-mpid"+r).attr("checked","checked");
					var z = parseInt(r);
					var selected = parseInt(z+1);
					$("#selected-mpid-bro").val(selected);
					$("#next-mpid-bro").val("");
					
					openAnnData(r);
					clearInterval();
				}
				// if (success == true){
					
					 // console.log(arr[id]);
						
				
					
						// clearInterval(setTimer1);
						// 
					// success= false;
				// }	
		
		 // }, 300, (1));
		 // functionDone = true;		
}

function openAnnData(r){
	if (r){
			  $("#form-add-data").attr("action","https://wise.er.usgs.gov/"+$dir+"/wells/add_anndata");
						$("#form-add-data").attr("method","GET");
						$("#ayy").val("Wells 3.0 Add New Measurement Point");
						$("#form-add-data").submit();
	}
}
$(document).ready(function(){
	yearfromddl();
	init();
	
	 // checkRefreshMe();
	 // getNextMPID();
				
			// arr = Array();
		// arr[0] = "hi";
		// arr[1] = "bye";
		setTimer0 = setInterval(function(id){
		   //console.log(arr[id]);
		   checkRefreshMe();
		},500,(0));
	
		setTimer1 = setInterval(function(id){
		//  console.log(arr[id]);
		  getNextMPID();
		},300,(1));
	
$("#source_cd_station").on('change',function(){
						
						var source_cd  = $(this).val();
						console.log(source_cd);
						if (source_cd == 'GW'){
							$("#hideme").show();
							$("input[name='well_depth']").addClass("required");
							$("input[name='well_depth']").removeAttr("readonly");
							
							$("#driller").addClass("required");
							$("#date-drilled").addClass("required");
							$(".driller-imp").show();
							$(".hidesw").show();
							getJSONData.getDriller();
							getJSONData.getAquifer();			
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

	$('[data-toggle="tooltip"]').tooltip();   
	getJSONData.initData();
	
	/* FOR ADVANCE SEARCH */
	$(".multiple_select").select2({ 
									width: "300px" ,
									placeholder: "Please select option"
									});
	$(".select2-search__field").css("width","150px");
	
	// $("#adv-search").hide();
	
	$("#advance-search-view-data-tbl").hide();
	 usgsWellsMapping.wellMapInit();
	$("#advance-search-view-data-tbl").hide();
	$("#advance-search").click(function(e){
		$("#advance-search-view-data-tbl").show();
		$("#the-modalMap .modal-content").css("height","925px");
		$("#map").css("height","660px");
	});
	 $("#advance-search-modalMap").click(function(e){
		 e.preventDefault();
		 
		 
		  $("#advance-search-load").show();
		  $("#advance-search-view-data-tbl").show();
		  var radius = $("#adv-search-by-radius").val();
		  var latitude = $("input[name='latitude']").val();
		  var longitude = $("input[name='longitude']").val();
		  if (radius){
			 if (latitude =="" && longitude ==""){
				 alert("Latitude and Longitude must not be null! Please select 'All' on the 'Look for well within (Radius)' option to continue searching");
				 return false;
			 }
			  
		  }
		 
		   usgsWellsMapping.advanceSearch("toMap");
	 });
	  $("#advance-search-view-data-tbl, #advance-search-table").click(function(e){
		 e.preventDefault();
		
		 
		  $("#advance-search-load").show();
		  $("#advance-search-view-data-tbl").show();
		  var radius = $("#adv-search-by-radius").val();
		  var latitude = $("input[name='latitude']").val();
		  var longitude = $("input[name='longitude']").val();
		  if (radius){
			 if (latitude =="" && longitude ==""){
				 alert("Latitude and Longitude must not be null! Please select 'All' on the 'Look for well within (Radius)' option to continue searching");
				 return false;
			 }
			  
		  }
		 
		   usgsWellsMapping.advanceSearch("toTable");
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
	
	$(".adv-imprnt").on("keypress keyup",function (e) {    
		$(this).val($(this).val().replace(/[^\d].+/, ""));
		if (e.shiftKey)
			 e.preventDefault();
			else {
			 var nKeyCode = e.keyCode;
			 //Ignore Backspace and Tab keys!!!!!
			 /* FOR FIREFOX AND IE !!!>:/ */
			 if (nKeyCode == 8 || nKeyCode == 9)

			  return;

			 if (nKeyCode < 95) {
			  if (nKeyCode < 48 || nKeyCode > 57)
			   e.preventDefault();
			 } else {
			  if (nKeyCode < 96 || nKeyCode > 105)
			   e.preventDefault();
			 }
			}
	});
	
	   
			
			
	$("#this-tomap").click(function(){
				var lat= $("#the-lat").val();
				var lng= $("#the-lng").val();
				
				if (lat != "" && lng != ""){
					var latlng= [lat,lng];
					usgsWellsMapping.getDataFromLayer(null,latlng,null);
					
				}
				if (lat == "" || lng == ""){
					alert("Lat or Long should not be blank");
					map.closePopup();
				}
		});
		

	$('#the-modalMap').on('shown.bs.modal', function() {
		map.invalidateSize();
		
	});
	$('#the-modalMap').on('hidden.bs.modal', function () {
		 $("body").addClass("modal-open");
		
	});
	$('#advance-search-modal').on('hide.bs.modal', function () {
		 $("body").addClass("modal-open");
		$("#adv-form").trigger("reset");
	});
	
	$('#quick-edit-mpid').on('hidden.bs.modal', function () {
		 $("body").addClass("modal-open");
	});
	$("#add-new-anndata").hide();
//	$("#modify-mpid").hide();
	var clickedmeyear= false;
	var clickedmemethod = false;
	$('#the-modal').appendTo("body");
	$("#filter").attr("disabled","true");
	$("#result-table").hide();
	var searchLabel = $("#searchLabel");
	var searchQuery = $("#search-box");
	

	
	$(".select-type").click(function(){
		
	
		
		var text = $.trim($(this).text());
		var OandD = 	$("#OandD").html();
		// console.log(text);
		switch (text){
		
			case 'Diverter':
				searchLabel.html('Diverter');	
				
				$('.typeahead').typeahead('destroy')
				searchQuery.removeAttr("disabled");
			break;	
			
			case 'Owner':
				searchLabel.html('Owner');
				$('.typeahead').typeahead('destroy')
				searchQuery.removeAttr("disabled");
			break;
			
			case 'Facility':
			
				searchLabel.html('Facility')
				$('.typeahead').typeahead('destroy')
				searchQuery.removeAttr("disabled");
				
			break;
			
			case 'MPID':
				searchLabel.html('MPID')
				$('.typeahead').typeahead('destroy')
				searchQuery.removeAttr("disabled");
			break;
			
			default:
				searchLabel.html('Diverter')
				$('.typeahead').typeahead('destroy')
				
			break;
		}
		
	});


	
	var progress = false;
	$("#filter").click(function(){
		NProgress.start();	
		var type = searchLabel.text();
		var query = encodeURIComponent(searchQuery.val());
		
		/*
	
		if (type =='Select Type' && query == "" ){
			alert("Please select a Type and Input a Name or an ID Number");
				NProgress.done();
		}else if (query == ""){
			alert("Please Input a Name or an ID Number")
				NProgress.done();
		}else if (type =='Select Type' ){
			alert("Please Select Type");
				NProgress.done();
		}else{
			/*
			if (type !='MPID'){
				appendInfo(type,query);
			}else{
				getMPID(type,query);
			}
		}
		*/
		
		if (query == ""){
			alert("Please Input a Name or an ID Number")
			NProgress.done();
		}else{
			if (type !='MPID'){
				appendInfo(type,query);
			}else{
				appendInfo(type,query);
				//getMPID(type,query);
			}
		}
			
		
		
	});
	
	
	$('a').click(function(e){
		e.preventDefault();
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
	
		
	$("#the-form").change(function(){

		
		clickedmeyear = true;
		
		var t= $("#just-ignore-me").val();
		var q= $("#just-ignore-me-too").val();
		
		var clickedmeyear = false;
		var z = $("#type-id-2").val() ;

		// if (z){
			// var z_id = $("input[name='typeid']:checked").attr("data-id");
			// if (z_id == 'all'){
					// z= "";
			// }else{
				
				
			// }
		// }
		
		if (z){
			// if z has value get change diverter to owner2 and owner to diverter2 
			if (t == 'Diverter'){
					t= 'Owner2';
					typeWords = 'Diverter';
					/*q =z_id;
					z_id  = q;*/
					z_id = q;
					q = $("input[name='typeid']:checked").attr("data-id");
				//	console.log($("#the-anndatacenter"));
					//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
				}else if (t == 'Owner'){
					t = 'Diverter2';
					typeWords = 'Owner';
					z_id = q;
					q = $("input[name='typeid']:checked").attr("data-id");
					//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
				}	
		}else{
		
			//if z is null ignore the paramets set it back to default
			var z_id = $("input[name='typeid']:checked").attr("data-id");
			if (z_id == "all"){
				z_id ="";
			}
		}
		
			var y = $("#the-year").val();
			var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
			

			var a = $("#isAbandoned").is(":checked") ? a ='ab' : a = 'no';
			var o = $("#type-nm-2").val();
		
			$("#year").val(y);
			
			//var o = $("input[name='typeid'").val();
		
			getMPID(t,q,null,y,f,o,a,"yes",z_id);
		
	
	
		
		$("#add-new-anndata").hide();
		$("#modify-mpid").hide();
	});
	

	$("#method").val("E");
	$("#the-method").change(function(){
		var b = $(this).val();
		clickedmemethod= true;
		$("#method").val(b);
	});
	
	
	var multipayment = false;
	
	$("#add-new-mpid").click(function(){
		$("#form-add-data").attr("action","https://wise.er.usgs.gov/"+$dir+"/wells/add_mpid");
		$("#form-add-data").attr("method","GET");
		$("#ayy").val("Wells 3.0 Add New Measurement Point");
		multipayment= false;
	});
	
	$("#show-map").click(function(){
		$("#form-add-data").attr("action","https://wise.er.usgs.gov/"+$dir+"/wells/map");
		$("#form-add-data").attr("method","GET");
		$("#ayy").val("Wells 3.0 Map Viewer");
		
		multipayment= false;
	});
	
	
	$("#add-new-anndata").click(function(){
		var tt= $("#just-ignore-me").val();
		
		if (tt !='Facility'){
			$("#form-add-data").attr("action","https://wise.er.usgs.gov/"+$dir+"/wells/add_anndata");
			$("#form-add-data").attr("method","GET");
			$("#ayy").val("Wells 3.0 Add New Annual Data");
			multipayment= false;
		}else{
			$("#form-add-data").attr("action","https://wise.er.usgs.gov/"+$dir+"/wells/facility_anndata");
			$("#form-add-data").attr("method","GET");
			$("#ayy").val("Wells 3.0 Add New Facility Annual Data");
		}
		
	});
	$("#add-new-multipayment").click(function(){
		$("#quick-multipayment").modal('show');
		multipayment= true;
	});
	$("#add-new-multimove").click(function(){
		$(this).attr("style","padding-right:150px");
		$("#quick-multimove").modal('show');
		multipayment= true;
	});
	$("#modify-mpid").click(function(){
		$("#form-add-data").attr("action","https://wise.er.usgs.gov/"+$dir+"/wells/editmpid");
		$("#form-add-data").attr("method","GET");
		multipayment= false;
	});
	
	$("#form-add-data").submit(function(e){
		e.preventDefault();
		
		s = $(this).serialize();
		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var title = $("#ayy").val();
		url =  url+'?'+s;
		
		$.ajax ({
			
			TYPE: method,
			url: url,
			success:function(){
				
					h = 850;
					w = 1500;
					 // Fixes dual-screen position                         Most browsers      Firefox
					 // Fixes dual-screen position                         Most browsers      Firefox
					 // Fixes dual-screen position                         Most browsers      Firefox
					var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
					var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

					var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
					var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

					var left = ((width / 2) - (w / 2)) + dualScreenLeft;
					var top = ((height / 2) - (h / 2)) + dualScreenTop;
					var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

					// Puts focus on the newWindow
					if (window.focus) {
						newWindow.focus();
					}
						
					$("#refresh-me-bro").val("");
				
			
			},
			error:function(err){
				console.log(err);
				alert('There is something wrong!! Please contact the Admins');
			}
		});
		   //window.open("https://wise.er.usgs.gov/wateruse/wells/add_mpid", 'formpopup', 'width=400,height=400,resizeable,scrollbars');
	
	});

	/*
	setInterval(function(){
		var url = $("#the-form").serialize();
		getMPID(t,q,'?'+url);
		//alert('refreshed');
	}, 5000);
	*/
	var date = new Date();
	var yearnow = date.getFullYear();
	$("#dateacct").datepicker({
						keyupMonth: true,
						keyupYear: true,
						changeMonth: true,
						changeYear: true,
						yearRange: '1985:'+yearnow
				});
	$("#multi_dateacct").datepicker({
						keyupMonth: true,
						keyupYear: true,
						changeMonth: true,
						changeYear: true,
						yearRange: '1985:'+yearnow
				});
	$("#form-savepayment").submit(function(e){
		e.preventDefault();
		var date = $("#dateacct").val();
		
		if (date){
			var data = $(this).serialize();
			var url = $(this).attr('action');
			$.ajax({
						url:url, 
						type:'POST',
						data:data,
						success:function(data){
							if(data == 'success'){
								 window.focus();
								alert('Succesfully saved!');
								$("#saveann").attr('disabled','disabled');
								$("#add-payment").removeAttr('disabled');
										clickedmeyear = true;
									var t= $("#just-ignore-me").val();
									var q= $("#just-ignore-me-too").val();
									
									var clickedmeyear = false;
									var z = $("input[name='typeid']").is(":checked") ;

									if (z){
										var z_id = $("input[name='typeid']:checked").attr("data-id");
										if (z_id == 'all'){
												z= "";
										}else{
											
											if (t == 'Diverter'){
												t= 'Owner2';
												typeWords = 'Diverter';
												/*q =z_id;
												z_id  = q;*/
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
											//	console.log($("#the-anndatacenter"));
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}else if (t == 'Owner'){
												t = 'Diverter2';
												typeWords = 'Owner';
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}	
										}
									}
									
										var y = $("#the-year").val();
										var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
										

										var a = $("#isAbandoned").is(":checked") ? a ='ab' : a = 'no';
										var o = $("#type-nm-2").val();
									
										$("#year").val(y);
										
										//var o = $("input[name='typeid'").val();
								
										getMPID(t,q,null,y,f,o,a,"yes",z_id);
									
								
								
								
								$("#form-savepayment")[0].reset();
								$("#quick-paymodal").modal('hide');
							}else{
								alert('Error');
							}
						}
				});
		}else{
			mainCenterErrorHandling.getMessage("err", "Please select date");
		}
			
				

	});
	
	
	$("#form-savemultipayment").submit(function(e){
		 e.preventDefault();
	
			var data = $(this).serialize();
			var url = $(this).attr('action');
			
			$("#status-div").html(' <i class="fa fa-info-circle"></i>  Accessing Account Infromation... Please wait <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
				$.ajax({
					
						url:url, 
						type:'POST',
						data:data,
						success:function(data){
						
							if(data == 'success'){
								$("#status-div").html('Payment Succesfull!');
								 window.focus();
								alert('Succesfully saved!');
								$("#save-payment").attr('disabled','disabled');
								//$("#add-payment").removeAttr('disabled');
									clickedmeyear = true;
									var t= $("#just-ignore-me").val();
									var q= $("#just-ignore-me-too").val();
									
									var clickedmeyear = false;
									var z = $("input[name='typeid']").is(":checked") ;

									if (z){
										var z_id = $("input[name='typeid']:checked").attr("data-id");
										if (z_id == 'all'){
												z= "";
										}else{
											
											if (t == 'Diverter'){
												t= 'Owner2';
												typeWords = 'Diverter';
												/*q =z_id;
												z_id  = q;*/
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
											//	console.log($("#the-anndatacenter"));
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}else if (t == 'Owner'){
												t = 'Diverter2';
												typeWords = 'Owner';
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}	
										}
									}
									
										var y = $("#the-year").val();
										var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
										

										var a = $("#isAbandoned").is(":checked") ? a ='ab' : a = 'no';
										var o = $("#type-nm-2").val();
									
										$("#year").val(y);
										
										//var o = $("input[name='typeid'").val();
								
										getMPID(t,q,null,y,f,o,a,"yes",z_id);
									
								
								
								$("#form-savemultipayment")[0].reset();
								$("#quick-multipayment").modal('hide');
							}else{
								alert('Error');
							}
						}
						});

	});
	
	$("#form-savemultimove").submit(function(e){
		 e.preventDefault();
	
			var data = $(this).serialize();
			var url = $(this).attr('action');
			$("#status-div").html(' <i class="fa fa-info-circle"></i>  Moving Data... Please wait <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
				$.ajax({
					
						url:url, 
						type:'POST',
						data:data,
						success:function(data){
							data = $.trim(data);
							if(data == 'success'){
								 window.focus();
								 $("#status-div").html('Succesfully moved!');
									alert('Succesfully moved!');
							
								//$("#add-payment").removeAttr('disabled');
									clickedmeyear = true;
									
									var t= $("#just-ignore-me").val();
									var q= $("#just-ignore-me-too").val();
									
									var clickedmeyear = false;
									var z = $("input[name='typeid']").is(":checked") ;

									if (z){
										var z_id = $("input[name='typeid']:checked").attr("data-id");
										if (z_id == 'all'){
												z= "";
										}else{
											
											if (t == 'Diverter'){
												t= 'Owner2';
												typeWords = 'Diverter';
												/*q =z_id;
												z_id  = q;*/
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
											//	console.log($("#the-anndatacenter"));
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}else if (t == 'Owner'){
												t = 'Diverter2';
												typeWords = 'Owner';
												z_id = q;
												q = $("input[name='typeid']:checked").attr("data-id");
												//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> T by the Owner : "+a+"("+z_id+") </strong></td></tr>");
											}	
										}
									}
									
										var y = $("#the-year").val();
										var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
										

										var a = $("#isAbandoned").is(":checked") ? a ='ab' : a = 'no';
										var o = $("#type-nm-2").val();
									
										$("#year").val(y);
										
										//var o = $("input[name='typeid'").val();
								
										getMPID(t,q,null,y,f,o,a,"yes",z_id);
									
								
								
								$("#form-savemultipayment")[0].reset();
								$("#quick-multimove").modal('hide')
							}else if (data =='errorD'){
								alert('Diverter does not exist. Please try again.');
							}else if (data =='errorO'){
								alert('Owner does not exist. Please try again.');
							}else{
								alert('Error');
							}
						}
						});

	});
	$("#form-facility").submit(function(e){
		 e.preventDefault();
		var data = $(this).serialize();
			var url = $(this).attr('action');
				$.ajax({
						url:url, 
						type:'POST',
						data:data,
						success:function(data){
							if(data == 'success'){
								alert('Facility Information succesfuly Added');
								$("#form-facility")[0].reset();
								$("#the-modalfacilitycenter").modal('hide');
								$("#the-modalfacilitycenter").on('hidden.bs.modal', function () {
								 $("body").removeClass("modal-open");
								});	
								// var y = $("#the-year").val();
								// var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
								// var q = $("input[name='facility_id']").val();
								// var u = $("#use_cd").val();
								// var currentYear = (new Date).getFullYear();
								// var t = "Facility";
								// getFacilityCenter(t,q,u,f,y)
							}else{
								alert('Error');
							}
						}
				});
	});
		$("#paytypeacc").change(function(){
			var val = $(this).val();
		
			if (val != 'check'){
				$("#checknoacct").attr('readonly','readonly');
				$("#checknoacct").css('cursor','not-allowed');
				$("#checknoacct").val("")
			}else{
				$("#checknoacct").removeAttr('readonly');
				$("#checknoacct").css('cursor','default');
			}
		});
		$("#paytypeacc2").change(function(){
			var val = $(this).val();
		
			if (val != 'check'){
				$("#checknoacct").attr('readonly','readonly');
				$("#checknoacct").css('cursor','not-allowed');
				$("#checknoacct").val("")
			}else{
				$("#checknoacct").removeAttr('readonly');
				$("#checknoacct").css('cursor','default');
			}
		});
		
		$("form").on("keypress", function(evt){
				 if(evt.keyCode == 13) {
				  evt.preventDefault();
				  return false;
				}
		});
		$("#the-form2").submit(function(evt){
			 evt.preventDefault();
			
		
			var data = $(this).serialize();
			var url = $(this).attr('action');
			var $val = 0;
						
			var owner = $("#owner_id-h").val();	
			var diverter = $("#diverter_id-h").val();	
			var mpid  = $("input[name='mpid-h']").val();	
			var year  = $("#year-h").val();	
			
			$(".required").each(function(){
				console.log($(this),$(this).val());
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
							var c = confirm('Are you sure you want to edit this MPID? Any keyups are final and cannot be reverted back. Would you like to continue? ');
							
							if (c){
								$.ajax({
								url:url, 
								type:'POST',
								data:data,
								success:function(data){
										if(data == 'success'){
											window.focus();
											//window.location = 'https://wise.er.usgs.gov/wateruse/wells';
											//window.location.href = "https://wise.er.usgs.gov/"+$dir+"/wells/measpt?mpid="+mpid+"&year="+year+"&diverter="+diverter+"&owner="+owner;
											alert('Succesfully saved!');
											$("#quick-edit-mpid").modal('hide');
											$("body").addClass("modal-open");
											
													clickedmeyear = true;
													var t= $("#just-ignore-me").val();
													var q= $("#just-ignore-me-too").val();
													
													var clickedmeyear = false;
													var z = $("input[name='typeid']").is(":checked") ;

													if (z){
														var z_id = $("input[name='typeid']:checked").attr("data-id");
														if (z_id == 'all'){
																z= "";
														}else{
															
															if (t == 'Diverter'){
																t= 'Owner2';
																typeWords = 'Diverter';
																/*q =z_id;
																z_id  = q;*/
																z_id = q;
																q = $("input[name='typeid']:checked").attr("data-id");
															//	console.log($("#the-anndatacenter"));
																//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
															}else if (t == 'Owner'){
																t = 'Diverter2';
																typeWords = 'Owner';
																z_id = q;
																q = $("input[name='typeid']:checked").attr("data-id");
																//$("#the-anndatacenter").append("<tr class='filter-notice'><td style='color:red;'> <strong> This Result is filter by the Owner : "+a+"("+z_id+") </strong></td></tr>");
															}	
														}
													}
													
														var y = $("#the-year").val();
														var f = $("#isMyCounty").is(":checked") ? f = $("#isMyCounty").val() : f = 'nf';
														

														var a = $("#isAbandoned").is(":checked") ? a ='ab' : a = 'no';
														var o = $("#type-nm-2").val();
													
														$("#year").val(y);
														
														//var o = $("input[name='typeid'").val();
												
														getMPID(t,q,null,y,f,o,a,"yes",z_id);
													
												
												
										}else{
											alert('Data Exist - A MPID is already located at this point');
										}
									},
									error:function(e,err){
										console(e,err);
										
									}
								
								});
							}else{
								return false;
							}
							
						}
		});
		$(".close").click(function(e){
			usgsWellsMapping.removeEverything();
			$("#advance-search-load").hide();
			$("#the-modalMap .modal-content").css("height","925px");
			$("#map").css("height","660px");
			$("#adv-form").trigger("reset");
		});
		$(".closer").click(function(e){
			e.preventDefault();
			$(this).parent().hide();
		});
		
		$("#adv-form").submit(function(e){
			e.preventDefault();
			
			var multiple_select  = $(".multiple_select").val();
			// if (multiple_select != 'Evr'){
				// alert("Please select two or more options.")
			// }
			
		});
		
		
		// $("#advance-search-modalMap").click(function(e){
			// $("#adv-search").show();
			
				// var lat= $("#the-lat").val();
				// var lng= $("#the-lng").val();
				
				// if (lat != "" && lng != ""){
					// var latlng= [lat,lng];
					// usgsWellsMapping.getDataFromLayer(null,latlng,"adv");
					
				// }else if (lat == "" || lng == ""){
					// alert("Lat or Long should not be blank");
					// map.closePopup();
				// }
		// });
		getJSONData.getCounty();	
		getJSONData.getState();	
});


</script>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
		<a id="logout"><i class="fa fa-home"></i> Welcome, <?php echo $_SESSION['USER_ID']; ?></a>
		
	</li>
	 
    <li class="breadcrumb-item">
		<a onClick="window.open('https://wise.er.usgs.gov/wateruse_dev','_SELF')">Water-Use Application</a>
	</li>
    <li class="breadcrumb-item active" aria-current="page"> You are at Main Center</li>
    
     <li class="dropdown-submenu" style="display:inline;">
            <a tabindex="-1" href="#" style="padding-right:10px;">Add &rarr;</a>
            <ul class="dropdown-menu" >
				<li><a href="#" id="add-diverter" target="_blank" class='dropdown-toggle' style="z-index:-999"> New Diverter </a></li>
				<li><a href="#"   id="add-owner"  target="_blank" class='dropdown-toggle' style="z-index:-999"> New Owner </a></li>
				<li><a href="#" id="add-facility"  target="_blank" class='dropdown-toggle' style="z-index:-999"> New Facility </a></li>
				
             
            </ul>
      </li>
	
     <li class="dropdown-submenu" style="display:inline;">
            <a tabindex="-1" href="#" style="padding-right:10px;">Advance Options  &rarr;</a>
            <ul class="dropdown-menu" >
				<li><a href="#" target="_blank" class='dropdown-toggle' style="z-index:-999"> Advance Search </a></li>
				<li><a href="#"   target="_blank" class='dropdown-toggle' id="trail" style="z-index:-999"> View Audit Trail</a></li>
				
				
             
            </ul>
      </li>
  </ol>
</nav>


<div class="container" id ="container">

<div class="msg"> </div>
<?php
	if (!empty($persist_note)){
		echo $persist_note;
	}
	if (!empty($note)) {
		echo $note;
		// setcookie("first_time", 1, time()+43200);  /* expires in 12 hours */
	}
	
	


?>
<div  class="row">
	
	<div class="col-sm-4 col-sm-offset-5 auto"  style="padding-top:50px;" id ="main-title">
		<h3>AR Water - Main Center</h3>
	</div>
	<div class="col-md-4 col-md-offset-3" id="the-centers" style="z-index:1;">

			 <div class="form-groups">
				<div class="input-group">
					<div class="input-group-btn" >
						<div class="btn-group"> 
							<button  type="button" class="btn btn-default " data-toggle="dropdown" id="select-type"><!-- class="btn btn-default dropdown-toggle"-->
								<span data-bind="label" id="searchLabel">Diverter</span> <span class="caret"></span>
							</button> 
							
							<ul class="dropdown-menu" role="menu" id="menu">
								<li><a href="#" class="select-type" class="dropdown-toggle">Diverter</a></li> 
								<li><a href="#" class="select-type">Owner</a></li>
								<li><a href="#" class="select-type">Facility</a></li>
								<li><a href="#" class="select-type">MPID<?php  $k =1; if ($k == 0) {echo '<span style="color:red">* <sup>In development</sup></span>';}?></a></li>
							</ul>
						</div>
						<div class="btn-group"> 
									<label class="btn btn-primary">
										<input type="checkbox" id="filterbycounty" checked> Filter by my County <?php echo ': '.$_SESSION['COUNTY_NM'].' ('.$_SESSION['COUNTY_CD'].')';?>
									</label>
						</div> 
						<div class="btn-group" id="scrollable-dropdown-menu">					
							<input type="text" class="form-control typeahead tt-query" id="search-box" placeholder="Search ID/Name (hit Enter key '&crarr;' to see result)"/>
						</div>
										
						<div class="btn-group">
							<button id="filter" class="btn btn-primary btn-block">
								Submit
							</button>
						</div>
					</div> 
				
					
					
				</div>
			
			 </div>
			
	</div>
	

<!-- table goes here -->
	<div class="col-md-9 col-md-offset-2" id="the-results">
		<form id="info-form" action="POST">
			<table class ="table" id="result-table">
			</table>
			<input type ="hidden" id="id-result" name="id">
			<input type ="hidden" id="nm-result" name="nm">
			<input type ="hidden" id="phone-result" name="phone">
			<input type ="hidden" id="maddress-result" name="maddress">
			<input type ="hidden" id="location-result" name="location"> <!-- r address-->
			<input type ="hidden" id="mcity-result" name="mcity">
			<input type ="hidden" id="rcity-result" name="rcity">
			<input type ="hidden" id="mstate-result" name="mstate">
			<input type ="hidden" id="mstate-result_nm" name="mstate_nm">
			<input type ="hidden" id="rstate-result" name="rstate">
			<input type ="hidden" id="rstate-result_nm" name="rstate_nm">
			<input type ="hidden" id="county-result" name="county">
			<input type ="hidden" id="county-result_nm" name="county_nm">
			<input type ="hidden" id="comment-result" name="comment">
			<input type ="hidden" id="zip-result" name="zip">
			<input type ="hidden" id="rzip-result" name="rzip">
			<input type ="hidden" id="t-result" name="type">
			<input type ="hidden" id="fac-diverter" name="fac_diverter">
			<input type ="hidden" id="fac-owner" name="fac_owner">
			<input type ="hidden" id="fac-ownername" name="fac_ownername">
			<input type ="hidden" id="use_cd-result" name="use_cd">
			<input type ="hidden" id="permit-result" name="permit">
			<input type='hidden' id='x' value="sc">
			
		</form>
		
		

<div class="modal fade" id="the-modal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
  <div class="modal-dialog" role="document" style="z-index:1;">
    <div class="modal-content" style="width:1200px !important; position:relative; right:35% !important;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div id="status-div-anndata" class="bg-info text-white" style="padding:10px;"></div>
        <h4 class="modal-title" id="the-modal-label">Annual Data Center</h4>
      </div>
      <div class="modal-body">
	  <div>
	  <form id='the-form'>
		   <input type='hidden' id="just-ignore-me" name="t">
		  <input type='hidden' id="just-ignore-me-too" name="q">
	
	 
		
        <table id="the-anndatacenter">
			<tr class='show-stats'></tr>
			<tr><td>Select Water Year: <select name ='year' id ='the-year'   class="the-selection" ></select></td></tr>
			<tr><td> Filter result by my County (<?php echo $_SESSION['COUNTY_NM']; ?>) <input type="checkbox" id="isMyCounty" value="<?php echo $_SESSION['COUNTY_CD']; ?>"></td></tr>
			<tr><td> Show/Hide Inactive/Abandoned Sites  <input type="checkbox" id="isAbandoned" value="ab"></td></tr>
			
			
			
			<tr class='statistics'></tr>
			<tr class='filter-notice'></tr>
		
		<!-- <tr>
			<td>Select Method Annual Data Will Be Entered: 
				<select name ='method'  class="the-selection" id='the-method'>
					<option value='E'>Estimated</option>
					<option value='M'>Measured</option>
					<option value='C'>Metered</option>
				</select>
			</td>
		</tr>-->
		<!-- <tr><td><input type='checkbox' value='n' name='paid' id='the-unpaid' value='unpaid'> Unpaid</td></tr>
	<!--	<tr><td><input type='checkbox'  name='county_cd' id='the-county'  class="the-selection" > <span id='my-county'> My County </span></td></tr> -->
		<tr><td><span id='status'></span></td></tr>

		</table>
		<table id="the-anndatacounter">
		
		</table>
		</div>
		</form>
		
		<div id="add-data">
		
			<form method='GET'  id='form-add-data' name='fad' >
				<table id="the-anndata" class="table">
					
				</table>
				<input type="hidden" id="type" name="type">
				<input type="hidden" id="id" name="id">
				<input type="hidden" id="nm" name="nm">
				<input type="hidden" id="year" name="year" >
				<input type="hidden" id="method" name="method">
				<input type="hidden" id="paid" name="paid">
				<input type="hidden" id="usecd" name="usecd">
				<input type="hidden" id="actioncd" name="action_cd">
				<input type="hidden" id="sourcecd" name="source_cd">
				<input type="hidden" id="type-nm-2" name="typenm">
				<input type="hidden" id="type-id-2" name="typeid">
				<input type="hidden" id="facility-owner" name="facility_owner_id">
				<input type="hidden" id="facility-ownernm" name="facility_owner_nm">
				<input type="hidden" id="facility-diverter" name="facility_diverter_id">
				<input type="hidden" id="facility-diverternm" name="facility_diverter_nm">
				<input type="hidden" id="refresh-me-bro" name="refresh_me">
				<input type="hidden" id="ayy" name="ayy">
				<input type="hidden" id="next-mpid-bro" name="next_mpid">
				<input type="hidden" id="max-mpid-bro" name="max_mpid">
				<input type="hidden" id="selected-mpid-bro" name="selected_mpid">
				
				<input type="submit"  id="show-map" value ="Map View" class="btn btn-primary">
				<input type="submit"  id="add-new-mpid" value ="+ Add Meas. Pt." class="btn btn-primary" >
				<input type="submit"  id="add-new-anndata" value ="+ Add Ann. Data." class="btn btn-primary" >
			</form>
		
		</div>
			
		<div style="display:grid; padding-top:10px;">
				<button  id="add-new-multipayment" class="btn btn-primary" >+ Multi-payment</button>
		</div>
		<div style="display:grid;  padding-top:10px;">
				<button  id="add-new-multimove" class="btn btn-primary" >+ Multi-move Diverter/Owner</button>
				<!-- <input type="submit"  id="modify-mpid" value ="+ Modify Meas. Pt." class="btn btn-primary" > -->
		</div>
			<div style="display:grid; padding-top:10px;">
				<a id="showaudittrail">  <i class="fa fa-list-alt"></i> Show Multi-move Audit Trail  </a>
			</div>
				
				
	
	
      </div>
      <!-- <div class="modal-footer">
        
        <button type="button" class="btn btn-primary">Save keyups</button>
      </div> -->
    </div>
  </div>
</div>
</div>
<!-- end table -->


	<div class="modal fade" id="advance-search-modal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
	  <div class="modal-dialog" role="document" style="z-index:1;">
		<div class="modal-content" style="width:1500px !important; position:relative; right:70% !important;top:-75px !important;">
		  <div class="modal-header">
			<div id="status-div-advsearch" class="bg-warning text-white" style="padding:10px;"> 
				<i class="fa fa-info-circle"></i> In order to get faster results, please select 3 or more criteria. Please contact us if you have any large 
				data request. We are actively working on a better retrieval system. </div>
			
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			
			<h4 class="modal-title" id="the-modal-label">Advance Search Option</h4>
			</div>
			<div class="modal-body">	

		
				<form id="adv-form" action="GET">
				
					<h4>Find Well with ... </h4>
					<table id="advance-search-option" class="table">
						
						<tr>
								<td colspan="3">
								Annual Data Water Year: <select name="year" id="advance-search-the-year" class="the-selection"></select>
								<td>
						</tr>
						<tr>
								<td colspan="2">  
									<div style="display:inline-flex; float: left; line-height:2;">
										<div style="margin-right:30px; display:inline-flex;" > Owner:&nbsp; &nbsp;
										<div class="input-group-btn">
													
											<div class="btn-group" id="scrollable-dropdown-menu" >					
												<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="adv-list-owner"  class="list-owner-adv" name="owner"/>
											</div>
											<div class="btn-group"> 
												<label class="btn btn-primary">
													<input type="checkbox" id="adv-filter-owner" checked> Filter Owner by my County 
												</label>
											</div> 
										
										</div> 
										
									</div>
										
								</td>
							
		
					
								<td colspan="1">  
									<div style="display:inline-flex; float: left; line-height:2;">
										<div style="margin-right:30px;"> Diverter:</div>
										<div class="input-group-btn" >
													
											<div class="btn-group" id="scrollable-dropdown-menu">					
												<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="adv-list-diverter"  class="list-owner-adv" name="diverter"/>
											</div>
											<div class="btn-group"> 
												<label class="btn btn-primary">
													<input type="checkbox" id="adv-filter-diverter" checked> Filter Diverter by my County 
												</label>
											</div> 
										</div> 
										</div>
								</td>
							
								
								
						</tr>
						<tr>
								<td colspan="3">  
									<div style="display:inline-flex; float: left; line-height:2;">
										<div style="margin-right:30px;"> Facility: </div>
										<div class="input-group-btn" >
													
											<div class="btn-group" id="scrollable-dropdown-menu" style="z-index: 100 !important;">					
												<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="adv-list-facility"  class="list-owner-adv" name="f"/>
											</div>
											<div class="btn-group"> 
												<label class="btn btn-primary">
													<input type="checkbox" id="adv-filter-facility" checked> Filter Facility by my County 
												</label>
											</div> 
										</div> 
										</div>
								</td>
							
								
								
						</tr>
						
						<tr> 
							<td>Local Description: </td>
							<td><input type="text" name="local_desc" id="adv_local_desc" size="50"></td>
							<td> Partial or exact search accepted (example: app or apple)</td>
						<tr>
						<tr> 
							<td>Aquifer: </td>
							<td><select class="multiple_select" id="adv_prin_aquifer" name="prin_aquifer[]" multiple ='true'>
								<option value="Evr">Search Every Aquifer</option>
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
								<option value="Unknown">Unknown</option>
								</select>
							</td>
							<td> Select from the list of Aquifers. Select "Unknown" if unknown. </td>
				
						<tr>
							<td style="width:550px;" > 
								<div style="display:inline-block; width:400px;" > Action Code: &nbsp;
									<select name="action_cd[]" multiple ='true' class="multiple_select">
										<option value="Evr">Search Every Action Code</option>
										<option value="WD">Withdrawal</option>
										<option value="AB">Abandoned</option>
										<option value="IA">Inactive</option>
										<option value="DL">Delivered</option>
										<option value="RL">Released</option>
										<option value="PR">Production</option>
										
									</select>
								</div>
							</td>
							<td> Source:
								<select name="source_cd[]" multiple ='true' class="multiple_select">
									<option value="Evr">Search Every Source</option>
									<option value="SW">Surface Water</option>
									<option value="GW">Ground Water</option>
									<option value="SP">Spring Water</option>
									<option value="TW">Transferred Water</option>
									
								</select>
							</td>

							<td> Any Action Code or Source. </td>
						</tr>
						<tr>
							<td > Tract #:
								<input type="text" name="tract_no" maxlength="5">
							</td>
							<td>Farm #:
								<input type="text" name="farm_no" maxlength="5">
							</td>
							<td> Type the exact Tract/Farm # or Tract/Farm # that matches </td>
						</tr>
						<tr>
								<td> Quad #:
									<input type="text" name="quadno" maxlength="4">
								</td>
								<td> Operator #:
									<input type="text" name="opnum" maxlength="5">
								</td>
								<td>Well #:
									<input type="text" name="wellno" maxlength="10">
								</td>
								
						</tr>
						<tr>
								<td colspan="2"> Source Name:
									<input type="text" name="source_nm" style="width:300px;">
								</td>
								<td colspan="1"> Meter:
									
									<select name="meter" >
										<option value="">  </option>
										<option value="Y"> Yes </option>
										<option value="N"> No </option>
									</select>
								</td>
						</tr>
						
						<tr>
								<th colspan="3">
									<center>Search by Point (Lat/Lng), County, State and Huc # </center>
									
								</th>
						</tr>
						<tr>
							<td colspan="3">
								<div id="status-div-advsearch" class="bg-info text-white" style="padding:10px;margin-top:10px;"> 
									<i class="fa fa-info-circle"></i> Example: Decimal Degrees (DD): Latitude: 34.7465 Longitude: 92.2896 OR Degrees, Minutes, Seconds (DMS): Latitude: 344447 Longitude: 921723 (no spaces)		
								</div>
							
							</td>
						</tr>
						
						<tr>	
								<td>Look for well within (Radius): 
									<select id="adv-search-by-radius" name="radius">
										<option value="">All</option>
										<option value="5">5 Miles</option>
										<option value="10">10 Miles</option>
										<option value="25">25 Miles</option>
										<option value="50">50 Miles</option>
									</select>
								</td>
								<td>Latitude: <input type="number" name="latitude" id="adv-lat">
										<input type="hidden" name="latNE" id="lat-NE">
										<input type="hidden" name="lngNE" id="lng-NE">
										<input type="hidden" name="latSW" id="lat-SW">
										<input type="hidden" name="lngSW" id="lng-SW">
									</td>
								<td> Longitude:  <input type="number" name="longitude" id="adv-lng"></td>
								
						</tr>
						<tr>
								<td>County: <select id="adv_county_station" name="county_cd[]" style="display: inline-block;" multiple ='true' class="multiple_select"></select></td>
								<td>State: <select id="adv_state_station" name="state_cd[]" style="display: inline-block;" multiple ='true' class="multiple_select"></select></td>
								<td>Huc #: <input type="text" name="huc" maxlength="8"></td>
						</tr>
						<tr>
								<th colspan="3">
									<center>Search by Range,Township and Section </center>
									
								</th>
						</tr>
						<tr>
								<td>Range: 
									<input type="text" class="adv-imprnt" id="adv-range" name="range" maxlength="4" size="4"> 
									<select id="adv-range-direction" name="range_direction">
										<option value="N"> N </option>
										<option value ="E"> E </option>
										<option value ="W"> W </option>
										<option value ="S"> S </option>
									</select>
								</td>
								<td>Township:
									<input type="text"  class="adv-imprnt"  id="adv-township" name="township" maxlength="4" size="4">
									<select id="adv-township-direction" name="township_direction">
										<option value="N"> N </option>
										<option value ="E"> E </option>
										<option value ="W"> W </option>
										<option value ="S"> S </option>
									</select></td>
								<td>Section: <input type="number" id="adv-section" name="section" style="width:50px;" disabled>
								</td>
								
						</tr>
						
						<tr>
							 <td colspan=3>
								<div class="col-sm col-sm-offset-4 auto"> 
								
									<button class="openMap" id="advance-search-modalMap" is-advanceSearch = "true" data-toggle="modal" data-target="#the-modalMap">
											<i class="fa fa-map" aria-hidden="true"></i> View on Map 
									</button>
									
									<button id="advance-search-table"> 
											<i class="fa fa-table"></i> View result on Table (Faster)
									</button>
									<button id="advance-search-table">
											<i class="fa fa-table"></i> Download result as CSV
									</button>
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
	  </div>
	</div>

	</div>

</div> <!-- div #row--> 
	<div class="col-sm col-sm-offset-6 auto" style="padding-bottom:20px;">	

			<a href="#" id="advance-search" data-toggle="modal" data-target="#advance-search-modal"><i class="fa fa-search"></i> Advance Search option</a>
	
	</div>
	
		<div class="col-sm col-sm-offset-5 auto" > 
			
				
					
				<button style="width:300px;" id="bugs" 
					class="btn btn-primary btn-block" onclick="window.location.href='//wise.er.usgs.gov/bugs/wubugreporting.html'">
					<i class="fa fa-bug" aria-hidden="true"></i> Report a bug </button> 
					
				<button style="width:300px; background-color:#4CAF50;" 
					id="bugs" class="btn btn-primary btn-block" onclick="window.location.href='//wise.er.usgs.gov/wells/ReportMain.php'">
					Reports Menu 2.0 </button> 
		</div>
	
		
	<?php #reportsbybarry ?>
	

	
</div>



<div class="modal fade" id="quick-paymodal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" style="z-index:999999 !important;">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" style="width:500px; margin-left:40%">
					  <div class="modal-header">
						<div class="msg"> </div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label">Totals for Accounting Information (<span id="payment-mpid"></span>) </h4>
						<h4 class="modal-title" id="the-modal-label">Diverter ID:  <span class="payment_did"></span></h4>
						<h4 class="modal-title" id="the-modal-label">Owner ID:  <span class="payment_oid"></span> </h4>
						<h5 class="modal-title" id="the-modal-label"> Total Penalties : <span id= "penalty">0</span> </h5>
						<div id="set-latlng" style="margin-top:10px;"> 
							<form method="POST" action="../controller/wells/savepayment" id="form-savepayment">
								<input type="hidden" name ="owner_id" class="payment-oid">
								<input type="hidden" name ="diverter_id" class="payment-did">
								<input type="hidden" name ="mpid" id="payment_mpid">
								<input type="hidden" name ="year" id="payment_year">
								
								<table class="table table-bordered table-condensed table-hover">
								<tr>
									<td>Amount Paid:</td>
									<td><input type="text" id= "amtacct" name="amtacct" readonly value="10"></td>
								</tr>
								<tr>
									<td>Penalty Paid:</td>
									<td><input type="number" step=1 min=0 id= "penaltyamtacct" name="penaltyamtacct"></td>
								</tr>
								<tr>
									<td>Date:</td>
									<td><input type="text" id="dateacct" id="dateacct" name="dateacct" style="z-index:1 !Important;" readonly/></td>
								</tr>
								<tr>
									<td>Check No:</td>
									<td><input type="text" id="checknoacct" name="checknoacct" ></td>
								</tr>
								<tr>
									<td>Payment Type:</td>
									<td>
										<select name = "paytypeacc" id="paytypeacc">
											<option value="check">Check</option>
											<option value="cash">Cash</option>
											<option value="money order">Money Order</option>
											<option value="debit card">Debit Card</option>
											<option value="electronic">Elec. Transfer	</option>
											<option value="other">Other </option>
											<option value=""> None</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Who is responsible for fee?:</td>
									<td colspan=2>
										<label class="radio-inline">
											<input type="radio" name="who" id= "who-owner" class = "radio-inline required"  value="O" required> Owner
										</label>
										<label class="radio-inline">
											<input type="radio" name="who" id="who-diverter" class = "radio-inline required" value="D" > Diverter
										</label>
											<span class="important">*</span>
									</td>
								</tr>	
								<tr>
									<td colspan=2> Status:<span id="status"> Not Paid</span> </td>
								</tr>
								<tr>
									<td colspan=2> <input type="submit" value="Save Payment" id="save-payment"></td>
								</tr>
								</table>
							</form>
						</div>
							
					  </div>
					
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save keyups</button>
					  </div> -->
						
					</div>
				  </div>
	</div>
	
	<div class="modal fade" id="quick-multipayment" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" style="z-index:999999 !important;">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" style="width:500px; margin-left:40%">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label"> Multi-payment for MPIDs (<span id="multipayment-mpid"></span>) <a  data-toggle="collapse" data-target="#listofMPID" aria-expanded="false" aria-controls="listofMPID">  [?] </a> </h4>
							
						<div id="set-latlng" style="margin-top:10px;"> 
							<form method="POST" action="../controller/wells/mpayment" id="form-savemultipayment">
							
								<input type="hidden" name ="year" id="mutlipayment_year">
								<input type="hidden" name ="type" id="mutlipayment_type">
								<input type="hidden" name ="ctr" id="multictr">
								<div class="collapse" id="listofMPID">
								  <div class="card card-block" id="listmpid"   style="height:150px;white-space: nowrap;overflow-y: scroll; text-overflow: ellipsis;" name="mpid">
									
								  </div>
								 
								</div>
								<table class="table table-bordered table-condensed table-hover">
								<tr>
									<td>Amount Paid per Well:</td>
									<td><input type="text" id= "amtacct" name="amtacct" readonly value="10" placeholder="10 ea"></td>
								</tr>
								<tr>
									<td>Total Amount Paid:</td>
									<td><input type="text" id= "totamtacct" readonly></td>
								</tr>
								<tr>
									<td>Penalty Paid:</td>
									<td><input type="number" step=1 min=0 id= "penaltyamtacct" name="penaltyamtacct"></td>
								</tr>
								<tr>
									<td>Date:</td>
									<td><input type="text" id="multi_dateacct" name="dateacct" style="z-index:99999 !Important;" readonly/></td>
								</tr>
								<tr>
									<td>Check No:</td>
									<td><input type="text" id="checknoacct" name="checknoacct" ></td>
								</tr>
								<tr>
									<td>Payment Type:</td>
									<td>
										<select name = "paytypeacc" id="paytypeacc2">
											<option value="check">Check</option>
											<option value="cash">Cash</option>
											<option value="money order">Money Order</option>
											<option value="debit card">Debit Card</option>
											<option value="electronic">Elec. Transfer	</option>
											<option value="other">Other </option>
											<option value=""> None</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Who is responsible for fee?:</td>
									<td colspan=2>
										<label class="radio-inline">
											<input type="radio" name="who" id= "who-owner" class = "radio-inline required"  value="O" required> Owner
										</label>
										<label class="radio-inline">
											<input type="radio" name="who" id="who-diverter" class = "radio-inline required" value="D" > Diverter
										</label>
											<span class="important">*</span>
									</td>
								</tr>	
								<tr>
									<td colspan=2> Status:<span id="status"> Not Paid</span> </td>
								</tr>
								<tr>
									<td colspan=2> <input type="submit" value="Save Payment" id="save-payment"></td>
								</tr>
								</table>
							</form>
						</div>
							
					  </div>
					
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save keyups</button>
					  </div> -->
						
					</div>
				  </div>
	</div>
	
	<div class="modal fade" id="quick-multimove" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" style="z-index:999999 !important; padding-right:150px;">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" style="width:1300px;margin-left:-150px;">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label"> Move MPIDs (<span id="multimove-mpid"></span>) <a  data-toggle="collapse" data-target="#listofMPID-multimove" aria-expanded="false" aria-controls="listofMPID-multimove">  [?] </a> </h4>
							<div id="status-div"></div><div id="percentage-div"></div>
						<div id="set-latlng" style="margin-top:10px;"> 
							<form method="POST" action="../controller/wells/movempid" id="form-savemultimove">
							
								<input type="hidden" name ="year" id="multipayment_year">
								<input type="hidden" name ="type" id="multipayment_type">
								<input type="hidden" name ="ctr" id="ctr">
								<div class="collapse" id="listofMPID-multimove">
								  <div class="card card-block" id="listmpid-multimove"   style="height:150px;white-space: nowrap;overflow-y: scroll; text-overflow: ellipsis;" name="mpid">
									
								  </div>
								 
								</div>
								<table class="table table-bordered table-condensed table-hover">
										<tr>
												<td> 
													<div style="display:inline-flex; float: left; line-height:2;">
														<div style="margin-right:30px;"> Owner: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="list-owner"  class="list-owner-move" name="new_owner"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-owner" checked> Filter Owner by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
										
											<td> 
													<div style="display:inline-flex; float: left; line-height:2;">
														<div style="margin-right:30px;"> Diverter: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="list-diverter"  class="list-diverter-move" name="new_diverter"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-diverter" checked> Filter Diverter by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
											
										</tr>
	
								</table>
								
								<input type="submit" id="multi-move" value="Move Diverter/Owner" class="btn btn-primary"></td>
								
							</form>
						</div>
							
					  </div>
					
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save keyups</button>
					  </div> -->
						
					</div>
				  </div>
	</div>
	<div class="modal fade" id="the-modalMap" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" style="z-index:99999999 !important">
				  <div class="modal-dialog" role="document">
					<div class="modal-content" >
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label">Mapping Tool</h4>
						<div id="hide-adv-search">
							<h5 class="modal-title" id="the-modal-label">Pick a point to Graph Latitude and Longitude</h5>
							<div id="set-latlng" style="margin-top:10px;"> 
								<label for ="the-lat"> Latitude: </label> <input type="number" id="the-lat">&nbsp;
								<label for="the-lng">Longitude: </label> <input type="number" id="the-lng" min="-1">&nbsp;
								<button id="this-tomap"> Search</button>
							</div>
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
							<span> <strong>NOTE: SECTION BOUNDARIES WILL APPEAR WHEN ZOOMED IN.
								</strong>
							  </span> 
						</div>
					  </div>
					  <div class="modal-body">
							<div id="map"></div>
							  <input type='hidden' id='quad_nm'>
							<input type='hidden' id='onefourth'>
							<input type='hidden' id='section'>
							<input type='hidden' id='range'>
							<input type='hidden' id='township'>
							<input type='hidden' id='lat'>
							<input type='hidden' id='latDMS'>
							<input type='hidden' id='lng'>
							<input type='hidden' id='lngDMS'>
							<input type='hidden' id='direction'>
							<input type='hidden' id='elevation'>
							<input type='hidden' id='county2'>
							<input type='hidden' id='huc2'>
					  </div>
					 <div class="modal-footer" style="position:relative; top: 70%">
						
				
						<button type="button" id="advance-search-view-data-tbl" class="btn btn-primary">Load all data on a Table</button>
					  </div>
					</div>
				  </div>
		</div>
		<div class="modal fade" id="the-modalfacilitycenter" tabindex="99" role="dialog" aria-labelledby="the-modalfacilitycenter" data-backdrop="false" style="z-index:99999999 !important">
				  <div class="modal-dialog" role="document">
					<div class="modal-content" >
					  <div class="modal-header">
						<span> <strong> Facility Information</strong> </span> 
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>	
							<form method ="POST" id="form-facility" action="../controller/wells/facilitycenter">	
								<input type="hidden" id="isUpdateFacility" name="isUpdateFacility">
									<table id="facility-center-tbl-1" class="table">
									
									</table>
									<table id="facility-center-tbl-2" class="table">
									
									</table>
								<input type="submit" class="btn btn-primary center" id="submit-facilityinfo">
							</form>
						
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save keyups</button>
					  </div> -->
					
				  </div>
			</div>
		</div>
<!-- EDIT MODULE -->
	<form method="POST" action="../controller/wells/editmpid" id="the-form2" onkeyup="return event.keyCode != 13;">
		<input type="hidden" name="hasData" id ="hasDataEdit">
		<div class="modal fade" id="quick-edit-mpid" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" style="z-index:9999999 !important">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" style="width:1200px; bottom:100px; right:36% !Important;">
					  <div class="modal-header">
							<div id="status-div-edit"></div><div id="percentage-div-edit"></div> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>
								<form >
									<input type="hidden" id="did" name="did">
									
									<!--<input type="hidden" id="usecd" name="use_cd" value="AG">
									<input type="hidden" id="method" name="method" value="E">-->
									<input type="hidden" id="typeid" name="typeid" value="">
									<input type="hidden" id="typenm" name="typenm" value="">

								<input type="hidden" id="oid" name="oid" value="">
								<table id="the-mpidtbl" class="table">
									<tbody>
										<tr>
											<th colspan="4">
												<center>Measurement Point Information ID : <span id="mpid-span"> </span></center>
												<input type="hidden" name="mpid-h" value="">
												<!--<input type="hidden" name="mpid-new">-->
											</th>
										</tr>
										<tr>
												<td colspan="1"> 
													<div style="display:inline-flex; float: left; line-height:2;">
														<div style="margin-right:30px;"> Owner: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="list-owner-edit"  name="new_owner"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-owner-edit" checked> Filter Owner by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
											<td colspan="2"> 
													<div style="display:inline-flex; float: left; line-height:2;position:relative;left:50%;">
														<div style="margin-right:30px;"> Diverter: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:300px;" class="form-control typeahead tt-query" id="list-diverter-edit" name="new_diverter"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-diverter-edit" checked> Filter Diverter by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
											
										</tr>
										<tr>
											<td colspan="4" id="edit-facility"> 
													<div style="display:inline-flex; float: left; line-height:2;">
															<div style="margin-right:30px;"> Facility:  </div>
															<div class="input-group-btn" >
													
																		<div class="btn-group" id="scrollable-dropdown-menu">					
																			<input type="text" style="width:350px;" class="form-control typeahead tt-query" id="list-facility" name="new_facility"/>
																		</div>
																			<div class="btn-group"> 
																					<label class="btn btn-primary">
																						<input type="checkbox" id="filter-facility-edit" checked> Filter Facility by my County 
																					</label>
																		</div> 
																</div> 
														</div>
													
											</td>
										</tr>
										<tr>
											<td colspan="4"> Local Description:
												<input type="text" name="local_desc" style="width:300px;" class="required" id="local_desc_station"> <span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="1">  Action Code:
												<select name="action_cd" id ="action_cd_station" class="select2 required">
													<option value="WD">Withdrawal</option>
													<option value="AB">Abandoned</option>
													<option value="IA">Inactive</option>
													<option value="DL">Delivered</option>
													<option value="RL">Released</option>
													<option value="PR">Production</option>
												</select><span class="important">*</span> </td>
											<td colspan="1"> Source:
												<select name="source_cd" id="source_cd_station" class="select2 required">
													<option value="">--</option>
													<option value="SW">Surface Water</option>
													<option value="GW">Ground Water</option>
													<option value="SP">Spring Water</option>
													<option value="TW">Transferred Water</option>
													<option value="FW">Facility Water</option>
												</select><span class="important">*</span> </td>
											<td colspan="1"> Tract #:
												<input type="text" name="tract_no" id="tract_no_station" maxlength="5">
											</td>
											<td colspan="1">Farm #:
												<input type="text" name="farm_no" id="farm_no_station" maxlength="5">
												</td>
										</tr>
										<tr>
											<td colspan='2'> Quad #:
												<input type="text" name="quadno" id="quad_no_station" maxlength="4">
											</td >
											<td colspan='1'> Operator #:
												<input type="text" name="opnum" id="operator_no_station" maxlength="5">
											</td>
											<td colspan='1'> Well #:
												<input type="text" name="wellno" id="well_no_station"  maxlength="10">
											</td>
										</tr>
										<tr>
											<td colspan="2"> Source Name:
												<input type="text" name="source_nm"  id="source_nm_station"  style="width:300px;">
											</td>
											<td colspan='1'> Dam
												<input type="radio" value="Y" name="dam" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="dam" class="required">No<span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="4">
												<div class="hidesw"> Aquifer Code:
													<select name="aquifer" id="aquifer_station" class="select2 required" style="width:30%;">
													   
													</select><span class="important driller-imp">*</span>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="4">
												<div class="hidesw"> Driller Name:
													<select name="driller" id="driller" class="select2 required" style="width:30%;">  </select> <span class="important driller-imp">*</span> </div>
											</td>
										</tr>
										<tr>
											<td colspan="2"> Date Well Drilled or Relift Installed:
												<input type="text" id="date-drilled" name="date_drilled" class="required" readonly="readonly">
												<input type="checkbox" id="date-drilled-unknown" class="required">
												<label for="date-drilled-unknown" id="label-date-drilled-unknown">Check if unknown</label><span class="important driller-imp">*</span> </td>
											<td colspan="2">
												<div id="hideme" style="display: none;"> Well Depth:
													<input type="number" class="numbers" name="well_depth" step="any" maxlength="4" readonly="readonly"><span class="important">*</span>
												</div>
											</td>
										</tr>
										<tr>
											<th colspan="4">
												<center>Location of Withdrawal</center>
											</th>
										</tr>
										<tr>
											<td colspan="2"> County: <select id="county_station" name= "county_station"  style="display: inline-block;"></select>
												<input type="hidden" name="county_cd" value="Grant">
											</td>
											<td colspan="1"> State:  <select id="state_county" name ="state_cd" style="display: inline-block;"></select></td>
											<td colspan="1"> HUC: <div id="huc_station" style="display: inline-block;"></div>
												<input type="hidden"  name="huc">
											</td>
										</tr>
										<tr>
											<td colspan="1">
												<select name="quad1" id="quad1_station" class="select2 required">
													<option value="">--</option>
													<option value="SW">SW</option>
													<option value="SE">SE</option>
													<option value="NW">NW</option>
													<option value="NE">NE</option>
												</select> ¼<span class="important">*</span> of
												<select name="quad2"   id="quad2_station"  class="select2 required">
													<option value="">--</option>
													<option value="SW">SW</option>
													<option value="SE">SE</option>
													<option value="NW">NW</option>
													<option value="NE">NE</option>
												</select> ¼<span class="important">*</span>
											</td>
											<td colspan="1"> Section:
												<input type="text" name="section" value="7" class="required"><span class="important">*</span>
											</td>
											<td colspan="1">
											 Township:
												<input type="text" name="township" value="5S" class="required"><span class="important">*</span>
											</td>
											<td colspan="1"> Range:
												<input type="text" name="range" value="15W" class="required"> <span class="important">*</span> </td>
										</tr>
										<tr>
											<td colspan="2"> Latitude (DMS/DD): <span name="lat"></span>
												<input type="hidden" name="latDMS">
												<input type="hidden" name="latDD" >
											</td>
											<td colspan="1"> Longitude (DMS/DD): <span name="lng"></span>
												<input type="hidden" name="lngDMS">
												<input type="hidden" name="lngDD">
											</td>
											<td colspan="1"> Altitude:
												<input type="text" name="elevation" class="required"> <span class="important">*</span>
											</td>
										</tr>
										<tr>
											<th colspan="4">
												<center>Pump Information</center>
											</th>
										</tr>
										<tr>
											<td colspan="2"> Pump Horsepower:
												<input type="number" name="pump_hp" class="required numbers" step="any" maxlength="3"><span class="important">*</span>
											</td>
											<td colspan="2"> Discharge Pipe Diameter (inches) :
												<input type="number" name="pipe_diam" class="required numbers" step="any" maxlength="2"><span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="2"> Power Type:
												<select name="power_tp" id="power_tp_station" class="select2 required" style="width:10%">
													<option value="">--</option>
													<option value="ELC">ELC</option>
													<option value="LPG">LPG</option>
													<option value="DSL">DSL</option>
													<option value="OTH">OTH</option>
												</select><span class="important">*</span>
											</td>
											<td colspan="2"> Pump Type:
												<select name="diversion_meth" class="select2 required" style="width:15%">
													<option value="">--</option>
													<option value="STP">STP </option>
													<option value="PTP">PTP </option>
													<option value="GRV">GRV </option>
													<option value="OTH">OTH </option>
												</select><span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="2"> Flow Meter
												<input type="radio" value="Y" name="flow_meter" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="flow_meter" class="required">No<span class="important">*</span>
											</td>
											<td colspan="2"> Reclaimed Waste:
												<input type="radio" value="Y" name="rec_waste" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="rec_waste" class="required">No<span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="4">
												<center>
													<input type="submit" id="add" class="btn btn-primary" value="Save Edited Measuring Point">
												</center>
											</td>
										</tr>
									</tbody>
								</table>

							</form>
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save keyups</button>
					  </div> -->
					</div>
				  </div>
				</div>
		</form>
		
	<div>
	<div id="accordion" style="margin-top:50px;height:20px; height:100%; border-top: 3px solid red; padding:10px;">

		  <div class="card">
			<div class="card-header" id="headingTwo">
			  <h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					Hide/Show Change Notes
				</button>
			  </h5>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			  <div class="card-body">
				CHANGE NOTES:
				<?php echo PHASE.' '.VERSION?> (as of 06/18/18 4:00:00 PM EST)
								<ul> <strong> In-development: </strong>
									
									<li>Facility Center : Beta Phase.</li>
									
								</ul> 
								
								<ul><strong> Bug Fixes </strong>
									<li> Deleted duplicated Annual Data and MPID; issue is fixed </li>
									<li> Some minor changes on Facility form </li>
									<li> Some minor algorithm enhancements.</li>
								</ul>
								
							
								<ul> 
									<?php echo $note2; ?>
								</ul>
			  </div>
			  <?php echo $COOKIE_MONSTWER; ?>
			</div>
		  </div>
		 
	</div>


