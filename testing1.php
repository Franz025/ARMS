<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h6 class="card-title" style="font-weight: bold; font-size: 15px;">
                <i class="nav-icon fas fa-cogs"></i>&nbsp;Ongoing System Requests
            </h6>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
                <button id="btngen" data-toggle="modal" data-target="#addUserModal" class="btn btn-success btn-sm">
                    <i class="fas fa-plus-circle"></i><b> Add New Request</b>
                </button>
            </div>
        </div>

        <div class="card-body">

            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;"> Republic of the Philippines </h6>
            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;"> Batangas City </h6>
            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;"> OFFICE OF THE CITY MAYOR </h6>
            <h6 class="text-center" style="font-family: Times New Roman; font-size: 24px;"> ACCOMPLISHMENT REPORT </h6>
            <br>

            <ul class="timeline-list">
                <?php
                include('../inc/connection.php');

                // Fetch records from the accomplishments table
                $query = "SELECT * FROM tbl_accomplishments ORDER BY date_started DESC";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $currentDate = date('d M. Y', strtotime($row['date_started']));
                    $time = date('H:i', strtotime($row['date_started']));
                    $name = $row['user_id'];

                    echo "
                        <li class='timeline-item'>
                            <strong>{$row['accoms_desc']}</strong> <strong>{$row['tracknumber']}</strong> by <strong>{$name}</strong> on <strong>{$currentDate}</strong> at <strong>{$time}</strong>.
                        </li>";
                }
                ?>
            </ul>

        </div>
    </div>
</div>

<style>
    .timeline-list {
        list-style-type: none;
        padding-left: 0;
        margin-left: 0;
    }

    .timeline-item {
        position: relative;
        padding-left: 20px;
        margin-bottom: 0px;
        font-family: Arial, sans-serif;
    }

    .timeline-item::before {
        content: "";
        position: absolute;
        left: 0;
        top: 10px;
        width: 10px;
        height: 10px;
        background-color: #176404;
        border-radius: 50%;
    }
</style>
