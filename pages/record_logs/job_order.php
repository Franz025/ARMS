<?php
// Include database connection
include('../inc/connection.php');

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
?>

<?php
if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 2)) : ?>
<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h6 class="card-title" style="font-weight: bold; font-size: 15px;">
                <i class="nav-icon fas fa-cogs"></i>&nbsp; Accomplishment Report
            </h6>
            <div class="card-tools">
                <button type="button" class="btn btn-success btn-sm" style="font-weight: bold;" id="printButton">Print
                    <i class="fas fa-print"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <!-- Date Range Picker and User ID Form -->
            <form method="POST" action="">
                <div class="row  d-flex justify-content-center">
                    <!-- Date Range Picker -->
                    <div class="col-md-3">
                        <label for="dateRange"><b>Select Date Range:</b></label>
                        <input type="text" id="dateRange" class="form-control" name="date_range" placeholder="Select date range" value="<?php echo $selectedDateRange; ?>" autocomplete="off">
                    </div>

                    <!-- User ID Input -->
                    <div class="col-md-3">
                        <label for="user_id" class="form-label"><b>Personnel ID:</b></label>
                        <select class="form-control select" name="user_id" id="user_id" autocomplete="off">
                            <option selected="" disabled="" value="">Please select...</option>
                            <?php
                            $UserIDSql = $con->prepare("SELECT * FROM `tbl_users`");
                            $UserIDSql->execute();
                            $resultUserID = $UserIDSql->get_result();

                            $selectedUserID = isset($_POST['user_id']) ? $_POST['user_id'] : '';

                            while ($rowUserID = $resultUserID->fetch_assoc()):
                            ?>
                                <option value="<?php echo $rowUserID['codename'] ?>"
                                    <?php echo ($rowUserID['codename'] == $selectedUserID) ? 'selected' : '' ?>>
                                    <?php echo $rowUserID['fullname'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-top: 25px; margin-bottom: 10px; font-family: Arial;">
                        <!-- Filter and Reset Buttons -->
                        <button type="submit" class="btn btn-success"><i class="fas fa-filter"></i> Filter </button>
                        <button type="button" class="btn btn-secondary" id="resetButton"><i class="nav-icon fas fa-sync-alt"></i> Reset </button>
                    </div>
                </div>
                <br>
            </form>
            <br>

            <!-- Report Header -->
            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;">Republic of the Philippines</h6>
            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;">Batangas City</h6>
            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;">OFFICE OF THE CITY MAYOR</h6>
            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;">ACCOMPLISHMENT REPORT</h6>
            <h6 class="text-center" style="font-family: Arial; font-size: 20px;"><?php echo $formattedDateRange ?></h6>
            <br>

            <!-- Accomplishments List -->
            <ul class="text-left" style="font-family: Arial; font-size: 16px; font-display: double;">
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
                        <li class='timeline-item'>
                            {$row['accoms_desc']} 
                        </li>";
                    }
                } else {
                    echo "<li>No accomplishments found for the selected filters.</li>";
                }
                ?>
            </ul>

            <div class="signatures-section">
                <div class="row mt-5">
                    <div class="col-md-6 text-center">
                        <p class="mt-2"><strong><?php echo $name ?></strong></p>
                        <p class="title">J.O.</p>
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
            $('#user_id').val('').change();
            // Submit the form to reload the page with no filters
            $('form').submit();
        });
    });
</script>

<style type="text/css">
    .double-spacing {
        line-height: 5%;
    }

    /* Regular styles for screen */
    .signatures-section {
        display: block;
        position: relative;
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

/* Print-specific styles */
@media print {
    body {
        margin: 0;
        padding-bottom: 0;
        height: 100%;
        position: relative;
    }

    .double-spacing {
        line-height: 5%;
    }

    .signatures-section {
        position: absolute;
        bottom: 90px;
        width: 100%;
        margin: 0;
        padding: 10px 0; /* Adjust padding as needed */
    }

    .signatures-section .row {
        display: block;  /* Adjust the layout for print */
    }

    .signatures-section .col-md-6 {
        width: 100%;  /* Full width for each column in print */
        float: none;  /* Remove float for proper layout */
    }
}
</style>