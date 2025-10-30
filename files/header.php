<?php
include('../inc/connection.php');

// Fetch the row with id=1
$sql = "SELECT * FROM tbl_web_info WHERE id=1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Echo the data from the fetched row
    // echo "Website Footer: " . $row['web_name'] . "<br>";
    // echo "Website Title: " . $row['web_title'] . "<br>";
    // echo "Website Acronym: " . $row['web_acronym'] . "<br>";
    // echo "Website Footer: " . $row['web_footer'] . "<br>";
    // echo "Image: " . $row['image'] . "<br>";
} else {
    die("0 results");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $row['web_name']; ?> </title>
    <link rel="icon" href="../images/logos/ITSD-Logo.png" />
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../dist/css/adminlte.css"> -->
    <link rel="stylesheet" href="../dist/css/rps.min.css">

    <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- <script>
        let timeout;
        const TIMEOUT_DURATION = 600000; // 1 minute

        function resetTimer() {
            clearTimeout(timeout);
            timeout = setTimeout(redirectToLockscreen, TIMEOUT_DURATION);
        }

        function redirectToLockscreen() {
            window.location.href = '../pages/?page=lockscreen';
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.addEventListener('mousemove', resetTimer);
            document.addEventListener('keypress', resetTimer);
            resetTimer();
        });
    </script> -->

    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>

    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms;
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }


        /** PACE JS */
        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .pace-inactive {
            display: none;
        }

        .pace .pace-progress {
            z-index: 9999;
            background: #176404;
            position: absolute;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: 3px;
        }

        /* ===== Scrollbar CSS ===== */
        /* Firefox */
        :root {
            --primary-color: #008000;
            --primary-hover: #90ee90;
            --scrollbar-bg: #FFFFFF;
            --scrollbar-hover: #000000;
        }

        * {
            scrollbar-width: thin;
            scrollbar-color: var(--primary-color);
        }

        /* Chrome, Edge and Safari */
        *::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }

        *::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: #FFFFFF;
            border-radius: 6px;
        }

        *::-webkit-scrollbar-track:hover {
            background-color: #F2FCFF;
        }

        *::-webkit-scrollbar-track:active {
            background-color: #E6F0F3;
        }

        *::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-color: #176404;
            border: 2px solid #FFFFFF;
            transition: background-color 0.3s ease;
        }

        *::-webkit-scrollbar-thumb:hover {
            background-color: #62A34B;
        }

        *::-webkit-scrollbar-thumb:active {
            background-color: #62A34B;
        }
    </style>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>

    <!-- PACE progress -->
    <script src="../plugins/pace-progress/pace.min.js"></script>


    <!-- remove  the comment below to execute the function of avoid the inspect element -->

    <!-- <script>
  // Function to prevent F12 key
  document.onkeydown = function(event) {
    if (event.keyCode == 123 || (event.ctrlKey && event.shiftKey && event.keyCode == 73)) { // F12 key code or Ctrl + Shift + I
      return false;
    }
  }

  // Function to prevent right-click context menu
  document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
  });
</script> -->
</head>