<?php

// Initialize the session
session_start();

$authenticated = false;
if (isset($_SESSION["username"])) {
  $authenticated = true;
} 

if (empty($_SESSION["username"])) {
  $_SESSION = array();

  session_destroy();

  header("location: index.php");
  }
?>

<?php
if ($authenticated) {
   
?>


  <!DOCTYPE html>
  <html lang="en" class="" style="height: auto;">
  <?php require_once('../files/header.php') ?>

  <body class="layout-fixed layout-footer-fixed text-sm sidebar-mini control-sidebar-slide-open layout-navbar-fixed " data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
      <?php require_once('../files/topbar.php') ?>
      <?php require_once('../files/navigator_menu.php') ?>

      <?php $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';  ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 567.854px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <!-- <div class="col-sm-6">
                <h1 class="m-0"><?php echo ucwords(str_replace("_", " ", $page)) ?></h1>
              </div> -->
              <!-- /.col -->
              <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="./admin?<?php echo $page ?>"><?php echo ucwords(str_replace("_", " ", $page)) ?></a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
              </div> -->
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <?php
            if (!file_exists($page . ".php") && !is_dir($page)) {
              include '404.php';
            } else {
              if (is_dir($page))
                include $page . '/index.php';
              else
                include $page . '.php';
            }
            ?>
          </div>
        </section>
        <!-- /.content -->

      </div>
      <!-- /.content-wrapper -->
      <?php require_once('../files/footer.php') ?>
  </body>

  </html>

<?php
} else {
  header("location: ../index.php");
?>

<?php } ?>