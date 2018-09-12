<?php if(!defined('BASE_PATH')) {
   die('Direct access not permitted');
   include ("includes/header_config.php"); 
}; ?>
<?php  if ($isDev == true) { ?><div style="height:20px;background-color: red; color: white; text-align:center;width:100%;"> HALT! THIS IS A TEST DEVELOPMENT PAGE. YOU MAY AND WILL EXPERIENCE BUGS</div> <?php  } ?>
<a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>

<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="https://wise.er.usgs.gov/<?php echo $dir; ?>/includes/css/common.css" rel="stylesheet" type="text/css" media="screen" />
<link href="https://wise.er.usgs.gov/<?php echo $dir; ?>/includes/css/custom.css" rel="stylesheet" type="text/css" media="screen" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 

  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TKQR8KP');</script>
<!-- End Google Tag Manager -->
   
</head>

<body> <!-- opening div for body -->
<!-- BEGIN USGS Applications Header Template -->
<header id="navbar" class="header-nav"  role="banner">
  <div class="tmp-container">
      <!-- primary navigation bar -->
  		<!-- search bar-->
      <div class="header-search">
       <a class="logo-header" href="https://www.usgs.gov/" title="Home">
          <img class="img"  src="https://wise.er.usgs.gov/<?php echo $dir; ?>/images/logo.png"  alt="Home" />
        </a>
        <form action="https://www.usgs.gov/science-explorer-results" method="GET" id="search-box">
         <div class="fa-wrapper"><label for="se_search" class="only">Search</label>
          <input id="se_search" type="search" name="es" placeholder="Search">
          <button class="fa fa-search" type="submit">
            <span class="only">Search</span>
			 </button></div>
        </form>
      </div>
      <!-- end search bar-->
	</div> 
	<!-- end header-container-->
</header>
<!-- END USGS Applications Header Template -->
 <!-- opening div for your main content -->


<nav class="navbar navbar-static-top marginBottom-0" role="navigation"  style="  background: #fff;border-bottom: 1px solid #666;
    border-color: #e5e5e5;">
	 
 
  
  <div class="collapse navbar-collapse" id="navbar-collapse-1" style="z-index:100; margin-top:15px; margin-right:25px; "  >
    
	<ul class="nav navbar-nav navbar-right" >
      <li><a href="#" id="home">Home</a></li>
	
      <li class="dropdown">
        <a href="#"  class="dropdown-toggle" data-toggle="dropdown">Water-use Registration <span style="color:red"> <sup><?php echo PHASE.' '.VERSION?></sup></span> <b class="caret"></b></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
          <li><a  href="https://wise.er.usgs.gov/<?php echo $dir; ?>/wells/" target="_blank">Main Center</a></li>
          <li><a href="#" id="reports">Reports</a></li>
    
     
          <li class="dropdown-submenu">
            <a tabindex="-1" href="#">Add </a>
            <ul class="dropdown-menu">
				<li><a href="#" id="add-diverter" target="_blank" class='dropdown-toggle' style="z-index:-999"> New Diverter </a></li>
				<li><a href="#"   id="add-owner"  target="_blank" class='dropdown-toggle' style="z-index:-999"> New Owner </a></li>
				<li><a href="#" id="add-facility"  target="_blank" class='dropdown-toggle' style="z-index:-999"> New Facility </a></li>
            
             
            </ul>
          </li>
		  <li class="divider"></li>
          <li><a href="#" id="report-bug" class="dropdown-toggle" data-toggle="dropdown">Report a Bug</a></li>
        </ul>
      </li>
	   
	  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Water-use Data <b class="caret"></b></a>
	  <?php if ($_SESSION) {?>
		  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
			  <li><a href="#" id ="wupublic"> Search Public Data </a></li>
			  <li><a href="#"  id="wuinternal">Search Internal </a></li>
			   <li class="dropdown-submenu" ><a href="#"  id="wuagg" > Aggregate Reports </a>
					<ul class="dropdown-menu" style="left:100%;">
								<li><a href="#" id="wuagg-monthly" target="_blank" class='dropdown-toggle' style="z-index:-999"> Monthly  Reports</a></li>
								<li><a href="#"   id="wuagg-crops"  target="_blank" class='dropdown-toggle' style="z-index:-999"> Crops Statistics </a></li>
								<li><a href="#" id="wuagg-swreports"  target="_blank" class='dropdown-toggle' style="z-index:-999"> Surface Water <br> Reports </a></li>
								<li><a href="#" id="wuagg-annual"  target="_blank" class='dropdown-toggle' style="z-index:-999"> Annual Data </a></li>
				</ul>
				
			
			  <li class="divider"></li>
			  <li><a href="#" id="report-bug" class="dropdown-toggle" data-toggle="dropdown">Report a Bug</a></li>
		</ul>
	  <?php } else {?>
	  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
			  <li><a href="#" id ="wupublic"> Search Public Data </a></li>
			  <li class="dropdown-submenu"><a href="#"  id="wuagg" > Aggregate Reports </a>
				<ul class="dropdown-menu" style="left:100%;">
								<li><a href="#" id="wuagg-monthly" target="_blank" class='dropdown-toggle' style="z-index:-999"> Monthly  Reports</a></li>
								<li><a href="#"   id="wuagg-crops"  target="_blank" class='dropdown-toggle' style="z-index:-999"> Crops Statistics </a></li>
								<li><a href="#" id="wuagg-swreports"  target="_blank" class='dropdown-toggle' style="z-index:-999"> Surface Water <br> Reports </a></li>
								<li><a href="#" id="wuagg-annual"  target="_blank" class='dropdown-toggle' style="z-index:-999"> Annual Data </a></li>
				</ul>
			  </li>


			  <li class="divider"></li>
			  <li><a href="#" id="report-bug" class="dropdown-toggle" data-toggle="dropdown">Report a Bug</a></li>
		</ul>
	  <?php } ?>
	  
	  <li><a href="#" id="about">About Water Use Project</a></li>
	  <li><a href="#" id="contactus">Contact Us</a></li>
		<?php if ($_SESSION) {?>
	  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello,  <?php print ucfirst($_SESSION['USER_ID']); ?><b class="caret"></b></a>

		  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
			  <li><a href="#"  onClick="javascript:alert('Coming Soon!');"> Account Settings </a></li>
			  	<?php #if ($_SESSION['USER_TYPE'] == 'admin'){
						
						// echo ' <li><a href="https://wise.er.usgs.gov/'+$dir+'/brt"> Bug Reporting Tool <span style="color:red"> <sup> BETA </sup> </span></a> </li>';
					
					
					// }  ?>
			  <li><a href="#"  id="logout">Logout</a></li>
		</ul>
	  <?php }else{ ?>
		  <li><a href="#" class="dropdown"  id ="login">Account</a></li>
	  <?php } ?>
	  </li>
    </ul>
    
  </div>
  <!-- /.navbar-collapse -->
  
</nav>
