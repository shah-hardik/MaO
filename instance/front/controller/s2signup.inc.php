<?php

/**
 * Front side User Registration File
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */

ini_set("display_errors","on");
error_reporting(E_ALL);

$request_data = json_encode($_REQUEST);

// sample payload
// {"q":"s2signup","username":"dev.test4","password":"&G(TQsZ%aL))","first_name":"dev","last_name":"test4"}

qi("s2api", array("details" => _escape($request_data)));


$_REQUEST['fields']['user_name'] = $_REQUEST['username'];
$_REQUEST['fields']['name'] = $_REQUEST['first_name'] . " " . $_REQUEST['last_name'];
$_REQUEST['fields']['user_email'] = $_REQUEST['email'];
$_REQUEST['fields']['user_password_add'] = ($_REQUEST['password']);
$_REQUEST['fields']['first_name'] = $_REQUEST['first_name'];
$_REQUEST['fields']['last_name'] = $_REQUEST['last_name'];
$_REQUEST['fields']['level'] = $_REQUEST['level'];
$_REQUEST['fields']['ip'] = $_REQUEST['ip'];

switch($_REQUEST['fields']['level']){
	case "0":
		$_REQUEST['fields']['c_offer_limit'] = "1000";
		$_REQUEST['fields']['c_cost'] = "20.00";
	break;
}

$new_user_id = Signup::add($_REQUEST['fields']);

if ($new_user_id) {

	$data = q("select * from bc_hits where bh_ip = '{$_REQUEST['ip']}' ");
	if(!empty($data)){
		qu("customers",array('c_from_bc'=>1)," c_id = '{$new_user_id}' ");
	}

    $customer_email = $_REQUEST['fields']['user_email'];
    $customer_name = $_REQUEST['fields']['first_name'] . " " . $_REQUEST['fields']['last_name'];
    $customer_password = $_REQUEST['password'];
    $mail_type = 'signup';
    //require_once(_PATH . 'lib/send_mail.php');
}

die;
?>
