<?php
require_once('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters.";
    } else {
        $user = new User();
        if ($user->create_user($username, $password)) {
            echo "Account created successfully. <a href='login.php'>Login</a>";
        } else {
            echo "Username already exists. <a href='register.php'>Try again</a>";
        }
    }
} else {
?>
    
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>
<?php 
} 
?>