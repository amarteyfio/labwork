<?php

include '../Controller/cart_controller.php';

session_start();

$cid = $_SESSION['id'];
$amt = $_GET['amt'];


$email = $_POST['email'];
$amount = $_POST['amount'];


$url = "https://api.paystack.co/transaction/initialize";
$fields = [
  'email' => $email,
  'amount' => $amount
  
];
$fields_string = http_build_query($fields);
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Authorization: Bearer sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088",
  "Cache-Control: no-cache",
));

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);


/**ORDER AND PAYMENT */
//new order
$invoice = mt_rand(100000,999999);//invoice
$date = date("Y-m-d");
//add order
ord_ctr($cid,$invoice,$date);

$ord = ord_sel_ctr();

//add payment
payment_ctr($amt,$ord['order_id'],$date);

//remove from cart
remcart_ctr($cid);



?>
