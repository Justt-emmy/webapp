<?php
include "connect.php";

$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["Email"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "Thank you for subscribing to Justt Tech updates! You are all set to receive the latest news, offers and insights straight to your inbox.";

// echo $email;

$stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email); 
$stmt->execute();
?>