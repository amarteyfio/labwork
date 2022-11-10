<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;

    
}

//REQUIRE CONTROLLERS
require("../Controller/cart_controller.php");
require("../Controller/product_controller.php");

//--DETERMINF CLIENT IP ADDRESS--//
    $pid = $_GET['pid'];
    
    //Get that product
    $product = selprod_ctr($pid);

    //iP address
    $ip = getIP_ctr();

    
    var_dump($ip);
    //category






?>