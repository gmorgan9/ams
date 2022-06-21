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
                        <i class="user-header fa-solid fa-user fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    


      <div class="card-body">
        <h5 class="card-title text-center"><?php echo $_SESSION['name']; ?></h5>
        <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-secondary">
            GPA <span class="badge badge-light">3.53</span>
        </button>
      </div>
    </div>

<!-- card end -->
</div>




</body>
</html>


