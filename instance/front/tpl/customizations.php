<?php $active_step4 = "box_inner_active"; ?>
<?php include "steps.php";  ?>

<div class="row-fluid">
    <div class="span12">
        
        <div class="box" style=''>
            <div class="box-title">
                <ul class="nav nav-tabs pull-left">
                    <li class="active">
                        <a href="#t2" data-toggle="tab"><i class="icon-cogs"></i>Customization</a>
                    </li>
                   
                </ul>
            </div>
            <div class="box-content">
                <div class="tab-content">
                   

                    <div class="tab-pane active" id="t2">

                        <div class="box-content">
                            <div class="box-content" style="padding:0px">
                                <?php include 'messages.php'; ?>
                                <div class="span12" style="border-right: 0px solid #CCC;">
                                    <form class="form-horizontal" name="frmPageManagement" action="" method="post">
                                        <fieldset>

                                            <legend>Set custom options:</legend>

                                            <div class="control-group pull-left" >
                                                <label class="control-label" for="btn_color">Background Color</label>
                                                <div class="controls">
                                                    <input class="input-small" name="fields[btn_color]" id="btn_color" type="text" value="<?php print $btn_color; ?>" required />
                                                </div>
                                            </div>
                                            <div class="control-group pull-left" >
                                                <label class="control-label" for="font_color">Font Color</label>
                                                <div class="controls">
                                                    <input class="input-small" name="fields[font_color]" id="font_color" type="text" value="<?php print $font_color; ?>"  required />
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr/>
                                            <div class="control-group pull-left" >
                                                <label class="control-label" for="btn_color">Width</label>
                                                <div class="controls">
                                                    <input class="input-small" name="fields[btn_width]" id="btn_width" type="text" value="<?php print $btn_width; ?>" required />
                                                </div>
                                            </div>
                                            <div class="control-group pull-left" >
                                                <label class="control-label" for="font_color">Height</label>
                                                <div class="controls">
                                                    <input class="input-small" name="fields[btn_height]" id="btn_height" type="text" value="<?php print $btn_height; ?>"  required />
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            <hr /> 
                                            <div class="control-group">
                                                <label for="textfield" class="control-label">Border</label>

                                                <div class="controls">

                                                    <input class="input-xlarge"  name="fields[btn_border]" id="btn_border" type="text" value="<?php print $btn_border; ?>"  placeholder="1px solid white" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="textfield" class="control-label">Corner radius</label>

                                                <div class="controls">
                                                    <input class="input-xlarge"  name="fields[btn_radius]" id="btn_radius" type="text" value="<?php print $btn_radius; ?>" size="2" required maxlength="2"/>
                                                </div>
                                            </div>

                                            <div class="control-group" id="password_div">
                                                <label class="control-label" for="btn_text">Text</label>
                                                <div class="controls">
                                                    <input class="input-xlarge" name="fields[btn_text]" id="btn_text" type="text" value="<?php print $btn_text; ?>" required maxlength="50"/>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="form-actions" style="background-color:none;">
                                                <input type="hidden" name="fields[c_id]" id="c_id" value="<?php echo $_SESSION['user']['c_id']; ?>" />
                                                <button type="submit" class="btn btn-primary" id="submitPage">Save changes</button>
                                                <button  type="reset" class="btn">Cancel</button>
                                            </div>

                                        </fieldset>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
