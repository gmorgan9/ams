<?php 
include("../../path.php");
include("../../database/functions.php");
session_start();
?>

<?php


// Define variables and initialize with empty values
$course = "";
$course_err = "";

// Processing form data when form is submitted
if(isset($_POST["update_course"])){
 // Get hidden input value
 $cid = $_POST["course_id"];
 //$status = isset($_POST['status']) ? 1 : 0;
 
 // Validate address address
 $input_course = trim($_POST["course"]);
 if(empty($input_course)){
     $course_err = "Please enter a course.";     
 } else{
     $course = $input_course;
 }
 
 
 // Check input errors before inserting in database
 if(empty($course_err)){
     // Prepare an update statement
     $sql = "UPDATE course SET course=? WHERE course_id=?";
      
     if($stmt = mysqli_prepare($conn, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "si", $param_course, $param_id);
         
         // Set parameters
         $param_course = $course;
         $param_id = $cid;
         
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
 if(isset($_GET["cid"]) && !empty(trim($_GET["cid"]))){
     // Get URL parameter
     $cid =  trim($_GET['cid']);
     
     // Prepare a select statement
     $sql = "SELECT * FROM course WHERE course_id = ?";
     if($stmt = mysqli_prepare($conn, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "i", $param_id);
         
         // Set parameters
         $param_id = $cid;
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             $result = mysqli_stmt_get_result($stmt);
 
             if(mysqli_num_rows($result) == 1){
                 /* Fetch result row as an associative array. Since the result set
                 contains only one row, we don't need to use while loop */
                 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                 
                 // Retrieve individual field value
                 $course = $row['course'];
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














   <!-- // Define variables and initialize with empty values
   $course = $title = $taken = $day = $time = $location = $section = $instructor = $credits = $mode = "";

   $course_err = $title_err = $taken_err = $day_err = $time_err = $location_err = $section_err = $instructor_err = $credits_err = $mode_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["update_course"])){
    // Get hidden input value
    $course_id = $_POST["course_id"];
    //$status = isset($_POST['status']) ? 1 : 0;
    
    // Validate course address
    $input_course = trim($_POST["course"]);
    if(empty($input_course)){
        $course_err = "Please enter a course.";     
    } else{
        $course = $input_course;
    }

    // Validate address address
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Please enter a title.";     
    } else{
        $title = $input_title;
    }

    // Validate address address
    $input_taken = trim($_POST["taken"]);
    if(empty($input_taken)){
        $taken_err = "Please enter when course will be taken.";     
    } else{
        $taken = $input_taken;
    }

    // Validate address address
    $input_day = trim($_POST["day"]);
    if(empty($input_day)){
        $day_err = "Please enter a course days.";     
    } else{
        $day = $input_day;
    }

    // Validate Time
    $input_time = trim($_POST["time"]);
    if(empty($input_time)){
        $time_err = "Please enter a time.";     
    } else{
        $time = $input_time;
    }

    // Validate address address
    // $input_lab_day = trim($_POST["lab_day"]);
    // if(empty($input_lab_day)){
    //     $lab_day_err = "Please enter a lab day.";     
    // } else{
    //     $lab_day = $input_lab_day;
    // }

    // Validate address address
    // $input_lab_time = trim($_POST["lab_time"]);
    // if(empty($input_lab_time)){
    //     $lab_time_err = "Please enter a lab time.";     
    // } else{
    //     $lab_time = $input_lab_time;
    // }

    // Validate address address
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter a location.";     
    } else{
        $location = $input_location;
    }

    // Validate course address
    // $input_lab_location = trim($_POST["lab_location"]);
    // if(empty($input_lab_location)){
    //     $lab_location_err = "Please enter a lab location.";     
    // } else{
    //     $lab_location = $input_lab_location;
    // }

    // Validate address address
    $input_section = trim($_POST["section"]);
    if(empty($input_section)){
        $section_err = "Please enter a section.";     
    } else{
        $section = $input_section;
    }

    // Validate address address
    $input_instructor = trim($_POST["instructor"]);
    if(empty($input_instructor)){
        $instructor_err = "Please enter an instructor.";     
    } else{
        $instructor = $input_instructor;
    }

    // Validate address address
    $input_credits = trim($_POST["credits"]);
    if(empty($input_credits)){
        $day_err = "Please enter credits.";     
    } else{
        $credits = $input_credits;
    }

    // Validate address address
    $input_mode = trim($_POST["mode"]);
    if(empty($input_mode)){
        $mode_err = "Please enter a mode.";     
    } else{
        $mode = $input_mode;
    }
    
    
    // Check input errors before inserting in database
    if(empty($course_err) && empty($title_err) && empty($taken_err) && empty($day_err) && empty($time_err) && empty($location_err) && empty($section_err) && empty($instructor_err) && empty($credits_err) && empty($mode_err)){
        // Prepare an update statement
        $sql = "UPDATE course SET course=?, title=?, taken=?, section=?, day=?, time=?, lab_day=?, lab_time=?, location=?, lab_location=?, mode=?, instructor=?, credits=? WHERE course_id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_course, $param_title, $param_taken, $param_day, $param_time, $param_lab_day, $param_lab_time, $param_location, $param_lab_location, $param_section, $param_instructor, $param_credits, $param_mode, $param_course_id);
            
            // Set parameters
            $param_course = $course;
            $param_title = $title;
            $param_taken = $taken;
            $param_day = $day;
            $param_time = $time;
            $param_lab_day = $lab_day;
            $param_lab_time = $lab_time;
            $param_location = $location;
            $param_lab_location = $lab_location;
            $param_section = $section;
            $param_instructor = $instructor;
            $param_credits = $credits;
            $param_mode = $mode;
            $param_course_id = $course_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header('location: '. BASE_URL .'/pages/courses.php');
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
    if(isset($_GET["cid"]) && !empty(trim($_GET["cid"]))){
        // Get URL parameter
        $id =  trim($_GET["cid"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM course WHERE course_id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_course_id);
            
            // Set parameters
            $param_course_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $course = $row['course'];
                    $title = $row['title'];
                    $taken = $row['taken'];
                    $day = $row['day'];
                    $time = $row['time'];
                    $lab_day = $row['lab_day'];
                    $lab_time = $row['lab_time'];
                    $location = $row['location'];
                    $lab_location = $row['lab_location'];
                    $section = $row['section'];
                    $instructor = $row['instructor'];
                    $credits = $row['credits'];
                    $mode = $row['mode'];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ". BASE_URL ."/die-page.php");
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
        header("location: ". BASE_URL ."/die-page1.php");
        exit();
    }
}


?> -->


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
<form action="update-course.php" class="log-form" method="post">
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


    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-50">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-book"></i> </span>
		    </div>
            <input name="course" class="form-control" placeholder="Course" type="text" value="<?php echo $course; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-heading"></i> </span>
		    </div>
            <input name="title" class="form-control" placeholder="Title" type="text" value="<?php echo $title; ?>">
        </div>
    </div> <!-- form-group// -->

<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-calendar-check"></i> </span>
		    </div>
            <input name="taken" class="form-control" placeholder="Taken" type="text" value="<?php echo $taken; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-list-ul"></i> </span>
		    </div>
            <input name="section" class="form-control" placeholder="Section" type="text" value="<?php echo $section; ?>">
        </div>
    </div> <!-- form-group// -->
</div>

<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-calendar-days"></i> </span>
		    </div>
            <input name="day" class="form-control" placeholder="Days" type="text" value="<?php echo $day; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-clock"></i> </span>
		    </div>
            <input name="time" class="form-control" placeholder="Time" type="text" value="<?php echo $time; ?>">
        </div>
    </div> <!-- form-group// -->
</div>

<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-calendar-days"></i> </span>
		    </div>
            <input name="lab_day" class="form-control" placeholder="Lab Days" type="text" value="<?php echo $lab_day; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-clock"></i> </span>
		    </div>
            <input name="lab_time" class="form-control" placeholder="Lab Time" type="text" value="<?php echo $lab_time; ?>">
        </div>
    </div> <!-- form-group// -->
</div>

<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-location-dot"></i> </span>
		    </div>
            <input name="location" class="form-control" placeholder="Location" type="text" value="<?php echo $location; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-location-dot"></i> </span>
		    </div>
            <input name="lab_location" class="form-control" placeholder="Lab Location" type="text" value="<?php echo $lab_location; ?>">
        </div>
    </div> <!-- form-group// -->
</div>

<div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-user-tie"></i> </span>
		    </div>
            <input name="instructor" class="form-control" placeholder="Instructor" type="text" value="<?php echo $instructor; ?>">
        </div>
    </div> <!-- form-group// -->

<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-arrow-up-9-1"></i> </span>
		    </div>
            <input name="credits" class="form-control" placeholder="Credits" type="text"value="<?php echo $credits; ?>">
        </div>
    </div> <!-- form-group// -->
    <div class="d-flex justify-content-center">
        <div class="form-group input-group w-75">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-compress"></i> </span>
		    </div>
            <input name="mode" class="form-control" placeholder="Mode" type="text" value="<?php echo $mode; ?>">
        </div>
    </div> <!-- form-group// -->
</div>



  
    <div class="d-flex justify-content-center">                            
        <button type="submit" name="update" class="btn btn-primary text-center reg-log">Update Course</button>  
    </div>                                                             
</form>
    
</body>
</html>