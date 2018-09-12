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
#map {
	height:75%;
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
						empty: '<div class="empty-message" style="padding-left:5px"> No result for '+t+' '+q+' </div>'
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
						$("#usecd").val(item.use_cd);
						$("#just-ignore-me").val(t);
						$("#just-ignore-me-too").val(item.id);
						$("#type").val(t);
						$("#id").val(item.id);
						$("#nm").val(item.nm);
						
						url = '?'+$("#the-form").serialize();
						getMPID(t,item.id,url);
						
					
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
																				Address: <div id="table-address-mailing" class="editable" name="mtreet" onkeypress="return (this.innerText.length <= 50)">'+item.mstreet+' </div>\
																			</div>\
																			<td>\
																				<div class="table-contents">\
																				Address: <div  id="table-address-residential" class="editable" name="location" onkeypress="return (this.innerText.length <= 50)">'+item.location+'</div>\
																			  </div>\
																			  </td>\
																			</tr>\
																			<tr>\
																			 <td>\
																				<div class="table-contents">\
																					<div> City: </div><div id="table-mcity-mailing" class="editable" name="mcity" onkeypress="return (this.innerText.length <= 50)">'+item.mcity+'</div>\
																				</div>\
																			</td>\
																			<td>\
																				<div class="table-contents">\
																					<div> City: </div><div id="table-rcity-residential" class="editable" name="rcity" onkeypress="return (this.innerText.length <= 50)">'+item.city+'</div>\
																				</div>\
																			</td>\
																			</tr>\
																			<tr>\
																				<td>\
																					<div class="table-contents">\
																						<div> State: </div> <div id="table-mstate-mailing" class="editable editable-dropdown-state" name="mstate" onkeypress="return (this.innerText.length <= 2)">'+ item.mstate +'</div>\
																					</div>\
																				</td>\
																				<td>\
																					<div class="table-contents">\
																						<div> State: </div> <div id="table-rstate-residential" class="editable editable-dropdown-state" name="rstate" onkeypress="return (this.innerText.length <= 2)">'+ item.state_cd +'</div>\
																					</div>\
																				</td>\
																			</tr>\
																			<tr>\
																				<td>\
																					<div class="table-contents">\
																						<div> ZIP code: </div><div id="table-zip-mailing" name="zip" class="editable" onkeypress="return (this.innerText.length <= 9)">'+ item.zip+'</div>\
																					</div>\
																				  </td>\
																				  <td>\
																					<div class="table-contents">\
																						<div> ZIP code: </div><div id="table-zip-mailing" name="zip" class="editable" onkeypress="return (this.innerText.length <= 9)">'+ item.zip+'</div>\
																					</div>\
																				  </td>\
																			</tr>\
																			<tr>\
																				<td>\
																				<div class="table-contents">\
																				  <div> County:  </div> <div id="table-county-mailing" class="editable-dropdown-mcounty"  id="mcountymcountynm" name="mcountynm">' + item.county_nm+'</div></td>\
																				  </div>\
																				<td>\
																				<div class="table-contents">\
																					 &nbsp;&nbsp;\
																				  </div></td>\
																			</tr>\
																			<tr id="hide-me-not">\
																				<td>\
																				<div class="table-contents">\
																				  Comment: <div id="table-comment" class="editable"  id="comment" name="comment"  onkeypress="return (this.innerText.length <= 200)">' + item.comment+'</div></td>\
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
							if (k % 2 != 0){
								$('.editable').css("border","1px solid red");
								$('.editable').attr("contenteditable","true");
								
								if (item.comment == null || item.comment == ""){
									$("#table-comment").click(function(){
										$(this).html("");
									});
								}
								
								$('#editInfo').html("(Save)");
								$('.editable-dropdown-mcounty').html("");
								$('.editable-dropdown-rcounty').html("");
								$('.editable-dropdown-mcounty').append('<select class="county" name="county_cd" id="county_cd"></select>');
								$('.editable-dropdown-rcounty').append('<select class="county" name="rcounty" id="rcounty"></select>');
									if (item.comment == null || item.comment == ""){
										item.comment = "N/A";
										$("#table-comment").css("width","300px");
									}
								$.ajax({
										type: "POST",
										url: "../json/fetchcounty",
										ContentType: "application/json",
										dataType: "json",
										success:function(data){
												$(".county").append('<option value ="--" >County</option>');
												$.each(data,function(i,item){
													$('.county').append('<option value='+item.nm+'>'+item.nm+'</option>');
												});
													
											
										}
									});
							
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
								var mstate = $("#table-mstate-mailing").text();
								var rcity = $("#table-rcity-residential").text();
								var rstate = $("#table-rstate-residential").text();
								var rzip = $("#table-rzip-residential").text();
								var zip = $("#table-zip-mailing").text();
								var county = $("#county_cd").val();
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
								$("#comment-result").val(comment);
							
								
								
								
								if (county != "--" ){
									$("#table-county-mailing").html('');
									$("#table-county-mailing").html(county);
									$("#county-result").val(county);
								}else{
									$("#table-county-mailing").html('');
									$("#table-county-mailing").html(item.county_nm);
									$("#county-result").val(item.county_nm);
									
								}
								
								
										
								$("#mstate-result").val(mstate);							
								$("#rstate-result").val(rstate);
								
									var data = $("#info-form").serialize();
									

									$.ajax({
										TYPE: "GET",
										url: "../controller/wells/updateinfo?"+data,
										ContentType:"application/json",
										dataType:"json",
										async: "false",
										success:function(data){
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
											<div class="table-contents-list-radio-header1"><input type="radio" id="unselect-list" class="select-list" name="typeid" value=""/> </div>\
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

function getMPID (t,q,s,y){
	NProgress.start();
	//$("#add-new-anndata").hide();
	$("#the-anndata").empty();
	$(".table-header").empty();
	$("#status").html("Loading data... Please wait");
	
	var absURL = url = "?t="+t+"&q="+q;
	var linkify;
	$.ajax ({
		
			TYPE: "GET",
			url: "../controller/wells/mpid"+absURL,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
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
														</tr>\
														</thead>');
				var isData;					  
				var isPaid;					  
				$.each(data,function(i,item){
					$("#actioncd").val(item.action);
					$("#sourcecd").val(item.source_cd);
					//$('#my-county').text('My County: '+item.county_nm);
				console.log(data[i])
				
					if(y){
						if (item.data == 'Yes'){
							if (y == item.year){
								linkify = '<a href="https://wise.er.usgs.gov/wateruse/wells/measpt?mpid='+item.mpid+'" target="__blank">'+item.mpid+'</a>';
								isData = 'Yes';
								
								if (item.paid == 'N'){
									isPaid = item.paid;
								}else{	isPaid = 'Y';}
							
							
							}else{
								linkify = item.mpid;
								isData = 'No';
								isPaid = 'N';
							
							}
						}else{
								linkify = item.data == 'Yes' ? linkify = '<a href="https://wise.er.usgs.gov/wateruse/wells/measpt?mpid='+item.mpid+'" target="__blank">'+item.mpid+'</a>' : linkify = item.mpid;
								isData = 'No';
							
						}
					
					}else{
							linkify = item.data == 'Yes' ? linkify = '<a href="https://wise.er.usgs.gov/wateruse/wells/measpt?mpid='+item.mpid+'" target="__blank">'+item.mpid+'</a>' : linkify = item.mpid;
							isPaid = item.paid;
							isData = item.data;
					}
						
					if (item.paid == null){
						item.paid = 'N';
					}
					
					$("#the-anndata").append('<tbody>\
														<tr>\
														<td><input type="checkbox" value='+item.mpid+' id="the-mpid'+i+'" class="the-mpid" name="thempid[]"/></td>\
														<td>'+linkify+'</td>\
														<td>'+item.name+'</td>\
														<td>'+item.use_cd+' '+item.source_cd+'</td>\
														<td>'+isPaid+'</td>\
														<td>'+isData+'</td>\
														<td>'+item.local_desc+'</td>\
														<td>'+item.action+'</td>\
														<td>'+item.county_nm+' ('+item.county_cd+')</td>\
														</tr>\
														</tbody>');
					
					
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
				$("#refresh-me").click(function(){
					getMPID (t,q,s,y);
					
				});
					$("#the-anndata").bdt();
					$("#search").attr("placeholder","Search Table");
				
			
			
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
		$("#the-year").append("<option value='all'>All Years</option>");
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
	
	
$(document).ready(function(){
	yearfromddl();
	init();
	$("#add-new-anndata").hide();
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
	$("#the-year").change(function(){
		var b = $(this).val();
		b == 'all' ? b = '2017' : b;
		$("#year").val(b);
		clickedmeyear = true;
		
		var t = $("#just-ignore-me").val();
		var q = $("#just-ignore-me-too").val();

		getMPID(t,q,null,$(this).val());
	});
	

	$("#method").val("E");
	$("#the-method").change(function(){
		var b = $(this).val();
		clickedmemethod= true;
		$("#method").val(b);
	});
	
	$("#add-new-mpid").click(function(){

			$("#form-add-data").attr("action","https://wise.er.usgs.gov/wateruse/wells/add_mpid");
	});
	
	$("#add-new-anndata").click(function(){

	
			$("#form-add-data").attr("action","https://wise.er.usgs.gov/wateruse/wells/add_anndata");

		
	
		
	});
	$("#form-add-data").submit(function(e){
		e.preventDefault();
		s = $(this).serialize();
		var url = $(this).attr('action');
		$.ajax ({
		
			TYPE: "GET",
			url: url+'?'+s,
			success:function(){
				url = url+'?'+s;
				
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
			error:function(){
				alert('There is something wrong!! Please contact the Admins :)');
			}
		});
		   //window.open("https://wise.er.usgs.gov/wateruse/wells/add_mpid", 'formpopup', 'width=400,height=400,resizeable,scrollbars');
	
	});
	$("#add-new-anndata").click(function(){
		$("#form-add-data").attr("action","https://wise.er.usgs.gov/wateruse/wells/add_anndata");
	});
	/*
	setInterval(function(){
		var url = $("#the-form").serialize();
		getMPID(t,q,'?'+url);
		//alert('refreshed');
	}, 5000);
	*/
});


</script>

</head>

<body>

<?php  include '../includes/html/header_new.php'; ?>
<div class="container" id ="container">

<div class="row">
	<div class="col-md col-md-offset-6" id ="main-title">
	<h3> Main Center</h3>
	</div>
	<div class="col-md-4 col-md-offset-3" id="the-centers" >

			 <div class="form-group">
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
						<<div class="btn-group"> 
									<label class="btn btn-primary">
										<input type="checkbox" id="filterbycounty" checked> Filter by my County 
									</label>
						</div>  
						
					</div> 
				<div id="scrollable-dropdown-menu">					
					<input type="text" class="form-control typeahead tt-query" id="search-box" placeholder="<--- Select Type"/>
				</div>
				
					<span class="input-group-btn">
						<button id="filter" class="btn btn-primary btn-block">
							Submit
						</button>
					</span>
					
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
			<input type ="hidden" id="rstate-result" name="rstate">
			<input type ="hidden" id="county-result" name="county">
			<input type ="hidden" id="comment-result" name="comment">
			<input type ="hidden" id="zip-result" name="zip">
			<input type ="hidden" id="t-result" name="type">
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
				<input type="submit"  id="add-new-anndata" value ="+ Add Ann. Data." class="btn btn-primary" >
			</form>
			
				
				
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
	
	<div style="width:500px; margin-left:370px;"> <button id="bugs" class="btn btn-primary btn-block" onclick="window.location.href='//wise.er.usgs.gov/bugs/wubugreporting.html'"><i class="fa fa-bug" aria-hidden="true"></i> Report a bug </button> </div>
</div>

</body>
</html>

