<?php
include('../../inc/connection.php');


$event_name = $_POST['event_name'];
$start = $_POST['start'];
$end = $_POST['end'];
$backgroundColor = $_POST['backgroundColor'];
$borderColor = $_POST['borderColor'];

$id = $_POST['id'];

$sql1 = "UPDATE `tbl_events_logs` SET  `event_name`='$event_name',  `start`= '$start',  `end`= '$end',  `backgroundColor`= '$backgroundColor',  `borderColor`= '$borderColor'        
        WHERE id = '$id'";


$query1 = mysqli_query($con, $sql1);


if ($query1) {
    $data = array(
        'status' => 'true',
    );
}

echo json_encode($data);
$con->close();
?>
