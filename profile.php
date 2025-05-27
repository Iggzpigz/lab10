<?php
require_once "settings.php";
session_start();
$_SESSION['username'] = 'john'
echo"Welcome" . $_SESSION['username'];




?>