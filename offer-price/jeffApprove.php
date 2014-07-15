<?php
/*
**
 * 
 * Received offer price and mail to jeff
 * 
 * @author Hardik Shah <hardik@codetaxi.com>
 * @version 1.0
 * @package makeanofferapp 
 * @since June 01, 2014
 * 
 */

session_start();

ini_set("display_errors", "on");
error_reporting(E_ALL);


define("_PATH", str_replace("offer-price", "/", __DIR__));
include "../init.php";
include "../lib/Db.class.php";
include "../lib/widgetFunctions.php";
include "../lib/utils.php";

$db = DB::__d();
$product_id = mysql_real_escape_string($_REQUEST['productid']);
$offerprice = mysql_real_escape_string($_REQUEST['offerprice']);
$customer_id = mysql_real_escape_string($_REQUEST['customer_id']);
$product_url = mysql_real_escape_string($_REQUEST['pathname']);
$email = mysql_real_escape_string($_REQUEST['email']); 

$queryString = "{$product_id}:{$offerprice}:{$customer_id}:{$product_url}:{$email}";

$query = "select * from customers_products where cp_p_id = '{$product_id}' and cp_c_id = '{$customer_id}' ";
$data = $db->format_data($db->query($query));
$product_name = $data[0]['cp_p_name'];
$price = $data[0]['cp_calculated_price']; 
$store_url = $_REQUEST['store_url']; 


$content = "<div style='font-family:verdana;font-size:12px'>Hi Jeff, <br/><br/>"; 
$content .= "you have received an offer for your store on <strong>" . date("F, d - l h:i A")  . "</strong><br /><br />";
$content .= "<table border='0' cellpadding='5' cellspacing='0' style='border-collapse:collapse;font-family:verdana;font-size:13px'>";
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Product Name:</td><td style='font-family:verdana;border:1px solid #DADADA'><a target='_blank' href='{$store_url}'>{$product_name}</a></td></tr>";
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Product Price:</td><td style='font-family:verdana;border:1px solid #DADADA'>{$price}</td></tr>";
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Offer Price:</td><td style='font-family:verdana;border:1px solid #DADADA'>{$offerprice}</td></tr>"; 
$content .= "<tr><td style='font-family:verdana;border:1px solid #DADADA;font-weight:bold' align='right'>Customer Email:</td><td style='font-family:verdana;border:1px solid #DADADA'>{$email}</td></tr>"; 
$content .= "<tr><td colspan='2' align='center' style='border:1px solid #DADADA;padding:15px;background-color:#FFFCCC'>";
$content .= '<a href="'._OFFER_APP_BASE_URL.'offer-price/approveOffer.php?p='.$queryString.'" target="_blank" type="button" style="text-decoration:none;font-family:verdana;margin-right:10px;font-size:11px;background: none repeat scroll 0 0 #86b414;border: 1px solid #86b414;border-radius: 5px;-wekbit-border-radius: 5px;-moz-border-radius: 5px;-o-border-radius: 5px;-wekbit-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);-o-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);-moz-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);color: #FFFFFF;font-weight: bold;padding: 5px;text-align: center;">Approve</a>';
$content .= '<a href="'._OFFER_APP_BASE_URL.'offer-price/rejectOffer.php?p='.$queryString.'" target="_blank" type="button" style="text-decoration:none;font-family:verdana;;font-size:11px;background: none repeat scroll 0 0 #CC4E00;border: 1px solid #CC4E00;border-radius: 5px;-wekbit-border-radius: 5px;-moz-border-radius: 5px;-o-border-radius: 5px;-wekbit-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);-o-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);-moz-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);color: #FFFFFF;font-weight: bold;padding: 5px;text-align: center;">Reject</a>';
$content .= "</td></tr></table>";

$content .= "<br /><br />Thanks, <br/>Team MaO";
$content .= '</div>';

_mail('hardik@codetaxi.com', 'Request a Deal Offer Received', $content);

$response = array("mailSent"=>1);
print $_GET['callback'] . "(" . json_encode($response) . ");";
die;

?>