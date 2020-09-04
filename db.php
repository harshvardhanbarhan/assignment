<?php 
// echo IMAGETYPE_PNG;
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$connection = new mysqli("localhost","root","codefire","registration_db");
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>