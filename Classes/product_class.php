<?php 
/**
 * 
 * @author Amarteyfio
 * 
 * This class contains the methods for the products
 */

require "../Settings/db_class.php";


class product_class extends db_connection{

    //--BRAND FUNCTIONS--//

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


    //Select All
    function selall($table){

        $sql = "SELECT * FROM $table";
        $records = $this->db_fetch_all($sql);
        return $records;
    }


    //select brand using id
    function selectbrandid($id){
        $sql = "SELECT * FROM brands WHERE brand_id = $id";
        $record = $this->db_fetch_one($sql);
        return $record;

    }


    //updatebrand
    function updatebrand($id,$name){

        $sql="UPDATE brands SET brand_name = '$name' WHERE brand_id = $id";

        return $this -> db_query($sql);
    }


    //--CATEGORY FUNCTIONS--//

    //add Category
    function addcat($cname){
        $sql = "INSERT INTO categories (cat_name) VALUES('$cname')";

		return $this->db_query($sql);

    }

    //Edit Category
    function editcat($id,$cname){

        $sql="UPDATE categories SET cat_name = '$cname' WHERE cat_id = $id";

        return $this -> db_query($sql);
    }

    //Select Category
    function selectcat($id){
        $sql = "SELECT * FROM categories WHERE cat_id = $id";
        $record = $this->db_fetch_one($sql);
        return $record;

    }
    
}


?>