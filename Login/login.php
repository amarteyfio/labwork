<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <form method="POST" action="#">
        <input type="text" placeholder = "Enter your Email" name="email">
        <br>
        <br>
        <input type="password" placeholder="Enter your Password" name="pass">
        <br>
        <br>
        <input type="button" value="Login" name="login" >
    </form>
</body>
</html>

<?php

/*if(password_verify($password, $hashed_password)) {
    // If the password inputs matched the hashed password in the database
    // Do something, you know... log them in.
}
*/ 
?>