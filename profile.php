<?php
require_once "settings.php";
session_start();

if ($username) {
    $conn = mysqli_connect($host, $username, $password, $database);
}

$username = trim($_POST['username']);
$_SESSION['username'] = $username;
echo"Welcome, " . $_SESSION["username"];
echo" " . $_SESSION["email"];





?>