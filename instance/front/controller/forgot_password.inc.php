<?php
/**
 * Customer Forgot Password
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 *
 * 
 */
$no_visible_elements = true;
if (!isset($_SESSION['user'])) {  // CHECK Customer LOGIN
    if (isset($_REQUEST['user_email']) && $_REQUEST['user_email'] != '') {
        $check_email = Signup::forgotpassword_Check_email(trim($_REQUEST['user_email']));
        if($check_email > 0){
            $new_password = Signup::generate_password();
            $customer_name = Signup::getName(trim($_REQUEST['user_email']));
            $mail_type = 'forgot_password';
            require_once(_PATH.'lib/send_mail.php');
            $update_password = Signup::update_password(trim($_REQUEST['user_email']),$new_password);
            if($mail_error == 1){
              $error = $mail_error_detail;   
            } else {
              $greetings = "Password send in your email.";  
            }
            
        } else {
            $error = "This email address is not available.";
        }
    }
    $jsInclude = "forgot_password.js.php";
    _cg("page_title", "Forgot Password");
} else {
    _R(lr('home'));
}
?>