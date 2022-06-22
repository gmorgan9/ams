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
    <style>
        .log-form {
            margin-top: -25px;
        }
        .back-btn {
        float: right; 
        margin-right: 10px; 
        margin-left: -70px; 
        color: #5C5B5B; 
        font-size: 12px; 
        text-decoration: none;
      }
      .back-btn:hover {
        color: #5C5B5B; 
        text-decoration: none;
      }
    </style>
</head>
<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php //include(ROOT_PATH . "/includes/sidebar.php"); ?>

<a class="back-btn me-3 me-lg-0"href="../../pages/courses.php"><i class="fas fa-arrow-left"></i> Back</a>
<div class="d-flex justify-content-center">
<form action="add-course.php" class="log-form" method="post">
<?php //include('errors.php'); ?>

<div class="form-header d-flex justify-content-center">
    <div class="bg-circle">
        <div class="sm-circle">
        <div class="d-flex justify-content-center">
        <i class="user-header fa-solid fa-clipboard fa-3x"></i>
</div>
        </div>
    </div>
</div>
<br>
<h2 class="text-center">Add Assignment</h2>


    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-heading"></i> </span>
		    </div>
            <input name="title" class="form-control" placeholder="Title" type="text">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
		    </div>
            <input name="due_date" class="form-control" placeholder="Date" type="date">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-clock"></i> </span>
		    </div>
            <input name="due_time" class="form-control" placeholder="Time" type="time">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-file"></i> </span>
		    </div>
            <input name="file_submit" class="form-control" placeholder="File Submission" type="file">
        </div>
    </div> <!-- form-group// -->
    <div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
		    </div>
            <input name="score" class="form-control" placeholder="Score" type="number">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
		    </div>
            <input name="possible_points" class="form-control" placeholder="Possible Points" type="number">
        </div>
    </div> <!-- form-group// -->
    </div>
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-percent"></i> </span>
		    </div>
            <input name="percent" class="form-control" placeholder="% of Grade" type="percent">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-group"></i> </span>
		    </div>
            <input name="assign_group" class="form-control" placeholder="Assignment Group" type="text">
        </div>
    </div> <!-- form-group// -->





  
    <div class="d-flex justify-content-center">                                
        <button type="submit" name="add_assignment" class="btn btn-primary text-center reg-log">Add Course</button>  
    </div>                                                             
</form>
    
</body>
</html>