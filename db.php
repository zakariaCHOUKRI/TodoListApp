<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "todo";

try {
    $pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err){
    echo "Database connection problem: " . $err -> getMessage();
}

?>