<?php
$db_sname= "localhost";
$db_unmae= "root";
$db_password = "";
$db_name = "unofers";
$conn = mysqli_connect($db_sname, $db_unmae, $db_password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}
