<?php
include ("includes/config.php");
$validate = new validate();
$uname = $_POST['username'];
$redirect = $_GET['redirect'];

$pwd = $cipher->cipherpwd($_POST['password']);
$logmein = $validate->validate_user($uname,$pwd);


if ($logmein == true){
		if (!$redirect){
		echo '<html>
		  <head>
			<title>Validating Account</title>
			<META http-equiv="refresh" content="0;URL=http://wise.er.usgs.gov/'.$dir.'/?t='.$token.'">
		  </head>
		  <body>
			<center>
			Validating Your Account ...
			</center>
		  </body>
			</html>';
	}else{
		if ($redirect == "internal"){
			echo '<html>
			<head>
			<title>Validating Account</title>
			<META http-equiv="refresh" content="0;URL=http://wise.er.usgs.gov/'.$dir.'/?q=int">
			</head>
			<body>
			<center>
			Validating Your Account ...
			</center>
			</body>
			</html>';
		}elseif ($redirect == "settings"){
			echo '<html>
			<head>
			<title>Validating Account</title>
			<META http-equiv="refresh" content="0;URL=https://wise.er.usgs.gov/'.$dir.'/accounts/account_settings">
			</head>
			<body>
			<center>
				Validating Your Account ... re-directing to settings...
			</center>
			</body>
			</html>';
		}elseif($redirect == "wells"){
			echo '<html>
			<head>
			<title>Validating Account</title>
			<META http-equiv="refresh" content="0;URL=https://wise.er.usgs.gov/'.$dir.'/wells">
			</head>
			<body>
			<center>
				Validating Your Account ... re-directing to settings...
			</center>
			</body>
			</html>';
		}
	}
	
	
}else{
	
	if ($redirect != "internal"){
		
		echo "<script> alert('Unable to Login (Invalid Username/Password).'); 
					window.location = '/wateruse/accounts/';
		</script>";
	}else{
		
		echo "<script> alert('Unable to Login (Invalid Username/Password).'); 
						window.location = '/wateruse/accounts/?redirect=internal';
		</script>";
	}
	
	
}

?>
