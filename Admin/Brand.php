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
    <title>Brand Page</title>
</head>
<body>
    <style>#div-2{float: left; padding: 1rem;} #div-1{float: left; padding: 1rem;}</style>
    <style>th, td {border: 1px solid black;font: 1em sans-serif;padding: 1rem;}</style>
    <div id = "div-1">
    <h1>Brand Menu</h1>
    <p>Fill the Form Below to Add a Brand</p>
    <form method="POST" action = "../Actions/Add_brand.php">
        <input type="text" name = "bname" placeholder="Enter a Brand Name">
        <br>
        <br>
        <input type="submit" name = "add" value="Add Brand">
    </form>
    </div>
    <br>
    <br>
    <div id = "div-2">
    <table>
        <thead>
        <tr>
            <th colspan="2">Brands</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <th>Name</th>
        
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


</body>
</html>