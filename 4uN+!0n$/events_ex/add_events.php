<?php
include('../../inc/connection.php');

$event_name = $_POST['event_name'];
$start = $_POST['start'];
$end = $_POST['end'];
$backgroundColor = $_POST['backgroundColor'];
$borderColor = $_POST['borderColor'];


$sql1 = "INSERT INTO tbl_events_logs (event_name, start, end, backgroundColor, borderColor ) 
         VALUES ('$event_name', '$start', '$end', '$backgroundColor', '$borderColor' )";


$query1 = $con->query($sql1);

if ($query1) {
    $data = array('status' => 'true');
    echo json_encode($data);
}

$con->close();
?>
