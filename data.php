<?php
include("dbconnect.php");
$PreUsername = $_SESSION['username'];

$sql = "SELECT *
    FROM users JOIN personal 
    ON users.user_id = personal.user_id 
    WHERE users.username='$PreUsername'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $FullName = isset($row["full_name"]) ? $row["full_name"] : "";
    $ContactNo = isset($row["contact_no"]) ? $row["contact_no"] : "";
    $Designation = isset($row["designation"]) ? $row["designation"] : "";
    $PreGender = isset($row["gender"]) ? $row["gender"] : "";
    $Location = isset($row["location"]) ? $row["location"] : "";
    $TrainingExp = isset($row["training_exp"]) ? $row["training_exp"] : "";
    $About = isset($row["about"]) ? $row["about"] : "";
} else {
    // Handle case when user is not found
    $FullName = $ContactNo = $Designation = $PreGender = $Location = $TrainingExp = $About = "";
}

// Continue with your code
?>

<!-- Your HTML/PHP code continues here -->
