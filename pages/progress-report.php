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

    <title>Progress Report - AMS</title>
</head>
<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php include(ROOT_PATH . "/includes/sidebar.php"); ?>

<div class="main">
    <h3 class="page_title">Progress Report</h3>
</div>

</body>
</html>


