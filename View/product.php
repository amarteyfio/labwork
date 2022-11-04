<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}

//include controllers
require("../Controller/product_controller.php");

//all Product records from prod brand and Cat
$prods = selall_ctr("products");
$cats = selall_ctr("categories");
$brands = selall_ctr("brands");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>


<body>
    <div id = "table" >
    <table>
  <tr>
    <th>Category</th>
    <th>Brand</th>
    <th>Title</th>
    <th>Price</th>
    <th>Description</th>
    <th>Image</th>
  </tr>
  <?php foreach($prods as $prod):?>
  <tr>
    <td><?php echo $prod['product_cat'];?></td>
    <td><?php echo $prod['product_brand'];?></td>
    <td><?php echo $prod['product_title'];?></td>
    <td><?php echo $prod['product_price'];?></td>
    <td><?php echo $prod['product_desc'];?></td>
  </tr>
  <?php endforeach; ?>
    </table>
        </div>
    <div class = "Form">
        <form method = "POST" action = "../Actions/add_product.php">
            <h1>Fill the form Below to Add a product</h1>
            <label>Select Category</label>
            <select name = "cat">
                <?php foreach($cats as $cat):?>
                <option value = "<?php echo $cat['cat_id'];?>"><?php echo $cat['cat_name'];?></option>
                <?php endforeach ?>
            </select>
            <br>
            <br>
            <label>Select Brand</label>
            <select name = "brand">
                <?php foreach($brands as $brand):?>
                <option value = "<?php echo $brand['brand_id'];?>"><?php echo $brand['brand_name'];?></option>
                <?php endforeach ?>
            </select>
            <br>
            <br>
            <input type="text" name="tit" placeholder="Enter Product Title" required>
            <br>
            <br>
            <input type="text" name = "price" placeholder="Enter Product Price e.g 0.00" required>
            <br>
            <br>
            <input type="text" name = "desc" placeholder="Product Description" size="45">
            <br>
            <br>
            <label>Product Image</label>
            <input type="file" name="myimage">
            <br>
            <br>
            <input type = "text" name="prod_key" placeholder="Product Keywords e.g jeans,levi">
            <br>
            <br>
            <input type="submit" name="submit" value="Add Product">
        </form>
        
    </div>
    
</body>
</html>

