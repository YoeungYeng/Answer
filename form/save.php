<?php
$dsn = "mysql:host=localhost;dbname=mydatabase;charset=utf8mb4";
$username = "root";
$password = ""; // Replace with your MySQL root password

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    function generatePassword() {
        return str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT); // 8-digit random number
    }

    // Example user data
    $userData = [
        "name" => "John Doe",
        "sex" => true, // true = male, false = female
        "email" => "john.doe@example.com",
        "phone" => "1234567890",
        "password" => generatePassword()
    ];

    // Insert into the database using a prepared statement
    $stmt = $pdo->prepare("INSERT INTO users (name, sex, email, phone, password) VALUES (:name, :sex, :email, :phone, :password)");
    $stmt->execute($userData);

    echo "User added successfully! Generated password: " . $userData['password'];
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
