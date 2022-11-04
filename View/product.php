<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}

//require controllers
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <title>Product</title>
</head>
<style>
    .container {  display: grid;
  grid-template-columns: 1.7fr 1.3fr 0.1fr;
  grid-template-rows: 4.2fr 0.1fr 1fr;
  gap: 0px 0px;
  grid-auto-flow: row;
  grid-template-areas:
    "table Form ."
    "table Form ."
    "table Form .";
}

.Form { grid-area: table; }

.Form2 { grid-area: Form; }

table,td{
    border: 1px solid black;
    padding: 0.5rem;
    font: 14px sans-serif;
}

th{
    border: 1px solid black;
    padding: 0.5rem;
    font: 16px sans-serif bold;
}

form{
    padding: 1rem;
    font: 14px sans-serif;
}

input{
    padding: 0.5rem;
}

</style>

<body>
    <div class = "container">
    <div class = "table" >
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
    <td><?php $category = selectcat_ctr($prod['product_cat']); echo $category['cat_name'];?></td>
    <td><?php $thisbrand = selectbrandid_ctr($prod['product_brand']); echo $thisbrand['brand_name'];?></td>
    <td><?php echo $prod['product_title'];?></td>
    <td><?php echo $prod['product_price'];?></td>
    <td><?php echo $prod['product_desc'];?></td>
    <td>No Image Availabe :(</td>
    <td><?php echo '<a href="#?id='. $prod['product_id'] .'" class="mr-3" title="Edit Product" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';?></td>
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
            <textarea name = "desc" placeholder="Product Description" rows="5" cols="60">Enter Product Details</textarea>
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
    </div>
    
    
</body>
</html>

