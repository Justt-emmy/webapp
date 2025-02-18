<?php
session_start();
require 'connect.php';

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION["user_id"];
$sql = "SELECT name, username, email FROM signup WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $username, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>/* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to right, #00c6ff, #0072ff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Profile Container */
.profile-container {
    background: white;
    width: 350px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    padding: 20px;
}

h2 {
    margin-bottom: 20px;
    color: #0072ff;
}

/* Profile Info */
.profile-info p {
    font-size: 16px;
    margin: 10px 0;
    font-weight: bold;
}

/* Buttons */
.buttons {
    margin-top: 20px;
}

.btn {
    display: block;
    text-decoration: none;
    font-size: 16px;
    color: white;
    background: #0072ff;
    padding: 10px;
    border-radius: 20px;
    margin: 10px;
    transition: 0.3s ease-in-out;
}

.edit {
    background: #ffa502;
}

.logout {
    background: #e84118;
}

.btn:hover {
    transform: scale(1.05);
}
</style>
</head>
<body>

    <div class="profile-container">
        <h2>User Profile</h2>
        <div class="profile-info">
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        </div>

        <div class="buttons">
            <a href="dashboard.php" class="btn">Back to Dashboard</a>
            <a href="settings.php" class="btn edit">Edit Profile</a>
            <a href="logout.php" class="btn logout">Logout</a>
        </div>
    </div>

</body>
</html>
