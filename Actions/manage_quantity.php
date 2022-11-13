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


$pid = $_GET['pid'];

$qty = $_GET['qty'];

$cid = $_SESSION['id'];

if($qty == NULL){
    header("Location: ../View/cart.php");
}

editqty_ctr($pid,$cid,$qty);

header("Location: ../View/cart.php");
?>