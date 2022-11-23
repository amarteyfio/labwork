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
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../CSS/all_products_style.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Shopn</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                        <input class="form-control form-control-dark w-100" type="text" id = "myInput" onekeyup = "myFunction()" placeholder="Search" aria-label="Search">
                    </ul>

                </div>
            </div>
        </nav>
    <!--NAV-->
    <div style="padding: 1rem; float:left;">
    <h1>CART</h1> 
    <ul style="padding: 1px;">
        <?php
        $total = 0; 
        foreach($cart_items as $item):
         $prod = cselprod_ctr($item["p_id"]);
         $total = $total + intval($prod['product_price'] * $item['qty']);
        ?>
        <li><?php echo $prod['product_title'];?> | QTY : <input type="text" id = "<?php $prod['product_id'];?>" size = "2" maxlength="2" value ="<?php echo $item['qty'];?>"><a onclick="quantadd('<?php echo $prod['product_id'];?>')"><button type = "submit" id="sub">Manage QTY</button></a> | <a href="../Actions/remove_from_cart.php?pid=<?php echo $item['p_id'];?>" onclick="return confirm('Remove from Cart?')"><Button>Remove From Cart</Button></a></li>
        <br>
        <?php endforeach; ?>
    </ul>
    <p>Total : GHC <?php echo $total; ?></p>
    <br>
    <a href="payment.php"><button style="padding: 1px;">Checkout</button></a>

    </div>
        
        <script>
        function quantadd(x){
            var quant = document.getElementById(x).value;
            window.location.replace("../Actions/manage_quantity.php?pid="+x+"&qty="+quant);
        }
        </script>
</body>
</html>




