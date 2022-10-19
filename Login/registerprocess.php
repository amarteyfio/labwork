<?php
/**
 * @author Amarteyfio
 * 
 */


require("../Controller/customer_controller.php");

if (isset($_POST['register'])){

    //allocate variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $passconf = $_POST['passwordconf'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $phone = $_POST['tele'];
    
    
}
else{
    echo "something went wrong";
}

addcus_ctr($name,$email,$pass,$country,$city,$phone);
   

//header("Location: ../view/done.php");
?>