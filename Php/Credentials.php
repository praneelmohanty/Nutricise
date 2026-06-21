<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Unauthorized access!";
    exit();
}

require_once __DIR__ . '/db.php';

$sql = "SELECT UserInfo.username, UserInfo.password, UserProfile.height, 
               UserProfile.weight, UserProfile.bmi, UserProfile.food_preference, UserProfile.workout_days 
        FROM UserInfo 
        JOIN UserProfile ON UserInfo.username = UserProfile.username 
        WHERE UserInfo.username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p><strong>Username:</strong> " . htmlspecialchars($row["username"]) . "</p>";
    echo "<p><strong>Password:</strong> 
            <input type='password' value='" . htmlspecialchars($row["password"]) . "' class='password-field' readonly>
            <i class='bx bx-hide togglePassword' style='cursor: pointer;'></i>  
            <a href='../HTML/ChangePW.html'>Change Password?</a>
          </p>";
    echo "<p><strong>Height:</strong> " . htmlspecialchars($row["height"]) . " m</p>";
    echo "<p><strong>Weight:</strong> " . htmlspecialchars($row["weight"]) . " kg</p>";
    echo "<p><strong>BMI:</strong> " . htmlspecialchars($row["bmi"]) . "</p>";
    echo "<p><strong>Food Preference:</strong> " . htmlspecialchars($row["food_preference"]) . "</p>";
    echo "<p><strong>Number of Workout Days:</strong> " . htmlspecialchars($row["workout_days"]) . "</p>";
} else {
    echo "<p>No user data found.</p>";
}

$stmt->close();
$conn->close();
?>