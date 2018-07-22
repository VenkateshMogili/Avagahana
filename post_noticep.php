<?php
require_once 'connect.php';
//png file uploading...
     $filename = mysql_real_escape_string($_FILES['upload']['name']);
     $venkateshfname = $_FILES['upload']['name'];
    $tmpname  = $_FILES['upload']['tmp_name'];
    $filesize = $_FILES['upload']['size'];
    $ftype = $_FILES['upload']['type'];
    $extension=strpbrk($_FILES['upload']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
    $vpb_allowed_file_extensions = array("png","jpg","jpeg","gif");
    $date=date('d-m-Y');
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    $venkateshfname=mysql_real_escape_string($filename);
    $fp = fopen($tmpname, 'r');
    fclose($fp);
    $uploadDir = 'files/';
        
          if (!in_array($vpb_file_extensions, $vpb_allowed_file_extensions)) 
    {
        //Display file type error error
        echo "<script>alert('only .png or .jpg or .jpeg or .gif formats files are allowed');window.location='index.php';</script>";
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
	$s=mysqli_query($con,"SELECT * FROM pictures where file='$filename'");
	if(mysqli_num_rows($s)!=1)
	{
		$k=mysqli_query($con,"INSERT INTO pictures (file) values('$filename')");
		if($k==true)
		{
 echo "<center><div style='width:100%;height:100%;background-color:lightgray;'><h2 style='color:#3cc74e;background-color:white;padding:10px;font-family:georgia;border:2px solid green;'>File Uploaded Successfully...</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><a href='Adminp.php' style='color:teal;font-size:20px;font-family:arial;text-decoration:none;border:2px solid red;background-color:white;padding:10px;border-radius:100px;'><--Go back to Homepage</a></div></center>";				
 		}
		else{
					echo "<h1 style='color:red;text-align:center;'>This filename not found in Database to upload, try again...</h1>";
			}
		}
		else{
				echo "<h1 style='color:red;text-align:center;'>This filename already exists. Try with another name...</h1>";
			}
		}
}
?>
