<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Please log in to update your BMI.";
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/db.php';

$username = $_SESSION['username'];
$workout_days = $_POST['workout_days'];


$sql = "UPDATE UserProfile SET workout_days = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $workout_days, $username);


if ($stmt->execute()) {
    header("Location: ../HTML/Welcome-page.html");
    exit();
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>