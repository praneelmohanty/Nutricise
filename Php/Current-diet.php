<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/db.php';

$username = $_SESSION['username'];

$sql = "SELECT food_preference FROM UserProfile WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($food_preference);
$stmt->fetch();

$stmt->close();
$conn->close();

if ($food_preference === 'vegetarian') {
    header("Location: ../HTML/Diet-page-veg.html");
    exit();
} elseif ($food_preference === 'non-vegetarian') {
    header("Location: ../HTML/Diet-page-non veg.html");
    exit();
} else {
    echo "Error: No food preference found.";
    exit();
}
?>