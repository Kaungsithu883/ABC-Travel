<?php ob_start();
session_start(); ?><html>
<head>
<title> Travel Home</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="css/style.css">-->
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
<!-- login vali-->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $uname= $_POST["user_name"];
    $pw=$_POST["password"];
 
    echo "Username is".$uname;
    echo "password is".$pw;
 
    include("connect.php");
 
    $result = mysqli_query($con,"Select * from user where userName='$uname' and password='$pw'");
    $rowcount=mysqli_num_rows($result);
	echo "result is".$rowcount;
	
	if($rowcount>0){
		
		while($row=mysqli_fetch_array($result)){
			$db_user_id=$row["userid"];
			$db_user_name=$row["userName"];
			$db_role_id=$row["role_id"];
		}
		$_SESSION["login_user_name"]=$db_user_name;
		$_SESSION["login_user_role"]=$db_role_id;
		$_SESSION["login_user_id"]=$db_user_id;
		
		
		header("location:index.php");
		
		
	}else{
		header("location:login.php");
	}
	
	
 }
 ?>

<!--loginform-->
<div class="col-md-6">
<form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="user_name" class="form-control" placeholder="Enter name" required="true">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" required="true">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
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