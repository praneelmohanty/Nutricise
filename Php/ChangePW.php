<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "Unauthorized access!";
    exit();
}

require_once __DIR__ . '/db.php';

// Get form data
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
$username = $_SESSION['username']; // Get logged-in username

// Fetch current password from the database
$sql = "SELECT password FROM UserInfo WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($db_password);
$stmt->fetch();

if ($stmt->num_rows > 0) {
    if ($current_password !== $db_password) {
        echo "Incorrect current password!";
    } elseif ($new_password !== $confirm_password) {
        echo "New passwords do not match!";
    } else {
        // Update password
        $update_sql = "UPDATE UserInfo SET password = ? WHERE username = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $new_password, $username);

        if ($update_stmt->execute()) {
            // Redirect to Credentials page
            header("Location: ../HTML/Credentials.html");
            exit();
        } else {
            echo "Error updating password!";
        }
    }
} else {
    echo "User not found!";
}

$stmt->close();
$conn->close();
?>