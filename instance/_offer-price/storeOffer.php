<?php

/**
 * Store the offer price assocaited with cookie
 * 
 * and later update the coupon if required
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp 
 * @since September 11, 2013
 * 
 */
session_start();
error_reporting(E_ALL);
ini_set("display_errors", "on");
include "../init.php";
include "../lib/Db.class.php";

$db = DB::__d();

require_once '../bigcommerce.php';

use Bigcommerce\Api\Client as Bigcommerce;

$products = ($_REQUEST['products']);
$quantity = ($_REQUEST['quantity']);

$customer_id = mysql_real_escape_string($_REQUEST['customer_id']);
// we need to calculate the total coupon value.
// first get the product coupon value
// next, calculate the coupon
// update on bigcomm

$cookie = $_COOKIE['PHPSESSID'];

//$query = "select * from customers_offers where co_cookie = '{$cookie}' and co_c_id = '{$customer_id}' ";
$query = "select * from customers_offers where co_cookie = '{$cookie}' and co_c_id = '{$customer_id}' ";

$result = $db->query($query);
$data = $db->format_data($result, "co_url");


$total_discount = 0;
foreach ($products as $index => $each_product) {
    $price = floatval($data[$each_product][0]['co_discount'] * $quantity[$index]);
    $total_discount = $price + $total_discount;
    $coupon_id = $data[$each_product][0]['co_coupon_id'];
    $coupon_code = $data[$each_product][0]['co_coupon'];
}

$API_row = $db->format_data($db->query("SELECT c_store_url,c_api_key,c_api_username FROM customers WHERE c_id =  '{$customer_id}' "));
$API_row = $API_row[0];

$c_store_url = $API_row['c_store_url'];
$c_api_key = $API_row['c_api_key'];
$c_api_username = $API_row['c_api_username'];

Bigcommerce::configure(array(
    'store_url' => "https://" . $c_store_url,
    'username' => $c_api_username,
    'api_key' => $c_api_key
));

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    Bigcommerce::setCipher('RC4');
}
Bigcommerce::verifyPeer(false);


$params = array(
    "name" => "MaO Coupon : {$coupon_code}",
    "code" => $coupon_code,
    "type" => "per_total_discount",
    "amount" => $total_discount,
    "enabled" => true,
    "max_uses" => 1,
    "applies_to" => array(
        "entity" => "categories",
        "ids" => array(0)
    ),
    "max_uses_per_customer" => 1
);


$response = Bigcommerce::updateCoupon($coupon_id, $params);



if ($response !== FALSE) {
    echo $_GET['callback'] . "(" . json_encode(array("success" => true, 'coupon_code' => $coupon_code)) . ");";
    die;
}
echo $_GET['callback'] . "(" . json_encode(array("success" => false)) . ");";
?>
