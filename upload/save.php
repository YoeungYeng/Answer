<?php
if (isset($_POST['submit'])) {
    $uploadDir = "uploads/";
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $fileType = $_FILES['images']['type'][$key];
        $fileTmp  = $_FILES['images']['tmp_name'][$key];
        $fileSize = $_FILES['images']['size'][$key];

        // Check file type
        if (in_array($fileType, $allowedTypes)) {
            $targetPath = $uploadDir . uniqid() . "_" . $fileName;

            if (move_uploaded_file($fileTmp, $targetPath)) {
                echo "Uploaded: $fileName<br>";
            } else {
                echo "Failed to upload: $fileName<br>";
            }
        } else {
            echo "Not an image file: $fileName<br>";
        }
    }
} else {
    echo "No files submitted.";
}
?>
