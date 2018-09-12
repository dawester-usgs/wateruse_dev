<?php 
	include ("../includes/config.php"); 
	
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


</head>
<body>
<table border="1"><tbody><tr><th>
District Reports
</th></tr><tr>
<td class="head_center">
<form name="form1" method="post" border="2" action="https://wise.er.usgs.gov/wells/index.htm"> 
<input type="hidden" name="control" value="none"> 
<input type="button" value="Certificates &amp; Receipt" onclick="window.location='/wells/REPORTS/search_odf.php?id=albW48YF.5P5k&amp;title=Reports+Certificates+Reciept'"><br>

<!--
onClick="move_page('/wells/REPORTS/certificates.php');"><br>
-->

<input type="button" value="Address List" width="250" onclick="window.location=&quot;REPORTS/lists.php?id=&amp;title=Address+List+Options&quot;">
<br>
<input type="button" value="Reminder Notice" onclick="window.location='/wells/REPORTS/report_reminder.php?id='"><br>
<!--
<input type="submit" name="reportUnregQues" value="Not Registered Lists / Withdrawals List" width="250" > <br>
-->
<input type="button" value="Not Registered Lists / Withdrawals List" onclick="window.location=&quot;REPORTS/lists.php?id=albW48YF.5P5k&amp;title=Not+Registered+Lists+/+Withdrawals+List&quot;" width="250"> <br>

<input type="button" value="County Crop Stats" width="250" onclick="window.location=&quot;/wells/REPORTS/county_crop_stats.php&quot;"><br>

<input type="button" value="District Registration Forms" onclick="window.location='/wells/REPORTS/search_odf.php?id=albW48YF.5P5k&amp;title=Print+Registration+Forms'"><br>

<input type="button" value="Blank District Registration Form" onclick="window.location='/wells/REPORTS/blank_form.docx'"><br>

<input type="button" value="Measurment Point Information" onclick="window.location='/wells/REPORTS/search_odf.php?remote_user=alexe&amp;title=Measurement+Point+Information'"> 
<br> 
<input type="button" value="District Invoice" width="250" onclick="window.location=&quot;/wells/REPORTS/district_invoice.php?id=albW48YF.5P5k&quot;"><br>
<input type="button" value="Mail-out Survey &amp; Final Notice" onclick="window.location='/wells/REPORTS/notice.php?id=albW48YF.5P5k&amp;title=Mail-out+Survey+/+Final+Notice'"><br>
<input type="button" value="Flow Meter Report" onclick="window.location='/wells/REPORTS/reports_flow_meter.php?id=albW48YF.5P5k'"><br>
<input type="button" value="Water Well Construction Report" onclick="window.location='/wells/REPORTS/waterwell_lookup.php'"><br>
</form></td></tr>
<tr><th>ANRC Reports </th></tr>
<tr><td class="head_center"> 
<input type="button" value="Delinquent Notices" onclick="window.location='/wells/REPORTS/notice.php?id=albW48YF.5P5k&amp;title=Delinquent+Notices'"><br>
<input type="button" value="Annual Data Progress Report" onclick="window.location=&quot;/wells/REPORTS/state_stats.php&quot;"><br>
<input type="button" value="ANRC Registration Forms" onclick="window.location=&quot;/wells/REPORTS/yearly_forms.php&quot;"><br>
<input type="button" value="Surface Water Registration Report" onclick="window.location=&quot;/wells/REPORTS/report_surface_water.php&quot;"><br>
<input type="button" value="Aquifer Ground Water Report" onclick="window.location=&quot;/wells/REPORTS/report_aquifer.php&quot;"><br>
<input type="button" value="GW Report by Aquifer &amp; Use Type" onclick="window.location='/wells/REPORTS/report_aquifer_usecd.php?id=albW48YF.5P5k'"><br>
<input type="button" value="GW Category Aquifer Report" onclick="window.location=&quot;/wells/REPORTS/report_big_aquifer_usecd.php&quot;"><br>
<input type="button" value="Annual Registration Report" onclick="window.location=&quot;/wells/REPORTS/report_usecd.php&quot;"><br>

<input type="button" value="User Entry Report" onclick="window.location=&quot;/wells/REPORTS/report_cname.php&quot;"><br>


<input type="submit" value="Main Menu" width="250" onclick="window.location='https://wise.er.usgs.gov/wells/'"> 
</td></tr></tbody></table>
</body>
</html>