<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h1>Welcome to My Login</h1>

    <form action="validate.php" method="post">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

    <!-- Back to Home Button -->
    <br>
    <a href="index.php">
        <button type="button">Back to Home</button>
    </a>

</body>
</html>
