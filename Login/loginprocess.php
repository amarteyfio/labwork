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


//include controllers
require("../Controller/customer_controller.php");


//if button is clicked
if(isset($_POST['login'])){
    //assign vars
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    

    //retrieve account
    $user = email_sel_ctr($email); 
    
    if(empty($user)){
        $message = 'Invalid Email';
        echo "<SCRIPT> alert('$message')
        window.location.replace('login.php');
        </SCRIPT>";
    }
    
    $password = $user['customer_pass'];

    if(password_verify($pass,$password) == true){
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user['customer_id'];
        $_SESSION["name"] = $user['customer_name'];
        //redirect to main page

        header("Location: ../View/index.php");
    }
    else{
        $message = 'Invalid Password';
        echo "<SCRIPT> alert('$message')
        window.location.replace('login.php');
        </SCRIPT>";
        //header("Location: login.php");
    }

}


?>