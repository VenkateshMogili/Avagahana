<?php
session_start();
require_once 'connect.php';
if(isset($_SESSION['stuid'])==true)
{
	$stu=$_SESSION['stuid'];
	$sql=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
	if(mysqli_fetch_array($sql)==true)
	{
?>
<title>Reply</title>
<?php
if(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'")))
{
$id=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['reply_user'])));
$time=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['time'])));
$reply=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_POST['reply'])));
$sql=mysqli_query($con,"UPDATE contact SET reply='$reply' where id='$id' and time='$time'");
if($sql==true)
{
	echo "<script>alert('Sent Successfully');window.close();</script>";
}
}
?>
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