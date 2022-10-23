<?php
/**
 * @author Amarteyfio
 * 
 */

//check if user is logged in and an administrator
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION['role'] != 1){
    header("location: ../Login/login.php");
    exit;
}

//include controller
require "../Controller/product_controller.php";

//update
$id = $_GET['id'];

$record = selectbrandid_ctr($id);

var_dump($record);
if(isset($_POST['submit'])){
    $name = $_POST['name'];

    //check if name already exists
    $data = selbrand_ctr($name);
    if(empty($data)){
        updatebrand_ctr($id,$name);

        header("Location: ../Admin/Brand.php");

    }
    else{
        $message = 'Brand Already Exists: returning to menu...';
        echo "<SCRIPT> alert('$message')
        window.location.replace('../Admin/Brand.php');
        </SCRIPT>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>form {padding: 1rem;font: 1rem sans-serif;}</style>
    <title>Document</title>
</head>
<body>
    <h1 style="font: 2rem sans-serif;">Update Brands</h1>
    <form method="POST">
        <input name="name"type="text" value="<?php echo $record["brand_name"]; ?>">
        <br>
        <br>
        <input type = "Submit" name="submit" value="Update">
    </form>
    
</body>
</html>