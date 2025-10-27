<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "dpharm_college";
$servername = "srv1988.hstgr.io";
$username = "u448940947_road2tech";
$password = "Road2Tech";
$dbname = "u448940947_viopdhanore";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db_create_query = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!$conn->query($db_create_query)) {
    die("Database creation failed: " . $conn->error);
}
$conn->select_db($dbname);
?>