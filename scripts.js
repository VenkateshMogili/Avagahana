//Script by Venkatesh Mogili,N130010 AmmaNannaku Prematho , Powered by Amma
$(document).ready(function(){
  $(window).load(function(){
  $("#coming").toggle("slide");
  $("#coming").delay(5000);
  $("#coming").toggle("puff");
});
});
//
$(document).on('click','.loadmorevideos',function(){
    $(this).fadeOut("slow");
    $(this).text("Loading....");
    var ele=$(this).parent('li');
    $.ajax({
      url:'loadmorevideos.php',
      type:'POST',
      data: {
        page:$(this).data('page'),
      },
      success: function(response){
        if(response){
          ele.hide();
          $(".videos_list").append(response);
        }
      }
    });
  });
//
$(document).on('click','.loadmorevideos2',function(){
    $(this).fadeOut("slow");
    $(this).text("Loading....");
    var ele=$(this).parent('li');
    var aval=document.getElementById("vgetlink").value;
    $.ajax({
      url:'loadmorevideos2.php?v='+aval,
      type:'POST',
      data: {
        pages:$(this).data('pages'),
      },
      success: function(response){
        if(response){
          ele.hide();
          $(".videos_list2").append(response);
        }
      }
    });
  });
function load_page(pageloc,pageid){
    $("html, body").animate({ scrollTop: 0 }, 1000);
    $("#vcontent").fadeOut("fast");
    $("#vcontent").toggle("puff");
	  $("#auth").fadeOut("fast");
       $('#vcontent').html("<center><br><br><br><img src='images/loader.gif' style='border-radius:100px;width:100px;height:100px;'><br><i style='color:black;'>Loading...</i></center>").load(pageloc);
}
function view_page(pageloc,pageid){	
    $("html, body").animate({ scrollTop: 0 }, 1000);
       $('body').html("<center><br><br><br><img src='images/loader.gif' style='border-radius:100px;width:100px;height:100px;'><br><i style='color:white;'>Loading...</i></center>").load(pageloc);               
}
function view_notice(pageloc,pageid){ 
    $("html, body").animate({ scrollTop: 0 }, 1000);
      $("#vcontent").toggle("slide");
      $("nav,div").css({opacity:"0"});
       $('#vcontent').html("<center><img src='images/loader.gif'><br><b style='color:black'>Loading...</b></center>").load(pageloc);
}
function view_video(pageloc,pageid){	
    $("html, body").animate({ scrollTop: 0 }, 1000);
       $('#vidd').html("<center><div style='border-top:2px solid red;background-color:black;width:100%;height:500px;box-shadow:1px 2px 3px lightgray;'><br><br><br><img src='images/videoload.gif' style='border-radius:100px;width:100px;height:100px;'><br><i style='color:yellow;font-size:20px;font-family:georgia;'>Loading...</i></div></center>").load(pageloc);               
}
$(document).ready(function(){
  $("#closes").click(function(){
    $("nav,div").css({
        opacity:"1"
      });
    $("#vcontent").toggle("puff");
});
  $("#cln").click(function(){
    $("#vcontent").slideUp("fast");
  })
});
//Script by Venkatesh Mogili//