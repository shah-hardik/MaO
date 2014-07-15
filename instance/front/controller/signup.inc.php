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
if ($_REQUEST['fields']['user_name'] && $_REQUEST['fields']['user_id'] == '') {
    $email_check = Signup::duplicate_email($_REQUEST['fields']['user_email']);
    if ($email_check == 0) {
        $customer_password =  $_REQUEST['fields']['user_password_add'];
        $new_user_id = Signup::add($_REQUEST['fields']);
        if ($new_user_id) {
            $customer_email = $_REQUEST['fields']['user_email'];
            $customer_name = $_REQUEST['fields']['user_name'];
            $mail_type = 'signup';
            require_once(_PATH . 'lib/send_mail.php');
            $greetings = "Your registration successfully completed";
        } else {
            $error = "Unable to new registration";
        }
    } else {
        $error = "Email address already available";
    }
}

$bc[] = array('text' => 'Signup');
$jsInclude = "signup.js.php";
_cg("page_title", "Signup");
$no_visible_elements = true;
?>
