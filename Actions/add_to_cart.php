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

//--DETERMINF CLIENT IP ADDRESS--//
    $pid = $_GET['pid'];

    $qty = $_GET['qty'];
    
    //Get that product
    $cust_id = $_SESSION["id"];

    //iP address
    $ip = getIP_ctr();


    

    //checking if prouct is in table
    $cartprod = selfrclass_ctr($pid,$cust_id);


    if(check_ctr($pid,$cust_id) == true)
    {
    $temp_qty = intval($cartprod["qty"]) + $qty;//add one to quantity
    qty_increase_ctr($pid,$temp_qty);
    header("Location: ../View/all_products.php");
    }
    else
    {
        cart_add_ctr($pid,$ip,$cust_id,$qty);

        header("Location: ../View/all_products.php");
    }






?>