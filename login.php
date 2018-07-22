<?php
session_start();
error_reporting(0);
?>
<html>
<title>Avagahana Login Page</title>
<link rel="icon" href="images/logo.jpg">
<link rel="stylesheet" href="css/bootstrap.css">
<style>
input{padding:10px;border-radius:5px;transition:0.8s;color:#3399cc;margin:10px;border:2px solid #3399cc;font-family:lucida sans;}
input:hover{border:2px solid white;transition:1s;}
input:focus{transition:1s;border:2px solid white;}
button{padding:10px;width:100px;margin:10px;border:0px;border-radius:100px;transition:1s;color:white;border:2px solid white;background-color:#3399cc;font-family:georgia;}
button:hover{background-color:white;color:#3399cc;transition:1s;cursor:pointer;}
</style>
</head>
<?php
require_once 'connect.php';
?>
<body style="background-image:url('images/4.png');background-size:80% 200%;background-attachment:fixed;">
	<center><img src="images/logo.jpg" style="width:100px;height:100px;margin:10px;border-radius:100px;border:2px solid white;padding:2px;"><br><h3 style="color:white;font-family:lucida sans;">Login</h3></center>
	<form action="check_login.php" method="post">
	<center>
	<input type="text" placeholder="UserId: Ex:N130010" name="stuid" minlength="7" autofocus required><br>
	<input type="password" placeholder="Password: ******" name="password" minlength="5" required><br>
	<button type="submit" name="login">Login</button>
</form>
</center>
<div style="position:fixed;bottom:0%;left:0%;width:100%;background-color:teal;padding:10px;">
	<center><b style="color:white;font-family:lucida sans;">&copy;Venkatesh Mogili,N130010</b></center>
	</div>
</body>

