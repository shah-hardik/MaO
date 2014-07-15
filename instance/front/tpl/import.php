<?php $active_step2 = "box_inner_active"; ?>
<?php //include "steps.php";                      ?>

<div class="row-fluid ">
    <div class="box span12">
        <div class="box-header well" data-original-title >
            <h2><i class="icon-list-alt"></i> Import Product </h2>

        </div>

        <div class="sub_message">
            <form class="form-horizontal" name="frmPageManagement" action="" method="post">
                <fieldset>
                    <?php include 'messages.php'; ?>

                    <?php if ($_REQUEST['autoStart']): ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> &nbsp;&nbsp;
                            API details are added successfully. Now, you can import the products from your store. <br /><br />
                            Please click on <b>"Start Import"</b> to import the products. 
                        </div>
                    <?php endif; ?>

                    <br /> <br />

                    <input type="hidden" name="fields[c_id]" id="c_id" value="<?php echo $_SESSION['user']['c_id']; ?>" />
                    <?php
                    $load_category_list = 0;
                    if ($customer_category_count > 0) {
                        $load_category_list = 1;
                    }
                    ?>
                    <?php if ($load_category_list == 0): ?>
                        <button type="button" class="btn btn-primary" id="submitPage" onclick="return ImportCategory('1');">Load categories</button> 
                    <?php endif; ?>
                </fieldset>
            </form>
        </div>
    </div>
    <div style="clear: both;"></div>
    <?php if ($load_category_list == 1): ?>  
        <div style="float: right;">
            <button style="color:#FFF;" id="reset_all" class="btn btn-warning" onclick="return ResetAll();" type="button">Reset All Category & Products</button>
        </div>
        <div style="clear: both;"></div>
    <?php endif; ?>
    <div class="alert alert-info sub_message" id="next_msg" style="display:none;">
        <div>
            Product Imported Successfully. Redirecting to list of imported products.....
        </div>
<!--        <a href="<?php print _U ?>products">Please Click here to next step.</a>-->
    </div>
    <form id="category_list_form">
        <?php if ($load_category_list == 1): ?>  
            <p>Category list:</p>
            <?php foreach ($category_list as $each_category): ?>
                <label style="display: block; cursor: pointer;"><input type="checkbox" style="margin: 10px;" name="cat_list[<?php print $each_category['pc_catgory_id']; ?>]"><?php print $each_category['pc_name']; ?></input></label>
            <?php endforeach; ?>
            <button type="button" class="btn btn-primary" id="submitPage2" onclick="return ImportProduct(1);">Start Import Products</button>
        <?php endif; ?> 
        <div id="category_list">

        </div>
    </form>


    <br /><br />

    <div style="width:100%;border: 1px solid #000;height:18px;text-align:center;margin-bottom: 15px;display:none;">
        <div id="progress_bar" style="width: 0%;height:100%;color:#FFF;font-weight:bold;">0%</div>
    </div>
    <div class="center" id="progress_bar_container" style="display:none">
        <br />
        <h6 style="padding:4px 10px; float:left">Importing Products</h6>
        <div class="progress progress-striped active">
            <div class="bar" style="width: 0%;" data-percentage="100" id="progress_bar"></div>
        </div>
    </div>

    <div style="clear:both;"></div>
    <div id="content_dbdata_categoryChose"></div>

    <div id="content_dbdata_1"></div>
    <div id="content_dbdata"></div>
</div>