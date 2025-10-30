<?php
include('../../inc/connection.php');

$tracknumber = $_POST['tracknumber'];
$services = $_POST['services'];
$offices = $_POST['offices'];
$accoms_desc = $_POST['accoms_desc'];
$tech_remarks = $_POST['tech_remarks'];
$user_id = $_POST['user_id'];
$progs_status = $_POST['progs_status'];
$date_started = $_POST['date_started'];

$sql1 = "INSERT INTO tbl_accomplishments (tracknumber, services, offices, accoms_desc, tech_remarks, user_id, progs_status, date_started) 
         VALUES ('$tracknumber', '$services', '$offices', '$accoms_desc', '$tech_remarks', '$user_id', '$progs_status', '$date_started')";

$query1 = $con->query($sql1);

if ($query1) {
    $data = array('status' => 'true');
    echo json_encode($data);

}

$con->close();
?>