<?php

if(isset($_REQUEST['fields']['min_price'])){
    $_REQUEST['fields']['min_price'] = intval($_REQUEST['fields']['min_price']) > 100 ? 100 : intval($_REQUEST['fields']['min_price']);
    Customer::update($_REQUEST['fields'],$_REQUEST['fields']['c_id']);
    $query = " update customers_products set cp_actual_price = cp_calculated_price - (  (cp_calculated_price * {$_REQUEST['fields']['min_price'] } ) / 100 )   ";
    q($query);
    $greetings = "Base price updated";
}

$bc[] = array('text' => 'Minimum Offer Price');
$jsInclude = "min_offer_price.js.php";
_cg("page_title", "Products");
?>
