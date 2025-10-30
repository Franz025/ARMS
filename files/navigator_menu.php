<?php include('../inc/connection.php'); ?>

<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
</div> -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4" style="position: fixed;">
    <!-- Brand Logo -->

    <style>
        .nav-sidebar .nav-item>.nav-link {
            /* Ensure the nav-link container allows positioning of badges */
            position: relative;
            font-style: Arial;
        }

        .nav-sidebar .nav-item>.nav-link .badge {
            /* Position badges to the right */
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 0;
            /* Align to the right edge of .nav-link */
        }

        .nav-sidebar .nav-item>.nav-link .right {
            transition: transform ease-in-out .3s;
        }

        .badge-success {
            color: #fff;
            background-color: #176404;
        }

        .badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            font-style: Arial;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        .nav.nav-treeview {
            padding-left: 20px;
            /* Adjust the indentation size as needed */
        }

        .nav.nav-treeview .nav-item {
            margin-bottom: 5px;
            /* Optional: Adds space between items */
        }
    </style>


    <?php
    include('../inc/connection.php');

    // Fetch the row with id=1
    $sql = "SELECT * FROM tbl_web_info WHERE id=1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Echo the data from the fetched row
        // echo "Website Title: " . $row['web_title'] . "<br>";
        // echo "Website Acronym: " . $row['web_acronym'] . "<br>";
        // echo "Website Footer: " . $row['web_footer'] . "<br>";
        // echo "Image: " . $row['image'] . "<br>";
    } else {
        die("0 results");
    }
    ?>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="sidebar-light">
            <div class="d-flex justify-content-center">
                <img src="../images/logos/<?php echo $row['image']; ?>" style="width: 150px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 8px;" class="img-fluid img-zoom" id="icon" title="Commission on Population and Development" alt="Commission on Population and Development">
            </div>
            <br>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                    <li class="nav-item dropdown">
                        <a href="./" class="nav-link nav-dashboard">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p style="font-weight: 500; font-style: Arial;">
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link nav-accoms_ongoing nav-accoms_finished">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p style="font-weight: 500; font-style: Arial;">
                                Assigned Task
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../pages/?page=accoms_ongoing" class="nav-link nav-accoms_ongoing">
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p style="font-weight: 500; font-style: Arial;"> Ongoing </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../pages/?page=accoms_finished" class="nav-link nav-accoms_finished">
                                    <i class="nav-icon fas fa-check-square"></i>
                                    <p style="font-weight: 500; font-style: Arial;"> Finished </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="../pages/?page=record_logs" class="nav-link nav-record_logs">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p style="font-weight: 500; font-style: Arial;"> Accomplishments Report </p>
                        </a>
                    </li>



                    <!-- <li class="nav-item">
                        <a href="../pages/?page=accomplishments_info" class="nav-link nav-accomplishments_info">
                            <i class="nav-icon fas fa-archive"></i>
                            <p style="font-weight: 700;"> Accomplishments </p>
                        </a>
                    </li> -->

                    <!-- <li class="nav-item">
                        <a href="../pages/?page=events_logs" class="nav-link nav-events_logs">
                            <i class="nav-icon 	fas fa-calendar-plus"></i>
                            <p style="font-weight: 700;"> Events Logs </p>
                        </a>
                    </li> -->

                    <?php
                    // Check if user_type is set in the session to avoid potential errors
                    if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1)) : ?>
                        <li class="nav-item">
                            <a href="../pages/?page=manage_users" class="nav-link nav-manage_users">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p style="font-weight: 500;"> Manage Users</p>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>
        </div>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



<script>
    $(document).ready(function() {
        var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'dashboard' ?>';
        var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
        page = page.split('/');
        page = page[0];
        if (s != '')
            page = page + '_' + s;

        if ($('.nav-link.nav-' + page).length > 0) {
            $('.nav-link.nav-' + page).addClass('active')
            $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
            if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
                $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
                $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
                $('.nav-link.nav-' + page).parent().addClass('menu-open')
            }
            var navItem = $('.nav-link.nav-' + page).closest('.nav-item');
            navItem.addClass('menu-is-opening menu-open');
        }

        $('.dropdown').on("click", function() {
            $(this).closest('.menu-open').removeClass('menu-open');
        });
    });
</script>