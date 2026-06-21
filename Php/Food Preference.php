<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Please log in to update your BMI.";
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/db.php';

$username = $_SESSION['username'];
$food_preference = $_POST['food_preference'];


$sql = "UPDATE UserProfile SET food_preference = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $food_preference, $username);


if ($stmt->execute()) {
    echo "BMI updated successfully.";
    header("Location: ../HTML/Workout Days.html");
    exit();
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>