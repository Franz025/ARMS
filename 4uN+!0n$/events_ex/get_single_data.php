<?php
include('../../inc/lib/database.php');

$DBCon = new DB;

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_events_logs WHERE id = '$id'";
}else{
    $start = $_POST['start'];
    $end = $_POST['end'];
    $sql = "SELECT * FROM tbl_events_logs WHERE start >= '$start' AND end <= '$end'";
}

$query = $DBCon->con->query($sql);
$events = array();

while ($row = mysqli_fetch_assoc($query)) {
    $events[] = array(
        'id' => $row['id'],
        'event_name' => $row['event_name'],
        'start' => $row['start'],
        'end' => $row['end'],
        // 'allDay' => $row['allDay'],
        'backgroundColor' => $row['backgroundColor'],
        'borderColor' => $row['borderColor']
    );
}

echo json_encode($events);
?>
