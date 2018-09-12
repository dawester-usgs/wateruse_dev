<?php 	
include ("includes/config.php");  
 if(!defined('BASE_PATH')) {
   die('Direct access not permitted');
}; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<?php include ("includes/header_config.php"); ?>
<script>

function microtime(floatnumber){
	
	var unixtime_ms = (new Date).getTime();
	var seconds = Math.floor(unixtime_ms/1000);
	return floatnumber ? (unixtime_ms/1000) : (unixtime_ms - (seconds * 1000))/1000+ '';
}

function fetchcounty(){
	$("#cd").empty();
	$("#cd").append('<option disabled>Loading data please wait...<option>');
	$.ajax ({
			type: "POST",
			url: "../wateruse_dev/json/fetchcounty",
			ContentType: "application/json",
			dataType: "json",
			success:function(data){
				$("#cd").empty();
				$.each (data, function (i,item){
					$("#cd").append("<option value='"+data[i].cd+"'>"+data[i].nm+" ("+data[i].cd+")</option>");
				});
				$("#cd").select2();
			}
	});

}
function fetchhuc(){
		$("#huc").empty();
		$("#huc").append('<option disabled>Loading data please wait...<option>');
		$.ajax ({
				type: "POST",
				url: "../wateruse_dev/json/fetchhuc",
				ContentType: "application/json",
				dataType: "json",
				success:function(data){
					$("#huc").empty();
					$.each (data, function (i,item){
						$("#huc").append('<option value = "\''+data[i].huc+'\'">'+data[i].huc+'</option> ');
					});
					$("#huc").select2();
				}
		});

}


function year(){
		// get Current Year
		var currYear = new Date().getFullYear();
		// this is constant as required
		var startYear = '1985';
		// loop the difference. In this, the year will be dynamic 
		var $i;
		$("#select-year").append("<option value ='' default> Select Year</option>");
		for ($i =startYear; $i<=currYear; $i++){
			$("#select-year").append("<option value='"+$i+"'>"+$i+"</option>");
		}
}


function fetchstream(){
		$("#stream").empty();
		$("#stream").append('<option disabled>Loading data please wait...<option>');
		$.ajax ({
				type: "POST",
				url: "../wateruse_dev/json/fetchstream",
				ContentType: "application/json",
				dataType: "json",
				success:function(data){
					$("#stream").empty();
					$("#stream").append('<option value = "\'UNKNOWN\',\'--\',\'null\'">UNKNOWN</option> ');
					$.each (data, function (i,item){
						$("#stream").append('<option value = "\''+data[i].stream_nm+'\'">'+data[i].stream_nm+'</option> ');
					});
					$("#stream").select2();
				}
		});
	
}
function warnPrint(){
	
	$("body").keydown(function(k){
		
		if (k.ctrlKey && k.which == 80){
			return alert("Warning! If you wish to print this Report as PDF. Please Download it using the Download as [\"Download this Report as\"] below the Submit Button");
		}
	});
}

function preciseRound(num,numofdec){
	var decimal = 1;
	for (var i=0; i<numofdec; i++){
		decimal += "0";
	}
    return Math.round(num * decimal) / decimal;
}
var modalDefaults = {
	
	defaultSize: function(d){
			$("#myModal .modal-content").css("display","inherit");
			$("#myModal .modal-content").css("width","700px");
			$("#myModal .modal-content").css("height","700px");
			$("#myModal .modal-content").css("margin-top","10%");
			$("#myModal .modal-content #tools-overlay #closemodal-graph").css("left","95%");
			
			
	},
	choiceSize: function(){
			$("#myModal .modal-content").css("display","inherit");
			$("#myModal .modal-content").css("width","600px");
			$("#myModal .modal-content").css("height","200px");
			$("#myModal .modal-content").css("margin-top","10%");
			$("#myModal .modal-content #tools-overlay #closemodal-graph").css("left","93%");
	}
	
}
var lePopupGraph = {

	initiateG: function(arr,the_decider,title){
		$("#myModal .modal-content #back").hide();
		$("#graphPie").empty();
		$("#graphPieOthers").empty();
		$("#graphBar").empty();
		$("#myModal").css("display","block");
		var x_the_decider ="";
		if (the_decider == "crops") {
			modalDefaults.defaultSize();
			$("#myModal").css("display","block");
			$("#myModal .modal-content #graph-overlay ").show();
			$("#myModal .modal-content #tools-overlay").show();
			$("#myModal .modal-content #choice-overlay").hide();
			
			
		}else if (the_decider == "monthly-pie"){
			modalDefaults.defaultSize();
			$("#myModal .modal-content #graph-overlay ").show();
			$("#myModal .modal-content #tools-overlay").show();
			$("#myModal .modal-content #choice-overlay").hide();
			$("#myModal .modal-content #back").show();
			$("#myModal .modal-content #tools-overlay #closemodal-graph").css("left","93%");
			$("#myModal .modal-content #tools-overlay #back").css("padding-left","10px");
		
			
		}else if (the_decider == "monthly-bar"){
			
			modalDefaults.defaultSize();
			$("#myModal .modal-content #graph-overlay ").show();
			$("#myModal .modal-content #tools-overlay").show();
			$("#myModal .modal-content #choice-overlay").hide();
			$("#myModal .modal-content #back").show();
			$("#myModal .modal-content #tools-overlay #closemodal-graph").css("left","95.5%");
			$("#myModal .modal-content #tools-overlay #back").css("padding-left","10px");
			$("#myModal .modal-content").css("width","90%");
			$("#myModal .modal-content").css("height","550px");
		}
		
		$("#graphPie").css("padding-left","50px");
		var displayModal = $("#myModal").css("display");
		var sic_mn;
		var crop_cd;
		var acres;
		var sum_acres = 0;
		var acres_perc =0;
		var data  = [];
		var data2 = [];
		var otherCrops = [];
		var otherCropslbl = "";
		var isClicked =0;
	
		if (displayModal == 'block'){
			// initiate esc keys
			$("body").keydown(function(keys){
				if (keys.keyCode == '27'){
					$("#myModal").css("display","none");
				}
			});
			$("#closemodal-graph").click(function(evt){
				
				$("#myModal").css("display","none");
			});
			$("#back").click(function(){
				$("#myModal .modal-content #tools-overlay").hide();
				$("#myModal .modal-content #graph-overlay ").hide();		
				$("#myModal .modal-content #choice-overlay").show();
				modalDefaults.choiceSize();
				
			});
		}
		
		$("#closemodal-graph").click(function(evt){
				
				$("#myModal").css("display","none");
		});
		// compute 
		
		$.each (arr,function(i,item){
			acres = arr[i][1];
			sum_acres +=acres;
		});
		var l = 1;
		$.each (arr, function(i,item){
			
			crop_cd = arr[i][0];
			acres = arr[i][1];
			sic_nm = arr[i][2];
			acres_perc = (acres/sum_acres *100);
			if (acres_perc <1){
				
				acres_perc = preciseRound(acres_perc,2);
				if (sic_nm != 'IDLE'){
					data2.push({label:sic_nm,
						   value:acres_perc
						  })
				}
				
			}
		
			acres_perc = preciseRound(acres_perc,2);
				data.push({label:sic_nm,
						   value:acres_perc
						  })
		
			++l;
		});
		
		if (title.length >46){
			
		title = $.trim(title).substring(0, 50).trim(this) + "...";
		
		}
		if (the_decider == 'crops'){
			
			lePopupGraph.pieChart(data,data2,title);
			
		}else if (the_decider == 'monthly-pie'){
			
			lePopupGraph.pieChart(data,data2,title);
			//barChart(arr);
		}else if (the_decider == 'monthly-bar'){
			
			lePopupGraph.barChart(arr,title);
		}
		
	},
	pieChart: function(data,data2,the_decider){
		// initite first graph 
			function generateThis(data2){
					$("#myModal .modal-content #back").show();
					$("#graphPieOthers").empty();
					
					$("#myModal .modal-content").css("width","100%");
					$("#myModal .modal-content #graph-overlay").css("display","inline-flex");
					$("#graphPie").css("padding-left","0");
					
					
					var pie = new d3pie("graphPieOthers", {
					"header": {
						"title": {
							"text": "Other Crops",
							"fontSize":20,
							"font": "open sans"
						},
						"subtitle": {
							"text": ".",
							"color": "#999999",
							"fontSize": 12,
							"font": "open sans"
							
						},
						"titleSubtitlePadding": 25
					},
					"footer": {
						"text": "Crops Percentage < 1%",
						"color": "#999999",
						"fontSize": 11,
						"font": "open sans",
						"location": "bottom-center"
					},
					
					"size": {
						"canvasHeight":500,
						"canvasWidth": 590,
						"pieOuterRadius": "100%"
					},
					"data": {
						"smallSegmentGrouping": {
							"enabled": true,
							"value":2
						},
						"content":data2
					},
					"labels": {
						"outer": {
							"hideWhenLessThanPercentage": 1,
							"pieDistance": 8
						},
						"mainLabel": {
							"font": "verdana"
						},
						"percentage": {
							"color": "#FFF",
							"font": "verdana",
							"decimalPlaces": 0
						},
						"value": {
							"color": "#FFF",
							"font": "verdana"
						},
						"lines": {
							"enabled": true,
							
						},
						"truncation": {
							"enabled": true
						}
					},
					"tooltips": {
						"enabled": true,
						"type": "placeholder",
						"string": "{label} : {value}, {percentage}%",
						"styles": {
							"fadeInSpeed": 505,
							"backgroundOpacity": 1
						}
					},
					"effects": {
						"pullOutSegmentOnClick": {
							"effect": "linear",
							"speed": 400,
							"size": 8
						}
					},
					"misc":{
						"canvasPadding": {
							"bottom": 75,
							"left": 5
						}
					},
					
					});
			}
		/* original PIE <3 */
			var pie = new d3pie("#graphPie", {
			"header": {
				"title": {
					"text": the_decider,
					"fontSize": 24,
					"font": "open sans"
				},
				"subtitle": {
					"text": ".",
					"color": "#999999",
					"fontSize": 12,
					"font": "open sans"
					
				},
				"titleSubtitlePadding": 25
				},
				"footer": {
					"text": "Note: Percentage of Acres under 1% will be aggregated into Segment \"Others\" ",
					"color": "#999999",
					"fontSize": 11,
					"font": "open sans",
					"location": "bottom-center"
				},
				
				"size": {
					"canvasHeight":500,
					"canvasWidth": 590,
					"pieOuterRadius": "100%"
				},
				"data": {
					"smallSegmentGrouping": {
						"enabled": true,
						"value": 2
					},
					"content":data
				},
				"labels": {
				"outer": {
					"hideWhenLessThanPercentage": 1,
					"pieDistance": 8
				},
				"mainLabel": {
					"font": "verdana"
				},
				"percentage": {
					"color": "#FFF",
					"font": "verdana",
					"decimalPlaces": 0
				},
				"value": {
					"color": "#FFF",
					"font": "verdana"
				},
				"lines": {
					"enabled": true,
					
				},
				"truncation": {
					"enabled": true
				}
			},
			"tooltips": {
				"enabled": true,
				"type": "placeholder",
				"string": "{label} : {value}, {percentage}%",
				"styles": {
					"fadeInSpeed": 505,
					"backgroundOpacity": 1
				}
			},
			"effects": {
				"pullOutSegmentOnClick": {
					"effect": "linear",
					"speed": 400,
					"size": 8
				}
			},
			"misc":{
				"canvasPadding": {
					"bottom": 75,
					"left": 5
				}
			},
			callbacks: {
				onClickSegment: function(z) {
					var isOther = z.data['label'];
					if (isOther == "Others"){
						generateThis(data2);
						isClicked = 1;
					}
					
				}
			}
		});

	
		downloadGraph: d3.select("#download-graph").on("click", function(){
			$
				var html = d3.select("#graphPie svg")
						.attr("version", 1.1)
						.attr("xmlns", "http://www.w3.org/2000/svg")
						.node().parentNode.innerHTML;
				var graphPiediv = $("#graphPieOthers").html();
				if (graphPiediv !=""){
					var html2 = d3.select("#graphPieOthers svg")
					.attr("version", 1.1)
					.attr("xmlns", "http://www.w3.org/2000/svg")
					.node().parentNode.innerHTML;
					var imgsrc2 = 'data:image/svg+xml;base64,'+ btoa(html2);
					var img2 = '<img src="'+imgsrc2+'">'; 
					//var canvas2 = document.querySelector("#c2");
					//context2 = canvas2.getContext("2d");
					var image2 = new Image;
					image2.src = imgsrc2;
					/*image2.onload = function(){
						context2.drawImage(image2, 0, 0);
						var canvasdata2 = canvas2.toDataURL("image/png");
						var pngimg2 = '<img src="'+canvasdata2+'">'; 
						var a = document.createElement("a");
						  a.download = "OtherCrops.png";
						  a.href = canvasdata2;
						  a.click();
					}*/
				}
					
				var imgsrc = 'data:image/svg+xml;base64,'+ btoa(html);
				var img = '<img src="'+imgsrc+'">'; 
				var canvas = document.querySelector("#c1");
				context = canvas.getContext("2d");
				var image = new Image;
				image.src = imgsrc;
				context.clearRect(0, 0, canvas.width, canvas.height);
				image.onload = function() {
				
					if (graphPiediv !=""){
						context.drawImage(image, 100, 0);
						context.drawImage(image2, 700, 0);
					}else{
						context.drawImage(image, 450, 0);
					}
					var canvasdata = canvas.toDataURL("image/png");
					var pngimg = '<img src="'+canvasdata+'">'; 
					var a = document.createElement("a");
					a.download = "CropStatistics.png";
					a.href = canvasdata;
					a.click();
						 
				};
				
			});
			
	},
	barChart: function(arr,the_decider){
			
			$("#graphBar").empty();
			var margin = {top: 100, right: 20, bottom: 50, left: 100},
				width = 1000- margin.left - margin.right,
				height = 500 - margin.top - margin.bottom;

			var formatPercent = d3.format(".0%");

			var x = d3.scale.ordinal()
				.rangeRoundBands([0, width], .1);

			var y = d3.scale.linear()
				
				.range([height, 0]);
			
			var xAxis = d3.svg.axis()
				.scale(x)
				.orient("bottom");
			function make_x_axis() {
			return d3.svg.axis()
				.scale(x)
				.orient("bottom")
				.ticks(7)
			}

		// function for the y grid lines
			function make_y_axis() {
			return d3.svg.axis()
				.scale(y)
			  .orient("left")
			  .ticks(7)
			  
			}

			var yAxis = d3.svg.axis()
				.scale(y)
				.orient("left");
				//.tickFormat(formatPercent);

			var tip = d3.tip()
			  .attr('class', 'd3-tip')
			  .offset([0, 0])
			  .html(function(d) {
				return d.label+": <span style='color:red'> " + preciseRound(d.value,2) + "</span>";
			  });

			var svg = d3.select("#graphBar").append("svg")
				.attr("width", width + margin.left + margin.right)
				.attr("height", height + margin.top + margin.bottom)
				.append("g")
				.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

			svg.call(tip);
			var months;
			var jan =0;
			var feb =0;
			var mar =0;
			var apr =0;
			var may =0;
			var jun =0;
			var jul =0;
			var aug =0;
			var sep =0;
			var oct =0;
			var nov =0;
			var dec =0;
			var data = [];
			$.each(arr,function(i){
				
						
				
				jan += arr[i][3];
				feb += arr[i][4];
				mar += arr[i][5];
				apr += arr[i][6];
				may += arr[i][7];
				jun += arr[i][8];
				jul += arr[i][9];
				aug += arr[i][10];
				sep += arr[i][11];
				oct += arr[i][12];
				nov += arr[i][13];
				dec += arr[i][14];
				
				data = [{label: "January", value:jan},
								{label: "February", value:feb},
								{label: "March", value:mar},
								{label: "April", value:apr},
								{label: "May", value:may},
								{label: "June", value:jun},
								{label: "July", value:jul},
								{label: "August", value:aug},
								{label: "September", value:sep},
								{label: "October", value:oct},
								{label: "November", value:nov},
								{label: "December", value:dec}];
				
			});
			  x.domain(data.map(function(d) { return d.label; }));
			  y.domain([0, d3.max(data, function(d) { return d.value; })]);
			 
				svg.append("g")
				.attr("class", "grid")
				.attr("transform", "translate(0," + height + ")")
				
				.call(make_x_axis()
					.tickSize(-height, 0, 0)
					.tickFormat("")
				)

			// Draw the y Grid lines
			svg.append("g")            
				.attr("class", "grid")
				.call(make_y_axis()
					.tickSize(-width, 0, 0)
					.tickFormat("")
				)
			
			
			svg.append("g")
				  .attr("class", "x axis")
				  .attr("transform", "translate(0," + height + ")")
				  
				 
				  .call(xAxis);
			
			
				 
			  svg.append("g")
				  .attr("class", "y axis")
				  .call(yAxis)
				.append("text")
				  .attr("transform", "rotate(-90)")
				  .attr("y", 6)
				  .attr("dy", ".50em")
				  .style("text-anchor", "end")
				
				  .text("Acre-Feet");
				
				
			 svg.append("g")
				  .attr("class", "le-footer")
				  .append("text")
				  .attr("y",height+35)
				  .attr("x",width-300)
				  .attr("dy", ".50em")
				  .style("text-anchor", "end")
				
				  .text(the_decider);
				  
			
		
			var bars=  svg.selectAll(".bar")
				  .data(data)
				  .enter().append("rect")
				  .attr("class", "bar")
				  .attr("x", function(d) { 	
				  
					return x(d.label); })
				  .attr("width",x.rangeBand())
				  .style({fill:randomColor})
				
				 
					
				  .on('mouseover',tip.show)
				  .on('mouseout', tip.hide)
				  
			
				  
			

			bars.transition()
				.delay(function (d, i) {return i*100; })// })
				.attr("y", function(d) { return y(d.value); })//return height-y(d); })
				.attr("height", function(d) { return height - y(d.value); })

			
			 svg.selectAll(".x.axis path")
				 .attr("style","display:none")
			 svg.selectAll(".x.axis line")
				 .attr("style","fill:none")
				 .attr("style","stroke:#000")
				 
		

			function type(d) {
			  d.value = +d.value;
			  return d;
			}
			
			$(".y.axis path").css("fill","none");
			$(".y.axis path").css("stroke","#000");
			$(".y.axis path").css("shape-rendering","crispEdges");
			$(".grid .tick").css("stroke","lightgrey");
			$(".grid .tick").css("stroke-opacity","0.7"); 
			$(".grid .tick").css("shape-rendering","crispEdges");
			//$(".y.axis path").attr("style","stroke:#000");
			
			
			downloadGraph: d3.select("#download-graph").on("click", function(){
				
				var htmlBar = d3.select("#graphBar svg")
						.attr("version", 1.1)
						.attr("xmlns", "http://www.w3.org/2000/svg")
						.node().parentNode.innerHTML;
				var graphPiediv = $("#graphBar").html();
				
					
				var imgsrc = 'data:image/svg+xml;base64,'+ btoa(htmlBar);
				var img = '<img src="'+imgsrc+'">'; 
				var canvas = document.querySelector("#c1");
				context = canvas.getContext("2d");
				var image = new Image;
				image.src = imgsrc;
				context.clearRect(0, 0, canvas.width, canvas.height);
				image.onload = function() {
				
					context.drawImage(image, 250, 0);
					
					var canvasdata = canvas.toDataURL("image/png");
					var pngimg = '<img src="'+canvasdata+'">'; 
					var a = document.createElement("a");
					
					a.download = "BarGraph.png";
					a.href = canvasdata;
					a.click();
						 
				};
				
			});
	}
	
	
	
};

function getStatistics(keyword,typeofStats,county,year,huc,water_source,stream_nm,aquifer){
	
	$(".message").empty();
	//empty result-tbl every time this function get called
	$("#statistics-disclaimer").hide();
	$("#report-title").empty();
	$("#span_result").empty();
	$("#download-div").empty();
	$("#graph-div").empty();
	$("#graph-div").attr("style","display:none");
	$("#result-div").hide();
	$("#result-tbl").empty();
	$("#submit_data").attr("disabled","disabled");
	$(".loading-div .loading").append(" <img src = '../wateruse_dev/includes/css/img/loading.gif' height='30'> </img><span> Loading data. Please Wait...</span> ");	
	$.ajax ({
			
		TYPE: "GET",
		url: "../wateruse_dev/controller/aggResult"+keyword,
		ContentType:"application/json",
		dataType:"json",
		success:function(data){
			warnPrint();
				   
			$('body,html').animate({scrollTop : 575}, 500);
			$("#submit_data").removeAttr("disabled");
			$(".loading-div").empty();
			$("#statistics-disclaimer").show();
			$("#download-div").append("<label for ='downloads'> Download this Report as  </label> <select id='downloads'><option value=''>Select Type</option><option value='csv'>Comma Separated Value (CSV)</option><option value='PDF'>PDF Document</option><option value ='WORD'> Word Document </option>--></select>");
			$("#graph-div").attr("style","background:url(../wateruse_dev/includes/css/img/graph.png) no-repeat");
			$("#graph-div").append("<a href='#myModal' id='zGraph'>Generate Graph</a>");
		
			$("#downloads").change(function(){
				var filetype = $(this).val();
				
				if (filetype =="`"){
					window.open("../wateruse_dev/controller/aggResult"+keyword+"&filetype="+filetype,"__blank");
				}else if (filetype == "PDF"){
					window.open("../wateruse_dev/controller/aggResult"+keyword+"&filetype="+filetype,"__blank");
				}else{
					window.open("../wateruse_dev/controller/aggResult"+keyword+"&filetype="+filetype,"__blank");
				}
			});
			
			
			$("#zGraph").click(function(e){
				e.preventDefault();
				
				var zGraphData = [];
				$.each (data, function(i,tiem){
					if (typeofStats == "crops"){
						zGraphData.push([data[i].crop_cd,data[i].sum_acres,data[i].sic_nm])
					}else{
						zGraphData.push([data[i].crop_cd,data[i].sum_acres,data[i].sic_nm,data[i].jan,data[i].feb,data[i].mar,data[i].feb,data[i].mar,data[i].apr,data[i].may,data[i].jun,data[i].jul,data[i].aug,data[i].sept,data[i].oct,data[i].nov,data[i].dec])
					}
					
				});
				
				if (typeofStats == "crops"){
					var x_the_decider = "Crop Statistics for "+county+" for Year "+year;
					lePopupGraph.initiateG(zGraphData,typeofStats,x_the_decider);
					
				}else if (typeofStats == "monthly" || typeofStats == "monthly-pie" || typeofStats == "monthly-bar"){
					$("#myModal").css("display","block");
					$("#pie").click(function(){
						typeofStats = "monthly-pie";
						var x_the_decider = "Monthly Statistics for "+county+" for Year "+year;
						
						lePopupGraph.initiateG(zGraphData,typeofStats,x_the_decider);
							
					});
					$("#bar").click(function(){
						typeofStats = "monthly-bar";
						var x_the_decider = "Monthly Statistics for "+county+" for Year "+year;
						lePopupGraph.initiateG(zGraphData,typeofStats,x_the_decider);
					});
					
				}
		
			});
			
			if (water_source != "all"){
				if (water_source.length > 1){
						if (typeofStats == 'crops'){
							$("#report-title").append("<h3> Crop Statistics for "+county+" for Year "+year+"</h3>");
						}else if (typeofStats == 'monthly'){
							$("#report-title").append("<h3> Monthly Statistics for "+county+" for Year "+year+"</h3>");
						}
							
				}else{
					if (water_source == "'gw'"){
							$("#report-title").append("<h3> "+year+ " Ground Water Statistics for "+county+"</h3>");
					}else if (water_source == "'sw'"){
							$("#report-title").append("<h3> "+year+ " Surface Water Statistics for "+county+"</h3>");
					}
				}	
			}
			else{
					if (typeofStats == 'crops'){
							$("#report-title").append("<h3> Crop Statistics for "+county+" for Year "+year+"</h3>");
					}else if (typeofStats == 'monthly'){
							$("#report-title").append("<h3> Monthly Statistics for "+county+" for Year "+year+"</h3>");
					}
							
			}
			
			$("#span_result").append("Search Result About "+microtime()+" milliseconds");
				/* LE HEADER */ 
				
			if (typeofStats == 'crops'){
				
				$("#result-tbl").append("<thead><tr><th>Crops</th><th>Number of Reported Applications</th><th>Summation of Acres</th><th>Average</th><th>Minimum</th><th>25th Percentile</th><th>50th Percentile</th><th>75th Percentile</th><th>Maximum</th><th>Variance</th><th>Standard Deviation</th><th>Total applied (Acre-feet)</th></tr></thead>");
				$.each(data, function(i,item){
					$("#result-tbl").append("<tr><td>"+data[i].sic_nm+"</td><td>"+data[i].occurences+"</td><td>"+data[i].sum_acres+"</td><td>"+data[i].average+"</td><td>"+data[i].min+"</td><td>"+data[i].twentyfifth+"</td><td>"+data[i].fiftieth+"</td><td>"+data[i].seventyfifth+"</td><td>"+data[i].max+"</td><td>"+data[i].variance+"</td><td>"+data[i].std_dev+"</td><td>"+data[i].tot_amt+"</td>");	
				});
				$("#result-tbl").append("<tfoot id='letotalfooter'><tr><td style='padding-right:30px;'>Total:</td><td></td><td></td><td>*******</td><td>*******</td><td>*******</td><td>*******</td><td>******</td><td>*******</td><td>*******</td><td>*******</td><td></td></tr></tfoot>");
				$("#result-tbl").DataTable({
							fixedHeader:true,
							destroy: true,
							searching: true,
							scrollX:false,
							scrollY:true,
							scrollCollapse: true,
							responsive:true,
							sDom: '<"top"<"actions">lfi<"clear">><"clear">rtp<"bottom">',
							"footerCallback": function ( row, data, start, end, display ) {
							var api = this.api(), data;
				 
							// Remove the formatting to get integer data for summation
							var intVal = function ( i ) {
								return typeof i === 'string' ?
									i.replace(/[\$,]/g, '')*1 :
									typeof i === 'number' ?
										i : 0;
							};
				 
							/* Total over all pages
							total = api
								.column( 1 )
								.data()
								.reduce( function (a, b) {
									return intVal(a) + intVal(b);
								}, 0 );
							*/
							
							// Total over this page
							pageTotal_occurences = api
								.column(1, { page: 'current'} )
								.data()
								.reduce( function (a, b) {
									return parseFloat(a) + parseFloat(b);
								}, 0 );
								
							pageTotal_acres = api
								.column(2, { page: 'current'} )
								.data()
								.reduce( function (a, b) {
									return parseFloat(a) + parseFloat(b);
								}, 0 );
								
							pageTotal_totalacres = api
								.column(11, { page: 'current'} )
								.data()
								.reduce( function (a, b) {
									return parseFloat(a) + parseFloat(b);
								}, 0 );
				 
							// Update footer
							$( api.column(1).footer() ).html(pageTotal_occurences.toFixed(2));
							$( api.column(2).footer() ).html(pageTotal_acres.toFixed(2));
							$( api.column(11).footer() ).html(pageTotal_totalacres.toFixed(2));
						}
										
				}); 
				
			}else if (typeofStats == 'monthly'){
				$("#result-tbl").append("<thead><tr><th>Crops</th><th>Number of Reported Applications</th><th>Summation of Acres</th><th>January</th><th>February</th><th>March</th><th>April</th><th>May</th><th>June</th><th>July</th><th>August</th><th>September</th><th>October</th><th>November</th><th>December</th><th>Total applied (Acre-feet)</th></tr></thead>");
				$.each(data, function(i,item){
					$("#result-tbl").append("<tr><td>"+data[i].sic_nm+"</td><td>"+data[i].occurences+"</td><td>"+data[i].sum_acres+"</td><td>"+data[i].jan+"</td><td>"+data[i].feb+"</td><td>"+data[i].mar+"</td><td>"+data[i].apr+"</td><td>"+data[i].may+"</td><td>"+data[i].jun+"</td><td>"+data[i].jul+"</td><td>"+data[i].aug+"</td><td>"+data[i].sept+"</td><td>"+data[i].oct+"</td><td>"+data[i].nov+"</td><td>"+data[i].dec+"</td><td>"+data[i].tot_amt+"</td></tr>");
				});
				$("#result-tbl").append("<tfoot id ='letotalfooter'><tr><td style='padding-right:30px;'>Total: </td><td>Number of Reported Applications</td><td>Summation of Acres</td><td>January</td><td>February</td><td>March</td><td>April</td><td>May</td><td>June</td><td>July</td><td>August</td><td>September</td><td>October</td><td>November</td><td>December</td><td>Total applied (Acre-feet)</td></tr></tfoot>");
				$("#result-tbl").DataTable({
							fixedHeader:true,
							destroy: true,
							searching: true,
							scrollX:true,
							scrollY:true,
							scrollCollapse: true,
							responsive:true,
							sDom: '<"top"<"actions">lfi<"clear">><"clear">rtp<"bottom">',
							"footerCallback": function ( row, data, start, end, display ) {
							var api = this.api(), data;
							// Remove the formatting to get integer data for summation
							var intVal = function ( i ) {
								return typeof i === 'string' ?
									i.replace(/[\$,]/g, '')*1 :
									typeof i === 'number' ?
										i : 0;
							};
				 
							/* Total over all pages
							total = api
								.column( 1 )
								.data()
								.reduce( function (a, b) {
									return intVal(a) + intVal(b);
								}, 0 );
							*/
							// Total of all rows then update the footers

							for (var itr = 1; itr<=15; itr++){
						
								pageTotal_lefooter = api
								.column(itr, { page: 'current'} )
								.data()
								.reduce( function (a, b) {
									return parseFloat(a) + parseFloat(b);
								}, 0 );
								$( api.column(itr).footer() ).html(pageTotal_lefooter.toFixed(2));
								
							}
						}
										
					}); 
				
			}else{ 
			/* SURFACE WATER REPORT */
				$("#result-tbl").append("<thead><tr><th>Water Source</th><th>Agriculture SW Meas.Pts</th><th>Agriculture SW Ac. Ft./Yr.</th><th>Agriculture SW M. Gal./D.</th><th>Mun & Ind. SW Meas. Pts,</th><th>Mun & Ind. SW Ac. Ft./Yr.</th><th>Mun & Ind. SW M. Gal./D.</th><th>SW Total Meas Pts.</th><th>SW Total Ac. Ft. /Yr.</th><th>SW Total M. Gal. /D.</th></tr></thead>");
				
				$.each(data,function(i,item){
					$("#result-tbl").append("<tr><td>"+data[i].stream_nm+"</td><td>"+data[i].occurences+"</td><td>"+data[i].ann_amt+"</td><td>"+data[i].computation+"</td><td>0</td><td>0</td><td>0</td><td>"+data[i].occurences+"</td><td>"+data[i].ann_amt+"</td><td>"+data[i].computation+"</td></tr>");
				});
				
				$("#result-tbl").DataTable({
							fixedHeader:true,
							destroy: true,
							searching: true,
							scrollX:false,
							scrollY:true,
							scrollCollapse: true,
							responsive:true,
							sDom: '<"top"<"actions">lfi<"clear">><"clear">rtp<"bottom">'
				});
			}/* END IF */
				
		},
		error:function(err,ajaxOptions, throwError){
			alert(err.status);
		}
	});
}
$(document).ready(function(){
	fetchcounty();
	fetchhuc();
	fetchstream();
    year();
	
	$("#sw").select2();
	$("#aquifer").select2();
	$("#select-year").select2();
	$("#statistics-disclaimer").hide();
	
	$("#submit_data").click(function(){
		var county = $("#cd").val();
	
		var huc = $("#huc").val();
		var water_source = $("#sw").val();
		var stream_nm = $("#stream").val();
		var aquifer = $("#aquifer").val();
		var year = $("#select-year").val();
		var the_decider = $("#the_decider").val();
		var keyword;
		var county_name = "";
		var i = 0;
		 
		$("#cd option:selected").each(function(){
			county_name +=  " | " +$(this).text();
			i++;
		});
		
		
		if (county_name != ""){
			
			county_name = county_name.substr(2);
			
		}else{
			county_name = 'Statewide';
		}
		
		
		if (county == null){
			county = 'all';
		}
		
		
		if (huc == null){
			huc = 'all';
		}
		if (water_source == null){
			water_source = 'all';
		}
		if (stream_nm == null){
			stream_nm = 'all';
		}
		if (water_source == null){
			water_source = 'all';
		}
		if (aquifer == null){
			aquifer = 'all';
		}
		if (year == ""){
			$(".message").append("<div id ='error'> <img src = '../wateruse_dev/includes/css/img/error.svg' height='18'></img> <span id ='spandacan' > Please select a year. <span id ='close'> (click to dismiss)</span> </span></div>");
		}else{
			if (the_decider != "surfacewater"){
				keyword = "?p="+the_decider+"&countycd="+county +"&year="+year+"&huc="+huc+"&watersource="+water_source+"&streamnm="+stream_nm+"&aquifer="+aquifer;
			}else{
				keyword = "?p="+the_decider+"&countycd="+county +"&year="+year+"&huc="+huc+"&watersource='sw'&streamnm="+stream_nm+"&aquifer="+aquifer;
			}
			getStatistics(keyword,the_decider,county_name,year,huc,water_source,stream_nm,aquifer);
		}
		$("#error #close").click (function(){
			$(".message").empty();
			$("#error").empty();
			$('#select-year').css("border-color","rgb(169, 169, 169)").animate({borderWidth:"1px"},300);
		
		});
		$("#tools-overlay #closemodal-graph").click(function(evt){
				var display = $("#graphPie").css("display");
				if(display == 'block'){
					$("#myModal .modal-content #tools-overlay").hide();
					$("#myModal .modal-content #graph-overlay ").hide();		
					$("#myModal .modal-content #choice-overlay").show();
					modalDefaults.choiceSize();
				}
				$("#myModal").css("display","none");
				
		});
	});
	
});
</script>
<body>
<?php include("header_new.php"); ?>

<div class= 'main'>
<div id = 'svgdataurl'></div>
	<div id="myModal" class="modal">

	  <!-- Modal content -->

	  <div class="modal-content" >
	
	  <?php $page = $_GET['q'];
		if ($page == 'monthly'){
			echo "<div id='choice-overlay'><a id='closemodal-graph'><i class ='fa  fa-close'></i> </a> <div id ='choice'>Please select option: </div>";
			echo "<div class ='chartChoice-div'><ul><li> <a id='pie' class='graphChoice'><i class='fa fa-pie-chart'></i>  Pie Chart</a></li>
				<li><a id='bar' class='graphChoice'><i class='fa fa-bar-chart'></i>  Bar Chart</a></li></ul></div>
				</div>";
			echo '<div id="tools-overlay" style="display:none;">
				<a id="back"><i class="fa fa-arrow-left"></i></a>
			<a id="closemodal-graph"> <i class ="fa fa-close"></i> </a> 
			<button id="download-graph"><i class="icon-download "></i> Download Graph as Image </button>
			</div><div id="graph-overlay" style="display:none;"> ';
			echo "<div id='graphBar'></div> <div id='graphPie'></div> <div id='graphPieOthers'></div>";
			echo '<canvas width="1500" height="500" style="display:none" id="c1"></canvas></div>';
			
		}else{
			echo '<div id="tools-overlay" style="display:none;">
				<a id="back"><i class="fa fa-arrow-left"></i></a>
			<a id="closemodal-graph"> <i class="fa  fa-close"></i></a>
			<button id="download-graph"><i class="icon-download "></i> Download Graph as Image </button>
			</div><div id="graph-overlay" style="display:none;"> ';
			echo "<div id='graphPie'></div> <div id='graphPieOthers'></div>";
			echo '<canvas width="1500" height="500" style="display:none" id="c1"></canvas></div>';
			
		} ?>
	 </div>
	 

	</div>
	
<div class='params-div'>
		<div class='message'> </div>
		<?php 
		$isSWREP = false;
		$page = $_GET['q'];
		if (!empty($page)){
			if ($page == 'monthly') { 
				echo '<h3> Monthly Statistics Report &nbsp; <label><a href="#" id ="wateruse_dev-type-info"><img src = "../wateruse_dev/includes/css/img/info.png"></img></a></label> </h3>';
			}elseif($page == 'crops'){
				echo '<h3> Crop Statistics Report &nbsp; <label><a href="#" id ="wateruse_dev-type-info"><img src = "../wateruse_dev/includes/css/img/info.png"></img></a></label> </h3>';	
			}elseif ($page == 'surfacewater'){
				$isSWREP = true;
				echo '<h3> Surface Water Report &nbsp; <label><a href="#" id ="wateruse_dev-type-info"><img src = "../wateruse_dev/includes/css/img/info.png"></img></a></label> </h3>';	
			}else{
				echo '<script> window.location.href ="../wateruse_dev/page-not-found"; </script>';
			}	
		}else{
			echo '<script> window.location.href ="../wateruse_dev/page-not-found"; </script>';
			
		}
		?>
		
		<table class='params-tbl'>
			<tr>
				<td><label for='cd'>County:&nbsp;</label></td>
				<td><select id='cd' class='chosen-ddl' multiple ='true' data-placeholder='Statewide' name='county[]'></select></td>
			</tr>
			<tr>
				<td><label for='huc'>HUC Code:&nbsp;</label></td>
				<td><select id ='huc' class='chosen-ddl' multiple = 'true' data-placeholder='All HUCS' name = 'huc[]'> </select>
				<label><a href="#" id ='huc-type-info'><img src = "../wateruse_dev/includes/css/img/info.png"></img></a></label></td>
			</tr>
			<?php if ($isSWREP == false) {?>
			<tr>
				<td><label for='huc'>Water Source:&nbsp;</label></td>
				<td><select id ='sw' class='chosen-ddl' multiple = 'true' data-placeholder='All Sources' name ='ws[]'>
					<option value="'sw'"> Surface Water </option>
					<option value ="'gw'"> Ground Water </option>
					</select>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td><label for='stream'>Stream Name:&nbsp;</label></td>
				<td><select id ='stream' class='chosen-ddl' multiple = 'true' data-placeholder='All Streams' name = 'stream[]'> </select></td>
			</tr>
			<tr>
				<td><label for ='aquifer'>Aquifer:&nbsp;</td>
				<td><select class='chosen-ddl' name='prin_aquifer' multiple= 'true' id="aquifer" data-placeholder = 'All Aquifers'>
	
					<option value="Deposits">Alluvium</option>
					<option value="Cockfield">Cockfield Formation</option>
					<option value="Cane">Cane River Formation</option>
					<option value="Sparta">Sparta-Memphis Sand</option>
					<option value="Wilcox">Wilcox Group undifferentiated</option>
					<option value="Clayton">Clayton Formation</option>
					<option value="Nacatoch">Nacatoch Sand</option>
					<option value="Tokio">Tokio Formation</option>
					<option value="Trinity">Trinity Group</option>
					<option value="Rocks">Rocks of Paleozoic Age undifferentiated</option>
					<option value='Unknown'>Others</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for = 'select-year'>Year Range:&nbsp;</label></td>
				<td><select id='select-year' class='year-select-2'></select> 
				<label for ='select-year' id ="select-year-to-lbl"><span style='color:red'>*</span></label></td>
		
			</tr>
			<tr>
				<td><button id ='submit_data'>Submit Data</button></td>
			</tr>
		</table>
</div>

<input type='hidden' value = '<?php $page = $_GET['q']; print $page;?>' id='the_decider' />
<div class="loading-div">&nbsp;&nbsp;</div>
<div id="cs-result"><div id ="span_result"> </div> <div id="download-div"> </div><div id="graph-div"> </div></div>
<div id ="report-title"> </div><div class='result-div'><table id = "result-tbl"></table ></div>
</div>

<div class ='disclaimer' id ='statistics-disclaimer'><h4>Disclaimer</h4> Water-use data is entered both remotely and onsite. Therefore, these data represent water use data available as of the date retrieved. Data in this table are to be considered prelimnary due to the fact not all data has been entered and/or validated.</div>
<a href="#" id="return-to-top"> <i class="icon-chevron-up"></i></a>
</body>


