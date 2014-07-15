
<div class="row-fluid">
    <div class="span12">
        <div id="box_responsive_one">
            <div class="box box-bordered">
                <div class="box-title">
                    <h3><i class="icon-link"></i> Payment Details</h3>
                </div>
                <div class="box-content nopadding">
                    <form class="form-horizontal form-bordered" method="POST" action="#">

                        <?php include 'messages.php'; ?>

                        <div class="control-group">
                            <label class="control-label" for="user_storeurl">CC Info</label>
                            <div class="controls">
                                <input onfocus="highlightTab(0)" class="span10" name="CC" id="user_storeurl" type="text" value="" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="api_key">Name</label>
                            <div class="controls">
                                <input onfocus="highlightTab(1)" class="span10" name="Name" id="api_key" type="text" value=""  required />
                            </div>
                        </div>
                        <div class="control-group" id="password_div">
                            <label class="control-label" for="username">Expiry Date</label>
                            <div class="controls">
                                <input onfocus="highlightTab(2)" class="span10" name="Exp date" id="username" type="text" value="" required/>
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
    </div>
</div>
