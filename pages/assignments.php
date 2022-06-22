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
            <td><a data-toggle="modal" data-target="#exampleModal" class="edit-btn me-3 me-lg-0" href="../action/assignments/add-assignment.php?cid=<?php echo $course_id; ?>"><i class="fas fa-pencil"></i> </a></td>
            <td><a href="all-incidents.php?id=<?php echo $id; ?>" class="delete"><i class="fa-solid fa-trash-can" style="color:#941515;"></i></a></td>
            </tr>
         <?php }
      }

?>
  </tbody>
</table>
    </div>

    </div>
<br><br>







<!-- MODALS -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


