<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Upload Multiple Images</h2>
  <form action="save.php" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple accept="image/*">
    <br><br>
    <button type="submit" name="submit">Upload</button>
  </form>
</body>
</html>