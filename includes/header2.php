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


<header>
<a href="#" id="logo"></a>
<nav>
<a href="#" id="menu-icon" ></a>
<ul>
<li><a href="#">Home</a></li>
<li><a href="#" id="wusearch">Search</a></li>
<li><a href="#" id="about">About Water Use Project</a></li>

<li><a href="#">Contact USGS</a></li>
<?php if ($_SESSION) {?>
<li id="user">
	<a href="#" id ="uDetails"> Hello, <?php print ucfirst($_SESSION['USER_ID']); ?></a>
	<ul id="user-sub-menu"><li><a href="#"> Account Settings </a></li> 
		<li><a href="#" id ="logout">Logout</a> </li>
	</ul>
</li>
<?php }?>
</ul>
</nav>
</header>

<div id ='fillers'> </div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <img src = "../wateruse/includes/css/img/wuseloading.gif" id='loading'>
    <div class='loading'> Loading </div>
  </div>

</div>
<div class= 'main'>
<span id='title'><h1>Water Use Search</h1></span>
</div>
</body></html>


