<?php

/**
 * Admin User Dashboard File
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 *
 * 
 */

$data = qs("select c_store_url from customers where c_id = '{$_SESSION['user']['c_id']}' ");
if(!$data['c_store_url']){
    _R(_U."apidetails");
}

$bc[] = array('text' => 'Home');
$jsInclude = "home.js.php";
_cg("page_title", "Home");


?>