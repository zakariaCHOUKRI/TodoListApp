<?php
$username = $_SESSION["username"];
$userid = $_SESSION["userid"];

$get_tasks_query = "SELECT * FROM user_task u INNER JOIN task t ON t.task_id = u.task_id WHERE user_id = '$userid';";
$get_tasks_statement = $pdo -> prepare($get_tasks_query);
$get_tasks_statement -> execute();

$result = $get_tasks_statement -> fetchAll();

if (!empty($result)) {
    echo "<ul>";
    foreach ($result as $task) {
        echo "<li>";
        echo "<h3>$task[3]</h3>";
        echo "<h4>$task[6]</h4>";
        echo "<h4>due before $task[5]</h4>";
        echo "<p>$task[4]</p>";
        echo "<a href='delete_task.php?task_to_delete=" . $task[1] . "'><button class='btn btn-danger inl'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
        </svg> Delete Task</button></a>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<h2>No tasks for this user.</h3>";
}

?>