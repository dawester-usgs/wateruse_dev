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
#date-drilled {
   z-index: 9999999 !important;
}
#paytypeacc {
   z-index: 9999999 !important;
}
.modal-content{
	 z-index: 9999999 !important;
}
#the-modal2 .modal-content{
	width:1500px;
	margin-left:-70%;
	margin-top:-1%;
	overflow-x:hidden;
}

#the-modalMap .modal-content{
	position:relative;
	right:25%;
	width:1000px;
	height:800px;
}

#the-modalMap .modal-body{
	width:auto !important;
	height:auto !important;
	z-index:99999 !important;
}
#map{ 
	position: absolute;
	top:0; 
	bottom:0; 
	right:0; 
	left:0; 
	//width: 700px;
	height: 600px;

}
</style>
<script>
	var i=1;	
	var months = [];
	var method;
	var total = 0;
	var r =1;
	var ar =1;
	var old_data = {};
	function appendDynamic(m,o,d,y){
		//add the header first
		// "../controller/wells/searchanndata?t=1&mpid="+m+"&owner="+o+"&diverter="+d+"&year="+y,
			$("#the-anndata").empty();
			$("#the-total").empty();
			$.ajax ({
			TYPE: "GET",
			url: "../controller/wells/searchanndata?t=1&mpid="+m+"&year="+y,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			
			success:function(data){
						$("#the-anndata").append(' <thead>\
											<tr>\
												<th class="text-warning text-center eh">#</th>\
												<th class="text-warning text-center eh">Crop</th>\
												<th class="text-warning text-center eh">Acres <a href="#" class="tool-tip" data-toggle="tooltip" title="For three-digit numbers, add two 0s to account for decimal places."> [?]</a></th>\
												<th class="text-warning text-center eh">Rate (Acre-Feet)</th>\
												<th class="text-warning text-center eh"> Method</th>\
												<th class="text-warning text-center eh">Total</th>\
												<th class="text-warning text-center eh"><a href="#" id="new-crops">+</a> </th>\
											</tr>\
											</thead>');
					var p=1;
					var xy;
					var pz;
					//console.log(data);
					$.each(data,function(i,item){
						
						//console.log(item);
						
						
						
						i  = (i+1);
						r = i;
						$("#the-anndata").append('<tbody>\
																<tr id="row'+i+'">\
																		<td><span id="enum'+i+'"  class="enum ann_dataArr">'+i+'</span> </td>\
																		<td><select name="crop_cd'+i+'" id="crops'+i+'" class="form-control crops_cd ann_dataArr" ></select></td>\
																		<td><input type="text" name="acres'+i+'" class="masked form-control acres ann_dataArr AnnDataNumbers"  id="acres'+i+'"  onkeypress="return isNumberKey(event,this.value)"  placeholder="0" value="'+item.acres_irr+'"/></td>\
																		<td><input type="text" name="rate'+i+'"  class="masked form-control ann_dataArr" id="rate'+i+'"  onkeypress="return isNumberKey(event,this.value)" placeholder="0"  value="'+item.app_rate+'"/></td>\
																		<td><select name="method'+i+'" id="method'+i+'" class="form-control ann_dataArr method"></select></td>\
																		<td><input type="text" name="total'+i+'" class="form-control total ann_dataArr"  id="total'+i+'"  onkeypress="return isNumberKey(event,this.value)" value ="'+item.tot_amt+'"readonly/></td>\
																			<td class="text-warning text-center eh"><a id="del-crops'+i+'" class="del-crops"  style="line-height:25px;" onclick="return deleteRow('+i+',true,true)">-</a> \
																			<input type="hidden" name="delete-me-crop'+i+'" id="delete-crop'+i+'"><input type="hidden" name="id" id="last-crop'+i+'" class="ann_dataArr" value="'+i+'"> <input type="hidden" class="ann_dataArr" name="last-crop'+i+'" value="'+item.crop_cd+'"><input type="hidden" class="ann_dataArr"  name="last-acres'+i+'" value="'+item.acres_irr+'"><input type="hidden" class="ann_dataArr" name="last-rate'+i+'" value="'+item.app_rate+'">\
																			</td>\
																	</tr>\
																	</tbody>');
	
							
							 
							 
					
								pz = item.crop_cd;
								getCropsandMethod(i,item.crop_cd,item.irr_meth);
					
						old_data = item;
					
					});
					
							$("#the-total ").append('<tbody><tr>\
													<td colspan=7>\
													<label class="control-label col-xs-4 text-warning text-center" for="local">Total Withdrawn:</label>\
													 <div class="col-md-4">\
														<input type="text" class="form-control ann_dataArr" placeholder="0.00" id="totalw" name= "total_widthdrawn" readonly />\
													</td>		\
													</tr></tbody>');
								getTotal(i);
								
								var id = $(".enum");
								var l =1;
								var ks =0;
								id.each(function(){
										l++;
										 ks= parseInt($(this).html());
										
										
									});
								var ctr = ks;
								
									
						
							$("#new-crops").click(function(e){
								
									
						
								e.preventDefault();
							
								ctr++;
								ar = ctr;
					
									
								r++;
							// <--<input type="hidden" name="new-crop'+ar+'" value="'+ar+'">;
									$("#the-anndata").append('<tbody>\
																<tr id="row'+ar+'">\
																		<td><span id="enum'+ar+'"  class="enum">'+r+'</span> <input type="hidden" name="id" id="id'+ar+'" class="ann_dataArr" value="'+ar+'"><input type="hidden" name="delete-me-crop'+i+'" id="delete-crop'+i+'"> </td>\
																		<td><select name="new-crop_cd'+ar+'" id="crops'+ar+'" class="form-control crops_cd ann_dataArr" ></select></td>\
																		<td><input type="text" name="new-acres'+ar+'" class="masked form-control acres ann_dataArr"  id="acres'+ar+'"  onkeypress="return isNumberKey(event,this.value)"  placeholder="0" min="0"  /></td>\
																		<td><input type="text" name="new-rate'+ar+'"  class="masked form-control AnnDataNumbers ann_dataArr" id="rate'+ar+'"  onkeypress="return isNumberKey(event,this.value)" placeholder="0"   min="0" /></td>\
																		<td><select name="new-method'+ar+'" id="method'+ar+'" class="method form-control method ann_dataArr"></select></td>\
																		<td><input type="text" name="new-total'+ar+'" class="form-control total ann_dataArr"  id="total'+ar+'"  onkeypress="return isNumberKey(event,this.value)" readonly/></td>\
																			<td class="text-warning text-center eh"><a id="del-crops'+ar+'" class="del-crops"  style="line-height:25px;" onclick="return deleteRow('+ar+',true,false)">-</a> \
																			</td>\
																	</tr>\
																	</tbody>');
									
								$("input[type='number']").on("blur",function(){
								var s = $(this).val();
									var k = s.replace(/\b0+/g, "");
									$(this).val(k)
									if (s % 1 === 0){
										return true;
									}else{
										$(this).val(parseFloat(this.value).toFixed(2));
									}
								
								});
								getCropsandMethod(ar,pz,null,true);
							
									
						});							
				//	$(".masked, .monthlies").mask("000,000,000,000,000.00", {reverse: true});	
					
	
			}
			
			
		});			
		NProgress.done();
	}
	function appendAnnDataDynamic(m,o,d,y,t){
		NProgress.start();
			$.ajax ({
			TYPE: "GET",
			url: "../controller/wells/searchanndata?t=2&mpid="+m+"&owner="+o+"&diverter="+d+"&year="+y,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			
				success:function(data){
					NProgress.done();
					 $("#dontviewmepls").empty();
					$("#dontviewmepls").append("<input type='hidden' name='last_ent_units' id='last_ent_units'>");
					$('.monthlies').each(function() {
						var id = $(this).attr("name");
						$("#dontviewmepls").append("<input type='hidden' name='last_"+id+"' id='last_"+id+"'>");
					});	
					$.each(data,function(i,item){
						
							$("input[name='jan']").val(item.jan);
							$("input[name='feb']").val(item.feb);
							$("input[name='mar']").val(item.mar);
							$("input[name='apr']").val(item.apr);
							$("input[name='may']").val(item.may);
							$("input[name='jun']").val(item.jun);
							$("input[name='jul']").val(item.jul);
							$("input[name='aug']").val(item.aug);
							$("input[name='sept']").val(item.sep);
							$("input[name='oct']").val(item.oct);
							$("input[name='nov']").val(item.nov);
							$("input[name='dec']").val(item.dec);
							$("#fac-ent_units").val(item.ent_units);
							
							
							$("input[name='last_jan']").val(item.jan);
							$("input[name='last_feb']").val(item.feb);
							$("input[name='last_mar']").val(item.mar);
							$("input[name='last_apr']").val(item.apr);
							$("input[name='last_may']").val(item.may);
							$("input[name='last_jun']").val(item.jun);
							$("input[name='last_jul']").val(item.jul);
							$("input[name='last_aug']").val(item.aug);
							$("input[name='last_sept']").val(item.sep);
							$("input[name='last_oct']").val(item.oct);
							$("input[name='last_nov']").val(item.nov);
							$("input[name='last_dec']").val(item.dec);
							 $("#last_ent_units").val(item.ent_units);
							
							var sum = 0;
							$('.monthlies').each(function() {
								sum += Number($(this).val());
							});
							if (t =='Facility'){
								$("input[name='total_monthly']").val(sum);
							}else{
								$("input[name='total_monthly']").val(sum+'%');
							}
							
							$("input[name='restrictions']").val(item.restrictions).prop("checked",true);
							$("input[name='use_cd']").val('AG').prop("checked",true);
							$("input[name='salinity']").val(item.salinity).prop("checked",true);
							if (item.who == 'O'){
								$("#who-owner").val(item.who).prop("checked",true);
							}else{
								$("#who-diverter").val(item.who).prop("checked",true);
							}
						//	$("input[name='who']").val(item.who).prop("checked",true);
							
							if (item.paid == 'Y'){
								$("#add-payment").html('Edit Payment');
				
							}
							
							if (item.paid == 'Y'){
								item.paid = 'Yes';
								$("#save-payment").val('Edit Payment');
							}else{
								item.paid = 'No';
								$("#save-payment").val('Save Payment');
							}
							$("#status").html(item.paid);
							$("#status-h").val(item.paid);
							$("input[name='centroid']").val(item.centroid).prop("checked",true);;
					});
				}
			});
	}
	
	function appendPayment(m,o,d,y){
			$.ajax ({
			TYPE: "GET",
			url: "../controller/wells/searchpayment?mpid="+m+"&owner="+o+"&diverter="+d+"&year="+y,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			
				success:function(data){
					$.each(data,function(i,item){
							$("#dateacct").val(item.date_paid);
							$("#checknoacct").val(item.check_no);
							$("#paytypeacc").val(item.pay_type);
					});
				}
			});
	}
	function isNumberKey(evt,n,t){
		
	
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (t !='a') return !(charCode > 31 && (charCode < 46 || charCode > 57) || n.length ==7 ); else return !(n.length == 15); 
	
		
	}
	
	function getListEnum(i,d){
		for (var $k=1; $k<=i; $k++){
		//	console.log($k);
			
		}
		var jk = $("#the-anndata row"+i).closest('tr').nextAll()
	
		if (d != false){
			
			return (i+1);
		}else{
			i+=1;
			
			//console.log(i);
			//console.log($("#the-anndata ").find('tr')[i].innerText);
			 /*var k = parseInt(($("#the-anndata ").find('tr').last()[0].innerText));	
			trSet=$("#the").closest('tr').nextAll();
		   currIndex=$(this).closest('tr').find('td span').html();
		   $(this).closest('tr').remove();
		   trSet.each(function(){
			   $(this).find('td span').html(currIndex);
			   currIndex++;
		   });*/
			 
		}
	}
	function checkTheDropdowns(selected_crop){
		var arr  = $('.crops_cd').find(':selected');
		
			
						$.each(arr, function(){
							///console.log(selected_crop+'='+$(this).val());
								if (selected_crop  != $(this).val()){
									///alert('di parehas');
										$(".method").attr('color','default');
								}else{
									///	alert('parehas');
										$(".method").attr('color','red');
								}
						});
		
		
	}
	

	function getCropsandMethod(n,c,m,newcrop){
		
		NProgress.start();
			
		$.ajax ({
			
			TYPE: "POST",
			url: "../controller/wells/crops",
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				$("#crops"+n).append("<option value= '' selected>---</option>");
				
				
				
				$.each(data,function(i,item){
				
					
					if (c && !newcrop){
					
						
						if (c == "-001"){
							$("#rate"+n).attr('readonly',true);
							$("#crops"+n).addClass("leIdle");
							 $("#rate"+n).addClass('leIdle');
							 $("#acres"+n).addClass('leIdle');
							 $("#total"+n).addClass('leIdle');
							 $("#rate"+n).val(0);
							 $("#rate"+n).attr('readonly',true);
							 // $("#acres"+n).val(0);
							 // $("#acres"+n).attr('readonly',true);
							  $("#total"+n).val(0);
							  $("#totalw"+n).val(0);
							 getTotal(n);
						}
						if (c == item.id){
							
							$("#crops"+n).append("<option value='"+item.id+"' selected>"+item.nm+"</option>");
							checkTheDropdowns();	
						}else{
							
							$("#crops"+n).append("<option value='"+item.id+"'>"+item.nm+"</option>");
						}
					}else{
							
							$("#crops"+n).append("<option value='"+item.id+"'>"+item.nm+"</option>");
					
					}
					
						
				});
			
						
			
				NProgress.done();
			},
			error:function(err, ajaxOptions, throwError){
				alert("Internal Server Error (1) ! Please contact the administrator");
			}
		});
	
		$("#method"+n).append("<option value='CP'>Center Pivot</option>");
		$("#method"+n).append("<option value='FL'>Flood</option>");
		$("#method"+n).append("<option value='FU'>Furrow</option>");
		$("#method"+n).append("<option value='SP'>Sprinkler</option>");
		$("#method"+n).append("<option value='OT'>Other</option>");
		//console.log(m);
		$("#method"+n).val(m);//.prop("selected",true);
		
		//	$("#method"+n).on('change', checkTheDropdowns());
	

	$("#crops"+n).on('change', function(){
			
			 checkTheDropdowns();
			$("input[name='new-crop_cd"+n+"'").val($(this).val());
			
			 if ($(this).val() == '-001'){
				
					 $(this).addClass('leIdle');
					 $("#rate"+n).addClass('leIdle');
					 $("#acres"+n).addClass('leIdle');
					 $("#total"+n).addClass('leIdle');
					 $("#rate"+n).val(0);
					 $("#rate"+n).attr('readonly',true);
					  $("#acres"+n).val(0);
					 // $("#acres"+n).attr('readonly',true);
					  $("#total"+n).val(0);
					  $("#totalw"+n).val(0);
					 getTotal(n);
				
				}else{
					$(this).removeClass('leIdle');
					$("#rate"+n).removeClass('leIdle');
					$("#acres"+n).removeClass('leIdle');
					$("#total"+n).removeClass('leIdle');
					 // $("#acres"+n).removeAttr('readonly');
					   $("#rate"+n).removeAttr('readonly');
					    getTotal(n);
					
				}
			
				
		

	});
		var total;
		var arry = [];
		$("#rate"+n).on('blur',function(){
			var rate = this.value;
			var acres = $("#acres"+n).val();
			total = (acres * rate);

			//console.log('From rate Keypress' + rate + '*' + acres + ' = ' + total);
			if (rate !=null){
				if (rate  <=0 ){
					total =0;
					$("#total"+n).val(total);
							getTotal(n);
				}else{
					$("#total"+n).val(total);
					getTotal(n);
					
				}
			}
				
		
		});
		$("#acres"+n).on('blur',function(){
			var acres = this.value;	
			var rate = $("#rate"+n).val();
			total = (acres * rate);
			
		
			//console.log('From rate Keypress' + rate + '*' + acres + ' = ' + total);
			if (acres !=null){
				if (rate  <=0 ){
					total =0;
					$("#total"+n).val(total);
					$("#total"+n).attr('placeholder','0');
							getTotal(n);
				}else{
					$("#total"+n).val(total);
					getTotal(n);
					
				}
			}
		
		});
		
	}
	var arry = [];
	function getTotal(n){
		
		  var sum = 0;
			$('.total').each(function() {
				sum += Number($(this).val());
			});
			
			if (sum % 1 === 0){
				$("#totalw").val(sum);
			}else{
				$("#totalw").val(parseFloat(sum).toFixed(2));
			}
		
	}
	function undoCrops(n,first){
		
			var c = confirm('Warning: Are you sure you want to undo this crop?');
			if (c){
			
				$("#row"+n).find("*").attr("disabled", false);
				
				$("#row"+n).removeAttr("style");
				$("#delete-crop"+n).val('');
				$("#del-crops"+n).val('');
				$("#del-crops"+n).html('-');
				$("#del-crops"+n).removeClass();
				$("#del-crops"+n).removeAttr('onClick');
				$("#del-crops"+n).attr('onClick','return deleteRow('+n+',true,true)');
				$("#del-crops"+n).addClass('del-crops');
			}
	}
	function deleteRow(n,first,notnew){
		/*if (n<i){
			alert('Please delete from the bottom');
		}else{
	*/
		getTotal(n);
					var meh = 0;
					var meh2 =1;
					var meh3 =0;
					var meh4 =0;
					var meh5 =0;
					var meh6 =0;
					var meh7 =0;
					var meh8 =0;
					var meh9 =0;
		if (notnew == true){
			
				var c = confirm('Warning: Are you sure you want to delete this crop?');
				if (c){
			
					
					
					$("#row"+n).find("*").not("input[type='hidden']").attr("disabled", "disabled");
					$("#del-crops"+n).attr("disabled", false);
					$("#row"+n).attr("style", "background:#ff6961");
					var $l =$("input[name='last-crop"+n+"'");
					
					$("#delete-crop"+n).val($l.val());
					$("#crops"+n).val($l.val());

					$("#del-crops"+n).html('<i class="fa fa-undo" aria-hidden="true"></i>');
					$("#del-crops"+n).removeClass();
					$("#del-crops"+n).removeAttr('onClick');
					$("#del-crops"+n).attr('onClick','return undoCrops('+n+',true)');
					$("#del-crops"+n).addClass('undo-crops');
					
					
					
					$(".enum").each(function(){
						meh++;
						meh2++;
						//console.log('selector => ' + meh2, '--- the new enum' + meh);
						$(this).html(meh);
						$(this).attr('id','enum'+meh);
					
					});
				
					r= meh;
				
						$(".crops_cd").each(function(){
							meh3++;
								$(this).removeAttr('id');
							
								$(this).attr('id','crops'+meh3);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh3);
									
						});
						
						$(".acres").each(function(){
							meh4++;
								$(this).removeAttr('id');
							
								$(this).attr('id','acres'+meh4);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh4);
									
									
						});
						$(".AnnDataNumbers").each(function(){
							meh5++;
								$(this).removeAttr('id');
							
								$(this).attr('id','rate'+meh5);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh5);
									
									
						});
						$(".method").each(function(){
							meh6++;
								$(this).removeAttr('id');
							
								$(this).attr('id','method'+meh6);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh6);
									
									
						});
					
						$(".total").each(function(){
							meh7++;
								$(this).removeAttr('id');
							
								$(this).attr('id','total'+meh7);
								$(this).attr('name','total'+meh7);
									
						});
						$("input[name='id']").each(function(){
							meh8++;
							$(this).attr('id','id'+meh8);
							$(this).val(meh8);
							
						});
						
				}else{
					return false;
				}
			
		}else{
			var c = confirm('Warning: Are you sure you want to delete this crop?');
				if (c){
			
					
					$("#row"+n).remove();
					
					
					
					$(".enum").each(function(){
						meh++;
						meh2++;
						//console.log('selector => ' + meh2, '--- the new enum' + meh);
						$(this).html(meh);
						$(this).attr('id','enum'+meh);
					
					});
				
					r= meh;
				
						$(".crops_cd").each(function(){
							meh3++;
								$(this).removeAttr('id');
							
								$(this).attr('id','crops'+meh3);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh3);
									
						});
						
						$(".acres").each(function(){
							meh4++;
								$(this).removeAttr('id');
							
								$(this).attr('id','acres'+meh4);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh4);
									
									
						});
						$(".AnnDataNumbers").each(function(){
							meh5++;
								$(this).removeAttr('id');
							
								$(this).attr('id','rate'+meh5);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh5);
									
									
						});
						$(".method").each(function(){
							meh6++;
								$(this).removeAttr('id');
							
								$(this).attr('id','method'+meh6);
								var name = $(this).attr('name');
								var newname = name.slice(0,-1);
								$(this).attr('name',newname+meh6);
									
									
						});
					
						$(".total").each(function(){
							meh7++;
								$(this).removeAttr('id');
							
								$(this).attr('id','total'+meh7);
								$(this).attr('name','total'+meh7);
									
						});
						$("input[name='id']").each(function(){
							meh8++;
							$(this).attr('id','id'+meh8);
							$(this).val(meh8);
							
						});
						
				}else{
					return false;
				}
		}
			
			i-=2;
		//}
		
	}
	
	function computeMonthlies(n,m){
		

		var sum = 0;
		
		$('.monthlies').each(function() {
			sum += Number($(this).val());

		});
		var $t =  $("#type").val();
		if (sum % 1 === 0){
			if ($t !='Facility'){
				$("input[name='total_monthly']").val(sum+'%');
			}else{
				$("input[name='total_monthly']").val(sum);
			}
			
		}else{
			//(this).val(parseFloat(this.value).toFixed(2));
			if ($t !='Facility'){
				$("input[name='total_monthly']").val(parseFloat(sum).toFixed(2) + '%');
			}else{
				$("input[name='total_monthly']").val(parseFloat(sum).toFixed(2));
			}
		}
		
		
	
			
	}
	
	function getData(mpid){
		var m = $("#mpid").val();
					
		var y = $("#year-h").val();
		var d = $("#did").val();
		var o = $("#oid").val();
		var isData = $("#isData").val();
		var t = $("#type").val();
		var fac="";
		var hasData;
		if (t == 'Facility'){
			fac= "&type=fac";
			hasData="";
		}else{
			hasData ="&isData="+isData;
		}
		
		
		$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/searchanndata?t=3&mpid="+m+"&owner="+o+"&diverter="+d+"&year="+y+hasData+fac,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				NProgress.done();
				$.each(data,function(i,item){
					
					$("#owner_nm").html('<a href="#" class="openSesame" > ' + item.owner_nm + '</a>');
					$("#owner_id").html('<a href="#" class="openSesame"> ' + item.owner_id + '</a>');
					$("#owner_id-h").val(item.owner_id);
					$("#diverter_id").html('<a href="#" class="openSesame"> ' + item.diverter_id + '</a>');
					$("#diverter_id-h").val(item.diverter_id);
					$("#diverter_nm").html('<a href="#" class="openSesame"> ' + item.diverter_nm + '</a>');
					$("#local_desc").html('<a href="#" class="openSesame"> ' + item.local_desc + '</a>' );
					$("#county").html('<a href="#" class="openSesame"> ' + item.county_nm+ '</a>');
					$("#state_cd").html('<a href="#" class="openSesame"> ' + item.state_nm + '</a>');
					
					//$("#year-h").val(item.wyear);
					
					var y = $("#year-h").val();
				
	
					yearfromddl(y);
					
					if (t != 'Facility'){
						appendDynamic(m,item.owner_id,item.diverter_id,y);
						appendAnnDataDynamic(m,item.owner_id,item.diverter_id,y);
						appendPayment(m,item.owner_id,item.diverter_id,y);
						getJSONData.appendStationDynamic(m,item.owner_id,item.diverter_id,y,item.owner_nm,item.diverter_nm,isData);
					}else{
				
						appendPayment(m,item.owner_id,item.diverter_id,y);
						appendAnnDataDynamic(m,item.owner_id,item.diverter_id,y,t);
						getJSONData.appendStationDynamic(m,item.owner_id,item.diverter_id,y,item.owner_nm,item.diverter_nm,isData,t);
						getFacilityData(t,m,y,isData,item.facility_id);
					}
					
					
					
				});
				$('.openSesame').click(function(){
					$("#the-modal2").modal('show');
				});
			},
			error:function(err, ajaxOptions, throwError){
				alert("Internal Server Error (2)! Please contact the administrator");
			}
		});
	
}
function getFacilityData(t,m,y,isData,fid){
	
	$.ajax ({
			
			TYPE: "GET",
			url: "../controller/wells/searchFacility?t="+t+"&mpid="+m+"&facility_id="+fid+"&year="+y+"&isData="+isData,
			ContentType:"application/json",
			dataType:"json",
			async: "false",
			success:function(data){
				$.each(data,function(i,item){
				});
			}
	});
	
	
}
function yearfromddl(y){
		// get Current Year
		var currYear = new Date().getFullYear();
		// this is constant as required
		var startYear = '1985';
		// loop the difference. In this, the year will be dynamic 
		var $i;
		
		var FiscalYearStartat = '10';
		var month = new Date().getMonth(); 
		var select; 
		var currWaterYear;
	
		for ($i =currYear; $i>=startYear; $i--){
			
				if (month == '10'){
					 currWaterYear = currYear;
				}else{
					currWaterYear = (currYear-1);
					
				}
				
				if ($i == y){
					
					$("#year").append("<option value='"+$i+"' selected>"+$i+"</option>");
					
				}else{
					$("#year").append("<option value='"+$i+"'>"+$i+"</option>");
				}
			
			
			
		}
		//$("#the-year").append("<option value='all'>All Years</option>");
		//$("#year").val(currWaterYear);
}
	
var idleTime = 0;
function timerIncrement() {
		idleTime = idleTime + 1;
		if (idleTime > 1) { // 1 min
			var x = confirm('No activity detected for 2 minutes would you like to continue? Press \'Ok\' to continue or Press \'Cancel\' to close this window');
			
			if (x == false){
				window.close();
			}else{
				return false;
			}
		
		}
}
/*
					$(".tt-query").on('keypress',function(){
						alert(this.val);
							if ($("#filter-owner").is(':checked')){
								getJSONData.getOwner(1);
							}else{
								getJSONData.getOwner(0);
							}	
							if ($("#filter-diverter").is(':checked')){
								getJSONData.getDiverter(1);
							}else{
								getJSONData.getDiverter(0);
							}	
						});*/

$(document).ready(function(){
	
	
	console.log(old_data);
	var openEdit = $("#open-edit").val();
	var openPayment = $("#open-payment").val();
	
	
	if (openEdit == 'yes'){
		$("#the-modal2").modal('show');
	}
	if (openPayment == 'yes'){
		$("#the-modal").modal('show');
	}
	$("#nprogress").attr("z-index","999 !important");
	$("#load-this").hide();
	
	getData($("#mpid").val());
	usgsWellsMapping.wellMapInit();
	$('#the-modalMap').on('shown.bs.modal', function() {
		map.invalidateSize();
	});
	/* idle time */
	 //Increment the idle time counter every minute.
  //  var idleInterval = setInterval(timerIncrement, 12000); // 2 mins 

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
		
	
		var date = new Date();
		var yearnow = date.getFullYear();
		
						
		
		//var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

		/*$.fn.modal.Constructor.prototype.enforceFocus = function() {};

		$confModal.on('hidden', function() {
			$.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
		});*/

			
		//$confModal.modal({ backdrop : false });				
		$("#methods").change(function(){
			method = $(this).val();
			//console.log(method);
			
		});
		$("input[type='number']").on("blur",function(){
			var s = $(this).val();
			var k = s.replace(/\b0+/g, "");
			$(this).val(k)
			if (s % 1 === 0){
				return true;
			}else{
				$(this).val(parseFloat(this.value).toFixed(2));
			}
		
		});
		
		//$("input[type='number']").attr("step","any");
		var hasAnnData;
	$("#the-form").submit(function(e){
			e.preventDefault();
			var acres;
			var rate;
			var rateArr = [];
			var acresArr = [];
			var rate_leidle = $("input[name*='rate']");
			var acres_leidle = $("input[name*='acres']");
			var del_crop = $("input[name*='delete-me-crop']").val();
			var rate_length	 =  $("input[name*='rate']").length;
			rate = rate_leidle.hasClass('leIdle') == true ? (rate = '0') :  $("input[name*='rate']").val();
			acres = acres_leidle.hasClass('leIdle') == true ? (acres = '0') :  $("input[name*='acres']").val();
			var $m = $("input[name='mpid-h']").val();
			var $o = $("input[name='owner_id']").val();
			var $d = $("input[name='diverter_id']").val();
			var $y = $("input[name='year']").val();
			var $t = $("input[name='type']").val();
			
			
			
			var crop_cd =$("[name^='crop_cd']");
			var total = $("#totalw").val();
			var total_monthly = $("input[name='total_monthly']").val().replace('%', '');

		
			var pay = $("#pay").val();
		 
			var data = $(this).serialize();
			
			var url = $(this).attr('action');
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
			
	
			//alert(pay);
	
			
		
			var proceed = false;
			var stoplookandlisten = false;
				if (pay == ""){
				//	alert();
				//alert(total_monthly);
				
					$(".required").attr('required');
					$(".AnnDataNumbers").each(function(){
						
						var val = $(this).val();
						var isIdle = $(this).hasClass('leIdle');
						//alert('idle =' + isIdle);
						if (isIdle == false){
						/*	if (val == 0 ){
								
								alert("Acres should not be null");
								proceed = false;
								stoplookandlisten = true;
								return false;
							}else */if (method == 'E'){
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
					
					
					
					if (del_crop !=''){
							// $(".method").each(function(){
								// var val = $(this).val();
								
								// console.log(val);
								// if (val == "" || val ==null){
									// alert('Please Select Method');
									// proceed= false;
									// return false;
								// }
							// });
							
					}
				
					$(".crops_cd").each(function(){
						var val = $(this).val();
						
						//console.log(val);
						if (val == ''){
							alert('Please select a Crop');
							proceed= false;
							return false;
						}
					});
					
					
					
					if ($t == 'Facility' || $t == 'facility'){
						proceed = true;
					}
					
				
					if (proceed == true){
					NProgress.start();
						
						//var question = confirm("Do you wish to continue? All changes are final and cannot be reverted back");
						
						//if (question == true ){
							//alert();
								$.ajax({
											url:url, 
											type:'POST',
											data:data,
											success:function(data){
															//console.log(data);
															data = $.trim(data);
															if(data == 'success'){
																	 window.focus();
																	//lert('Succesfully saved! Please close this Tab');
																	//$("#saveann").attr('disabled','disabled');
																	$("#add-payment").removeAttr('disabled');
																	if ($t == 'Facility' || $t == 'facility'){
																		//append nothing
																	}else{
																		appendDynamic($m,$o,$d,$y)
																	
																	}
																	NProgress.done();
																	//$("#saveModal").modal('show');
																 //	window.top.close();
																//	open(location, '_self').close();
																	$(".status_1").html('Successfully saved!');
																
																	$(".status_1").effect('pulsate','slow');
																	$(".status_1").css('color','green');
																	setTimeout(function() {
																				$(".status_1").fadeOut('fast');
																	}, 10000); 
																	$("#add-payment").removeAttr('disabled');
																		NProgress.done();
																}else{
																	alert('Error');
																}
														   }
													});
							return true;
						/*}else{
							NProgress.done();
							return false;
						}*/
							
				
					
					}
						

				}else{
			//	alert();
					$(".required").removeAttr('required');
						var question = confirm("Do you wish to continue? All changes are final and cannot be reverted back");		
						if (question == true ){
								$.ajax({
									url:url, 
									type:'POST',
									data:data,
									success:function(data){
									if(data == 'success'){
										window.focus();
										alert('Payment has successfully been posted.');
										$("#status").html('Paid');
									
										$("#save-payment").attr('disabled','disabled');
										$("#save-payment").css('cursor','not-allowed');
										
									}
								}
							});
						}else{
							
								return false
						}		
				
					
					
				}
			
						
						
		});
		
		$("#showMeasPt").click(function(){
			$("#saveModal .close").click();
			$("#the-modal2").modal('show');
		
		});
		$("#showPayment").click(function(){
			$("#saveModal .close").click();
			$("#the-modal").modal('show');
		
		});
		$("#closeSaveModal").click(function(){
			$("#saveModal .close").click();
			window.close();
			
		
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
		$("#edit-measpt").click(function(){
			$('#the-modal2').modal('show');  
			$("#pay").val("Y");
			getJSONData.initData();
		});
		
	$("#dateacct").datepicker({
						changeMonth: true,
						changeYear: true,
						yearRange: '1985:'+yearnow
						});
				
		
	$("#the-form2").submit(function(evt){
			$("#load-this").show();
			NProgress.start();
			evt.preventDefault();
			var data = $(this).serialize();
			var url = $(this).attr('action');
			var $val = 0;
						
			var owner = $("#owner_id-h").val();	
			var diverter = $("#diverter_id-h").val();	
			var mpid  = $("input[name='mpid-h']").val();	
			var year  = $("#year-h").val();	
			$(".required").each(function(){
							if ($(this).val() == '' || $(this).val() == '--'){
								$val = 1;
								//console.log('when val is null this is the value =>' + $(this).val() + $(this)[0].name);
								$(this).addClass('error');
							}else{
								$(this).removeClass('error');	
							}
						});
						if ($val > 0) {
							alert('Please enter the hightlighted values');
							return false;
						}else{
							$.ajax({
								url:url, 
								type:'POST',
								data:data,
								success:function(data){
										if(data == 'success'){
											NProgress.done();
											//window.location = 'https://wise.er.usgs.gov/wateruse/wells';
											window.location.href = "https://wise.er.usgs.gov/"+$dir+"/wells/measpt?mpid="+mpid+"&year="+year+"&diverter="+diverter+"&owner="+owner;
											alert('Succesfully saved!');
										}else{
											alert('Data Exist - A MPID is already located at this point');
										}
								  }
							});
						}
		
		});
	}); // end ready 
	
			/* station append */
		function lookup_owner(key_count) {
						
					
				var searchQuery = $("#list-owner");
				var t = $("#type").val();
				var x = $("#x").val();

				if(key_count == key_count_global) {
						
				
					var query = encodeURIComponent(searchQuery.val());
					
				if (query != ""){
							if ($("#filter-owner").is(':checked')){
								getJSONData.getOwner(1,query);
							}else{
								getJSONData.getOwner(0,query);
							}	
					
					
					}
						
					
				}
		}
		function lookup_diverter(key_count,t) {
						
					
				var searchQuery = $("#list-diverter");
				var t = $("#type").val();
				var x = $("#x").val();
				//console.log(key_count)
				if(key_count == key_count_global) {
						
			
					var query = encodeURIComponent(searchQuery.val());
					
				if (query != ""){
					
							if ($("#filter-diverter").is(':checked')){
								getJSONData.getDiverter(1,query);
							}else{
								getJSONData.getDiverter(0,query);
							}	
					}
						
					
				}
		}
		function lookup_facility(key_count,t) {
							
						
					var searchQuery = $("#list-facility");
					var t = $("#type").val();
					var x = $("#x").val();
					//console.log(key_count)
					if(key_count == key_count_global) {
							
				
						var query = encodeURIComponent(searchQuery.val());
						
					if (query != ""){
						
								if ($("#filter-facility").is(':checked')){
									getJSONData.getFacility(1,query);
								}else{
									getJSONData.getFacility(0,query);
								}	
						}
							
						
					}
			}
	var getJSONData = {
					
				initData: function(){
					
						
					var date = new Date();
					var yearnow = date.getFullYear();
					//$(".select2").select2();
					$("#hideme").hide();
					$("input[name='well_depth']").attr("readOnly",true);
					$("#date-drilled").attr("readOnly",true);
					$("#status-div").html("Loading : 0%");
			
					this.getOwner(1);
					key_count_global = 0;
					$("#list-owner").on("keypress", function() {
							key_count_global++;
							setTimeout("lookup_owner("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
						});
					
					$("#list-diverter").on("keypress", function() {
							key_count_global++;
							setTimeout("lookup_diverter("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
						});
					$("#list-facility").on("keypress", function() {
							key_count_global++;
							setTimeout("lookup_facility("+key_count_global+")", 250);//Function will be called 1 second after user stops typing.
						});
						
					$("#filter-owner").click(function(){
						$("#list-owner").val('');
							var $k = $(this).is(":checked");
							if ($k == true){
								$("#list-owner").val('');
								//console.log(isEmpty);
								 $('#list-owner ').typeahead('destroy');
							}
					});
					$("#filter-diverter").click(function(){
						
							var $k = $(this).is(":checked");
							if ($k == true){
								$("#list-diverter").val('');
							
							}
					});
					$("#date-drilled").datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '1985:'+yearnow
						
					});
					$("#source_cd_station").on('change',function(){
						
						var source_cd  = $(this).val();
						if (source_cd == 'GW'){
							$("#hideme").show();
							$("input[name='well_depth']").addClass("required");
							$("input[name='well_depth']").attr("readOnly",false);
							
							$("#driller").addClass("required");
							$("#date-drilled").addClass("required");
							$(".driller-imp").show();
							$(".hidesw").show();
						}else if (source_cd == 'SW'){
							//$("#date-drilled").removeClass("required");
							$("#driller").removeClass("required");
							$("#aquifer").removeClass("required");
							$(".driller-imp").hide();
							$(".hidesw").hide();
							$("#hideme").hide();
							$("input[name='well_depth']").val('');
							$("input[name='well_depth']").removeClass("required");
							$("input[name='well_depth']").attr("readOnly",true);

						}else if (source_cd == 'SP'){
							$("#date-drilled").removeClass("required");
							$("#driller").removeClass("required");
							$("#aquifer").removeClass("required");
							$(".driller-imp").hide();
							$(".hidesw").hide();
							$("#hideme").hide();
							$("input[name='well_depth']").val('');
							$("input[name='well_depth']").removeClass("required");
							$("input[name='well_depth']").attr("readOnly",true);

						}else{
							$("#hideme").hide();
							$(".hidesw").show();
							$("input[name='well_depth']").val('');
							$("input[name='well_depth']").removeClass("required");
							$("input[name='well_depth']").attr("readOnly",true);
							
							$("#driller").addClass("required");
							$("#date-drilled").addClass("required");
							$(".driller-imp").show();
						}
				
					});
					$("#draft").click(function(){
							$("#saveasdraft").attr('name','saveasdraft');
							$("#saveasdraft").val('true');
								
					});
					$("#save").click(function(){
						$("#saveasdraft").val('false');
								
					});
					$("#date-drilled-unknown").click(function(){
							if ($(this).is(':checked')){
								$("#date-drilled").val('Unknown');
								$("#label-date-drilled-unknow").text('Uncheck to select a date');
								$("#date-drilled").datepicker("destroy");
								$("#date-drilled").removeClass('error');
							}else{
								$("#date-drilled").val('');
								$("#date-drilled").addClass('error');
								$("#label-date-drilled-unknown").text('Check if unknown');
								$("#date-drilled").datepicker();
							}
							
						});
						
				
				
				var inputQuantity = [];
							//$(function() {
										  $(".numbers").each(function(i) {
											inputQuantity[i]=this.defaultValue;
											 $(this).data("idx",i); // save this field's index to access later
										  });
										  $(".numbers").on("keyup", function (e) {
											var $field = $(this),
												val=this.value,
												$thisIndex=parseInt($field.data("idx"),10); // retrieve the index
											//window.console && console.log($field.is(":invalid"));
											  //  $field.is(":invalid") is for Safari, it must be the last to not error in IE8
											if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
												this.value = inputQuantity[$thisIndex];
												return;
											} 
											if (val.length > Number($field.attr("maxlength"))) {
											  val=val.slice(0, 5);
											  $field.val(val);
											}
											inputQuantity[$thisIndex]=val;
										  });      
							//});
				},
				
				getDriller:function(seleted_driller){
							
						$("#driller").empty();
						$("#driller").append('<option disabled>Loading Data please wait...<option>');
						
			
						$.ajax ({
								type: "POST",
								url: "../controller/wells/driller",
								ContentType: "application/json",
								dataType: "json",
								success:function(data){
									$("#driller").empty();
									$("#driller").append('<option value="">--</option>');	
									$.each (data, function (i,item){
										if (data[i].use_cd != 'AG' || data[i].use_cd != 'IR'){
											if (item.nm == seleted_driller){
												$("#driller").append('<option value = "'+data[i].nm+'" selected>'+data[i].nm+'</option> ');
											}else{ 
												$("#driller").append('<option value = "'+data[i].nm+'">'+data[i].nm+'</option> ');
											}
										}
									});
								
								}
						});
				},
				getAquifer: function(selected_aquifer){
					$("#aquifer_station").empty();
					$("#aquifer_station").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../controller/wells/aquifer",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#aquifer_station").empty();	
								$("#aquifer_station").append('<option value="">--</option>');	
								$.each (data, function (i,item){
									
									if (data[i].use_cd != 'AG' || data[i].use_cd != 'IR'){
										
										if (item.id == selected_aquifer ){
											$("#aquifer_station").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
										}
										else{
											$("#aquifer_station").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										}
									}
								});
								
							}
					});
				},
				getCounty: function(selected_county){
					$("#county_station").empty();
					$("#county_station").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchcounty",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#county_station").empty();	
								$("#county_station").append('<option value="">--</option>');	
								$.each (data, function (i,item){
									
									if (item.cd == selected_county){
										$("#county_station").append('<option value = '+data[i].cd+' selected>'+data[i].nm+'</option> ');	
									}
									else{
										$("#county_station").append('<option value = '+data[i].cd+'>'+data[i].nm+'</option> ');	
									}
								
								});
								
							}
					});
				},
				getState: function(selected_state){
					$("#state_county").empty();
					$("#state_county").append('<option disabled>Loading Data please wait...<option>');
					
					$.ajax ({
							type: "POST",
							url: "../json/fetchstate",
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#state_county").empty();	
								$("#state_county").append('<option value="">--</option>');	
								$.each (data, function (i,item){
	
									if (item.id == selected_state){
										$("#state_county").append('<option value = '+data[i].id+' selected>'+data[i].nm+'</option> ');	
									}
									else{
										$("#state_county").append('<option value = '+data[i].id+'>'+data[i].nm+'</option> ');	
										
									}
								});
								
							}
					});
				},
				getOwner: function(filter,query){
					var l = 0;
					NProgress.start();
					$("#list-owner").empty();
					$("#status-div").empty();
					/*
					$("#list-owner").append('<option disabled>Loading Owner please wait...<option>');
					var owner = $("#owner_id-h").val();
					
					$.ajax ({
							type: "GET",
							url: "../json/fetchowner?filter="+filter,
							ContentType: "application/json",
							dataType: "json",
							success:function(data){
								$("#list-owner").empty();	
								$("#list-owner").append('<option value="">--</option>');	
								$.each (data, function (i,item){
								
										$("#list-owner").append('<option value = '+data[i].id+'>'+data[i].nm+' ('+data[i].id+')</option> ');	
									 
									l++;
								});
								for (var $i=0; $i<=l; ++$i){
									$percentage = (($i/l)*100);
									if ($percentage <100){
										$("#status-div").html("Loading :"+$percentage+ '%');
									}else{
										$("#status-div").html("Succesfully Loaded :"+$percentage+ '%');
									}
									
									
								}
								
								getJSONData.getDiverter(1);
								NProgress.done();
							}
					});*/
									
					$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchowner?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list =  new Array();
								$.each(data, function(i,item){
										list.push(data[i].nm+ ' ('+data[i].id+')');	
									
								});
								var isEmpty = list.length;
								
								//console.log(isEmpty);
								 $('#list-owner ').typeahead('destroy');
									var list = new Bloodhound({
										datumTokenizer: Bloodhound.tokenizers.whitespace,
										queryTokenizer: Bloodhound.tokenizers.whitespace,
										local: list
								});
								
								 $('#list-owner').typeahead(null, {
								  name: 'list',
								  limit: 15,
								  source: list,
									 templates: {
										empty: '<div class="empty-message tt-suggestion" style="padding-left:5px; overflow: hidden; text-overflow: ellipsis;"> No result for '+query+' </div>'
									  }
								  
								});
							
								/*		
						
								$('#scrollable-dropdown-menu .typeahead').typeahead({
									hint: true,
									highlight: true, 
									minLength: 1, 
								},
								
								{
									name: 'list',
									source: list
								});
									*/
									NProgress.done(true);
									
							},
							error:function(err, ajaxOptions, throwError){
								alert("Internal Server Error (3)! Please contact the administrator");
							}
							
					});
					//	$("#list-owner").css("width","500px");
				
				},
				getFacility: function(filter,query){
					var l = 0;
					NProgress.start();
					$("#list-facility").empty();
					$("#status-div").empty();
					
									
					$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchfacility?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list =  new Array();
								$.each(data, function(i,item){
										list.push(data[i].nm+ ' ('+data[i].id+')');	
									
								});
								var isEmpty = list.length;
								
								//console.log(isEmpty);
								 $('#list-facility').typeahead('destroy');
									var list = new Bloodhound({
										datumTokenizer: Bloodhound.tokenizers.whitespace,
										queryTokenizer: Bloodhound.tokenizers.whitespace,
										local: list
								});
								
								 $('#list-facility').typeahead(null, {
								  name: 'list',
								  limit: 15,
								  source: list,
									 templates: {
										empty: '<div class="empty-message tt-suggestion" style="padding-left:5px; overflow: hidden; text-overflow: ellipsis;"> No result for '+query+' </div>'
									  }
								  
								});
							
								/*		
						
								$('#scrollable-dropdown-menu .typeahead').typeahead({
									hint: true,
									highlight: true, 
									minLength: 1, 
								},
								
								{
									name: 'list',
									source: list
								});
									*/
									NProgress.done(true);
									
							},
							error:function(err, ajaxOptions, throwError){
								alert("Internal Server Error (3)! Please contact the administrator");
							}
							
					});
					//	$("#list-owner").css("width","500px");
				
				},
				getDiverter: function(filter,query){
						NProgress.start();
						$.ajax ({
							
							TYPE: "GET",
							url: "../json/fetchdiverter?filter="+filter+'&q='+query,
							ContentType:"application/json",
							dataType:"json",
							async: "false",
							success:function(data){
								var list =  new Array();
								$.each(data, function(i,item){
										list.push(data[i].nm+ ' ('+data[i].id+')');	
									
								});
								var isEmpty = list.length;
								
								//console.log(isEmpty);
								 $('#list-diverter').typeahead('destroy');
									var list = new Bloodhound({
										datumTokenizer: Bloodhound.tokenizers.whitespace,
										queryTokenizer: Bloodhound.tokenizers.whitespace,
										local: list
								});
								
								 $('#list-diverter').typeahead(null, {
								  name: 'list',
								  limit: 15,
								  source: list,
									 templates: {
										empty: '<div class="empty-message tt-suggestion" style="padding-left:5px; overflow: hidden; text-overflow: ellipsis;"> No result for '+query+' </div>'
									  }
								  
								});
							
								/*		
						
								$('#scrollable-dropdown-menu .typeahead').typeahead({
									hint: true,
									highlight: true, 
									minLength: 1, 
								},
								
								{
									name: 'list',
									source: list
								});
									*/
									NProgress.done(true);
									
							},
							error:function(err, ajaxOptions, throwError){
								alert("Internal Server Error (4)! Please contact the administrator");
							}
							
					});
				},
				appendStationDynamic: function(m,o,d,y,owner_nm,diverter_nm,isData,t){
					var latitude_dd;
					var longitude_dd;
					var hasData;
					var fac;
					
					if (t == 'Facility'){
						fac= "&type=fac";
						hasData="";
					}else{
						hasData ="&isData="+isData;
					}
					
					$.ajax ({
						TYPE: "GET",
						url: "../controller/wells/searchanndata?t=3&mpid="+m+"&owner="+o+"&diverter="+d+"&year="+y+hasData+fac,
						ContentType:"application/json",
						dataType:"json",
						async: "false",
					
						success:function(data){
							$.each(data,function(i,item){
									if (t== 'Facility'){
										$("#facility_tr").show();
										$("#facility_id").append(item.facility_id);
										$("#facility_id-h").append(item.facility_id);
										$("#facility_nm").append(item.facility_nm);
										$("#list-facility").attr("placeholder",item.facility_nm);
									}else{
										$("#facility_tr").empty();
										$("#facility_tr").hide();
									}
									$("#list-owner").attr("placeholder",owner_nm);
									$("#list-diverter").attr("placeholder",diverter_nm);
									
									$("#local_desc_station").val(item.local_desc);
									$("#action_cd_station").val(item.action_cd);
									$("#source_cd_station").val(item.source_cd);
									$("#tract_no_station").val(item.tract);
									
									$("#farm_no_station").val(item.farm);
									$("#quad_no_station").val(item.quadno);
									$("#operator_no_station").val(item.wellno);	
									$("#well_no_station").val(item.wellno);
									$("#source_nm_station").val(item.stream_nm);		
									$("input:radio[name='dam']").val([item.dam]);
									getJSONData.getDriller(item.driller_nm);
									getJSONData.getAquifer(item.prin_aquifer);
									if (item.source_cd == 'GW'){
										$("#hideme").show();
										$("input[name='well_depth']").removeAttr('readonly');
										$("input[name='well_depth']").val(item.well_depth);
									}else{
										$("input[name='well_depth']").attr('readonly',true);
										$("#aquifer_station").attr('readonly',true);
										$("#driller_station").attr('readonly',true);
									}
									$("#date-drilled").val(item.date_drilled);
									getJSONData.getCounty(item.county_cd);
									getJSONData.getState(item.state_cd);
									$("#huc_station").html("<a href='#' id ='aHuc_station'>"+item.huc+"</a>");
									$("#quad1_station").val(item.quad1);
									$("#quad2_station").val(item.quad2);
									$("input[name='section']").val(item.section);
									$("input[name='township']").val(item.township);
									$("input[name='elevation']").val(item.altitude);
									$("input[name='range']").val(item.range);
									$("input[name='pump_hp']").val(item.pump_hp);
									$("input[name='pipe_diam']").val(item.pipe_diam);
									$("input[name='huc']").val(item.huc);
								
									latitude_dd = parseFloat(item.latitude_dd);
									longitude_dd = parseFloat(item.longitude_dd);
										
									$("span[name='lat']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" +  item.latitude+ " / " + latitude_dd.toFixed(3) + "</a>");
									$("input[name='latDMS']").val(item.latitude);
									$("input[name='latDD']").val(item.latitude_dd);
									$("span[name='lng']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" +  item.longitude+ " / " +longitude_dd.toFixed(3) + "</a>");
									$("input[name='lngDMS']").val(item.longitude);
									$("input[name='lngDD']").val(item.longitude_dd);
									$("select[name='power_tp']").val(item.power_tp);
									$("select[name='diversion_meth']").val(item.diversion_meth);
									$("input:radio[name='flow_meter']").val([item.meter_flg]);
									$("input:radio[name='rec_waste']").val([item.rec_waste]);
									
									var source_cd = item.source_cd;
										if (source_cd == 'GW'){
											$("#hideme").show();
											$("input[name='well_depth']").addClass("required");
											$("input[name='well_depth']").attr("readOnly",false);
											
											$("#driller").addClass("required");
											$("#date-drilled").addClass("required");
											$(".driller-imp").show();
											$(".hidesw").show();
										}else if (source_cd == 'SW'){
											//$("#date-drilled").removeClass("required");
											$("#driller").removeClass("required");
											$("#aquifer_station").removeClass("required");
											$(".driller-imp").hide();
											$(".hidesw").hide();
											$("#hideme").hide();
											$("input[name='well_depth']").val('');
											$("input[name='well_depth']").removeClass("required");
											$("input[name='well_depth']").attr("readOnly",true);

										}else if (source_cd == 'SP'){
											$("#date-drilled").removeClass("required");
											$("#driller").removeClass("required");
											$("#aquifer_station").removeClass("required");
											$(".driller-imp").hide();
											$(".hidesw").hide();
											$("#hideme").hide();
											$("input[name='well_depth']").val('');
											$("input[name='well_depth']").removeClass("required");
											$("input[name='well_depth']").attr("readOnly",true);

										}else{
											$("#hideme").hide();
											$(".hidesw").show();
									
											$("input[name='well_depth']").val('');
											$("input[name='well_depth']").removeClass("required");
											$("input[name='well_depth']").attr("readOnly",true);
											
											$("#driller").addClass("required");
											$("#date-drilled").addClass("required");
											$(".driller-imp").show();
												$("#aquifer_station").removeClass("required");
										}
									
							});
						}
					});
				},
				
			}
			
		/** END OF  STATION APPEND 	 **/ 
		var usgsWellsMapping = {
				EsriBaseLayer : 'https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png',
				map: null,
				wellsLayer:null,
				largeMapShown:false,
				layer: [2,3,9],
				data : [],
			
			wellMapInit : function(){
				
					var BaseLayer = L.tileLayer(this.EsriBaseLayer,{attribution:false});
					var satLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {attribution:false}),
						  streetLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false}),
						  topoLayer = L.tileLayer('https://server.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false});
						//  elevLayer = L.tileLayer('https://server.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',{attribution:false});
						  
					map = L.map('map',{
					  fullscreenControl: true,
					  fullscreenControlOptions: {
						position: 'topleft'
					  },
					  layers: [satLayer,streetLayer, topoLayer]
					}).setView([34.746483  , -92.289597], 7); /* SET THE VIEW FOCUSED ON LITTLE ROCK,AR*/
						
					var baseLayers = {
						"Sattelite": satLayer,
						"Street": streetLayer,
						"Topographic": topoLayer
					};

					
					
					L.control.layers(baseLayers).addTo(map);
					L.esri.basemapLayer('Gray',{attribution:false}).addTo(map);
					this.getLayer();
					this.getDataFromLayer();
					
						
				},
				
				getLayer : function(){
					L.esri.featureLayer({
						url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8',
						color: '#BA454E',
						opacity: 0.25,
						attribution:'<a href="http://www.doi.gov/">Department of Interior </a>  |  <a href="http://www.usgs.gov"> U.S Geological Survey</a> | <a href="http://ar.usgs.gov"> Arkansas Water Science Center </a>'
					  }).addTo(map);
					  
					 // map.on("zoomstart", function (e) { console.log("ZOOMSTART", e); });
					  
					  
					  	var url = "https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/9";
					
						L.esri.featureLayer({
						  url: url,
						  opacity : 0.50,
						  minZoom : 12,
						  maxZoom :18
						}).addTo(map);
				},
				
				
				getDataFromLayer: function(e,input){
						map.closePopup();
					if (!input){
							map.on('click',function(e){
								this.setView(e.latlng, 12)
								usgsWellsMapping.QueryData(e,null,'c');
								
								
							});
							
							
						
					}else{
							//console.log(null,i);
							var  lat= input[0];
							var lng = input[1];
						
							if(lat.indexOf('.') !== -1 && lng.indexOf('.') !== -1)
							{
								
								var k = [];
								var lngneg;
								if (input[1] < 1){
									lngneg = parseFloat(input[1]);
								
								}else{
									lngneg = parseFloat((input[1])*-1);
									
								}
								var k = [lat,lngneg]
								usgsWellsMapping.QueryData(null,k,'s');
								
								map.zoomIn(15);
								map.panTo(k);
							}else{
								
								if (lat.toString().length<7 && lng.toString().length <7){
									var newInput = this.convertToDD(lat,lng)
									usgsWellsMapping.QueryData(null,newInput,'s');
									map.zoomIn(15);
									map.panTo(newInput);

								}else{
									alert('Invalid Input. Lat/lng in DMS should not be more than 7 characters long!');
									map.closePopup();
								}
								
								
							}

							
							
					}
					
				},
				convertToDMS : function(latlng){
						
						deg = Math.abs(latlng);	
						var d = Math.floor(deg);
						var minfloat = (deg - d)*60;
						var m = Math.floor(minfloat);

						var secfloat = (minfloat-m)*60;
						var s = Math.round(secfloat);
						// After rounding, the seconds might become 60. These two
						// if-tests are not necessary if no rounding is done.
						
						if (s==60) {
							m++;
							s=0;
						}
						if (m==60) {
							d++;
							m=0;
						}

						if (m < 10) {
							m = "0" + m;
					   }
						if (s < 10) {
						  s = "0" + s;
					   }
						return "" + d + m + s;
						
					
					
				 
					
					 // return "" + d + m + s;
					   //return [lat_r,lng_r];
				},
				convertToDD : function (lat,lng){
					var DegreeLat;
					var MinsLat;
					var SecsLat;
					var DDLatMS;
					var DDLat;
					
					var DegreeLng;
					var MinsLng;
					var SecsLng;
					var DDLngMS;
					var DDLng;

					for(indx in lat){
					  DegreeLat = parseInt(lat[0] + lat[1]);
					  MinsLat = parseInt(lat[2] + lat[3]);
					  SecsLat = parseInt(lat[4]+ lat[5]);
					  
					  MinsLat = (MinsLat/60);
					  SecsLat = (SecsLat/3600);
					  DDLatMS =  (MinsLat+SecsLat);
					
					  
					}
					for(indx in lng){
					  DegreeLng = parseInt(lng[0] + lng[1]);
					  MinsLng= parseInt(lng[2] + lng[3]);
					  SecsLng = parseInt(lng[4]+ lng[5]);
					  
					  MinsLng = (MinsLng/60);
					  SecsLng = (SecsLng/3600);
					  DDLngMS =  (MinsLng+SecsLng);
					
					  
					}
					
				
					DDLat = parseFloat(DegreeLat+DDLatMS);
					DDLat = DDLat.toFixed(4); 
					
					DDLng = parseFloat((DegreeLng+DDLngMS)*-1);
					DDLng = DDLng.toFixed(4); 
					return [DDLat,DDLng];
				},
				QueryData : function(e,input,c){
					//console.log('1', input);
					var latlng;
					if (!e){
						latlng= input;
						elevlat= input[0];
						elevlng =input[1];
						alert('no e');
					}else{
					
						latlng = e.latlng;
						elevlat = e.latlng.lat;
						elevlng =e.latlng.lng;
						
						//console.log(latlng);
					}
					
					boundary = L.esri.query({
										url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8'
								});
								boundary.nearby(latlng,1);
								boundary.run(function(error,featureCollection,response){
									isBound = featureCollection.features.length;
								
								if (isBound ==1){
									$.each(usgsWellsMapping.layer,function(i,item){
										//console.log(item);
										var url = 'https://gis.arkansas.gov/arcgis/rest/services/Apps/Basemap_Dynamic/MapServer/'+item
										
										var dynamicQuery =L.esri.query({
													url:url,
													returnGeometry:false
											});
										dynamicQuery.nearby(latlng,1);
										dynamicQuery.run(function(error,featureCollection,response){
											
											if(featureCollection !=null || featureCollection != "undefined"){
												console.log(featureCollection,item);
											
												if (item == '2'){
													quad_nm = featureCollection.features[0].properties.quad_name;
													$("#quad_nm").val(quad_nm);
													
												}else if (item =='9'){
												
													section = featureCollection.features[0].properties.section_;
													county = featureCollection.features[0].properties.county;
													township = featureCollection.features[0].properties.township;
													range = featureCollection.features[0].properties.range;
												
													$("#section").val(section);
													$("#county2").val(county);
													$("#township").val(township.replace(" ",""));
													//$("#township").val(township);
													$("#range").val(range.replace(" ",""));
												}else if (item == '3'){
													onefourthquad = featureCollection.features[0].properties.quad_name;
													direction = featureCollection.features[0].properties.direction;
													$("#onefourth").val(quad_nm);
													$("#direction").val(direction);	
												}/*else if(item=='8'){
													console.log(featureCollection,'alex');
													
													huc2 = featureCollection.features[0].properties.HUC12;
													
													huc2  = huc2.slice(0,-4);
													
													$("#huc2").val(huc2);
												}*/
											
											}
										});
										var urlhuc = 'https://hydro.nationalmap.gov/arcgis/rest/services/wbd/MapServer/6'; 
											
											var dynamicQueryHucOnly = L.esri.query({
													url:urlhuc,
													returnGeometry:false
											});
											dynamicQueryHucOnly.nearby(latlng,1);
											
											 if(item=='8'){
												 dynamicQueryHucOnly.run(function(error,featureCollection,reponse){
													huc2 = featureCollection.features[0].properties.HUC12;
												
													huc2  = huc2.slice(0,-4);
													
													$("#huc").val(huc2);	
												});
												 
												 
											}
									});
									
									$.ajax({
											type: 'GET',
											url: 'https://nationalmap.gov/epqs/pqs.php?x='+elevlng+'&y='+elevlat+'&units=Feet'+'&output=json',
											ContentType:"application/json",
											dataType:"json",
											async: "false",
											success:function(data){
												$.each(data,function(i,item){
													elevation = data['USGS_Elevation_Point_Query_Service'].Elevation_Query['Elevation'];
													if (elevation){
															$("#elevation").val(elevation);
														}
															
													});
												}

										});
										$("#lat").val(elevlat);
										$("#lng").val(elevlng);
									var quad1 = $("#quad_nm").val();
									var onefourth1 = $("#onefourth").val();
									var section1 = $("#section").val();
									var range1 = $("#range").val();
									var township1 = $("#township").val();
									var lat1 = $("#lat").val();
									var lng1 = $("#lng").val();
									var direction1 = $("#direction").val();
									var elevation1 = $("#elevation").val();
									var county1 = $("#county2").val();
									var huc = $("#huc").val();
									var content = "Click me again to load the data";
									var x;
								
									var elevlatDMS = usgsWellsMapping.convertToDMS(elevlat);
									var elevlngDMS = usgsWellsMapping.convertToDMS(elevlng);
									
											var linktoAppend = '<a href="#" id="assoc" onClick="return usgsWellsMapping.appendData();"> Use this Information </a>';
											content = 'Information for County: <strong>'+county1+'</strong>\
															<br>\
															Latitude: <strong>'+elevlat+'</strong>\
															<br>\
															Longitude: <strong>'+elevlng+'</strong>\
															<br>\
															Latitude (Degree Minutes Seconds): <strong>'+elevlatDMS+'</strong>\
															<br>\
															Longitude (Degree Minutes Seconds): <strong>'+elevlngDMS+'</strong>\
															<br>\
															Quad name: <strong>'+quad1+'</strong>\
															<br>\
															Section: <strong>'+section+'</strong>\
															<br>\
															Range: <strong>'+range1+'</strong>\
															<br>\
															Township: <strong>'+township1+'</strong>\
															<br>\
															HUC: <strong>'+huc+'</strong>\
															<br>\
															Direction: <strong>'+direction1+'</strong>\
															<br>\
															Altitude in Feet (ft): <strong>'+elevation1+'</strong>\
															<br>\
															<br>\
															<strong> NOTE: IDENTIFY THE QUARTER OF QUARTER FIRST BEFORE PROCEEDING. </strong>\
															<br>\
															'+linktoAppend+'\
															';
											
									
											// c == 'c' ? content = '<a href= "#" id="load-content-onemoretime"> Click me  to load the data </a>' : content = 'Hit the Search Button again or hit this <a href= "#" id="load-content-onemoretime"> Link </a>!';
											
											//content = 'Due to poor internet connection or server issues with data provider, some of the data may not load right away. <br> Click the map to try loading the data again. <br> If problem persist please refer to the manual by clicking <a href="https://wise.er.usgs.gov/wateruse/wells/help.html#mapping" target="_blank"> this link </a>';
										
										var popup = L.popup();
											popup
											.setLatLng(latlng)
											.setContent(content)
											.openOn(map);
											
											$('#load-content-onemoretime').click(function(e){
											
												e.preventDefault();
										
												usgsWellsMapping.QueryData(null,[lat1,lng1],'c');
											});
										
										
								}else{
									var popup = L.popup();
											popup
											.setLatLng(latlng)
											.setContent('Out of bounds')
											.openOn(map);
									
								}
								
								
								
									
							});
								
				},
				appendData : function(){
									var quad1 = $("#quad_nm").val();
									var onefourth1 = $("#onefourth").val();
									var section1 = $("#section").val();
									var range1 = $("#range").val();
									var township1 = $("#township").val();
									var latDD = parseFloat($("#lat").val());
									var lngDD = parseFloat($("#lng").val());
									var direction1 = $("#direction").val();
									var elevation1 = $("#elevation").val();
									var county1 = $("#county2").val();
									var huc2 = $("#huc2").val();
									var latDMS = $("#latDMS").val();
									var lngDMS = $("#lngDMS").val();
									//console.log(huc2);
									$('#the-modalMap').modal('hide');
									$("body").addClass("modal-open");
								
									$('#county_station option:contains('+county1.toUpperCase()+')').attr('selected', true);
									$('input[name="county_cd"]').val(county1); ///.pro('selected',true);
									$('#aHuc_station').text(huc2);
									$('input[name="huc2"]').val(huc2);
									$('#stat-section').val(section1);
									$('#stat-township').val(township1);
									$('#stat-range"').val(range1);
									
									/* convert lat long */
									/* LAT */
									
									
									$("span[name='lat']").empty();
									$("span[name='lat']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" + latDMS + " / " + latDD.toFixed(3)  + "</a>");
									$("input[name='latDMS']").val(latDMS);
									$("input[name='latDD']").val(latDD);
									/* LNG */
									
									$("span[name='lng']").empty();
									$("span[name='lng']").html("<a href='#' class='openMap' data-toggle='modal' data-target='#the-modalMap'>" +  lngDMS + " / " +lngDD.toFixed(3) + "</a>");
									$("input[name='lngDMS']").val(lngDMS);
									$("input[name='lngDD']").val(lngDD);
							
									$('input[name="elevation"]').val(elevation1);

									$('#mpid-span').text(latDMS+lngDMS+'01');
								
									// $("input[name='mpid-new']").val(latDMS+lngDMS+'01');
								
									
									
				}
		}
		/** end Map **/
		/** END OF CODE 	 **/ 
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
.del-crops{
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
.del-crops:hover{
	  background: #f20010;
	  background-image: -webkit-linear-gradient(top, #f20010, #c2192a);
	  background-image: -moz-linear-gradient(top, #f20010, #c2192a);
	  background-image: -ms-linear-gradient(top, #f20010, #c2192a);
	  background-image: -o-linear-gradient(top, #f20010, #c2192a);
	  background-image: linear-gradient(to bottom, #f20010, #c2192a);
	  text-decoration: none;
}


.undo-crops{
		cursor:pointer;
	  background: #fa002a;
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
.undo-crops:hover{
	  background: #f20010;
	  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
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
.tt-suggestion {
	font-size: 15px;  /* Set suggestion dropdown font size */
	padding: 3px 20px;
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
 
	<input type="hidden" id="open-edit" value = "<?php echo $_GET['openModalEdit']; ?>">
	<input type="hidden" id="open-payment" value = "<?php echo $_GET['openModalPayment']; ?>">
	<form class="form-horizontal" id="the-form" method="POST">
	<input type="hidden" id="mpid" name="mpid" value = "<?php echo $_GET['mpid']; ?>">
	<input type="hidden" name="action_cd" value = "<?php echo $_GET['action_cd']; ?>">
	<input type="hidden" name="source_cd" value = "<?php echo $_GET['source_cd']; ?>">
	<input type="hidden" id="isData" name="isData" value = "<?php echo $_GET['isData']; ?>">
	<input type="hidden" id="type" name="type" value = "<?php echo $_GET['type']; ?>">
	<input type="hidden" name="pay" id="pay" >
	
		<div class="control-group">
<!--annual data-->
			<table class="table table-bordered table-condensed table-hover">
			<tr>
			<th colspan=5>
			<div class="col-l-2 text-center" id="table-annual">
				<p class="h4 text-warning"><strong>Edit Annual Data for <?php echo $_GET['mpid']; ?></strong></p>	
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
			<tr id="facility_tr">
				<td>
				<label class="control-label col-md-2" for="facility">Facility:</label>
				 <div class="col-sm-10">
					<p class="form-control-static" id="facility_nm"> </p>
				</td>
				<td colspan=2>
				<label class="control-label col-md-2" for="facility-id">ID:</label>
				 <div class="col-sm-10">
					<p class="form-control-static" name="facility_id-h" id="facility_id"></p>
					<input type="hidden" name="facility_id" id="facility_id-h" />
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
				<select  class="form-control" name="wyear" id="year"></select>
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
			<?php 
				if ($_GET['type'] == 'Facility'){
					echo '<tr>
				<td colspan="4">
					<label class="control-label col-md-1 for=" method"="" style="line-height:35px;">Units: </label>
					<div class="col-md-5" style="line-height:50px;">
						<select name="ent_units" id="fac-ent_units">
									<option value="ACFT">Acre-Feet</option>
									<option value="MG">Million Gallons</option>
									<option value="MGD">Million Gallons per Day-Feet</option>
									<option value="GAL">Gallons</option>
								</select>
						<span class="important">*</span>
					</div>
				</td>
				
			</tr>';
				}
			?>
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
				<p class="h4 text-warning"><strong>Monthly Report</strong></p>	
			</div>
			</th>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Jan</label>
			<div class="col-xs-6">
				<input type="text" class="form-control ann_dataArr2 monthlies" name="jan"  placeholder="0" step='1' onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );" />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Feb</label>
			<div class="col-xs-6">
				<input type="text" class="form-control ann_dataArr2 monthlies"  name="feb" placeholder="0"  onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Mar</label>
			<div class="col-xs-6">
				<input type="text" class="form-control ann_dataArr2 monthlies"name= "mar" placeholder="0"  onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );" />
			</div></td>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Apr</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="apr" placeholder="0"  onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );" />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">May</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="may" placeholder="0"  onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Jun</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="jun" placeholder="0" onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );"  />
			</div></td>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Jul</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="jul" placeholder="0" onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );" />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">August</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="aug"  placeholder="0" onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Sept</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="sept"  placeholder="0" onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );" />
			</div></td>
			</tr>
			
			<tr>
			<td>
			<label class="control-label col-md-2" for="year">Oct</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="oct"  placeholder="0" onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );"   />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Nov</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="nov"  placeholder="0" onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );"  />
			</div></td>
			
			<td>
			<label class="control-label col-md-2" for="year">Dec</label>
			<div class="col-xs-6">
			<input type="text" class="form-control ann_dataArr2 monthlies" name="dec"  placeholder="0" onkeypress="return isNumberKey(event,this.value,'m')" onBlur = "return computeMonthlies(this.value,$(this).attr('name') );" />
			</div></td>
			</tr>
			
			<tr>
			<td colspan=3>
			<label class="control-label col-xs-4 text-warning text-center" for="local">
					<?php 
							if ($_GET['type'] == 'Facility') {
								echo 'Total Water Withdrawn';
							}else{
								echo 'Monthly Percentage';
							}  

					?>

				</label>
		
			 <div class="col-md-4">
				<input type="text" name = "total_monthly" class="form-control ann_dataArr2" placeholder="0" readonly /> 
			</div>
				<div id="dontviewmepls"></div>
			</td>	
			
			</tr>
			
			</table>
			
			<table class="table table-bordered table-condensed table-hover">
		
				<tr>
				<td>
					<label class="control-label" for="restrictions">Restrictions</label>
					<label class="radio-inline">
						<input type="radio" name="restrictions" class="required ann_dataArr2" value="Y"  required>Yes</label>
					<label class="radio-inline">
						<input type="radio" name="restrictions" class="required ann_dataArr2" value="N" required >No</label>
						<span class="important">*</span>
				</td>
				 
				 <td colspan=2>
				<label class="control-label col-xs-4" for="salinity">Salinity</label>
				<label class="radio-inline">
					<input type="radio" name="salinity" value= "Y" class = "required ann_dataArr2" required>Yes</label>
				<label class="radio-inline">
					<input type="radio" name="salinity" value = "N" class = "required ann_dataArr2" required>No</label>
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
							<input type="radio" name="use_cd" value= "AG" class = "required ann_dataArr2" required>Agriculture</label>
					
							<span class="important">*</span>
					</td>
					
					<td colspan=2>
					<label class="control-label col-xs-4" for="fee">Who is responsible for fee?:</label>
					<label class="radio-inline">
						<input type="radio" name="who" id= "who-owner" class = "radio-inline ann_dataArr2 required"  value="O" required> Owner
					</label>
					<label class="radio-inline">
						<input type="radio" name="who" id="who-diverter" class = "radio-inline ann_dataArr2 required" value="D" > Diverter
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
							<option value='ACFTwho'>Acre-Feet </option>
							<option value='GAL'> Gallons </option>
							<option value='MG'>Million Gallons</option>
							<option value='MGD'>Million Gallons per Day </option>
						</select>
					</span>
				</td>
				</tr>-->
				<?php if ($_GET['type'] == 'Facility') { ?> <tr>
					<td colspan=3>
						<label class="control-label" for="centroid">Centroid:</label>
						<label class="radio-inline">
							<input type="radio" name="centroid" id= "centroid-yes" class = "radio-inline ann_dataArr2 required"  value="Y" required> Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="centroid" id="centroid-yes" class = "radio-inline ann_dataArr2 required" value="N" > No
						</label>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan=3>
						<label class="control-label" for="user">Modified By:</label>
						<span name="user" id="user"><?php echo $_SESSION['USER_ID']; ?></span>
					</td>
				</tr>
						
				<tr>
					<td colspan=4>
						<div style="margin-left:40%">
							<!-- <input type="submit" class="btn" value="Save & Next Meas. Pt. " id="draftann" name="draftann"> -->
							<span class="status_1"> </span>
							<input type="submit" class="btn" value="Save Edited Annual data" id="saveann" name="saveann">
							
						</div>
							
						
					</td>
					
				</tr>
				<tr>
					<td colspan=3>
						<div style="margin-left:37%">
							<!-- <input type="submit" class="btn" value="Save & Next Meas. Pt. " id="draftann" name="draftann"> -->
							<button type="button" class="btn" id="edit-measpt">Edit Measuring point</button>
							<button type="button" class="btn" id="add-payment">Edit Payment</button>
						</div>
							
						
					</td>
					
				</tr><tr>
					<td colspan=3>
						<div style="margin-left:45%">
							<button type="button" class="btn" id="close" onclick="javascript:window.close();" >Close</button>
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
							<form method="POST">
								<table class="table table-bordered table-condensed table-hover">
								<tr>
									<td>Amount Paid:</td>
									<td><input type="text" id= "amtacct" name="amtacct" readonly value="10"></td>
								</tr>
								<tr>
									<td>Penalty Paid:</td>
									<td><input type="text" step=1 min=0 id= "penaltyamtacct" name="penaltyamtacct"></td>
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
									<td colspan=2> Status:<span id="status"> Not Paid</span>  <input type= "hidden" name="isPaid" id="status-h"></td>
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
	<form method="POST" action="../controller/wells/editmpid" id="the-form2" onkeypress="return event.keyCode != 13;">
		<div class="modal fade" id="the-modal2" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false" >
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" >
					  <div class="modal-header">
							<div id="status-div"></div><div id="percentage-div"></div> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  </div>
								<form >
									<input type="hidden" id="did" name="did" value="<?php echo $_GET['diverter']; ?>">
						
									<input type="hidden" id="year" name="year" value="<?php echo $_GET['year']; ?>">
									<!-- <input type="hidden" id="usecd" name="use_cd" value="AG">
									<input type="hidden" id="method" name="method" value="E">
									<input type="hidden" id="typeid" name="typeid" value="">
									<input type="hidden" id="typenm" name="typenm" value="">-->
								<span id="load-this"> Loading...Saving Data</span>
								<input type="hidden" id="oid" name="oid" value="<?php echo $_GET['owner']; ?>">
								<table id="the-mpidtbl" class="table">
									<tbody>
										<tr>
											<th colspan="3">
												<center>Measurement Point Information ID : <span> <?php echo $_GET['mpid']; ?></span></center>
												<input type="hidden" name="mpid-h" value="<?php echo $_GET['mpid']; ?>">
												<input type="hidden" name="mpid-new">
											</th>
										</tr>
										<tr>
												<td> 
													<div style="display:inline-flex; float: left; line-height:2;">
														<div style="margin-right:30px;"> Owner: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:200px;" class="form-control typeahead tt-query" id="list-owner"  name="new_owner"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-owner" checked> Filter Owner by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
											<td> 
													<div style="display:inline-flex; float: left; line-height:2;">
														<div style="margin-right:30px;"> Diverter: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:200px;" class="form-control typeahead tt-query" id="list-diverter" name="new_diverter"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-diverter" checked> Filter Diverter by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
											<td> 
													<div style="display:inline-flex; float: left; line-height:2;">
														<div style="margin-right:30px;"> Facility: </div>
														<div class="input-group-btn" >
												
																	<div class="btn-group" id="scrollable-dropdown-menu">					
																		<input type="text" style="width:200px;" class="form-control typeahead tt-query" id="list-facility" name="new_facility"/>
																	</div>
																		<div class="btn-group"> 
																				<label class="btn btn-primary">
																					<input type="checkbox" id="filter-facility" checked> Filter Facility by my County 
																				</label>
																	</div> 
															</div> 
														</div>
												</td>
										</tr>
										<tr>
											<td colspan="3"> Local Description:
												<input type="text" name="local_desc" style="width:300px;" class="required" id="local_desc_station"> <span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td> Action Code:
												<select name="action_cd" id ="action_cd_station" class="select2 required">
													<option value="--">--</option>
													<option value="WD">Withdrawal</option>
													<option value="DL">Delivered</option>
													<option value="RL">Released</option>
													<option value="PR">Production</option>
												</select><span class="important">*</span> </td>
											<td> Source:
												<select name="source_cd" id="source_cd_station" class="select2 required">
													<option value="">--</option>
													<option value="SW">Surface Water</option>
													<option value="GW">Ground Water</option>
													<option value="SP">Spring Water</option>
													<option value="TW">Transferred Water</option>
													<option value="FW">Facility Water</option>
												</select><span class="important">*</span> </td>
											<td> Tract #:
												<input type="text" name="tract_no" id="tract_no_station" maxlength="5"> Farm #:
												<input type="text" name="farm_no" id="farm_no_station" maxlength="5"> </td>
										</tr>
										<tr>
											<td> Quad #:
												<input type="text" name="quadno" id="quad_no_station" maxlength="4">
											</td>
											<td> Operator #:
												<input type="text" name="opnum" id="operator_no_station" maxlength="5">
											</td>
											<td> Well #:
												<input type="text" name="wellno" id="well_no_station"  maxlength="10">
											</td>
										</tr>
										<tr>
											<td colspan="2"> Source Name:
												<input type="text" name="source_nm"  id="source_nm_station"  style="width:300px;">
											</td>
											<td> Dam
												<input type="radio" value="Y" name="dam" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="dam" class="required">No<span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<div class="hidesw"> Aquifer Code:
													<select name="aquifer" id="aquifer_station" class="select2 required" style="width:30%;">
													   
													</select><span class="important driller-imp">*</span>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<div class="hidesw"> Driller Name:
													<select name="driller" id="driller" class="select2 required" style="width:30%;">  </select> <span class="important driller-imp">*</span> </div>
											</td>
										</tr>
										<tr>
											<td colspan="2"> Date Well Drilled or Relift Installed:
												<input type="text" id="date-drilled" name="date_drilled" class="required" readonly="readonly">
												<input type="checkbox" id="date-drilled-unknown" class="required">
												<label for="date-drilled-unknown" id="label-date-drilled-unknown">Check if unknown</label><span class="important driller-imp">*</span> </td>
											<td colspan="1">
												<div id="hideme" style="display: none;"> Well Depth:
													<input type="text" class="numbers" name="well_depth" step="any" maxlength="4" readonly="readonly"><span class="important">*</span>
												</div>
											</td>
										</tr>
										<tr>
											<th colspan="3">
												<center>Location of Withdrawal</center>
											</th>
										</tr>
										<tr>
											<td> County: <select id="county_station" name= "county_station"  style="display: inline-block;"></select>
												<input type="hidden" name="county_cd" value="Grant">
											</td>
											<td> State:  <select id="state_county" name ="state_cd" style="display: inline-block;"></select></td>
											<td> HUC: <div id="huc_station" style="display: inline-block;"></div>
												<input type="hidden"  name="huc">
											</td>
										</tr>
										<tr>
											<td>
												<select name="quad1" id="quad1_station" class="select2 required">
													<option value="">--</option>
													<option value="SW">SW</option>
													<option value="SE">SE</option>
													<option value="NW">NW</option>
													<option value="NE">NE</option>
												</select> ¼<span class="important">*</span> of
												<select name="quad2"   id="quad2_station"  class="select2 required">
													<option value="">--</option>
													<option value="SW">SW</option>
													<option value="SE">SE</option>
													<option value="NW">NW</option>
													<option value="NE">NE</option>
												</select> ¼<span class="important">*</span>
											</td>
											<td> Section:
												<input type="text" name="section" value="7" class="required"><span class="important">*</span> Township:
												<input type="text" name="township" value="5S" class="required"><span class="important">*</span>
											</td>
											<td> Range:
												<input type="text" name="range" value="15W" class="required"> <span class="important">*</span> </td>
										</tr>
										<tr>
											<td> Latitude (DMS/DD): <span name="lat"></span>
												<input type="hidden" name="latDMS">
												<input type="hidden" name="latDD" >
											</td>
											<td> Longitude (DMS/DD): <span name="lng"></span>
												<input type="hidden" name="lngDMS">
												<input type="hidden" name="lngDD">
											</td>
											<td> Altitude:
												<input type="text" name="elevation" class="required"> <span class="important">*</span>
											</td>
										</tr>
										<tr>
											<th colspan="3">
												<center>Pump Information</center>
											</th>
										</tr>
										<tr>
											<td colspan="2"> Pump Horsepower:
												<input type="text" name="pump_hp" class="required numbers" step="any" maxlength="3"><span class="important">*</span>
											</td>
											<td> Discharge Pipe Diameter (inches) :
												<input type="text" name="pipe_diam" class="required numbers" step="any" maxlength="2"><span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="2"> Power Type:
												<select name="power_tp" id="power_tp_station" class="select2 required" style="width:10%">
													<option value="">--</option>
													<option value="ELC">ELC</option>
													<option value="LPG">LPG</option>
													<option value="DSL">DSL</option>
													<option value="OTH">OTH</option>
												</select><span class="important">*</span>
											</td>
											<td> Pump Type:
												<select name="diversion_meth" class="select2 required" style="width:15%">
													<option value="">--</option>
													<option value="STP">STP </option>
													<option value="PTP">PTP </option>
													<option value="GRV">GRV </option>
													<option value="OTH">OTH </option>
												</select><span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="2"> Flow Meter
												<input type="radio" value="Y" name="flow_meter" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="flow_meter" class="required">No<span class="important">*</span>
											</td>
											<td> Reclaimed Waste:
												<input type="radio" value="Y" name="rec_waste" class="required">Yes<span class="important">*</span>
												<input type="radio" value="N" name="rec_waste" class="required">No<span class="important">*</span>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<center>
													<input type="submit" id="add" class="btn btn-primary" value="Edit Measuring Point">
												</center>
											</td>
										</tr>
									</tbody>
								</table>

							</form>
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div> -->
					</div>
				  </div>
				</div>
				</form>
			<div class="modal fade" id="the-modalMap" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" >
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label">Mapping Tool</h4>
						<h5 class="modal-title" id="the-modal-label">Pick a point ot Graph my Latitude and Longitude</h5>
						<div id="set-latlng" style="margin-top:10px;"> 
							<label for ="the-lat"> Latitude: </label> <input type="text" id="the-lat">&nbsp;
							<label for="the-lng">Longitude: </label> <input type="text" id="the-lng" min="-1">&nbsp;
							<button id="this-tomap"> Search</button>
						</div>
						<div id="set-latlng" style="margin-top:10px;"> 
							<span> Example: Decimal Degrees (DD): Latitude: 34.7465 Longitude: 92.2896
							
							  </span> 
						</div>
							<div id="set-latlng" style="margin-top:10px;"> 
							<span> Degrees, Minutes, Seconds (DMS): Latitude:  344447 Longitude: 921723 (no spaces)
							  </span> 
						</div>
						<div id="set-latlng" style="margin-top:10px;"> 
							<span> <strong>NOTE: SECTION BOUNDARIES WILL APPEAR WHEN ZOOMED IN.
								</strong>
							  </span> 
						</div>
					  </div>
					  <div class="modal-body">
							<div id="map"></div>
							  <input type='hidden' id='quad_nm'>
							<input type='hidden' id='onefourth'>
							<input type='hidden' id='section'>
							<input type='hidden' id='range'>
							<input type='hidden' id='township'>
							<input type='hidden' id='lat'>
							<input type='hidden' id='lng'>
							<input type='hidden' id='direction'>
							<input type='hidden' id='elevation'>
							<input type='hidden' id='county2'>
							<input type='hidden' id='huc'>
					  </div>
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div> -->
					</div>
				  </div>
				</div>
	</div>
		<div class="modal fade" id="saveModal" tabindex="99" role="dialog" aria-labelledby="the-modal-data" data-backdrop="false">
				  <div class="modal-dialog" role="document" style="z-index:1;">
					<div class="modal-content" >
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="the-modal-label"> Message </h4>
						
					  </div>
					  <div class="modal-body">
							<h4><span style="color:green"> Successfully Saved! </span></h4>
							<div style="display: inline-block;"> 
								
								<button type="button" class="btn btn-info" id="showPayment" ><i class="fa fa-money"></i> Edit Payment </button>
								<button type="button" class="btn btn-danger" id="showMeasPt" ><i class="fa fa-pencil"></i> Edit Measurement Point  </button>
								<button type="button" class="btn btn-primary" id="closeSaveModal" ><i class="fa fa-close"></i> Close </button>
							</div>
					  </div>
					  <!-- <div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div> -->
					</div>
				  </div>
				</div>
	</div>
</body>
</html>