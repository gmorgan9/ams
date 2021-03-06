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

    <title>Assignments - AMS</title>
    <style>
        .header-line {
        border-bottom: 3px rgb(128, 128, 128) solid;
      }
    </style>
</head>
<body>
  

<?php include(ROOT_PATH . "/includes/header.php"); ?>
<?php include(ROOT_PATH . "/includes/sidebar.php"); ?>

<div class="main">
<!-- Assignments -->
<br>
      <h3 class="page_title">Assignments</h3>

      <div class="col d-flex justify-content-center">
        <div class="card" style="width: 75rem;">
<table class="table table-hover table-light">
  <thead>
    <tr class="header-line">
      <th scope="col">Title</th>
      <th scope="col">Course Title</th>
      <th scope="col">Due Date</th>
      <th scope="col">Due Time</th>
      <th scope="col">Score</th>
      <th scope="col">Percent</th>
    </tr>
  </thead>
  <tbody>
      <?php
      //$cid = $_GET['cid'];
      $sql = "SELECT * FROM assignments";
      $result = mysqli_query($conn, $sql);
      if($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id=$row['id'];
            $title=$row['title'];
            $course_title=$row['course_title'];
            $due_date = $row['due_date'];
            $due_time = $row['due_time'];
            $score=$row['score'];
            $percent = $row['percent'];
            ?>
            <tr>
            <td><?php echo $title; ?></td>
            <td><?php echo $course_title; ?></td>
            <td><?php echo $due_date; ?></td>
            <td><?php echo $due_time; ?></td>
            <?php 
            if($row['score'] == 0){
              echo "<td> - </td>";
            } else { ?>
            <td><?php echo $score; ?></td>
            <?php } ?>
            <td><?php echo $percent; ?></td>
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


