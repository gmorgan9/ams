<?php

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
require_once('connection.php');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confpassword = mysqli_real_escape_string($conn, $_POST['confpassword']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { 
      array_push($errors, "Name is required"); 
  }
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password != $confpassword) {
      array_push($errors, "The two passwords do not match");
    }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
  
        $query = "INSERT INTO user (name, username, password) 
                  VALUES('$name', '$username', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['name'] = $name;
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: /');
    }
  }

  // LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['name'] = $name;
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: /');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }


// call the register() function if register_btn is clicked
if (isset($_POST['update_btn'])) {
	updateAcc();
}

function updateAcc(){
	// call these variables with the global keyword to make them available in function
	global $db, $username, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$password = e($_POST['password']);
	$confpassword = e($_POST['confpassword']);

	// form validation: ensure that the form is correctly filled
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password != $confpassword) {
		array_push($errors, "The two passwords do not match");
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		//$password = md5($password);//encrypt the password before saving in the database
		//$username = $_SESSION['user']['username'];

			$sql = "UPDATE user SET name = '$name', username = '$username', password = '$password' WHERE username = '$username'";
			mysqli_query($conn, $sql);
      $_SESSION['name'] = $name;
      $_SESSION['username'] = $username;
			$_SESSION['success']  = "Password successfully updated";
			header('location: '. BASE_URL . '/pages/profile.php');		
		}
	}


// Add Course
if (isset($_POST['add_course'])) {
  // receive all input values from the form
  $course = mysqli_real_escape_string($conn, $_POST['course']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $taken = mysqli_real_escape_string($conn, $_POST['taken']);
  $day = mysqli_real_escape_string($conn, $_POST['day']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $lab_day = mysqli_real_escape_string($conn, $_POST['lab_day']);
  $lab_time = mysqli_real_escape_string($conn, $_POST['lab_time']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $lab_location = mysqli_real_escape_string($conn, $_POST['lab_location']);
  $instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
  $credits = mysqli_real_escape_string($conn, $_POST['credits']);
  $mode = mysqli_real_escape_string($conn, $_POST['mode']);
  $section = mysqli_real_escape_string($conn, $_POST['section']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($course)) { 
    array_push($errors, "Course is required"); 
  }
  if (empty($title)) { 
      array_push($errors, "Title is required"); 
  }
  if (empty($taken)) { 
      array_push($errors, "Taken is required"); 
  }
  if (empty($day)) {
      array_push($errors, "Date is required");
  }
  if (empty($time)) { 
      array_push($errors, "Time is required"); 
  }
  if (empty($location)) { 
      array_push($errors, "Location is required"); 
  }
  if (empty($instructor)) { 
      array_push($errors, "Instructor is required"); 
  }
  if (empty($credits)) {
    array_push($errors, "Credits is required");
  }
  if (empty($mode)) { 
    array_push($errors, "Mode is required"); 
}
if (empty($section)) {
    array_push($errors, "Section is required");
}

  // first check the database to make sure 
  // a course does not already exist with the same course_id
  $course_check_query = "SELECT * FROM course WHERE id='$id' LIMIT 1";
  $result = mysqli_query($conn, $course_check_query);
  $course_data = mysqli_fetch_assoc($result);
  
  if ($course_data) { // if course exists
    if ($course_data['course'] === $course) {
      array_push($errors, "Course already exists");
    }
  }

  // Finally, add course if there are no errors in the form
  if (count($errors) == 0) {

      $query = "INSERT INTO course (course, title, taken, day, time, lab_day, lab_time, location, lab_location, instructor, credits, mode, section) 
                VALUES('$course', '$title', '$taken', '$day', '$time', '$lab_day', '$lab_time', '$location', '$lab_location', '$instructor', '$credits', '$mode', '$section')";
      mysqli_query($conn, $query);
      header('location: '. BASE_URL .'/pages/courses.php');
  }
}


// Add Assignment
if (isset($_POST['add_assignment'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
  $due_time = mysqli_real_escape_string($conn, $_POST['due_time']);
  $score = mysqli_real_escape_string($conn, $_POST['score']);
  $possible_points = mysqli_real_escape_string($conn, $_POST['possible_points']);
  $percent = mysqli_real_escape_string($conn, $_POST['percent']);
  $assign_group = mysqli_real_escape_string($conn, $_POST['assign_group']);
  $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
  $course_title = mysqli_real_escape_string($conn, $_POST['course_title']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { 
      array_push($errors, "Title is required"); 
  }
  if (empty($due_date)) { 
      array_push($errors, "Due Date is required"); 
  }
  if (empty($due_time)) {
      array_push($errors, "Due Time is required");
  }
  // if (empty($score)) { 
  //     array_push($errors, "Location is required"); 
  // }
  if (empty($possible_points)) { 
      array_push($errors, "Possible Points is required"); 
  }
  if (empty($percent)) {
    array_push($errors, "Percent is required");
  }
  if (empty($assign_group)) { 
    array_push($errors, "Assignment Group is required"); 
}
if (empty($course_id)) {
    array_push($errors, "Course ID is required");
}
if (empty($course_title)) {
  array_push($errors, "Course Title is required");
}

  // first check the database to make sure 
  // a course does not already exist with the same course_id
  $assign_check_query = "SELECT * FROM assignments WHERE id='$id' LIMIT 1";
  $result = mysqli_query($conn, $assign_check_query);
  $assign_data = mysqli_fetch_assoc($result);
  
  if ($assign_data) { // if course exists
    if ($assign_data['title'] === $title) {
      array_push($errors, "Course already exists");
    }
  }

  // Finally, add course if there are no errors in the form
  if (count($errors) == 0) {

      $query = "INSERT INTO assignments (title, due_date, due_time, score, possible_points, percent, assign_group, course_id, course_title) 
                VALUES('$title', '$due_date', '$due_time', '$score', '$possible_points', '$percent', '$assign_group', '$course_id', '$course_title')";
      mysqli_query($conn, $query);
      header('location: '. BASE_URL .'/pages/course-page.php?cid='. $cid);
  }
}