<?php 
include ("../../includes/config.php"); 

if (!$_SESSION){
	
}
?>

<html>
<head>
<link href="../includes/css/jquery.dataTables.css" rel="stylesheet" />
<link href="../includes/css/select2.css" rel="stylesheet" />
<link rel="stylesheet" href="../includes/css/sitecss.css">
<script type ='text/javascript' src ='../js/jquery-2.2.3.min.js'> </script>
<script type ='text/javascript' src ='../js/select2.min.js'> </script>
</head>
<script>

function fetchcounty(){
	
	$("#county-info").empty();
	$("#county-info").css("width", "205px");
	$("#user-id-info").css("width", "200px");
	$("#company-nm-info").css("width", "200px");
	$("#county-info").append('<option disabled>Loading data please wait...<option>');
	var county = $("#county").val();
	
	$.ajax ({
			type: "POST",
			url: "https://wise.er.usgs.gov/wateruse/json/fetchcounty",
			ContentType: "application/json",
			dataType: "json",
			success:function(data){

				$("#county-info").empty();
				if (county == '153'){
					var the_usgs = "USGS";
					$("#county-info").append("<option value='"+county+"'>"+the_usgs+" ("+county+")</option>");
				}else{
					$("#county-info [value='"+county+"']").attr("selected",true);
				}
				
				$.each (data, function (i,item){
					$("#county-info").append("<option value='"+data[i].cd+"'>"+data[i].nm+" ("+data[i].cd+")</option>");
				});
				$("#county-info option[value='"+county+"']").attr("selected",true);
				$("#county-info").select2();
			}
	});
}
$(document).ready(function(){
	fetchcounty();
		//<tr><td>New Password: </td><td><input type='text' id ='new-pwd-info'/></td></tr>
	//<tr><td>Retype New Password: </td><td><input type='text' id ='new-pwd-info-retype'/></td></tr>

	
});
</script>
<body>
<h3> Personal Information </h3>
<div id ='pinfo' class='account-settings'>
	<div id ='acct' class='account-settings'>
	<table>
	<tr><td>User ID:</td><td> <input type='text' id ='user-id-info' value ='<?php echo $_SESSION['USER_ID']; ?>' /></td></tr>
	<tr><td>Company Name:</td><td><input type='text' id ='company-nm-info' value ='<?php echo $_SESSION['COMPANY_NM']; ?>' /></td></tr>
	<tr><td>County:</td><td><select id ='county-info'></select><input type='hidden' id='county' value ='<?php  echo $_SESSION['COUNTY_CD']; ?>'/></td></tr>
	</table>
	
	</div>
</div>
<h3> Update Account </h3>
	<div id ='acct' class='account-settings'>
	<table>
	<tr><td> Please type your Password: </td><td> <input type='password' id ='password-info'></td></tr>

	</table>
	
	</div>
</body>
</html>