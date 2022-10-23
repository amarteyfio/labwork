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

if(isset($_POST['add'])){
    $name = $_POST['bname'];
}

//This section checks if brand already exists
 $brandc = selbrand_ctr($name);
 
 if(empty($brandc)){
    addbrand_ctr($name);

    $message = 'Brand Added!';
        echo "<SCRIPT> alert('$message')
        window.location.replace('../View/index.php');
        </SCRIPT>";

 }
 else{
    $message = 'Brand Already Exists: returning to menu...';
        echo "<SCRIPT> alert('$message')
        window.location.replace('../View/index.php');
        </SCRIPT>";
 }

?>