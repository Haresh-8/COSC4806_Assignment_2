<!DOCTYPE html>
<html>
<head>
    <title>Create an Account</title>
    <style>
        .hint {
            color: red;
            font-size: 0.9em;
            display: none;
        }
        .back-button {
            margin-top: 10px;
        }
    </style>
    <script>
        function validatePasswordLength() {
            const passwordInput = document.getElementById('password');
            const hint = document.getElementById('passwordHint');

            if (passwordInput.value.length < 6) {
                hint.style.display = 'inline';
            } else {
                hint.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <h1>Create an Account</h1>

<?php
require_once('user.php');

$username = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters. <a href='register.php'>Try again</a><br><br>";
    } else {
        $user = new User();
        if ($user->create_user($username, $password)) {
            echo "Account created successfully. <a href='login.php'>Login</a>";
            exit();
        } else {
            echo "Username already exists. <a href='register.php'>Try again</a><br><br>";
        }
    }
}
?>

<form method="post">
    Username: <input type="text" name="username" value="<?php echo $username; ?>" required><br><br>

    Password: 
    <input type="password" name="password" id="password" onblur="validatePasswordLength()" required>
    <span id="passwordHint" class="hint">* At least 6 characters required</span>
    <br><br>

    <input type="submit" value="Register">
</form>

<!-- Back to index page button -->
<div class="back-button">
    <a href="index.php"><button type="button">Back to Home</button></a>
</div>

</body>
</html>
