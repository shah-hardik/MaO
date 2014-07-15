<?php

include _PATH . 'lib/widgetFunctions.php';



if (isset($_REQUEST['fields']['admin_detail']) and $_REQUEST['fields']['admin_detail'] == 1) {
    $isError = false;
    /**
     * Algorithm:
     * check for the validity of credentials
     * and check for the template
     * and put the code.
     * 
     * code should be put above below the qty box.
     * 
     * lets check.
     * 
     * 
     */
    $webDavUrl = 'https://' . $_REQUEST['fields']['user_storeurl'] . "/dav/template/Snippets/ProductAddToCart.html";
   // $webDavUrl = "https://store-xfc58.mybigcommerce.com/dav/template/Snippets/ProductAddToCart.html";
    //$webDavUrl = 'https://' . 'hcisites.com' . "/dav/template/Snippets/ProductAddToCart.html";
    $webDavUsername = $_REQUEST['fields']['user_admin_username'];
    $webDavPassword = $_REQUEST['fields']['user_admin_password'];

    #1. look for the product template
    $webDavResponse = _gu($webDavUrl, $webDavUsername, $webDavPassword);

    //print "<pre>";var_dump($webDavResponse); print "</pre>";
//    print "<pre> Error : ";
//    print_r($webDavResponse);
//    print "</pre>";

    if (!$webDavResponse['error']) {
	$templateString = $webDavResponse['data'];

	$templateString = preg_replace('/(?<=<!--\[MAO-WIDGET\]-->).+(?=<!--\[\/MAO-WIDGET\]-->)/s', '', $templateString);
	$templateString = str_replace(array("<!--[MAO-WIDGET]-->", "<!--[/MAO-WIDGET]-->"), array("", ""), $templateString);


	$pos = strpos($templateString, '%%GLOBAL_AddToCartQty%%');
	if ($pos !== FALSE) {
	    $posNext = strpos($templateString, "</div>", $pos);

	    // remove the widget
	    $widgetURL = _OFFER_APP_URL . "offer-price/coupon_ui.php?cust_id={$_SESSION['user']['c_id']}";
	    $snippet = '<!--[MAO-WIDGET]--><div id="mao"></div><script type="text/javascript">$(document).ready(function(){ console.log("Loading script");var product_id = $("#product_id").val() || $("input[name=product_id]").val(); $.getScript("' . $widgetURL . '&pid="+product_id, function(){ console.log("received response") });});</script><!--[/MAO-WIDGET]-->';

	    // save one backup on client's server
	    _pu($webDavUrl . date("d_m_Y"), $webDavUsername, $webDavPassword, $templateString);

	    // save one backup on our server
	    $userTemplateDir = _PATH . "instance/" . _cg("instance") . "/media/bigComTemplate/{$_SESSION['user']['c_id']}/";
	    if (!file_exists($userTemplateDir)) {
		mkdir($userTemplateDir);
	    }
	    file_put_contents($userTemplateDir . "ProductAddToCart.html" . date("d_m_Y"), $templateString);

	    // Over-write the template
	    $newTemplate = substr_replace($templateString, "{$snippet}", ($posNext + 6), 0);
	    $webDAVPUTResponse = _pu($webDavUrl, $webDavUsername, $webDavPassword, $newTemplate);

	    // Now, we need to do the same for cart.html page.
	    $webDavUrl = 'https://' . $_REQUEST['fields']['user_storeurl'] . "/dav/template/cart.html";
            //$webDavUrl = "https://store-xfc58.mybigcommerce.com/dav/template/cart.html";
	    $webDavResponse = _gu($webDavUrl, $webDavUsername, $webDavPassword);
               //print "Error: ".$webDavResponse['error'];
           // print "URL: ".$webDavUrl;
	    if (!$webDavResponse['error']) {
		$templateString = $webDavResponse['data'];

		$templateString = preg_replace('/(?<=<!--\[MAO-WIDGET\]-->).+(?=<!--\[\/MAO-WIDGET\]-->)/s', '', $templateString);
		$templateString = str_replace(array("<!--[MAO-WIDGET]-->", "<!--[/MAO-WIDGET]-->"), array("", ""), $templateString);


		$pos = strpos($templateString, '</body>');
		if ($pos !== FALSE) {
		    // remove the widget
		    $widgetURL = _OFFER_APP_URL . "offer-price/coupon_cart.php?cust_id={$_SESSION['user']['c_id']}";
		    $snippet = '<!--[MAO-WIDGET]--><script type="text/javascript">$(document).ready(function(){$.getScript("' . $widgetURL . '", function(){ console.log("received response") });});</script><!--[/MAO-WIDGET]-->';

		    // save one backup on client's server
		    _pu($webDavUrl . date("d_m_Y"), $webDavUsername, $webDavPassword, $templateString);

		    // save one backup on our server
		    $userTemplateDir = _PATH . "instance/" . _cg("instance") . "/media/bigComTemplate/{$_SESSION['user']['c_id']}/";
		    if (!file_exists($userTemplateDir)) {
			mkdir($userTemplateDir);
		    }
		    file_put_contents($userTemplateDir . "cart.html" . date("d_m_Y"), $templateString);

		    // Over-write the template
		    $newTemplate = substr_replace($templateString, "{$snippet}", ($pos), 0);
		    $webDAVPUTResponse = _pu($webDavUrl, $webDavUsername, $webDavPassword, $newTemplate);
		    $fields['c_admin_username'] = $_REQUEST['fields']['user_admin_username'];
		    if (isset($_REQUEST['fields']['user_admin_password']) && $_REQUEST['fields']['user_admin_password'] != '') {
			$fields['c_admin_password'] = $_REQUEST['fields']['user_admin_password'];
		    }
		    $update = Signup::AdminUpdate($fields, $_REQUEST['fields']['c_id']);
		    if ($update) {
			$greetings = "Your Admin details updated successfully";
		    }
		} else {
		    js_log("POSITION NOT FOUND FOR CART.HTML");
		    $isError = true;
		}
	    } else {
		js_log("CART.HTML NOT FOUND");
		$isError = true;
	    }
	} else {
	    js_log("POSITION NOT FOUND FOR ADD-TO-CART.HTML");
	    $isError = true;
	}
	// well, we should put things into the index or head.
    } else {
	js_log("ADD-TO-CART.HTML NOT FOUND");
	$isError = true;
    }
}

if ($isError) {
    $url = _U . "deploy_help";
    $error = "Unable to deploye the widget. Looks like template is not edited yet. ";// Kindly follow this <a style='color:blue' target='_blank' href='{$url}'>link</a> for further help ";
}

$API_detail = Signup::GetApiDetail($_SESSION['user']['c_id']);
if ($API_detail['c_store_url'] != '') {
    $c_store_url = $API_detail['c_store_url'];
} else {
    $c_store_url = '';
}

if ($API_detail['c_admin_username'] != '') {
    $c_admin_username = $API_detail['c_admin_username'];
} else {
    $c_admin_username = '';
}

$bc[] = array('text' => 'Get Embed Code');
$jsInclude = "get_code.js.php";
_cg("page_title", "Get Embed Code");
?>
