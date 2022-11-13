<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}

//require controller
require("../Controller/cart_controller.php");


$pid = $_GET['pid']; // product id

$cid = $_SESSION['id']; // customer id


cart_remove_ctr($pid,$cid); //call remove from cart method

header("Location: ../View/cart.php");//return to cart


?>

