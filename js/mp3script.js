function view_mp3(pageloc,pageid){	
    $("html, body").animate({ scrollTop: 0 }, 1000);
       $('#loadcont').html("<center><br><br><br><img src='../images/loading.gif' style='border-radius:100px;width:100px;height:100px;'><br><i style='color:white;'>Loading...</i></center>").load(res);               
}
function load_page(pageloc,pageid){	
    $("html, body").animate({ scrollTop: 0 }, 1000); 
       $('#loadcont').html("<center><br><br><img src='../images/loading.gif'>Loading...</center>").load(pageloc);       
}
function load_pagg(pageloc,pageid){	
    $("html, body").animate({ scrollTop: 0 }, 1000); 
       var str=pageloc;
    var res=str.replace(" ","%20");
    var ress=res;
	  $(".total4").slideUp("fast");
	  $(".total4").slideDown("fast");
       $('.total4').html("<center><img src='../images/loading.gif'><br>Loading.....</center>");
       $('.total4').load(ress); 
}
$(document).ready(function(){
  $("#song").fadeIn("fast");
  $("#songg").fadeOut("fast");
  $("#showaudio").click(function(){
  $("#total2").slideToggle("fast").animate({width: "100%"});
  });
});
$(document).ready(function(){
  $("#play").click(function(){
  $("#play").fadeOut("fast");
  $("#pause").fadeIn("fast");
  $("#pause").css({"float":"right"});
  $("#status").html("<center><i class='fa fa-play mymm' style='font-size:10em;color:#FF4500;position:fixed;top:40%;left:45%;'></i></center>");
  $("#status").fadeIn("fast");
  $("#status").fadeOut("fast");
  });
});
$(document).ready(function(){
  $("#pause").click(function(){
  $("#pause").fadeOut("fast");
  $("#play").fadeIn("fast");
  $("#play").css({"float":"right"});
  $("#status").html("<center><i class='fa fa-pause mymm' style='font-size:10em;color:#FF4500;position:fixed;top:40%;left:45%'></i></center>");
  $("#status").fadeIn("fast");
  $("#status").fadeOut("fast");
  });
});
