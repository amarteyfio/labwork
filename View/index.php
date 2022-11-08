<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Menu</h1>
    <p>Welcome <?php echo $_SESSION['name'];?></p>

    <div>
        <?php
        /**Direct users to appropriate menu based on user roles */
        //Menu links
        $logout = "../Login/logout.php";//logout
        $register = "../Login/register.php";//register
        $brand = "../Admin/Brand.php";//brand
        $category = "../Admin/Category.php";//category
        $product = "product.php";
        $allprod = "all_products.php";

        if($_SESSION['role'] == 1)
        {
            echo "<a href='$logout'>LOGOUT</a> | <a href='$register'>REGISTER</a> | <a href = '$brand'>BRAND</a> | <a href = '$category'>CATEGORY</a> | <a href='$product'>ADD PRODUCT</a> | <a href='$allprod'>ALL PRODUCTS</a> | <br><br><form action = '../Actions/product_functions.php' method 'POST'> <input type = 'text' name = 'term' id = 'search_term' placeholder = 'Search for a product'><input type = 'submit' name = 'search' id = 'search' value = 'Search'></form>";
        }
        else
        {
           echo "<a href='$logout'>LOGOUT</a> | <a href='$register'>REGISTER</a> | <a href='$product'>ADD PRODUCT</a> | <a href='$allprod'>ALL PRODUCTS</a> | <br><br><form action = '../Actions/product_functions.php' method 'POST'> <input type = 'text' name = 'term' id = 'search_term' placeholder = 'Search for a product'><input type = 'submit' name = 'search' id = 'search' value ='Search'</form>";
        }

        ?>
    </div>

    
    
</body>
</html>




