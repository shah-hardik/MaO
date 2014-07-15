<?php

/**
 * Admin side Login file
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 *
 * 
 */
if (!isset($_SESSION['user'])) {
    // CHECK ADMIN LOGIN
    if ($_REQUEST['username']) {
        $user_name = _escape($_REQUEST['username']);
        $password = _escape($_REQUEST['password']);

        if (User::doLogin($user_name, $password)) {
            User::setSession($user_name);
            if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] == 'customer') {
                $detail = Signup::GetApiDetail($_SESSION['user']['c_id']);
                if ($detail['c_affiliate_user']) {
                    _R(lr('fromBC'));
                } else if ($detail['c_store_url'] == '' || $detail['c_api_key'] == '' || $detail['c_api_username'] == '') {
                    _R(lr('apidetails'));
                } else {
                    _R(lr('home'));
                }
            } else {
                _R(lr('home'));
            }
        } else {
            $error = "Invalid Login";
        }
    }

    $no_visible_elements = true;

    $jsInclude = "login.js.php";
    _cg("page_title", "Login");
} else {
    _R(lr('home'));
}
?>