<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "mathboost_registered_users";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>