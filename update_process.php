<?php

$pid=$_POST["h_pid"];
$region=$_POST["region"];
$title=$_POST["title"];
$desp=$_POST["desp"];
$photo_name=$_FILES["photo"]["name"];

echo "Pid is".$pid."<br/>";
echo "Region is".$region."<br/>";
echo "Title is".$title."<br/>";
echo "Desp is".$desp."<br/>";
echo "Photo is".$photo_name."<br/>";

include("connect.php");

if($photo_name!=null){
	
	$photo_size=$_FILES["photo"]["size"];
	$photo_type=$_FILES["photo"]["type"];
	$photo_temp_name=$_FILES["photo"]["temp_name"];
	
	$target_dir = "images/";
	$target_file = $target_dir . basename($photo_name);
	
	if ( $photo_size > 500000) {
		echo "sry, file is too massive.";
	}
	else if ( $photo_type != "images/jpeg") {
		echo "sry, only jpg allowed";
	}
	
	else{
		
		$upload=move_uploaded_file($photo_temp_name, $target_file);
		
		if($upload){
			echo "File has been uploaded.";
		} else {
			echo "sry, there's an error uploading ya file.";
		}
	}
	
	$update_query=mysqli_query($con,"UPDATE travelplaces SET photo='$photo_name',
	    title='$title',description='$desp',regionID=$region WHERE placeId=$pid");
		
		
}else{
	
	$update_query=mysqli_query($con,"UPDATE travelplaces SET title='$title',
	    description='$desp',regionID=$region WHERE placeId=$pid");
}


if(!$update_query)
{
	echo mysqli_error($con);
	
}else{
	echo "successfully updated!";
	header("location:index.php");
}






?>