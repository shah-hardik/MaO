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
        $new_user_id = Signup::add($_REQUEST['fields']);
        if ($new_user_id) {
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
