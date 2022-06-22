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
      .add-btn {
        float: right; 
        margin-right: 10px; 
        margin-left: -70px; 
        color: #5C5B5B; 
        font-size: 12px; 
        text-decoration: none;
      }
      .add-btn:hover {
        color: #5C5B5B; 
        text-decoration: none;
      }
      .card-text {
        font-family: "Candal", serif;
        color: #5c5b5b;
        margin: 5px;
        margin-bottom: 10px;
      }
      .sem-btn {
        float: left;
        margin-right: -200px;
        margin-left: 15px;
      }
      .sem-btn p {
        /* font-family: "Candal", serif; */
        font-weight:400;
        color: #5c5b5b;
        font-size: 12px; 
        margin-bottom: 0px;
      }
      .page_subtitle {
        margin-left: -10px;
      }
    </style>
</head>
<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php include(ROOT_PATH . "/includes/sidebar.php"); ?>

<div class="main">
  <div class="sem-btn">
    <form method="post">
      <p>Select a Semester</p>
    <button type="submit" name="fall22" type="button" class="btn btn-outline-secondary btn-sm">Fall '22</button>
    <button type="submit" name="winter23" type="button" class="btn btn-outline-secondary btn-sm">Winter '23</button>
    </form>
  </div>
<a class="add-btn me-3 me-lg-0"href="../action/courses/add-course.php"><i class="fas fa-plus"></i> Add Course</a>
    <h3 class="page_title">Courses</h3>

    <?php
      if(isset($_POST['fall22'])) {
    ?>
    <h5 class="page_subtitle text-center">Fall 2022</h5>
    <div class="d-flex justify-content-center flex-row"> 
      <?php
        $sql = "SELECT * FROM course WHERE taken = 'fall22'";
        $result = mysqli_query($conn, $sql);
          if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id=$row['id'];
              $course=$row['course'];
              $title = $row['title'];
            ?>
            
              <div class="card" style="width: 12rem;">
                <div class="card-body">
                  <h5 class="card-title text-center" style=><?php echo $title; ?></h5>
                  <p class="card-text text-center"><?php echo $course; ?></p>
                  <div class="d-flex justify-content-center">
                  <a href="course-page.php?cid=<?php echo $id; ?>" class="btn btn-secondary btn-sm">See Course</a>
                  </div>
                </div>
              </div>
              <p class="ml-3"></p>
    <?php }
        } ?>
    </div>

    <?php 
      }
      if(isset($_POST['winter23'])) {
    ?>
    <h5 class="page_subtitle text-center">Winter 2023</h5>
    <div class="d-flex justify-content-center flex-row"> 
      <?php
        $sql = "SELECT * FROM course WHERE taken = 'winter23'";
        $result = mysqli_query($conn, $sql);
          if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id=$row['id'];
              $course=$row['course'];
              $title = $row['title'];
        ?>
              <div class="card" style="width: 12rem;">
                <div class="card-body">
                  <h5 class="card-title text-center" style=><?php echo $title; ?></h5>
                  <p class="card-text text-center"><?php echo $course; ?></p>
                  <div class="d-flex justify-content-center">
                    <a href="course-page.php?cid=<?php echo $id; ?>" class="btn btn-secondary btn-sm">See Course</a>
                  </div>
                </div>
              </div>
              <p class="ml-3"></p>
        <?php 
            }
          } ?>
        </div>
      <?php
        }
      ?>

       <!-- assignments -->
       <br>
      <h3 class="page_title">Upcoming Assignments</h3>

      <div class="col d-flex justify-content-center">
<table class="table table-hover table-light">
  <thead>
    <tr class="header-line">
      <th scope="col">#</th>
      <th scope="col">Status</th>
      <th scope="col">Incident Number</th>
      <th scope="col">Severity</th>
      <th scope="col">Description</th>
      <!-- <th scope="col">Assignment Group</th> -->
      <!-- <th scope="col">KB Article</th> -->
      <th scope="col">Date</th>
      <th scope="col">Time</th>
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

</div> <!-- end main -->

</body>
</html>