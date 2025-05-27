<?php
require_once "settings.php";
session_start();

if ($username) {
    $conn = mysqli_connect($host, $username, $password, $database);
}

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
$user  = mysqli_fetch_assoc($result);

if (!$user) {
    $username = trim($_POST['username']);
    $_SESSION['username'] = $username;
    echo"Welcome, " . $_SESSION['username'];
    echo" " . $_SESSION['email'];
}




?>