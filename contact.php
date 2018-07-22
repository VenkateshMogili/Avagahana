<?php
session_start();
error_reporting(0);
require_once 'connect.php';
if(isset($_SESSION['stuid']))
{
	?>
<body>
<center>
	<h1 style="color:magenta;font-family:georgia">Feedback</h1>
	<form action="contact_action.php" method="post">
	<textarea type="description" placeholder="Write your doubt or any query here..." style="width:80%;height:300px;color:black;" name="message" required></textarea><br>
	<button class="btn btn-success">Submit</button>
</form>
</center>
<?php
}
else{
	echo "<center><h1 style='color:magenta'>Please Login to contact</h1></center>";
}
?>
<center>
	<div class="container">
		<div class="jumbotron" style="color:black;">
	<h3 align="left">Contact Information:</h3>
	<img src="images/authornmr.png" style="width:200px;height:200px;border-radius:100px;">
	<p align="left">Polagani. Naga Malleswara Rao(Ph.D)<br>
Faculty<br>Department of English<br>
Rajiv Gandhi University of Knowledge Technologies<br>Nuzvid</p>
	<p>E-mail: nmrpolagani@gmail.com</p>
	</div>
</div>