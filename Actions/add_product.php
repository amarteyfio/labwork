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


?>


<?php
//
    if(isset($_POST['submit'])){
        $cat = $_POST['cat'];
        $brand = $_POST['brand'];
        $tit = $_POST['tit'];
        $prc = $_POST['price'];
        $desc = $_POST['desc'];
        $keys = $_POST['prod_key']; 
        $img = "";
    }
    else{
        echo "Something went wrong";
    }

    var_dump($cat)

    addprod_ctr($cat,$brand,$tit,$prc,$desc,$img,$keys);//add to next page 

    header("Location: ../View/product.php");

?>