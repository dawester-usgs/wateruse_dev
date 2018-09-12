<?php 
	
	if(!defined('BASE_PATH')) {
		echo '<script> window.location.href ="https://wise.er.usgs.gov/'+$dir+'/forbidden"; </script>';
 
	}
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
<style>
.wrapper{
	padding:10px;
}

.nested-table{
	background-color:transparent !important;
	padding:0;
	margin:0;
}
.bdt thead th {
    cursor: pointer;
}

.bdt .sort-icon {
    width: 10px;
    display: inline-block;
    padding-left: 5px;
}
.table{
	width:50% !important;
	margin-left:25% !important;
}

.table tr td {
	width: 50% !important;
	padding:40px;
}
.table-header-txt{
	font-size: 14px !important;
    padding: 4px;
    text-align: center;
}
</style>
</head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


<body>
<script>
	function getAuditTrail(id,type){
		// $.ajax ({
		
			// TYPE: "GET",
			// url: "../controller/wells/audit_trail?id="+id+"&type="+type,
			// ContentType:"application/json",
			// dataType:"json",
			// async: "false",
			
			// success: function(data){
	
				// $("#trail").append('<thead>\
																		// <tr>\
																		// <th class="sort">MPID  </th>\
																		// <th class="sort">New Owner ID  </th>\
																		// <th class="sort">New Diverter ID  </th>\
																		// <th class="sort">Old Owner ID  </th>\
																		// <th class="sort">Old Diverter ID  </th>\
																		// <th class="sort">Move Type  </th>\
																		// <th class="sort">Time  </th>\
																		// <th class="sort">By User  </th>\
																		// </tr>\
																		// </thead>');
					// $.each(data,function(i,item){
						// console.log(item);
						// $("#trail").append('<tr>\
													// <td>'+item.mpid+'</td>\
													// <td>'+item.new_owner_id+'</td>\
													// <td>'+item.new_diverter_id+'</td>\
													// <td>'+item.old_diverter_id+'</td>\
													// <td>'+item.old_owner_id+'</td>\
													// <td>'+item.move_type+'</td>\
													// <td>'+item.cdate+'</td>\
													// <td>'+item.cname+'</td></tr>');
							// $("#trail").bdt();
					// });
					
				
				
			// }
		// });
	}
	function getTrailInfo (){

		$.ajax ({
		
			TYPE: "GET",
			url: "../controller/wells/get_trail",
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			
			success: function(data){
				$.each(data,function(i,item){
					$("#page_link").append("<option value='"+item.page_link+"'>"+item.page_link+"</option>");
				});
			}
		});
	}
	function getUsers (){
		
		$.ajax ({
		
			TYPE: "GET",
			url: "../controller/wells/users",
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			
			success: function(data){
				

				$.each(data,function(i,item){
					$("#users").append("<option value='"+item.user_id+"'>"+item.user_id+"</option>");
				});
			}
		});
	}
	$(document).ready(function(){
		var id = $("#id").val();
		var type= $("#type").val();
		getTrailInfo();
		getUsers();
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();


		$("#date_from").datepicker({
					maxDate: new Date(currentYear, currentMonth, currentDate),
						keyupMonth: true,
						keyupYear: true,
						changeMonth: true,
						changeYear: true,
						 onSelect: function() { 
							var dateObject = $(this).datepicker('getDate','+2d');
							 $("#date_to").datepicker( "option", "minDate", dateObject );
							// $("#date_to").datepicker( "option", "maxDate",  );
						}
				});
		
		$("#date_to").datepicker({
						
						keyupMonth: true,
						keyupYear: true,
						changeMonth: true,
						changeYear: true,
						

		});		
		
		$("#time_from").change(function(){
			var $getTimefrom = $(this).val();
			var completeHour = 24;
			var $setTimeTo;
			var z= (parseInt($getTimefrom)+1);
			$setTimeTo = (completeHour-$getTimefrom);
			$("#time_to").empty();
			for(var $i=z;$i<=completeHour; $i++){
				$("#time_to").append("<option value='"+$i+"'>"+$i+"</option>");
			}
		});
	});
</script>
<div class="wrapper">
	<input type="hidden" id="id" value="<?php echo $_GET['id'];?>">
	<input type="hidden" id="type" value="<?php echo $_GET['type'];?>">
	<form method = "POST" id="form-async"> 
		
		
		<table class="table">
			<thead>
				<tr>
					<th colspan=2>
						<div class="table-header-txt"> Audit Trail <sup style="color:red;">BETA </sup> </div>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Users: </td>
					<td><select name="users" id="users" ></select> </td>
				</tr>
				<tr>
					<td> Action: </td>
					<td> 
						<select name="action" class = "custom-select">
							<option value="INSERT">INSERT</option>
							<option value="UPDATE">UPDATE</option>
							<option value="DELETE">DELETE</option>
							<option value="LOGIN">LOGIN</option>
							<option value="LOGOUT">LOGOUT</option>
							<option value="ERROR">-*ERROR</option>
						</select>
					</td>
				</tr>
				<tr>
					<td> Page</td>
					<td><select name="page_link" id="page_link"></select></td>
				</tr>
				<tr >
					<td> Date: </td>
					<td>From 
						<input type="text"  name="date_from" id="date_from" class="date" readonly="readonly"> to 
						<input type="text"  name="date_to" id="date_to" class="date" readonly="readonly"> 
					</td>
					
				</tr>
				<tr>
					<td>Time (24 Hours format)</td>
					<td><select id="time_from" name="time_from">
							<option value="00">00</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
						</select>
						to 
						<select id="time_to" name="time_to"></select>
					</td>
				</tr>
				<tr >
					
					<td colspan=2> 
						<div class="table-header-txt"><input type="submit" value="Search Criteria"></div>
					</td>
					
				</tr>
			</tbody>
		</table>
	</form>

	<table class="table" id="trail">
	
	</table>
</div> 

</body>
</html>