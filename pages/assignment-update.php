<?php
include("../database/connection.php");

// Define variables and initialize with empty values
$title = "";
$title_err = "";

// Processing form data when form is submitted
if(isset($_POST["update_assignment"])){
 // Get hidden input value
 $id = $_POST["uid"];
 //$status = isset($_POST['status']) ? 1 : 0;
 
 // Validate address address
 $input_title = trim($_POST["title"]);
 if(empty($input_title)){
     $title_err = "Please enter a title.";     
 } else{
     $title = $input_title;
 }
 
 
 // Check input errors before inserting in database
 if(empty($title_err)){
     // Prepare an update statement
     $sql = "UPDATE assignments SET title=? WHERE id=?";
      
     if($stmt = mysqli_prepare($conn, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "si", $param_title, $param_id);
         
         // Set parameters
         $param_title = $title;
         $param_id = $id;
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             // Records updated successfully. Redirect to landing page
             header("location: /");
             exit();
         } else{
             echo "Oops! Something went wrong. Please try again later.";
         }
     }
      
     // Close statement
     mysqli_stmt_close($stmt);
 }
 
 // Close connection
 mysqli_close($conn);
} else{
 // Check existence of id parameter before processing further
 if(isset($_GET["uid"]) && !empty(trim($_GET["uid"]))){
     // Get URL parameter
     $id =  trim($_GET["uid"]);
     
     // Prepare a select statement
     $sql = "SELECT * FROM assignments WHERE id = ?";
     if($stmt = mysqli_prepare($conn, $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "i", $param_id);
         
         // Set parameters
         $param_id = $id;
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             $result = mysqli_stmt_get_result($stmt);
 
             if(mysqli_num_rows($result) == 1){
                 /* Fetch result row as an associative array. Since the result set
                 contains only one row, we don't need to use while loop */
                 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                 
                 // Retrieve individual field value
                 $title = $row['title'];
             } else{
                 // URL doesn't contain valid id. Redirect to error page
                 header("location: die-page.php");
                 exit();
             }
             
         } else{
             echo "Oops! Something went wrong. Please try again later.";
         }
     }
     
     // Close statement
     mysqli_stmt_close($stmt);
     
     // Close connection
     mysqli_close($conn);
 }  else{
     // URL doesn't contain id parameter. Redirect to error page
     header("location: die-page2.php");
     exit();
 }
}