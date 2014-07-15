<?php

/**
 * Admin side Api Details file
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since June 17, 2013
 * 
 */
require_once 'bigcommerce.php';

use Bigcommerce\Api\Client as Bigcommerce;

if (isset($_REQUEST['fields']['user_storeurl']) && $_REQUEST['fields']['user_storeurl'] != '' && $_REQUEST['fields']['api_key'] != '' && $_REQUEST['fields']['username'] != '') {

    $_REQUEST['fields']['user_storeurl'] = removeHTTPS($_REQUEST['fields']['user_storeurl']);



    Bigcommerce::configure(array(
        'store_url' => trim('https://' . $_REQUEST['fields']['user_storeurl']),
        'username' => trim($_REQUEST['fields']['username']),
        'api_key' => trim($_REQUEST['fields']['api_key'])
    ));

    Bigcommerce::verifyPeer(false);
    Bigcommerce::setCipher('RC4');

    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        Bigcommerce::setCipher('RC4');
    }

    try {
        $ping = Bigcommerce::getTime();
        if ($ping) {
            $ping->format('H:i:s');
            $update_customer_id = Signup::ApiUpdate($_REQUEST['fields'], $_SESSION['user']['c_id']);
            if ($update_customer_id) {
                //_R("import_product?autoStart=1");
                _R("import");
                exit;
                $greetings = "Your API details updated successfully";
            }
        } else {
            print "<pre>";
            print_r($error_bc = Bigcommerce::getLastError());
            print "</pre>";
            $error = "Your API details invalid";
        }
    }
    //catch exception
    catch (Exception $e) {
        $error = "Your store url invalid";
        
    }
}

$API_detail = Signup::GetApiDetail($_SESSION['user']['c_id']);

if ($API_detail['c_store_url'] != '') {
    $c_store_url = $API_detail['c_store_url'];
} else {
    $c_store_url = '';
}

if ($API_detail['c_api_key'] != '') {
    $c_api_key = $API_detail['c_api_key'];
} else {
    $c_api_key = '';
}

if ($API_detail['c_api_username'] != '') {
    $c_api_username = $API_detail['c_api_username'];
} else {
    $c_api_username = '';
}

if ($_REQUEST['fields']) {
    $c_store_url = $_REQUEST['fields']['user_storeurl'];
    $c_api_key = $_REQUEST['fields']['api_key'];
    $c_api_username = $_REQUEST['fields']['username'];
}

$bc[] = array('text' => 'Api Details');
$jsInclude = "apidetails.js.php";
_cg("page_title", "Api Details");
?>
