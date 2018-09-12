
var aLocation = location.pathname.split("/");
var $isDev;
if (aLocation[1] == 'wateruse_dev'){
	$isDev= true;
	
}else{
	$isDev= false;
	var css = 'color: red;\
				  text-shadow:\
				   -1px -1px 0 #000,  \
					1px -1px 0 #000,\
					-1px 1px 0 #000,\
					 1px 1px 0 #000;\
				font-size:50px; ';

	var css2= 'color:black; font-size:20px';
		
	console.log("%cHALT! STOP! %s", css, '');
	console.log("%c This feature is disabled for security purposes.%s", css2, ' Please contact the developer if you have any questions. ↓');
	
}

var $dir; 

$dir = $isDev == true ? $dir = "wateruse_dev" : $dir = "wateruse";
/*
function msieversion() {

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
    {
        //(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))));
		alert('1');
    }
    else  // If another browser, return 0
    {
       // alert('otherbrowser');
    }

    return false;
}
*/

function headerMenus(){
	$("#home").click (function() {
		window.location.href= "https://wise.er.usgs.gov/"+$dir+"/home";
	});
	$("#wupublic").click (function(){
		
		/*$(".main #content-page").empty();
		$(this).addClass("current");
		$("#myModal").css("display","block");*/
		window.location.href = "https://wise.er.usgs.gov/"+$dir+"/wateruse_data?q=pub";
		
	});
	$("#wuinternal").click (function(){
	
		/*$(".main #content-page").empty();
		$(this).addClass("current");
		$("#myModal").css("display","block");*/
			window.location.href = "https://wise.er.usgs.gov/"+$dir+"/wateruse_data?q=int";
		
	
	});
	$("#wuagg-monthly").click(function(e){
		e.preventDefault();
			window.location.href= "https://wise.er.usgs.gov/"+$dir+"/wateruse_reports?q=monthly";
	});
	$("#wuagg-crops").click(function(e){
		e.preventDefault();
			window.location.href= "https://wise.er.usgs.gov/"+$dir+"/wateruse_reports?q=crops";
	});
	$("#wuagg-swreports").click(function(e){
		e.preventDefault();
			window.location.href= "https://wise.er.usgs.gov/"+$dir+"/wateruse_reports?q=surfacewater";
	});
	$("#wuagg-annual").click(function(e){
		e.preventDefault();
			window.location.href= "https://wise.er.usgs.gov/"+$dir+"/annual_data?q=wells";
	});
	$("#account-div #side-menu div a").click(function(){
		
		$(this).addClass("personal-select");	
	});
	$("#logout").click(function(){
		window.location.href = "https://wise.er.usgs.gov/"+$dir+"/logout";
	});
	$("#about").click(function(){
		window.location.href = "https://wise.er.usgs.gov/"+$dir+"/about_us";
		/*$(".main").empty();
		$(".main").load("includes/html/about");*/
		
		
	});
	$("#account-settings").click(function(){
		window.location.href="https://wise.er.usgs.gov/"+$dir+"/accounts/account_settings";
	});
	$("#login").click(function(){
		window.location.href = "https://wise.er.usgs.gov/"+$dir+"/accounts/"
	});
	
	$(".category").mouseover(function(){
		$("#short-description").css("display","inline-block");
	});
	
	$("#add-diverter").click(function(e){
		e.preventDefault();
		window.open("https://wise.er.usgs.gov/"+$dir+"/wells/save?t=diverter","_blank");
		
	});
	$("#add-owner").click(function(e){
		e.preventDefault();
		window.open("https://wise.er.usgs.gov/"+$dir+"/wells/save?t=owner","_blank");
		
	});
	$("#add-facility").click(function(e){
		e.preventDefault();
		window.open("https://wise.er.usgs.gov/"+$dir+"/wells/save?t=facility","_blank");
		
	});
	$("#add-anndata").click(function(e){
		e.preventDefault();
		window.open("https://wise.er.usgs.gov/"+$dir+"/wells/","_blank");
		
	});
	$("#reports").click(function(e){
		e.preventDefault();
		window.open("https://wise.er.usgs.gov/"+$dir+"/wells/reports","_blank");
		
	});
	$("#contactus").click(function(e){
		e.preventDefault();
		window.open("	http://answers.usgs.gov/","_self");
		
	});
	$("#report-bug").click(function(e){
		e.preventDefault();
		window.open("https://wise.er.usgs.gov/bugs/wubugreporting.html","_blank");
	});

}

function AboutUsIMG (){
	
	$("#t1").mouseover(function(){
		$("#details1").empty();
		$(".box").css("width","270px");
		$("#t1 img").attr("src","../"+$dir+"/includes/css/img/solo.png");
		$("h3#1st").text("Drew Solo");
		$("p#1st-p").text("Rebel");
		$("#details1").append("<ul style='padding:0; margin:0'><li> <i class = 'fa fa-map-marker'></i>: Southeast Region</li><li><i class = 'fa fa-mobile'></i>: 501-228-3643</li><li><i class = 'fa fa-envelope-o'></i>:<a href='mailto:dawester@usgs.gov'>dawester@usgs.gov</a></li></ul>");
		
	});
	$("#t1").mouseleave(function(){
		$("#details1").empty();
		$(".box").css("width","");
		$("#t1 img").attr("src","../"+$dir+"/includes/css/img/westerman.jpg");
		$("h3#1st").text("Drew Westerman");
		$("p#1st-p").text("Hydrologist");
		$("#details1").html("Drew Westerman is a hydrologist for the U.S. Geological Survey Lower Mississippi-Gulf Water Science Center at Little Rock. He has worked in water resource investigations of groundwater and surface water that have included multiple states and six countries. <a href='https://www.usgs.gov/staff-profiles/drew-westerman?qt-staff_profile_science_products=3#qt-staff_profile_science_products' target ='_blank'> [Read More...] </a> ")
		
	});
	$("#t4").mouseover(function(){
		$("#details4").empty();
		$(".box").css("width","270px");
		$("#t4 img").attr("src","../"+$dir+"/includes/css/img/stormtrooper.gif");
		$("h3#4th").text("RL B8 M8");
		$("p#4th-p").text("Storm Trooper");
		$("#details4").append("<ul style='padding:0; margin:0'><li> <i class = 'fa fa-map-marker'></i>: Little Rock </li><li><i class = 'fa fa-mobile'></i>: 415-316-3633</li><li><i class = 'fa fa-envelope-o'></i>:<a href='mailto:adacurro@usgs.gov'>adacurro@usgs.gov</a></li></ul>");
		
		$("#details4").append("You see that target I'm hitting? I missed it.");
	});
	$("#t4").mouseleave(function(){
		$("#details4").empty();
		$(".box").css("width","");
		$("#t4 img").attr("src","../"+$dir+"/includes/css/img/dacurro.jpg");
		$("h3#4th").text("Alexe Dacurro");
		$("p#4th-p").text("Web Developer | UI/UX Designer");
		$("#details4").text("Alexe Dacurro is Graduate of Bachelor of Science in Information Science at University of Arkansas at Little Rock. Currently working as Student Intern for USGS LMG - Little Rock.")
		
	});
}
function homeCategories(){
	
	
	$("#categories-irr").simpletip({content:"Irrigation",fixed: false});
	$("#categories-irr").click(function(){
		
		
		$('body,html').animate({
			scrollTop : 600                       // Scroll to top of body
		}, 500);
	
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});
	
	$("#categories-lv").simpletip({content:"Irrigation",fixed: false});
	$("#categories-lv").click(function(){
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});
	
	
	$("#categories-nuke").simpletip({content:"Thermoelectric Power Plant",fixed: false});
	$("#categories-nuke").click(function(){
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});
	
	
	$("#categories-ind").simpletip({content:"Industrial",fixed: false});
	$("#categories-ind").click(function(){
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});
	
	
	$("#categories-min").simpletip({content:"Mining",fixed: false});
	$("#categories-min").click(function(){
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});
	
	
	$("#categories-dom").simpletip({content:"Domestic",fixed: false});
	$("#categories-dom").click(function(){
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});
	
	
	$("#categories-ws").simpletip({content:"Water Supply / Public Supply",fixed: false});
	$("#categories-ws").click(function(){
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});
	
	
	$("#categories-com").simpletip({content:"Commercial",fixed: false});
	$("#categories-com").click(function(){
		$("#myModal").css("display","block");
		$("#myModal div").css("text-align","justify");
		$("div.home-clear-container div").css("margin-left:0px;");
		$("#myModal div").css("margin-top","25px;");
		$(".modal-content").css("width","1000px");
		$(".modal-content").css("padding","30px");
	});	
}

function zModal(){
		
	$("#closemodal").click(function(){
		$("#myModal").css("display","none");
		
	});
	$("#closemodal-graph").click(function(){
		$("#myModal").css("display","none");
		
	});
}

var randomColor = (function(){
  var golden_ratio_conjugate = 0.618033988749895;
  var h = Math.random();

  var hslToRgb = function (h, s, l){
      var r, g, b;

      if(s == 0){
          r = g = b = l; // achromatic
      }else{
          function hue2rgb(p, q, t){
              if(t < 0) t += 1;
              if(t > 1) t -= 1;
              if(t < 1/6) return p + (q - p) * 6 * t;
              if(t < 1/2) return q;
              if(t < 2/3) return p + (q - p) * (2/3 - t) * 6;
              return p;
          }

          var q = l < 0.5 ? l * (1 + s) : l + s - l * s;
          var p = 2 * l - q;
          r = hue2rgb(p, q, h + 1/3);
          g = hue2rgb(p, q, h);
          b = hue2rgb(p, q, h - 1/3);
      }

      return '#'+Math.round(r * 255).toString(16)+Math.round(g * 255).toString(16)+Math.round(b * 255).toString(16);
  };
  
  return function(){
    h += golden_ratio_conjugate;
    h %= 1;
    return hslToRgb(h, 0.5, 0.60);
  };
})();
function settingsClick(){
	
	$("#personal").click(function(){
		
		$("#account-div-edit").empty();
		$("#account-div-edit").load("https://wise.er.usgs.gov/"+$dir+"/accounts/settings/info");
	});
}


$(document).ready(function(){
	
	console.log('%c United States Geological Survey - LMG Water Science Center - Water Use Web Applications \n Department of Interior | United States of America  © 2016 \n Developed by Alexe Dacurro \n lexdacs7@gmail.com | adacurro@usgs.gov', 'background: url("../"+$dir+"/includes/css/img/murica.png"); color: red; display: block;');
	

	/* DETECT BROWSER'S RESOLUTION */
	/* If the browser's resolution is less than 864 by any height then hide the sub menu */
	var width = $(window).width();
	/* STATIC */
	/*if (width < 864){
		$("#user-sub-menu").css("display","none");
		$("#uDetails").mouseover(function(){
			$("#user-sub-menu").css("position","absolute");
			$("#user-sub-menu").css("top","225px");
			$("#user-sub-menu").css("right","202px");
			
			$("#user-sub-menu").css("display","block");
		});
		$("#uDetails").mouseleave(function(){
	
			$("#user-sub-menu").css("display","none");
		});
	}*/
	
	
	//$(".main").load("login.php");	
	//$(".main").empty();
	/*$(".main").load("includes/html/search.php");	*/
	headerMenus();
	AboutUsIMG();
	homeCategories();
	zModal();
	settingsClick();
	//msieversion();
	
	
	$(window).scroll(function(event) {
			
		if ($(this).scrollTop() >= 100) {        // If page is scrolled more than 50px
			$('#return-to-top').fadeIn(200);    // Fade in the arrow
		} else {
			$('#return-to-top').fadeOut(200);   // Else fade out the arrow
		}
	});
	
	$('#return-to-top').click(function() {      // When arrow is clicked
		$('body,html').animate({
			scrollTop : 0                      
		}, 500);
	});
	
	$("#overlay").click(function(){
		$(".modal").css("display","none");
	});
	
	// check if my Modal is displayed



	 setTimeout(function(){  
		if ($("#hint").is(":hidden")) {
			$("#hint").show("slow");
		} else {
			$("#hint").slideUp();
		}
	  }, 3000);
	
	//$( "#hint" ).slideUp('slow').delay(100).slideDown('slow');
});

	