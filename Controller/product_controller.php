<?php
/**
 * @author Amarteyfio
 * 
 * This code contains controllers for the product functions
 */


require("../Classes/product_class.php");//include class

//--BRAND CONTROLLERS--//

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

//select all brands controller
function selall_ctr($table){
    $total = new product_class();
    return $total->selall($table);

}

//select brand using id controller
function selectbrandid_ctr($id){
    $brand = new product_class();
    return $brand->selectbrandid($id);
}

//updatebrand controller
function updatebrand_ctr($id,$name){
    $newup = new product_class();
    return $newup->updatebrand($id,$name);
}


//--CATEGORY CONTROLLERS--//
function addcat_ctr($name){
    $newcat = new product_class();
    return $newcat->addcat($name);
}

//edit controller 
function editcat_ctr($id,$cname){
    $new_cat_edit = new product_class();
    return $new_cat_edit->editcat($id,$cname);
}

//select category controller
function selectcat_ctr($id){
    $newrec = new product_class();
    return $newrec->selectcat($id);
}

//--PRODUCT CONTROLLERS--//

    //ADD
    function addprod_ctr($prod_cat,$prod_brnd,$prod_tit,$prod_prc,$prod_desc,$prod_img,$prod_key){
        $new_prod = new product_class();
        return $new_prod->addprod($prod_cat,$prod_brnd,$prod_tit,$prod_prc,$prod_desc,$prod_img,$prod_key);
    }

    //UPDATE
    function updprod_ctr($prod_id,$prod_cat,$prod_brnd,$prod_tit,$prod_prc,$prod_desc,$prod_img,$prod_key){
        $new_upd = new product_class();
        return $new_upd->updprod($prod_id,$prod_cat,$prod_brnd,$prod_tit,$prod_prc,$prod_desc,$prod_img,$prod_key);
    }

    //SELECT
    function selprod_ctr($id){
        $select = new product_class();
        return $select->selprod($id);
    }

    //SELECT RELATED PRODUCTS
    function sel_rel_products_ctr($catid){
        $related = new product_class();
        return $related->sel_rel_prods($catid);
    }

    //PRODUCT SEARCH CONTROLLER
    function product_search_ctr($term){
        $newsearch = new product_class();
        return $newsearch->product_search($term);
    }

    //PRODUCT COUNT CONTROLLER
    function prod_count_ctr(){
        $a = new product_class();
        return $a->prod_count();
    }

    //GET PRODUCTS BY PAGE CTRL
    function prod_page_ctr($page,$limit){
        $page = new product_class();
        return $page->prod_page($page, $limit);
    }

    //CART COUNT CTR
    function cart_count_ctr($cid){
        $count = new product_class();
        return $count->cart_count($cid);
    }
?>
