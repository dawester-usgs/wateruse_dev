<?php 
	
	if(!defined('BASE_PATH')) {
		echo '<script> window.location.href ="https://wise.er.usgs.gov/'+$dir+'/forbidden"; </script>';
 
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
<style>
	#container{
		margin: auto;
		width: 60%;
		
		padding: 30px;
	}
	#header_div{
		padding-top:30px;
		padding-bottom:30px;
		margin-top:50px;
		border-top: 1px solid black;
		border-bottom: 1px solid black;
	}
	#message_div{
		padding-top:10px;
	}
	#main{
		margin-top:50px;
	}
	#main td,th {
		padding:6px;
	}
	body{
		font-size:11px;
	}
</style>

<script>
	function getMPID (t,q,y,f,o,a,z,rt){
	//console.log(t,q,s,y,f,o,a,filter,z);
		NProgress.start();
		//$("#add-new-anndata").hide();
		$("#main").empty();
		
		if (y == undefined || y ==null){
			y = parseInt((new Date).getFullYear()-1);
		}	
		if (z == undefined || z ==null){
			z= "";
		}

		var absURL = "?t="+t+"&q="+q+"&y="+y+"&f="+f+"&o="+o+"&a="+a+"&z="+z+"&rt="+rt;
		var ID;
		
		var linkify;
		$.ajax ({
			
				TYPE: "GET",
				url: "../controller/wells/wellsReport"+absURL,
				ContentType:"application/json",
				dataType:"json",
				async: "false",
				success:function(data){
					NProgress.done();

					$('#main').append('<tr>\
										<th>Measurement Point</th>\
										<th>'+t+' ID</th>\
										<th>'+t+' Name</th>\
										<th>Local Description</th>\
										<th>Water Type</th>\
										<th>County Name</th>\
									   </tr>')
					$("#title-nm").html(data[0]['name2']);
					$.each(data,function(i,item){
						if (t == 'Diverter'){
							ID = item.diverter_id;
						}else{
							ID = item.owner_id;
						}
						$('#main').append('<tr>\
										<td>'+item.mpid+'</td>\
										<td>'+ID+'</td>\
										<td>'+item.name+'</td>\
										<td>'+item.local_desc+'</td>\
										<td>'+item.source_cd+'</td>\
										<td>'+item.county_nm+'</td>\
									   </tr>')
						
					});
				}
		});
	}
	function generatePDF(){
		
			/*html2canvas(document.querySelector('#container')).then(function(canvas) {
                var img = canvas.toDataURL('image/png');
					var doc = new jsPDF('P', 'in', [8.5, 13]);
					doc.addImage(img, 'png', 1, 1);
					doc.save('test.pdf');
				});﻿*/
				
					/*
					var doc = new jsPDF();
					
					var specialElementHandlers = {
						'#ignore' : function(element,render) {return true;}
					};
					
					doc.fromHTML($('#container').get(0), 20,20,{
								 'width':500,
								'elementHandlers': specialElementHandlers
					}, function(bla) { 
						doc.save('saveInCallback.pdf');
	
		var doc = new jsPDF();
		doc.setFontSize(9)
		doc.text(20,81, 'eyyyyyyy');
		doc.addImage(imgData, 'PNG', 15, 40, 180, 160)
		doc.save('1.pdf');*/
	}
	$(document).ready(function(){
		var t= $('#t').val();
		var q= $('#q').val();
		var y = $('#y').val();
		var f = $('#f').val();
		var o = $('#o').val();
		var a = $('#a').val();
		var z = $('#z').val();
		var rt = $('#rt').val();
		
		getMPID(t,q,y,f,o,a,z);
		
		$("#report-pdf").click(function(){
			generatePDF();
		})
	});
</script>
</head>

<body>
<div class="sticky-top bg-info" style="text-align:center">Report Preview</div>
<div id="ignore"></div>
<div id="container">
	<center>
		<img src ="../includes/css/img/anrc_logo.gif" alt="Arkansas Natural Resources Committee">

		<div id="header_div">
			<strong><span id="title"> <?php echo $_GET['t']; ?> Measurement Point Information Report  <span></strong>
		</div>
		<div id="message_div"> 
			<strong>
				<span id="title-message"> 
				This is a list of active withdrawal points stored in the water-use registration data
				base for <?php echo $_GET['t']; ?> <u><span id="title-nm"></span></u> with  <?php echo $_GET['t']; ?> ID 
				 <u><?php echo $_GET['q']; ?></u>
				</span>
			</strong>
		
		<table id="main" border="1"></table>
		
	</center>
</div>
		
	<center>
		<button id="report-pdf"><i class="fa fa-file-pdf-o"></i> Download this as PDF</button>
		<button id="report-doc"><i class="fa fa-file-word-o"></i> Download this as MS Word Document File </button>
		<button id="report-csv"><i class="fa fa-file-excel-o"></i> Download this as CSV</button>
	</center>
<input type="hidden" value ="<?php echo $_GET['t'] ?>" id="t">
<input type="hidden" value ="<?php echo $_GET['q'] ?>" id="q">
<input type="hidden" value ="<?php echo $_GET['y'] ?>" id="y">
<input type="hidden" value ="<?php echo $_GET['f'] ?>" id="f">
<input type="hidden" value ="<?php echo $_GET['o'] ?>" id="o">
<input type="hidden" value ="<?php echo $_GET['a'] ?>" id="a">
<input type="hidden" value ="<?php echo $_GET['z'] ?>" id="z">
<input type="hidden" value ="<?php echo $_GET['rt'] ?>" id="rt">

</body>
</html>
	
	