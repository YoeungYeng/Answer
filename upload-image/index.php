<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['image'];
    $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 3 * 1024 * 1024; // 3MB

    if (in_array(mime_content_type($file['tmp_name']), $allowed) && $file['size'] <= $maxSize) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir))
            mkdir($uploadDir, 0755, true);
        $newName = uniqid() . "_" . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $uploadDir . $newName);
        echo "Uploaded: $newName";
    } else {
        echo "Invalid file (type or size)";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>

</body>

</html>