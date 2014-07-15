<?php
//require_once 'Bigcommerce/Api/Client.php';
require_once '/var/www/vhosts/makeanofferapp.com/httpdocs/Bigcommerce/Api/Client.php';


Client::configure(array(
			'store_url' => $c_store_url,
			'username' => $c_api_username,
			'api_key' => $c_api_key,
		));

$product_id=$_REQUEST['productid'];
$offerprice=$_REQUEST['offerprice'];
$discount=$discount;

$code=Client::generate_random_code(4);
$fields = array(
	"name"=> "Coupon for product Id - $product_id - ". rand(0,10000),
	"code" => "$code",
	"type" =>"per_item_discount",
	"amount"=> $discount, 
	"enabled"=> true,
	"applies_to"=> array(
        "entity"=> "products",
        "ids"=> array("$product_id")
    ),
    "max_uses"=> 1,
    "max_uses_per_customer"=> 1
);

$return=Client::createCoupon($fields);

$data['msg'] = "Copy the Coupon Id : $code";
$data['offerprice'] = $offerprice;
//$data['msg'] .= "<input type=\"hidden\" name=\"hiddcoupon\" value=\"".$code."\" id=\"hiddcoupon\">";
json_encode($data);
?>