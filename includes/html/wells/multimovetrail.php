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

</style>
</head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


<body>
<script>
	function getAuditTrail(id,type){
		$.ajax ({
		
			TYPE: "GET",
			url: "../controller/wells/movetrail?id="+id+"&type="+type,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			
			success: function(data){
				$("#trail").empty();
				$("#trail").append('<thead>\
																		<tr>\
																		<th class="sort">MPID  </th>\
																		<th class="sort">New Owner ID  </th>\
																		<th class="sort">New Diverter ID  </th>\
																		<th class="sort">Old Owner ID  </th>\
																		<th class="sort">Old Diverter ID  </th>\
																		<th class="sort">Move Type  </th>\
																		<th class="sort">Time  </th>\
																		<th class="sort">By User  </th>\
																		</tr>\
																		</thead>');
					$.each(data,function(i,item){
						console.log(item);
						$("#trail").append('<tr>\
													<td>'+item.mpid+'</td>\
													<td>'+item.new_owner_id+'</td>\
													<td>'+item.new_diverter_id+'</td>\
													<td>'+item.old_diverter_id+'</td>\
													<td>'+item.old_owner_id+'</td>\
													<td>'+item.move_type+'</td>\
													<td>'+item.cdate+'</td>\
													<td>'+item.cname+'</td></tr>');
							
					});
					
				$("#trail").bdt();
				
			}
		});
	}
	$(document).ready(function(){
		var id = $("#id").val();
		var type= $("#type").val();
		getAuditTrail(id,type);
	});
</script>
<div class="wrapper">
	<input type="hidden" id="id" value="<?php echo $_GET['id'];?>">
	<input type="hidden" id="type" value="<?php echo $_GET['type'];?>">
	<table class="table">
			<tr>
				<th><center>Multi-move Audit Trail <sup>BETA </sup></center></th>
			</tr>
		<tr>
			<td><?php echo $_GET['type']?>  ID : <?php echo $_GET['id'];?></td>
		</tr>
	
		<tr>
			<td> User ID: <?php echo $_SESSION['USER_ID']; ?> </td>
		</tr>
		
		
	</table>

	<table class="table" id="trail">
	
	</table>
</div> 

</body>
</html>