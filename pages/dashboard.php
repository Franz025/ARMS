<?php
include('../inc/connection.php');

// Fetch total accomplishments
$query = "SELECT COUNT(*) as total FROM tbl_accomplishments";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$totalAccomplishments = $row['total'];

// Fetch accomplishments by status
$query = "SELECT progs_status, COUNT(*) as count FROM tbl_accomplishments GROUP BY progs_status";
$result = mysqli_query($con, $query);
$accomplishmentStatus = array();
while($row = mysqli_fetch_assoc($result)) {
    $accomplishmentStatus[$row['progs_status']] = $row['count'];
}

// Fetch monthly accomplishments for the current year
$query = "SELECT MONTH(date_finished) as month, COUNT(*) as count 
          FROM tbl_accomplishments 
          WHERE YEAR(date_finished) = YEAR(CURRENT_DATE())
          GROUP BY MONTH(date_finished)";
$result = mysqli_query($con, $query);
$monthlyData = array_fill(0, 12, 0); // Initialize all months to 0
while($row = mysqli_fetch_assoc($result)) {
    $monthlyData[$row['month']-1] = $row['count'];
}

// Fetch total users 
$query = "SELECT COUNT(*) as total FROM tbl_users";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$totalUsers = $row['total'];
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card {
            border-radius: 15px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .stat-card {
            background-color: #28a745;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .stat-card h6 {
            color: white;
        }
        .stat-card h4 {
            color: white;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        .stat-icon {
            color: white;
        }
    </style>

<div class="bg-light">
    <div class="container-fluid py-4">
        <div class="row g-4">
            <!-- Stats Cards -->
            <div class="col-md-6 col-lg-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Total Accomplishments</h6>
                                <h4 id="totalAccomplishments" class="card-title">
                                    <?php echo $totalAccomplishments; ?>
                                </h4>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Finished Accomplishments</h6>
                                <h4 id="finishedAccomplishments" class="card-title">
                                    <?php echo isset($accomplishmentStatus['FINISHED']) ? $accomplishmentStatus['FINISHED'] : 0; ?>
                                </h4>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Ongoing Accomplishments</h6>
                                <h4 id="ongoingAccomplishments" class="card-title">
                                    <?php echo isset($accomplishmentStatus['ONGOING']) ? $accomplishmentStatus['ONGOING'] : 0; ?>
                                </h4>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-spinner"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Total Users</h6>
                                <h4 id="totalUsers" class="card-title">
                                    <?php echo $totalUsers; ?>
                                </h4>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

            <!-- Charts -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Accomplishments</h5>
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Accomplishment Status</h5>
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Monthly Chart
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Accomplishments',
                    data: <?php echo json_encode($monthlyData); ?>,
                    borderColor: 'green',
                    tension: 0.3,
                    fill: true,
                    backgroundColor: 'rgba(242, 248, 244, .1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Status Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Finished', 'Ongoing'],
                datasets: [{
                    data: [
                        <?php echo isset($accomplishmentStatus['FINISHED']) ? $accomplishmentStatus['FINISHED'] : 0; ?>,
                        <?php echo isset($accomplishmentStatus['ONGOING']) ? $accomplishmentStatus['ONGOING'] : 0; ?>
                    ],
                    backgroundColor: ['rgba(114, 223, 42, 0.88)', 'rgba(25, 189, 126, 0.89)']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>
</script>
