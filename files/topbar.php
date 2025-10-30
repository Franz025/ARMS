<div id="preloader">
    <div class="loader-holder"></div>
</div>

<script>
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 1500);
    });
</script>

<style type="text/css">
    .dark-mode {
        background-color: #343a40;
        color: white;
    }

    .dark-mode .btn {
        background-color: #495057;
        border-color: #6c757d;
    }

    .dark-mode nav,
    .dark-mode aside {
        background-color: #343a40;
    }

    .dark-mode a {
        color: var(--light) !important;
    }

    .dark-mode .titlebold {
        color: white !important;
    }

    .custom-switch {
        padding-left: 0 !important;
        margin-left: -3.26rem;
    }

    .custom-switch-darkmode .custom-control-label::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 1.8rem;
        height: 1rem;
        background-color: #b1c8de;
        border-radius: 1rem;
        transition: background-color 0.15s ease-in-out;
    }

    .custom-switch-darkmode .custom-control-label::after {
        content: '\f185';
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        top: -0.25rem;
        left: -0.25rem;
        width: 1.5rem;
        height: 1.5rem;
        background-color: #fff000;
        border-radius: 50%;
        transition: transform 0.15s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-input-darkmode:checked~.custom-control-label::before {
        background-color: #b1c8de;
    }

    .custom-input-darkmode:checked~.custom-control-label::after {
        transform: translateX(1.25rem);
        content: '\f186';
    }

    .custom-switch .custom-control-input:checked~.custom-control-label::after {
        background-color: #899cad;
        transform: translateX(.75rem);
    }

    .nav-item.dropdown .dropdown-menu {
        width: 350px;
        padding: 0;
        border-radius: 0;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .nav-item.dropdown .dropdown-item {
        padding: 10px 15px;
        font-size: 14px;
    }

    .nav-item.dropdown .dropdown-item .media i {
        font-size: 20px;
        color: #007bff;
    }

    .nav-item.dropdown .dropdown-item-title {
        margin: 0;
        font-weight: 500;
        color: #333;
    }

    .nav-item.dropdown .dropdown-header {
        font-weight: bold;
        background-color: #f8f9fa;
        padding: 10px 15px;
        border-bottom: 1px solid #dee2e6;
    }

    .nav-item.dropdown .dropdown-footer {
        text-align: center;
        background-color: #f8f9fa;
        padding: 10px 15px;
        font-weight: bold;
        border-top: 1px solid #dee2e6;
    }

    .nav-item.dropdown .badge-warning {
        background-color: #f44336;
        color: #fff;
    }

    .nav-item.dropdown .text-muted {
        color: #888 !important;
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


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="position: relative padding-right" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <b style="height: 1.93725rem; padding: 0.35rem 1rem; font-size: 1.2rem;">
                <?php echo $row['web_title']; ?>
                <?php echo $row['web_acronym']; ?></b>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <ul class="navbar-nav ml-auto">

            <div style="margin-top: 5px; margin-bottom: 0px;">
                <b>
                    <?php echo date('F d, Y (l)'); ?></b> &nbsp; / &nbsp;
                <b id="clock">
                    <?php echo date('H:i'); ?></b>  
            </div>
            &nbsp;&nbsp;


            <?php
            // Check if user_type is set in the session to avoid potential errors
            if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1)) : ?>
                <div class="d-flex justify-content-end position:relative">
                    <div class="custom-control custom-switch custom-switch-darkmode mt-2 ml-5" style="position:relative;">
                        <input type="checkbox" class="custom-control-input custom-input-darkmode" id="darkModeToggle">
                        <label class="custom-control-label" for="darkModeToggle">
                            <i class="fas" style="position: absolute; z-index: -2222; margin-top: -500px; position:relative"></i>
                        </label>
                    </div>
                </div>
            <?php endif; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <script>
                function updateTime() {
                    var now = new Date();
                    var hours = now.getHours();
                    var minutes = now.getMinutes();
                    var ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // Handle midnight (0 hours)
                    hours = (hours < 10 ? "0" : "") + hours;
                    minutes = (minutes < 10 ? "0" : "") + minutes;
                    var timeString = hours + ':' + minutes + ampm;
                    document.getElementById('clock').innerHTML = timeString;
                }
                setInterval(updateTime, 1000); // Update every second
            </script>


            <li class="nav-item dropdown user-menu">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="../images/users_profile/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2"
                        style="width:30px; height: 30px; margin-top:-5px; object-fit: cover; object-position:center center;"
                        title="<?php echo $_SESSION['fullname']; ?>">
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius: 5px;">
                    <li class="user-header">
                        <img style="object-fit: cover; object-position:center center;" src="../images/users_profile/<?php echo $_SESSION['image']; ?>"
                            class="img-circle elevation-2" alt="User Image">

                        <p>
                        <b><?php echo $_SESSION['codename']; ?></b>
                        <br>
                        <div class="d-inline-flex justify-content-center ">
                            <b><?php echo $_SESSION['username']; ?></b>
                        </div>
                        <br>
                        <small>
                            <?php echo $_SESSION['fullname']; ?><br></small>
                        </p>
                    </li>
                    <li class="user-footer" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                        <a href="../pages/?page=update_profile" class="btn btn-success"><strong><i class="fas fa-user mr-2"></i>Profile</strong></a>
                        <a href="javascript:void(0)" class="btn btn-success float-right" onclick="location.replace('<?php echo '../logout.php'; ?>')"
                            role="button"><strong><i class="fas fa-sign-out-alt mr-2"></i> Log-out</strong></a>
                    </li>
                </ul>
            </li>

        </ul>
    </ul>
</nav>
<!-- /.navbar -->

<script>
    const darkTheme = 'dark-mode';
    const iconTheme = 'fa-moon';

    const themeButton = document.getElementById('darkModeToggle');
    const iconElement = document.querySelector('.custom-control-label i');

    const selectedTheme = localStorage.getItem('selected-theme_pmms'); //change this value of want(must be with the 'localStorage.setItem('selected-theme_systeminitials', getCurrentTheme());' below)
    const selectedIcon = localStorage.getItem('selected-icon_pmms'); //change this value of want(must be with the 'localStorage.setItem('selected-theme_systeminitials', getCurrentTheme());' below)

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

        localStorage.setItem('selected-theme_pmms', getCurrentTheme()); //here I said
        localStorage.setItem('selected-icon_pmms', getCurrentIcon()); //also here I said
    });
</script>