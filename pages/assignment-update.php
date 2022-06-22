<?php 
include("../path.php");
include("../database/functions.php");
session_start();


// Define variables and initialize with empty values
$title = "";
$title_err = "";

// Processing form data when form is submitted
if(isset($_POST["update_course"])){
 // Get hidden input value
 $id = $_POST["uid"];
 //$status = isset($_POST['status']) ? 1 : 0;
 
 // Validate address address
 $input_title = trim($_POST["title"]);
 if(empty($input_title)){
     $title_err = "Please enter a title.";     
 } else{
     $title = $input_title;
 }
 
 
 // Check input errors before inserting in database
 if(empty($title_err)){
     // Prepare an update statement
     $sql = "UPDATE assignments SET title=? WHERE id=?";
      
     if($stmt = mysqli_prepare($conn, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "si", $param_title, $param_id);
         
         // Set parameters
         $param_title = $title;
         $param_id = $id;
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             // Records updated successfully. Redirect to landing page
             header("location: /");
             exit();
         } else{
             echo "Oops! Something went wrong. Please try again later.";
         }
     }
      
     // Close statement
     mysqli_stmt_close($stmt);
 }
 
 // Close connection
 mysqli_close($conn);
} else{
 // Check existence of id parameter before processing further
 if(isset($_GET["uid"]) && !empty(trim($_GET["uid"]))){
     // Get URL parameter
     $id =  trim($_GET["uid"]);
     
     // Prepare a select statement
     $sql = "SELECT * FROM assignments WHERE id = ?";
     if($stmt = mysqli_prepare($conn, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "i", $param_id);
         
         // Set parameters
         $param_id = $id;
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             $result = mysqli_stmt_get_result($stmt);
 
             if(mysqli_num_rows($result) == 1){
                 /* Fetch result row as an associative array. Since the result set
                 contains only one row, we don't need to use while loop */
                 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                 
                 // Retrieve individual field value
                 $title = $row['title'];
                 $due_date = $row['due_date'];
                 $due_time = $row['due_time'];
                 $score = $row['score'];
                 $possible_points = $row['possible_points'];
                 $percent = $row['percent'];
                 $assign_group = $row['assign_group'];
                 $course_title = $row['course_title'];
             } else{
                 // URL doesn't contain valid id. Redirect to error page
                 header("location: die-page.php");
                 exit();
             }
             
         } else{
             echo "Oops! Something went wrong. Please try again later.";
         }
     }
     
     // Close statement
     mysqli_stmt_close($stmt);
     
     // Close connection
     mysqli_close($conn);
 }  else{
     // URL doesn't contain id parameter. Redirect to error page
     header("location: die-page2.php");
     exit();
 }
}




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
<form action="add-assignment.php" class="log-form" method="post">
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
            <input name="title" class="form-control" placeholder="Title" type="text" value="<?php echo $title; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
		    </div>
            <input name="due_date" class="form-control" placeholder="Date" type="date" value="<?php echo $date; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-clock"></i> </span>
		    </div>
            <input name="due_time" class="form-control" placeholder="Time" type="time" value="<?php echo $time; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
		    </div>
            <input name="score" class="form-control" placeholder="Score" type="number" value="<?php echo $score; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
		    </div>
            <input name="possible_points" class="form-control" placeholder="Possible Points" type="number" value="<?php echo $possible_points; ?>">
        </div>
    </div> <!-- form-group// -->
    </div>
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-percent"></i> </span>
		    </div>
            <input name="percent" class="form-control" placeholder="% of Grade" type="percent" value="<?php echo $percent; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user-group"></i> </span>
		    </div>
            <input name="assign_group" class="form-control" placeholder="Assignment Group" type="text" value="<?php echo $assign_group; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user-group"></i> </span>
		    </div>
            <?php 
                $aid = $_GET['uid'];
            ?>
            <input name="course_id" class="form-control" placeholder="Course ID" type="text" value="<?php echo $aid; ?>" readonly>
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user-group"></i> </span>
		    </div>
            <?php 
                $sql = "SELECT * FROM assignments where id=$aid";
                $result = mysqli_query($conn, $sql);
                if($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $title=$row['title'];
                      ?>
            <input name="course_title" class="form-control" placeholder="Course ID" type="text" value="<?php echo $title; ?>" readonly>
        </div>
    </div> <!-- form-group// -->
    <?php }
                }
          
          ?>




  
    <div class="d-flex justify-content-center">                                
        <button type="submit" name="add_assignment" class="btn btn-primary text-center reg-log">Add Course</button>  
    </div>                                                             
</form>
    
</body>
</html>