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
	$cat=mysql_real_escape_string(htmlspecialchars(htmlspecialchars_decode(stripcslashes($_POST['category']))));
//video file uploading...
     $filename = mysql_real_escape_string($_FILES['upload']['name']);
     $venkateshfname = $_FILES['upload']['name'];
    $tmpname  = $_FILES['upload']['tmp_name'];
    $filesize = $_FILES['upload']['size'];
    $ftype = $_FILES['upload']['type'];
    $extension=strpbrk($_FILES['upload']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
    $vpb_allowed_file_extensions = array("wav","mp3","m4a");
    $date=date('d-m-Y');
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    $date=date('d-m-Y');
    $venkateshfname=mysql_real_escape_string($filename);
    $venkateshfname=str_replace(' ','+',$venkateshfname);
    $fp = fopen($tmpname, 'r');
    fclose($fp);
    $uploadDir = 'Mp3/Music/';
        
          if (!in_array($vpb_file_extensions, $vpb_allowed_file_extensions)) 
    {
        //Display file type error error
        echo "<script>alert('only .mp3 files are allowed');window.location='index.php';</script>";
    }
    else 
    {
            $filePath = $uploadDir . $venkateshfname;
$result = move_uploaded_file($tmpname, $filePath);
if (!$result) {
echo "<script>alert('Error uploading file..File is too large');window.location='index.php';</script>";
exit;
}
else{
	$s=mysqli_query($con,"SELECT * FROM notices where notice_title='$title' or notice_brief='$brief'");
	if(mysqli_num_rows($s)!=1)
	{
		$k=mysqli_query($con,"INSERT INTO notices (notice_title,notice_brief,sd,ip,dates,time) values('$title','$brief','$sd','$ip','$date',NOW())");
		if($k==true)
		{
			$l=mysqli_query($con,"SELECT * FROM files where file_name='$venkateshfname' and f_type='mp3'");
			if(mysqli_num_rows($l)!=1)
			{
				$kl=mysqli_query($con,"SELECT * FROM notices where notice_title='$title'");
				while($ko=mysqli_fetch_array($kl))
				{
					$id=$ko['id'];
				}
				$p=mysqli_query($con,"INSERT INTO files (file_name,f_type,id) values('$venkateshfname','mp3','$id')");
				if($p==true)
				{
					mysqli_query($con,"INSERT INTO music (related,song,ip,img,time,category) values('$title','$venkateshfname','$ip','$date',NOW(),'$cat')");
 echo "<center><div style='width:100%;height:100%;background-color:lightgray;'><h2 style='color:#3cc74e;background-color:white;padding:10px;font-family:georgia;border:2px solid green;'>Audio Uploaded Successfully...</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><a href='index.php' style='color:teal;font-size:20px;font-family:arial;text-decoration:none;border:2px solid red;background-color:white;padding:10px;border-radius:100px;'><--Go back to Homepage</a></div></center>";
				}
				else{
					echo "<h1 style='color:red;text-align:center;'>This filename not found in Database to upload, try again...</h1>";
				}
			}
			else{
				echo "<h1 style='color:red;text-align:center;'>This filename already exists. Try with another name...</h1>";
			}
		}
		else{
			echo "<h1 style='color:red;text-align:center;'>Database Problem, Not Inserted row...</h1>";
		}
	}
	else{
    echo "<center><div style='width:100%;height:100%;background-color:lightgray;'><h2 style='color:red;background-color:whitesmoke;border:2px solid blue;font-family:georgia;'>Already Uploaded with this title or notice</h2><h3 style='color:green;background-color:whitesmoke;border:2px solid green;font-family:lucida sans'>Please change the title or notice...</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><a href='index.php' style='color:teal;font-size:20px;font-family:arial;text-decoration:none;border:2px solid red;background-color:white;padding:10px;border-radius:100px;'><--Go back to Homepage</a></div></center>";
	}
}
}
}
else{
	echo "<script>window.location='404.php';</script>";
}
}
else{
	echo "<h1>Please Login</h1>";
}
?>
