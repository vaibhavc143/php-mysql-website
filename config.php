<?php
$db_host = "todo-db.clmco0iugmvl.ap-south-1.rds.amazonaws.com";
$db_user = "admin";
$db_password = "8xAnMGNMTip8a7YIdqaN";
$db_name = "todo-db";

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}