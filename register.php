<?php ob_start();
session_start(); ?><html>
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

$password_error="";
$email_error="";

$username=$password=$confirm_password=$email=$mobile=$address="";

if ($_SERVER['REQUEST_METHOD']=="POST"){
	
	$username=$_POST["user_name"];
	$password=$_POST["password"];
	$confirm_password=$_POST["confirm_password"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$address=$_POST["address"];
	
	
	if($password!=$confirm_password){
		$password_error="password didn't match.";
	}
	
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$email_error="insert valid email.";
	}
	
	if(($password_error=="") AND ($email_error==""))
	{
		include("connect.php");
		
		$insert_query=mysqli_query($con,"INSERT INTO user(userName,password,email,mobile,address,role_id)
		   VALUE ('$username','$password','$email','$mobile','$address',2)");
		   
		   if(!$insert_query)
		   {
			   echo mysqli_error($con);
		   } else{
			   echo "<div class='alert alert-success' role='alert'>Your 
			   Registeration is successful, you can login now.</div>";
			   $username=$password=$confirm_password=$email=$mobile=$address="";
			   
			   header("Refresh:5;url=login.php");
			   
		   }
	}
}

?>
<div class="col col-md-6">
<h2> Sign up</h2>
<br/>
<form action="register.php" method="post">
<div class="form-group">
 <label>User Name</label>
 <input type="text" name="user_name" class="form-control" placeholder="Enter your name"
 required="true" value="<?php echo $username;?>">
</div>

<div class="form-group">
<label>password</label>
<input type="password" name="password" class="form-control" placeholder="enter password"
required="true" value="<?php echo $password;?>"/>
<span class="error">* <?php echo $password_error;?></span>
</div>

<div class="form-group">
<label>confirm_password</label>
<input type="password" name="confirm_password" class="form-control" placeholder="re-enter password"
required="true" value="<?php echo $confirm_password;?>"/>
</div>

<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control" placeholder="enter email"
required="true" value="<?php echo $email;?>"/>
<span class="error">* <?php echo $email_error;?></span>
</div>

<div class="form-group">
<label>Mobile</label>
<input type="text" name="mobile" class="form-control" placeholder="enter phone number"
required="true" value="<?php echo $mobile;?>"/>
</div>

<div class="form-group">
<label>Address</label>
<textarea class="form-control" placeholder="Enter your address" 
required="true" name="address"><?php echo $address;?></textarea>
</div>

<button type="submit" class="btn btn-primary">Sign Up</button>
<button type="reset" class="btn btn-primary">Reset</button>
</form>
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