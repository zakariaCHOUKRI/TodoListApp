<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');
?>

<?php

$task_to_delete = $_GET["task_to_delete"];

$query_delete_from_task = "DELETE FROM task WHERE task_id = $task_to_delete;";
$statement_delete_from_task = $pdo -> prepare($query_delete_from_task);
$statement_delete_from_task -> execute();

$query_delete_from_user_task = "DELETE FROM user_task WHERE task_id = $task_to_delete;";
$statement_delete_from_user_task = $pdo -> prepare($query_delete_from_user_task);
$statement_delete_from_user_task -> execute();

header("Location: dashboard.php");

?>


<?php

    $pdo = null;

?>