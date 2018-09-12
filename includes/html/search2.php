<?php 	
include ("includes/config.php"); 

?>
<head>
<script>


function getResult(county,yearfrom,yearto){
	var keyword;
	if (yearto != ""){
		keyword = "?c="+county+"&yf="+yearfrom+"&yearto="+yearto;
	}else{
		keyword =  "?c="+county+"&yf="+yearfrom;
	}
	$('#cs-result .search_result').empty();
	$("#span_result").empty();
	$("#download-div").empty();
	$.ajax ({
			type: "POST",
			url: "http://wise.er.usgs.gov/wellsdev2/controller/getResult.php"+keyword,
			ContentType: "application/json",
			dataType: "json",
			success:function(data){
				var res = $.trim(data);
				if (res == '0'){
				
					alert(" No Result");
					$('#cs-result .search_result').empty();
					$("#span_result").empty();
					$("#download-div").empty();
				}else{
					var $counter = 0;
					
					$("#cs-result .search_result").append("<tr><th> Year </th></tr>");
					// SHOW OVERFLOW 
					$("#cs-result").css("overflow-y","scroll");
					$.each(data, function(i,item){
						
						$("#cs-result .search_result").append("<tr><td>"+data[i].wyear+"</td>");
						$counter++;
					});
					$("#span_result").append("Number of Result: " + $counter);	
					// SHOW DOWNLOAD OPTIONS
					$("#download-div").append("<label> Download As:</label><select id='typeoffile'><option> CSV File (.csv) </option> <option> PDF Document (.pdf)</option><option> MS WORD (.doc) </option><option> MS EXCEL (.xls)</option></select>");
				}
				
			}
	});

}
function fetchcounty(){
	
	$.ajax ({
			type: "POST",
			url: "http://wise.er.usgs.gov/wellsdev2/json/fetchcounty.php",
			ContentType: "application/json",
			dataType: "json",
			success:function(data){
			
				$("#cd").append("<option value='all'>Select All</option>");
				$.each (data, function (i,item){
					$("#cd").append("<option value='"+data[i].cd+"'>"+data[i].nm+"</option>");
				});
				$("#cd").chosen({single_backstroke_delete:false,disable_search_threshold: 10});
					
					$("#cd").chosen().change(function(){
					
						var county = $(this).val();
						if (county == null){
							$("#cd option:eq(0)").removeAttr("disabled");							
							$("#cd").trigger("chosen:updated");		
						}else if (county != "all"){	
							//$("#cd option").prop("disabled", "disabled");	
							$("#cd option:eq(0)").attr("disabled","disabled");								
							$("#cd").trigger("chosen:updated");			
						}else if (county == "all"){
							
							$("#cd option").prop("disabled", "disabled");
							$("#cd").trigger("chosen:updated");							
							$("#deselect").show();
						}
						

						$("#deselect").css("cursor","pointer");
						$("#deselect").click(function(){
							$("#cd").val("");
							$("#cd option").removeAttr('disabled'); 
							$("#cd").trigger("chosen:updated");
							$(this).hide();
						});
				});
			}
	});

}
/* COULD BE FOR DATA PROCESSING? */
/*
function grabcounty(query){
		$.ajax ({
			type: "POST",
			url: "http://wise.er.usgs.gov/wellsdev2/json/grabcounty.php?q="+query,
			ContentType: "application/json",
			dataType: "json",
			success:function(data){
				$(".search_result").empty();
				$(".search_result").append("<tr><td><input type='checkbox' id ='all'>SELECT ALL</td></tr");		
				$.each (data, function (i,item){
				
					$(".search_result").append("<tr><td><input type='checkbox'>"+data[i].nm+"</td></tr>");
				});
				$("#all").each(function(){
					$(this).prop("selectedIndex","1");
				});
				
				
			}
		});

}*/

$(document).ready(function(){
	
	fetchcounty();
	/* INITIATE WHAT'S HIDDEN OR ANY VARIABLES	*/
	

	$("#yearto").attr('readOnly',true);
	$("#yearfrom").attr('readOnly',true);
	$("#yearfrom").hide();
	$("#yearto").hide();
	$("#label-yearto").hide();
	$("#deselect").hide();
	// show year from datepicker
	
	
	/* datepicker */
	

	$("#yearfrom").datepicker({
		datepicker: true,
        changeYear: true,
        showButtonPanel: false,
        dateFormat: 'yy',
		yearRange: '1985:'+ new Date().getFullYear(),
		beforeShow: function (el, dp){
			$("#ui-datepicker-div").addClass("hide-calendar");
		},
        onClose: function(dateText, inst) { 
            $("#ui-datepicker-div").removeClass("hide-calendar");
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
			$("#yearto").datepicker("option", "yearRange",(inst['selectedYear']+1)+":"+new Date().getFullYear);
        }
	});	
	$("#yearto").datepicker({
		datepicker: true,
        changeYear: true,
        showButtonPanel: false,
        dateFormat: 'yy',
		
		beforeShow: function (el, dp){
			$("#ui-datepicker-div").addClass("hide-calendar");
		},
        onClose: function(dateText, inst) { 
            $("#ui-datepicker-div").removeClass("hide-calendar");
			
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			
            $(this).datepicker('setDate', new Date(year, 1));
        }
	});
	

	/* HIDES THE MONTH AND YEAR */
	$("#yearfrom").focus(function(){
		$(".ui-datepicker-month").hide();
			
	});
	$("#yearfrom").blur(function(){
		$(".ui-datepicker-month").hide();
			
	});
	$("#yearto").focus(function(){
		$(".ui-datepicker-month").hide();
			
	});
	$("#yearto").blur(function(){
		$(".ui-datepicker-month").hide();
			
	});
	$("#yearto").click(function(){
		$(".ui-datepicker-month").hide();
			
	});
	
	
	
	$("#select-datepicker").change(function(){
		
		var $select = $(this).val();
		
		if ($select == '0'){
	
			$("#yearfrom").show();
			$("#yearto").hide();
			$("#label-yearto").hide();
			$("#label-yearfrom").show();
		}else if ($select == '1'){
			$("#yearfrom").show();
			$("#yearto").show();
			$("#label-yearto").show();
		}else{
			$("#yearfrom").hide();
			$("#yearto").hide();
			$("#label-yearto").hide();
		}
		
		
	});
	
	$("#submit_data").click(function(){
		var county = $("#cd").val();
		var yearfrom = $("#yearfrom").val();
		var yearto = $("#yearto").val();
		
		getResult(county,yearfrom,yearto);
	});

});
</script>
</head>
<body>

<!--Select County:<input type ='text' id ='search'> -->
<div class='params-div'>
	
	
		<table>
			<tr>
			<td><label for='cd'>Select County: </label></td> 
			<td><select id='cd' multiple data-placeholder='Select County' name='county[]'></select>
			<span id='deselect'> &larr; Deselect All </span></td>
			</tr>
			
			<tr>
			<td>Select Year:</td>
			<td><select id='select-datepicker'>
				<option value='-1'> Select Type of Year </option>
				<option value='0'> Year </option>
				<option  value='1'> Year to Year </option>
				</select></td>
			</tr>
			
			<tr>
			<td></td>
			<td> <input type='text' id ='yearfrom' class='yeardatepicker'> </td>
			</tr>
			
			<tr>
			<td></td>
			<td> <input type='text' id ='yearto' class='yeardatepicker'> </td>
			</tr>
			
		</table>
		<button id ='submit_data'>Submit Data</button>

</div>
<div>&nbsp;&nbsp;</div>
<span id ="span_result"> </span> 
<div id="cs-result"><table class="search_result"></table> </div>
<div id="download-div"></div>




</body>