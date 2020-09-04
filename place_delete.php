<?php 

include("connect.php");

$pid=$_GET["p_id"];

echo "Pid is".$pid;

$delete_query=mysqli_query($con,"Delete From travelplaces where placeId=$pid");

if(!$delete_query)
{
	echo mysqli_error($con);
}
else{
	echo "1 record deleted";
	header("location:index.php");
}


?>