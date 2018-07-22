<body style='background-color:whitesmoke;'>
<?php
session_start();
error_reporting(0);
require_once 'connect.php';
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($_POST['login']))
{
$stuid=mysql_real_escape_string(strtoupper($_POST['stuid']));
$stupasswd=mysql_real_escape_string($_POST['password']);
$sel_user="SELECT * FROM students WHERE stuid='$stuid' AND password='$stupasswd'";
$run_user=mysqli_query($con,$sel_user);
$check_user=mysqli_num_rows($run_user);
	if($check_user>0)
	{
		$_SESSION['stuid']=$stuid;
		echo "<h3 style='font-family:georgia;color:green;'>Please wait....It's checking<img src='images/loading.gif'></h3>";
		echo "<script>window.open('index.php','_self')</script>";
	}
	else
	{
		echo "<h3 style='font-family:georgia;color:red;'>Wrong UserId or Password...<img src='images/loading.gif'></h3>";
		echo "<script>window.open('login.php','_self')</script>";
	}
}
else{
	echo "<h3 style='font-family:georgia;color:red;'>Wrong UserId or Password...<img src='images/loading.gif'></h3>";
	echo "<script>alert('Invalid Credentials');window.open('login.php','_self');</script>";
}
?>
