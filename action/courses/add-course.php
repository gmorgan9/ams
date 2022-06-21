<?php 
include("../../path.php");
include("../../database/functions.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="../../assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="assets/img/bell-regular.svg"> -->

    <!-- Custom Styles -->
    <link rel="stylesheet" href="../../assets/css/style.css?v=2.2">

    <!-- Bootstrap Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add Course - AMS</title>
</head>
<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php //include(ROOT_PATH . "/includes/sidebar.php"); ?>


<div class="d-flex justify-content-center">
<form action="add-course.php" class="log-form" method="post">
<?php //include('errors.php'); ?>

<div class="form-header d-flex justify-content-center">
    <div class="bg-circle">
        <div class="sm-circle">
        <div class="d-flex justify-content-center">
        <i class="user-header fa-solid fa-book fa-3x"></i>
</div>
        </div>
    </div>
</div>
<br>
<h2 class="text-center">Add Course</h2>
    <br>


    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-25">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Course" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->

<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->
</div>

<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->
</div>

    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		    </div>
            <input name="name" class="form-control" placeholder="Enter Name" type="text">
        </div>
    </div> <!-- form-group// -->



  
    <div class="d-flex justify-content-center">                                
        <button type="submit" name="add_course" class="btn btn-primary text-center reg-log">Add Course</button>  
    </div> 
    <br>
    <p class="d-flex justify-content-center">
		<span>Change your mind? <a href="../../pages/courses.php">Back</a></span>
	</p>                                                              
</form>
    
</body>
</html>