<ul class="list-group">
<?php 
//connect to database

include("connect.php");

//fetch data from database

$result=mysqli_query($con,"select count(region.regionID) As regionCount,region.state_name,region.regionID from 
region JOIN travelplaces WHERE region.regionID=travelplaces.regionID Group By 
region.regionID;");

while($row = mysqli_fetch_array($result)){
	?>
	
	<li class="list-group-item d-flex justify-content-between align-items-center">
    
	<?php
	$r_id=$row['regionID'];
	?>
	
	<a href="region_contents.php?rid=<?php echo $r_id;?>"><?php echo $row['state_name']; ?></a>
	<span class="badge badge-primary badge-pill"><?php echo $row['regionCount'];?></span>
	</li>
	<?php 
}
?>
  
 
</ul>