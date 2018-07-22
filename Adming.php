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
	<style>
#upload_progress{display:none;}
</style>
<div id="uploaded">
<?php
?>
</div>
<a href="index.php" style="text-decoration:none;font-size:20px;color:blue;border:3px solid blue;padding:5px;"><< Go back</a><br>
<div id="upload_progress"></div>
<div>
<table>
<tr>
<td>
<form action="Adming.php" method="post" enctype="multipart/form-data">
	<b style='color:blue'>Choose Files:</b><input type="file" name="upload[]" id="file" multiple="multiple" required/>
	<input type="submit" name="submit" value="Upload" style="background-color:black;color:white;border:0px;border-radius:2px;"/></form>
	</td>
	</table>
</div>
</div>
<?php
if (!empty($_FILES['upload[]'])){
	echo "Choose file";
	}
else if (!empty($_FILES['upload'])){
	foreach($_FILES['upload']['name'] as $key =>$name){
		if($_FILES['upload']['error'][$key] ==0 && move_uploaded_file($_FILES['upload']['tmp_name'][$key],"images/{$name}")){
			$uploaded[]=$name;
		}
	}
	if (print_r($uploaded)==1)
	{
	echo "<br><br><br><b style='color:green;'>Successfully uploaded</b><style>";
	}
	else{
	echo "Failed";
	}
}
?>
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
