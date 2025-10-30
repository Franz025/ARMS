<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log file for tracking errors
$log_file = '/tmp/dashboard_debug.log';

// Function to log errors
function log_error($message) {
    global $log_file;
    file_put_contents($log_file, date('[Y-m-d H:i:s] ') . $message . PHP_EOL, FILE_APPEND);
}

// Set headers
header('Content-Type: application/json');

// Include database connection
include('../inc/connection.php');

// Log connection status
if (!$con) {
    log_error("Database Connection Failed: " . mysqli_connect_error());
    echo json_encode([
        'error' => 'Database connection failed',
        'details' => mysqli_connect_error()
    ]);
    exit;
}

try {
    // Fetch total accomplishments
    $accomplishments_query = "SELECT 
        COUNT(*) as total_accomplishments,
        SUM(CASE WHEN progs_status = 'FINISHED' THEN 1 ELSE 0 END) as finished_accomplishments,
        SUM(CASE WHEN progs_status = 'ONGOING' THEN 1 ELSE 0 END) as ongoing_accomplishments
    FROM tbl_accomplishments";
    $accomplishments_result = mysqli_query($con, $accomplishments_query);
    
    if (!$accomplishments_result) {
        throw new Exception("Accomplishments query failed: " . mysqli_error($con));
    }
    
    $accomplishments_data = mysqli_fetch_assoc($accomplishments_result);


    // Monthly accomplishments
    $monthly_query = "SELECT 
        MONTH(date_finished) as month, 
        COUNT(*) as count 
    FROM tbl_accomplishments 
    WHERE YEAR(date_finished) = YEAR(CURRENT_DATE())
    GROUP BY MONTH(date_finished)";
    $monthly_result = mysqli_query($con, $monthly_query);
    
    if (!$monthly_result) {
        throw new Exception("Monthly query failed: " . mysqli_error($con));
    }
    
    $monthly_data = array_fill(0, 12, 0);
    while($row = mysqli_fetch_assoc($monthly_result)) {
        $monthly_data[$row['month']-1] = $row['count'];
    }

    // Prepare response
    $response = [
        'total_accomplishments' => $accomplishments_data['total_accomplishments'] ?? 0,
        'finished_accomplishments' => $accomplishments_data['finished_accomplishments'] ?? 0,
        'ongoing_accomplishments' => $accomplishments_data['ongoing_accomplishments'] ?? 0,
        'monthly_accomplishments' => $monthly_data
    ];

    // Log successful data retrieval
    log_error("Dashboard data retrieved successfully");

    // Output JSON response
    echo json_encode($response);
} catch (Exception $e) {
    // Log the error
    log_error("Dashboard Data Error: " . $e->getMessage());
    
    // Return error response
    echo json_encode([
        'error' => 'Failed to retrieve dashboard data',
        'details' => $e->getMessage()
    ]);
} finally {
    // Close database connection
    mysqli_close($con);
}
?>