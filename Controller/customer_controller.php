<?php
/**
 * @author Amarteyfio
 * 
 * This code contains controllers for the customer functions
 */


require("../Classes/customer_class.php");//include class


//Add New Customer
function addcus_ctr($customer_name,$customer_email,$customer_pass,$customer_country,$customer_city,$customer_contact){
        
    $new_add = new customer_class();

    return $new_add->addcus($customer_name,$customer_email,$customer_pass,$customer_country,$customer_city,$customer_contact);

}

//Select Customer
function selcus_ctr($customer_id){
    $new_select = new customer_class();

    return $new_select->selcus($customer_id);
}

//Edit Customer
function editcus($customer_id,$customer_name,$customer_email,$customer_pass,$customer_country,$customer_city,$customer_contact){
    $new_edit = new customer_class();

    return $new_edit->editcus($customer_id,$customer_name,$customer_email,$customer_pass,$customer_country,$customer_city,$customer_contact);
}


//Delete Customer
function delcus($customer_id){
    $new_del = new customer_class();
    return $new_del->delcus($customer_id);
}

//email select controller
function email_sel_ctr($email){
    $new_log = new customer_class();
    return $new_log->email_sel($email); 
}

?>