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

	<button id="cln" class="btn btn-success"><< Go back</button>
<h2 style="color:magenta"><center>Post Document Notification</center></h2>
<div class="jumbotron">
<center><form action="post_noticed.php" method="post" enctype="multipart/form-data">
	<center><h5 style="color:green">Available formats: .pdf</h5></center>
	<input type="text" name="title" placeholder="Notice Title" class="form-control" required>
	<textarea class="form-control" name="brief" placeholder="Write your brief notice here..." style="height:200px;" required></textarea>
    <select name="category" class="form-control" style="color:#404ffa;">
		<option value="">Select Category</option>
		<option value="Personality Development">Personality Development</option>
		<option value="Better Intellectual Growth">Better Intellectual Growth</option>
		<option value="Career Guidance">career Guidance</option>
		<option value="Job Opportunities">Job Opportunities</option>
		<option value="English Language Application Skills">English Language Application Skills</option>
		<option value="Japanese Language">Japanese Language</option>
		<option value="General">General</option>
	</select>
    <b style="color:navy;font-family:arial;">Choose your Document file:</b>
    <input type="file" name="upload" id="fileToUpload" minlength="1">
    <input type="submit" value="Post" name="submit" id="u" title="Post Notice">
</form>
</center>
</div>
</div>
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
}
	else{
		echo "<script>window.location='404.php';</script>";
	}
}
else{
		echo "<script>window.location='404.php';</script>";
	}
?>
