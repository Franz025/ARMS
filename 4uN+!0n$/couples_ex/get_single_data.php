<?php 

include('../../inc/lib/database.php');

$DBCon = new DB;

$id = $_POST['id'];
$sql = "SELECT * FROM tbl_accomplishments WHERE id='$id' LIMIT 1";
$query = $DBCon->con->query($sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>