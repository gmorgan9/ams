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



