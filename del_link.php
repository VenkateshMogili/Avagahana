<?php
session_start();
error_reporting(0);
require_once 'connect.php';
if(isset($_SESSION['stuid'])==true)
{
	$stu=$_SESSION['stuid'];
	$cat=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['cat'])));
	$id=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['link'])));
	$sql=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
	if(mysqli_fetch_array($sql)==true)
	{
		if($cat=='notices')
		{
		$check=mysqli_query($con,"SELECT * FROM notices where id='$id'");
		if(mysqli_fetch_array($check)==true)
		{
		$deleted=mysqli_query($con,"DELETE FROM notices where id='$id'");
		if($deleted==true)
		{
			echo '<script>alert("Deleted Successfully...");window.location="index.php"</script>';
		}
		else{
			echo '<script>alert("There is some error...Try again");window.location="index.php"</script>';
		}
		}
		else{
			echo '<script>alert("File not found");window.location="index.php"</script>';
		}
		}
		else if($cat=='music')
		{
			$check=mysqli_query($con,"SELECT * FROM music where id='$id'");
		if(mysqli_fetch_array($check)==true)
		{
		$deleted=mysqli_query($con,"DELETE FROM music where id='$id'");
		if($deleted==true)
		{
			echo '<script>alert("Deleted Successfully...");window.location="Mp3/index.php"</script>';
		}
		else{
			echo '<script>alert("There is some error...Try again");window.location="Mp3/index.php"</script>';
		}
		}
		else{
			echo '<script>alert("File not found");window.location="Mp3/index.php"</script>';
		}
		}
		else if($cat=='coming')
		{
			$check=mysqli_query($con,"SELECT * FROM coming where id='$id'");
		if(mysqli_fetch_array($check)==true)
		{
		$deleted=mysqli_query($con,"DELETE FROM coming where id='$id'");
		if($deleted==true)
		{
			echo '<script>alert("Deleted Successfully...");window.location="index.php"</script>';
		}
		else{
			echo '<script>alert("There is some error...Try again");window.location="index.php"</script>';
		}
		}
		else{
			echo '<script>alert("File not found");window.location="index.php"</script>';
		}
		}
		else if($cat=='videos')
		{
			$check=mysqli_query($con,"SELECT * FROM videos where id='$id'");
		if(mysqli_fetch_array($check)==true)
		{
		$deleted=mysqli_query($con,"DELETE FROM videos where id='$id'");
		if($deleted==true)
		{
			echo '<script>alert("Deleted Successfully...");window.location="etube.php"</script>';
		}
		else{
			echo '<script>alert("There is some error...Try again");window.location="index.php"</script>';
		}
		}
		else{
			echo '<script>alert("File not found");window.location="index.php"</script>';
		}
		}
		else if($cat=='documents')
		{
			$check=mysqli_query($con,"SELECT * FROM files where id='$id'");
		if(mysqli_fetch_array($check)==true)
		{
		$deleted=mysqli_query($con,"DELETE FROM files where id='$id'");
		if($deleted==true)
		{
			echo '<script>alert("Deleted Successfully...");window.location="index.php"</script>';
		}
		else{
			echo '<script>alert("There is some error...Try again");window.location="index.php"</script>';
		}
		}
		else{
			echo '<script>alert("File not found");window.location="index.php"</script>';
		}
		}
	}
		
	//If not admin	
	else{
		echo '<script>window.location="index.php";</script>';
	}
	
	if($cat=="" || $id="")
	{
		header("Location: etube.php");
	}
}
else{
	echo '<center><h1>You are not the admin</h1><script>window.location="index.php"</script>';
}

?>
