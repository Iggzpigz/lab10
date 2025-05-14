<?php
session_start()

$sql = "UPDATE users SET email = '$new_email' WHERE id = $user_id";



?>
