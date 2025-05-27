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
?>
<form method="post" action="login.php">
    <label>Username</label>
        <input type="text" name="username"required>
    <label>Password</label>
        <input type="password" name="password"required>
    <label>Email</label>
        <input type="email" name="email">
    <input type="submit" value="login">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    echo "<pre>"; print_r($_POST); echo "</pre>";
    if ($username && $password) {
        $query = "SELECT * FROM user WHERE username = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["username"] = $user["username"];
            header("Location: profile.php");
            exit();
        } else {
            echo "<p style='color:red;'>Incorrect username or password.</p>";
        }
    } else {
        echo "<p style='color:red;'>Please enter both username and password.</p>";
    }
}
?>
</body>
</html>
