<?php
session_start();
error_reporting(0);
require_once 'connect.php';
$stu=$_SESSION['stuid'];
$today=date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Avagahana</title><meta charset="UTF-8"><meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
	<!--Styles-->
  <link rel="icon" href="images/logo.jpg"><link rel="stylesheet" href="css/bootstrap.css"><link rel="stylesheet" href="css/vfont/css/font-awesome.min.css"><link rel="stylesheet" href="css/vstyle.css">
</head>
<!--Main Body-->
<body>
	<!--Menu's-->
        	<nav class="navbar navbar-inverse" style="border:0px;border-radius:0px;background:transparent;color:white;">
  <div class="container-fluid" id="navv">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="background-color:#3399cc"></span>
        <span class="icon-bar" style="background-color:#3399cc"></span>
        <span class="icon-bar" style="background-color:#3399cc"></span> 
      </button>
      <center><a href="index.php" id="title" class="brand"><img src="images/logo.jpg" style="width:120px;height:120px;border-radius:100px;"> AVAGAHANA<sub><i> - A voluntary effort to empower you.</i></sub></a></center>

      </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php" class="link"><center><i class="fa fa-home my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i><br><b class='ln'>Home</b></center></a></li>
        
        <li onclick="load_page('notifications.php')"><a href="#" class="link" style="color:white;"><center><i class="fa fa-desktop my" style="font-size:1em;border:2px solid white;border-radius:100px;padding:10px;background:linear-gradient(yellow,black)"></i><br><b class="ln">Notifications</b></center></a></li> 
        <li onclick="load_page('gallery.php')"><a href="#" class="link" style="color:white;"><center><i class="fa fa-image my" style="font-size:1em;border:2px solid white;border-radius:100px;padding:10px;background:linear-gradient(brown,white)"></i><br><b class="ln">Gallery</b></center></center></a></li> 
        <li onclick="load_page('contact.php')"><a href="#" class="link" style="color:white;"><center><i class="fa fa-envelope-o my" style="font-size:1em;border:2px solid white;border-radius:100px;padding:10px;background:linear-gradient(red,white)"></i><br><b class="ln">Feedback</b></center></center></a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php  
		
        if(isset($_SESSION['stuid']))
        {
        $stu=$_SESSION['stuid'];
        $sql=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
        if(mysqli_fetch_array($sql)==true)
        {
          ?>
          <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user my" style="font-size:1em;border:2px solid white;color:black;border-radius:100px;padding:10px;background:linear-gradient(lime,white)"></i><br><b class="ln">Admin</b>
          <span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color:orange">
            <li><a href="#" onclick="load_page('Adminv.php')">Post Video Notification</a></li>
            <li><a href="#" onclick="load_page('Admina.php')">Post Audio Notification</a></li>
            <li><a href="#" onclick="load_page('Admind.php')">Post Document Notification</a></li>
            <li><a href="#" onclick="load_page('Admint.php')">Post Normal Notification</a></li> 
            <li><a href="#" onclick="load_page('Adminc.php')">Post Coming Soon Notification</a></li>  
            <li><a href="#" onclick="load_page('Adming.php')">Upload Gallery</a></li>   
            <li><a href="#" onclick="load_page('Discussion.php')">Discussion Form</a></li>  
            <li><a href="#" onclick="load_page('changepassword.php')">Change Password</a></li> 
          </ul>
        </li>
        <li><a href="logout.php" class="link" style="color:white;"><center><i class="fa fa-lock my" style="font-size:1em;border:2px solid white;border-radius:100px;padding:10px;background:linear-gradient(black,white)"></i><br><b class="ln">Logout</b></center></center></a></li> 
      <?php
    }
    else{
      ?>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user my" style="font-size:1em;border:2px solid white;color:black;border-radius:100px;padding:10px;background:linear-gradient(brown,white)"></i><br><b class="ln"><?php echo $stu;?></b>
          <span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color:orange">
            <li><a href="#" onclick="load_page('changepassword.php')">Change Password</a></li>
            <li><a href="#" onclick="load_page('Discussions.php')">Discussion Form</a></li>  
          </ul>
        </li>
      <li><a href="logout.php" class="link" style="color:white;"><center><i class="fa fa-lock my" style="font-size:1em;border:2px solid white;border-radius:100px;padding:10px;background:linear-gradient(brown,white)"></i><br><b class="ln">Logout</b></center></center></a></li> 
  <?php
    }
  }
    else{
      ?>
      <li><a href="login.php" class="link" style="color:white;"><center><i class="fa fa-unlock my" style="font-size:1em;border:2px solid white;border-radius:100px;padding:10px;background:linear-gradient(brown,white)"></i><br><b class="ln">Login</b></center></center></a></li> 
    <?php
    }
    ?>
      </ul>
    </div>
  </div>
</nav>
<nav class="navbar navbar-default" style="background-color:#FFFF33">
  <center><div class="container-fluid" style="width:100%;">
    <ul class="nav navbar-nav">
 <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><i class="fa fa-user my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i></center><center><b class='btn btn-default' style="color:white;background-color:#404ffa;width:150px;font-family:georgia;">Personality<br> Development</b></center><span class="caret"></span></a>
    <ul class="dropdown-menu" style="background-color:black;">
      <li class="dr"><a href="Mp3/index.php?v=Personality Development" target="_blank" style="color:orange">Audio</a></li>
      <li class="dr"><a href="list_etube.php?v=Personality Development" target="_blank" style="color:orange">Video</a></li>
      <li class="dr"><a href="#" onclick="load_page('PDD.php')" style="color:orange">Documents</a></li>
      </ul></li>
      <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><i class="fa fa-user my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i></center><center><b class='btn btn-danger' style="width:150px;font-family:georgia;">Better Intellectual<br> Growth </b></center><span class="caret"></span></a>
    <ul class="dropdown-menu" style="background-color:black;">
      <li class="dr"><a href="Mp3/index.php?v=Better Intellectual Growth" target="_blank" style="color:orange">Audio</a></li>
      <li class="dr"><a href="list_etube.php?v=Better Intellectual Growth" target="_blank" style="color:orange">Video</a></li>
      <li class="dr"><a href="#" onclick="load_page('BIGD.php')" style="color:orange">Documents</a></li>
      </ul></li>
      <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><i class="fa fa-user my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i></center><center><b class='btn btn-default' style="width:150px;font-family:georgia;background-color:purple;color:white;">Career<br>Guidance</b></center><span class="caret"></span></a>
    <ul class="dropdown-menu" style="background-color:black;">
      <li class="dr"><a href="Mp3/index.php?v=Career Guidance" target="_blank" style="color:orange">Audio</a></li>
      <li class="dr"><a href="list_etube.php?v=Career Guidance" target="_blank" style="color:orange">Video</a></li>
      <li class="dr"><a href="#" onclick="load_page('CGD.php')" style="color:orange">Documents</a></li>
      </ul></li>
      <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><i class="fa fa-user my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i></center><center><b class='btn btn-primary' style="width:150px;font-family:georgia;">Job <br>Opportunities</b></center><span class="caret"></span></a>
    <ul class="dropdown-menu" style="background-color:black;">
      <li class="dr"><a href="Mp3/index.php?v=Job Opportunities" target="_blank" style="color:orange">Audio</a></li>
      <li class="dr"><a href="list_etube.php?v=Job Opportunities" target="_blank" style="color:orange">Video</a></li>
      <li class="dr"><a href="#" onclick="load_page('JOD.php')" style="color:orange">Documents</a></li>
      </ul></li>
      <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><i class="fa fa-user my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i></center><center><b class='btn btn-warning' style="width:150px;font-family:georgia;">English Language<br> Application Skills</b></center><span class="caret"></span></a>
    <ul class="dropdown-menu" style="background-color:black;">
      <li class="dr"><a href="Mp3/index.php?v=English Language Application Skills" target="_blank" style="color:orange">Audio</a></li>
      <li class="dr"><a href="list_etube.php?v=English Language Application Skills" target="_blank" style="color:orange">Video</a></li>
      <li class="dr"><a href="#" onclick="load_page('ELSD.php')" style="color:orange">Documents</a></li>
      </ul></li>
      <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><i class="fa fa-user my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i></center><center><b class='btn btn-info' style="width:150px;color:white;background-color:#3cc74e;font-family:georgia;">Japanese<br>Language</b></center><span class="caret"></span></a>
    <ul class="dropdown-menu" style="background-color:black;">
      <li class="dr"><a href="Mp3/index.php?v=Japanese Language" target="_blank" style="color:orange">Audio</a></li>
      <li class="dr"><a href="list_etube.php?v=Japanese Language" target="_blank" style="color:orange">Video</a></li>
      <li class="dr"><a href="#" onclick="load_page('JLD.php')" style="color:orange">Documents</a></li>
      </ul></li>
       <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><i class="fa fa-user my" style="font-size:1em;border:2px solid white;border-radius:100px;color:black;padding:10px;background:linear-gradient(olive,white);"></i></center><center><b class='btn btn-info' style="width:150px;height:60px;color:white;background-color:olive;font-family:georgia;">General</b></center><span class="caret"></span></a>
    <ul class="dropdown-menu" style="background-color:black;">
      <li class="dr"><a href="Mp3/index.php?v=General" target="_blank" style="color:orange">Audio</a></li>
      <li class="dr"><a href="list_etube.php?v=General" target="_blank" style="color:orange">Video</a></li>
      <li class="dr"><a href="#" onclick="load_page('General.php')" style="color:orange">Documents</a></li>
      </ul></li>
    </ul>
  </div>
</center>
</nav>
	<div class="col-md-5" style="">
		<h1 style="color:white;font-family:arial;border-radius:10px;background-color:purple;font-family:lucida sans" id='upd'>What's New?</h1>
		<div style="height:430px;overflow:auto;">
		<ul class="list-group" style="background-color:transparent;">
			<?php
			$sql=mysqli_query($con,"SELECT * FROM notices ORDER BY id DESC LIMIT 10");
			while($r=mysqli_fetch_array($sql))
			{
				$id=$r['id'];
				$notice_title=$r['notice_title'];
				$notice=$r['notice_brief'];
				$sd=$r['sd'];
				$dates=$r['dates'];
				$views=$r['views'];
			printf('<li class="list-group-item" id="updates" style="font-family:lucida sans;color:#C71585;background-color:transparent">
			<i class="fa fa-send my"></i> <a href="#" style="color:#C71585" onclick="view_notice(\'notice.php?id='.$id.'\')">'.$notice_title.'');
			if($dates==$today)
			{
				echo '<img src="images/new.gif">';
				}
			echo '</a> ';
			$ad=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
			if(mysqli_fetch_array($ad)==true)
			{
				echo '<span class="badge" style="color:red;text-shadow:none;border:1px solid black;background-color:#FF8C00;"><a href="del_link.php?cat=notices&&link='.$id.'">X</a></span>';
			}
			echo '<span class="badge" style="color:#3399cc;border:1px solid #3cc74e;background-color:white">'.$views.'</span>
			</li>';
			
			}
			echo '<center><button class="btn btn-info" onclick="load_page(\'notifications.php\')">More Notifications >> </button></center>';
			?>
		</ul>
		</div>
	</div>
	<div class="col-md-7" style="background-color:rgba(0,0,255,0.1);background-size:100% 100%;height:550px;border-radius:10px;"><br>
    <div class="container" style="width:100%;border-radius:0px;">
    <div class="jumbotron" style="color:black;font-size:12px;height:500px;font-family:lucida sans"><p>
<center><img src="images/author.png" style="float:right;width:120px;height:200px;"></center>
      Dear student,<br><br>
Greetings!<br><br>
<b style="color:#3cc74e"><b style="font-size:25px;">A</b>vagahana</b> is a voluntary job with a motto - <i style="color:blue">"Let's be aware of our ignorance - Let's become enlightened"</i> has been initiated to impart certain focal points required to meet  the challenges in every student life, including you. Well, it gives me an immense pleasure to bring the awareness on various academic issues. I believe that you have never been a mediocre student, indeed.<br><br>
However, it feels really weird to cope with the ever changing demands both in life and education. Each of you needs a range of unique qualities and skills to have your sway over the job market and your personal life as well. In this regard, my contribution could be very small. Nonetheless, I promise you I could give the best of my knowledge through the motivational sessions besides being an English Faculty”.
<br>
<br>You could make use of the physical sessions and the materials posted over here meticulously. <br><br>

I wish you all the best with your learning!<br><br>

Arigatōgozaimashita.<br></p>
    </div>
  </div>
	</div>
	<!--body-->
	
	</body>

<div id="vcontent"></div>
<div style='position:fixed;left:0%;bottom:0%;width:100%;background-color:white;border:3px solid pink;border-top:5px solid magenta;height:100px;display:none' id="coming">
<center>
	<b style='float:left;color:#404ffa'><i class='fa fa-clock-o my'></i> <?php echo $today;?></b>
	<h4 style='color:#3cc74e'><?php 
$c=mysqli_query($con,"SELECT * FROM coming where dates='$today' ");
if(mysqli_fetch_array($c)!=true)
{
	echo 'Coming Soon: <b style="margin:30px;color:#FF4500"> Not updated </b> </h4></center></div>';
}
else{
$c=mysqli_query($con,"SELECT * FROM coming where dates='$today' ");
while($cs=mysqli_fetch_array($c))
{
	$news=mysql_real_escape_string($cs['news']);
	$link=mysql_real_escape_string($cs['link']);
	}
	echo 'Coming Soon: <b style="margin:30px;color:#404ffa">'.$news.'</b> <b style="margin:30px"> </b></h4></center></div>';
}
?>
<div style="position:fixed;bottom:0px;left:0px;width:100%;height:30px;background:linear-gradient(#3399cc,black);color:white;">
    <center>
      <b style="margin:40px;cursor:pointer" onclick="load_page('author.php')">Author : Nagamalleswara Rao Polagani</b>
      <b style="margin:40px;cursor:pointer" onclick="load_page('developer.php')">&copy; Designed and Developed by Venkatesh Mogili,N130010</b>
      <b style="margin:40px;cursor:pointer" onclick="load_page('rgukt.php')">&reg; RGUKT-IIIT-NUZVID</b>
      <b style="margin:40px;">Visits: <?php include 'counter.php';?></b>
    </center>
  </div>
    <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
  <script src="scripts.js"></script>
</body>
</html>