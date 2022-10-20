<?php
/**
 * @author Amarteyfio
 * 
 */
//start session
session_start();

//check if user is logged in already
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../View/index.php");
    exit;
}

require("../Controller/customer_controller.php");


if(isset($_POST['login'])){
    //assign vars
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $user = email_sel_ctr($email);
    if(empty($user)){
        echo "Invalid Details";
    }
    else{    
    $password = $user['customer_password'];

    if(password_verify($pass,$password) == true){
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user['customer_id'];
        $_SESSION["name"] = $user['customer_name'];
        //redirect to main page
        header("Location: ../View/index.php");
    }
    else{
        header("Location: login.php");
    }

}

}
?>