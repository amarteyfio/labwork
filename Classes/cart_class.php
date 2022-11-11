<?php
//require db class
require("../Settings/db_class.php");

class cart_class extends db_connection{
    
    //ADD TO CART
    function cart_add($p_id,$ip_add,$c_id,$qty){
        $sql = "INSERT INTO cart (p_id,ip_add,c_id,qty) VALUES ($p_id,$ip_add,$c_id,$qty)";
        return $this->db_query($sql);
    }   

    //INCREASE QUANTITY
    function qty_inc($p_id,$qty){
        $sql = "UPDATE cart SET qty = $qty WHERE p_id = $p_id";
        return $this->db_query($sql);
    }
    
    //GET CLIENT IP ADDRESS
    function getIP(){
        //if ip is from share internet
        if(empty($_SERVER['HTTP_CLIENT_IP']) == false){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(empty($_SERVER['HTTP_X_FORWARDED_FOR'] == false)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;

        
    }

    //ALL ITEMS IN SPECIFIC CART
    function cart_itm($id){
        $sql = "SELECT * FROM cart WHERE c_id = $id";
        $items = $this->db_fetch_all($sql);
        return $items;
    }


    //FUNCTION TO CHECK IF AN ITEM IS ALREADY IN CART
    function check($pid,$cid){
        $sql = "SELECT * FROM cart WHERE p_id = $pid AND c_id = $cid";
        $items = $this->db_fetch_all($sql);

        //if empty
        if(empty($items) == false){
            return true;
        }
        else{
            return false;
        }
    }


    //SELECT BY PID
    function selfrcart($pid,$cid){
        $sql = "SELECT * FROM cart WHERE p_id = $pid AND c_id = $cid";
        $items = $this->db_fetch_one($sql);
        return $items;

    }


    //FOLLOWING FUCNTIONS ARE FOR PRODUCTS
    //SELECT PRODUCT

    function cselprod($id){
        $sql = "SELECT * FROM products WHERE product_id = $id";
        $prod = $this-> db_fetch_one($sql);
        return $prod;
    }

    
}
?>