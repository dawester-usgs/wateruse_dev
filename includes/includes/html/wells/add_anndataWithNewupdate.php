<?php 
	
	if(!defined('BASE_PATH')) {
		echo '<script> window.location.href ="https://wise.er.usgs.gov/'+$dir+'/forbidden"; </script>';
 
	}
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
</head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style>

.important{
	color:#e53030;
}
#dateacct {
   z-index: 9999999 !important;
}
#paytypeacc {
   z-index: 9999999 !important;
}
.modal-content{
	 z-index: 9999999 !important;
}
#the-mpidtbl{
	   max-width: none;
        table-layout: fixed;
        word-wrap: break-word;
}
</style>
<script>
	var i=1;	
	var months = [];
	var method;
	var total = 0;
	
	function appendDynamic(){
		//add the header first
		NProgress.done();
		$("#the-anndata").append(' <thead>\
											<tr>\
												<th class="text-warning text-center eh">#</th>\
												<th class="text-warning text-center eh">Crop</th>\
												<th class="text-warning text-center eh">Acres <a href="#" class="tool-tip" data-toggle="tooltip" title="For three-digit numbers, add two 0s to account for decimal places."> [?]</a></th>\
												<th class="text-warning text-center eh">Rate (Acre-Feet)</th>\
												<th class="text-warning text-center eh"> Method</th>\
												<th class="text-warning text-center eh crops_meterReading" > Meter Reading</th>\
												<th class="text-warning text-center eh">Total</th>\
												<th class="text-warning text-center eh meter-reading">Units: \
												<select id="crop-units" style="width:100px;" name="crop-units">\
															<option value="ACFT">Acre-Feet</option>\
															<option value="MG">Million Gallons</option>\
															<option value="MGD">Million Gallons per Day-Feet</option>\
															<option value="GAL">Gallons</option>\
														</select> </th>\
												<th class="text-warning text-center eh"><a href="#" id="new-crops">+</a> </th>\
											</tr>\
											</thead>');
		
		
		
		$("#the-anndata").append('<tbody>\
													<tr id="row'+i+'">\
														<td>'+i+' <input type="hidden" name="id" value="'+i+'"></td>\
														<td><select name="crop_cd'+i+'" id="crops'+i+'" class="form-control crops_cd"></select></td>\
														<td><input type="text" name="acres'+i+'" class="masked form-control AnnDataNumbers"  id="acres'+i+'"  placeholder="0" onkeypress="return isNumberKey(event,this.value)"  placeholder="0" min="0"/></td>\
														<td><input type="text" name="rate'+i+'"  class="masked form-control AnnDataNumbers" id="rate'+i+'"  placeholder="0" onkeypress="return isNumberKey(event,this.value)" placeholder="0"   min="0"/></td>\
														<td><select name="method'+i+'" id="method'+i+'" class="form-control required"></select></td>\
														<td class="crops_meterReading"><input type="text" name="crops_meterReading'+i+'" class="masked form-control" ></select></td>\
														<td><input type="text" name="total'+i+'" class="masked form-control total"  id="total'+i+'"  placeholder="0" onkeypress="return isNumberKey(event,this.value)" readonly/></td>\
														<td class="text-warning text-center eh "></td>\
														<td class="text-warning text-center eh meter-reading"></td>\
													</tr>\
													</tbody>');
		getCropsandMethod(i);	
			
	
		$("#the-total ").append('<tbody><tr>\
									<td colspan=7>\
									<label class="control-label col-xs-4 text-warning text-center" for="local" >Total Withdrawn:</label>\
									 <div class="col-md-4">\
										<input type="text" class="form-control" placeholder="0.00" id="totalw" name= "total_widthdrawn" readonly />\
									</td>		\
									</tr></tbody>');
			
			var forMeterReadingOnly ='<td class="meter-reading"><input type="text" name="crops_meterReading'+i+'" class="masked form-control"> </td>\
															<td class="meter-reading"> &nbsp;</td>';	
			$("#new-crops").click(function(e){
				e.preventDefault();
					
				var id = parseInt(($("#the-anndata ").find('tr').last()[0].innerText));		
							
				p= (id+1);
				i+=1;
			
				
				
					 $("#the-anndata ").append('<tbody>\
														<tr id="row'+i+'">\
															<td>'+i+' <input type="hidden" name="id" value="'+i+'"></td>\
															<td><select name="crop_cd'+i+'" id="crops'+i+'" class="form-control crops_cd"></select></td>\
															<td><input type="text" name="acres'+i+'" class="masked form-control AnnDataNumbers" placeholder="0" id="acres'+i+'"  onkeypress="return isNumberKey(event,this.value)"  placeholder="0" min="0" step="any"/></td>\
															<td><input type="text" name="rate'+i+'"  class="masked form-control AnnDataNumbers" placeholder="0" id="rate'+i+'"  onkeypress="return isNumberKey(event,this.value)" placeholder="0"   min="0"  step="any"/></td>\
															<td><select name="method'+i+'" id="method'+i+'"masked class="form-control required"></select></td>\
															<td class="meter-reading"><input type="text" name="crops_meterReading'+i+'" class="masked form-control"> </td>\
															<td><input type="text" name="total'+i+'" class="form-control total"  id="total'+i+'"  placeholder="0" onkeypress="return isNumberKey(event,this.value)"  step="any" readonly/></td>\
															<td class="meter-reading"> &nbsp;</td>\
															<td class="text-warning text-center eh"><a id="del-crops"  style="line-height:25px;" onclick="return deleteRow('+i+')">-</a> </td>\
														</tr>\
														</tbody>');
				
				
					
				
					var $k = $("#methods").val();
					
					
					if ($k == "M") {
						
						$("#total"+i).removeAttr("readonly");
						$(".meter-reading").hide();
					}else if ($k == "E") {
						$(".meter-reading").hide();
						$("#total"+i).attr("readonly",true);
					}else{
						$("#total"+i).removeAttr("readonly");
					}							
			/*$("input[type='number']").on("blur",function(){
			var s = $(this).val();
				var k = s.replace(/\b0+/g, "");
				$(this).val(k)
				if (s % 1 === 0){
					return true;
				}else{
					$(this).val(parseFloat(this.value).toFixed(2));
				}
			
			});*/
			//$(".masked, .monthlies").mask("#,##0.00", {reverse: true});	
												
			//call getCrops
			getCropsandMethod(i);
			
			//console.log($("#crops"+i));
		
			
		});			
			
	
	}
		
	function checkTheDropdowns(){
	  var arr  = $('.crops_cd').find(':selected');
	  
		  $('.crops_cd').find('option').prop("disabled", false); 
		 $('.crops_cd').find('option').attr('style','color:default');
		$.each($('.crops_cd'), function(){  
		
			var self = this;
			var selectVal = $(this).val();
			
			$.each(arr, function(){  		
				
					if (selectVal != $(this).val()){
							$(self).find('option[value="'+$(this).val()+'"]').attr('disabled',true);
							$(self).find('option[value="'+$(this).val()+'"]').attr('style','color:red');
							
					} else {
					
							$(self).find('option[value="'+$(this).val()+'"]').prop("disabled", false); 
							$(self).find('option[value="'+$(this).val()+'"]').attr('style','color:default');
						
			  }
		  });
		})
	}
	function isNumberKey(evt,n,t){
		
	
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (t !='m') return !(charCode > 31 && (charCode < 46 || charCode > 57 || charCode == 110) || n.length ==7 ); else return !(n.length == 15); 
	
		
	}
	
	
	function getCropsandMethod(n){
		//checkTheDropdowns();
		
		
		$.ajax ({
			
			TYPE: "POST",
			url: "../controller/wells/crops",
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				
				$("#crops"+n).append("<option value=''>---</option>");
				$.each(data,function(i,item){
					
					
					$("#crops"+n).append("<option value='"+item.id+"'>"+item.nm+"</option>");
					
					
				});
			
					
			},
			error:function(err, ajaxOptions, throwError){
				alert("Internal Server Error! Please contact the administrator");
			}
		});
		
		$("#method"+n).append("<option value='CP'>Center Pivot</option>");
		$("#method"+n).append("<option value='FL' selected>Flood</option>");
		$("#method"+n).append("<option value='FU'>Furrow</option>");
		$("#method"+n).append("<option value='SP'>Sprinkler</option>");
		$("#method"+n).append("<option value='OT'>Other</option>");
		$("#method"+n).append("<option value='NO'>None</option>");
	//$("#crops"+n).on('click',checkTheDropdowns);
	$("#crops"+n).on('change', function(){
			//checkTheDropdowns();
			 if ($(this).val() == '-001'){
					 $(this).addClass('leIdle');
					 $("#rate"+n).addClass('leIdle');
					 $("#acres"+n).addClass('leIdle');
					 $("#total"+n).addClass('leIdle');
					 $("#rate"+n).val(0);
					 $("#rate"+n).attr('readonly',true);
					 //$("#acres"+n).val();
					 // $("#acres"+n).attr('readonly',true);
					  $("#total"+n).val(0);
					  $("#totalw"+n).val(0);
					 getTotal(n);
					
				}else{
				  $(this).removeClass('leIdle');
				   $("#rate"+n).removeClass('leIdle');
					$("#acres"+n).removeClass('leIdle');
					$("#total"+n).removeClass('leIdle');
					  $("#acres"+n).removeAttr('readonly');
					   $("#rate"+n).removeAttr('readonly');
				}
						
				
			
	});
		var total;
		var arry = [];
		 $("#rate"+n).on('blur',function(){
			
			var rate = this.value == "" ? rate = 0 : parseFloat(this.value.replace(/,/g, ''));
			var acres =  $("#acres"+n).val() == "" ? acres = 0 : parseFloat($("#acres"+n).val().replace(/,/g, ''));
			var total =   $("#total"+n).val() == "" ? total = 0 : parseFloat($("#total"+n).val().replace(/,/g, ''));
			if (rate == ""){
				return false;
			}
			if (rate != ""){
				if (total == 0){
					total = parseFloat(acres * rate);
					$("#total"+n).val(total.toFixed(7));
				}else if (rate == 0){
					rate = parseFloat(total / acres);
					$("#rate"+n).val(rate.toFixed(7));
				}else if (acres == 0){
					acres = parseFloat(total /rate);
					$("#acres"+n).val(acres.toFixed(7));
				}else{
					total = parseFloat(acres * rate);
					$("#total"+n).val(total.toFixed(2));
				}
					
				getTotal(n);
			}else{
				alert("Rate cannot be empty. Please input a number greater than 0");
				$("#totalw").val(0);
			}

			
		 });
		$("#acres"+n).on('blur',function(){
			var acres = this.value == "" ? acres = 0 : parseFloat(this.value.replace(/,/g, ''));
			var rate =  $("#rate"+n).val() == "" ? rate = 0 : parseFloat($("#rate"+n).val().replace(/,/g, ''));
			var total =   $("#total"+n).val() == "" ? total = 0 : parseFloat($("#total"+n).val().replace(/,/g, ''));
			
			if (acres == ""){
					return false;
			}
			
			if (acres != 0){
				if (total == 0){
					total = parseFloat(acres * rate);
					$("#total"+n).val(total.toFixed(7));
				}else if (rate == 0){
					
					rate = parseFloat(total / acres);
					// alert(rate);
					$("#rate"+n).val(rate.toFixed(7));
				}else if (acres == 0){
					acres = parseFloat(total /rate);
					$("#acres"+n).val(acres.toFixed(7));
				}else{
					total = parseFloat(acres * rate);
					$("#total"+n).val(total.toFixed(2));
				}
				getTotal(n);	
			}else{
				alert("Acres cannot be empty. Please input a number greater than 0");
				$("#totalw").val(0);
			}
				
				
		
		});
		
		$("#total"+n).on('blur',function(){
			var total = this.value;
			var rate =  $("#rate"+n).val();
			var acres =   $("#acres"+n).val();
			var tots = 0;
			
			if (total == 0){
				$("#acres"+n).val('');
				$("#rate"+n).val('');
				$("#totalw").val(0);
			}
			else if (rate !="" || rate !=0){
				tots = parseFloat(total/rate);
				$("#acres"+n).val(tots.toFixed(7))
				
			}else if (acres !="" || acres !=0){
				tots = parseFloat(total/acres);
				$("#rate"+n).val(tots.toFixed(7))
			}
				
			if (acres == "" && rate == ""){
				$("#totalw").val(0);
			}else{
				getTotal(n);
			}
				
			
			
			
			
			
		})
	
	}
	var arry = [];
	function getTotal(n){
	  var sum = 0;
	  
		$('.total').each(function() {
			sum += parseFloat($(this).val());
			//console.log($(this).val());
		});
		
		if (sum % 1 === 0){
			$("#totalw").val(sum);
		}else{
			$("#totalw").val(parseFloat(sum).toFixed(2));
		}
		
	}
	function deleteRow(n){
		if (n<i){
			alert('Please delete from the bottom');
		}else{
			$("#row"+n).remove();
			i-=1;
			getTotal(n);
		}
		
	}
	
	function computeMonthlies(n,m){
		
		/*
		var monthname = $(".monthlies").attr('name');
		
		var array = [n,m]
	
		/*for (var i = 0; i<months.length; ++i){
			
			if (m == monthname){
				total += parseFloat(months[i]) << 0;
			}
			
		}*/
		
		/*var jan; var feb; var mar; var apr; var may; var jun; var jul; var aug ; var sept ; var oct ; var nov ; var dec;
		

		jan = $("input[name='jab']").val() == "" ? jan = 0 : parseFloat($("input[name='jan']").val());
		feb = $("input[name='feb']").val() == "" ? feb = 0 : parseFloat($("input[name='feb']").val());
		mar = $("input[name='mar']").val() == "" ? mar = 0 : parseFloat($("input[name='mar']").val());
		apr = $("input[name='apr']").val() == "" ? apr = 0 : parseFloat($("input[name='apr']").val());
		may = $("input[name='may']").val() == "" ? may = 0 :parseFloat($("input[name='may']").val());
		jun = $("input[name='jun']").val() == "" ? jun = 0 : parseFloat($("input[name='jun']").val());
		jul = $("input[name='jul']").val() == "" ? jul = 0 : parseFloat($("input[name='jul']").val());
		aug = $("input[name='aug']").val() == "" ? aug = 0 : parseFloat($("input[name='aug']").val());
		sept = $("input[name='sept']").val() == "" ? sept = 0 : parseFloat($("input[name='sept']").val());
		oct= $("input[name='oct']").val() == "" ? oct = 0 : parseFloat($("input[name='oct']").val());
		nov= $("input[name='nov']").val() == "" ? nov = 0 : parseFloat($("input[name='nov']").val());
		dec= $("input[name='dec']").val() == "" ? dec = 0 : parseFloat($("input[name='dec']").val());
		total = (jan+feb+mar+apr+may+jun+jul+aug+sept+oct+nov+dec);
		*/
		var sum = 0;
		$('.monthlies').each(function() {
			sum += Number($(this).val());
		});
		if (sum % 1 === 0){
			$("input[name='total_monthly']").val(sum+'%');
		}else{
			//(this).val(parseFloat(this.value).toFixed(2));
			$("input[name='total_monthly']").val(parseFloat(sum).toFixed(2) +'%');
		}
		
		
	
			
	}
	
	function getData(mpid,year,id,type){
		
		
		$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/searchmpid3?q="+mpid+"&id="+id+"&t="+type,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				$.each(data,function(i,item){
					$("#owner_nm").html(item.owner_nm);
					$("#owner_id").html(item.owner_id);
					$("#owner_id-h").val(item.owner_id);
					$("#diverter_id").html(item.diverter_id);
					$("#diverter_id-h").val(item.diverter_id);
					$("#diverter_nm").html(item.diverter_nm);
					$("#local_desc").html(item.local_desc);
					$("#county").html(item.county_nm);
					$("#state_cd").html(item.state_nm);
					//$("#year").html(item.wyear);
					//$("#year-h").val(item.wyear);
					
					isExistMPID(item.mpid,year,item.diverter_id,item.owner_id);
				});
				
			},
			error:function(err, ajaxOptions, throwError){
				alert("Internal Server Error! Please contact the administrator");
			}
		});
	
	}
	
var idleTime = 0;
function timerIncrement() {
		idleTime = idleTime + 1;
		if (idleTime > 15) { // 15 min
			var x = confirm('No activity detected for 15 minutes would you like to continue? Press \'Ok\' to continue or Press \'Cancel\' to close this window');
			
			if (x == false){
				window.close();
			}else{
				return false;
			}
		
		}
}

function isExistMPID(m,y,d,o){
				
		$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/checkmpidexist?m="+m+"&y="+y+"&d="+d+"&o="+o,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				if (data =='1'){
					alert('Data already exist! ');
					$("#saveann,select,input").attr("disabled","disabled");
					$("#header-message").html("Data exist for MPID "+m);
				}else{
					$("#saveann,select,input").removeAttr("disabled");
					$("#header-message").html("Add Annual Data for MPID "+m);
				}
				
			}
		});
	
}
$(document).ready(function(){
	//opener.document.fad.refresh_me.value='1';
	/* idle time */
	 //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 12000); // 2 mins 

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
	$(this).click(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
		method = 'E';
		NProgress.start();
		appendDynamic();
		
		var date = new Date();
		var yearnow = date.getFullYear();
		$("#dateacct").datepicker({
						changeMonth: true,
						changeYear: true,
						yearRange: '1985:'+yearnow
						});
						
		$(".meter-reading").hide();
		$(".measured-reading").hide();
		$(".crops_meterReading").hide();
		$("#typesz").hide();
		$("#methods").change(function(){
			var met = $(this).val();
			
			if (met == 'R'){
				$(".meter-reading").show();
				$(".measured-reading").hide();
				$(".total").removeAttr("readonly");
				$(".crops_meterReading").show();
				$("#typesz").show();
				$("#totswithdrawnsbaby").html("Total Percentage");
			}else if (met =='M'){
				$(".meter-reading").hide();
				$(".measured-reading").show();
				$(".total").removeAttr("readonly");
				$(".crops_meterReading").hide();
				$("#typesz").show();
				$("#totswithdrawnsbaby").html("Total Measured");
			}else{
				$(".meter-reading").hide();
				$(".measured-reading").hide();
				$(".crops_meterReading").hide();
				$("#totswithdrawnsbaby").html("Monthly Percentage");
				$("#typesz").hide();
			}
			
		});
		$("input[name='typesz']").change(function(){
			var val = $(this).val();
		
			if (val == "P"){
				$("#totswithdrawnsbaby").html("Total Percentage");
			}else {
				$("#totswithdrawnsbaby").html("Total Measured");
			}
		});
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();

		
		$("#alpha-reading-date").datepicker({
					maxDate: new Date(currentYear, currentMonth, currentDate),
						keyupMonth: true,
						keyupYear: true,
						changeMonth: true,
						changeYear: true,
						yearRange: '1985:'+currentYear,
						 onSelect: function() { 

							var dateObject = $(this).datepicker('getDate','+2d');
							$("#omega-reading-date").datepicker();
							 $("#omega-reading-date").datepicker( "option", "minDate", dateObject );
							 $("#omega-reading-date").datepicker( "option", "maxDate", new Date(currentYear, currentMonth, currentDate) );
							 $("#omega-reading-date").datepicker( "option", "changeMonth",true );
							 $("#omega-reading-date").datepicker( "option", "changeYear",true );
							 $("#omega-reading-date").datepicker( "option", "yearRange",'1985:'+currentYear );
							 
							// $("#date_to").datepicker( "option", "maxDate",  );
						}
				});
		
		
						
		var hasAnnData;
		$("#the-form").submit(function(e){
			e.preventDefault();
			var acres;
			var rate;
			var rate_leidle = $("[name^='rate']");
			var acres_leidle = $("[name^='acres']");
			
			rate = rate_leidle.hasClass('leIdle') == true ? (rate = '0') :  $("[name^='rate']").val();
			//acres = acres_leidle.hasClass('leIdle') == true ? (acres = '0') :  $("[name^='acres']").val();
			acres = $("[name^='acres']").val();
		
		
			var crop_cd =$("[name^='crop_cd']");
			var total = $("#totalw").val();
			var total_monthly = $("input[name='total_monthly']").val().replace('%', '');
			
		
			var pay = $("#pay").val();
			var getNext = $("#getNext").val();
			var nextMPID = $("#selected_mpid2").val()
			var maxMPID = $("#max_mpid").val()
			var data = $(this).serialize();
			// var url = $(this).attr('action');
			var url ="https://wise.er.usgs.gov/wateruse_dev/controller/wells/saveAnn";
			var $val = 0;
			
			$(".required").each(function(){
				//console.log($(this).val());
				if ($(this).val() == '' || $(this).val() == '--'){
						$val = 1;
					
						$(this).addClass('error');
					}else{
						$(this).removeClass('error');	
					}
			});
			
				// console.log(url);
			//alert(pay);
			
			var proceed = false;
			var stoplookandlisten = false;
			
			if (getNext == "Y"){
				opener.document.fad.next_mpid.value= nextMPID;
				 window.close();
				
			}else{
				$("#who-owner").attr("required","required");
				
				if (pay == ""){
				//	alert();
				//alert(total_monthly);
					$(".AnnDataNumbers").each(function(){
							var val = $(this).val();
						var isIdle = $(this).hasClass('leIdle');
						//alert('idle =' + isIdle);
						if (isIdle == false){
							/*if (val == 0 ){
								
								alert("Rate or Acres should not be null");
								proceed = false;
								stoplookandlisten = true;
								return false;
							}else */ if (method == 'E'){
								if (total_monthly != 100){
									alert("Estimated method must have a Monthly Total of 100");
									proceed = false;
									stoplookandlisten = true;
									return false;
								}else{
									
									proceed =  true;
									
								}
							}else if (method != 'E') {
								if (total_monthly != total){
									alert("Monthly total must equal to the Total Withdrawn");
									proceed = false;
									stoplookandlisten = true;
									return false;
									}else{
										proceed =  true;
											
									}
								
								}
								
								
							}else{
							
								if (stoplookandlisten == false){
									proceed =  true;
								}
								
							}
			
						
						});
						
						$(".crops_cd").each(function(){
							var val = $(this).val();
							
						//	console.log(val);
							if (val == ''){
								alert('Please select a Crop');
								proceed= false;
								return false;
							}
						});
				
						//alert('stop =' + stoplookandlisten);
						//alert('proceed =' + proceed);
						
						if (proceed == true){
						
							$.ajax({
											url:url, 
											type:'POST',
											data:data,
											success:function(data){
															//console.log(data);
																if(data == 'success'){
																	 window.focus();
																	 /*
																	var confirmation = confirm("Data has been successfully saved!\n Would you like to continue to add Payment?\n Press 'OK' to continue or 'Cancel' to close this window.");
																	
																	if (confirmation){
																
																		$("#saveann").attr('disabled','disabled');
																		$("#add-payment").removeAttr('disabled');
																			
																		$("#the-modal").modal('show');
																		$("#pay").val("Y");
																		return false;
																	}else{
																		window.close();
																	}
																*/
																
																	$(".status_1").html('Successfully saved!');
																	$(".status_1").effect('pulsate','slow');
																	$(".status_1").css('color','green');
																	$("#saveann").attr('disabled','disabled');
																	$("#add-payment").removeAttr('disabled');
																	//opener.document.fad.refresh_me.value='1';
																	opener.document.fad.refresh_me.value='1';
																	
																}else{
																	$(".status_1").html('Error');
																	$(".status_1").css('color','red');
																}
													 },
													 error:function(err, ajaxOptions, throwError){
														console.log(err+" "+ajaxOptions+" "+throwError);
													}
										});
									
																
						}
							

					}else{
									
						$.ajax({
										url:url, 
										type:'POST',
										data:data,
										success:function(data){
										if(data == 'success'){
										
											alert('Payment has successfully been posted.\n Press \'OK\' to continue');
											$("#status").html('Paid');
											
											$("#save-payment").attr('disabled','disabled');
											$("#save-payment").css('cursor','not-allowed');
											opener.document.fad.refresh_me.value='1';
											window.close();
												
										}else{
											alert('Must enter annual data first');
										}
									}
							});
					
					
					
					}
			}
		
				
			
			
			
		});
		
		$("#next-mpid").click(function(){
			$("#getNext").val("Y");
			$("#who-owner").removeAttr('required');
		});
		var nextMPID = $("#selected_mpid2").val()
		var maxMPID = $("#max_mpid").val();
		if (maxMPID == nextMPID){
			$("#next-mpid").attr("disabled","disabled");
			$("#next-mpid").attr("title","Reached the max number of MPID");
		}
		
		$("#saveann").click(function(){
			$("#getNext").val("");
			$("#who-owner").attr('required','required');
		});
		$("#paytypeacc").change(function(){
			var val = $(this).val();
		
		
			if (val != 'check'){
				$("#checknoacct").attr('readonly','readonly');
				$("#checknoacct").css('cursor','not-allowed');
				$("#checknoacct").val("")
			}else{
				$("#checknoacct").removeAttr('readonly');
				$("#checknoacct").css('cursor','default');
			}
		});
		$(".close").click(function(){
			$("#pay").val("");
		});
		$("#add-payment").click(function(){
			$('#the-modal').modal('show');  
			$("#pay").val("Y");
		});
		
		
		
		var m = $("#mpid").val();
		var y = $("#year-h").val();
		var idh = $("#idh").val();
		var type = $("#type").val();
		
		
		getData(m,y,idh,type);
	
	
		//payment
		
	});
</script>
<style>

html {
	height:auto;
	
}
body {
	padding:0;
	margin:0;
	overflow-x:hidden;
    font-size: 1.05em !important;
    line-height: 1.25em;
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    background: #f9f9f9;
    color: #555;
	height:100%;
	
}
.container{
	margin-top:5%;
	font-size:15px; 
}
#del-crops{
		cursor:pointer;
	  background: #fa002a;
	  background-image: -webkit-linear-gradient(top, #fa002a, #b81835);
	  background-image: -moz-linear-gradient(top, #fa002a, #b81835);
	  background-image: -ms-linear-gradient(top, #fa002a, #b81835);
	  background-image: -o-linear-gradient(top, #fa002a, #b81835);
	  background-image: linear-gradient(to bottom, #fa002a, #b81835);
	  -webkit-border-radius: 9;
	  -moz-border-radius: 9;
	  border-radius: 9px;
	   color: #ffffff;
	   margin-top:5px;
	  padding: 5px 10px 5px 10px;
	  text-decoration: none;
}
#del-crops:hover{
	  background: #f20010;
	  background-image: -webkit-linear-gradient(top, #f20010, #c2192a);
	  background-image: -moz-linear-gradient(top, #f20010, #c2192a);
	  background-image: -ms-linear-gradient(top, #f20010, #c2192a);
	  background-image: -o-linear-gradient(top, #f20010, #c2192a);
	  background-image: linear-gradient(to bottom, #f20010, #c2192a);
	  text-decoration: none;
}
#new-crops {
		background: #3498db;
		background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
		background-image: -moz-linear-gradient(top, #3498db, #2980b9);
		background-image: -ms-linear-gradient(top, #3498db, #2980b9);
		background-image: -o-linear-gradient(top, #3498db, #2980b9);
		background-image: linear-gradient(to bottom, #3498db, #2980b9);
		-webkit-border-radius: 9;
		-moz-border-radius: 9;
		border-radius: 9px;
		color: #ffffff;
	   margin-top:5px;
		padding: 5px 10px 5px 10px;
	  text-decoration: none;
}
#new-crops:hover{
	  background: #3cb0fd;
	  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
	  text-decoration: none;
}
.h3{
		text-align: center;
}
	
.col-sm-10.readonly{
	padding-top: 5px;
}
.input[readonly]{
	background-color:transparent;
	border: 0;
	font-size: 1em;
}
.col-xs-4{
	padding-left: 15px; center; right=0;
}
</style>
<body>
 <?php  #include '../includes/html/header_new.php'; ?>
 
 <div class="container">
 <?php #print_r ($_GET['thempid']); ?>
 
	
	<form class="form-horizontal" id="the-form" method="POST" action="../controller/wells/saveAnn">
		<input type="hidden" id="mpid" name="mpid" value = "<?php echo $_GET['thempid']; ?>">
		<input type="hidden" name="action_cd" value = "<?php echo $_GET['action_cd']; ?>">
		<input type="hidden" name="source_cd" value = "<?php echo $_GET['source_cd']; ?>">
		<input type="hidden" name="id" id="idh" value = "<?php echo $_GET['id']; ?>">
		<input type="hidden" name="type" id="type" value = "<?php echo $_GET['type']; ?>">
		<input type="hidden" name="pay" id="pay" >
		<input type="hidden" name="getNext" id="getNext" >
		<input type="hidden" name="selected_mpid" id="selected_mpid2" value="<?php echo $_GET['selected_mpid']; ?>">
		<input type="hidden" name="max_mpid" id="max_mpid" value="<?php echo $_GET['max_mpid']; ?>">
		
	
		<div class="control-group">
<!--annual data-->
			<table class="table table-bordered table-condensed table-hover">
			<tr>
			<th colspan=5>
			<div class="col-l-2 text-center" id="table-annual">
				<p class="h4 text-warning" id="header-message"><strong>Add Annual Data for <?php echo $_GET['thempid']; ?></strong></p>	
			</div>
			</th>
			</tr>
			<tr>
			<td>
			<label class="control-label col-md-2" for="name">Owner:</label>
			 <div class="col-sm-10">
				<p class="form-control-static" id="owner_nm"></p>
			</td>
			<td colspan=2>
			<label class="control-label col-md-2" for="name-id">ID:</label>
			 <div class="col-sm-10">
				<p class="form-control-static" id="owner_id" ></p>
				<input type="hidden" name="owner_id" id="owner_id-h" />
			</td>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="diverter">Diverter:</label>
			 <div class="col-sm-10">
				<p class="form-control-static" id="diverter_nm"> </p>
			</td>
			<td colspan=2>
			<label class="control-label col-md-2" for="diverter-id">ID:</label>
			 <div class="col-sm-10">
				<p class="form-control-static" name="diverter_id" id="diverter_id"></p>
				<input type="hidden" name="diverter_id" id="diverter_id-h" />
			</td>
			</tr>
			
			<tr>
				<td colspan=5>
				<label class="control-label col-sm-1" for="local">Local Description:</label>
				 <div class="col-sm-10">
					<p class="form-control-static" style="line-height:50px;" name="local_desc" id="local_desc"></p>
				</td>		
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="county">County:</label>
			 <div class="col-sm-10">
				<p class="form-control-static" name="county_cd" id="county"></p>
			</td>
			<td>
			<label class="control-label col-md-2" for="State">state:</label>
			 <div class="col-sm-10">
				<p class="form-control-static" name="state_cd" id="state_cd"></p>
			</td>
			<td>
			<label class="control-label col-md-2" for="year">Year:</label>
			 <div class="col-sm-10">
				<p class="form-control-static" name="wyear" id="year"><?php echo $_GET['year'];?></p>
				<input type="hidden" name="year" id="year-h"  value="<?php echo $_GET['year'];?>"/>
			</div>
			</td>
			</tr>
			<tr>
				<td colspan=4>
					<label class="control-label col-md-2 for="Method"  style="line-height:35px;">Method of Calculation: </label>
					<div class="col-md-5" style="line-height:50px;">
						<select name="method" id="methods" class="required">
							<option value="E" selected="">Estimated</option>
							<option value="M">Measured</option>
							<option value="R">Meter Reading</option>
						</select>
						<span class="important">*</span>
					</div>
				</td>
				
			</tr>
			<tr class="meter-reading">
				<th colspan=3>
					<div class="col-l-2 text-center">
						<p class="h4 text-warning"><strong>Meter Reading</strong></p>	
					</div>
					</th>
			</tr>
			<tr class="meter-reading">
				<td colspan=3>
					<label class="control-label col-md-1" for="units"  style="line-height:35px;">Units:</label>
					<div class="col-md-2">
						<select class="form-control" name="meter-reading-units">
							<option value="AFT">AFT &#xd7 0.001</option>
							<option value="AFT">GAL &#xd7 100</option>
							<option value="AFT">GAL &#xd7 1000</option>
						</select>
						<span class="important">*</span>

					</div>
					
				</td>
				
				
			</tr>
			<tr class="meter-reading">
				<td colspan=2>
					<label class="control-label col-md-4 for="Method"  style="line-height:35px;">Initial Meter Reading: </label>
					<div class="col-md-6">
						<input type="number" id="alpha-reading" class="form-control meter-reading-date" name="alphaMeterReading"> 
						<span class="important">*</span>

					</div>
					
				</td>
				<td colspan=2>
					<label class="control-label col-md-4 for="Method"  style="line-height:35px;">Initial Meter Reading Date: </label>
					<div class="col-md-6">
						<input type="text" id="alpha-reading-date" class="form-control meter-reading-date" name="alphaMeterReadingDate"> 
						<span class="important">*</span>
					</div>
				</td>
				
			</tr>
			<tr class="meter-reading">
				<td colspan=2>
					<label class="control-label col-md-4 for="Method"  style="line-height:35px;">Final Meter Reading: </label>
					<div class="col-md-6">
						<input type="number" id="omega-reading" class="form-control" name="OmegaMeterReading"> 
						<span class="important">*</span>
					</div>
				</td>
				<td colspan=2>
					<label class="control-label col-md-4 for="Method"  style="line-height:35px;">Final Meter Reading Date: </label>
					<div class="col-md-6">
						<input type="text" id="omega-reading-date" class="form-control meter-reading-date" name="OmegaMeterReadingDate"> 
						<span class="important">*</span>
					</div>
				</td>
			</tr>
			<tr class="measured-reading">
				<th colspan=3>
					<div class="col-l-2 text-center">
						<p class="h4 text-warning"><strong>Measured</strong></p>	
					</div>
					</th>
			</tr>
			<tr class="measured-reading">
				<td colspan=4>
					<label class="control-label col-md-2 for="Method"  style="line-height:35px;">Total Measured: </label>
					<div class="col-md-3">
						<input type="number" id="tot-meas" class="form-control" name="totalMeas"> 
						
					</div>
				</td>
			</tr>
			<tr class="measured-reading">
				<td colspan=4>
					<label class="control-label col-md-2 for="Method"  style="line-height:35px;">Units: </label>
					<div class="col-md-3">
						<select id="meas-units" class="form-control" name="measUnits">
							<option value="ACFT">Acre-Feet</option>
							<option value="MG">Million Gallons</option>
							<option value="TG">Thousand Gallons</option>
							<option value="GAL">Gallons</option>
						</select>
					</div>
				</td>
			</tr>
			</table>
			
	<!--crops-->
		<table class="table table-bordered table-condensed table-hover" id="the-anndata">
		
		</table>
		<table class="table table-bordered table-condensed table-hover" id="the-total" style="position:relative; bottom:20px;">
		</table>
			
			<table class="table table-bordered table-condensed table-hover">
			<tr>
			<th colspan=3>
			<div class="col-l-2 text-center" id="table-annual">
				<p class="h4 text-warning"><strong>Monthly Report 
					<div id="typesz"> 
						<input type="radio" name="typesz" id="per" value="P"> Percentage <input type="radio" name="typesz" id="mes" value="M"> Measured</strong></p>
					</div>
			</div>
			</th>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Jan</label>
			<div class="col-xs-6">
				<input type="text" class="form-control monthlies" name="jan" placeholder="0" step='1' onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));" />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Feb</label>
			<div class="col-xs-6">
				<input type="text" class="form-control monthlies"  name="feb" placeholder="0"  onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Mar</label>
			<div class="col-xs-6">
				<input type="text" class="form-control monthlies"name= "mar" placeholder="0"  onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);" />
			</div></td>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Apr</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="apr" placeholder="0"  onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);" />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">May</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="may" placeholder="0"  onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Jun</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="jun" placeholder="0" onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);" />
			</div></td>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Jul</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="jul" placeholder="0" onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);" />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">August</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="aug"  placeholder="0" onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Sept</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="sept"  placeholder="0" onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);" />
			</div></td>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Oct</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="oct"  placeholder="0" onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);"   />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Nov</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="nov"  placeholder="0" onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Dec</label>
			<div class="col-xs-6">
			<input type="text" class="form-control monthlies" name="dec"  placeholder="0" onkeypress="return isNumberKey(event,this.value)" onBlur = "return computeMonthlies(this.value,$(this).attr('name'));isNumberKey(event,this.value);" />
			</div></td>
			</tr>
			
			<tr>
			<td colspan=3>
			<label class="control-label col-xs-4 text-warning text-center" for="totswithdrawnsbaby" id="totswithdrawnsbaby">Monthly Percentage:</label>
		
			 <div class="col-md-4">
				<input type="text" name = "total_monthly" class="form-control" placeholder="0" readonly />
			</div>
			</td>	
			
			</tr>
			</table>
			
			<table class="table table-bordered table-condensed table-hover">
		
				<tr>
				<td>
					<label class="control-label" for="restrictions">Restrictions</label>
					<label class="radio-inline">
						<input type="radio" name="restrictions" class="required" value="Y"  required>Yes</label>
					<label class="radio-inline">
						<input type="radio" name="restrictions" class="required" value="N" required checked>No</label>
						<span class="important">*</span>
				</td>
				 
				 <td colspan=2>
				<label class="control-label col-xs-4" for="salinity">Salinity</label>
				<label class="radio-inline">
					<input type="radio" name="salinity" value= "Y" class = "required" required>Yes</label>
				<label class="radio-inline">
					<input type="radio" name="salinity" value = "N" class = "required" required checked>No</label>
					<span class="important">*</span>
				</td>
				
				<!--
				<tr>
				<td colspan=1>
				<label class="control-label" for="paid">Paid:</label>
				<label class="radio-inline">
					<input type="radio" name="paid" value= "Y" class = "required">Yes</label>
				<label class="radio-inline">
					<input type="radio" name="paid" value = "N" class = "required" checked>No</label>
					<span class="important">*</span>
				</td>
				
				
				</tr>
				-->
				
				<tr>
					<td colspan=1>
						<label class="control-label" for="Use">Use Type:</label>
						<label class="radio-inline">
							<input type="radio" name="use_cd" value= "AG" class = "required" required checked>Agriculture</label>
					
							<span class="important">*</span>
					</td>
					
					<td colspan=2>
					<label class="control-label col-xs-4" for="fee">Who is responsible for fee?:</label>
					<label class="radio-inline">
						<input type="radio" name="who" id= "who-owner" class = "radio-inline required"  value="O" required> Owner
					</label>
					<label class="radio-inline">
						<input type="radio" name="who" id="who-diverter" class = "radio-inline required" value="D" > Diverter
					</label>
						<span class="important">*</span>
					</td>
				</tr>	
				<!--
				<tr>
					<td colspan=3>
					<label class="control-label" for="user">Units: </label>
					<span name="user" id="user">
						<select name='units'>
							<option value='ACFT'>Acre-Feet </option>
							<option value='GAL'> Gallons </option>
							<option value='MG'>Million Gallons</option>
							<option value='MGD'>Million Gallons per Day </option>
						</select>
					</span>
				</td>
				</tr>-->
				 <tr>
				<td colspan=3>
					<label class="control-label" for="user">Entered By:</label>
					<span name="user" id="user"><?php echo $_SESSION['USER_ID']; ?></span>
				</td>
				</tr>
				
				<tr>
					<td colspan=4>
						<div style="margin-left:37%">
							<span class="status_1"> </span>
							<!-- <input type="submit" class="btn" value="Save & Next Meas. Pt. " id="draftann" name="draftann"> -->
							<input type="submit" class="btn" value="Save Annual data" id="saveann" name="saveann">
							<button type="button" class="btn" id="add-payment" disabled="disabled">Add Payment</button>
							<button type="submit" class="btn" id="next-mpid">&rarr; Next Meas. Pt.</button>
							
						</div>
					
						
					</td>
				</tr>
				<tr>
					<td colspan=4>
						<div style="margin-left:48%">
							<button type="button" class="btn" id="close" onclick="javascript:window.close();" >Close Window</button>
						</div>
					</td>
				</tr>
				<!--
				<td>
					<button type="Button" class="btn">Return</button>			
				</td>
				</tr>
				
				<tr>
				<td colspan=3>		
					<button type="Button" class="btn">Main Menu</button>
				</td>
				</tr>
				-->
	
			</table>
		</div>
		
			<div class="modal fade" id="the-modal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" >
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label">Totals for Accounting Information</h4>
						<h5 class="modal-title" id="the-modal-label"> Total Penalties : <span id= "penalty">0</span> </h5>
						<div id="set-latlng" style="margin-top:10px;"> 
							<form method="POST" action="../controller/wells/savepayment">
								<table class="table table-bordered table-condensed table-hover">
								<tr>
									<td>Amount Paid:</td>
									<td><input type="text" id= "amtacct" name="amtacct" readonly value="10"></td>
								</tr>
								<tr>
									<td>Penalty Paid:</td>
									<td><input type="number" step=1 min=0 id= "penaltyamtacct" name="penaltyamtacct"></td>
								</tr>
								<tr>
									<td>Date:</td>
									<td><input type="text" id="dateacct" id="dateacct" name="dateacct" readonly/></td>
								</tr>
								<tr>
									<td>Check No:</td>
									<td><input type="text" id="checknoacct" name="checknoacct" ></td>
								</tr>
								<tr>
									<td>Payment Type:</td>
									<td>
										<select name = "paytypeacc" id="paytypeacc">
											<option value="check">Check</option>
											<option value="cash">Cash</option>
											<option value="money order">Money Order</option>
											<option value="debit card">Debit Card</option>
											<option value="electronic">Elec. Transfer	</option>
											<option value="other">Other </option>
											<option value=""> None</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan=2> Status:<span id="status"> Not Paid</span> </td>
								</tr>
								<tr>
									<td colspan=2> <input type="submit" value="Save Payment" id="save-payment"></td>
								</tr>
								</table>
							</form>
						</div>
							
					  </div>
					
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div> -->
					</div>
				  </div>
				</div>
	</form>
	</div>
</body>
</html>