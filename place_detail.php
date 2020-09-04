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
<?php 
include("connect.php");

$pid=$_GET["p_id"];

$result=mysqli_query($con,"Select * from travelplaces join region 
where travelplaces.regionID=region.regionID and travelplaces.placeID=$pid");

while($row=mysqli_fetch_array($result)){
	  $photo=$row['photo'];
	   $title=$row['title'];
	    $region=$row['regionID'];
		 $sname=$row['state_name'];
		  $desp=$row['description'];
		   $cdate=$row['createdDate'];

?>




<div class="jumbotron">
<div class="container">

<h1> <?php echo $title;?></h1>
<p> <i><b> Uploaded on: <?php echo $cdate;?></b></i></p>
<p><label> Region: </label><span><?php echo $sname;?></span></p>
<img src="images/<?php echo $photo;?>" width="600px">
<p class="lead"> <?php echo $desp;?></p>
</div>
</div>
<?php } ?>


<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){
	
	$comment=$_POST["comment"];
	$userid=$_SESSION["login_user_id"];
	
	include("connect.php");
	
	$insert_query=mysqli_query($con,"insert into comment(comment,user_id,place_id)
	    values ('$comment',$userid,$pid)");
		
		if(!$insert_query)
		{
			echo mysqli_error($con);
		} else{
			//echo "1 comment inserted";
		}
}

?>

<?php

$all_comments=mysqli_query($con,"SELECT * FROM comment join user where comment.user_id=user.userid and comment.place_id=$pid order by commentId desc");
	
	if (!$all_comments) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
	while($row=mysqli_fetch_array($all_comments)){
		
		$u_name=$row["userName"];
		$u_comment=$row["comment"];
		$u_c_date=$row["commentedDate"];
		
		?>
		
		<div class="col col-md-8 media">
		<img src="images/img_avatar1.png" class="rounded-circle" style="width:60px"/>
		<div class="media-body" style="padding-left:20px;">
		
		<b> <?php echo $u_name;?> </b>
		<?php echo $u_comment;?>
		
		<br/>
		<span style="color:#aaa;font-size:12px;">commented on <?php echo $u_c_date;?></span>
		</div>
		</div>
		
		
	<?php } ?>



<?php  if(isset($_SESSION["login_user_name"])){?>
<div class="col col-md-8 media">
<img src="images/img_avatar1.png" class="mr-3" style="width:60px"/>
<div class="media-body">
<h5 class="mt-0"><?php echo $_SESSION["login_user_name"];?></h5>
<form action="" method="post">

<div class="form-group">
<!--<textarea name="comment" class="form-control"></textarea>-->
<input type="text" name="comment" class="form-control" placeholder="
write a comment" required="true" style="border-radius: 20px;">
</div>

</form>
</div>
</div>

<?php } ?>

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