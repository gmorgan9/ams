<?php 
include("../path.php");
include("../database/connection.php");
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
    </style>
</head>

<!-- new body -->
<body>
   

    <?php
      $id = $_GET['cid'];
      $sql = "SELECT * FROM course where id=$id";
      $result = mysqli_query($conn, $sql);
      if($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
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
<a class="edit-btn me-3 me-lg-0" href="../action/courses/update-course.php?updateid=<?php echo $id; ?>"><i class="fas fa-pencil"></i> Edit Course</a>

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 35rem;">
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo $title; ?></h3>
                <div class="row">
                <div class="col">
                    <p class="card-text text-center"><b>Course Number:</b> <?php echo $course; ?></p>
                    <p class="card-text text-center"><b>Course Days:</b> <?php echo $day; ?></p>
                    <p class="card-text text-center"><b>Course Time:</b> <?php echo $time; ?></p>
                    <p class="card-text text-center"><b>Course Location:</b> <?php echo $location; ?></p>
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
      <h3 class="page_title">Course Assignments</h3>

      <div class="col d-flex justify-content-center">
<table class="table table-hover table-light">
  <thead>
    <tr class="header-line">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <!-- <th scope="col">Assignment Group</th> -->
      <!-- <th scope="col">KB Article</th> -->
      <!-- <th scope="col">Date</th>
      <th scope="col">Time</th> -->
    </tr>
  </thead>
  <tbody>

      <?php

      $sql = "SELECT * FROM assignments";
      $result = mysqli_query($conn, $sql);
      if($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id=$row['id'];
            $title=$row['title'];
            // $date = $row['date'];
            // $time = $row['time'];
            ?>
            <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td><?php echo $title; ?></td>
            <!-- <td><?php //echo $date; ?></td>
            <td><?php //echo $time; ?></td> -->
            <!-- <td><a href="update-incident.php?updateid=<?php //echo $id; ?>"><i class="fa-solid fa-pen-to-square" style="color:#005382;"></a></i></td> -->
            <!-- <td><a href="all-incidents.php?id=<?php //echo $id; ?>" class="delete"><i class="fa-solid fa-trash-can" style="color:#941515;"></i></a></td> -->
            </tr>
         <?php }
      }

?>
  </tbody>
</table>
</div>




</body>
</html>