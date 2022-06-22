<?php
include("../database/connection.php");
$sql = "DELETE FROM assignments WHERE id='" . $_GET["cid"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>