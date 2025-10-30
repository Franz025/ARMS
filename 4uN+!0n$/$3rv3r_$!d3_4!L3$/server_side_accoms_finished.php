<?php
session_start();
$ushertayp = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : '';
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
        'db' => $DB->getdb(),
        'host' => $DB->gethost_name(),
    );


    //     $table = <<<EOT
    //     (
    //        SELECT * FROM tbl_accomplishments 
    //     ) temp
    // EOT;

    $progs_status = ['FINISHED'];

$table = "
(
    SELECT tbl_accomplishments.*, tbl_users.image, tbl_services.servicesName
    FROM tbl_accomplishments
    LEFT JOIN 
        tbl_services
    ON
        tbl_services.id= tbl_accomplishments.services
    LEFT JOIN tbl_users 
        ON tbl_accomplishments.user_id = tbl_users.codename
    WHERE progs_status IN ('" . implode("', '", $progs_status) . "')
) temp";

$columns = array(
    
    array('db' => $primaryKey, 'dt' => 0),
    array('db' => 'tracknumber', 'dt' => 1),
    array('db' => 'servicesName', 'dt' => 2),
    array('db' => 'offices', 'dt' => 3),
    array('db' => 'accoms_desc', 'dt' => 4),
    array('db' => 'user_id', 'dt' => 5),
    array('db' => 'progs_status', 'dt' => 6),
    array('db' => 'date_started', 'dt' => 7),
    array('db' => 'date_finished', 'dt' => 8),

);


    // Process the data using SSP::simple
    $data = SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns);


    // Output the data as JSON
    echo json_encode($data);
}
