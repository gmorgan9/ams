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
              $course_id=$row['course_id'];
              $course=$row['course'];
              $title = $row['title'];
            ?>
            
              <div class="card" style="width: 12rem;">
                <div class="card-body">
                  <h5 class="card-title text-center" style=><?php echo $title; ?></h5>
                  <p class="card-text text-center"><?php echo $course; ?></p>
                  <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-secondary btn-sm">See Course</a>
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
    <h5 class="page_subtitle text-center">Fall 2022</h5>
    
    


    <div class="d-flex justify-content-center flex-row"> 
      <?php
        $sql = "SELECT * FROM course WHERE taken = 'winter23'";
        $result = mysqli_query($conn, $sql);
          if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $course_id=$row['course_id'];
              $course=$row['course'];
              $title = $row['title'];
            ?>
            
              <div class="card" style="width: 12rem;">
                <div class="card-body">
                  <h5 class="card-title text-center" style=><?php echo $title; ?></h5>
                  <p class="card-text text-center"><?php echo $course; ?></p>
                  <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-secondary btn-sm">See Course</a>
                  </div>
                </div>
              </div>
              <p class="ml-3"></p>
    <?php }
        } ?>
    </div>

<?php
}

    ?>

</div> <!-- end main -->

</body>
</html>