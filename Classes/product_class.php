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


    //--PRODUCT FUNCTIONS--//
    
    //ADD
    function addprod($prod_cat,$prod_brnd,$prod_tit,$prod_prc,$prod_desc,$prod_img,$prod_key){
        $sql = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES('$prod_cat','$prod_brnd','$prod_tit','$prod_prc','$prod_desc','$prod_img','$prod_key')";
        return $this-> db_query($sql);

    }

    //UPDATE
    function updprod($prod_id,$prod_cat,$prod_brnd,$prod_tit,$prod_prc,$prod_desc,$prod_img,$prod_key){
        $sql = "UPDATE products SET product_cat = '$prod_cat', product_brand = '$prod_brnd', product_title = '$prod_tit', product_price = '$prod_prc', product_desc = '$prod_desc', product_image = '$prod_img', product_keywords = '$prod_key' WHERE product_id = $prod_id";
        return $this-> db_query($sql);
    }
    
    //SELECT
    function selprod($id){
        $sql = "SELECT * FROM products WHERE product_id = $id";
        $prod = $this-> db_fetch_one($sql);
        return $prod;
    }

    //SELECT RELATED PRODUCTS
    function sel_rel_prods($catid){
        $sql = "SELECT * FROM products WHERE product_cat = $catid";
        $relprod = $this->db_fetch_all($sql);
        return $relprod;
    }

    //PRODUCT SEARCH
    function product_search($term){
        $sql = "SELECT * FROM `products` WHERE `product_keywords` LIKE '%{$term}%' ORDER BY 'keywords'";
        $results = $this->db_fetch_all($sql);
        return $results;
    }
}   


?>