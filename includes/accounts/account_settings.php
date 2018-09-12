<?php 
include ("../includes/config.php"); 
if (!$_SESSION){
	echo '<script>alert("Login is required. Please login to continue."); window.location.href ="https://wise.er.usgs.gov/wateruse/accounts/?redirect=settings";</script>';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<title> My Account</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>USGS Arkansas Water Science Center</title>
<!-- 
<link href="/styles/common.css" rel="stylesheet" type="text/css" />
<link href="/styles/custom.css" rel="stylesheet" type="text/css" />
<link href="/styles/styles.css" rel="stylesheet" type="text/css" />
<link href="/styles/framework.css" rel="stylesheet" type="text/css" /> -->
<link href="../includes/css/jquery.dataTables.css" rel="stylesheet" />
<link href="../includes/css/select2.css" rel="stylesheet" />
<link rel="stylesheet" href="../includes/css/sitecss.css">
<script type ='text/javascript' src ='../js/jquery-2.2.3.min.js'> </script>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<!-- <script type = 'text/javascript' src="js/select2.full.min.js"></script> -->
<script src="../js/select2.min.js"></script>
<script type ='text/javascript' src ='../js/jquery.tablesorter.min.js'> </script>
<script type ='text/javascript' src ='../js/jquery.simpletip-1.3.1.min.js'> </script>
<script type ='text/javascript' src ='../js/jquery.dataTables.min.js'> </script>
<script type ='text/javascript' src ='../js/core.js'> </script>

</head>
<body> 
<?php include("../includes/html/header_new.php"); ?>

<div class= 'main'>
<div class='container'>
	<div id='account-div'>

		<div id ='side-menu'> 
			<div id='side-menu-title'> 
				My Account
			</div>
			
			<div class='sides'>
				<a class='personal-info'>&nbsp;Personal Info </a>
					<div id='pinfo'>
						<div class='pinfo-child'><a id ='personal'> Your Personal Details/Info </a></div>
						

					</div>
			</div>
			
			<div class='sides'>
				<a class='personal-info'>&nbsp; Account Preferences</a>
					<div id='pinfo'>
						<div class='pinfo-child'><a> Add User </a></div>
						<div class='pinfo-child'><a> Remove User </a></div>
						<div class='pinfo-child'><a> Block User </a></div>

					</div>
			</div>
		</div>
	</div>
	<div id ='account-div-edit'><div>Dynamic Info Goes here</div></div>
</div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  
  <div class="modal-content">
	
     <div style='position:relative; left:98%;'> <a id='closemodal'> X </a> </div>
	 <div>
	 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel tempus ex, nec aliquet tortor. Suspendisse ac ante vitae est sagittis elementum. Maecenas et eros eleifend, accumsan massa sed, venenatis felis. Duis gravida augue lorem. Quisque in elit sed augue elementum maximus. Pellentesque semper sit amet erat non tempus. Suspendisse aliquam nisi vehicula neque gravida fringilla. Phasellus sit amet egestas urna. Nam ac elit pharetra, luctus est in, commodo enim. Ut quis lorem venenatis, euismod nisl quis, tincidunt ante. Cras molestie molestie felis sed fermentum. Proin placerat, magna sed malesuada ultrices, felis dui bibendum metus, nec pellentesque leo tortor et ante. Donec sodales mi congue sapien ultrices, id faucibus ipsum vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
	Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam ac orci libero. Proin tempor lorem a vehicula pretium. Praesent eros ipsum, porta et mollis sed, commodo et diam. Etiam non vulputate augue. Donec non purus ut dui interdum ultrices. Nullam laoreet interdum imperdiet. Morbi ut mi ut risus pharetra tempor. Phasellus non nunc lacus. Nullam malesuada diam ut risus tempus volutpat.
	</div>
	</div>
 


</div>
</div>
<div id='footer'>
<center>
<div> </div>
	<div>
		<ul><u> Home </u>
			<li><a href='https://wise.er.usgs.gov/wateruse/home'> About Water Use </a></li>
			<li><a href='https://wise.er.usgs.gov/wateruse/home#categories'> Water Use Categories</a></li>
		
		</ul>
		
	</div>
	
	<div>
		<ul><u>Search  </u>
			<li><a href="https://wise.er.usgs.gov/wateruse/wateruse_data?q=pub" > Public Data </a></li>
			<li><a href="https://wise.er.usgs.gov/wateruse/wateruse_data?q=int" > Internal </a></li>
		</ul>
	</div>
	<div id ='theteam'>
		<ul ><u>The Project Team  </u>
			<li><a href='#'> Hans Solo</a></li>
			<li><a href='#'> Princess Leia </a></li>
			<li><a href='#'> Darth Vader </a></li>
			<li><a href='#'> Chewbacca </a></li>
		</ul>
		
	</div>
	<div> <ul> </ul>
	</div>
</center>
	<div id ='usgs-doi-info'><ul style="list-style:none;"> <a href='https://www.doi.gov/'> Department of Interior</a> | <a href='https://www.usgs.gov'>United States Geological Survey -- Lower Mississippi Gulf (Arkansas)</a>
		<li> 401 Hardin Rd. Little Rock, Arkansas 72211</li>
		<li> Phone: (501) 228-3628</li>
		<li> Email: dummy_email@dummyusgs.gov </li>
		<li><a href="http://answers.usgs.gov/" target="_blank">Contact Us</a></li></ul>
	</div>
	<div id='external-img'><a href='http://www.takepride.gov/' target='_blank'><img src ='../includes/css/img/takepride.jpg'  width=150 height = 50 /></a><a href='https://www.usa.gov/' target='_blank'></img><img src ='../includes/css/img/usa.gov.jpg'  width=150 height = 50/></a></div>

</div>


<a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>
</body></html>

