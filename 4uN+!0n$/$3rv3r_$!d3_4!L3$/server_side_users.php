<?php
session_start();

// Check user type from session
$ushertayp = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : '';

// If user type is 1, 2, or 3
if ($ushertayp == 1 || $ushertayp == 2 || $ushertayp == 3) {

    require('../../inc/lib/ssp.class.php');
    require_once('../../inc/lib/database.php');
    
    $DB = new DB;

    // Define the primary key
    $primaryKey = 'id'; // Change 'id' to your actual primary key column name

    // SQL server connection information
    $sql_details = array(
        'user' => $DB->getuser_name(),
        'pass' => $DB->getpassword(),
        'db'   => $DB->getdb(),
        'host' => $DB->gethost_name(),
    );

    $table = <<<EOT
    (
       SELECT * FROM tbl_users 
    ) temp
EOT;

    $columns = array(
        array('db' => $primaryKey, 'dt' => 0),
        array('db' => 'image', 'dt' => 1),
        array('db' => 'username', 'dt' => 2),
        array('db' => 'fullname', 'dt' => 3),
        array('db' => 'codename', 'dt' => 4),
        array('db' => 'email', 'dt' => 5),
        array('db' => 'contactnum', 'dt' => 6),
        array('db' => 'user_type', 'dt' => 7),
    );

    // Process the data using SSP::simple
    $data = SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns);

    // Output the data as JSON
    echo json_encode($data);

} else {
    // If user type is not 1, 2, or 3, show 404 page

    require_once('../files/header.php');
?>
    <style>
        /* Your CSS code here */
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-white navbar-light text-sm fixed-top">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <b style="height: 1.93725rem; padding: 0.35rem 1rem; font-size: 1.2rem;"> Population on Commission Management System (PCMS) </b>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <div class="d-flex justify-content-end">
                <div class="custom-control custom-switch custom-switch-darkmode mt-2 ml-5" style="position:absolute;">
                    <input type="checkbox" class="custom-control-input custom-input-darkmode" id="darkModeToggle">
                    <label class="custom-control-label" for="darkModeToggle">
                        <i class="fas" style="position: absolute; z-index: -2222; margin-top: -500px;"></i>
                    </label>
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="../images/logos/Anonymous_profilee.jpg" class="img-circle elevation-2" style="width:30px; height: 30px; margin-top:-5px; object-fit: cover;object-position:center center;" title="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius: 5px;">
                        <li class="user-header">
                            <img style="object-fit: cover; object-position:center center;" src="../images/users_profile/" class="img-circle elevation-2" alt="User Image">
                            <p>
                                <div class="d-inline-flex justify-content-center ">
                                    <b>
                                        <!-- <?php echo $_SESSION["fullname"] ?> -->
                                    </b>
                                </div>
                                <br>
                                <!-- <small><?php echo $_SESSION["email"] ?><br></small> -->
                            </p>
                        </li>
                        <li class="user-footer" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                            <a href="../pages/?page=update_profile" class="btn btn-success"><strong><i class="fas fa-user mr-2"></i>Profile</strong></a>
                            <a href="javascript:void(0)" class="btn btn-success float-right" onclick="location.replace('<?php echo '../logout.php' ?>')" role="button"><strong><i class="fas fa-sign-out-alt mr-2"></i> Log-out</strong></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </ul>
    </nav>

    <br><br><br><br><br><br><br><br>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>
                        <div class="contant_box_404">
                            <h3 class="h2">Look like you're lost</h3>
                            <p>The page you are looking for is not available!</p>
                            <a href="" class="link_404">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer text-sm d-flex justify-content-between align-items-end fixed-bottom">
        <!-- Left-side content -->
        <div class="d-flex align-items-center">
            <img src="../images/logos/CHO-Logo.png" class="img-fluid" style="width: 30px;" alt="City Health Office" title="City Health Office">
            &nbsp; <b> PopCom MS © v1.0.0 2024</b>
        </div>
        <!-- Right-side content -->
        <div class="d-flex align-items-center">
            <div class="d-flex justify-content-center">
                <b> <?php echo date('F d, Y (l)'); ?> </b> &nbsp;&nbsp; / &nbsp;&nbsp;
                <b id="clock"> <?php echo date('H:i:s'); ?> </b>
                <script>
                    function updateTime() {
                        var now = new Date();
                        var hours = now.getHours();
                        var minutes = now.getMinutes();
                        var seconds = now.getSeconds();
                        var ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // Handle midnight (0 hours)
                        hours = (hours < 10 ? "0" : "") + hours;
                        minutes = (minutes < 10 ? "0" : "") + minutes;
                        seconds = (seconds < 10 ? "0" : "") + seconds;
                        var timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
                        document.getElementById('clock').innerHTML = timeString;
                    }
                    setInterval(updateTime, 1000); // Update every second
                </script>
            </div>
            &nbsp;&nbsp;&nbsp;
            <img src='../images/logos/BatangasCitySeal.png' class="img-fluid" style="width: 30px;" alt="City Government of Batangas" title="City Government of Batangas">
            <img src='../images/logos/EBD Magkatuwang Tayo logo.jpg' class="img-fluid" style="width: 25px;" alt="EBD Magkatuwang Tayo" title="EBD Magkatuwang Tayo">
            <img src="../images/logos/ITSD-Logo.png" class="img-fluid" style="width: 30px;" alt="IT Services Division" title="IT Services Division">
        </div>
    </footer>

    <!-- ./wrapper -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>

    <script>
        const darkTheme = 'dark-mode';
        const iconTheme = 'fa-moon';

        const themeButton = document.getElementById('darkModeToggle');
        const iconElement = document.querySelector('.custom-control-label i');

        const selectedTheme = localStorage.getItem('selected-theme_pcms');
        const selectedIcon = localStorage.getItem('selected-icon_pcms');

        const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light';
        const getCurrentIcon = () => iconElement.classList.contains(iconTheme) ? 'fa-moon' : 'fa-sun';

        if (selectedTheme) {
            document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme);
            themeButton.checked = selectedTheme === 'dark';
            iconElement.classList[selectedIcon === 'fa-moon' ? 'add' : 'remove'](iconTheme);
            iconElement.classList.add(selectedIcon);
        } else {
            iconElement.classList.add('fa-sun');
        }

        themeButton.addEventListener('change', () => {
            document.body.classList.toggle(darkTheme);
            iconElement.classList.toggle('fa-moon');
            iconElement.classList.toggle('fa-sun');

            localStorage.setItem('selected-theme_pcms', getCurrentTheme());
            localStorage.setItem('selected-icon_pcms', getCurrentIcon());
        });
    </script>

<?php } ?>
