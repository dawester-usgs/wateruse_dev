<?php
include ("includes/config.php");

$security = new security();	
	$action = "LOGOUT";
	$page_link="Logout";
	$time = date('m/d/Y h:i:s a');
	$security->AuditTrail($action,$page_link,$_SESSION['USER_ID'],"SUCCESS: ".$_SESSION['USER_ID']." successfully logged out [IP ".$_SERVER['REMOTE_ADDR']."; TIME: ".$time." (CDT)] ",$tbl_nm);
session_unset($_SESSION);
#flush sessions cookie
session_destroy();
header("Location:http://wise.er.usgs.gov/wateruse");
?>