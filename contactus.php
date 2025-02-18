<?php
include "connect.php";

$name = $phonenumber = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["Name"]);
  $phonenumber = test_input($_POST["PhoneNumber"]);
  $email = test_input($_POST["Email"]);
  $message = test_input($_POST["Message"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "Thank you for contacting Justt Tech! We have received your message and will get back to you shortly. "; 


// echo $name;
// echo "<br>";
// echo $phonenumber;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $message;


$stmt = $conn->prepare("INSERT INTO contactus (fullname, phonenumber,email, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phonenumber, $email, $message); 
$stmt->execute();
?>