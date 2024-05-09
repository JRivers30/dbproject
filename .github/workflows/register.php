<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "phplogin";
$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"], $_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    $stmt = $connection->prepare("INSERT INTO accounts (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        header('Location: login.html');
    } else {
        echo 'Error: ' . $connection->error;
    }
    $stmt->close();
} else {
    echo 'Nonvalid request';
}
?>
