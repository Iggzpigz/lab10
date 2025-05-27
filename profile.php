<?php
require_once "settings.php";
session_start();

if ($username) {
    $conn = mysqli_connect($host, $username, $password, $database);
}

$_SESSION["username"] = $user["username"];
echo"Welcome";
echo $user['username'];
echo $user['email'];



?>