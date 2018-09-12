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
<meta description = "wateruse,wells,registration,usgs,anrc">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<?php 
	
	
	$bootstrap =  new bootstrap_ui();
	print $bootstrap->allow_bootstrap();
	
	include '../includes/header_config.php';
	
?>

<style>

@media only screen and  (min-width: 1015 px)  and (max-width:1128 px){
	#the-modal .modal-dialog{
	    width: 500px;
		right: 10%;
	}
}
@media only screen and  (min-width: 768 px)  and (max-width:1064 px){
	#the-modal .modal-dialog{
	    width: 300px;
		right: 27%;
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
	height:100%;
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
	right:25%;
	width:1000px;
}
#scrollable-dropdown-menu .tt-dropdown-menu {
  max-height: 150px;
  overflow-y: auto;
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
	height:800px;
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
</style>

<script>

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
				  limit: 15,
				  source: list,
					 templates: {
						    empty: function(context){
							//  console.log(1) // put here your code when result not found
							  $(".tt-dataset").text('No Results Found');
							}
						/*empty: '<div class="empty-message" style="padding-left:5px"> No result for '+t+' '+q+' </div>'*/
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
					NProgress.done(true);var list =  new Array();
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
				  limit: 15,
				  source: list,
					 templates: {
						    empty: function(context){
							//  console.log(1) // put here your code when result not found
							  $(".tt-dataset").text('No Results Found');
							}
						/*empty: '<div class="empty-message" style="padding-left:5px"> No result for '+t+' '+q+' </div>'*/
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
	
	
	
}
/* var getJSONData = {
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
					});
									
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
									**
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
							
								/**
			
								$('#scrollable-dropdown-menu .typeahead').typeahead({
									hint: true,
									highlight: true, 
									minLength: 1, 
								},
								
								{
									name: 'list',
									source: list
								});
									
									NProgress.done(true);
									** 
							},
							error:function(err, ajaxOptions, throwError){
								alert("Internal Server Error! Please contact the administrator");
							}
							
					});
				},
				getCounty: function(selected_county){
					$(".county").empty();
					$(".county").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchcounty",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$(".county").empty();	
								$(".county").append('<option value="">--</option>');	
								$.each (data, function (i,item){
									
									if (item.cd == selected_county){
										$(".county").append('<option value = '+data[i].cd+' selected>'+data[i].nm+'</option> ');	
									}
									else{
										$(".county").append('<option value = '+data[i].cd+'>'+data[i].nm+'</option> ');	
									}
								
								});
								
							}
					});
				},
				getState: function(selected_state){
					$(".state").empty();
					$(".state").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchstate",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$(".state").empty();	
								$(".state").append('<option value="">--</option>');	
								$.each (data, function (i,item){
									
									if (item.id == selected_state){
										$(".state").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
									}
									else{
										$(".state").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										
									}
								});
								
							}
					});
				}
	
};*/

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
}
function appendInfo(t,q){
	$("#result-table").empty();
	absURL = "?type="+t+"&q="+q+"&directquery=1";
	
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
					alert (" No Data Available for "+t + " "+decodeURI(q) + ". Please Try Again.");
					
			}else{
					
						$("#result-table").show();
				
					$.each(data, function(i,item){
						// console.log(item);
						$("#usecd").val(item.use_cd);
						$("#just-ignore-me").val(t);
						$("#just-ignore-me-too").val(item.id);
						$("#type").val(t);
						$("#id").val(item.id);
						$("#nm").val(item.nm);
						
					
						$("#result-table").append('<thead>\
																	<tr>\
																	<th id="result-table-th"> <div id="table-header-txt" >'+t+' Information &nbsp; &nbsp; &nbsp; <a href="#" id="editInfo">(Edit)</a></div></th>\
																	</tr>\
																</thead>');			
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
						$("#result-table").append('<tr> \
																<td> \
																<div class="table-contents">\
																	<div class="table-row-title">Phone Number :</div> \
																	<div class="table-row-content editable"  id="phone" name="phone" onkeypress="return (this.innerText.length <= 12)">'+item.phone+'</div> \
																	</div> \
																</td>\
															</tr>');
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
										
						var k = 0 ;
						$(".editable").css({
							"max-width" : "200px",
					
							
							
						});
			
						$('#editInfo').click(function(){
							k = k + 1;
								
								getJSONData.getCounty(item.county_cd);
							
								
							if (k % 2 != 0){
								$('.editable').css("border","1px solid red");
								$('.editable').attr("contenteditable","true");
								
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
																	<input type="text" style="width:200px;" class="form-control typeahead tt-query" id="list-owner" name="fac_owner"  placeholder=" Search Owner Name/ID "/>\
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
																	<input type="text" style="width:200px;" class="form-control typeahead tt-query" id="list-diverter" name="fac_diverter" placeholder="Search Diverter Name/ID "/>\
																	</div>\
																		<div class="btn-group"  style="z-index: 1;"> \
																				<label class="btn btn-primary" >\
																					<input type="checkbox" id="filter-diverter" checked> Filter Diverter by my County \
																				</label>\
																	</div> \
															</div> \
														</div>');	
							
								$("#list-owner").on("keypress", function() {
									key_count_global++;
									setTimeout("lookup_owner("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
								});
							
								$("#list-diverter").on("keypress", function() {
									key_count_global++;
									setTimeout("lookup_diverter("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
								});	
								$(".numbersonly").keypress(function (e) {
																	 //if the letter is not digit then display error and don't type anything
																	 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
																		//display error message
																	
																			   return false;
																	}
																});								
								$('.editable-dropdown-mcounty').append('<select class="county" name="county_cd" id="county_cd"></select>');
								$('.editable-dropdown-mstate').empty();
								$('.editable-dropdown-mstate').removeAttr('editable');
								$('.editable-dropdown-mstate').append('<select class="state" name="mstate" id="mstate"></select>');
								$('.editable-dropdown-rstate').empty();
								$('.editable-dropdown-rstate').removeAttr('editable');
								$('.editable-dropdown-rstate').append('<select class="state" name="rstate" id="rstate"></select>');
							
								getJSONData.getState(item.state_cd,item.mstate);
									if (item.comment == null || item.comment == ""){
										item.comment = "N/A";
										$("#table-comment").css("width","300px");
									}
								
							
							}else{
								
							
								$("#table-comment").click(function(){
									//do nothing
								});
								
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
								var mstate_nm = $("#mstate option[value='"+mstate+"']").html();
								var rcity = $("#table-rcity-residential").text();
								var rstate = $("#rstate").val();
								var rstate_nm = $("#rstate option[value='"+rstate+"']").html();
								var rzip = $("#table-rzip-residential").text();
								var zip = $("#table-zip-mailing").text();
								var county = $("#county_cd").val();
								var county_nm = $("#county_cd option[value='"+county+"']").html();
								var fac_owner = $("#list-owner").val();
								var fac_diverter = $("#list-diverter").val();
								var comment = $("#table-comment").html();
								
								
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
							
								$("#comment-result").val(comment);
							
								if (t == "Facility"){
									$(".editable-dropdown-fowner").html(item.fowner_nm+' ('+item.fowner_id+')');
									$(".editable-dropdown-fdiverter").html(item.fdiverter_nm+' ('+item.fdiverter_id+')');
									$('.editable-dropdown-fowner').removeAttr('style');
									$('.editable-dropdown-fdiverter').removeAttr('style');
									 $("#fac-diverter").val(fac_owner);
									 $("#fac-owner").val(fac_diverter);
									$(".editable-dropdown-fowner").html(fac_owner);
									$(".editable-dropdown-fdiverter").html(fac_diverter);
								}
								
								
								if (county == "" || county == null ){
								
									$("#table-county-mailing").empty()
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
								
								if (fac_owner =="" ){
									$(".editable-dropdown-fowner").html(item.fowner_nm+' ('+item.fowner_id+')');
									$("#fac-owner").val(item.fowner_id);
								}else{
									$(".editable-dropdown-fowner").html(fac_owner);
									 $("#fac-owner").val(fac_owner);
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
										TYPE: "GET",
										url: "../controller/wells/updateinfo?"+data,
										ContentType:"application/json",
										dataType:"json",
										async: "false",
										success:function(data){
											// console.log(data);
											alert('Information has been successfully updated for '+t+' with ID : '+item.id);
											//$('.typeahead').typeahead('val', '');
										}
								});
							
								
				
							
							}

							
						
						
						});
					
						
						if (t == "Diverter"){
							type = "Owners";
						}else if (t=="Owner"){
							type = "Diverters";
						}
						
						$("#result-table").append('<tr>\
																	<th id="result-table-th"> <div id="table-header-list" >'+t+'\'s '+type+' List</div></th>\
																</tr>');
					
						$("#contents-header-id").html(t + " ID");
						$("#contents-header-name").html(t + " name");
						
					
						
						getList(t,q);
							
						var o = $("input[name='typeid'").val();
						url = '?'+$("#the-form").serialize();
						getMPID(t,item.id,url,null,'nf',o);
						
				
					});
			}
			
				
			},
			error:function(err, ajaxOptions, throwError){
				console.log(err);
			}
			
	});
	
}
var use_cd;
function getList (t,q){

$("#list").empty();
	$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/lists"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
					NProgress.done();
				var stringheader ='<tr><td><div class="table-contents-list">\
											<div class="table-contents-list-radio-header1"><input type="radio" id="unselect-list" class="select-list" name="typeid" value="all"/> </div>\
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
					
					var string2  = '<tr><td><div class="table-contents-list"  id="list">\
											<div class="table-contents-list-radio-header1"><input type="radio" class="select-list" name="typeid" value="'+$.trim(item.nm)+'"/> </div>\
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
				
					$("#result-table").append('<tr><td><button type="button" class="btn btn-primary center" id="toggle-data" >Annual Data/Measuring Point(s)</button></td></tr>');
					
					$("input[name='typeid']").change(function(){
						$("#type-id-2").val(id);
						$("#type-nm-2").val($(this).val());
					});
					
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
	
}

function getMPID (t,q,s,y,f,o){
	NProgress.start();
	//$("#add-new-anndata").hide();
	$("#the-anndata").empty();
	$(".table-header").empty();
	$("#status").html("Loading data... Please wait");
	if (y == undefined || y ==null){
		y = parseInt((new Date).getFullYear()-1);
	}
	var absURL = url = "?t="+t+"&q="+q+"&y="+y+"&f="+f+"&o="+o;
	var linkify;
	$.ajax ({
		
			TYPE: "GET",
			url: "../controller/wells/mpid"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				if (!$.trim(data)){
					NProgress.done();
								$("#status").empty();
								$("#the-anndata").append('<thead>\
																		<tr>\
																		<th class="disable-sorting"><a hred="#" id="refresh-me"><i class="fa fa-refresh" aria-hidden="true" ></i> </a></th>\
																		<th class="sort">MPID  </th>\
																		<th class="sort">Name  </th>\
																		<th class="sort">Use Type  </th>\
																		<th class="sort">Paid  </th>\
																		<th class="sort">Data  </th>\
																		<th class="sort">Local Description  </th>\
																		<th class="sort">Action  </th>\
																		<th class="sort">County  </th>\
																		<th class="disable-sorting"> Multi-payment </th>\
																		<th class="disable-sorting"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>\
																		</tr>\
																		</thead>');
								$("#the-anndata").append('<tbody>\
																			<tr>\
																			<td  colspan=9 style="text-align:center;white-space:nowrap">No Data available</td>\
																			</tr>');
									$("#add-new-multipayment").hide();											
					
				}else{
								NProgress.done();
								
								
								$("#status").empty();
								$("#the-anndata").append('<thead>\
																		<tr>\
																		<th class="disable-sorting"><a hred="#" id="refresh-me"><i class="fa fa-refresh" aria-hidden="true" ></i> </a></th>\
																		<th class="sort">MPID  </th>\
																		<th class="sort">Name  </th>\
																		<th class="sort">Use Type  </th>\
																		<th class="sort">Paid  </th>\
																		<th class="sort">Data  </th>\
																		<th class="sort">Local Description  </th>\
																		<th class="sort">Action  </th>\
																		<th class="sort">County  </th>\
																		<th class="disable-sorting"> Multi-payment <a href="#" class="tool-tip" data-toggle="tooltip" title="you must pick 2 or more MPID to use Multi-payment"> [?]</a> <input type="checkbox" id="checkboxall"> </th>\
																		<th class="disable-sorting"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>\
																		</tr>\
																		</thead>');
								var isData;					  
								var isPaid;			
								
								
								$.each(data,function(i,item){
								
									//$('#my-county').text('My County: '+item.county_nm);
							
								
									/*if(y){
										if (item.data == 'Yes'){
											if (y == item.year){
												linkify = '<a href="https://wise.er.usgs.gov/
												wells/measpt?mpid='+item.mpid+'" target="__blank">'+item.mpid+'</a>';
												isData = 'Yes';
												
												if (item.paid == 'N'){
													isPaid = item.paid;
												}else{	isPaid = 'Y';}
											
											
											}else{
												linkify = item.mpid;
												isData = 'No';
												isPaid = 'Net';
											
											}
										}else{
												linkify = item.data == 'Yes' ? linkify = '<a href="https://wise.er.usgs.gov/wateruse/wells/measpt?mpid='+item.mpid+'" target="__blank">'+item.mpid+'</a>' : linkify = item.mpid;
												isData = 'No';
											
										}
									
									}else{*/
									
											linkify = item.data == 'Yes' ? linkify = '<a href="https://wise.er.usgs.gov/'+$dir+'/wells/measpt?mpid='+item.mpid+'&year='+y+'&diverter='+item.diverter_id+'&owner='+item.owner_id+'" target="__blank">'+item.mpid+'</a>' : linkify = item.mpid;
											isData = item.data;
									//}
										//console.log(item);
										/*
									if (item.paid == "undefined" || item.paid == null || item.paid == ""){
										
										isPaid = '<a href="#" id="quick-pay'+i+'">No</a>';
										
									}else if (item.paid == 'N' || item.paid == 'No'){
								
										isPaid= isData == 'Yes' ? isPaid = '<a href="#"  id="quick-pay'+i+'">No</a>': isPaid = 'No';
								
									}else if (item.paid == 'Y'){
										isPaid = 'Yes';
									}else{
										isPaid = 'No';
									}
									*/
									var disableMultiPayment; 
									 if (item.paid === undefined || item.paid === null){
										 	isPaid = '<a href="#" id="quick-pay'+i+'">No</a>';
									}else {
											
												if (isData == 'Yes' && item.paid == 'Yes' || item.paid == 'Y'){
													isPaid = 'Yes';
													disableMultiPayment = "disabled=disabled";
												}else if (isData == 'Yes' && item.paid == 'No' || item.paid == 'N' ){
													isPaid = '<a href="#"  id="quick-pay'+i+'">No</a>';
												}else if (isData == 'Yes' && item.paid == 'No' || item.paid == 'N'){
													isPaid = '<a href="#"  id="quick-pay'+i+'">No</a>';
												}else{
													disableMultiPayment = '';
												}
												if (isData == 'No' && item.paid == 'No'){
													isPaid = 'Payment Unavailable. Please Enter Data.  <a href="#" class="tool-tip" data-toggle="tooltip" title="Please add data first"> [?]</a> ';
													disableMultiPayment = "disabled=disabled";
														
												}
												
											
									 }
									//console.log(item.paid);
									$("#the-anndata").append('<tbody>\
																			<tr>\
																			<td><input type="radio" value='+item.mpid+' id="the-mpid'+i+'" class="the-mpid" name="thempid"/></td>\
																			<td>'+linkify+'</td>\
																			<td>'+item.name+'</td>\
																			<td>'+item.use_cd+' '+item.source_cd+'</td>\
																			<td>'+isPaid+'</td>\
																			<td>'+isData+'</td>\
																			<td>'+item.local_desc+'</td>\
																			<td>'+item.action+'</td>\
																			<td>'+item.county_nm+' ('+item.county_cd+')</td>\
																			<td><input type="checkbox" value= "'+item.diverter_id+'&'+item.owner_id+':'+item.mpid+'" id="payment-mpid'+i+'" class="mp-mpid"  '+disableMultiPayment+'/></td>\
																			<td><a href="#quick-edit-mpid" id="quick-edit'+i+'">Edit  <a href="#" class="tool-tip" data-toggle="tooltip" title="edit a MPID"> [?]</a>  </a></td>\
																			<td><input type="hidden" id="diverter_id'+i+'"   value="'+item.diverter_id+'"></td>\
																			<td><input type="hidden" id="owner_id'+i+'" value="'+item.owner_id+'"></td>\
																			</tr>\
																		</tbody>');
								
									$("#quick-pay"+i).click(function(e){
										e.preventDefault();
										$("#quick-paymodal").modal('show');
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
										
										getJSONData.appendStationDynamic(item.mpid,item.owner_id,item.diverter_id,y,item.name,item.name2,t);
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
								
								});
								$('.the-mpid').change(function(e){
									$(this).is(':checked') ? $("#add-new-anndata").show() : $("#add-new-anndata").hide();
								});
								$('.the-mpid').change(function(e){
									$(this).is(':checked') ? $("#modify-mpid").show() : $("#modify-mpid").hide();
								});
								$("#add-new-multipayment").hide();
								$("#checkboxall").click(function(){		

										$(".mp-mpid").not(':disabled').prop('checked', $(this).prop('checked'));
										
										$(this).is(':checked') ? $("#add-new-multipayment").show() : $("#add-new-multipayment").hide();
										
											var x = $("input.mp-mpid").filter(':checked').map(function(item) {
												return this.value;
											}).get();
											
											//console.log(x);
										$("#listmpid").html("<span id='multi'> "+x.join('<br>')+" </span> <input type='hidden' value='"+x.join(',')+"' name='multimpid'> " );
										$("#multipayment-mpid").html($("input.mp-mpid:checked").length);
								});
								var i=1;
								var multipaymentmpid;		
								$("input.mp-mpid").on("change", function(evt) {
									
									   if($("input.mp-mpid:checked").length > 1) {

											$("#add-new-multipayment").show();
												$("#multipayment-mpid").html($("input.mp-mpid:checked").length);
												if ($("input.mp-mpid:checked")){
												multipaymentmpid = $(this).val();
												//$("#listmpid").append('<div class ="multi" id="'+multipaymentmpid+'"> '+i+ '.)'+ multipaymentmpid +'  </div>'); 	
												}
										
											
									   }else{
											$("#add-new-multipayment").hide();
											//multipaymentmpid="";
													
									   }
									 
										i+=1;
								})
								$('#mutlipayment_type').val(t);
								$('#mutlipayment_year').val(y);
								$("input.mp-mpid").on("change", function(evt) {
									var x = $("input.mp-mpid").filter(':checked').map(function(item) {
												return this.value;
											}).get();
											
											console.log(x);
										$("#listmpid").html("<span id='multi'> "+x.join('<br>')+" </span> <input type='hidden' value='"+x.join(',')+"' name='multimpid'> " );
									
								});
									   
								//$("#listmpid").append('<div> MPID: ' + multipaymentmpid +'  </div>');
								$("#refresh-me").click(function(){
									getMPID (t,q,s,y,f,o);
									$("#add-new-anndata").hide();
									//$("#modify-mpid").hide();
									
								});
									$("#the-anndata").bdt();
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
	
	
		for ($i =currYear; $i>=startYear; $i--){
			
				if (month == '10'){
					 currWaterYear = currYear;
				}else{
					currWaterYear = (currYear-1);
					
				}
				if ($i == currWaterYear){
					$("#the-year").append("<option value='"+$i+"' selected>"+$i+"</option>");
				}else{
					$("#the-year").append("<option value='"+$i+"'>"+$i+"</option>");
				}
					
			
			
		}
		//$("#the-year").append("<option value='all'>All Years</option>");
		$("#year").val(currWaterYear);
}



	function init() {

		key_count_global = 0;
		$("#search-box").on("keypress", function() {
			key_count_global++;
			setTimeout("lookup("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
		});
	}
	function lookup(key_count) {
		var searchLabel = $("#searchLabel");
		var searchQuery = $("#search-box");
		var t = $("#type").val();
		var x = $("#x").val();
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
}
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
					$("#source_cd_station").on('change',function(){
						
						var source_cd  = $(this).val();
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
				
			console.log(selected_county);
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
								$.each (data, function (i,item){
									//console.log(item);
										$("#county_station").append('<option value = '+item.cd+' >'+item.nm+'</option> ');	
										$("#county_cd").append('<option value = '+item.cd+' >'+item.nm+'</option> ');	
									
									
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
								
								
										$("#mstate").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										
										$("#rstate").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										
										
									/*}*/
								});
									$("#state_county").val(selected_state);	
									$('#mstate').val(mailing_state);
									$("#rstate").val(selected_state)
								
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
										if ($.isNumeric(query) == false){
											list.push(data[i].nm+ ' ('+data[i].id+')');	
										}else{
											
											list.push(data[i].id+ ' ('+data[i].nm+')');	
										}
									
									
								});
								
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
									  limit: 15,
									  source: list,
										 templates: {
												empty: function(context){
												//  console.log(1) // put here your code when result not found
												  $(".tt-dataset").text('No Results Found');
												}
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
									  limit: 15,
									  source: list,
										 templates: {
												empty: function(context){
												//  console.log(1) // put here your code when result not found
												  $(".tt-dataset").text('No Results Found');
												}
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
								alert("Internal Server Error! Please contact the administrator");
							}
							
							
					});
				},
				appendStationDynamic: function(m,o,d,y,owner_nm,diverter_nm,t){
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
							//		console.log(item);
									if (t== 'Owner'){
										$("#list-owner").attr("placeholder",diverter_nm);
										$("#list-diverter").attr("placeholder",owner_nm);
									}else if (t == 'Diverter') {
										$("#list-owner").attr("placeholder",owner_nm);
										$("#list-diverter").attr("placeholder",diverter_nm);
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
									$("#huc2_station").html("<a href='#' id ='aHuc_station'>"+item.huc2+"</a>");
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
					this.getDataFromLayer();
						//Plugin magic goes here! Note that you cannot use the same layer object again, as that will confuse the two map controls
					//var osm2 = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {minZoom: 0, maxZoom: 13});
					//var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(map);
					
						
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
				
				
				getDataFromLayer: function(e,input){
						map.closePopup();
								console.log(input);
						console.log(e,input)
						if (!input){
							map.on('click',function(e){
								this.setView(e.latlng, 12)
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
				QueryData : function(e,input,c){
					console.log('1', input);
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
										console.log(item);
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
											var urlhuc = 'https://services.nationalmap.gov/arcgis/rest/services/wbd/MapServer/7';
											
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
											console.log(elevlat);	
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
									$('#county_station option:contains('+county1.toUpperCase()+')').attr('selected', true);
									$('input[name="county_cd"]').val(county1); ///.pro('selected',true);
									$('#aHuc_station').text(huc2);
									$('input[name="huc2"]').val(huc2);
									$('input[name="section"]').val(section1);
									$('input[name="township"]').val(township1);
									$('input[name="range"]').val(range1);
									
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
								
									$("input[name='mpid-new']").val(latDMS+lngDMS+'01');
								
									
									
				}
		}
	
$(document).ready(function(){
	yearfromddl();
	init();
	$('[data-toggle="tooltip"]').tooltip();   
	getJSONData.initData();
	usgsWellsMapping.wellMapInit();
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
		

	$('#the-modalMap').on('shown.bs.modal', function() {
		map.invalidateSize();
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
	searchQuery.attr("disabled",true);
	$(".select-type").click(function(){
		
	

		var text = $(this).text();
		switch (text){
		
			case 'Diverter':
				searchLabel.html('Diverter')	
				$('.typeahead').typeahead('destroy')
				searchQuery.removeAttr("disabled");
			break;	
			
			case 'Owner':
				searchLabel.html('Owner')
				$('.typeahead').typeahead('destroy')
				searchQuery.removeAttr("disabled");
			break;
			
			case 'Facility':
				searchLabel.html('Facility')
				$('.typeahead').typeahead('destroy')
				searchQuery.removeAttr("disabled");
			break;
			
			default:
				searchLabel.html('Select Type')
				$('.typeahead').typeahead('destroy')
				
			break;
		}
	});


	
	var progress = false;
	$("#filter").click(function(){
		NProgress.start();	
		var type = searchLabel.text();
		var query = encodeURIComponent(searchQuery.val());
		
	
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
			
			appendInfo(type,query);
			
			
			
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
	searchQuery.one("keypress",function(){
			
			NProgress.start();
	});
	var t= $("#just-ignore-me").val();
	var q= $("#just-ignore-me-too").val();
	
	var clickedmeyear = false;
	$("#the-form").change(function(){
		var y = $("#the-year").val();
		var f = $("#isMyCounty").val();
		var o = $("#type-nm-2").val();
		$("#year").val(y);
		clickedmeyear = true;
		
		var t = $("#just-ignore-me").val();
		var q = $("#just-ignore-me-too").val();
		var o = $("input[name='typeid'").val();
	
		
		if ($("#isMyCounty").is(":checked")){
			getMPID(t,q,null,y,f,o);
		}else{
			getMPID(t,q,null,y,'nf',o);
		}
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
		multipayment= false;
	});
	$("#add-new-anndata").click(function(){
		$("#form-add-data").attr("action","https://wise.er.usgs.gov/"+$dir+"/wells/add_anndata");
		$("#form-add-data").attr("method","GET");
		multipayment= false;
	});
	$("#add-new-multipayment").click(function(){
		$("#quick-multipayment").modal('show');
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
		url =  url+'?'+s;
		
		$.ajax ({
			
			TYPE: method,
			url: url,
			success:function(){
				
			
				
					h = 850;
					w = 1500;
					 // Fixes dual-screen position                         Most browsers      Firefox
					var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
					var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

					var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
					var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

					var left = ((width / 2) - (w / 2)) + dualScreenLeft;
					var top = ((height / 2) - (h / 2)) + dualScreenTop;
					var newWindow = window.open(url, 'Wells 3.0 : Smart Window', 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

					// Puts focus on the newWindow
					if (window.focus) {
						newWindow.focus();
					}
				
				
			
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
						changeMonth: true,
						changeYear: true,
						yearRange: '1985:'+yearnow
						});
	$("#multi_dateacct").datepicker({
						changeMonth: true,
						changeYear: true,
						yearRange: '1985:'+yearnow
						});
	$("#form-savepayment").submit(function(e){
		e.preventDefault();
	
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
									var t= $("#just-ignore-me").val();
								var t= $("#just-ignore-me").val();
								var q= $("#just-ignore-me-too").val();
								getMPID(t,q,null,$("#the-year").val());
								$("#form-savepayment")[0].reset();
								$("#quick-paymodal").modal().hide();
							}else{
								alert('Error');
							}
						}
						});

	});
	$("#form-savemultipayment").submit(function(e){
		e.preventDefault();
	
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
								$("#save-payment").attr('disabled','disabled');
								//$("#add-payment").removeAttr('disabled');
									var t= $("#just-ignore-me").val();
								var t= $("#just-ignore-me").val();
								var q= $("#just-ignore-me-too").val();
								getMPID(t,q,null,$("#the-year").val());
								$("#form-savepayment")[0].reset();
								$("#quick-paymodal").modal().hide();
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
							var c = confirm('Are you sure you want to edit this MPID? Any changes are final and cannot be reverted back. Would you like to continue? ');
							
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
									
										}else{
											alert('Data Exist - A MPID is already located at this point');
										}
									}
								});
							}else{
								return false;
							}
							
						}
		});
});


</script>

</head>

<body>

<?php  include '../includes/html/header_new.php'; ?>
<div class="container" id ="container">

<div class="row " >
	<div class="col-sm-4 col-sm-offset-5 auto"  style="padding-top:50px;" id ="main-title">
		<h3>AR Water - Main Center</h3>
	</div>
	<div class="col-md-4 col-md-offset-3" id="the-centers" style="z-index:1;">

			 <div class="form-groups">
				<div class="input-group">
					<div class="input-group-btn" >
						<div class="btn-group"> 
							<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="select-type">
								<span data-bind="label" id="searchLabel">Select Type</span> <span class="caret"></span>
							</button> 
							
							<ul class="dropdown-menu" role="menu">
								<li><a href="#" class="select-type">Diverter</a></li>
								<li><a href="#" class="select-type">Owner</a></li>
								<li><a href="#" class="select-type">Facility</a></li>
							</ul>
						</div>
						<div class="btn-group"> 
									<label class="btn btn-primary">
										<input type="checkbox" id="filterbycounty" checked> Filter by my County 
									</label>
						</div> 
						<div class="btn-group" id="scrollable-dropdown-menu">					
							<input type="text" class="form-control typeahead tt-query" id="search-box" placeholder="<--- Select Type"/>
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
			<input type='hidden' id='x' value="sc">
			
		</form>
	<div class="modal fade" id="the-modal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
  <div class="modal-dialog" role="document" style="z-index:1;">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="the-modal-label">Annual Data Center</h4>
      </div>
      <div class="modal-body">
	  <div>
	  <form id='the-form'>
	   <input type='hidden' id="just-ignore-me" name="t">
	  <input type='hidden' id="just-ignore-me-too" name="q">
	 
		
        <table id="the-anndatacenter">
		<tr><td>Select Water Year: <select name ='year' id ='the-year'   class="the-selection" ></select></td></tr>
		<tr><td> Filter result by my County (<?php echo $_SESSION['COUNTY_NM']; ?>) <input type="checkbox" id="isMyCounty" value="<?php echo $_SESSION['COUNTY_CD']; ?>"></td></tr>
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
		
		</div>
		</form>
		
		<div id="add-data">
			<form method='GET'  id='form-add-data'>
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
				
				
				<input type="submit"  id="add-new-mpid" value ="+ Add Meas. Pt." class="btn btn-primary" >
				<input type="submit"  id="add-new-anndata" value ="+ Add Ann. Data." class="btn btn-primary" >
			</form>
		
		</div>
		<div style="display:grid;">
				<button  id="add-new-multipayment" class="btn btn-primary" >+ Multi-payment</button>
				<!-- <input type="submit"  id="modify-mpid" value ="+ Modify Meas. Pt." class="btn btn-primary" > -->
		</div>
			
				
				
	
	
      </div>
      <!-- <div class="modal-footer">
        
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
</div>
<!-- end table -->

</div>
	<!-- quick payment modal --> 
	
	<!-- -->
	<div class="col-sm col-sm-offset-5 auto"> <button style="width:300px;" id="bugs" class="btn btn-primary btn-block" onclick="window.location.href='//wise.er.usgs.gov/bugs/wubugreporting.html'"><i class="fa fa-bug" aria-hidden="true"></i> Report a bug </button> </div>
	<?php #reportsbybarry ?>
	

	<div class="col-sm col-sm-offset-5 auto"> <button style="width:300px;" id="bugs" class="btn btn-primary btn-block" onclick="window.location.href='//wise.er.usgs.gov/wells/ReportMain.php'"><i class="fa fa-bug" aria-hidden="true"></i> Reports Menu 2.0 </button> </div>
</div>
<div class="modal fade" id="quick-paymodal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" style="z-index:999999 !important;">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" style="width:500px; margin-left:40%">
					  <div class="modal-header">
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
						
						<button type="button" class="btn btn-primary">Save changes</button>
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
								<div class="collapse" id="listofMPID">
								  <div class="card card-block" id="listmpid"   style="height:150px;white-space: nowrap;overflow-y: scroll; text-overflow: ellipsis;" name="mpid">
									
								  </div>
								 
								</div>
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
									<td><input type="text" id="multi_dateacct" name="dateacct" style="z-index:99999 !Important;" readonly/></td>
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
						
						<button type="button" class="btn btn-primary">Save changes</button>
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
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div> -->
					</div>
				  </div>
				</div>
	<form method="POST" action="../controller/wells/editmpid" id="the-form2" onkeypress="return event.keyCode != 13;">
		<div class="modal fade" id="quick-edit-mpid" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" style="z-index:9999999 !important">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" style="width:1500px; position:relative; right:70%" >
					  <div class="modal-header">
							<div id="status-div"></div><div id="percentage-div"></div> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>
								<form >
									<input type="hidden" id="did" name="did" value="800349">
									
									<input type="hidden" id="year" name="year" value="2016">
									<!--<input type="hidden" id="usecd" name="use_cd" value="AG">
									<input type="hidden" id="method" name="method" value="E">-->
									<input type="hidden" id="typeid" name="typeid" value="">
									<input type="hidden" id="typenm" name="typenm" value="">

								<input type="hidden" id="oid" name="oid" value="">
								<table id="the-mpidtbl" class="table">
									<tbody>
										<tr>
											<th colspan="3">
												<center>Measurement Point Information ID : <span id="mpid-span"> </span></center>
												<input type="hidden" name="mpid-h" value="">
												<input type="hidden" name="mpid-new">
											</th>
										</tr>
										<tr>
												<td> 
													<div style="display:inline-flex; float: left; line-height:2;">
														<div style="margin-right:30px;"> Owner: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:200px;" class="form-control typeahead tt-query" id="list-owner"  name="new_owner"/>
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
																		<input type="text" style="width:200px;" class="form-control typeahead tt-query" id="list-diverter" name="new_diverter"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-diverter" checked> Filter Diverter by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
											<td> Facility: N/A </td>
										</tr>
										<tr>
											<td colspan="3"> Local Description:
												<input type="text" name="local_desc" style="width:300px;" class="required" id="local_desc_station"> <span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td> Action Code:
												<select name="action_cd" id ="action_cd_station" class="select2 required">
													<option value="--">--</option>
													<option value="WD">Withdrawal</option>
													<option value="DL">Delivered</option>
													<option value="RL">Released</option>
													<option value="PR">Production</option>
												</select><span class="important">*</span> </td>
											<td> Source:
												<select name="source_cd" id="source_cd_station" class="select2 required">
													<option value="">--</option>
													<option value="SW">Surface Water</option>
													<option value="GW">Ground Water</option>
													<option value="SP">Spring Water</option>
													<option value="TW">Transferred Water</option>
													<option value="FW">Facility Water</option>
												</select><span class="important">*</span> </td>
											<td> Tract #:
												<input type="text" name="tract_no" id="tract_no_station" maxlength="5"> Farm #:
												<input type="text" name="farm_no" id="farm_no_station" maxlength="5"> </td>
										</tr>
										<tr>
											<td> Quad #:
												<input type="text" name="quadno" id="quad_no_station" maxlength="4">
											</td>
											<td> Operator #:
												<input type="text" name="opnum" id="operator_no_station" maxlength="5">
											</td>
											<td> Well #:
												<input type="text" name="wellno" id="well_no_station"  maxlength="10">
											</td>
										</tr>
										<tr>
											<td colspan="2"> Source Name:
												<input type="text" name="source_nm"  id="source_nm_station"  style="width:300px;">
											</td>
											<td> Dam
												<input type="radio" value="Y" name="dam" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="dam" class="required">No<span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<div class="hidesw"> Aquifer Code:
													<select name="aquifer" id="aquifer_station" class="select2 required" style="width:30%;">
													   
													</select><span class="important driller-imp">*</span>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<div class="hidesw"> Driller Name:
													<select name="driller" id="driller" class="select2 required" style="width:30%;">  </select> <span class="important driller-imp">*</span> </div>
											</td>
										</tr>
										<tr>
											<td colspan="2"> Date Well Drilled or Relift Installed:
												<input type="text" id="date-drilled" name="date_drilled" class="required" readonly="readonly">
												<input type="checkbox" id="date-drilled-unknown" class="required">
												<label for="date-drilled-unknown" id="label-date-drilled-unknown">Check if unknown</label><span class="important driller-imp">*</span> </td>
											<td colspan="1">
												<div id="hideme" style="display: none;"> Well Depth:
													<input type="number" class="numbers" name="well_depth" step="any" maxlength="4" readonly="readonly"><span class="important">*</span>
												</div>
											</td>
										</tr>
										<tr>
											<th colspan="3">
												<center>Location of Withdrawal</center>
											</th>
										</tr>
										<tr>
											<td> County: <select id="county_station" name= "county_station"  style="display: inline-block;"></select>
												<input type="hidden" name="county_cd" value="Grant">
											</td>
											<td> State:  <select id="state_county" name ="state_cd" style="display: inline-block;"></select></td>
											<td> HUC: <div id="huc_station" style="display: inline-block;"></div>
												<input type="hidden"  name="huc">
											</td>
										</tr>
										<tr>
											<td>
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
											<td> Section:
												<input type="text" name="section" value="7" class="required"><span class="important">*</span> Township:
												<input type="text" name="township" value="5S" class="required"><span class="important">*</span>
											</td>
											<td> Range:
												<input type="text" name="range" value="15W" class="required"> <span class="important">*</span> </td>
										</tr>
										<tr>
											<td> Latitude (DMS/DD): <span name="lat"></span>
												<input type="hidden" name="latDMS">
												<input type="hidden" name="latDD" >
											</td>
											<td> Longitude (DMS/DD): <span name="lng"></span>
												<input type="hidden" name="lngDMS">
												<input type="hidden" name="lngDD">
											</td>
											<td> Altitude:
												<input type="text" name="elevation" class="required"> <span class="important">*</span>
											</td>
										</tr>
										<tr>
											<th colspan="3">
												<center>Pump Information</center>
											</th>
										</tr>
										<tr>
											<td colspan="2"> Pump Horsepower:
												<input type="number" name="pump_hp" class="required numbers" step="any" maxlength="3"><span class="important">*</span>
											</td>
											<td> Discharge Pipe Diameter (inches) :
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
											<td> Pump Type:
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
											<td> Reclaimed Waste:
												<input type="radio" value="Y" name="rec_waste" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="rec_waste" class="required">No<span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<center>
													<input type="submit" id="add" class="btn btn-primary" value="Save Edited Measuring Point">
												</center>
											</td>
										</tr>
									</tbody>
								</table>

							</form>
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div> -->
					</div>
				  </div>
				</div>
		</form>
</body>
</html>

