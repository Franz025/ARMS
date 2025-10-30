<?php
include('../../inc/lib/database.php');

$DBCon = new DB;

if (isset($_POST['provCode'])) {
    $provCode = $_POST['provCode'];
    $cities = $DBCon->con->query("SELECT citymunCode, citymunDesc FROM tbl_city_municipality WHERE provCode = '$provCode' ORDER BY citymunDesc ASC");

    echo '<option value="">Select City/Municipality</option>';
    while ($rowCity = $cities->fetch_assoc()) {
        echo '<option value="'.$rowCity['citymunCode'].'">'.$rowCity['citymunDesc'].'</option>';
    }
}
?>
