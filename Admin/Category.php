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
    <title>Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
</head>
<body>
    <div style="float: left; padding: 1rem;">
    <table>
        <thead>
        </thead>
        <tbody>
        <tr>
        <th>Categories</th>
        
        </tr>
        <?php 
        $recs = selall_ctr("categories");
        
        foreach ($recs as $rec):
        ?>
        <tr>
        <td><?php echo $rec['cat_name'];?></td>
        <td><?php echo '<a href="../Actions/update_category.php?id='. $rec['cat_id'] .'" class="mr-3" title="Edit Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <br>
    <div style="float: left; padding: 1rem;">
    <p>Add a Category</p>
    <form method="POST" id="add_cat_form"> 
        <input type="text" name = "cname" id="cat" placeholder="Category Name" required>
        <br>
        <br>
        <button type="submit" id = "submit">Add Category</button>
    </form>
    </div>
   
    <script>
  $("#add_cat_form").submit(function() {
                var category= $("#cat").val();
        $.ajax({
                    type: "POST",
                    url: "../Actions/Add_category.php",
                    data: "category=" + category,
                    success: function(data) {
                       alert("success");
                    }
                });


            });
</script>

    
</body>
</html>