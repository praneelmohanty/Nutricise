<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/db.php';

$username = $_SESSION['username'];

$sql = "SELECT workout_days FROM UserProfile WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($workout_days);
$stmt->fetch();

$stmt->close();
$conn->close();

if ($workout_days === '3 Days') {
    header("Location: ../HTML/Workout-3-Days.html");
    exit();
} elseif ($workout_days === '5 Days') {
    header("Location: ../HTML/Workout-5-Days.html");
    exit();
} elseif ($workout_days === '7 Days') {
    header("Location: ../HTML/Workout.html");
    exit();
} else {
    echo "Error: No workout preference found.";
    exit();
}
?>