<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/regformeval.js"></script>
    <title>Register</title>
</head>
<body>
    <h1>Welcome! Register Below</h1>
    <form action = "registerprocess.php" method="POST" name = "regform">
    <input type="text" name = "name" placeholder="Enter your Name" required>
    <br>
    <br>
    <input type="email" name = "email" placeholder="Enter your Email Address" required placeholder="user@example.com">
    <br>
    <br>
    <input type="password" name = "password" placeholder="Enter Password" required>
    <br>
    <br>
    <input type="password" name = "passwordconf" placeholder="Confirm Password" required>
    <br>
    <br>
    <input type="text" name = "country" placeholder="Enter your Country" required>
    <br>
    <br>
    <input type="text" name="city" placeholder="Enter your City" required>
    <br>
    <br>
    <input type="tel"name ="tele" placeholder="Enter Phone Number" maxlength = "10" minlength="10" required pattern="[0-9]{10}" placeholder="XXX-XXX-XXXX">
    <br>
    <br>
    <input type="Submit" name= "register" value="Register">
    </form>
    
</body>
</html>