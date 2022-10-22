<?php 
/**
 * 
 * @author Amarteyfio
 * 
 * This class contains the methods for the products
 */

require "../Settings/db_class.php";


class product_class extends db_connection{

//Methods

    //Add Brand
    function addbrand($name){
        //query
        $sql = "INSERT INTO brands (brand_name) VALUES('$name')";

		return $this->db_query($sql);
    }


    //Select Brand using name
    function selbrand($name){
        $sql = "SELECT * FROM brands WHERE brand_name = '$name'";
        $record = $this->db_fetch_one($sql);
        return $record;
    }

}
?>