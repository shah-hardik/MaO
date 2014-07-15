<?php $active_step4 = "box_inner_active"; ?>
<?php //include "steps.php";     ?>

<?php include 'messages.php'; ?>
<div class="row-fluid">
    <div class="span12">
        <div id="box_responsive_one">
            <div class="box box-bordered">
                <div class="box-title">
                    <h3><i class="icon-link"></i>Embed code for product template - product.html</h3>
                </div>
                <div class="box-content" >

                    <code>
                        <?php
                        $url = _OFFER_APP_URL . "coupon_ui.php?cust_id={$_SESSION['user']['c_id']}";
                        print htmlspecialchars('<div id="mao"></div><script type="text/javascript">$(document).ready(function(){ console.log("Loading script");var product_id = $("#product_id").val() || $("input[name=product_id]").val(); $.getScript("' . $url . '&pid="+product_id, function(){ console.log("received response") });});</script>');
                        ?>
                    </code>

                </div>
            </div>

            <div class="box box-bordered">
                <div class="box-title">
                    <h3><i class="icon-link"></i>Embed code for cart template ( cart.html )</h3>
                </div>
                <div class="box-content" >

                    <code>
                        <?php
                        $url = _OFFER_APP_URL . "coupon_cart.php?cust_id={$_SESSION['user']['c_id']}";
                        print htmlspecialchars('<script type="text/javascript">$(document).ready(function(){$.getScript("' . $url . '", function(){ console.log("received response") });});</script>');
                        ?>
                    </code>

                </div>
            </div>


            <!--            <div id="box_responsive_one" style="padding-top:20px">
                            <button onclick="$('#autoDeployer').toggle('slow')" style="width:auto;float:left" class="btn-custom" name="btnLogin" type="submit">Use Auto Deployer</button>
                        </div>-->

            <div class="clear">&nbsp;</div>

            <div class="<?php if (!$_REQUEST['fields']['user_storeurl']): ?>none<?php endif; ?> " id="autoDeployer">
                <form class="form-horizontal form-bordered" method="POST" action="#">
                    <div class="box box-bordered">
                        <div class="box-title">
                            <h3><i class="icon-link"></i>Admin Detail</h3>
                        </div>
                        <div class="box-content nopadding" style="margin-top: 0px;">
                            <div style="padding:15px;">
                                <div class="" style="margin-bottom:15px;">
                                    <label class="control-label" style="float:left;width:130px;" for="user_storeurl">Store Url</label>
                                    <div class="controls" style="float:left;margin-left: 34px;">
                                        <input  style="" name="fields[user_storeurl]" id="user_storeurl" type="text" value="<?php print $c_store_url; ?>" required readonly="readonly"/>
                                    </div> 
                                    <div style="clear:both;"></div>
                                </div>
                                <div class="" style="margin-bottom:15px;">
                                    <label class="control-label" style="float:left;width:130px;" for="user_admin_username">Admin User Name</label>
                                    <div class="controls" style="float:left;margin-left: 34px;">
                                        <input  style="" name="fields[user_admin_username]" id="user_admin_username" type="text" value="<?php print $c_admin_username; ?>" required />
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                                <div class="Ychycaei2" >
                                    <label class="control-label" style="float:left;width:130px;" for="user_admin_password">Admin Password</label>
                                    <div class="controls" style="float:left;margin-left: 34px;">
                                        <input  style="" name="fields[user_admin_password]" id="user_admin_password" type="password"/> 
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                                <div class="form-actions">
                                    <input type="hidden" name="fields[c_id]" id="c_id" value="<?php echo $_SESSION['user']['c_id']; ?>" />
                                    <input type="hidden" name="fields[admin_detail]" id="admin_detail" value="1" />
                                    <button class="btn btn-primary" type="submit">Upload to my store</button>
                                    <button class="btn" type="button">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                            <a href="#t1" data-toggle="tab" >How to Embed the code</a>

                        </li>

                    </ul>
                </div>
                <div class="box-content" data-height="300">
                    <div class="tab-content">
                        <div class="tab-pane active" id="t1">

                            <h4>Step 1:</h4> 
                            <div style="margin-top:5px">
                                open your cart from design and put the above code there.
                            </div>


                            <br /><br />
                            <h4>Step  2:</h4>
                            <div style="margin-top:5px">
                                Login to your store and move over to Design > Template > Select your Product Template and add the above code to appropriate page
                            </div>
                            <br /><br />

                            <h4>Support:</h4>
                            <div style="margin-top:5px">Call us at <b>(877) 583-1187</b></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--</div>-->
<?php
/*
 * <script type="text/javascript">
  $(document).ready(function(){
  var cc = $.cookie("couponcode_value") || 0;
  if(cc != 0){
  $("#couponcode").val(cc);
  $.removeCookie('couponcode_value', { path: '/' });
  $("#couponcode").next().click()
  }
  });

  function _doLoad(){
  var cc = $.cookie("couponcode_value") || 0;
  if(cc != 0){
  $("#couponcode").val(cc);
  $.removeCookie('couponcode_value', { path: '/' });
  $("#couponcode").next().click()
  }
  }
  if(typeof $.cookie == "undefined" ){
  $.getScript('<?php print _OFFER_APP_COOKIE_LIB ?>',function(){
  _doLoad();
  });
  }
  else{
  _doLoad();
  }

  </script>
 */
?>

