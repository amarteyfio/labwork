<?php
/**
 * @author amarteyfio
 *
 *This class contains all the methods for customer mangement 
 */

include_once("../Settings/db_class.php");
class customer_class extends db_connection{

    //Add New Customer
    function addcus($customer_name,$customer_email,$customer_pass,$customer_country,$customer_city,$customer_contact){
        
        $sql = "INSERT INTO customer (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact) VALUES('$customer_name','$customer_email','$customer_pass','$customer_country','$customer_city','$customer_contact')";

		return $this->db_query($sql);

    }

    //Select Customer
    function selcus($customer_id){
        $sql = "SELECT * FROM customer WHERE customer_id = $customer_id";
		$record = $this->db_fetch_one($sql);
		return $record;
    }

    //Edit Customer
    function editcus($customer_id,$customer_name,$customer_email,$customer_pass,$customer_country,$customer_city,$customer_contact){
        $sql="UPDATE customer SET customer_name = '$customer_name',customer_email = '$customer_email',customer_pass = '$customer_pass',customer_country = '$customer_country',customer_city = '$customer_city',customer_contact = '$customer_contact' WHERE customer_id = $customer_id";

		return $this -> db_query($sql);
	}
    

    //Delete Customer
    function delcus($customer_id){
        $sql = "DELETE FROM customer WHERE customer_id = $customer_id";

		return $this->db_query($sql);
    }

    //login
    function email_sel($email){
        $sql = "SELECT * FROM customer WHERE customer_email = '$email'";
        $record = $this->db_fetch_one($sql);
        return $record;
    }

}


?>