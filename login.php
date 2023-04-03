<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
    }
    require_once('db.php');
?>

<?php

    $entered_username = htmlspecialchars($_POST["username"]);
    $entered_pwd = htmlspecialchars($_POST["password"]);

    $query = "SELECT password FROM user WHERE username = '" . $entered_username . "'";
    $statement = $pdo -> prepare($query);
    $statement -> execute();

    $result = $statement -> fetchAll();

    if (empty($result)) {
        $signup_query = "INSERT INTO user (username, email, password) values ('" . $entered_username . "', '"
        . $entered_username . "@email.com" . "', '" . $entered_pwd . "');";
        $statement = $pdo -> prepare($signup_query);
        $statement -> execute();
        $_SESSION["username"] = $entered_username;
        header('Location: dashboard.php');
    } else {
        $db_pwd = $result[0][0];
        if ($entered_pwd == $db_pwd) {
            $_SESSION["username"] = $entered_username;
            header('Location: dashboard.php');
        } else {
            header('Location: index.php?failed=true');
        }
    }


?>

<?php

    $pdo = null;

?>