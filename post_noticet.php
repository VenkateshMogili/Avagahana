<?php
session_start();
require_once 'connect.php';
if(isset($_SESSION['stuid']))
{
	$stu=$_SESSION['stuid'];
	$sql=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
	if(mysqli_num_rows($sql)==1)
	{

	$title=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_POST['title'])));
	$brief=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_POST['brief'])));
	$sd=$_SESSION['stuid'];
	$ip=$_SERVER['REMOTE_ADDR'];
	$date=date('d-m-Y');
	$s=mysqli_query($con,"SELECT * FROM notices where notice_title='$title' or notice_brief='$brief'");
	if(mysqli_num_rows($s)!=1)
	{
		$k=mysqli_query($con,"INSERT INTO notices (notice_title,notice_brief,sd,ip,dates,time) values('$title','$brief','$sd','$ip','$date',NOW())");
		if($k==true)
		{
echo "<center><div style='width:100%;height:100%;background-color:lightgray;'><h2 style='color:#3cc74e;background-color:white;padding:10px;font-family:georgia;border:2px solid green;'>Your Notice has been Posted Successfully...</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><a href='index.php' style='color:teal;font-size:20px;font-family:arial;text-decoration:none;border:2px solid red;background-color:white;padding:10px;border-radius:100px;'><--Go back to Homepage</a></div></center>";
			}
			else{
				echo "<script>alert('Already Imported');window.location='index.php';</script>";
			}
		}
	else{
		echo "<script>alert('Already Imported');window.location='index.php';</script>";
	}
}
else{
	echo "<script>window.location='404.php'</script>";
}
}
else{
	echo "<h1>Please Login</h1>";
}
?>
