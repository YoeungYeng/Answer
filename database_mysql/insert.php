<?php
// Database configuration
$host = "localhost";
$user = "root";
$password = ""; // per your instructions
$dbname = "mydatabase";

// Connect to database
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$name = $_POST['name'];
$pass = $_POST['password'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$phone = $_POST['phone_prefix'] . $_POST['phone']; // combine prefix and number

// Insert into database using prepared statement
$stmt = $conn->prepare("INSERT INTO users (name, sex, email, phone, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $name, $sex, $email, $phone, $pass);

if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
