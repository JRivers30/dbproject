<?php
$host = "localhost";
$username = "root";  
$password = "";      
$database = "phplogin";
$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
    die("connection failed: " . $connection->connect_error);
}
?>
