<?php

// Assuming this includes your database connection
include('../../inc/lib/database.php');

// Assuming $DBCon is your database connection object
$DBCon = new DB;

// Static prefix
$prefix = 'ARMS-';

// Full four digits of the current year
$year = date('Y');

// Function to get the last control number
function getLastTrackNumber($DBCon)
{
    $query = "SELECT MAX(controlnum) AS last_controlnum FROM tbl_accomplishments";
    $result = mysqli_query($DBCon->con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['last_controlnum'];
    } else {
        return null;
    }
}

function getLastRenewTrackNumber($DBCon)
{
    $query = "SELECT MAX(controlnum_renew) AS last_controlnum_renew FROM tbl_accomplishments";
    $result = mysqli_query($DBCon->con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['last_controlnum_renew'];
    } else {
        return null;
    }
}

// Get the last control number from both fields
$last_controlnum = getLastTrackNumber($DBCon);
$last_controlnum_renew = getLastRenewTrackNumber($DBCon);

// Determine the next numeric part
if ($last_controlnum_renew && $last_controlnum_renew > $last_controlnum) {
    // Extract numeric part from controlnum_renew (assuming format ARMS-YYYY-XXX)
    preg_match('/\d+$/', $last_controlnum_renew, $matches);
    $numeric_part_renew = (int) $matches[0] + 1;
} elseif ($last_controlnum) {
    // Extract numeric part from controlnum (assuming format ARMS-YYYY-XXX)
    preg_match('/\d+$/', $last_controlnum, $matches);
    $numeric_part_renew = (int) $matches[0] + 1;
} else {
    // If no control numbers exist, start from 1
    $numeric_part_renew = 1;
}

// Format the numeric part with leading zeros
$numeric_part_formatted = str_pad($numeric_part_renew, 3, '0', STR_PAD_LEFT);

// Form the control number
$control_number = $prefix . $year . '-' . $numeric_part_formatted;

// Output the control number directly
echo $control_number;
