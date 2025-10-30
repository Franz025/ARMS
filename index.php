<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login | </title>
    <link rel="icon" href="images/logos/ITSD-Logo.png" />
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="dist/css/adminlte.css"> -->
    <link rel="stylesheet" href="dist/css/rps.min.css">

    <link rel="stylesheet" type="text/css" href="login.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <style type="text/css">
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
    </style>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>


    <!-- PACE progress -->
    <script src="plugins/pace-progress/pace.min.js"></script>


    <!-- remove  the comment below to execute the function of avoid the inspect element -->

    <script>
        // Function to prevent F12, Ctrl+Shift+I, and Ctrl+U
        document.onkeydown = function(event) {
            // F12 key code or Ctrl + Shift + I or Ctrl + U
            if (event.keyCode == 123 ||
                (event.ctrlKey && event.shiftKey && event.keyCode == 73) ||
                (event.ctrlKey && event.keyCode == 85)) {
                return false;
            }
        };

        // Function to prevent right-click context menu
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    </script>
</head>

<?php

if (isset($_SESSION["username"])) {
    header("location: ./pages/");
    exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = 'Email and Password are Required!';
    } else {
        include('../arms/inc/lib/database.php');
        $dbConnection = new DB();

        $statement = $dbConnection->con->prepare(
            "SELECT id, username, fullname, codename, email, contactnum, password, user_type, image, created_at, updated_at FROM tbl_users WHERE username = ?"

        );


        $statement->bind_param("s", $username);


        $statement->execute();


        $statement->bind_result($id, $username, $fullname, $codename, $email, $contactnum, $stored_password, $user_type, $image, $created_at, $updated_at);

        if ($statement->fetch()) {
            if (md5($password) === $stored_password) {

                session_start();

                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                $_SESSION["fullname"] = $fullname;
                $_SESSION["codename"] = $codename;
                $_SESSION["email"] = $email;
                $_SESSION["contactnum"] = $contactnum;
                $_SESSION["user_type"] = $user_type;
                $_SESSION["image"] = $image;
                $_SESSION["created_at"] = $created_at;
                $_SESSION["updated_at"] = $updated_at;


                header("location: ./pages/");
                exit;
            }
        }

        $statement->close();

        $error = "Email or Password Invalid!";
    }
}

?>

<body>
    <div class="split-layout">
        <div class="login-container">
            <?php
            include('inc/connection.php');

            // Fetch the row with id=1
            $sql = "SELECT * FROM tbl_web_info WHERE id=1";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                die("0 results");
            }
            ?>

            <div class="form-wrapper fadeInDown">
                <div id="formContent">
                    <!-- Icon -->
                    <div class="fadeIn first">
                        <img src="images/logos/<?php echo $row['image']; ?>" class="img-fluid img-zoom" id="icon" title="Commission on Population and Development" alt="Commission on Population and Development">
                    </div>
                    <b class="web-title">
                        <?php echo $row['web_title']; ?> </b>
                    <br>
                    <b class="web-acronym">
                        <?php echo $row['web_acronym']; ?> </b>

                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control <?= !empty($error) ? 'is-invalid': ''; ?>" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-addon1">
                            <?php if (!empty($error)) { ?>
                                <div class="invalid-feedback">
                                    Invalid Username.
                                </div>
                            <?php } ?>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control <?= !empty($error) ? 'is-invalid': ''; ?>" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1">
                            <?php if (!empty($error)) { ?>
                                <div class="invalid-feedback">
                                    Invalid Password.
                                </div>
                            <?php } ?>
                        </div>

                        <div class="d-flex justify-content-center text-center w-100">
                            <input type="submit" class="btn btn-primary" value="Log In" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="background-container">
            <!-- This div will hold the background image -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>