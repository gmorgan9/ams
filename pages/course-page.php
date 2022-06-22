<?php 
include("../path.php");
include("../database/connection.php");
include("../database/functions.php");
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

    <title>Courses - AMS</title>

    <style>
      .edit-btn {
        float: right; 
        margin-right: 10px; 
        margin-left: -70px; 
        color: #5C5B5B; 
        font-size: 12px; 
        text-decoration: none;
      }
      .edit-btn:hover {
        color: #5C5B5B; 
        text-decoration: none;
      }
      .card-text {
        font-family: "Candal", serif;
        color: #5c5b5b;
        margin: 5px;
        margin-bottom: 10px;
      }
      .header-line {
        border-bottom: 3px rgb(128, 128, 128) solid;
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

<!-- new body -->
<body>
   

    <?php
      $id = $_GET['cid'];
      $sql = "SELECT * FROM course where course_id=$id";
      $result = mysqli_query($conn, $sql);
      if($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $course_id = $row['course_id'];
            $title = $row['title'];
            $course = $row['course'];
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
          }
          //$fullDate = date("M d, Y", strtotime($date));
        }
            ?>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php //include(ROOT_PATH . "/includes/sidebar.php"); ?>
<!-- <a class="edit-btn me-3 me-lg-0" href="../action/courses/update-course.php?updateid=<?php echo $course_id; ?>"><i class="fas fa-pencil"></i> Edit Course</a> -->
<a class="back-btn me-3 me-lg-0"href="../../pages/courses.php"><i class="fas fa-arrow-left"></i> Back</a>

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 35rem;">
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo $title; ?></h3>
                <div class="row">
                <div class="col">
                    <p class="card-text text-center"><b>Course Number:</b> <?php echo $course; ?></p>
                    <p class="card-text text-center"><b>Course Days:</b>  <?php 
                    if(!empty($day)) {
                        echo $day;
                    } else { 
                        echo "Online";
                    }
                    ?></p>
                    <p class="card-text text-center"><b>Course Time:</b>  <?php 
                    if(!empty($time)) {
                        echo $time;
                    } else { 
                        echo "Online";
                    }
                    ?></p>
                    <p class="card-text text-center"><b>Course Location:</b>  <?php 
                    if(!empty($location)) {
                        echo $location;
                    } else { 
                        echo "Online";
                    }
                    ?></p>
                </div>
                <div class="col">
                    <h5 class="card-title text-center">Lab Info</h5>
                    <p class="card-text text-center"><b>Lab Days:</b> <?php 
                    if(!empty($lab_day)) {
                        echo $lab_day;
                    } else { 
                        echo "No Lab";
                    }
                    ?></p>
                    <p class="card-text text-center"><b>Lab Times:</b> <?php 
                    if(!empty($lab_time)) {
                        echo $lab_time;
                    } else { 
                        echo "No Lab";
                    }
                    ?></p>
                    <p class="card-text text-center"><b>Lab Location:</b> <?php 
                    if(!empty($lab_location)) {
                        echo $lab_location;
                    } else { 
                        echo "No Lab";
                    }
                    ?></p>
                </div>
                </div>
                <!-- <br> -->
                <div class="d-flex justify-content-center">
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Assignments -->
    <br>
    <a data-toggle="modal" data-target="#addModal" class="edit-btn me-3 me-lg-0" href="../action/assignments/add-assignment.php?cid=<?php echo $course_id; ?>"><i class="fas fa-plus"></i> Add Assignment</a>
      <h3 class="page_title">Course Assignments</h3>

      <div class="col d-flex justify-content-center">
        <div class="card" style="width: 75rem;">
<table class="table table-hover table-light">
  <thead>
    <tr class="header-line">
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Due</th>
      <th scope="col">Score</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

      <?php
      $cid = $_GET['cid'];
      $sql = "SELECT * FROM assignments where course_id=$cid";
      $result = mysqli_query($conn, $sql);
      if($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $aid=$row['id'];
            $atitle=$row['title'];
            $acourse_id=$row['course_id'];
            $adue_date = $row['due_date'];
            $adue_time = $row['due_time'];
            $ascore=$row['score'];
            $apossible_points=$row['possible_points'];
            $aassign_group=$row['assign_group'];
            $fullDate = date("M d", strtotime($adue_date));
            $fullTime = date("h:ia", strtotime($adue_time));
            ?>
            <tr>
            <td><?php echo $atitle; ?></td>
            <td><?php echo $aassign_group; ?></td>
            <td><?php echo $fullDate; ?> by <?php echo $fullTime; ?></td>
            <?php 
            if($row['score'] == 0){
              echo "<td> - </td>";
            } else { ?>
            <td><?php echo $ascore; ?></td>
            <?php } ?>
            <td><a data-toggle="modal" data-target="#score-add" class="edit-btn me-3 me-lg-0" href="/pages/course-page.php?uid=<?php echo $aid; ?>"><i class="fas fa-pencil"></i></a></td>
            <td><a href="/pages/assignment-delete.php?did=<?php echo $aid; ?>" class="delete"><i class="fa-solid fa-trash-can" style="color:#941515;"></i></a></td>
            </tr>
         <?php }
      }

?>
  </tbody>
</table>
    </div>
</div>

<?php

// Define variables and initialize with empty values
$title = "";
$title_err = "";

// Processing form data when form is submitted
if(isset($_POST["add-score"])){
 // Get hidden input value
 $id = $_POST["uid"];
 //$status = isset($_POST['status']) ? 1 : 0;
 
 // Validate address address
 $input_score = trim($_POST["score"]);
 if(empty($input_score)){
     $score_err = "Please enter a score.";     
 } else{
     $score = $input_score;
 }
 
 
 // Check input errors before inserting in database
 if(empty($score_err)){
     // Prepare an update statement
     $sql = "UPDATE assignments SET score=? WHERE id=?";
      
     if($stmt = mysqli_prepare($conn, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "ii", $param_score, $param_id);
         
         // Set parameters
         $param_score = $score;
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
                 $score = $row['score'];
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


<!-- Add Score Modal -->
<div class="modal fade" id="score-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="course-page.php" class="log-form" method="post">
      <div class="d-flex justify-content-center">
                  <div class="form-group input-group w-75">
              	    <div class="input-group-prepend">
		                  <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
		                </div>
                    <input name="score" class="form-control" placeholder="Score" type="number" value="0">
                  </div>
              </div> <!-- form-group// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add-score" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>


  <!-- ADD Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <form action="course-page.php?cid=<?php echo $cid; ?>" class="log-form" method="post">
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
		                  <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
		                </div>
                    <input name="score" class="form-control" placeholder="Score" type="number" value="0">
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
		                  <span class="input-group-text"> <i class="fa fa-user-group"></i> </span>
		                </div>
                    <input name="assign_group" class="form-control" placeholder="Assignment Group" type="text">
                  </div>
              </div> <!-- form-group// -->
              <div class="d-flex justify-content-center">
                  <div class="form-group input-group w-75">
              	    <div class="input-group-prepend">
		                  <span class="input-group-text"> <i class="fa fa-user-group"></i> </span>
		                </div>
                    <?php $cid = $_GET['cid']; ?>
                    <input name="course_id" class="form-control" placeholder="Course ID" type="text" value="<?php echo $cid; ?>" readonly>
                  </div>
              </div> <!-- form-group// -->
              <div class="d-flex justify-content-center">
                  <div class="form-group input-group w-75">
              	    <div class="input-group-prepend">
		                  <span class="input-group-text"> <i class="fa fa-user-group"></i> </span>
		                </div>
                    <?php 
                      $sql = "SELECT * FROM course where course_id=$cid";
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
           
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_assignment" class="btn btn-secondary">Add</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<!-- end add modal -->

</body>
<!-- JS code -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
</script>
<!--JS below-->


<!--modal-->
<script>
  $(document).ready(function() {
     $("#MyModal").modal();
     $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').focus();
     });
  });
</script>




</body>
</html>