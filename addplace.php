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
<h2> Add New Places</h2>
<form action="addplace_process.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Place Photo</label>
    <input type="file" name="photo" id="photo" class="form-control"  required="true">
    
  </div>
  <div class="form-group">
    <label >Region</label>
   <select name="region" class="form-control">
   <option selected>None</option>
   <option value=1>Yangon</option>
   <option value=2>Mandalay</option>
   <option value=3>Maymyo</option>
   <option value=4>Taunggyi</option>
    <option value=5>Mawlamyine</option>
	<option value=6>Mindat</option>
	
   </select>
  </div>
  <div class="form-group">
    <label >Title</label>
    <input type="text" name="title" class="form-control" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea name="desp" class="form-control"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Add</button>
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