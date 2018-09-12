<?php 
include ("includes/config.php"); 
 if(!defined('BASE_PATH')) {
  echo '<script> window.location.href ="https://wise.er.usgs.gov/wateruse/forbidden"; </script>';
 
}; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta charset="UTF-8">
<?php include ("includes/header_config.php"); ?>

</head>
<body> 
<?php include("header_new.php"); ?>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <img src = "../wateruse/includes/css/img/wuseloading.gif" id='loading'>
    <div class='loading'> Loading </div>
  </div>

</div>
<div class= 'main'>
<div id='hint'> Hover your mouse on the picture to reveal true identity!! </div>

	<section id = 'about-us'> 
<div id = 'about-container'>
<center><h2 id ='title-about-us'>  Water Use Project Team </h2> <h5 id ='sub-title-about-us'> Lower Mississippi Gulf - Arkansas</h5></center>
</div>
<div id = 'the-team'> 
	<div class ='box person'> <div class ='image round'><a class='team-member' id ='t1'><img src='../wateruse/includes/css/img/westerman.jpg' ></img></a><h3 id='1st'> Drew Westerman </h3> <p id='1st-p'>Hydrologist</p> <div class = 'details' id='details1'> Drew Westerman is a hydrologist for the U.S. Geological Survey Lower Mississippi-Gulf Water Science Center at Little Rock. He has worked in water resource investigations of groundwater and surface water that have included multiple states and six countries. <a href='https://www.usgs.gov/staff-profiles/drew-westerman?qt-staff_profile_science_products=3#qt-staff_profile_science_products' target ='_blank'> [Read More...] </a></div></div></div>
	<div class ='box person'> <div class ='image round'><a class='team-member' id ='t2'><img src='../wateruse/includes/css/img/pl.png' ></img></a><h3>Rebecca Bowling </h3><p>General</p><div class = 'details'> Lorem Ipsum Dolor sit amet Lorem Ipsum Dolor sit amet Lorem Ipsum Dolor sit amet  Lorem Ipsum Dolor sit amet</div></div></div>
	<div class ='box person'> <div class ='image round'><a class='team-member' id ='t3'><img src='../wateruse/includes/css/img/luke.jpg' ></img></a><h3>Barry Jackson </h3><p>Web Master | IT Specialist</p><div class = 'details'> He is currently work a full time capacity with USGS as a IT Specialist, started May 1999. His work in operating systems ranges from Unix to Windows (Every version known to man since Windows 3.1). Software design work and languages from Perl,Php,Javascript... <a href='https://www.usgs.gov/staff-profiles/barry-jackson' target ='_blank'> [Read More...] </a></div></div></div>
	<div class ='box person'> <div class ='image round'><a class='team-member' id ='t4'><img src='../wateruse/includes/css/img/dacurro.jpg' ></img></a><h3 id ='4th'>Alexe Dacurro </h3><p id ='4th-p'>Web Developer | UI/UX Designer</p><div class = 'details' id ='details4'> Alexe Dacurro is Graduate of Bachelor of Science in Information Science at University of Arkansas at Little Rock. Currently working as Student Intern for USGS LMG - Little Rock.</div></div></div>
	
</div>
</section>
</div>
<div id ='footer'>
<center>
<div> </div>
	<div>
		<ul><u> Home </u>
			<li><a href='../wateruse/home'> About Water Use </a></li>
			<li><a href='../wateruse/home#categories'> Water Use Categories</a></li>
		
		</ul>
		
	</div>
	
	<div>
		<ul><u>Search  </u>
			<li><a href="wateruse_data?q=pub" > Public Data </a></li>
			<li><a href="wateruse_data?q=int" > Internal </a></li>
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
	<div id='external-img'><a href='http://www.takepride.gov/' target='_blank'><img src ='../wateruse/includes/css/img/takepride.jpg'  width=150 height = 50 /></a><a href='https://www.usa.gov/' target='_blank'></img><img src ='../wateruse/includes/css/img/usa.gov.jpg'  width=150 height = 50/></a></div>

</div>
<a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>
</body></html>

