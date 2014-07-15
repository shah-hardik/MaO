<?php $active_step1 = "box_inner_active"; ?>
<?php //include "steps.php"; ?>

<div class="row-fluid">
    <div class="span12">
        <div id="box_responsive_one">
            <div class="box box-bordered">
                <div class="box-title">
                    <h3><i class="icon-link"></i> API Details</h3>
                </div>
                <div class="box-content nopadding">
                    <form class="form-horizontal form-bordered" method="POST" action="#">

                        <?php include 'messages.php'; ?>

                        <div class="control-group">
                            <label class="control-label" for="user_storeurl">Store URL</label>
                            <div class="controls">
                                <input onfocus="highlightTab(0)" class="span10" name="fields[user_storeurl]" id="user_storeurl" type="text" value="<?php print $c_store_url; ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="api_key">API Token</label>
                            <div class="controls">
                                <input onfocus="highlightTab(1)" class="span10" name="fields[api_key]" id="api_key" type="text" value="<?php print $c_api_key; ?>"  required />
                            </div>
                        </div>
                        <div class="control-group" id="password_div">
                            <label class="control-label" for="username">Username</label>
                            <div class="controls">
                                <input onfocus="highlightTab(2)" class="span10" name="fields[username]" id="username" type="text" value="<?php print $c_api_username; ?>" required/>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="hidden" name="fields[c_id]" id="c_id" value="<?php echo $_SESSION['user']['c_id']; ?>" />
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
                            <a href="#t1" data-toggle="tab" >Store URL</a>
                        </li>
                        <li>
                            <a href="#t2" data-toggle="tab">API Token</a>
                        </li>
                        <li>
                            <a href="#t3" data-toggle="tab">Username</a>
                        </li>
                    </ul>
                </div>
                <div class="box-content" data-height="300">
                    <div class="tab-content">
                        <div class="tab-pane active" id="t1">

                            <h4>How to get store URL ?</h4> 
                            <div style="margin-top:5px">Your store url appears into browsers URL Bar.</div>
                            <img src="<?php print _MEDIA_URL ?>img/store_url.png" />

                            <br /><br />
                            <h4>Having problems ?</h4>
                            <div style="margin-top:5px">Call us at <b>(877) 583-1187</b></div>
                        </div>
                        <div class="tab-pane" id="t2">
                            <h4>API Token</h4>
                            <div style="margin-top:5px">You need to enable the API access from Admin > Users </div><br /><br />
                            you can find API Token <br />
                            <img src="<?php print _MEDIA_URL ?>img/store_api_token.png" />
                        </div>
                        <div class="tab-pane" id="t3">
                            <h4>Username</h4>
                            <div style="margin-top:5px">Under Admin > Users > API keys section <br />
                                From there, you can find the username.</div><br /><br />
                            you can find API Token <br />
                            <img src="<?php print _MEDIA_URL ?>img/store_user_name.png" />
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
 * Below is code for javascript direct injection
 * that should be injected into cart page.

<script type="text/javascript">
    function _doLoadCart(){
        var cc = $.cookie("couponcode_value") || 0;
        if(cc != 0){
            $("#couponcode").val(cc);
            $.removeCookie('couponcode_value', { path: '/' });
            $("#couponcode").next().click()
        } 
    } 

    $(document).ready(function(){
        if(typeof $.cookie == "undefined" ){
            $.script('http://makeanofferapp.com/jquery.cookie.js',function(){
                _doLoadCart();
            });
        }
        else{
            _doLoadCart();
        }
    });
</script>
 * 
 */
?>