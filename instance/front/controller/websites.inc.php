<?php

/**
 * Admin side Website List file
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
if (isset($_REQUEST['fields']['website_id']) && $_REQUEST['fields']['website_id'] > 0) {
    $website_check = Website::duplicate_website($_REQUEST['fields']['website_name'], $_SESSION['user']['id'], $_REQUEST['fields']['website_id']);
    if ($website_check == 0) {
        $_REQUEST['fields']['uid'] = $_SESSION['user']['id'];
        $edit_website_id = Website::update($_REQUEST['fields'], $_REQUEST['fields']['website_id']);
        if ($edit_website_id) {
            $greetings = "Website updated successfully";
        } else {
            $error = "Unable to update website";
        }
    } else {
        $error = "Website already available";
    }
    //json_die(true,$data);
}

if ($_REQUEST['editContent']) {
    $id = mysql_real_escape_string($_REQUEST['editContent']);
    $data = Website::get_website_detail($id);
    json_die(true, $data);
}


if ($_REQUEST['fields']['website_name'] && $_REQUEST['fields']['website_id'] == '') {
    $website_check = Website::duplicate_website($_REQUEST['fields']['website_name'], $_SESSION['user']['id']);
    if ($website_check == 0) {
        $_REQUEST['fields']['uid'] = $_SESSION['user']['id'];
        $new_website_id = Website::add($_REQUEST['fields']);
        if ($new_website_id) {
            $greetings = "Website added successfully";
        } else {
            $error = "Unable to add website";
        }
    } else {
        $error = "Website already available";
    }
}

if ($_REQUEST['deleteContent']) {
    $affected_rows = Website::delete($_REQUEST['deleteContent']);
    json_die($affected_rows ? true : false);
}
$websites = Website::get_all_websites($_SESSION['user']['id']);

$bc[] = array('text' => 'Websites');
$jsInclude = "websites.js.php";
_cg("page_title", "Websites");
?>
