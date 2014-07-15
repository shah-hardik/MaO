<?php

/**
 * Detect offer is feasible or not 
 * based upon the minimum price set
 * 
 * and create a coupon on bigcommerce store and return the code
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp 
 * @since September 11, 2013
 * 
 */
session_start();
error_reporting(0);
ini_set("display_errors", "off");
include "../init.php";
include "../lib/Db.class.php";
include "../lib/widgetFunctions.php";

$db = DB::__d();



require_once '../bigcommerce.php';

use Bigcommerce\Api\Client as Bigcommerce;

$product_id = $_REQUEST['productid'];
$offerprice = $_REQUEST['offerprice'];
$customer_id = $_REQUEST['customer_id'];
$product_url = $_REQUEST['pathname'];

$row = $db->format_data($db->query("SELECT * FROM customers_products WHERE cp_c_id = '" . $customer_id . "' AND cp_p_id = '{$product_id}' "));
$row = $row[0];




$API_row = $db->format_data($db->query("SELECT c_store_url,c_api_key,c_api_username FROM customers WHERE c_id =  '{$customer_id}' "));
$API_row = $API_row[0];

$c_store_url = $API_row['c_store_url'];
$c_api_key = $API_row['c_api_key'];
$c_api_username = $API_row['c_api_username'];


$base_discount_price = floatval($row['cp_actual_price']) ? floatval($row['cp_actual_price']) : floatval($row['cp_calculated_price'] - (($row['cp_calculated_price'] * 20) / 100));
$discount = floatval($row['cp_calculated_price']) - floatval($offerprice);



if (floatval($offerprice) >= floatval($base_discount_price) && intval($offerprice) > 0 && $base_discount_price > 0 && $discount >= 0) {

    Bigcommerce::configure(array(
        'store_url' => "https://" . $c_store_url,
        'username' => $c_api_username,
        'api_key' => $c_api_key
    ));
    Bigcommerce::setCipher('RC4');
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        Bigcommerce::setCipher('RC4');
    }
    Bigcommerce::verifyPeer(false);

    $cookie = $_COOKIE['PHPSESSID'];


    $data = $db->format_data($db->query(" select * from customers_offers where co_cookie = '{$cookie}' AND co_c_id = '{$customer_id}'   "));

    $field_array = array(
        "co_c_id" => $customer_id,
        "co_p_id" => $product_id,
        "co_cookie" => $cookie,
        "co_offer" => $offerprice,
        "co_discount" => $discount,
        "co_product_price" => $row['cp_calculated_price'],
        "co_url" => $product_url,
        "co_coupon" => '-NA-',
        "co_coupon_id" => 0
    );
    if (empty($data)) {
        // create the coupon

        try {
            $code = strtoupper(substr(md5(mt_rand(0, 10000)), mt_rand(0, 10), 4));

            $params = array(
                "name" => "MaO Coupon : {$code}",
                "code" => $code,
                "type" => "per_total_discount",
                "amount" => $discount,
                "enabled" => true,
                "applies_to" => array(
                    "entity" => "categories",
                    "ids" => array(0)
                ),
                "max_uses" => 1,
                "max_uses_per_customer" => 1
            );

            $response = Bigcommerce::createCoupon($params);

            if ($response !== FALSE) {
                $field_array['co_coupon'] = $code;
                $field_array['co_coupon_id'] = $response->id;
                $db->insert_query("customers_offers", $field_array);
                $data['msg'] = "Copy the Coupon Id : $code";
                $data['offerprice'] = $offerprice;
                echo $_GET['callback'] . "(" . json_encode($data) . ");";
                //print json_encode($data);
                die;
            }
            $data['msg'] = "Server Error! ";
        } catch (Exception $e) {
            $error_bc = Bigcommerce::getLastError();
            $data['msg'] = "Server Error!";
        }
    } else {
        // data is not empty
        // ah, now what ?
        // get the coupon code
        // and update at bigcommerce
        // now, how should i update the coupon ?
        // not yet to update the coupon man.
        // why ?
        // because, you dont have the calc for this
        // it would be in cart page, okay ?
        // we just have to deal with the coupon creation at the moment.
        // alright.


        $field_array['co_coupon'] = $code = $data[0]['co_coupon'];
        $field_array['co_coupon_id'] = $data[0]['co_coupon_id'];

        $offer_cookie_data = $db->format_data($db->query(" select * from customers_offers where co_cookie = '{$cookie}' AND co_c_id = '{$customer_id}' and co_p_id = '{$product_id}'  "));
        if (!empty($offer_cookie_data)) {
            $db->update_query("customers_offers", $field_array, "  co_cookie = '{$cookie}' AND co_c_id = '{$customer_id}' and co_p_id = '{$product_id}'  ");
        } else {
            $db->insert_query("customers_offers", $field_array);
        }

        $data = array();
        $data['msg'] = "Copy the Coupon Id : $code";
        $data['offerprice'] = $offerprice;

        echo $_GET['callback'] . "(" . json_encode($data) . ");";
        die;
    }
} else {
    $data = array();
    $data['msg'] = "Your offer price not possible!!";
}

echo $_GET['callback'] . "(" . json_encode($data) . ");";
exit;
?>
