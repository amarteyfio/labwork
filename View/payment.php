<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}

include "../Controller/cart_controller.php";
include_once "../Controller/customer_controller.php";

$id = $_SESSION['id'];

$cart_items = cart_itm_ctr($id);

$user = selcus_ctr($_SESSION['id']);




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
        <br>
        <br>
        <div style="padding: 2rem; font: 16px sans-serif;">
        <h1>Order Summary:</h1>
        <?php foreach($cart_items as $item):
        $prod = cselprod_ctr($item["p_id"]);
        $total = $total + intval($prod['product_price'] * $item['qty']);
        ?>
            <p>Item: <?php echo $prod['product_title'];?> x<?php echo $item['qty'];?></p>
        <?php endforeach;?>
        <p>Total: <?php echo $total; ?></p>
        <button type="submit" onclick="payWithPaystack()">Pay</button>
        </div>

        <script>
    /* const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false); */
    function payWithPaystack() {
        event.preventDefault();
        let handler = PaystackPop.setup({

            key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
            email: <?php echo $user['customer_email'];?>,
            amount: <?php echo (intval($total) * 100);?>,
            currency: 'GHS',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
            alert('Window closed.');
            },
            callback: function(response){
            let message = 'Payment complete! Reference: ' + response.reference;
            alert(message);
            // add_payment_detail_ctrl
            email = <?php echo $user['customer_email'];?>;
            amount = <?php echo (intval($total));?>;
            var dataString = 'email='+ email + '&amount='+ amount;
            if (response.status=='success'){
            //alert("Please Fill All Fields");
            
            
           
            $.ajax({
            type: "POST",
            url: "../Actions/process_payment.php?amt="+amount,
            data: dataString,
            cache: false,
            success: function(result){
            // alert(result);
            window.location="payment_success.php";
            // window.location = "pay"
            }
            });
          }
          

            }
            

        });
        handler.openIframe();
    }
</script>
    </body>
</html>