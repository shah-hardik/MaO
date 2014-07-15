<?php
if (!$_SESSION['user']['c_id']) {
    return;
}
$customer_id = mysql_real_escape_string($_SESSION['user']['c_id']);
$status = qs("select c_store_on from customers where c_id = '{$customer_id}' ");
$status = $status['c_store_on'];
?>

<?php if (!$status): ?>
    <div class="storeOff">
        MaO Widget on your store is turned off. <a href="<?php print _U ?>onoff" style="text-decoration: underline">Click here</a> to turn it on.
    </div>
<?php endif; ?>