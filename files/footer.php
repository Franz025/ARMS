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

<div class="row">
  <footer class="main-footer text-sm d-flex justify-content-between align-items-center">
    <!-- Left-side content -->
    <div class="d-flex align-items-center">
      <!-- <img src="../images/logos/CHO-Logo.png" class="img-fluid" style="width: 30px;" alt="City Health Office" title="City Health Office"> -->
      <!-- <img src="../images/logos/PopCom-Logo.png" class="img-fluid" style="width: 30px;" alt="Commission on Population and Development" title="Commission on Population and Development"> -->
      &nbsp; <b>
        <?php echo $row['web_footer']; ?></b>
    </div>

    <!-- Center content -->


    <!-- Right-side content -->
    <div class="d-flex align-items-center">

      <!-- <div class="d-flex justify-content-center">
        <b> <?php echo date('F d, Y (l)'); ?> </b> &nbsp;&nbsp; / &nbsp;&nbsp;
        <b id="clock"> <?php echo date('H:m:s'); ?> </b>

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
      &nbsp;&nbsp;&nbsp; -->

      <img src='../images/logos/BatangasCitySeal.png' class="img-fluid" style="width: 30px;" alt="City Government of Batangas" title="City Government of Batangas">
      <img src='../images/logos/EBD Magkatuwang Tayo logo.jpg' class="img-fluid" style="width: 25px;" alt="EBD Magkatuwang Tayo" title="EBD Magkatuwang Tayo">
      <img src="../images/logos/ITSD-Logo.png" class="img-fluid" style="width: 30px;" alt="IT Services Division" title="IT Services Division">
      <!-- <img src="../images/logos/Bagong Pilipinas-Logo.png" class="img-fluid" style="width: 30px;" alt="Bagong Pilipinas" title="Bagong Pilipinas"> -->
    </div>
  </footer>
</div>

<!-- ./wrapper -->

    <!-- ApexChart.JS -->
    <script src="../plugins/chart.js/ApexChart.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- BS-Stepper -->
<script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>




<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- overlayScrollbars -->
<!-- <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- Popper JS -->
<script src="../plugins/popper/popper.js"></script>