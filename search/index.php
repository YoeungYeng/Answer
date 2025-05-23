<?php
$dsn = "mysql:host=localhost;dbname=school_db;charset=utf8mb4";
$username = "root";
$password = "";

// Connect to database
try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get user input
$name = $_POST['name'] ?? null;
$gender = $_POST['txt-gender'] ?? null;
$score = $_POST['txt-score'] ?? null;


if ($name && $gender && $score) {
    // Prepare SQL query
    $stmt = $pdo->prepare("SELECT * FROM tbl_students WHERE name = :name AND sex = :sex AND score = :score");
    $stmt->execute(["name" => $name, "sex" => $gender, "score" => $score]);
    // Fetch the result
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    echo $student ? "<h2>Found!</h2>" : "<h2>Not Found!</h2>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Search</title>
</head>

<body>
    <h2>Search for a Student</h2>
    <form method="POST">
        Name: <input type="text" name="name" required><br><br>
        Sex: <select name="txt-gender" id="">
            <option value="male"> Male </option>
            <option value="female"> Female </option>
        </select><br><br>
        Score: <input type="number" name="txt-score" required><br><br>
        <input type="submit" value="Search">
    </form>
</body>

</html>