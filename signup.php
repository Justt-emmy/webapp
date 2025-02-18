<?php
require 'connect.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "itstudents";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["fname"]);
    $email = test_input($_POST["email"]);
    $username = test_input($_POST["username"]);
    $password1 = test_input($_POST["password1"]);
    $password2 = test_input($_POST["password2"]);

    // Check if passwords match
    if ($password1 !== $password2) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

    // Insert user data into database
    $stmt = $conn->prepare("INSERT INTO signup (name, email, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful. ✅ <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
