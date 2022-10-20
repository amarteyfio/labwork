<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Menu</h1>
    <p>Welcome <?php echo $_SESSION['name'];?></p>
    
    <a href="../Login/logout.php">LOGOUT(Not logged in will add more menu later)</a>
    <br>
    <br>
    <a href="../Login/register.php">REGISTER</a>
</body>
</html>


