<?php
error_reporting(0);
?>
<div class="col-md-12" id="maingallery">
<center><h2 style="color:magenta;font-family:georgia">Photo Gallery</h2></center>
<div class="col-md-4">
	<h3 id="launch" style="border:2px solid magenta;cursor:pointer;color:#3cc74e;background-color:white;height:100px;text-align:center;font-family:georgia">Avagahana Launching<br>(14-11-2016)</h3>
</div>
<div class="col-md-4">
</div>
<div class="col-md-4">
</div>
</div>
<script>
$(document).ready(function(){
	$("#launch").click(function(){
		$(this).fadeOut("slow");
		$("#maingallery").load('launch.php');
		});
		});
</script>
