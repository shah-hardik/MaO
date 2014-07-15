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

$content = "<div style='font-family:verdana;font-size:12px'>Hey, <br/><br/>"; 
$content .= "We are sorry to inform that your deal is reject for  {$product_name}<br /><br />";
$content .= "<table border='0' cellpadding='5' cellspacing='0' style='border-collapse:collapse;font-family:verdana;font-size:13px'>";
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Product Name:</td><td style='font-family:verdana;border:1px solid #DADADA'><a target='_blank' href='{$store_url}'>{$product_name}</a></td></tr>";
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Product Price:</td><td style='font-family:verdana;border:1px solid #DADADA'>{$base_discount_price}</td></tr>";
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Offer Price:</td><td style='font-family:verdana;border:1px solid #DADADA'>{$offerprice}</td></tr>"; 
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Status:</td><td style='font-family:verdana;border:1px solid #DADADA;color:green;'>Rejected!</td></tr>"; 

$content .= "</table>";

$content .= "<br /><br />Thanks, <br/>Team MaO";
$content .= '</div>';

_mail($email, 'Request a Deal Offer Rejected', $content);

$content  = "<div style='padding:10px;font-size:13px;border:1px solid #DaDADA;background-color:rgb(255, 221, 221);font-family:verdana'>Hey Jeff, <br /><br />";
$content .= " Offer is rejected and Mail is sent to the customer email to {$email}. <br /><br />";
$content .= " <a href='javascript:window.close()'>Click here</a> to close the window";
$content .= "</div>"; 

print $content;
exit;
?>
