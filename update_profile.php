<?php
session_start();
require_once "settings.php"; // contains $host, $username, $password, $database

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to edit your profile.";
    exit();
}

$currentUsername = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newEmail = trim($_POST['email']);
    
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        $escapedEmail = mysqli_real_escape_string($conn, $newEmail);
        $escapedUsername = mysqli_real_escape_string($conn, $currentUsername);

        $query = "UPDATE user SET email = '$escapedEmail' WHERE username = '$escapedUsername'";

        if (mysqli_query($conn, $query)) {
            echo "Email updated successfully!";
        } else {
            echo "Error updating email: " . mysqli_error($conn);
        }
    }
}

// Get current email to display
$query = "SELECT email FROM users WHERE username = '$currentUsername'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$currentEmail = $user ? htmlspecialchars($user['email']) : '';
?>

<h2>Edit Profile</h2>
<form method="post" action="profile.php">
    <label>New Email:</label>
    <input type="email" name="email" value="<?php echo $currentEmail; ?>" required><br>
    <input type="submit" value="Update Email">
</form>
?>
