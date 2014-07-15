<?php include('header.php'); ?>

<script type="text/javascript">
    var _leftNav = 'mainNavParent';;
</script>

<?php if (!isset($no_visible_elements) || !$no_visible_elements) : ?>
    <?php include "breadcrumb.php"; ?>
<?php endif; ?>
<!--/row-->
<?php
if (!(@include $modulePage)) {
    include "404.php";
}
?>

<?php include('footer.php'); ?>