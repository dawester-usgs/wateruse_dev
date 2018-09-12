<?php 
include ("includes/config.php"); 

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

<a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>
<div id ='fillers'> </div>

<div class= 'main'>
<section id = 'home-about-us'> 
<!--<div style='padding-bottom:20px;'><font color="red"><h3> As a result of the lapse in appropriation, we will be prohibited from actively monitoring or responding to questions until further notice.</h3></font></div >-->

<div id = "home-contents"> <center><span><h1> Water Use </h1><h3> Lower Mississippi Gulf - Arkansas</h3></span></center> <p> <?php echo $wateruseheader?> </p></div>
 
<div id ='categories' style='padding-top:20px;'> <h2> Water Use Categories <h2> <hr /> </div>
<div class ='home-clear-container' > 
	<div class ='box category '> <div class ='image round category'><a id ='categories-irr'><img src='../wateruse/includes/css/img/irrigation_waterwheel.jpg' width =180' height ='180' alt='Irrigation'></img></a></div></div>
	<div class ='box category '> <div class ='image round category'><a id ='categories-lv'> <img src='../wateruse/includes/css/img/livestock.jpg' width =180' height ='180' ></img></a></div></div>
	<div class ='box category '> <div class ='image round category'><a id ='categories-nuke'><img src='../wateruse/includes/css/img/arkansas-nuclear-one.jpg' width =180' height ='180' ></img></a></div></div>
	<div class ='box category '> <div class ='image round category'><a id ='categories-ind'><img src='../wateruse/includes/css/img/industrial_plant.jpg' width =180' height ='180' ></img></a></div></div>
	<div class ='box category '> <div class ='image round category'><a id ='categories-min'><img src='../wateruse/includes/css/img/yukon.jpg' width =180' height ='180' ></img></a></div></div>
	<div class ='box category '> <div class ='image round category'><a id ='categories-dom'><img src='../wateruse/includes/css/img/domestic.jpg' width =180' height ='180' ></img></a></div></div>
	<div class ='box category '> <div class ='image round category'><a id ='categories-ws'><img src='../wateruse/includes/css/img/siloamsprings.jpg' width =180' height ='180' ></img></a></div></div>
	<div class ='box category '> <div class ='image round category'><a id ='categories-com'><img src='../wateruse/includes/css/img/amusement_park_small.jpg' width =180' height ='180' ></img></a></div></div>
</div>
</div>

<!--
<div id="myModal" class="modal">

  
  
  <div class="modal-content">
	
     <div style='position:relative; left:98%;'> <a id='closemodal'> X </a> </div>
	 <div>
	 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel tempus ex, nec aliquet tortor. Suspendisse ac ante vitae est sagittis elementum. Maecenas et eros eleifend, accumsan massa sed, venenatis felis. Duis gravida augue lorem. Quisque in elit sed augue elementum maximus. Pellentesque semper sit amet erat non tempus. Suspendisse aliquam nisi vehicula neque gravida fringilla. Phasellus sit amet egestas urna. Nam ac elit pharetra, luctus est in, commodo enim. Ut quis lorem venenatis, euismod nisl quis, tincidunt ante. Cras molestie molestie felis sed fermentum. Proin placerat, magna sed malesuada ultrices, felis dui bibendum metus, nec pellentesque leo tortor et ante. Donec sodales mi congue sapien ultrices, id faucibus ipsum vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
	Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam ac orci libero. Proin tempor lorem a vehicula pretium. Praesent eros ipsum, porta et mollis sed, commodo et diam. Etiam non vulputate augue. Donec non purus ut dui interdum ultrices. Nullam laoreet interdum imperdiet. Morbi ut mi ut risus pharetra tempor. Phasellus non nunc lacus. Nullam malesuada diam ut risus tempus volutpat.
	</div>
</div>-->

</div>
</section> 
 <!-- / div for your main content-->

<!-- BEGIN USGS Footer Template -->

<footer class="footer">
	<div class="tmp-container">
		<!-- .footer-wrap -->
			<!-- .footer-doi -->
			<div class="footer-doi">
				<!-- footer nav links -->
				<ul class="menu nav">
					<li class="first leaf menu-links menu-level-1"><a href="https://www.doi.gov/privacy">DOI Privacy Policy</a></li>
					<li class="leaf menu-links menu-level-1"><a href="https://www.usgs.gov/laws/policies_notices.html">Legal</a></li>
					<li class="leaf menu-links menu-level-1"><a href="https://www2.usgs.gov/laws/accessibility.html">Accessibility</a></li>
					<li class="leaf menu-links menu-level-1"><a href="https://www.usgs.gov/sitemap.html">Site Map</a></li>
					<li class="last leaf menu-links menu-level-1"><a href="https://answers.usgs.gov/">Contact USGS</a></li>
				</ul>
				<!--/ footer nav links -->      
			</div>
			<!-- /.footer-doi -->

			<hr>

		<!-- .footer-utl-links -->
		<div class="footer-doi">
			<ul class="menu nav">
				<li class="first leaf menu-links menu-level-1"><a href="https://www.doi.gov/">U.S. Department of the Interior</a></li>
				<li class="leaf menu-links menu-level-1"><a href="https://www.doioig.gov/">DOI Inspector General</a></li>
				<li class="leaf menu-links menu-level-1"><a href="https://www.whitehouse.gov/">White House</a></li>
				<li class="leaf menu-links menu-level-1"><a href="https://www.whitehouse.gov/omb/management/egov/">E-gov</a></li>
				<li class="leaf menu-links menu-level-1"><a href="https://www.doi.gov/pmb/eeo/no-fear-act">No Fear Act</a></li>
				<li class="last leaf menu-links menu-level-1"><a href="https://www2.usgs.gov/foia">FOIA</a></li>
			</ul>
			</div>			
		<!-- /.footer-utl-links -->
		<!-- .footer-social-links -->
		<div class="footer-social-links">
			<ul class="social">
				<li class="follow">Follow</li>
				<li class="twitter">
					<a href="https://twitter.com/usgs" target="_blank">
						<i class="fa fa-twitter-square"><span class="only">Twitter</span></i>
					</a>
				</li>
				<li class="facebook">
					<a href="https://facebook.com/usgeologicalsurvey" target="_blank">
						<i class="fa fa-facebook-square"><span class="only">Facebook</span></i>
					</a>
				</li>
				<li class="googleplus">
					<a href="https://plus.google.com/112624925658443863798/posts" target="_blank">
						<i class="fa fa-google-plus-square"><span class="only">Google+</span></i>
					</a>
				</li>
				<li class="github">
					<a href="https://github.com/usgs" target="_blank">
						<i class="fa fa-github"><span class="only">GitHub</span></i>
					</a>
				</li>
				<li class="flickr">
					<a href="https://flickr.com/usgeologicalsurvey" target="_blank">
						<i class="fa fa-flickr"><span class="only">Flickr</span></i>
					</a>
				</li>
				<li class="youtube">
					<a href="http://youtube.com/usgs" target="_blank">
						<i class="fa fa-youtube-play"><span class="only">YouTube</span></i>
					</a>
				</li>
				<li class="instagram">
					<a href="https://instagram.com/usgs" target="_blank">
						<i class="fa fa-instagram"><span class="only">Instagram</span></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- /.footer-social-links -->
	</div>
		<!-- /.footer-wrap -->	
</footer>
<!-- END USGS Footer Template- -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKQR8KP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>
  </body> <!-- closing div for body -->
</html>

