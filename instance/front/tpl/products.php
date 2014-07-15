<?php $active_step3 = "box_inner_active"; ?>
<?php //include "steps.php";                ?>


<div class="row-fluid ">
    <?php include 'messages.php'; ?>
</div>
<!--
<div class="alert alert-info" id="next_msg" style="">
        <a href="<?php /* print _U */ ?>customizations">Please Click here to next step.</a>
    </div>
-->

<!--
<?php //$popover = ' rel="popover" data-trigger="hover" title="" data-content="Now that products have been imported, Go Next and Configure your Make an Offer button as per your stores theme " data-original-title="Next Step"'; ?>
<div class="span4 center">
    <a href="<?php print _U ?>customizations" class="btn-block btn btn-primary btn-large" <?php echo $popover; ?> >Please Click here to next step.</a>
</div>
-->


<?php if ($_SESSION['user']['c_id'] > 0) { ?>
    <div class="row-fluid ">
        <div class="span12">
            <div class="box box-color box-bordered box-products">
                <div class="box-title" data-original-title >
                    <h2><i class="icon-list-alt"></i> List of Products</h2>
                </div>
                <div class="box-content nopadding">
                    <fieldset>
                        <?php if (!empty($products)): ?>
                            <div style="text-align:right; margin-bottom: -37px;margin-top: 10px;margin-right: 290px;">
                                <button class="btn btn-primary" id="enable_all_product" type="button"><i class="icon-plus-sign"> </i>Enable All</button>
                                <button class="btn btn-warning" style="color: #FFF;" id="disable_all_product" type="button"><i class="icon-minus-sign"> </i>Disable All</button>
                            </div>
                            <?php
                            if ($pagging_on == 1):
                                include_once 'products_pagging.php';
                            else:
                                include_once 'products_without_pagging.php';
                            endif;
                            ?>
                        <?php else: ?>
                            <div>
                                <?php $error = "No product exists! Please go to API Detail/Setup or Import to get products in."; ?>
                                <?php include "messages.php"; ?>
                            </div>


                        <?php endif; ?> 
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
