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
th{color:black;}
td{color:black;}
</style>
</head>
<body>
	<button class="btn btn-success" id="cln"><< Go back</button>
<table class="table">
	<tr><th>Sender</th><th style="width:40%">Message</th><th style="width:40%;">Reply</th><th>Time</th></tr>
<?php
require_once 'connect.php';
$sql=mysqli_query($con,"SELECT * FROM contact order by time DESC LIMIT 1000");
while($r=mysqli_fetch_array($sql))
{
	$send_by=$r['send_by'];
	$message=$r['message'];
	$time=$r['time'];
	$reply=$r['reply'];
	$id=$r['id'];

	echo "<tr><td>".$send_by."</td><td>".$message."</td>";
	if((mysqli_fetch_array(mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'"))) && mysqli_fetch_array(mysqli_query($con,"SELECT * FROM contact where id='$id' and reply=''")))
		{
			echo "<td><a href='contact_reply.php?reply_user=".$id."&time=".$time."' target='_blank' class='btn btn-danger'>Give reply--></a></td>";
		}
	else{
		echo "<td>".$reply."</td>";
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