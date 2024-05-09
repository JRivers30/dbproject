<?php
session_start();
include 'config.php';  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workoutDate = $_POST['workoutDate'];
    $exercise = $_POST['exercise'];
    $reps = $_POST['reps'];
    $sql = "INSERT INTO workouts (workoutDate, exercise, reps) VALUES (?, ?, ?)";
    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("ssi", $workoutDate, $exercise, $reps);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Error: " . $connection->error;
    }
    $connection->close();
    header("Location: dashboard.html");
    exit;
}
?>
