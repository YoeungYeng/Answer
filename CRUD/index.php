<?php
// connect to the database
function connect()
{
    $host = 'localhost';
    $db = 'CRUD_db';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
// create a new record
function insert()
{
    $conn = connect();
    $insert = $conn->query("INSERT INTO student (name, sex, score) VALUES ('YOEUNG YENG', 'M', 100)");
    if ($insert) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
// UPDATE a record
function update()
{
    $conn = connect();
    $update = $conn->query("UPDATE student SET name='YENG YOEUNG' WHERE student_id=1");
    if ($update) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
// DELETE a record
function delete()
{
    $conn = connect();
    $delete = $conn->query("DELETE FROM student WHERE student_id=1");
    if ($delete) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
// call the functions
insert();
update();
delete();
?>