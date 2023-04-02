<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');
?>

<?php

$query_insert_task = "SELECT user_id FROM user WHERE username = 'ayman';";
$statement_insert_task = $pdo -> prepare($query_insert_task);
$statement_insert_task -> execute();
$id = $statement_insert_task -> fetchAll();
echo($id[0][0]);

?>