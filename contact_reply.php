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
<link rel="stylesheet" href="css/bootstrap.css">
<title>Reply</title>
<body style="background-color:whitesmoke">
<?php
if(isset($_SESSION['stuid']))
{
	$id=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['reply_user'])));
	$time=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['time'])));
}
?>
<?php
echo '<form action="contact_replys.php?reply_user='.$id.'&time='.$time.'" method="post">';
?><br>
<center><textarea class="form-control" name="reply" placeholder="Write Your Reply Here...." required style='width:50%;height:300px;'></textarea></center>

<center><input type="submit" value="Send" class="btn btn-info"></center>
</form>
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