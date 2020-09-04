<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
  <img src="images/logo.jpeg" style="width:50px;height:50px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Travel Places
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Yangon</a>
          <a class="dropdown-item" href="#">Mandalay</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Pyin OO Lwin</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact </a>
      </li>
	    <div class="row">
  <div class="col-md-12 login_info">
   <?php
   
  if(isset($_SESSION["login_user_name"])){
      
	  echo "<b><i><span>".$_SESSION["login_user_name"]."</span></i></b>";
	  
	  echo " <a href='logout.php'><span>Logout &nbsp;| &nbsp;</span></a>";
  }
  ?> 
  </div>
  </div>
	  <?php
	        if(!isset($_SESSION["login_user_name"])){
	  ?>
	  <li class="nav-item">
        <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">login </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="true">signup </a>
      </li>
	  <?php } ?>
	 
    </ul>
    <form action="search.php" method="post"
	class="form-inline my-2 my-lg-0">
	
	<?php 
	if(isset($_POST["search_data"]))
	{
		$search_value=$_POST["search_data"];
	}else{
		$search_value="";
	}
	?>
	<input type="search" name="search_data" class="form-control mr-sm-2"
	placeholder="Search" aria-label="Search" value="<?php echo $search_value;?>">
	
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">
	Search</button>
	</form>
  </div>
  </nav>
