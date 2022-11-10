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
if(isset($_POST[''])){
    $ip = getIP_ctr();

    
}


?>