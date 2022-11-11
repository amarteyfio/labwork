<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}

require "../Controller/cart_controller.php";

$id = $_SESSION['id'];

$cart_items = cart_itm_ctr($id);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <h1>CART</h1> <p>Total : </p>
    <ul>
        <?php foreach($cart_items as $item):?>
        <li><?php $prod = cselprod_ctr($item["p_id"]); echo $prod['product_title'];?> | QTY : <?php echo $item['qty'];?> | <a href=""><button>Manage</button></a> | <a href=""><button>Remove From Cart</button></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
