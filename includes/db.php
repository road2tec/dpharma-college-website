<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dpharm_college";
// $servername = "sql204.infinityfree.com";
// $username = "if0_39613481";
// $password = "OKkuWtOrzAcBlNm";
// $dbname = "if0_39613481_dpharm_college";

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