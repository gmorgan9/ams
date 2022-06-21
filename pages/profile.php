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

<div class="main">
    <h3 class="page_title">Profile</h3>
</div>
<div class="d-flex justify-content-center">
<!-- card start -->
    <div class="card" style="width: 35rem;">
        <div class="form-header d-flex justify-content-center">
            <div class="bg-circle">
                <div class="sm-circle">
                    <div class="d-flex justify-content-center">
                        <img class="user-header" style="margin-top:8px;height:90px; width:90px; border-radius:100px;" src="../assets/images/image.JPG" alt="">
                        <!-- <i class="user-header fa-solid fa-user fa-3x"></i> -->
                    </div>
                </div>
            </div>
        </div>
    


      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>

<!-- card end -->
</div>




</body>
</html>


