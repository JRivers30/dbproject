<?php
function generateStrengthPlan() {
    $weeks = [];
    for ($i = 1; $i <= 6; $i++) {
        $reps = rand(8, 15);
        $weeks[] = "Week $i: Pushups ($reps reps), Deadlifts ($reps reps), Bench Press ($reps reps), Squats ($reps reps)";
    }
    return implode("<br>", $weeks);
}
function generateRunningPlan() {
    $weeks = [];
    for ($i = 1; $i <= 10; $i++) {
        $miles = rand(3, 10);
        $weeks[] = "Week $i: Run $miles miles, Interval Training, Hill Repeats";
    }
    return implode("<br>", $weeks);
}
function generateTransformationPlan() {
    $weeks = [];
    for ($i = 1; $i <= 16; $i++) {
        $reps = rand(10, 20);
        $weeks[] = "Week $i: Crossfit ($reps reps), Boot Camp, Bodyweight Circuit ($reps reps), Yoga";
    }
    return implode("<br>", $weeks);
}
$workoutPlans = [
    'strength' => generateStrengthPlan(),
    'running' => generateRunningPlan(),
    'transformation' => generateTransformationPlan()
];

$type = isset($_GET['type']) ? $_GET['type'] : 'strength';
$displayWorkout = isset($workoutPlans[$type]) ? $workoutPlans[$type] : 'no workout avaliable.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Workout Plan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Fitness/Strength Tracker - Workout Plan Details</h1>
    </header>
    <main>
        <h2>Workout Plan for <?php echo htmlspecialchars($type); ?></h2>
        <div style="white-space: pre-wrap;"><?php echo $displayWorkout; ?></div>
        <button onclick="history.back()">Go Back/previous</button>
    </main>
    <footer>
        <p> swipe to right for next page or left for previous</p>
    </footer>
</body>
</html>
