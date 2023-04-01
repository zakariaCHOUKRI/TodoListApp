<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');
?>

<?php
// get data from form
$title = $_POST['title'];
$description = $_POST['description'];

// insert data into database
$sql = "INSERT INTO todo_items (title, description) VALUES ('$title', '$description')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php

    $pdo = null;

?>