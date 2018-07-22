<style>
.container{width:90%;}
input{width:300px;color:black;padding:10px;border-radius:5px;border:1px solid lightgray;}
#u{width:150px;background-color:#3399cc;color:white;border:0px;}
#u:hover{width:200px;box-shadow:10px 10px 30px 10px #3399ff;transition:0.4s;cursor:pointer;color:orange;background-color:black;-webkit-animation:v 1s 1;animation:v 1s 1;}
@-webkit-keyframes v{
	50%{width:100px;}
	52%{width:150px;}
}
input:hover{box-shadow:10px 10px 30px 10px #3399ff;}
</style>
<?php
session_start();
error_reporting(0);
require_once 'connect.php';
if(isset($_SESSION['stuid'])==true)
{
	$stu=$_SESSION['stuid'];
	$sql=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
	if(mysqli_num_rows($sql)==1)
	{
?>
<script src="css/jquery.js"></script>
<div class="container">
	<button class="btn btn-success" id="cln"><< Go back</button>
<h2 style="color:magenta"><center>Post Normal Notification</center></h2>
<div class="jumbotron">
<center><form action="post_noticet.php" method="post" enctype="multipart/form-data">
	<input type="text" name="title" placeholder="Notice Title" class="form-control" required>
	<textarea class="form-control" name="brief" placeholder="Write your brief notice here..." style="height:200px;" required></textarea>
    <input type="submit" value="Post" name="submit" id="u" title="Post Notice">
</form>
</center>
</div>
</div>
<?php
}
	else{
		echo "<script>window.location='404.php';</script>";
	}
}
else{
		echo "<script>window.location='404.php';</script>";
	}
?>