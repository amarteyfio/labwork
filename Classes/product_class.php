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


    //Select All Brands
    function selallbrands($table){

        $sql = "SELECT * FROM $table";
        $records = $this->db_fetch_all($sql);
        return $records;
    }


    //select brand using id
    function selectbrandid($id){
        $sql = "SELECT * FROM brands WHERE brand_id = $id";
        $record = $this->db_fetch_all($sql);
        return $record;

    }


    //updatebrand
    function updatebrand($id,$name){

        $sql="UPDATE brands SET brand_name = '$name' WHERE brand_id = $id";

        return $this -> db_query($sql);
    }
}


?>