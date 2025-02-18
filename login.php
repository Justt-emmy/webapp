<?php
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
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    // Check if the username exists
    $stmt = $conn->prepare("SELECT id, password FROM signup WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $user_id;
            $_SESSION["username"] = $username;

            // Insert login record
            $stmt2 = $conn->prepare("INSERT INTO login (user_id) VALUES (?)");
            $stmt2->bind_param("i", $user_id);
            $stmt2->execute();
            $stmt2->close();

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Password is incorrect. ❌";
        }
    } else {
        echo "Invalid username. ❌";
    }

    $stmt->close();
}

$conn->close();
?>
