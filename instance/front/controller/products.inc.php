<?php

/**
 * Admin side Product List file
 * @since June 26, 2013
 * 
 */
$pagging_on = 1;

if (isset($_REQUEST['enable_disable']) && $_REQUEST['enable_disable'] != '') {
    if ($_SESSION['user']['c_id'] != '' && $_SESSION['user']['c_id'] > 0) {
        $res = Product::UpdateAllStatus(trim($_REQUEST['status']), $_SESSION['user']['c_id']);
        if ($res) {
            $data['res'] = 'success';
            json_die(true, $data);
        }
    }
}

if ($_REQUEST['editContent']) {
    $id = mysql_real_escape_string($_REQUEST['editContent']);
    $meta_id = mysql_real_escape_string($_REQUEST['meta_id']);
    if ($_SESSION['user']['user_type'] == 'general_user') {
        $data = Domain::user_domain($_SESSION['user']['id'], $meta_id, $id);
    } elseif ($_SESSION['user']['user_type'] == 'admin') {
        $domains = Domain::admin_domain_record($meta_id, $id);
    }

    json_die(true, $data);
}

if ($_REQUEST['iphoneToggle']) {
    $_REQUEST['fields']['cp_status'] = $_REQUEST['checked'];
    $edit_product_id = Product::update_status($_REQUEST['fields'], $_REQUEST['id']);
    $data['id'] = $_REQUEST['id'];
    json_die(true, $data);
}

if ($_REQUEST['InlineEdit']) {
    $_REQUEST['fields']['cp_actual_price'] = $_REQUEST['Value'];
    echo $edit_domain_id = Product::BasePrice_update($_REQUEST['fields'], $_REQUEST['InlineEdit']);
    exit;
}

$products = Product::CustomerProduct($_SESSION['user']['c_id']);
$bc[] = array('text' => 'Products');
$jsInclude = "products.js.php";
_cg("page_title", "Products");
?>
