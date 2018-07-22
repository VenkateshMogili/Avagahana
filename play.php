<style>
b{color:white;text-shadow:1px 2px 3px black;transition:1s}
b:hover{cursor:pointer;color:yellow;text-shadow:1px 2px 3px green;transition:0.5s}
a:hover{text-decoration:none;transition:0.5s;color:green;text-shadow:1px 2px 3px lime;}
</style>
<?php
session_start();
error_reporting(0);
require_once 'connect.php';
$today=Date('Y-m-d');
$stuid=$_SESSION['stuid'];
$video=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['video'])));
$video=mysql_real_escape_string(str_replace(' ','%20',$video));
$ip=$_SERVER['REMOTE_ADDR'];
$sqlv=mysqli_query($con,"SELECT * FROM videos where video_code!='$video' ");
while($row=mysqli_fetch_array($sqlv))
{
$videos=$row['video_code'];
$views=$row['views'];
}
?>

<?php
if($videos!=true && $views==null)
{
?>
<?php
}
$sql=mysqli_query($con,"SELECT * FROM videos where video_code='$video' ");
while($row=mysqli_fetch_array($sql))
{
$videos=$row['video'];
$subtitle=$row['subtitle'];
$views=$row['views'];
$views=$views+1;
}
if($videos==true){
$sl=mysqli_query($con,"SELECT * FROM students where stuid='$stuid' ");
while($r=mysqli_fetch_array($sl))
{
	$username=$r['s_name'];
}
mysqli_query($con,"UPDATE videos SET views='$views' where video_code='$video' ");
mysqli_query($con,"INSERT INTO videovisitors(login_by,username,ip,time,video) VALUES ('$stuid','$username','$ip',NOW(),'$videos') ");
?>
<?php
echo '<video id="vid" src="Videos/'.$videos.'" style="border-top:2px solid red;background-color:black;width:100%;height:500px;box-shadow:1px 2px 3px lightgray;" type="video/mp4" controls autoplay="true"></video>';
		?>
		<i class="fa fa-play mym" onclick="document.getElementById('vid').play()" style="float:right;margin:10px;cursor:pointer;display:none" id="play" accesskey="p"></i>
<i class="fa fa-pause mym" onclick="document.getElementById('vid').pause()" style="float:right;margin:10px;cursor:pointer;display:none" id="pause" accesskey="o"></i>

		<div style="width:100%;z-index:99999;background-color:black;opacity:0.5;padding:10px;" id='menu'>
			<b onclick="document.getElementById('vid').play();" style="margin:5px;" title="Play"><i class='fa fa-play my'></i></b>
			<b onclick="document.getElementById('vid').pause()" style="margin:5px;" title="Pause"><i class='fa fa-pause my'></i></b>
			<b onclick="document.getElementById('vidd').style.width='100%';document.getElementById('viddm').style.width='100%'">Wideview</b>
			<b onclick="document.getElementById('vidd').style.width='66.6%';document.getElementById('viddm').style.width='33.4%';">Compactview</b>
	<button onclick='speed()' style='background-color:teal;color:white;border:0px;border-radius:100px;'>2x</button>
	<button onclick='speed2()' style='background-color:teal;color:white;border:0px;border-radius:100px;'>1.5x</button>
	<button onclick='normal()' style='background-color:teal;color:white;border:0px;border-radius:100px;'>Normal</button>
	<button onclick='slow()' style='background-color:teal;color:white;border:0px;border-radius:100px;'>0.5x</button>
<span class="badge" onclick="repeat()" style="cursor:pointer;background-color:black;color:white;">Repeat</span>
<?php
echo '<a href="Videos/'.$videos.'" download='.$videos.'><span class="badge" style="cursor:pointer;background-color:black;color:#3cc74e;"><i class="fa fa-download my"></i> Download</span></a> 
<b style="color:white">Views:'.$views.'</b>';
?>
		</div>
			<Br><br><br>

<?php
}
?>
<script>
vid=document.getElementById("vid");
function repeat(){
	vid.loop = "true";
}
function speed(){
	vid.playbackRate = 2;
}
function speed2(){
	vid.playbackRate = 1.5;
}

function slow(){
	vid.playbackRate=0.5;
}
function normal(){
	vid.playbackRate=1;
}
</script>
<br><br>
