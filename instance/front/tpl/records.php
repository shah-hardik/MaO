<style type="text/css">
    .form-horizontal .control-label {
        width: 170px;
        margin-right: 12px;
    }    
</style>

<div class="row-fluid ">
    <div class="box span12">
        <div class="box-header well" data-original-title >
            <h2><i class="icon-list-alt"></i> Configure TestiMoney App </h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" name="frmPageManagement" action="" method="post">
                <fieldset>

                    <?php include 'messages.php'; ?>
                    <!--                    <div class="control-group" >
                                            <label class="control-label" for="web_id">Website</label>
                                            <div class="controls">
                                                <select name="fields[web_id]" id="web_id" required onchange="return GetRecord(this.value)">
                                                    <option value="">Select Website</option>
                    <?php
                    if ($websites != 0) {
                        foreach ($websites as $each_website):
                            ?>
                                             <option value="<?php print $each_website['id']; ?>"><?php print $each_website['link']; ?></option>
                            <?php
                        endforeach;
                    }
                    ?>
                                                </select>
                                            </div>
                                        </div>-->
                    <div class="control-group" >
                        <label class="control-label" for="web_rec">No of testimonials</label>
                        <div class="controls">
                            <input  class="input-xlarge" name="fields[web_rec]" id="web_rec" type="text" value="<?php print $no_allow; ?>" required />
                        </div>
                    </div>
                    <div class="control-group" >
                        <label class="control-label" for="web_rec">Refresh Time of testimonials</label>
                        <div class="controls">
                            <input  class="input-xlarge" name="fields[web_refresh]" id="web_refresh" type="text" value="<?php print $refresh_time; ?>" required />   (Enter value in second)
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <input type="hidden" name="fields[testmonials_id]" id="testmonials_id" value="<?php print $testmonials_id; ?>"/>
                    <input type="hidden" name="fields[web_id]" id="web_id" value="<?php print $web_id; ?>"/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="submitPage">Save</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
