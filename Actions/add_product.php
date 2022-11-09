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
//FILE UPLOAD VARS


    if(isset($_POST['submit'])){
        $cat = $_POST['cat'];
        $brand = $_POST['brand'];
        $tit = $_POST['tit'];
        $prc = $_POST['price'];
        $desc = $_POST['desc'];
        $keys = $_POST['prod_key']; 
        
        
        

        $targetDir = "../Images/Product/";
        $fileName = $_FILES["myimage"]["name"];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["myimage"]["tmp_name"],"../Images/Product/".$fileName);



        addprod_ctr($cat,$brand,$tit,$prc,$desc,$targetFilePath,$keys);

        //--FILE UPLOAD--//
        

    }
    else{
        echo "Something went wrong";
    }

    
header("Location: ../View/product.php");

?>