<?php

// Check if date_range is set in POST
$selectedDateRange = isset($_POST['date_range']) ? $_POST['date_range'] : '';

// Initialize variables for formatted dates
$formattedDateRange = '';

if (!empty($selectedDateRange)) {
    // Split the date range into start and end dates
    $dateRange = explode(' - ', $selectedDateRange);
    if (count($dateRange) === 2) {
        $startDate = DateTime::createFromFormat('Y-m-d', trim($dateRange[0]));
        $endDate = DateTime::createFromFormat('Y-m-d', trim($dateRange[1]));

        // Format the dates into the desired format
        if ($startDate && $endDate) {
            $formattedDateRange = $startDate->format('F j') . ' - ' . $endDate->format('j, Y');
        }
    }
}

// Fetch the selected user ID from POST
$selectedUserID = isset($_POST['user_id']) ? $_POST['user_id'] : '';
?>

<?php
if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 3)) : ?>
    <div class="container-fluid">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h6 class="card-title" style="font-weight: bold; font-size: 15px;">
                    <i class="nav-icon fas fa-clipboard-list"></i>&nbsp; On-the-Job Training Accomplishment Report
                </h6>
                <div class="card-tools">
                    <div class="card-title" style="font-weight: bold;">
                        <button type="button" class="btn btn-success btn-sm" style="font-weight: bold;" id="printButton">Print
                            <i class="fas fa-print"></i>
                        </button>
                        <button type="button" class="btn btn-tool" style="color: black;" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Report Header -->
            <div class="print-header">
                <h6 class="text-center" style="font-family: 'Times New Roman', Times, serif; font-size: 24px; font-weight: bold; margin-top: 20px;">ACCOMPLISHMENT REPORT</h6>
            </div>
    
            <!-- Modal Body -->
            <div class="card-body">
                <!-- Student Info Section -->
                <div class="row g-3">
                    <div class="col-md-6 mb-3 d-flex align-items-center">
                        <label class="form-label fw-bold mb-0">Student&nbsp;Name:</label> &nbsp;&nbsp;&nbsp;
                        <input type="text" id="name" class="form-control" aria-describedby="Name">
                    </div>
                    <div class="col-md-6 mb-3 d-flex align-items-center">
                        <label class="form-label fw-bold mb-0">Course:</label> &nbsp;&nbsp;&nbsp;
                        <input type="text" id="course" class="form-control" aria-describedby="Course">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 d-flex align-items-center">
                        <label class="form-label fw-bold mb-0">Company:</label> &nbsp;&nbsp;&nbsp;
                        <input type="text" id="course" class="form-control" aria-describedby="Course" placeholder="City Government of Batangas" disabled>
                    </div>
                    <div class="col-md-6 mb-3 d-flex align-items-center">
                        <label class="form-label fw-bold mb-0">Department/Division:</label> &nbsp;&nbsp;&nbsp;
                        <input type="text" id="course" class="form-control" aria-describedby="Course" placeholder="Information Technology Service Division" disabled>
                    </div>
                </div>

                <form method="POST" action="" id="filterForm">
                    <div class="row mb-3">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="form-label fw-bold mb-0">Total Practicum Hours:</label> &nbsp;&nbsp;&nbsp;
                            <input type="text" id="TPhours" class="form-control" style="width: 60px; height: 30px;">
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="form-label fw-bold mb-0" for="dateRange">Select&nbsp;Date&nbsp;Range:</label> &nbsp;&nbsp;&nbsp;
                            <input type="text" id="dateRange" class="form-control" name="date_range" value="<?php echo $selectedDateRange; ?>" autocomplete="off">
                        </div>
                        <div class="col-md-2" style="margin-top: 10px; margin-bottom: 10px;">
                            <!-- Filter and Reset Buttons -->
                            <button type="submit" class="btn btn-success"><i class="fas fa-filter"></i> Filter</button>
                            <button type="button" class="btn btn-secondary" id="resetButton"><i class="nav-icon fas fa-sync-alt"></i> Reset</button>
                        </div>
                    </div>
                </form>
                
                
                <!-- Hours Table -->
                <div class="table-responsive mb-4">
                    <table class="table table-bordered" style="border-color: black;">
                        <thead class="table table-success">
                            <tr class="text-center">
                                <th style="border-color: #000;">Practicum Hours Served</th>
                                <th style="border-color: #000;">Hours Served This Week</th>
                                <th style="border-color: #000;">Hours to Complete Practicum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td style="border-color: #000;">
                                    <input type="text" id="pracHourServed" class="form-control" style="width: 55px; height: 30px; margin: 0 auto;">
                                </td>
                                <td style="border-color: #000;">
                                    <input type="text" id="HourServedWeek" class="form-control" style="width: 55px; height: 30px; margin: 0 auto;">
                                </td>
                                <td style="border-color: #000;">
                                    <input type="text" id="HourToCompletePrac" class="form-control" style="width: 55px; height: 30px; margin: 0 auto;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Activities Section -->
                <div class="mb-4">
                    <h6 class="fw-bold">A. Accomplished activities</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table table-success">
                                <tr style="border-radius: 10px; border-color: #000;">
                                    <th style="width: 15%; border-color:#000; border-radius: 5%;">Date</th>
                                    <th style="width: 45%; border-color:#000; border-radius: 5%;">Nature of Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Base query
                                    $query = "SELECT a.*, u.fullname FROM tbl_accomplishments a 
                                            LEFT JOIN tbl_users u ON a.user_id = u.codename 
                                             WHERE 1=1 AND a.progs_status = 'finished'";

                                    // Initialize variables for query parameters
                                    $params = [];
                                    $types = '';

                                    // Check if user_id is provided
                                    if (!empty($selectedUserID)) {
                                        $query .= " AND a.user_id = ?";
                                        $params[] = $selectedUserID;
                                        $types .= 's';  // Type for string (user_id)
                                    }

                                    // Check if a date range is provided
                                    if (!empty($selectedDateRange)) {
                                    $dateRange = explode(' - ', $selectedDateRange);

                                        if (count($dateRange) === 2) {
                                            $startDate = $dateRange[0]; 
                                            $endDate = $dateRange[1];
                                            $query .= " AND a.date_started BETWEEN ? AND ?";
                                            $params[] = $startDate;
                                            $params[] = $endDate;
                                            $types .= 'ss';  // Types for two strings (dates)

                                        } else {
                                            echo "<tr><td colspan='5' class='text-danger'>Invalid date range provided.</td></tr>";
                                        }
                                    }

                                    // Add order by clause
                                    $query .= " ORDER BY a.date_started DESC";

                                    // Prepare the statement
                                    $stmt = $con->prepare($query);

                                    // Bind parameters if necessary
                                    if (!empty($params)) {
                                        $stmt->bind_param($types, ...$params);
                                    }

                                    // Execute and fetch results
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                        $currentDate = date('M. d Y', strtotime($row['date_started']));
                                        $time = date('H:i', strtotime($row['date_started']));
                                        $name = $row['fullname'] ?? $row['user_id']; // Use fullname if available, otherwise use user_id

                                        echo "
                                            <tr>
                                                <td>{$currentDate}</td>
                                                <td>{$row['accoms_desc']}</td>
                                            </tr>";
                                        }
                                    } else {

                                    echo "<tr><td colspan='5' class='text-center'>No finished tasks found for the selected filters.</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Knowledge Section -->
                <div class="mb-4">
                    <h6 class="fw-bold">B. Knowledge / skills gained and difficulties encountered for the period:</h6>
                    <textarea class="form-control" id="accoms_descField" name="accoms_desc" autocomplete="off" style="height: 100px;"></textarea>
                </div>
                
                <div class="signature-section">
                    <div class="row justify-content-around mt-2">
                        <div class="col-md-3 mb-3">
                            <hr class="signature-line">
                            <div class="fw-bold col-md-6 text-center" >Raymond P. Sadiwa (IT OFFICER II)</div>
                            <div class="fw-bold col-md-5 text-center">Officer-in-charge</div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <hr class="signature-line">
                            <div class="fw-bold col-md-5 text-center">Adviser</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<style type='text/css'>
   /* Signature section styling */
.signature-section {
    display: none; /* Hidden in regular view */
    margin-top: 100px; /* Large margin to ensure it's at the bottom */
    page-break-inside: avoid; /* Keep signatures together when printing */
}

.signature-title {
    border-top: 1px solid #000;
    padding-top: 0;
    width: 50%;
    margin: 0 auto;
}

/* Print styles */
@media print {
    .signature-section {
        display: block;
        position: relative;
        bottom: 0;
        width: 100%;
        clear: both;
        display: flex; /* Flexbox for alignment */
        justify-content: space-between; /* Spread out elements apart */
        padding: 0 20px; /* Optional: Adds some padding to the left and right */
    }

    .signature-line {
        display: block !important;
        width: 100% !important; /* Adjust width as needed */
        height: 10px !important;
        background-color: #000 !important;
        margin: 10px 0 !important; /* Adds margin for vertical spacing */
        visibility: visible !important;
        position: relative !important;
        page-break-inside: always !important;
    }

    /* Align the rows with space between them */
    .signature-section .row {
        display: flex; /* Flex container to align children in a row */
        justify-content: space-between; /* Space between columns */
        width: 100%;
    }

    /* Signature columns should take up equal space */
    .signature-section .col-md-3 {
        width: 30%; /* Adjust width for each signature block */
        text-align: center; /* Center-align text inside the column */
        float: none; /* Removes the float to allow flex alignment */
        padding: 60px 5px; /* Optional: Adds padding for spacing */
    }

    /* Align the signature line and label */
    .signature-column {
        display: flex;
        flex-direction: column; /* Stack signature line and label vertically */
        align-items: center; /* Center-align both signature line and label */
        justify-content: center;
        text-align: center;
    }

    /* Make sure input fields for signatures are hidden */
    input[type="text"] {
        border: none !important; /* Hides the border */
    }

    /* Hide everything by default */
    #filterForm .row {
        display: none;
    }

    /* Show only the Total Practicum Hours section */
    #filterForm .col-md-6 {
        display: block;
        width: 100%; /* Ensure it takes full width */
        margin-bottom: 10px; /* Add some space below */
    }

    /* Hide the buttons */
    #filterForm button {
        display: none !important;
    }

    /* Ensure the form itself doesn't have unnecessary padding/margins */
    #filterForm {
        margin: 0;
        padding: 0;
    }

    /* Optionally adjust font size for printing */
    #filterForm .form-label,
    #filterForm .form-control {
        font-size: 12px;
    }
}
</style>