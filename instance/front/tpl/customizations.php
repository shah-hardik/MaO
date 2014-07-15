<?php $active_step4 = "box_inner_active"; ?>
<?php include "steps.php";  ?>

<div class="row-fluid">
    <div class="span12">
        
        <div class="box" style=''>
            <div class="box-title">
                <ul class="nav nav-tabs pull-left">
                    <li class="active">
                        <a class="" href="#t1" data-toggle="tab"><i class="icon-edit"></i> Already defined buttons</a>
                    </li>
                    <li>
                        <a href="#t2" data-toggle="tab"><i class="icon-cogs"></i>Customization</a>
                    </li>
                    <!--   <li>
                          <a href="#t3" data-toggle="tab">Third tab</a>
                      </li> -->
                </ul>
            </div>
            <div class="box-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="t1">
                        <div class="box-content">  
                            <form  method="POST" class='form-horizontal custPanelForm' >
                                <div class="span3">
                                    <p> <h4>Basic buttons</h4> </p>
                                    <?php foreach ($buttons_array as $each_button): ?>
                                        <p>
                                            <label class='radio'>
                                                <input type="radio" name="radio" value="<?php print $each_button ?>" <?php print $each_button == $selected_btn ? "checked" : ""; ?> >
                                            </label>   <button type="button" class="<?php print $each_button ?>"><?php print $btn_text; ?></button>
                                        </p>
                                    <?php endforeach; ?>
                                </div>
                                <div class="span3">
                                    <p><h4>Round Buttons</h4></p>
                                    <?php foreach ($buttons_array_round as $each_button): ?>
                                        <p>
                                            <label class='radio'>
                                                <input type="radio" name="radio" value="<?php print $each_button ?>" <?php print $each_button == $selected_btn ? "checked" : ""; ?> >
                                            </label>   <button type="button" class="<?php print $each_button ?>"><?php print $btn_text; ?></button>
                                        </p>
                                    <?php endforeach; ?>                                
                                </div>
                                <div class="span3">
                                    <p> <h4>Round Block Buttons</h4></p>
                                    <?php foreach ($buttons_array_round_block as $each_button): ?>
                                        <p>
                                            <label class='radio'>
                                                <input type="radio" name="radio" value="<?php print $each_button ?>" <?php print $each_button == $selected_btn ? "checked" : ""; ?> >
                                            </label>   <button type="button" class="<?php print $each_button ?>"><?php print $btn_text; ?></button>
                                        </p>
                                    <?php endforeach; ?> 
                                </div>
                                <div class="span3">
                                    <p> <h4>Big Round Block Buttons</h4></p>
                                    <?php foreach ($buttons_array_big as $each_button): ?>
                                        <p>
                                            <label class='radio'>
                                                <input type="radio" name="radio" value="<?php print $each_button ?>" <?php print $each_button == $selected_btn ? "checked" : ""; ?> >
                                            </label>   <button type="button" class="<?php print $each_button ?>"><?php print $btn_text; ?></button>
                                        </p>
                                    <?php endforeach; ?> 
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-actions">
                                    <button type="button" class="btn btn-primary btnExclude" id="customPresetSave" >Save changes</button>
                                    <button  type="reset" class="btn">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="t2">

                        <div class="box-content">
                            <div class="box-content" style="padding:0px">
                                <?php include 'messages.php'; ?>
                                <div class="span6" style="border-right: 1px solid #CCC;">
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
                                <div class="span6 center">
                                    <div class="heading_preview"><h4> <i class="icon-eye-open"></i> Button Preview</h4></div>
                                    <div style="margin-top: 30px;">
                                        <?php
                                        $style = '';
                                        if (trim($btn_color) != '') {
                                            $style.='background-color:' . $btn_color . ';';
                                        }
                                        if (trim($btn_store_img) != '') {
                                            $style.='background-image:url( ' . _U . 'instance/front/uploads/' . $btn_store_img . ');';
                                        }
                                        if (trim($font_color) != '') {
                                            $style.='color:' . $font_color . ';';
                                        }
                                        if (trim($btn_text) == '') {
                                            $btn_text = "Submit Your Offer Now";
                                        }
                                        if (trim($btn_radius) != '') {
                                            $style.='border-radius:' . $btn_radius . 'px ;';
                                        }
                                        if (trim($btn_width) != '') {
                                            $style.='width:' . $btn_width . 'px;';
                                        }
                                        if (trim($btn_height) != '') {
                                            $style.='height:' . $btn_height . 'px ;';
                                        }
                                        ?>
                                        <input class="skipBorder" type="button" name="submit_offer" id="submit_offer" value="<?php print $btn_text; ?>" style="padding: 5px 14px 6px;<?php print $style; ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
