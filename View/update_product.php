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

$cats = selall_ctr("categories");
$brands = selall_ctr("brands");


$id = $_GET['id'];

$product = selprod_ctr($id);

//FILE UPLOAD VARS
$targetDir = "../Images/Product/";
$fileName = basename($_FILES["myimage"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
?>

<?php 
    if(isset($_POST['submit'])){
        $cat = $_POST['cat'];
        $brand = $_POST['brand'];
        $tit = $_POST['tit'];
        $prc = $_POST['price'];
        $desc = $_POST['desc'];
        $keys = $_POST['prod_key'];
        
        if(empty($fileName)){
        $targetFilePath = $product['product_image'];
        }

        $img = $targetFilePath;

        updprod_ctr($id,$cat,$brand,$tit,$prc,$desc,$img,$keys);

        move_uploaded_file($_FILES["myimage"]["tmp_name"], $targetFilePath);

        header("Location: product.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{padding: 1rem; font: 15px sans-serif;}
    input{padding: 0.5rem;}
</style>
<body>
<div class = "Form">
        <form method = "POST" enctype="multipart/form-data">
            <h1>UPDATE PRODUCT FORM</h1>
            <label>Select Category</label>
            <br>
            <select name = "cat">
                <?php foreach($cats as $cat):?>
                <option value = "<?php echo $cat['cat_id'];?>"><?php echo $cat['cat_name'];?></option>
                <?php endforeach ?>
            </select>
            <br>
            <br>
            <label>Select Brand</label>
            <br>
            <select name = "brand">
                <?php foreach($brands as $brand):?>
                <option value = "<?php echo $brand['brand_id'];?>"><?php echo $brand['brand_name'];?></option>
                <?php endforeach ?>
            </select>
            <br>
            <br>
            <label>Product Title</label>
            <br>
            <input type="text" name="tit" placeholder="Enter Product Title" required value="<?php echo $product['product_title'];?>">
            <br>
            <br>
            <label>Product PRICE</label>
            <br>
            <input type="text" name = "price" placeholder="Enter Product Price e.g 0.00" required value="<?php echo $product['product_price'];?>">
            <br>
            <br>
            <textarea name = "desc" rows="5" cols="60" placeholder="Enter Product Details"><?php echo $product['product_desc']; ?></textarea>
            <br>
            <br>
            <label>Product Image</label>
            <br>
            <img src="<?php echo $product['product_image'];?>" width="45" height="45">
            <input type="file" name="myimage">
            <br>
            <br>
            <input type = "text" name="prod_key" placeholder="Product Keywords e.g jeans,levi" value="<?php echo $product['product_keywords'];?>">
            <br>
            <br>
            <input type="submit" name="submit" value="Edit Product">
        </form>
        
    </div>
</body>
</html>