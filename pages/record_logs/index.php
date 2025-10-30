<?php
// Include database connection
include('../inc/connection.php');
include('../pages/record_logs/job_order.php');
include('../pages/record_logs/ojt.php');

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
if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1)) : ?>
<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h6 class="card-title" style="font-weight: bold; font-size: 15px;">
                <i class="nav-icon fas fa-clipboard-list"></i>&nbsp; Accomplishment Report
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

        <div class="card-body">
            <!-- Date Range Picker and User ID Form -->
            <form method="POST" action="" id="filterForm">
                <div class="row d-flex justify-content-center">
                    <!-- Date Range Picker -->
                    <div class="col-md-3">
                        <label for="dateRange"><b>Select Date Range:</b></label>
                        <input type="text" id="dateRange" class="form-control" name="date_range" placeholder="Select date range" value="<?php echo $selectedDateRange; ?>" autocomplete="off">
                    </div>

                    <!-- User ID Input -->
                    <div class="col-md-3">
                        <label for="user_id" class="form-label"><b>Personnel ID:</b></label>
                        <select class="form-control select" name="user_id" id="user_id" autocomplete="off">
                            <!-- Placeholder option -->
                            <option value="" selected disabled>Please select...</option>
                            
                            <?php
                            // Query to get user list
                            $UserIDSql = $con->prepare("SELECT * FROM `tbl_users`");
                            $UserIDSql->execute();
                            $resultUserID = $UserIDSql->get_result();

                            // Loop through the users and add them as options in the select box
                            while ($rowUserID = $resultUserID->fetch_assoc()) {
                                // Determine if this option should be selected based on user selection
                                $isSelected = ($rowUserID['codename'] == $selectedUserID) ? 'selected' : '';
                                echo "<option value='{$rowUserID['codename']}' {$isSelected}>{$rowUserID['fullname']}</option>";
                            }
                            ?>
                        </select>
                    </div> 
                    <div class="col-md-2" style="margin-top: 25px; margin-bottom: 10px;">
                        <!-- Filter and Reset Buttons -->
                        <button type="submit" class="btn btn-success"><i class="fas fa-filter"></i> Filter</button>
                        <button type="button" class="btn btn-secondary" id="resetButton"><i class="nav-icon fas fa-sync-alt"></i> Reset</button>
                    </div>
                </div>
            </form>

            <!-- Report Header -->
            <div class="print-header">
                <img src="../images/logos/ITSD-Logo.png" class="rounded mx-auto d-block" alt="image" style="width: 100px; height: 100px; margin-top: 20px;">
                <h6 class="text-center" style="font-family: 'Times New Roman', Times, serif; font-size: 24px; font-weight: bold; margin-top: 20px;">ACCOMPLISHMENT REPORT</h6>
                <p class="text-center" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;"><?php echo $formattedDateRange; ?></p>
            </div>

            <!-- Accomplishments Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Accomplishment Description</th>
                            <th>Track Number</th>
                            <th>Personnel Name</th>
                            <th>Date</th>
                            <th>Time</th>
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
                                $currentDate = date('d M. Y', strtotime($row['date_started']));
                                $time = date('H:i', strtotime($row['date_started']));
                                $name = $row['fullname'] ?? $row['user_id']; // Use fullname if available, otherwise use user_id

                                echo "
                                <tr>
                                    <td>{$row['accoms_desc']}</td>
                                    <td>{$row['tracknumber']}</td>
                                    <td>{$name}</td>
                                    <td>{$currentDate}</td>
                                    <td>{$time}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No accomplishments found for the selected filters.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="signatures-section">
                <div class="row mt-5">
                    <div class="col-md-6 text-center">
                        <p class="mt-2"><strong><?php echo $name ?></strong></p>
                        <p class="title">OJT - Programmer</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <p class="mt-2"><strong>Raymond P. Sadiwa</strong></p>
                        <p class="title">IT Officer II</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Include daterangepicker CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Include jQuery and daterangepicker JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Initialize the Date Range Picker -->
<script type="text/javascript">
    $(function() {
        // Initialize the date range picker
        $('#dateRange').daterangepicker({
            opens: 'left',
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                format: 'YYYY-MM-DD'
            }
        });

        // Set date range if the form is submitted with a date range
        var selectedDateRange = "<?php echo $selectedDateRange; ?>";
        if (selectedDateRange) {
            var dates = selectedDateRange.split(' - ');
            $('#dateRange').data('daterangepicker').setStartDate(dates[0]);
            $('#dateRange').data('daterangepicker').setEndDate(dates[1]);
            $('#dateRange').val(selectedDateRange); // Update input field value
        }

        // When a date range is selected, update the input field
        $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

        // If the user clears the selection
        $('#dateRange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        // Reset button functionality
        $('#resetButton').on('click', function() {
            // Clear the date range and user ID
            $('#dateRange').val('');
            $('#user_id').val('');
            // Submit the form to reload the page with no filters
            $('#filterForm').submit();
        });

        // Print functionality
        $('#printButton').on('click', function() {
            window.print();
        });
    });
</script>

<style type="text/css">
    /* Regular styles */
    .card-body {
        padding: 1.5rem;
    }
    
    .table-responsive {
        margin-top: 20px;
    }

    /* Signature section styling */
    .signatures-section {
        display: none; /* Hidden in regular view */
        margin-top: 100px; /* Large margin to ensure it's at the bottom */
    }

    .signature-title {
        border-top: 1px solid #000;
        padding-top: 5px;
        width: 50%;
        margin: 0 auto;
    }
    
    /* Print styles */
    @media print {
        /* Hide elements you don't want to appear during printing */
        #filterForm, .card-tools, #resetButton, .card-header, form, .btn {
            display: none !important;
        }
        
        /* Hide the card outline and anything above the title */
        .card, .card-outline, .card-success {
            border: none !important;
            box-shadow: none !important;
        }
        
        /* Remove any margin or padding from container */
        .container-fluid {
            padding: 0 !important;
            margin: 0 !important;
        }
        
        /* Remove card-body padding for cleaner print */
        .card-body {
            padding: 0 !important;
        }

        .signatures-section {
            display: block;
            position: relative;
            padding-bottom: 10%;
            bottom: 0;
            width: 100%;
            clear: both;
        }
        
        .signatures-section .row {
            display: flex;
            width: 100%;
        }
        
        .signatures-section .col-md-6 {
            width: 50%;
            float: left;
        }
        
        /* Hide any browser-generated headers */
        @page {
            margin-top: 0;
        }
        
        /* Hide the document header that shows date, time and page title */
        head, header, title {
            display: none !important;
        }
        
        /* Start the print layout with the title */
        body {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }
        
        /* Make sure the print header is shown as the first element */
        .print-header {
            display: block !important;
            margin-bottom: 20px;
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
        
        /* Specifically hide any date/time headers that browsers might add */
        .header-content, .header-date, .header-time {
            display: none !important;
        }
        
        /* Styling for the printed table */
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        /* Page break settings */
        @page {
            size: portrait;
            margin: 0.5in;
            margin-top: 0;
            margin-bottom: 0;
        }
        
        /* Remove background colors and use only black text for printing */
        body {
            background: white;
            color: black;
        }
        
        /* Add a title/header to the printed document */
        .print-header h6 {
            font-size: 24px !important;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        
        .print-header p {
            font-size: 18px !important;
            text-align: center;
            margin-bottom: 20px;
        }
        
        /* Explicitly remove any footers */
        footer, .footer, .main-footer, #footer {
            display: none !important;
        }
        
        /* Force the browser not to add default headers and footers */
        html, body {
            height: auto;
        }
        
        /* Remove any content that might appear at the bottom of the page */
        body::after {
            content: none !important;
        }
    }
</style>