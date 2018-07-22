<?php
error_reporting(0);
?>
<div class="col-md-12" id='c'>
	<?php
	require_once 'connect.php';
	$id=strip_tags(htmlspecialchars(addslashes(strtoupper($_GET['id']))));
	$id=mysql_real_escape_string($id);
	$sql=mysqli_query($con,"SELECT * FROM files where id='$id'");
	while($r=mysqli_fetch_array($sql))
	{
		$file=$r['file_name'];
	}
	?>
    <button style="float:right;background-color:red;color:white;padding:10px;border:0px;border-radius:100px;width:50px;height:50px;" id='cls'>X</button>
<?php
echo '<object data="Documents/'.$file.'" style="width:100%;height:510px;"></object>';
?>
</div>
<script>
 $(document).ready(function(){
        $("#cls").click(function(){
            $("#vbcontent").show();
            $("#c").slideUp("slow");
            $("#c").load('documents.php');
            $("#c").slideDown("slow");
        });
    });
</script>