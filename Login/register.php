<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Welcome! Register Below</h1>
    <form action = "registerprocess.php" method="POST">
    <input type="text" name = "name" placeholder="Enter your Name">
    <br>
    <br>
    <input type="text" name = "email" placeholder="Enter your Email Address">
    <br>
    <br>
    <input type="password" name = "password" placeholder="Enter Password">
    <br>
    <br>
    <input type="password" name = "passwordconf" placeholder="Confirm Password">
    <br>
    <br>
    <input type="text" name = "country" placeholder="Enter your Country">
    <br>
    <br>
    <input type="text" name="city" placeholder="Enter your City">
    <br>
    <br>
    <input type="text"name ="tele" placeholder="Enter Phone Number">
    <br>
    <br>
    <input type="button" name= "register" value="Register">
    </form>
    
</body>
</html>