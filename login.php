<html>
<head></head>
<body>
<?php
require_once "settings.php";
session_start(); 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Simple query to check credentials
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
if ($user) {
    $_SESSION["username"] = $user["username"];
    header("Location: profile.php");
    exit();
} else {
    echo "Incorrect username or password";
}
?>
</body>
</html>
