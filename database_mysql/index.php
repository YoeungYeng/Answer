<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="insert.php" method="post">
        Name: <input type="text" name="name"><br>
        Password: <input type="password" name="password"><br>
        Gender:
        <input type="radio" name="sex" value="1"> Male
        <input type="radio" name="sex" value="0"> Female<br>
        Email: <input type="email" name="email"><br>
        Phone no:
        <select name="phone_prefix">
            <option value="977">977</option>
        </select>
        <input type="text" name="phone"><br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>