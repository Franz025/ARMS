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
    // Corrected query to select the maximum tracknumber
    $query = "SELECT MAX(tracknumber) AS last_tracknumber FROM tbl_accomplishments";
    $result = mysqli_query($DBCon->con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['last_tracknumber'];
    } else {
        return null;
    }
}

function getLastRenewTrackNumber($DBCon)
{
    // This function is now removed since the same logic is applied in getLastTrackNumber
    return getLastTrackNumber($DBCon); // Using the same function for both
}

// Get the last control number from both fields
$last_tracknumber = getLastTrackNumber($DBCon);

// Determine the next numeric part
if ($last_tracknumber) {
    // Extract numeric part from controlnum (assuming format ARMS-YYYY-XXX)
    preg_match('/\d+$/', $last_tracknumber, $matches);
    $numeric_part_renew = (int) $matches[0] + 1;
} else {
    // If no control numbers exist, start from 1
    $numeric_part_renew = 1;
}

// Format the numeric part with leading zeros
$numeric_part_formatted = str_pad($numeric_part_renew, 3, '0', STR_PAD_LEFT);

// Form the control number
$track_number = $prefix . $year . '-' . $numeric_part_formatted;

// Output the control number directly
echo $track_number;
