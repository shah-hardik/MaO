<?php

/**
 * Main Index File.
 * 
 * App is single point entry
 * 
 * Assigns constant vars
 * Loads the loader
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp 
 * @since May 28, 2013
 * 
 delete FROM `products_category` WHERE `pc_customer_id` = '137';
delete from customers_products where cp_c_id = '137';
delete from customers_offers where cp_c_id = '137';
 
 */

session_start();
ini_set("display_errors","on");
//error_reporting(E_ALL);
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/Denver');

include "init.php";
include "loader.php";
?>
