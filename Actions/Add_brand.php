<?php
/**
 * @author Amarteyfio
 * 
 */

//include controller
require "../Controller/product_controller.php";

if(isset($_POST['add'])){
    $name = $_POST['bname'];
}

//This section checks if brand already exists
 $brd = selbrand_ctr($name);
 
 if(empty($brd)){
    addbrand_ctr($name);

    $message = 'Brand Added!';
        echo "<SCRIPT> alert('$message')
        window.location.replace('../View/index.php');
        </SCRIPT>";

 }
 else{
    $message = 'Brand Already Exists: returning to menu...';
        echo "<SCRIPT> alert('$message')
        window.location.replace('../View/index.php');
        </SCRIPT>";
 }

?>