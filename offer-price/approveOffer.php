<?php
/**
 * Approve the offer received from email
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp 
 * @since June 27, 2014
 * 
 */
session_start();
ini_set("display_errors", "off");
error_reporting(0);

define("_PATH", str_replace("offer-price", "/", __DIR__));
include "../init.php";
include "../lib/Db.class.php";
include "../lib/widgetFunctions.php";
include "../lib/utils.php";

$db = DB::__d();

require_once '../bigcommerce.php';

use Bigcommerce\Api\Client as Bigcommerce;

// $queryString = "{$product_id}:{$offerprice}:{$customer_id}:{$product_url}:{$email}";
$data = explode(":",$_REQUEST['p']);

$product_id = $data[0];
$offerprice = $data[1];
$customer_id = $data[2];
$product_url = $data[3];
$email = $data[4];

$row = $db->format_data($db->query("SELECT * FROM customers_products WHERE cp_c_id = '{$customer_id}' AND cp_p_id = '{$product_id}' ")); 
$row = $row[0];

$product_name = $row['cp_p_name'];

$API_row = $db->format_data($db->query("SELECT c_store_url,c_api_key,c_api_username FROM customers WHERE c_id =  '{$customer_id}' "));
$API_row = $API_row[0];

$c_store_url = $API_row['c_store_url'];
$c_api_key = $API_row['c_api_key'];
$c_api_username = $API_row['c_api_username'];

$base_discount_price = floatval($row['cp_calculated_price']);
$discount = $base_discount_price - floatval($offerprice);

if($discount <= 0){
	print "Invalid Offer Price. Offerprice is greater than the retail price";
	die;
}

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



// create the coupon

try {
	$code = strtoupper(substr(md5(mt_rand(0, 10000)), mt_rand(0, 10), 4));

	$params = array(
		"name" => "Request A Deal Coupon : {$code}",
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
		 $field_array = array(
			"co_c_id" => $customer_id,
			"co_p_id" => $product_id,
			"co_cookie" => 'APPROVE_FROM_MAIL',
			"co_offer" => $offerprice,
			"co_discount" => $discount,
			"co_product_price" => $base_discount_price,
			"co_url" => $product_url,
			"co_coupon" => '-NA-',
			"co_coupon_id" => 0
		);
		
		$field_array['co_coupon'] = $code;
		$field_array['co_coupon_id'] = $response->id;
		$db->insert_query("customers_offers", $field_array); 
		

		$content = "<div style='font-family:verdana;font-size:12px'>Hey, <br/><br/>"; 
		$content .= "We are glad to inform that we have accepted your requested deal for {$product_name}<br /><br />";
		$content .= "<table border='0' cellpadding='5' cellspacing='0' style='border-collapse:collapse;font-family:verdana;font-size:13px'>";
		$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Product Name:</td><td style='font-family:verdana;border:1px solid #DADADA'><a target='_blank' href='{$store_url}'>{$product_name}</a></td></tr>";
		$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Product Price:</td><td style='font-family:verdana;border:1px solid #DADADA'>{$base_discount_price}</td></tr>";
		$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Offer Price:</td><td style='font-family:verdana;border:1px solid #DADADA'>{$offerprice}</td></tr>"; 
		$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Status:</td><td style='font-family:verdana;border:1px solid #DADADA;color:green;'>Approved!</td></tr>"; 
		$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Coupon code:</td><td style='font-family:verdana;border:1px solid #DADADA;'>$code</td></tr>"; 
		$content .= "</table>";
		$content .= "<br /><br />Please use above coupon code while checking out to avail the deal<br/ ><br />";
		$content .= "<br /><br />Thanks, <br/>Team MaO";
		$content .= '</div>';

		_mail($email, 'Request a Deal Offer Accepted', $content);
		
		$content  = "<div style='padding:10px;font-size:13px;border:1px solid #DaDADA;background-color:#FFFCCC;font-family:verdana'>Hey Jeff, <br /><br />";
		$content .= " Offer is Accepted and Mail is sent to the customer email to {$email}. <br /><br />";
		$content .= " <a href='javascript:window.close()'>Click here</a> to close the window";
		$content .= "</div>"; 
		
		print $content;
		
		die;
	}
	
} catch (Exception $e) {
	$error_bc = Bigcommerce::getLastError();
	print "Error occured";
	
}
    
exit;
?>
