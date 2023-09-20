<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter your username" name="uname" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
