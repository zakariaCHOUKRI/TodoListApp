<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');
?>

<?php

$query_get_id = "SELECT user_id FROM user WHERE username = '" . $_SESSION["username"] . "';";
$statement_get_id = $pdo -> prepare($query_get_id);
$statement_get_id -> execute();
$tmp = $statement_get_id -> fetchAll();
$_SESSION["userid"] = $tmp[0][0];

?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo $_SESSION["username"]?></h1>
        <a href='logout.php'><button type="button" class="btn btn-danger">Log out</button></a>
        <div class="row">
            <div class="col-md-6">
                <h2>Add Task</h2>
                <form action="add_task.php" method="POST">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Todo List</h2>
                <?php include 'display_tasks.php'; ?>
            </div>
        </div>
    </div>
</body>
</html>


<?php

    $pdo = null;

?>