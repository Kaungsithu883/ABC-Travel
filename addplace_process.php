<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
	$photo_name=$_FILES["photo"]["name"];
	$photo_size=$_FILES["photo"]["size"];
	$photo_type=$_FILES["photo"]["type"];
	$photo_temp_name=$_FILES["photo"]["tmp_name"];
	
	$title=$_POST["title"];
	$region=$_POST["region"];
	$desc=$_POST["desp"];
	
	echo $photo_name."<br>";
	echo $title."<br>";
	echo $region."<br>";
	echo $desc."<br>";
	
	$target_dir = "images/";
	$target_file = $target_dir . basename($photo_name);
	
	if ($photo_size > 500000) {
    echo "Sorry, your file is too large.";   
}
else if($photo_type != "image/jpg"){
	echo "Only JPG types are allowed.";
}
else{
	$upload=move_uploaded_file($photo_temp_name, $target_file);
	
	if($upload){
		echo "File has been uploaded.";
	} else {
		echo "There's an error uploading ya file.";
	}
		
		
	}
	
	
	//connect with db
	include("connect.php");
	
	//check un and pw
	$insert_query = mysqli_query($con,"insert into travelplaces(photo,title,description,regionID) values ('$photo_name','$title','$desc',$region)");
	   
	   if(!$insert_query)
	   {
		   echo mysqli_error($con);
	   }else{
		   echo "1 recorded inserted";
		   header("location:index.php");
	   }
	   
}	
?>