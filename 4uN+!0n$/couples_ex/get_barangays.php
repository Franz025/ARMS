<?php
include('../../inc/lib/database.php');

$DBCon = new DB;

if (isset($_POST['citymunCode'])) {
    $citymunCode = $_POST['citymunCode'];
    $brgycode = $_POST['brgycode'];
    $barangays = $DBCon->con->query("SELECT id, brgyDesc,citymunCode,brgyCode FROM tbl_barangay WHERE citymunCode = '$citymunCode' ORDER BY brgyDesc ASC");

    echo '<option value="">Select Barangay</option>';
    
    while ($rowBrgy = $barangays->fetch_assoc()) { ?>
        <option value="<?php echo $rowBrgy['brgyCode'] ?>" <?php echo isset($rowBrgy['brgyCode']) && $rowBrgy['brgyCode'] == $brgycode ? 'selected' : ''; ?>
        ><?php echo $rowBrgy['brgyDesc'] ?></option>';
    <?php }
}
?>
