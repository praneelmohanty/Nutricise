<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../Php/Login.php");
    exit();
}
header("Content-Type: application/json");

require_once __DIR__ . '/db.php';

$sqlVeg = "SELECT food_link, food FROM `All-Lunch-Dinner` WHERE food_preference='vegetarian'";
$sqlNonVeg = "SELECT food_link, food FROM `All-Lunch-Dinner` WHERE food_preference='non-vegetarian'";

$resultVeg = $conn->query($sqlVeg);
$resultNonVeg = $conn->query($sqlNonVeg);

$vegOptions = [];
$nonVegOptions = [];

if ($resultVeg->num_rows > 0) {
    while ($row = $resultVeg->fetch_assoc()) {
        $vegOptions[$row["food_link"]] = $row["food"];
    }
}

if ($resultNonVeg->num_rows > 0) {
    while ($row = $resultNonVeg->fetch_assoc()) {
        $nonVegOptions[$row["food_link"]] = $row["food"];
    }
}

$conn->close();

echo json_encode(["veg" => $vegOptions, "nonveg" => $nonVegOptions]);
?>