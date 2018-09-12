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
.text-info{
	margin-bottom:5%;
}
.th-ako-sayo{
	background: -moz-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* ff3.6+ */
	background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #0D87D4), color-stop(1%, #0F88D4), color-stop(100%, #ffffff)); /* safari4+,chrome */
	background: -webkit-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* safari5.1+,chrome10+ */
	background: -o-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* opera 11.10+ */
	background: -ms-linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* ie10+ */
	background: linear-gradient(45deg, #0D87D4 0%, #0F88D4 1%, #ffffff 100%); /* w3c */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#0D87D4',GradientType=1 ); /* ie6-9 */
}
#table-add td{
	padding: 15px;
	padding-left: 10%;
}
label{
	padding-right:10px;
}
.txt{
	width:500px;
	height:30px;
}
.comment{
	width:600px;
	height:60px;
}
.important{
	color:#e53030;
}
.error{
	border: 1px solid red !important;
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
</style>
<script>

var key_count_global = 0;
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
				/*if (isEmpty<1){
					$('#result-table').empty();
					$("#filter").attr("disabled",true);
				}else{
					$("#filter").removeAttr("disabled");
				}*/
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
function getEverythingElse(){
	var t =$("#type").val();
		$.ajax({
					type: "GET",
					url: "../json/fetchtype?t="+t,
					ContentType: "application/json",
					dataType: "json",
					success:function(data){
					
						$.each(data,function(i,item){
								$('#id-temp').append(item.id);
								$('#id').val(item.id);
						});
					}
				});
		$.ajax({
					type: "POST",
					url: "../json/fetchcounty",
					ContentType: "application/json",
					dataType: "json",
					success:function(data){
						$("#county_cd").append('<option value ="--" >Select County</option>');
							$.each(data,function(i,item){
								$('#county_cd').append('<option value='+item.cd+'>'+item.nm+'</option>');
							});
						}
		});
		$.ajax({
					type: "POST",
					url: "../json/fetchusetype2",
					ContentType: "application/json",
					dataType: "json",
					success:function(data){
							$.each(data,function(i,item){
								var checked;
								if (item.use_cd =="AG"){
									checked ="selected";
								}else{
									checked = "";
								}
								$('#use_cd').append('<option value='+item.use_cd+' '+checked+'>'+item.use_nm+'</option>');
							});
						}
		});			
			$.ajax({
					type: "POST",
					url: "../json/fetchstate",
					ContentType: "application/json",
					dataType: "json",
					success:function(data){
						//$("#mstate").append('<option value ="--" >Select State</option>');
					//	$("#state").append('<option value ="--" >Select State</option>');
							$.each(data,function(i,item){
								var checked;
								if (item.ab =="AR"){
									checked ="selected";
								}else{
									checked = "";
								}
								$('#mstate').append('<option value='+item.ab+' '+checked+'>'+item.nm+'</option>');
								$('#state').append('<option value='+item.ab+' '+checked+'>'+item.nm+'</option>');
							});
						}
				});	
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
var getJSONData = {
	
	getOwner: function (filter,query){
		NProgress.start();	
		$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchowner?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								NProgress.done();	
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
									 $(' #list-owner ').typeahead('destroy');
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
	getDiverter : function (filter,query){
		NProgress.start();	
		$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchdiverter?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list =  new Array();
								NProgress.done();
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
									 $(' #list-diverter').typeahead('destroy');
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
	}
	
};
var typingTimer;                //timer identifier
var doneTypingInterval = 1350;  //time in ms, 5 second for example


$(document).ready(function(){
	getEverythingElse();
	  $('form').keydown(function(event){
		if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}
	  });
	
	$("#sameas").change(function(){
		var address = $("#address1").val();
		var city = $("#mcity").val();
		var zip = $("#zip1").val();
		var mstate = $("#mstate").val()
		
		if ($(this).is(":checked")){
			
			mstate == "--" ? (alert('Please fill all the Mailing Address') , $(this).attr("checked",false)): ($("#state").val(mstate),$("#address2").val(address),$("#rcity").val(city),$("#zip2").val(zip));
		
		}else{
			$("#address2").val("");
			$("#rcity").val("");
			
			
		}
	});
	$("#telno").mask('(000) 000-0000');
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
						
						//console.log($val);
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
											 location.reload();
											alert('Succesfully saved! ');
										}else{
											alert('Error');
										}
								   }
							});
						}
						
		});
		
		$("#diverter").on('keypress', function(){
			var res = $(this).val();
			if (res !=null){
				getInfo('diverter',res,null);
			}
		
		});
			$("#list-owner").keyup(function(){
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
					});
					$("#list-diverter").keyup(function(){
							clearTimeout(typingTimer);
							
						if ($("#list-diverter").val) {
								typingTimer = setTimeout(function(){
									//do stuff here e.g ajax call etc....
																					
									var searchQuery = $("#list-diverter");
									var t = $("#type").val();
									var x = $("#x").val();
									var query = encodeURIComponent(searchQuery.val());
													
									if (query != ""){
									
											if ($("#filter-owner").is(':checked')){
												getJSONData.getDiverter(1,query,"list-diverter");
											}else{
												getJSONData.getDiverter(0,query,"list-diverter");
											}	
													
													
									}		
													
								}, doneTypingInterval);
							}
					});
});
 </script>

 </head>
  

<body>
<?php  include '../includes/html/header_new.php'; ?>

<?php

$type = $_GET['t'];
	if ($type == 'owner'){
		// do nothing for now
	}else if ($type =='diverter'){
		// do nothing for now
	}else if ($type =='facility'){
		// do nothing for now
	}else{
		echo '<script>alert("Internal Server Error") </script>';
		return false;
	}
		
?>
  <div class="container" id="container">	
	<p class="h3 text-info text-center text-info"> <strong>Water Use: Add <?php echo ucfirst($_GET['t']);?> Information</strong></p>
  <!--owner information-->
    <input type = "hidden">
	<form id="form-async" action="../controller/wells/saveinfo" method="POST">
		<input type="hidden" name="type" id="type" value ="<?php echo $_GET['t'] ?>">
		
		
		<table class="table table-bordered" id="table-add">
		<tr>
		<th colspan=3 class="th-ako-sayo">
			<div class="col-l-2 text-center" id="table-header">
				<p class="h4"><strong><?php echo ucfirst($_GET['t']);?>  Information</strong></p>	
			</div>
			</th>
		</tr>
			<tr>
				<td colspan=2> 
				<div class="table-contents">
					<label for="name-owner"><?php echo ucfirst($_GET['t']);?> Name:  </label>
					<input type="text" class ="txt required" id="input-name" name="nm"  onkeypress="return (this.value.length <= 40)">
					<span class="important">*</span>					
				</div> 
				</td>
				<td colspan=1>
					<label for="table-contents">ID:  </label>
					<span id = "id-temp"></span>
					<input type ="hidden" id="id" name="id">
				</td>	
			</tr>
			<?php if ($_GET['t'] == 'facility'){ ?>
					<tr>
						<td colspan=3> 
						<div class="table-contents" style="
							z-index: 99999 !important;
							position: relative;">
					
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
								
										
						</div> 
						</td>
					</tr>
					<tr>
						<td colspan=3>
						<div class="table-contents">
								
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
									
						
						</div>
						</td>	
					</tr>

				
			<?php } ?>
			<tr>
				<td colspan=2>
				<label for="input-contact">Telephone Number:  </label>
				<input type="text" class="required" id="telno"  name="phone" onkeypress="return (this.value.length <= 13)"> 
				<span class="important">* </span>
				<span >Example: (501) 228-3600</span>
				</td>
				<td colspan=1>
				<label for="input-country">County:</label>
				<select class="county required" name="county_cd" id="county_cd"></select>
				<span class="important">*</span>
				</td>
			</tr>
			<tr>
				<td colspan=3>
				<label for="input-contact">Use Type:  </label>
					<select class="usecd required" name="use_cd" id="use_cd"></select>
					<span class="important">*</span>
				</td>
			
			</tr>
			<?php if ($_GET['t'] == 'facility'){ ?>
				<tr>
					<td colspan=3>
					<label for="input-permit">PWS or Permit #:  </label>
						<input type="text" class="txt" id="input-permit" name="permit" onkeypress="return (this.value.length <= 40)">
					</td>
				
				</tr>
				
			<?php } ?>
<!--Mailing Address-->	
		<tr>
		<td colspan=3 class="th-ako-sayo">
			<div class="col-l-2 text-center" id="table-header">
				<p class="h4"><strong>Mailing Address</strong></p>	
			</div>
			</td>
		</tr>
			<tr>
				<td colspan=3> 
				<div class="table-contents">
					<label for="name-info"> Mailing Address:  </label>
					<input type="text" class ="txt required" id="address1" name="maddress" size=75  onkeypress="return (this.value.length <= 50)"> 
					<span class="important">*</span>
				</div>
				</td>
			</tr>
			
			<tr>
				<td>
				<label for="input-contact">City:  </label>
				<input type="text" name="mcity"  class="required" id="mcity"  onkeypress="return (this.value.length <= 50)"> 
				<span class="important">*</span>				
				</td>
				<td>
				<label for="input-contact" >Zip:  </label>
					<input type="text" name="zip" class="required" id="zip1" onkeypress="return (this.value.length <=9)">
				
				<span class="important">*</span>
				<td>
				<label for="input-country">State:  </label>
				
				<select name="mstate" id="mstate" class="mstate" class="required">
				
				</select>
				<span class="important">*</span>
				</td>			
				
			</tr>

<!--Residential Address-->
		<tr>
		<td colspan=3 class="th-ako-sayo">
			<div class="col-l-2 text-center" id="table-header">
				<p class="h4"><strong>Residential Address</strong></p><input type ="checkbox" id="sameas">Same as Mailing Address
			</div>
			</td>
		</tr>
	
		
<!--street Address-->
			<tr>
				<td colspan=3> 
				<div class="table-contents">
					<label for="name-info"> Residential Address:  </label>
					<input type="text" class ="txt" id="address2" name="location" size=75  onkeypress="return (this.value.length <= 50)" >
				</div> 
			</tr>
			</tr>
			
			<tr>
				<td >
				<label for="input-contact" >City:  </label>
				<input type="text" name="city" id="rcity"> 
				</td>
				<td>
				<label for="input-contact" >Zip:  </label>
					<input type="text" name="rzip" id="zip2" onkeypress="return (this.value.length <=9)">
			
				</td>
				<td >
				<label for="input-country"> State:  </label>
				<select name="state" id="state">
				  
				</select>
				</td>			
			 </tr>
			 
			 <tr>
			<td colspan=3> 
				<div class="table-contents col-l-10" >
					<label for="name-info" style="position:relative;bottom:27px;">Comment:  </label>
					<textarea class ="txt comment" name="comment" id="input-name" onkeypress="return (this.value.length <= 200)" style=" resize:none; width:900px;"></textarea>
					
				</div>
				</td>
			</tr>	
			
			  <tr>
			
				<td colspan=3 >
					<input type= "submit" class="btn btn-primary center" style="position:relative;left:40%;" value="Save <?php echo ucfirst($_GET['t']); ?>">  
					<input type= "submit"  class="btn btn-primary center" style="position:relative;left:40%;" value="Reset Form">
				</td>
			</tr>	
			 
	</table>
	</form>
</div>

</body>
</html>
	
	