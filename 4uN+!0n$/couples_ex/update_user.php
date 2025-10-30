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
$id = $_POST['id'];

$sql1 = "UPDATE `tbl_accomplishments` SET  `tracknumber`='$tracknumber',  `services`= '$services',  `offices`= '$offices',  `accoms_desc`='$accoms_desc',  `tech_remarks`='$tech_remarks', `user_id`='$user_id',
                `progs_status`= '$progs_status',  `date_started`='$date_started'

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