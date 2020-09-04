<?php session_start();?>
<html>
<head>
<title> Travel Home</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<style type="text/css">
.row{
	padding:10px;
}
</style>
<body>
<div class="container">

<div class="row">
<div class="col-md-12">
<?php include("header.php");?>
</div>
</div>

<div class="row">
<div class="col-md-12">
<?php include("carousel.php");?>
</div>
</div>

<div class="row">
<div class="col-md-2">
<?php include("left_content.php");?>
</div>

<div class="col-md-10">
<div class="list-group">
<?php 
$search_value=$_POST["search_data"];

include("connect.php");

$result=mysqli_query($con,"Select * from travelplaces where title like '%$search_value%'");

$rowcount=mysqli_num_rows($result);

if($rowcount>0){
	
	echo "<div class='alert alert-success' role='alert'>
	        About $rowcount results!
		   </div>";
		   
		   while($row=mysqli_fetch_array($result)){
			   $pid=$row["placeId"];
			   $title=$row['title'];
			   $cdate=$row['createdDate'];

?>
<div class="list-group-item list-group-item-action">
<div class="d-flex w-100 justify-content-between">

<h5 class="mb-1">

<a href="place_detail.php?p_id=<?php echo $pid;?>">
<?php echo $title;?>
</a>
</h5>

<small><?php echo $cdate;?></small>
</div>
</div>

		   <?php }
}else{
	echo "<div class='alert alert-danger' role='alert'>
	       There's no data to display!
		   </div>";
}
		   ?>
</div>


</div>

</div>
<div class="row">
<div class= "col-md-12">
<!--<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Developed by K.sithu@</p>-->
  <?php include("footer.php");?>
</div>
</div>
</div>
</div>
</body>
</html>