<?php
include("../database/connection.php");
$sql = "DELETE FROM assignments WHERE id='" . $_GET["did"] . "'";
if (mysqli_query($conn, $sql)) {

    header('location: ' . $_SERVER['HTTP_REFERER']);
    //echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>