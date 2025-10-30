<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-archive"></i> &nbsp;
                Accomplishments Record </h3>
            <div class="d-flex justify-content-end">
                <div class="col-md-3">
                    <div class="d-flex align-items-center">
                        <div class="col-md-5">
                            <!-- Adjusted column size for label -->
                            <label for="year_select"><strong>SELECT YEAR:</strong></label>
                        </div>
                        <div class="col-md-7">
                            <!-- Adjusted column size for select box -->
                            <select class="form-control select2" name="year_select" id="year_select">
                                <?php
                                $currentYear = date('Y');
                                $yearselect = isset($_GET['year']) ? $_GET['year'] : '';

                                for ($year = $currentYear; $year >= $currentYear - 30; $year--) {
                                    $selected = ($year == $yearselect) ? 'selected' : '';
                                    echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <!-- Automatically adjusts width -->
                    <button class="btn btn-success ms-2" type="button" id="printacms"><i class="fa fa-print"></i>
                        Print</button>
                </div>
            </div>

        </div>

        <div class="card-body">

            <div class="container-fluid" id="print_outacms">

                <table id="example" class="table table-bordered table-striped">
                    <thead class="thead-light">

                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            Month </th>
                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            Interview </th>
                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            25 < Below </th>
                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            26 > Above </th>
                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            Total </th>
                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            Release </th>
                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            No. of Session </th>
                        <th class="text-center  text-bold" style="background: #176404  !important;
        color: white ;">
                            With Foreign Partner </th>

                    </thead>
                    <tbody>
                        <?php
                        include('../inc/connection.php');

                        // Initialize an array to hold monthly totals
                        $monthly_totalsinterview = array();
                        $monthly_totals25below = array();
                        $monthly_totals26above = array();
                        $monthly_total_counts = array();
                        $monthly_total_release = array();
                        $monthly_total_pmcsched = array();
                        $monthly_total_afam = array();

                        $total = 0;
                        $total_interview = 0;
                        $total_25below = 0;
                        $total_26above = 0;
                        $total_counts = 0;
                        $total_release = 0;
                        $total_num_session = 0;
                        $total_afam = 0;

                        // Loop through each month (1 to 12)
                        for ($month = 1; $month <= 12; $month++) {
                            // Prepare the query for the current month

                            $year = isset($_GET['year']) ? $_GET['year'] : '';
                            if ($year) {
                                $query = "SELECT 
                                            COUNT(*) AS interview, 
                                            SUM(CASE WHEN g_age <= 25 AND b_age <= 25 THEN 1 ELSE 0 END) AS count_25below, 
                                            SUM(CASE WHEN g_age > 25 AND b_age > 25 THEN 1 ELSE 0 END) AS count_26above, 
                                            SUM( CASE WHEN DATE(pmc_sched) = DATE(date_interview) THEN 1 ELSE NULL END ) AS count_pmcschedss, 
                                            SUM( CASE WHEN DATE(pmc_sched) <> DATE(date_interview) THEN 1 ELSE NULL END ) AS count_pmcsched,
                                            SUM(CASE WHEN app_status2 = 'RENEWAL' THEN 1 ELSE 0 END) AS count_renewal,  
                                            SUM(CASE WHEN app_status = 'PENDING' THEN 1 ELSE 0 END) +1 AS count_cancelled,  
                                            SUM(CASE WHEN app_status = 'CANCELLED' THEN 1 ELSE 0 END) *2 AS count_cancelled2,                                      
                                            SUM(CASE WHEN g_foreign_partner = 'YES' OR b_foreign_partner = 'YES' THEN 1 ELSE 0 END) AS count_AFAM 
                                          FROM `tbl_pmcis` 
                                          WHERE MONTH(date_interview) = '$month' AND YEAR(date_interview) = '$year'";
                            } else {
                                $query = "SELECT 
                                            COUNT(*) AS interview, 
                                            SUM(CASE WHEN g_age <= 26 OR b_age <= 26 THEN 1 ELSE 0 END) AS count_25below, 
                                            SUM(CASE WHEN g_age >= 25 OR b_age >= 25 THEN 1 ELSE 0 END) AS count_26above, 
                                            SUM( CASE WHEN DATE(pmc_sched) = DATE(date_interview) THEN 1 ELSE NULL END ) AS count_pmcschedss, 
                                            SUM( CASE WHEN DATE(pmc_sched) <> DATE(date_interview) THEN 1 ELSE NULL END ) AS count_pmcsched,
                                            SUM(CASE WHEN app_status2 = 'RENEWAL' THEN 1 ELSE 0 END) AS count_renewal,
                                            SUM(CASE WHEN app_status = 'PENDING' THEN 1 ELSE 0 END) +1 AS count_cancelled, 
                                            SUM(CASE WHEN app_status = 'CANCELLED' THEN 1 ELSE 0 END) *2 AS count_cancelled2,                                        
                                            SUM(CASE WHEN g_foreign_partner = 'YES' OR b_foreign_partner = 'YES' THEN 1 ELSE 0 END) AS count_AFAM 
                                          FROM `tbl_pmcis` 
                                          WHERE MONTH(date_interview) = '$month' AND YEAR(date_interview) = YEAR(CURDATE())";
                            }


                            // Execute the query
                            $result = $con->query($query);

                            if ($result) {
                                // Fetch the result into an associative array
                                $row = $result->fetch_assoc();

                                $timestamp = mktime(0, 0, 0, $month, 1);


                                // Store the results in the monthly_totals arrays
                                $monthly_totalsinterview[$month] = $row['interview'];
                                $monthly_totals25below[$month] = $row['count_25below'];
                                $monthly_totals26above[$month] = $row['count_26above'];
                                $monthly_total_counts[$month] = ($row['count_25below'] + $row['count_26above']);
                                $monthly_total_release[$month] = ($row['count_25below'] + $row['count_26above'] + $row['count_renewal']);
                                $monthly_total_pmcsched[$month] = ($row['count_pmcsched'] + $row['count_pmcschedss']);
                                $monthly_total_afam[$month] = $row['count_AFAM'];


                                $total_interview += $row['interview'];
                                $total_25below += $row['count_25below'];
                                $total_26above += $row['count_26above'];
                                $total_counts += ($row['count_25below'] + $row['count_26above']);
                                $total_release += ($row['count_25below'] + $row['count_26above'] + $row['count_renewal']);
                                $total_num_session += ($row['count_pmcsched'] + $row['count_pmcschedss']);
                                $total_afam += $row['count_AFAM'];


                        ?>
                                <tr>
                                    <td class="text-center text-bold ">
                                        <?php echo date('F', $timestamp) ?>
                                    </td>

                                    <td class="text-center text-bold">
                                        <?php echo isset($monthly_totalsinterview[$month]) ? $monthly_totalsinterview[$month] : 0; ?>
                                    </td>

                                    <td class="text-center text-bold">
                                        <?php echo isset($monthly_totals25below[$month]) ? $monthly_totals25below[$month] : 0 ?>
                                    </td>

                                    <td class="text-center text-bold">
                                        <?php echo isset($monthly_totals26above[$month]) ? ($monthly_totals26above[$month]) : 0 ?>
                                    </td>

                                    <td class="text-center text-bold">
                                        <?php echo isset($monthly_total_counts[$month]) ? $monthly_total_counts[$month] : 0 ?>
                                    </td>

                                    <td class="text-center text-bold">
                                        <?php echo isset($monthly_total_release[$month]) ? $monthly_total_release[$month] : 0 ?>
                                    </td>

                                    <td class="text-center text-bold">
                                        <?php echo isset($monthly_total_pmcsched[$month]) ? $monthly_total_pmcsched[$month] : 0 ?>
                                    </td>

                                    <td class="text-center text-bold">
                                        <?php echo isset($monthly_total_afam[$month]) ? $monthly_total_afam[$month] : 0 ?>
                                    </td>
                                </tr>
                        <?php } else {
                                // Handle query error if needed
                                echo "Query failed: " . $con->error;
                            }
                        }


                        ?>

                        <tr>
                            <td class="text-center text-bold bg-success" style="background: #176404  !important;
        color: white;">
                                TOTAL </td>
                            <td class="text-center text-bold totalrow_bg">
                                <?php echo $total_interview; ?>
                            </td>
                            <td class="text-center text-bold totalrow_bg">
                                <?php echo $total_25below; ?>
                            </td>
                            <td class="text-center text-bold totalrow_bg">
                                <?php echo $total_26above; ?>
                            </td>
                            <td class="text-center text-bold totalrow_bg">
                                <?php echo $total_counts; ?>
                            </td>

                            <td class="text-center text-bold totalrow_bg">
                                <?php echo $total_release; ?>
                            </td>

                            <td class="text-center text-bold totalrow_bg">
                                <?php echo $total_num_session; ?>
                            </td>
                            <td class="text-center text-bold totalrow_bg">
                                <?php echo $total_afam; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#year_select').change(function() {
            // Get the selected value
            var selectedYear = $(this).val();

            window.location.href = "../pages/?page=accomplishments_info&year=" + selectedYear;
        });
    })
</script>

<script>
    $(document).ready(function() {
        $('#printacms').click(function() {
            var selectedYear = $('#year_select').val(); // Retrieve selected year from the dropdown

            var _h = $('head').clone();
            var _p = $('#print_outacms').clone();
            var _el = $('<div>');

            // Add title and logo in a row
            var logo2 =
                '<img src="../images/logos/Bagong Pilipinas-Logo.png" alt="Logo" style="max-width: 80px; margin-left: 0px;">';
            var logo =
                '<img src="../images/logos/BatangasCitySeal.png" alt="Logo" style="max-width: 75px; margin-left: 0px;">';
            var title =
                '<h2 class="text-center" style="font-family: Times New Roman;" margin-left: 20px; "> POPCOM DIVISION ( ' +
                selectedYear + ' )</b></h2>;';
            var title1 =
                '<h3 class="text-center" style="font-family: Times New Roman;" margin-left: 20px; "> ACCOMPLISMENT REPORT </b></h3>';
            var logo1 =
                '<img src="../images/logos/CHO-Logo.png" alt="Logo" style="max-width: 80px; margin-left: 0px;">';
            var logo3 =
                '<img src="../images/logos/PopCom-Logo.png" alt="Logo" style="max-width: 100px; margin-left: -12px;">';


            _el.append(_h);
            _el.append('<style>' +
                'html, body, .wrapper { -webkit-print-color-adjust: exact !important; -webkit-filter: opacity(1) !important; print-color-adjust: exact !important; margin: 15px; }' +
                '.pace .pace-progress { background: transparent; }' +
                '.inputRemove { border: 0px !important; }' +
                '@media print { .print-title { display: flex; align-items: center; justify-content: center; } .print-title h1 { margin-right: 20px; } .print-logo { margin-left: 20px; } }' +
                '.totalrow_bg { background: #eaeaea !important; color: black; }</style>');

            _el.append('<div class="print-title">' + logo2 + logo + title + logo1 + logo3 + '</div>');
            _el.append('<div class="print-title">' + title1 + '</div>');
            _el.append(_p);

            var printFrame = $('<iframe>', {
                id: 'printFrame'
            });

            $('body').append(printFrame);

            var printDocument = printFrame[0].contentDocument || printFrame[0].contentWindow.document;
            printDocument.write(_el.html());
            printDocument.close();

            printFrame.on('load', function() {
                setTimeout(function() {
                    printFrame[0].contentWindow.print();
                    setTimeout(function() {
                        printFrame.remove();
                    }, 300);
                }, 500);
            });
        });
    });
</script>