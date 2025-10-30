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

<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h6 class="card-title" style="font-weight: bold; font-size: 15px;">
                <i class="nav-icon fas fa-cogs"></i>&nbsp; Accomplishment Report
            </h6>
            <div class="card-tools">
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
                    <div class="col-md-2">
                        <label for="dateRange"><b>Select Date Range:</b></label>
                        <input type="text" id="dateRange" class="form-control" name="date_range" placeholder="Select date range" value="<?php echo $selectedDateRange; ?>" autocomplete="off">
                    </div>

                    <!-- User ID Input -->
                    <div class="col-md-2">
                        <label for="user_id" class="form-label"><b>Employee ID:</b></label>
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
                    <div class="col-md-2" style="margin-top: 25px; margin-bottom: 10px;">
                        <!-- Filter and Reset Buttons -->
                        <button type="submit" class="btn btn-success"><i class="fas fa-filter"></i></button>
                        <button type="button" class="btn btn-secondary" id="resetButton"><i class="nav-icon fas fa-sync-alt"></i></button>
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
            <p class="text-center" style="font-family: Times New Roman; font-size: 20px;"><?php echo $formattedDateRange; ?></p>
            <br>

            <!-- Accomplishments List -->
            <ul class="text-left" style="font-family: Times New Roman; font-size: 16px;">
                <?php
                // Base query
                $query = "SELECT * FROM tbl_accomplishments WHERE 1=1";

                // Check if user_id is provided
                if (!empty($selectedUserID)) {
                    $query .= " AND user_id = ?";
                }

                // Check if a date range is provided
                if (isset($_POST['date_range']) && !empty($_POST['date_range'])) {
                    $dateRange = explode(' - ', $_POST['date_range']);
                    if (count($dateRange) === 2) {
                        $startDate = $dateRange[0];
                        $endDate = $dateRange[1];
                        $query .= " AND date_started BETWEEN ? AND ?";
                    } else {
                        echo "<li class='text-danger'>Invalid date range provided.</li>";
                    }
                }

                // Prepare and bind the statement
                $stmt = $con->prepare($query);

                // Bind parameters based on filters
                if (!empty($selectedUserID) && !empty($startDate) && !empty($endDate)) {
                    $stmt->bind_param('sss', $selectedUserID, $startDate, $endDate);
                } elseif (!empty($selectedUserID)) {
                    $stmt->bind_param('s', $selectedUserID);
                }

                // Execute and fetch results
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $currentDate = date('d M. Y', strtotime($row['date_started']));
                        $time = date('H:i', strtotime($row['date_started']));
                        $name = $row['user_id'];

                        echo "
                        <li class='timeline-item'>
                            <strong>{$row['accoms_desc']}</strong> <strong>{$row['tracknumber']}</strong> by <strong>{$name}</strong> on <strong>{$currentDate}</strong> at <strong>{$time}</strong>.
                        </li>";
                    }
                } else {
                    echo "<li>No accomplishments found for the selected filters.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

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