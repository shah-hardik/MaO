<?php $active_step3 = "box_inner_active"; ?>
<?php include "steps.php";?>

<div class="row-fluid">
    <div class="span12">
        <div id="box_responsive_one">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-link"></i> Minimum Offer Price </h3>
            </div>
            <div class="box-content nopadding">
                <form class="form-horizontal form-bordered" method="POST" action="#">

                    <?php include 'messages.php'; ?>

                    <div class="control-group">
                        <label class="control-label" for="user_storeurl">Base Price</label>
                        <div class="controls">
                            <input class="span10" name="fields[min_price]" id="user_storeurl" type="text" value="<?php print Customer::getMinOfferPrice($_SESSION['user']['c_id']);; ?>" required />
                            <span style="font-size:small;font-style: italic">In percentage to sell price</span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="hidden" name="fields[c_id]" id="c_id" value="<?php echo $_SESSION['user']['c_id']; ?>" />
                        <input type="hidden" name="firstTime" value="<?php print _e($_REQUEST['firstTime'],0)?>" />
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <button class="btn" type="button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

        <div id="box_responsive_two">
            <div class="box box-bordered">
                <div class="box-title">
                    <h3>
                        <i class="icon-info"></i>
                        Info
                    </h3>
                    <ul class="tabs">
                        <li class="active">
                            <a href="#t1" data-toggle="tab">Minimum Offer Price</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="box-content" data-height="300">
                    <div class="tab-content">
                        <div class="tab-pane active" id="t1">
                            <h4>What is Minimum Offer Price ?</h4>
                            <br />
                            Lets say, you have product of 300.00 USD. You can set a base price like 250.00 USD. Offers lower to 250.00 USD
                            will be rejected
                            
                            <br /><br />
                            
                            you can choose the minimum price for all the products in percentage. i.e. 10% lower to sale price.
                            
                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
