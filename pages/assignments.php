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

    <title>Assignments - AMS</title>
</head>
<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php include(ROOT_PATH . "/includes/sidebar.php"); ?>

<div class="main">
<h3 class="page_title">Assignments</h3>

<div class="col d-flex justify-content-center">
<table class="table table-hover table-light">
<thead>
<tr class="header-line">
<th scope="col">#</th>
<th scope="col">Title</th>
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
      $course_id=$row['course_id'];
      ?>
      <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $title; ?></td>
      <td><?php echo $course_id; ?></td>
      </tr>
   <?php }
}

?>
</tbody>
</table>
</div>




</div>

</body>
</html>


