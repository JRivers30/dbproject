<?php
include 'config.php'; 
header('Content-Type: application/json');
$sql = "SELECT workoutDate, exercise, reps FROM workouts ORDER BY workoutDate DESC LIMIT 1";
$result = $connection->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    echo json_encode([
        'status' => 'success',
        'data' => $row
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No workouts.']);
}
$connection->close();
?>
