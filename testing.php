<?php include('../inc/connection.php');

$resultldalvar = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'ldalvar'";
$getresultldalvar = mysqli_query($con, $resultldalvar);
$countldalvar = mysqli_fetch_assoc($getresultldalvar);

$resultfrarenas = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'frarenas'";
$getresultfrarenas = mysqli_query($con, $resultfrarenas);
$countfrarenas = mysqli_fetch_assoc($getresultfrarenas);

$resultacgcadano = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'acgcadano'";
$getresultacgcadano = mysqli_query($con, $resultacgcadano);
$countacgcadano = mysqli_fetch_assoc($getresultacgcadano);

$resultmcmcelis = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'mcmcelis'";
$getresultmcmcelis = mysqli_query($con, $resultmcmcelis);
$countmcmcelis = mysqli_fetch_assoc($getresultmcmcelis);

$resultzdfaalam = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'zdfaalam'";
$getresultzdfaalam = mysqli_query($con, $resultzdfaalam);
$countzdfaalam = mysqli_fetch_assoc($getresultzdfaalam);

$resultjdibon = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'jdibon'";
$getresultjdibon = mysqli_query($con, $resultjdibon);
$countjdibon = mysqli_fetch_assoc($getresultjdibon);

$resultedlacsamana = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'edlacsamana'";
$getresultedlacsamana = mysqli_query($con, $resultedlacsamana);
$countedlacsamana = mysqli_fetch_assoc($getresultedlacsamana);

$resultaamacatangay = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'aamacatangay'";
$getresultaamacatangay = mysqli_query($con, $resultaamacatangay);
$countaamacatangay = mysqli_fetch_assoc($getresultaamacatangay);

$resultjhmedrano = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'jhmedrano'";
$getresultjhmedrano = mysqli_query($con, $resultjhmedrano);
$countjhmedrano = mysqli_fetch_assoc($getresultjhmedrano);

$resultbvpagsinuhin = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'bvpagsinuhin'";
$getresultbvpagsinuhin = mysqli_query($con, $resultbvpagsinuhin);
$countbvpagsinuhin = mysqli_fetch_assoc($getresultbvpagsinuhin);

$resultlgsapinoso = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'lgsapinoso'";
$getresultlgsapinoso = mysqli_query($con, $resultlgsapinoso);
$countlgsapinoso = mysqli_fetch_assoc($getresultlgsapinoso);

// Query to count records with app_status 'PENDING' for the present day
$resultinterviewed_by = "SELECT COUNT(app_status) AS total FROM tbl_pmcis WHERE app_status = 'PENDING' AND DATE(date_interview) = CURDATE()";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$countpending = mysqli_fetch_assoc($getresultinterviewed_by);

// Query to count records with app_status 'CANCELLED' for the present day
$resultinterviewed_by = "SELECT COUNT(app_status) AS total FROM tbl_pmcis WHERE app_status = 'CANCELLED' AND DATE(date_interview) = CURDATE()";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$countcancelled = mysqli_fetch_assoc($getresultinterviewed_by);

// Query to count records with app_status2 'RENEWAL' for the present day
$resultinterviewed_by = "SELECT COUNT(*) AS total FROM tbl_pmcis WHERE app_status2 = 'RENEWAL' AND DATE(date_interview) = CURDATE()";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$countrenewal = mysqli_fetch_assoc($getresultinterviewed_by);
$total_count_renewal = $countrenewal['total'];

// Query to count records with app_status 'APPROVED' for the present day
$resultinterviewed_by = "SELECT COUNT(*) AS total FROM tbl_pmcis WHERE app_status = 'APPROVED' AND DATE(date_interview) = CURDATE()";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$countapproved = mysqli_fetch_assoc($getresultinterviewed_by);
$total_count_approved = $countapproved['total'];

// // Generate yesterday's and today's date in Y-m-d H:i:s format
// $yesterday_date = date('Y-m-d H:i:s', strtotime('-1 day'));
// $today_date = date('Y-m-d H:i:s');

// // Query for yesterday's date
// $result_yesterday = "SELECT COUNT(*) AS total_yesterday FROM tbl_pmcis WHERE DATE(date_interview) = DATE('$yesterday_date') AND date_interview IS NOT NULL AND date_interview <> ''";
// $getresult_yesterday = mysqli_query($con, $result_yesterday);

// // Query for today's date
// $result_today = "SELECT COUNT(*) AS total_today FROM tbl_pmcis WHERE DATE(date_interview) = DATE('$today_date') AND date_interview IS NOT NULL";
// $getresult_today = mysqli_query($con, $result_today);


// SQL query to count released status 1
$resultinterviewed_by = "SELECT COUNT(app_status) AS total FROM tbl_pmcis WHERE app_status = 'APPROVED'";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$count2approved = mysqli_fetch_assoc($getresultinterviewed_by);

// SQL query to count released status 1
$resultinterviewed_by = "SELECT COUNT(released_status) AS total FROM tbl_pmcis WHERE released_status = 'RELEASED'";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$countreleased1 = mysqli_fetch_assoc($getresultinterviewed_by);

// SQL query to count released status 1
$resultinterviewed_by = "SELECT COUNT(app_status2) AS total FROM tbl_pmcis WHERE app_status2 = 'RENEWAL'";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$count2renewal = mysqli_fetch_assoc($getresultinterviewed_by);

// SQL query to count released status 2
$resultinterviewed_by = "SELECT COUNT(released_status2) AS total FROM tbl_pmcis WHERE released_status2 = 'RELEASED'";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$countreleased2 = mysqli_fetch_assoc($getresultinterviewed_by);

// Variables for the current month and year
$month = date('m');
$monthly = date('F');
$year = date('Y');
$previousYear = $year - 1;

// Query to get daily totals for the current month
$queryDaily = "
SELECT DAY(date_interview) AS day, COUNT(*) AS total
FROM tbl_pmcis
WHERE MONTH(date_interview) = '$month' AND YEAR(date_interview) = '$year'
GROUP BY DAY(date_interview)
ORDER BY day ASC
";

$resultDaily = mysqli_query($con, $queryDaily);

$days = [];
$dailyTotals = [];

// Initialize arrays for all days in the month
for ($i = 1; $i <= 31; $i++) {
    $days[] = $i;
    $dailyTotals[] = 0;
}

// Populate the daily totals with query results
while ($row = mysqli_fetch_assoc($resultDaily)) {
    $day = $row['day'];
    $dailyTotals[$day - 1] = $row['total'];
}

// Encode data for use in JavaScript
$days = json_encode($days);
$dailyTotals = json_encode($dailyTotals);

// Query to get monthly totals of Pending + Cancelled, Approved, and Renewal
$queryMonthly = "
    SELECT MONTH(date_interview) AS month,
           SUM(CASE WHEN app_status IN ('PENDING', 'CANCELLED') THEN 1 ELSE 0 END) AS pending_cancelled_total,
           SUM(CASE WHEN app_status = 'APPROVED' THEN 1 ELSE 0 END) AS approved_total,
           SUM(CASE WHEN app_status2 = 'RENEWAL' THEN 1 ELSE 0 END) AS renewal_total
    FROM tbl_pmcis
    WHERE YEAR(date_interview) = '$year'
    GROUP BY MONTH(date_interview)
    ORDER BY month ASC
";

$resultMonthly = mysqli_query($con, $queryMonthly);

$months = [];
$monthlyPendingCancelled = [];
$monthlyApproved = [];
$monthlyRenewal = [];

// Initialize arrays for all months in the year
for ($i = 1; $i <= 12; $i++) {
    $months[] = date('F', mktime(0, 0, 0, $i, 1));
    $monthlyPendingCancelled[] = 0;
    $monthlyApproved[] = 0;
    $monthlyRenewal[] = 0;
}

// Populate the monthly totals with query results
while ($row = mysqli_fetch_assoc($resultMonthly)) {
    $monthIndex = $row['month'] - 1;
    $monthlyPendingCancelled[$monthIndex] = $row['pending_cancelled_total'];
    $monthlyApproved[$monthIndex] = $row['approved_total'];
    $monthlyRenewal[$monthIndex] = $row['renewal_total'];
}

// Encode data for use in JavaScript
$months = json_encode($months);
$monthlyPendingCancelled = json_encode($monthlyPendingCancelled);
$monthlyApproved = json_encode($monthlyApproved);
$monthlyRenewal = json_encode($monthlyRenewal);

?>


<style>
    .large-chart-rpt {
        height: 400px !important;

    }

    .large-chart {
        height: 732px !important;

    }

    .medium-chart {
        height: 732px !important;

    }

    .square-chart {
        height: 732px !important;

    }

    .custom-table {
        font-family: 'Arial', sans-serif;
        /* Change font family */
        font-size: 0px;
        /* Change font size */
        color: #333;
        /* Change font color */
    }

    .custom-table th,
    .custom-table td {
        padding: 8px 12px;
        /* Adjust padding */
    }

    .custom-table th {
        background-color: #f8f9fa;
        /* Change header background color */
    }

    .top-performer {
        background-color: #d4edda;
        /* Highlight top performers with a background color */
    }

    .top-performer strong {
        color: #155724;
        /* Change font color for top performers */
    }

    .leaderboard-table {
        font-size: 1.1em;
    }

    .leaderboard-table .top-performer {
        background-color: #f0f8ff;
        /* Light blue for top performers */
        font-weight: bold;
    }

    .leaderboard-table tr td:first-child {
        text-align: absolute;
    }
</style>

<div class="row">

    <div class="col-md-8">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-chart-line"></i>
                    &nbsp; Chart Application </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#summary-chart" data-toggle="tab"><strong><i class="fas fa-chart-bar"></i>
                                    Summary </strong></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="chart tab-pane active" id="summary-chart">
                        <div class="card mb-3" style="height: 350px; border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); display: flex; align-items: center; justify-content: center; margin: 5px; padding: 10px;">
                            <canvas id="myDailyChart" class="chartjs-render-monitor large-chart-rpt chart-canvas" style="max-width: 100%; max-height: 100%;"></canvas>
                        </div>
                        <div class="card mb-3" style="height: 350px; border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); display: flex; align-items: center; justify-content: center; margin: 5px; padding: 10px;">
                            <canvas id="myMonthlyChart" class="chartjs-render-monitor large-chart-rpt chart-canvas"
                                style="max-width: 100%; max-height: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <!-- First Row -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="callout callout-success info-box shadow">
                    <div class="info-box-content">
                        <span class="info-box-text">CANCELLED TODAY:</span>
                        <span class="info-box-number">
                            <h4 class="text-bold">
                                <?php echo $countcancelled['total']; ?>
                            </h4>
                        </span>
                    </div>
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-user-times"></i>
                    </span>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="callout callout-success info-box shadow">
                    <div class="info-box-content">
                        <span class="info-box-text">PENDING TODAY:</span>
                        <span class="info-box-number">
                            <h4 class="text-bold">
                                <?php echo $countpending['total']; ?>
                            </h4>
                    </div>
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-user-clock"></i>
                    </span>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="callout callout-success info-box shadow">
                    <div class="info-box-content">
                        <span class="info-box-text">RENEWAL TODAY:</span>
                        <span class="info-box-number">
                            <h4 class="text-bold">
                                <?php echo $countrenewal['total']; ?>
                            </h4>
                    </div>
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-user-check"></i>
                    </span>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="callout callout-success info-box shadow">
                    <div class="info-box-content">
                        <span class="info-box-text">PRE-MARRIAGE TODAY:</span>
                        <span class="info-box-number">
                            <h4 class="text-bold">
                                <?php echo $total_count_approved; ?>
                            </h4>
                    </div>
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-users"></i>
                    </span>
                </div>
            </div>
        </div>


        <!-- Leaderboard Card -->
        <div class="card card-outline card-success" style="height: 603px;">
            <div class="card-header">
                <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-crown"></i>
                    &nbsp;
                    Leaderboard Application </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="encodersTable" class="table table-striped table-bordered leaderboard-table custom-table">
                        <thead class="thead-success">
                            <tr>
                                <!-- <th class="text-center">Rank</th> -->
                                <th class="text-center">Encoder Name</th>
                                <th class="text-center">Encoded Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $names = ["LEA D. ALVAR", "FRANCIS R. ARENAS", "AIZA CAREN G. CADANO", "MARIA CATHERINE M. CELIS", "ZION D. FAALAM", "JANETTE D. IBON", "EULALI D. LACSAMANA", "ARLYN A. MACATANGAY", "JUSTINE D. MARIANO", "BABYLYN V. PAGSINUHIN", "LYKA G. SAPINOSO"];
                            $counts = [
                                $countldalvar['total'],
                                $countfrarenas['total'],
                                $countacgcadano['total'],
                                $countmcmcelis['total'],
                                $countzdfaalam['total'],
                                $countjdibon['total'],
                                $countedlacsamana['total'],
                                $countaamacatangay['total'],
                                $countjhmedrano['total'],
                                $countbvpagsinuhin['total'],
                                $countlgsapinoso['total']
                            ];

                            $leaderboard = array_map(null, $names, $counts);
                            usort($leaderboard, function ($a, $b) {
                                return $b[1] - $a[1];
                            });

                            foreach ($leaderboard as $i => $entry) {
                                $rank = $i + 1;
                                $name = $entry[0];
                                $count = $entry[1];
                                $rowClass = ($rank <= 3) ? 'top-performer' : '';

                                // Determine the crown icon based on rank
                                // switch ($rank) {
                                //     case 1:
                                //         $crownIcon = "<i class='fas fa-crown' style='color: gold;'></i>"; // Gold crown
                                //         break;
                                //     case 2:
                                //         $crownIcon = "<i class='fas fa-crown' style='color: silver;'></i>"; // Silver crown
                                //         break;
                                //     case 3:
                                //         $crownIcon = "<i class='fas fa-crown' style='color: bronze;'></i>"; // Bronze crown
                                //         break;
                                //     default:
                                //         $crownIcon = ""; // No crown for other ranks
                                //         break;
                                // }

                                // echo "<tr class='$rowClass'>";
                                // // echo "<td><strong>$crownIcon $rank</strong></td>";
                                echo "<td><strong>$name</strong></td>";
                                echo "<td style='text-align: center;'>$count</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3" style="border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3" style="border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <p class="text-center mt-2"><i class="far fa-check-circle"></i><b> Approved Application </b></p>
                        <div class="progress" style="height: 25px; border-radius: 10px;">
                            <div id="progressApproved" class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3" style="border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <p class="text-center mt-2"><i class="fas fa-sign-out-alt"></i><b> Certification Released for
                                Approved Application </b></p>
                        <div class="progress" style="height: 25px; border-radius: 10px;">
                            <div id="progressReleased1" class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3" style="border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <p class="text-center mt-2"><i class="fas fa-check-double"></i><b> Renewal Application </b></p>
                        <div class="progress" style="height: 25px; border-radius: 10px;">
                            <div id="progressRenewal" class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3" style="border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <p class="text-center mt-2"><i class="fas fa-sign-out-alt"></i><b> Certification Released for
                                Renewal Application </b></p>
                        <div class="progress" style="height: 25px; border-radius: 10px;">
                            <div id="progressReleased2" class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Data fetched from PHP
    var approved = <?php echo $count2approved['total']; ?>;
    var released1 = <?php echo $countreleased1['total']; ?>;
    var renewal = <?php echo $count2renewal['total']; ?>;
    var released2 = <?php echo $countreleased2['total']; ?>;

    // Total count (you can calculate this based on your actual total data)
    var total = approved + released1 + renewal + released2;

    // Calculate percentages
    var approvedPercent = (approved / total) * 100;
    var released1Percent = (released1 / total) * 100;
    var renewalPercent = (renewal / total) * 100;
    var released2Percent = (released2 / total) * 100;

    // Set progress bar widths and text
    document.getElementById('progressApproved').style.width = approvedPercent + '%';
    document.getElementById('progressApproved').innerText = Math.round(approvedPercent) + '%';

    document.getElementById('progressReleased1').style.width = released1Percent + '%';
    document.getElementById('progressReleased1').innerText = Math.round(released1Percent) + '%';

    document.getElementById('progressRenewal').style.width = renewalPercent + '%';
    document.getElementById('progressRenewal').innerText = Math.round(renewalPercent) + '%';

    document.getElementById('progressReleased2').style.width = released2Percent + '%';
    document.getElementById('progressReleased2').innerText = Math.round(released2Percent) + '%';
</script>


<script>
    $(document).ready(function() {
        $('#encodersTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "drawCallback": function(oSettings) {
                if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                }
            }
        });
    });

    // Daily chart with a line on top of the bar chart
    var days = <?php echo $days; ?>;
    var dailyTotals = <?php echo $dailyTotals; ?>;

    var ctxDaily = document.getElementById('myDailyChart').getContext('2d');
    var dailyChart = new Chart(ctxDaily, {
        type: 'bar',
        data: {
            labels: days,
            datasets: [{
                label: 'Daily Encoded (Bar)',
                data: dailyTotals,
                backgroundColor: 'rgba(23, 100, 4, 0.5)',
                borderColor: 'rgba(23, 100, 4, 1)',
                borderWidth: 2,
                datalabels: {
                    color: 'black',
                    anchor: 'end',
                    align: 'top',
                    offset: -10,
                    font: {
                        weight: 'bold'
                    }
                }
            }, {
                label: 'Daily Encoded (Line)',
                data: dailyTotals,
                type: 'line',
                fill: false,
                borderColor: 'rgba(23, 100, 4, 1',
                borderWidth: 2,
                datalabels: {
                    color: 'black',
                    font: {
                        weight: 'bold'
                    }
                }
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            },
            plugins: {
                datalabels: {
                    display: true,
                    color: 'black',
                    font: {
                        weight: 'bold'
                    }
                }
            }
        }
    });

    // Monthly chart with 3 bars (Pending + Cancelled, Approved, Renewal)
    var months = <?php echo $months; ?>;
    var pendingCancelledTotals = <?php echo $monthlyPendingCancelled; ?>;
    var approvedTotals = <?php echo $monthlyApproved; ?>;
    var renewalTotals = <?php echo $monthlyRenewal; ?>;

    var ctxMonthly = document.getElementById('myMonthlyChart').getContext('2d');
    var monthlyChart = new Chart(ctxMonthly, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                    label: 'Pending',
                    data: pendingCancelledTotals,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                },
                {
                    label: 'Approved',
                    data: approvedTotals,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                },
                {
                    label: 'Renewal',
                    data: renewalTotals,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Month',
                        font: {
                            weight: 'bold'
                        }
                    },
                    ticks: {
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total',
                        font: {
                            weight: 'bold'
                        }
                    },
                    ticks: {
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            }
        }
    });
</script>