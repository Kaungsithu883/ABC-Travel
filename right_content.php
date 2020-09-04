<div class="col col-md-12">

<?php if((isset($_SESSION["login_user_name"]))AND($_SESSION["login_user_role"]==1)){?>
<a href="addplace.php">
<i class="fas fa-plus">Add Places</i>
</a>

<?php } ?>

<div class="card-group">
<?php 
//connect to database
include("connect.php");

//To reterive data from data by using LIMIT
	$page = (int) (!isset($_GET["page"])?1:$_GET["page"]);
	$limit=3;
	$startpoint=($page * $limit) - $limit;;
	
	//To call pager_function
	$statement="travelplaces order by placeID desc";
	include("pager_function.php");

//fetch data from database
$result=mysqli_query($con,"Select * from travelplaces order by placeID desc LIMIT $startpoint,$limit");
?> 

<?php
while($row = mysqli_fetch_array($result)){
	$pid=$row["placeId"];
	$photo=$row['photo'];
	$title=$row['title'];
	$desp=$row['description'];
	$cdate=$row['createdDate'];
	?>
	<div class="col-md-4">
	<?php if((isset($_SESSION["login_user_name"]))AND($_SESSION["login_user_role"]==1)){?>
	<div class="row">
	<a href="place_update.php?p_id=<?php echo $pid;?>">
	<span><i class="fa fa-edit" aria-hidden="true"></i></span>
	</a>
	&nbsp;&nbsp;
	
	<a href="place_delete.php?p_id=<?php echo $pid;?>" onclick="return confirm('Are u sure u want to delete this?')">
	<span><i class="fa fa-trash" aria-hidden="true"></i></span>
	</a>
	</div>
	
	<?php } ?>

<div class="card">
  
   <img src="images/<?php echo $photo;?>" class="card-img-top" alt="..." width="200px" height="200px">
   <div class="card-body">
   <h5 class="card-title"><?php echo $title;?></h5>
   <p class="card-text">
   <a href="place_detail.php?p_id=<?php echo $pid;?>"> read more </a>
   </p>
   <p class="card-text"><small class="text-muted"><?php echo $cdate;?></small></p>
   </div>
</div>

</div>
 <?php 
	
}

?>

</div>
</div>
<br>

<?php
//to show pager no
echo "<div id='pagingg'>";
echo pagination($con,$statement,$limit,$page);
echo "</div>";
?>