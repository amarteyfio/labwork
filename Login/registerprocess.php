<?php
/**
 * @author Amarteyfio
 * 
 */

//Include controller
require("../Controller/customer_controller.php");

//check if button is clicked
if (isset($_POST['register'])){

    //allocate variables
    $name = $_POST['name'];//name
    $email = $_POST['email'];//email
    $pass = $_POST['password'];//password
    $passconf = $_POST['passwordconf'];//to confirm password
    $country = $_POST['country'];//country
    $city = $_POST['city'];//city
    $phone = $_POST['tele'];//phone number

/**Check if 2 passwords match */
if($pass != $passconf){
    $message = 'Passwords do not match';
        echo "<SCRIPT> alert('$message')
        window.location.replace('register.php');
        </SCRIPT>";
}

//encrypt password before 
$fpass = password_hash($pass, PASSWORD_DEFAULT);

}
else{
    echo "something went wrong";
}


/**Ensure Email does not exist in database before inserting */
$user = email_sel_ctr($email); 
    
if(empty($user)){
    addcus_ctr($name,$email,$fpass,$country,$city,$phone);
    $message = 'Account Created';
        echo "<SCRIPT> alert('$message')
        window.location.replace('login.php');
        </SCRIPT>";
}
else
{
    $message = 'An account with this email already exists';
        echo "<SCRIPT> alert('$message')
        window.location.replace('register.php');
        </SCRIPT>";

}





?>