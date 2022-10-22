<?php
/**
 * @author Amarteyfio
 * 
 * This code contains controllers for the product functions
 */


require("../Classes/product_class.php");//include class


//Add Brand Controller
function addbrand_ctr($name){

    $newbrand = new product_class();//new instance
    return $newbrand->addbrand($name);
}

//select brand with name controller
function selbrand_ctr($name){

    $brd = new product_class();
    return $brd->selbrand($name);
}

?>
