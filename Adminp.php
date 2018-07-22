<?php
require_once 'connect.php';
?>
<center><div class="container" style="border:2px solid teal;">

<h2 style="color:white;background-color:teal;padding:10px;"><center>Send Picture to Database</center></h2>
<div class="jumbotron" style="background-color:whitesmoke;padding:10px;">
<center><form action="post_noticep.php" method="post" enctype="multipart/form-data">
	<center><h5 style="color:green">Available formats: .png</h5></center>
	<b style="color:navy;font-family:arial;">Choose your file:</b>
    <input type="file" name="upload" id="fileToUpload" minlength="1" required><br><br>
    <input type="submit" value="Post" name="submit" id="u" title="Post Notice">
</form>
</center>
</div>
</div>
<style>
.container{width:90%;}
input{width:300px;color:black;padding:10px;border-radius:5px;border:1px solid lightgray;}
#u{width:150px;background-color:#3399cc;color:white;border:0px;}
#u:hover{width:200px;box-shadow:10px 10px 30px 10px #3399ff;transition:0.4s;cursor:pointer;color:orange;background-color:black;-webkit-animation:v 1s 1;animation:v 1s 1;}
@-webkit-keyframes v{
	50%{width:100px;}
	52%{width:150px;}
}
input:hover{box-shadow:10px 10px 30px 10px #3399ff;}
</style>