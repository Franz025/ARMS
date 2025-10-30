<?php
include('../../inc/connection.php');

$id = $_POST['id'];
$action = $_POST['action'];

if ($action === 'release') {
    // Update released_status to 'RELEASED'
    $sql = "UPDATE `tbl_pmcis` SET `released_status` = 'RELEASED' WHERE `id` = '$id'";

    if (mysqli_query($con, $sql)) {
        $data = array('status' => 'true');
    } else {
        $data = array('status' => 'false', 'error' => mysqli_error($con));
    }

    echo json_encode($data);
}

$con->close();
