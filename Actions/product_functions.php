<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}

//require controller
require("../Controller/product_controller.php");


if(isset($_POST['search'])){
    $search_term = $_POST['term'];

    //Search
    $results = product_search_ctr($search_term);

    $_SESSION["search_results"] = $results;

    header("Location: ../View/product_search_results.php");
}
?>