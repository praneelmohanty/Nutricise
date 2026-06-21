<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Please log in to update your BMI.";
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/db.php';

$username = $_SESSION['username'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$bmi = $_POST['bmi'];

$sql = "UPDATE UserProfile SET weight = ?, height = ?, bmi = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ddds", $weight, $height, $bmi, $username);


if ($stmt->execute()) {
    echo "BMI updated successfully.";
    header("Location: ../HTML/Food Preference.html");
    exit();
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>