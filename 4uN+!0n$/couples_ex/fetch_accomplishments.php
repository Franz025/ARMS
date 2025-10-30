<?php
include('../../inc/connection.php');

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$user_id = $_GET['user_id'];

// Create the base query
$query = "SELECT * FROM tbl_accomplishments WHERE date_started BETWEEN '$start_date' AND '$end_date'";

// If a user is selected, add to the query
if (!empty($user_id)) {
    $query .= " AND user_id = '$user_id'";
}

$query .= " ORDER BY date_started DESC";
$result = mysqli_query($con, $query);

// Output the results as HTML
while ($row = mysqli_fetch_assoc($result)) {
    $currentDate = date('d M. Y', strtotime($row['date_started']));
    $time = date('H:i', strtotime($row['date_started']));
    $name = $row['user_id'];

    echo "
        <li class='timeline-item'>
            <strong>{$row['accoms_desc']}</strong> <strong>{$row['tracknumber']}</strong> by <strong>{$name}</strong> on <strong>{$currentDate}</strong> at <strong>{$time}</strong>.
        </li>";
}
?>