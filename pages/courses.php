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

    <title>Courses - AMS</title>
</head>
<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php include(ROOT_PATH . "/includes/sidebar.php"); ?>

<div class="main">
    <h3 class="page_title">Courses</h3>





    <?php

      $sql = "SELECT * FROM course WHERE taken='fall22'";
      $result = mysqli_query($con, $sql);
      if($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $course_id=$row['course_id'];
            $course=$row['course'];
            $title = $row['title'];
            ?>
              <div class="card" style="width: 12rem;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $course; ?></h5>
                  <p class="card-text">text</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
         <?php }
      }

?>








<div class="d-flex justify-content-center flex-row"> 

<!-- class1 -->
<div class="card" style="width: 12rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<!-- end -->
<p class="ml-2"></p>
<!-- class2 -->
<div class="card" style="width: 12rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<!-- end -->
<p class="ml-2"></p>
<!-- class3 -->
<div class="card" style="width: 12rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<!-- end -->
<p class="ml-2"></p>
<!-- class4 -->
<div class="card" style="width: 12rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<!-- end -->
<p class="ml-2"></p>
<!-- class5 -->
<div class="card" style="width: 12rem;">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<!-- end -->

</div> <!-- end class div -->

</div> <!-- end main -->



</body>
</html>


