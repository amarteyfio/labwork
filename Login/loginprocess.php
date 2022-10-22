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
    $email = $_POST['email'];//email
    $pass = $_POST['pass'];//password
    

    //retrieve account information
    $user = email_sel_ctr($email); 
    
    if(empty($user)){
        $message = 'Invalid Email';
        echo "<SCRIPT> alert('$message')
        window.location.replace('login.php');
        </SCRIPT>";
    }
    
    //store password in variable
    $password = $user['customer_pass'];

    if(password_verify($pass,$password) == true){
        session_start();
        //set session variables
        $_SESSION["loggedin"] = true;//logged in status
        $_SESSION["id"] = $user['customer_id']; //id
        $_SESSION["name"] = $user['customer_name'];//name
        $_SESSION["role"] = $user['user_role'];//role
        //redirect to main page

        //check user role then redirect to appropriate page
        if($user['user_role'] = 1){
            header("Location: ../View/index.php");//redirect to admin page
        }
        else{
            header("Location: ../View/index.php");//redicrect to home page
        }

        
    }
    else{
        //error message
        $message = 'Invalid Password';
        echo "<SCRIPT> alert('$message')
        window.location.replace('login.php');
        </SCRIPT>";
        
    }

}


?>