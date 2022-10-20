<?php
//Session Start
ob_start();
session_start();

//if user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../View/index.php");
    exit;
}

?>



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
    <form method="POST" action="loginprocess.php">
        <input type="email" placeholder = "Enter your Email" name="email" required>
        <br>
        <br>
        <input type="password" placeholder="Enter your Password" name="pass" required>
        <br>
        <br>
        <input type="Submit" value="Login" name="login" >
    </form>
</body>
</html>

