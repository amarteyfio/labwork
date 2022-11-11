<?php
/**
 * @author Amarteyfio
 * 
 * This code contains controllers for the customer functions
 */


require("../Classes/cart_class.php");//include class

//ADD
function cart_add_ctr($p_id,$ip_add,$c_id,$qty){
    $add = new cart_class();
    return $add->cart_add($p_id,$ip_add,$c_id,$qty);
}

function getIP_ctr(){
    $newIP = new cart_class();
    return $newIP->getIP();
}

function qty_increase_ctr($p_id,$qty){
    $newinc = new cart_class();
    return $newinc->qty_inc($p_id,$qty);
}

//SELECT ITEMS
function cart_itm_ctr($id){
    $cart = new cart_class();
    return $cart->cart_itm($id);

}

function selfrclass_ctr($pid,$cid){
    $new = new cart_class();
    return $new->selfrcart($pid,$cid);
}


//--FOLLOWING CONTROLLERS ARE FOR PRODUCTS--//
//SELECT PRODUCT
function cselprod_ctr($id){
    $select = new cart_class();
    return $select->cselprod($id);
}
//-END-//

//CHECK IF AN ITEM IS IN CART ALREADY
function check_ctr($pid,$cid){
    $check = new cart_class();
    return $check->check($pid,$cid);
}

