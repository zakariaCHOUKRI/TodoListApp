<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');
?>

<?php
$username = $_SESSION["username"];

$get_tasks_query = "SELECT * FROM task_user";
$statement = $pdo -> prepare($query);
$statement -> execute();

if ($result->num_rows > 0) {
    echo "<ul>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li><h3>" . $row["title"] . "</h3><p>" . $row["description"] . "</p></li>";
    }
    echo "</ul>";
} else {
    echo "No todo items found.";
}

$conn->close();
?>

<?php

    $pdo = null;

?>