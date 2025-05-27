<?php
require_once "settings.php";
session_start();

$username = trim($_POST['username']);
$_SESSION['username'] = $username;
echo"Welcome, " . $_SESSION["username"];
echo" " . $_SESSION["email"];

if ($username) {
    $conn = mysqli_connect($host, $username, $password, $database);
}

$_SESSION["username"] = $user["username"];
echo"Welcome";
echo $user['username'];
echo $user['email'];



?>