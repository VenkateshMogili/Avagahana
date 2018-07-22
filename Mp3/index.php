<!DOCTYPE html>
<html>
<head>
<title>Mp3 Player</title>
<link rel="icon" href="../images/logo.jpg">
<link rel="stylesheet" href="../css/vfont/css/font-awesome.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/musicstyle.css">
</head>
<body>
<?php
session_start();
error_reporting(0);
require_once '../connect.php';
$stuid=$_SESSION['stuid'];
$category=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['v'])));
echo "<input value='".$category."' id='vgetlink' style='display:none'>";
if(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM music where category!='$category'")))
{
	header("Location: 404.php");
}
?>
<!--Menu's Click and Showing-->
<br><br>
<div class="total2">
<div id="loading">
</div>
<div id="loadcont">
	<p style="margin-left:40px;">Recently added audios
		<?php
	$resultsPerPage=10;
$sql=mysqli_query($con,"SELECT * FROM music where category='$category' ORDER BY id DESC LIMIT 0, $resultsPerPage");
echo "<ul class='audios_list'>";
while($r=mysqli_fetch_array($sql))
{
	$song=$r['song'];
	$views=$r['views'];
	$id=$r['id'];
	echo "<li class='list-group-item' onclick='load_pagg(\"play.php?song=".$song."\")'>".$song." <a href='Music/".$song.".mp3' download='".$song."@avagahana.mp3' style='float:right;'><i class='fa fa-users my' style='color:green;font-size:1em;'>".$views."</i> <i class='fa fa-download mym'></i></a>";
	if(isset($_SESSION['stuid']))
{
	$stu=$_SESSION['stuid'];
	$check=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'"));
	echo "<a href='../del_link.php?cat=music&&link=".$id."' style='margin:10px;border:1px solid red;padding:5px;border-radius:100px'>X</a>";
}
echo "</li>";
}
echo "</ul>";
echo '<li class="loadbutton"><center><button class="loadmoreaudios" data-pages="2">Load More</button></center></li>';
?>
<div class="total4">
<center><div id="status"></div></center>
<audio src="" type="audio/mp3" autostart="false" controls id='song' style="margin-top:10px;display:none"></audio>
<i class="fa fa-play mym" onclick="document.getElementById('song').play()" style="float:right;margin:10px;"></i>
</div>
<div class="total1">
<nav class="navbar navbar-inverse" style="box-shadow:1px 2px 10px black;border:0px;border-radius:0px;background-color:#FF4500;position:fixed;top:0px;left:0px;width:100%;">
  <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#" style="color:white" title="Venkatesh Mogili Music player"><i class="fa fa-headphones my" id="menu"></i> Mp3 Player</a>
    </div>
    <div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="lis"><a href="" style="color:white;font-size:12px;" title="Homepage">Home</a></li>
        <li class="lis"><a href="?v=Personality Development" style="color:white;font-size:12px;" title="Personality Development">Personality Development</a></li>
	<li class="lis"><a href="?v=Better Intellectual Growth" style="color:white;font-size:12px" title="Better Intellectual Growth">Better Intellectual Growth</button></a></li>
	<li class="lis"><a href="?v=Career Guidance" style="color:white;font-size:12px;" title="Career Guidance">Career Guidance</button></a></li>
	<li class="lis"><a href="?v=Job Opportunities" style="color:white;font-size:12px;" title="Job Opportunities">Job Opportunities</button></a></li>
	<li class="lis"><a href="?v=English Language Application Skills" style="color:white;font-size:12px;" title="English Language Application Skills">English Language Application Skills</button></a></li>
	<li class="lis"><a href="?v=Japanese Language" style="color:white;font-size:12px;" title="Japanese Language">Japanese Language</button></a></li>
	<li class="lis"><a href="?v=General" style="color:white;font-size:12px;" title="General">General</button></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" title="Refresh"><i class="fa fa-refresh my"></i></a></li>
      </ul>
      </div>
    </div>
  </div>
</nav>
</div>

</body>
<script src="../js/jquery.js"></script>
<script>
$(document).on('click','.loadmoreaudios',function(){
    $(this).fadeOut("slow");
    $(this).text("Loading....");
    var ele=$(this).parent('list-group-item');
    var aval=document.getElementById("vgetlink").value;
    $.ajax({
      url:'loadmoreaudios.php?v='+aval,
      type:'POST',
      data: {
        pages:$(this).data('pages'),
      },
      success: function(response){
        if(response){
          ele.hide();
          $(".audios_list").append(response);
        }
      }
    });
  });
$(document).ready(function(){
	$("#mmenu,#clm").click(function(){
	$("#mmenu").hide("fast");
	$(".total1").css({"opacity":1,"background-color":"none"});
	});
});
$(document).ready(function(){
	$("#back").click(function(){
	$(".total3").slideUp("fast").animate({width: "99%"});
	$(".total3").slideUp("fast").animate({width: "100%"});
	$(".total2").slideDown("fast").animate({width: "99%"});
	$(".total2").slideDown("fast").animate({width: "100%"});
	});
	$("#listen").click(function(){
	$(".total2").slideUp("fast").animate({width: "99%"});
	$(".total3").slideDown("fast").animate({width: "100%"});
	});
	$("#library").click(function(){
	$(".total3").slideUp("fast").animate({width: "99%"});
	$(".total2").slideDown("fast").animate({width: "100%"});
	});
});
$(document).ready(function(){
	$("#showaudio").click(function(){
	$("#song").slideToggle("fast").animate({width: "100%"});
	});
});
$(document).ready(function(){
	$("#fd").click(function(){
	$("#fdb").slideUp("fast");
	$("#feedback").css({"opacity":"1"});
	});
});
</script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/mp3script.js"></script>
<style>
a:hover{text-decoration:none;transition:0.5s;color:green;text-shadow:1px 2px 3px lime;}
</style>
