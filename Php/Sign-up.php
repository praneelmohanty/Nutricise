<?php
session_start();

require_once __DIR__ . '/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql1 = "INSERT INTO UserInfo (username, password) VALUES ('$username', '$password')";
$sql2 = "INSERT INTO UserProfile (username) VALUES ('$username')";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    $_SESSION['username'] = $username; 
    header("Location: ../HTML/BMI.html");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>