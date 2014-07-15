<?php

/**
 * Admin side School List file
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
//die;
if ($_REQUEST['fields']['web_rec'] && $_REQUEST['fields']['testmonials_id'] > 0 && $_REQUEST['fields']['testmonials_id'] != 'none') {
    $_REQUEST['fields']['user_id'] = $_SESSION['user']['id'];
    $edit_school_id = Record::update($_REQUEST['fields'], $_REQUEST['fields']['testmonials_id']);
    if ($edit_school_id) {
        $greetings = "No of testimonials updated successfully";
    } else {
        $error = "Unable to update no of testimonials";
    }
}

if ($_REQUEST['editContent']) {
    $wid = $_REQUEST['editContent'];
    $uid = $_SESSION['user']['id'];
    $data = Record::CheckWebRecord($wid, $uid);
    json_die(true, $data);
}


if ($_REQUEST['fields']['web_rec'] && $_REQUEST['fields']['testmonials_id'] == 'none') {
    $_REQUEST['fields']['user_id'] = $_SESSION['user']['id'];
    $new_rec_id = Record::add($_REQUEST['fields']);
    if ($new_rec_id) {
        $greetings = "No of testimonials added successfully";
    } else {
        $error = "Unable to add no of testimonials";
    }
}

$no_allow = '';
$testmonials_id = 'none';
$refresh_time = 'none';
$web_id = _cg(w_id);
if (_cg(w_id) != '' && _cg(w_id) > 0) {
    $uid = $_SESSION['user']['id'];
    $chk = Record::CheckWebRecord(_cg(w_id), $uid);
    if ($chk == 0) {
        $no_allow = '';
        $testmonials_id = 'none';
        $refresh_time = '';
    } else {
        $no_allow = $chk['allow_no'];
        $testmonials_id = $chk['id'];
        $refresh_time = $chk['refresh_time'];
    }
}
$websites = Website::get_all_websites($_SESSION['user']['id']);

$bc[] = array('text' => 'Setting');
$jsInclude = "records.js.php";
_cg("page_title", "Setting");
?>
