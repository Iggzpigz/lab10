<?php
require_once "settings.php";
session_start();

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn) {
    $query = "SELECT * FROM users"
    $result = mysqli_query($conn, $query);
    if ($result) {}
    else {}
    mysqli_close($conn);
} else echo"<p> Unable to connect to the database";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p> Welcome". $row["username"] ."</p>";
    echo "<p>". $row["email"] ."</p>";
}



?>