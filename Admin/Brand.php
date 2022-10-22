<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION['role'] != 1){
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
    <title>Brand Page</title>
</head>
<body>
    <h1>Brand Menu</h1>
    <p>Fill the Form Below to Add a Brand</p>
    <form method="POST" action = "../Actions/Add_brand.php">
        <input type="text" name = "bname" placeholder="Enter a Brand Name">
        <br>
        <br>
        <input type="submit" name = "add" value="Add Brand">
    </form>
    
</body>
</html>