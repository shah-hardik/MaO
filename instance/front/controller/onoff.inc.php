<?php

$customer_id = mysql_real_escape_string($_SESSION['user']['c_id']);

if ($_REQUEST['iphoneToggle']) {
    $status = mysql_real_escape_string($_REQUEST['checked']);
    q("update customers set c_store_on = if(c_store_on='0','1','0') where c_id = '{$customer_id}' ");

    $data['id'] = $_REQUEST['id'];
    $data['onoff'] = 1;
    json_die(true, $data);
    die;
}

$status = qs("select c_store_on from customers where c_id = '{$customer_id}' ");
$status = $status['c_store_on'];

$bc[] = array('text' => 'Turn Off MaO Widget');
$jsInclude = "onoff.js.php";
_cg("page_title", "Turn Off MaO Widget");
?>
