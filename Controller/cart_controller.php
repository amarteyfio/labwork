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

//REMOVE FROM CART
function cart_remove_ctr($pid,$cid){
    $rem = new cart_class();
    return $rem->cart_remove($pid,$cid);
}

//EDIT QTY CTR
function editqty_ctr($pid,$cid,$qty){
    $edit = new cart_class();
    return $edit->editqty($pid,$cid,$qty);
}

//New order
function ord_ctr($cid,$inv,$date){
    $ord = new cart_class();
    return $ord->ord($cid,$inv,$date);
}

//add payment 
function payment_ctr($amt,$cid,$order_id,$date){
    $pay = new cart_class();
    return $pay->payment($amt,$cid,$order_id,$date);
}

//SELECT NEW ORDER
function ord_sel_ctr(){
    $sel = new cart_class();
    return $sel->ord_sel();
}

function remcart_ctr($cid)
{
    $rem = new cart_class();
    return $rem->remcart($cid);
}