<?php

date_default_timezone_set("Asia/Manila");

$con = mysqli_connect("localhost", "root", "", "arms_db");


if (!$con) {
    die('Connection Failed: ' . mysqli_connect_error());
}


