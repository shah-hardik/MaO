<?php

/**
 * Injection JS file.
 * 
 * Make this as light as possible
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp 
 * @since July 11, 2013
 * 
 */
include "../init.php";
include "../lib/Db.class.php";
include "../lib/widgetFunctions.php";

$db = DB::__d();


$customer_id = mysql_real_escape_string($_REQUEST['cust_id']);
$product_id = mysql_real_escape_string($_REQUEST['pid']);

if (!$customer_id) {
    die;
}


$query = "select c_store_on from customers where c_id = '{$customer_id}' AND c_store_on = '1' ";
$result = $db->query($query);
$total_rows = mysql_num_rows($result);
if (!$total_rows) {
    die("console.warn('CUSTOMER DISABLED THE WIDGET')");
}


$query = " select * from customers_products where cp_c_id = '{$customer_id}' and cp_p_id = '{$product_id}' AND cp_status = '1'  ";

$result = $db->query($query);

$total_rows = mysql_num_rows($result);
if (!$total_rows) {
    die("console.warn('PRODUCT IS NOT ENABLED ')");
}

$Customization = $db->format_data($db->query(sprintf("select * from customization where c_id='%s'", $customer_id)));
$Customization = $Customization[0];

//print "<pre>";
//print_r($Customization);
//print "</pre>";


$btn_color = '';
$font_color = '';
$btn_store_img = '';
$btn_text = '';
$presetClass = '';



if ($Customization['set_presetbutton'] && !(empty($Customization))) {
    $presetClass = $Customization['selected_btn'];
} else if (!empty($Customization)) {
    $btn_color = $Customization['background_color'];
    $font_color = $Customization['font_color'];
    $btn_store_img = $Customization['background_image'];
    $btn_text = $Customization['text'];
}

$style = '';
if (trim($btn_color) != '') {
    $style.='background-color:' . $btn_color . ' !important;';
}
if (trim($btn_store_img) != '') {
    $style.='background-image:url( ' . _U . 'instance/front/uploads/' . $btn_store_img . ');';
}
if (trim($font_color) != '') {
    $style.='color:' . $font_color . ' !important;';
}
if (trim($btn_text) == '') {
    $btn_text = "Submit Your Offer Now";
}

$widgetOptions = getWidgetHTML($customer_id, $btn_text, $style, $presetClass);

ob_start();



switch ($customer_id) {
    case "58":
        include "coupon_ui_script_nenad_brent.php";
        break;
	case "114":
	case "100":
	case "68":
		include "coupon_ui_script_basic.php";
	break;
    case "137":
		include "coupon_ui_script_jeff.php";
	break;
    //case "68":
    case "99":
    
        include "coupon_ui_script_popup.php";
        break;
    default:
        include "coupon_ui_script_basic.php";
        break;
}

$content = ob_get_contents();
ob_end_clean();
header('Content-Type: text/javascript');
print str_replace(array('<script type="text/javascript">', '</script>',""), array('', ''), $content);
?>