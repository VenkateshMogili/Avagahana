<?php
session_start();
require_once 'connect.php';
if(isset($_SESSION['stuid']))
{
	$stu=$_SESSION['stuid'];
	$sql=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
	if(mysqli_num_rows($sql)==1)
	{
$stuid=$_SESSION['stuid'];
	$title=mysql_real_escape_string($_POST['title']);	
	$brief=mysql_real_escape_string($_POST['brief']);
	$cat=mysql_real_escape_string(htmlspecialchars(stripcslashes($_POST['category'])));
	$sd=$_SESSION['stuid'];
//video file uploading...
     $filename = $_FILES['upload']['name'];
     $venkateshfname = $_FILES['upload']['name'];
    $tmpname  = $_FILES['upload']['tmp_name'];
    $filesize = $_FILES['upload']['size'];
    $ftype = $_FILES['upload']['type'];
    $extension=strpbrk($_FILES['upload']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
    $vpb_allowed_file_extensions = array("mp4","avi","mpeg","m4a");
    $date=date('d-m-Y');
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    $venkateshfname=$filename;
    $fp = fopen($tmpname, 'r');
    fclose($fp);
    $uploadDir = 'Videos/';
        
          if (!in_array($vpb_file_extensions, $vpb_allowed_file_extensions)) 
    {
        //Display file type error error
        echo "<script>alert('only .mp4 or .avi or .mpeg files are allowed');window.location='index.php';</script>";
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
			$l=mysqli_query($con,"SELECT * FROM files where file_name='$venkateshfname' and f_type='mp4'");
			if(mysqli_num_rows($l)!=1)
			{
				$kl=mysqli_query($con,"SELECT * FROM notices where notice_title='$title'");
				while($ko=mysqli_fetch_array($kl))
				{
					$id=$ko['id'];
				}
				$p=mysqli_query($con,"INSERT INTO files (file_name,f_type,id) values('$venkateshfname','mp4','$id')");
				if($p==true)
				{
					mysqli_query($con,"INSERT INTO videos(video_by,video,video_code,ip,time,full_time,related,category) values('$stuid','$venkateshfname',md5('$venkateshfname'),'$ip',NOW(),'$date','$title','$cat')");
    echo "<script>alert('Your Notice has been posted successfully');window.location='index.php';</script>";
				}
				else{
					echo "Error";
				}
			}
		}
	}
}
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