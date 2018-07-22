<?php
session_start();
error_reporting(0);
require_once '../connect.php';
$category=mysql_real_escape_string($_GET['v']);
if(isset($_POST['pages'])):
	$resultsPerPage=10;
	$paged=$_POST['pages'];
$sql="SELECT * FROM music where category='$category' ORDER BY id ASC";
if($paged>0){
	$page_limit=$resultsPerPage*($paged-1);
	$pagination_sql=" LIMIT $page_limit, $resultsPerPage";
}
else{
	$pagination_sql=" LIMIT 0, $resultsPerPage";
}
$result=mysqli_query($con,$sql.$pagination_sql);
$num_rows=mysqli_num_rows($result);
if($num_rows>0)
{
	while($r=mysqli_fetch_array($result))
	{
		$song=$r['song'];
		$views=$r['views'];
		$id=$r['id'];
		$cat=$r['category'];
	echo "<li class='list-group-item' onclick='load_pagg(\"play.php?song=".$song."\")'>".$song." <a href='Music/".$song.".mp3' download='".$song."@avagahana.mp3' style='float:right;'><i class='fa fa-users my' style='color:green;font-size:1em;'>".$views."</i> <i class='fa fa-download mym'></i></a>";
	if(isset($_SESSION['stuid']))
{
	$stu=$_SESSION['stuid'];
	$check=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM students where stuid='$stu' and category='admin'"));
	echo "<a href='../del_link.php?cat=music&&link=".$id."' style='margin:10px;border:1px solid red;padding:5px;border-radius:100px'>X</a>";
}
echo "</li>";
}
}
?>
<?php
if($num_rows==$resultsPerPage){?>
<li class="loadbutton"><button class="loadmoreaudios" data-page=<?php echo $paged+1;?>>Load More</button></li>
<?php
}
endif;
?>