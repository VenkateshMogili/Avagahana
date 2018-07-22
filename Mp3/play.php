<?php
session_start();
error_reporting(0);
require_once '../connect.php';
$stuid=$_SESSION['stuid'];
$songs=mysql_real_escape_string($_GET['song']);
$ip=$_SERVER['REMOTE_ADDR'];
$sql=mysql_query("SELECT * FROM music where song='$songs'");
while($r=mysql_fetch_array($sql))
{
	$views=$r['views'];
	$views=$views+1;
}
mysql_query("UPDATE music SET views='$views' where song='$songs' ");
$so=mysql_query("SELECT * FROM students where stuid='$stuid' ");
while($ro=mysql_fetch_array($so))
{
	$username=$ro['s_name'];
}
mysql_query("INSERT INTO musicvisitors (login_by,username,ip,time,song) VALUES('$stuid','$username','$ip',NOW(),'$song')");
?>
<div id="status"></div>
<div class="col-md-6"><audio src=<?php echo "Music/".$song;?> type="audio/mp3" autoplay="true" controls id="song" style="margin:10px;"></audio></div>
<div class="col-md-6"><i class="fa fa-repeat mym" onclick="document.getElementById('song').loop='true'" style="float:right;margin:10px;cursor:pointer;" title="Click here to Repeat Mode On"></i>
<i class="fa fa-play mym" onclick="document.getElementById('song').play()" style="float:right;margin:10px;cursor:pointer;display:none" id="play" accesskey="p"></i>
<i class="fa fa-pause mym" onclick="document.getElementById('song').pause()" style="float:right;margin:10px;cursor:pointer;" id="pause" accesskey="o"></i>
</div>
<script src="../js/jquery.js"></script>
<script src="../js/mp3script.js"></script>