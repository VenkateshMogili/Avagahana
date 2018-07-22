<?php
session_start();
error_reporting(0);
require 'connect.php';
if(isset($_SESSION['stuid']))
{
	$stu=$_SESSION['stuid'];
	?>
<!DOCTYPE html>
<html>
<head>
<title>Discussion Form</title>
<style>
th{color:white;}
td{color:black;}
</style>
</head>
<body>
	<script src="scripts.js"></script>
	<button class="btn btn-success" id="cln"><< Go back</button>
	<button onclick="load_page('contact.php')" class="btn btn-success">Ask Question ?</button>
<table class="table">
	<tr style="background-color:teal;color:white;"><th>Sender</th><th style="width:40%">Message</th><th style="width:40%;">Reply</th><th>Time</th></tr>
<?php
require_once 'connect.php';
$sql=mysqlI_query($con,"SELECT * FROM contact order by time DESC LIMIT 1000");
while($r=mysqlI_fetch_array($sql))
{
	$send_by=$r['send_by'];
	$message=$r['message'];
	$time=$r['time'];
	$reply=$r['reply'];
	$id=$r['id'];

	echo "<tr><td>".$send_by."</td><td>".$message."</td>";
	if(mysqlI_fetch_array(mysqlI_query($con,"SELECT * FROM contact where id='$id' and reply=''")))
		{
			echo "<td><b style='color:red'><i class='fa fa-circle'></i> Not Answered</b></td>";
		}
	else{
		echo "<td><b style='color:green;font-family:georgia'>".$reply."</b></td>";
	}
	echo "<td>".$time."</td></tr>";
}
?>
<?php
}
else{
	echo "<script>window.location='404.php'</script>";
}
?>
</table>