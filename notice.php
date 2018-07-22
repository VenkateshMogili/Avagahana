<head>
    <style>
    #noticeview{filter:blur(0px);-webkit-animation:notice 1s 1;-moz-animation:notice 1s 1;animation:notice 1s 1;}
    @-webkit-keyframes notice{
        50%{-webkit-filter:blur(2px);}
    }
    @-moz-keyframes notice{
        50%{-webkit-filter:blur(2px);}
    }
    @keyframes notice{
        50%{-webkit-filter:blur(2px);}
    }
    p{color:black;font-size:18px;}
    .para{color:black;font-size:18px;text-indent:50px;}
    </style>
</head>
<?php
error_reporting(0);
require_once 'connect.php';
$id=mysql_real_escape_string(htmlentities(htmlspecialchars_decode($_GET['id'])));
$sql=mysqli_query($con,"SELECT * FROM notices where id='$id'");
while($r=mysqli_fetch_array($sql))
			{
				$id=$r['id'];
				$notice_title=$r['notice_title'];
				$notice=$r['notice_brief'];
				$sd=$r['sd'];
				$dates=$r['dates'];
				$time=$r['time'];
                $views=$r['views'];
                $views=$views+1;
			}
            mysqli_query($con,"UPDATE notices SET views='$views' where id='$id'");

	echo "<div style='padding:10px;color:white;' id='noticeview'>
    <h4 style='color:magenta;font-size:15px;'><i class='fa fa-clone'></i> ".$notice_title."<b style='float:right;font-size:10px;'><i class='fa fa-history my'></i>".$dates.":".$time."</b></h4><br>
    <div style='border:2px solid green;border-radius:10px;height:270px;overflow:auto;margin:10px;padding:10px;'><p style='text-indent:50px;color:black;'>".htmlspecialchars_decode($notice)."</p><br>
    <p>";
    $sq=mysqli_query($con,"SELECT * FROM files where id='$id'");
            while($rr=mysqli_fetch_array($sq))
            {
                $filename=$rr['file_name'];
                $type=$rr['f_type'];
                $downloads=$rr['downloads'];
   if($type=='mp3')
        {
        echo "
        <b style='color:black' class='btn btn-warning'><i class='fa fa-microphone'></i> Audio File (Listen Online):</b> <a href='Mp3/Music/".$filename."' target='_blank'>".$filename."</a><br><br>
		<a href='mp3/music/".$filename."' download class='btn btn-success'><i class='fa fa-download'></i> Click here Download</a>";
    }
    if($type=='mp4')
        {
        echo "<b style='color:black' class='btn btn-warning'><i class='fa fa-film'></i>  Video File (Watch Online):</b> <a href='Videos/".$filename."' target='_blank'>".$filename."</a><br><br>
		<a href='Videos/".$filename."' download class='btn btn-success'><i class='fa fa-download'></i> Click here to Download</a>";
    }
    if($type=='doc')
        {
        echo "<b style='color:black' class='btn btn-warning'><i class='fa fa-news-o'></i> Document File (Read Online):</b> <a href='Documents/".$filename."' target='_blank'>".$filename."</a><br><br>
		<a href='Documents/".$filename."' download class='btn btn-success'><i class='fa fa-download'></i> Click here to Download</a>";
    }
}
    echo "</p>
    </div>
    <p align='right' style='color:magenta'>Sd/-</p>
    <p align='right' style='color:magenta;'>".$sd."</p><br>
    <i class='fa fa-times-circle-o' id='closes' style='color:red;font-size:3em;cursor:pointer;' title='Close'>Close</i></div>";
?>
<script src="scripts.js" type="text/javascript"></script>