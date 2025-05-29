<?php
session_start();
require_once('user.php');

$user = new User();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$_SESSION['username'] = $username;

if ($user->validate_login($username, $password)) {
    $_SESSION['authenticated'] = 1;
    header('Location: index.php');
    exit();
} else {
    $_SESSION['failed_attempts'] = ($_SESSION['failed_attempts'] ?? 0) + 1;
    echo "This is unsuccessful login attempt number: {$_SESSION['failed_attempts']}<br>";
    echo "<a href='login.php'>Try Again</a>";
}
?>