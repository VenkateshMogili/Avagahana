<?php
error_reporting(0);
?><html>
<head>
	<title>PDD</title>
<style>
body{color:white;padding:0px;margin:0px;text-shadow:1px 2px 3px white;-webkit-animation: mymovell 1s 1;-webkit-animation-play-state: play;animation: mymovell 1s 1;animation-play-state: play;}
	@-webkit-keyframes mymovell {from {right:10px;-webkit-filter:blur(2px);color:white;} to {right: 1px;}}
#docs{color:white;padding:0px;margin:0px;box-shadow:1px 2px 10px 3px white;text-shadow:1px 2px 3px white;-webkit-animation: mymovel 1s 1;-webkit-animation-play-state: play;animation: mymovel 1s 1;animation-play-state: play;}
	@-webkit-keyframes mymovel {from {right:10px;-webkit-filter:blur(2px);color:white;} to {right: 1px;}}
</style>
</head>
<body><br>
	<center><div class="col-md-12" style="height:600px;overflow:auto;">
		<button class="btn btn-danger" onclick="load_page('PDD.php')">Personality Development</button>
		<button class="btn btn-primary" onclick="load_page('BIGD.php')">Better Intellectual Growth</button>
		<button class="btn btn-primary" onclick="load_page('CGD.php')">Career Guidance</button>
		<button class="btn btn-primary" onclick="load_page('JOD.php')">Job Opportunities</button>
		<button class="btn btn-primary" onclick="load_page('ELSD.php')">English Language Application Skills</button>
		<button class="btn btn-primary" onclick="load_page('JLD.php')">Japanese Language</button>
		<button class="btn btn-primary" onclick="load_page('General.php')">General</button>
		<?php
		session_start();
		require_once 'connect.php';
		$sql=mysqli_query($con,"SELECT * FROM files where f_type='doc' and category='Personality Development' order by id DESC LIMIT 100");
		while($r=mysqli_fetch_array($sql))
		{
			$file=$r['file_name'];
			$id=$r['id'];
			echo '<div class="col-md-3" onclick="load_page(\'document.php?id='.$id.'\')" id="docs" style="cursor:pointer;margin:5px;height:100px;border-radius:5px;background-color:#993399">
		<center><b style="color:white;cursor:pointer;">'.$file.'</b></center>';
		if(isset($_SESSION['stuid']))
	{
		$stu=$_SESSION['stuid'];
				$ad=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
			if(mysqli_fetch_array($ad)==true)
			{
				echo '<a href="del_link.php?cat=documents&&link='.$id.'" style="float:right;color:white;text-shadow:none;border:1px solid white;border-radius:100px;padding:5px;width:30px;height:30px;text-align:center;">X</a>';
			}
		}
		echo '
	</div>';
		}
		$sql=mysqli_query($con,"SELECT * FROM files where f_type='doc' and category='Personality Development' order by id DESC LIMIT 100");
		if(mysqli_fetch_array($sql)!=true)
		{
			echo "<h1 style='text-shadow:none;color:red'>No files found</h1>";
		}
		?>
	</div>
	</body>
</html>
<script src="css/jquery.js"></script>
<script src="scripts.js"></script>
