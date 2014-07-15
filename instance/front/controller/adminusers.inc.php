<?php

/**
 * Admin side User List file
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 *
 * 
 */
if (isset($_REQUEST['fields']['user_id']) && $_REQUEST['fields']['user_id'] > 0) {
    $email_check = Adminuser::duplicate_email($_REQUEST['fields']['user_email'], $_REQUEST['fields']['user_id']);
    if ($email_check == 0) {
        $edit_user_id = Adminuser::update($_REQUEST['fields'], $_REQUEST['fields']['user_id']);
        if ($edit_user_id) {
            $greetings = "User updated successfully";
        } else {
            $error = "Unable to update user";
        }
    } else {
        $error = "Email address already available";
    }
    //json_die(true,$data);
}


if ($_REQUEST['fields']['user_name'] && $_REQUEST['fields']['user_id'] == '') {
    $email_check = Adminuser::duplicate_email($_REQUEST['fields']['user_email']);
    if ($email_check == 0) {
        $new_user_id = Adminuser::add($_REQUEST['fields']);
        if ($new_user_id) {
            $greetings = "New user added successfully";
        } else {
            $error = "Unable to add user";
        }
    } else {
        $error = "Email address already available";
    }
}
if ($_REQUEST['editContent']) {
    $id = mysql_real_escape_string($_REQUEST['editContent']);
    $data = Adminuser::get_user_detail($id);
    json_die(true, $data);
}
if ($_REQUEST['deleteContent']) {
    $affected_rows = Adminuser::delete($_REQUEST['deleteContent']);
    json_die($affected_rows ? true : false);
}

$users = Adminuser::get_all_users();
$bc[] = array('text' => 'Users');
$jsInclude = "adminusers.js.php";
_cg("page_title", "Users");
?>
