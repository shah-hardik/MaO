<div class="row-fluid">
    <div class="span12">
        <div id="box_responsive_one">
            <div class="box box-bordered">
                <div class="box-title">
                    <h3><i class="icon-link"></i> Profile</h3>
                </div>
                <div class="box-content nopadding">
                    <form class="form-horizontal form-bordered" method="POST" action="">

                        <?php include 'messages.php'; ?>

                        <div class="control-group">
                            <label class="control-label" for="user_storeurl">Email</label>
                            <div class="controls">
                                <input class="span10" name="fields[user_email]" id="user_email" type="email" value="<?php print $c_email; ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="api_key">Password</label>
                            <div class="controls">
                                <input class="span10" name="fields[password]" id="password" type="password" value="" />
                            </div>
                        </div>
                        <div class="control-group" id="password_div">
                            <label class="control-label" for="username">Confirm Password</label>
                            <div class="controls">
                                <input class="span10" name="fields[confirm_password]" id="confirm_password" type="password" value="" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="hidden" name="fields[c_id]" id="c_id" value="<?php echo $_SESSION['user']['c_id']; ?>" />
                            <input type="hidden" name="profile_add" id="profile_add" value="1"/>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                            <button class="btn" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<!--</div>-->
