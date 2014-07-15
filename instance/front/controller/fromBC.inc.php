<?php

$customers = q("select * from customers where c_from_bc = '1' ");

$revenue = qs("select sum(c_cost) as cst from customers where c_from_bc = '1' ");

$bc[] = array('text' => 'BigCommerce Affiliate');
$jsInclude = "";
_cg("page_title", "BigCommerce Affiliate Tracking");

?>