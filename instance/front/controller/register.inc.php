<?php

$birthDate = date('Y-m-d', strtotime($_REQUEST['birthdate']));

if ($_REQUEST['fname']) {

    $customers = q("SELECT * FROM customers ");
    foreach ($customers as $each_data):

       
        if (strtolower($each_data['c_email']) == strtolower($_REQUEST['email'])) {
            $email_exits = 1;
        }
    endforeach;

    if ( empty($email_exits)) {
        //Inserting Row

        $md5_password = md5($_REQUEST['_password']);

        $inserted = qi("customers", array("c_first_name" => $_REQUEST['fname'], "c_last_name" => $_REQUEST['lname'],
            "c_password" => $md5_password, "c_email" => $_REQUEST['email']));

        if ($inserted > 0) {
            _R(lr('login'));
        }
    } else {
       if (!empty($email_exits)) {
            $error = "Someone already has that Email. Try another!! ";
        }
    }
}



$no_visible_elements = true;
$jsInclude = "register.js.php";
_cg("page_title", "Registration");
?>
