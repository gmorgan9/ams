<?php 
include("../path.php");
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ". BASE_URL . "/action/login.php");
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="../assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="assets/img/bell-regular.svg"> -->

    <!-- Custom Styles -->
    <link rel="stylesheet" href="../assets/css/style.css?v=2.2">

    <!-- Bootstrap Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Profile - AMS</title>

    <style>
        .main {
            margin-left: 0;
        }
    </style>
</head>
<body>
<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php //include(ROOT_PATH . "/includes/sidebar.php"); ?>


<div class="d-flex justify-content-center">
<form action="edit-profile.php" class="log-form" method="post">
<?php //include('errors.php'); ?>

<div class="form-header d-flex justify-content-center">
    <div class="bg-circle">
        <div class="sm-circle">
        <div class="d-flex justify-content-center">
        <i class="user-header fa-solid fa-user fa-3x"></i>
</div>
        </div>
    </div>
</div>
<br>
<h2 class="text-center">Registration</h2>
    <br>

    <div class="d-flex justify-content-center">
    <div class="form-group input-group w-75">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Enter Name" type="text" value="<?php echo $_SESSION['name']; ?>">
</div>
    </div> <!-- form-group// -->
    
    <div class="d-flex justify-content-center">
    <div class="form-group input-group w-75">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-at"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="User Name" type="text" value="<?php echo $_SESSION['username']; ?>">
</div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
    <div class="form-group input-group w-75">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Enter password" type="password" id="password" value="<?php echo $SESSION['password']; ?>">
        </div>
    </div> 
    <div class="d-flex justify-content-center">
    <div class="form-group input-group w-75">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input name="confpassword" class="form-control" placeholder="Confirm Password" type="password" id="confpassword">
    </div>
    </div> <!-- form-group// -->

    <input style="margin-left: 65px;" type="checkbox" onclick="myFunction()"> Show Password<!-- form-group// -->   
    <div class="d-flex justify-content-center">                                
    <button type="submit" name="update_user" class="btn btn-primary text-center reg-log">Update</button>  
</div>   
<br>
    <p class="d-flex justify-content-center">
		<span>Already a member? <a href="login.php">Login</a></span>
	</p>                                                              
</form>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var x = document.getElementById("confpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    
</body>
</html>


