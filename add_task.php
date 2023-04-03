<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
    }
    require_once('db.php');
?>

<?php
// get data from form
$title = $_POST['title'];
$description = $_POST['description'];
$user = $_SESSION['username'];

// insert data into database
$query_insert_task = "INSERT INTO task (task_name, task_description, due_date, status) VALUES ('$title', '$description', '1-1-2100', 'in progress')";
$statement_insert_task = $pdo -> prepare($query_insert_task);
$statement_insert_task -> execute();

$query_get_id = "SELECT LAST_INSERT_ID();";
$statement_get_id = $pdo -> prepare($query_get_id);
$statement_get_id -> execute();

$result_id = $statement_get_id -> fetchAll();
$taskId = $result_id[0][0];
$userId = $_SESSION["userid"];

$query_insert_user_task = "INSERT INTO user_task (user_id, task_id) VALUES ('$userId', '$taskId');";
$statement_insert_user_task = $pdo -> prepare($query_insert_user_task);
$statement_insert_user_task -> execute();

header("Location: dashboard.php");
?>

<?php

    $pdo = null;

?>