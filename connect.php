<?php
//create a connection
$con=mysqli_connect("localhost","root","root");

//check the connection
if(!$con){
Die("Could not connect" .mysqli_connect_error());
}else{
	
	//select database
	mysqli_select_db($con,"db_travel");
	
	//echo "connection successful";
	
}

?>
