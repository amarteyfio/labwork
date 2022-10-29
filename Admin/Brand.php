<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION['role'] != 1){
    header("location: ../Login/login.php");
    exit;
}

//include controllers
include "../Controller/product_controller.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <title>Brand Page</title>
</head>
<body>
    <style>th, td {border: 1px solid black;font: 1em sans-serif;padding: 1rem;}</style>
    <style> form {padding:0.5rem;font: 1em sans-serif;}</style>
    <style> input,button {padding: 0.5rem; font: 1em sans-serif;}</style>
    <style>#div-2{float: left; padding: 1rem;} #div-1{float: left; padding: 1rem;}</style>
    <div id = "div-1">
    <h1>Brand Menu</h1>
    <p>Fill the Form Below to Add a Brand</p>
    <form method="POST" id="add_brand_form"> 
        <input type="text" name = "bname" id="brnd" placeholder="Enter a Brand Name" required>
        <br>
        <br>
        <button type="submit" id = "submit">Add Brand</button>
    </form>
    </div>
    <br>
    <br>
    <div id = "div-2">
    <table>
        <thead>
        </thead>
        <tbody>
        <tr>
        <th>Brands</th>
        
        </tr>
        <?php 
        $recs = selallbrands_ctr("brands");
        
        foreach ($recs as $rec):
        ?>
        <tr>
        <td><?php echo $rec['brand_name'];?></td>
        <td><?php echo '<a href="../Actions/update_brand.php?id='. $rec['brand_id'] .'" class="mr-3" title="Edit Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';?></td>
        
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    
    <script>
  $("#add_brand_form").submit(function() {
                var brand= $("#brnd").val();
        $.ajax({
                    type: "POST",
                    url: "../Actions/Add_brand.php",
                    data: "brand=" + brand,
                    success: function(data) {
                       alert("success");
                    }
                });


            });
</script>


</body>
</html>