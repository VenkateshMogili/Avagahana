<?php
session_start();
require_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<title>Video Player</title>
<link rel="icon" href="images/logo.jpg">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/vfont/css/font-awesome.css">
<style>
a:hover{text-decoration:none;transition:0.5s;color:green;text-shadow:1px 2px 3px lime;}
img{transition:1s;border-radius:10px;}
img:hover{border-radius:100px;transition:0.5s;}
.videos_list{
		list-style:none;
	}
	.loadmorevideos{
		color:#FFF;
		border-radius:5px;
		width:50%;
		border:0px;
		height:40px;font-size:18px;background:#42B8DD;
		outline:0;
	}
	.loadbutton{
		text-align:center;
		list-style: none;
	}
.iconimg:hover{background-color:lightgray;padding:20px;-webkit-transform:rotate(360deg);-moz-transform:rotate(360deg);transform:rotate(360deg);}
.iconimg{transition:1s;}
</style>
<div class="col-md-12" id="vcontent" style="overflow:auto">
	<div class="col-md-2"><i class="fa fa-bars my" style="cursor:pointer;margin:10px;font-size:2em;" id="vmenu"></i><a href="etube.php"><i class="fa fa-youtube-play my" style="color:#3399cc;font-size:2.2em;text-shadow:1px 2px 5px lightgray;"></i><b style="text-shadow:1px 2px 5px lightgray;font-size:17px;color:#3399cc;border-radius:100px;font-family:lucida sans"> Video<b style="padding:5px;margin:10px;background-color:black;color:white;margin:1px;border-radius:10px;">Player</b></b></a></div><div class="col-md-10"><table style="width:100%;"><tr style="width:100%;"><td style="width:80%;"><input type="text" class="form-control" placeholder="Search" style="width:80%;border-radius:0px;margin:10px;"></td><td><input type="submit" class="btn btn-default" onclick="alert('Not available now..')" style="border-radius:0px;background-color:black;color:white;margin-left:-165px;" placeholder="Search" value="Search"></td></tr></table></div>
	<div class="col-md-3" style="display:none;border:1px solid lightgray;height:560px;position:fixed;left:1%;top:8%;z-index:99999;background-color:white;" id="vmenuvb">
	<h4>Categories</h4>
	<ul class="list-group">
	<a href="list_etube.php?v=Personality Development"><li class="list-group-item"><i class="fa fa-user my"></i> Personality Development</li></a>
	<a href="list_etube.php?v=Better Intellectual Growth"><li class="list-group-item"><i class="fa fa-globe my"></i> Better Intellectual Growth</li></a>
	<a href="list_etube.php?v=Career Guidance"><li class="list-group-item"><i class="fa fa-comments my"></i> Career Guidance</li></a>
	<a href="list_etube.php?v=Job Opportunities"><li class="list-group-item"><i class="fa fa-user-plus my"></i> Job Opportunities</li></a>
	<a href="list_etube.php?v=English Language Application Skills"><li class="list-group-item"><i class="fa fa-book my"></i> English Language Application Skills</li></a>
	<a href="list_etube.php?v=Japanese Language"><li class="list-group-item"><i class="fa fa-pencil my"></i> Japanese Language</li></a>
	<a href="list_etube.php?v=General"><li class="list-group-item"><i class="fa fa-bell my"></i> General</li></a>
	<a href="list_etube.php?v=Coming Soon"><li class="list-group-item"><i class="fa fa-send my"></i> Coming Soon...</li></a>
	</ul>
	</div>
	<br><br><br>
	<div class="col-md-8" id='vidd'>
		<video id="vid" src="" style="border-top:2px solid red;background-color:black;width:100%;height:500px;box-shadow:1px 2px 3px lightgray;" type="video/mp4"></video>
		</div>
	<div class="col-md-4" id='viddm'>
		<center><h3>Recent Videos</h3></center>
			<ul class="videos_list">
				<table style="box-shadow:1px 2px 3px lightgray;width:100%;">
				<?php
		$resultsPerPage=10;
		$sql=mysqli_query($con,"SELECT * FROM videos ORDER BY id ASC LIMIT 0, $resultsPerPage");
				while($r=mysqli_fetch_array($sql))
				{
					$video=$r['video'];
					$video_code=$r['video_code'];
					$album=$r['album'];
					$time=$r['time'];
					$views=$r['views'];
					$vtime=$r['videotime'];
					$id=$r['id'];
				echo '<li><tr><td style="padding:10px;"><a href="#" onclick="view_video(\'play.php?video='.$video_code.'\')">';
				
			echo '<img src="images/video7.png" style="width:100px;height:100px;" class="iconimg"><p style="color:magenta;margin-top:-20px;margin-left:60px;z-index:999999;">'.$vtime.'</p></p></td>
					 <td style="width:300px;overflow:hidden;text-overflow:ellipsis;"><a href="#" onclick="view_video(\'play.php?video='.$video_code.'\')">'.$video.'</a></td><td>';
				
				echo '</td><td>';
				if(isset($_SESSION['stuid']))
				{
					$stu=$_SESSION['stuid'];
					$ad=mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'");
					if(mysqli_fetch_array($ad)==true)
					{
						echo '<a href="del_link.php?cat=videos&&link='.$id.'" style="margin:5px;float:right;border:1px solid red;border-radius:100px;padding:5px;width:30px;height:30px;text-align:center;">X</a>';
					}
				}
				echo '</td></tr><tr>
					<td style="padding-left:10px;">Views: '.$views.'</td></tr></li>';
				}
				?>
			</table>
			</ul>

				<li class="loadbutton"><button class="loadmorevideos" data-page="2">Load More</button>
			<span id="ld"></span></li><br>
	</div>
</div>
<div style="position:fixed;bottom:0px;left:0px;width:100%;height:20px;background-color:black;color:white">
	<center><b style="margin:50px;">Polagani Nagamalleswara Rao </b><b style="margin:50px;">&copy;Venkatesh Mogili,N130010</b></center>
	</div>
	<script src="js/jquery.js"></script>
	<script src="scripts.js"></script>