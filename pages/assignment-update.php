<?php 
$aid = $_GET['uid'];
$query = "SELECT score FROM assignments WHERE id='$aid'";
$result = mysqli_query( $conn, $query );
$row = mysqli_fetch_assoc( $query );

$newhp = $row['score'];
$query = "UPDATE assignments SET score='$newscore' WHERE id='$aid'";
$result = mysqli_query( $conn, $query );

?>