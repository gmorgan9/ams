<?php 
if(isset($_POST['add-score'])) {
$aid = $_GET['uid'];
$query = "SELECT score FROM assignments WHERE id='$aid'";
$result = mysqli_query( $conn, $query );
$row = mysqli_fetch_assoc( $query );

$newhp = $row['score'];
$query = "UPDATE assignments SET score= ? WHERE id='$aid'";
$result = mysqli_query( $conn, $query );
}
?>