<?php
session_start();
	error_reporting(0);
	require_once 'connect.php';
	if(isset($_SESSION['stuid'])==true)
	{
		$stuid=$_SESSION['stuid'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$message=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_POST['message'])));
		$sql=mysqli_query($con,"INSERT INTO contact(send_by,message,ip) VALUES('$stuid','$message','$ip')");
		if($sql==true)
		{
			echo "<script>alert('Your query has been sent successfully...');window.location='index.php';</script>";
		}
		else{
			echo "<script>alert('There is some error...please try again later...');window.location='index.php';</script>";
		}
}
else{
	echo "<script>window.location='login.php';</script>";
}
?>