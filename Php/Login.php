<?php
session_start();

require_once __DIR__ . '/db.php';

$username = $conn->real_escape_string($_GET['username']);
$password = $conn->real_escape_string($_GET['password']);

$sql = "SELECT * FROM UserInfo WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header('Location: ../HTML/Welcome-page.html');
    exit();
} else {
    header('Location: ../HTML/Login-page.html?error=1');
    exit();
}

$conn->close();
?>