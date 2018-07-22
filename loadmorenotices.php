<?php
session_start();
error_reporting(0);
require_once 'connect.php';
if(isset($_POST['pages'])):
	$resultsPerPage=100;
	$paged=$_POST['pages'];
$sql="SELECT * FROM notices ORDER BY id DESC";
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
		$notice=$r['notice_title'];
		$notes=$r['notice_brief'];
		$sd=$r['sd'];
		$dates=$r['dates'];
		$time=$r['time'];
		$views=$r['views'];
		$id=$r['id'];
		$today=date('Y-m-d');
		echo '<tr>
		<td style="text-align:left;cursor:pointer" onclick="load_page(\'notices.php?id='.$id.'\')">>> '.$notice.'';
		if($dates==$today)
			{
				echo '<img src="images/new.gif">';
			}
			echo '</td>
		<td>'.$dates.'</td>
		<td>'.$time.'</td>
		<td>'.$views.'</td>
	</tr>';
}
	}
	?>
<?php
if($num_rows==$resultsPerPage){?>
<li class="loadbutton"><button class="loadmoreaudios" data-pages=<?php echo $paged+1;?>>Load More</button></li>
<?php
}
endif;
?>