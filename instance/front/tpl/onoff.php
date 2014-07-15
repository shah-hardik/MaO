<div class="row-fluid">
    <div class="span12">
        <div class="box"></div>
    </div>
    <div class="box-content">  
        <div class="alert alert-error">
            <strong>Warning!</strong> &nbsp;&nbsp; This will turn-off the widget from your store completely. 
            <br /><br />
            At any time you can enable back.
        </div>
        <div style="margin-top:20px">
            <div style="margin-right:10px;float:left">Turn <span id="on_off_status"><?php ($status == 0) ? print "On"  : print "Off"; ?></span> MaO Widget from my store:</div>
<!--            <div style="float:left"><input <?php print $status ? "checked" : ""; ?> data-no-uniform="true" type="checkbox" class="iphone-toggle" data-func="storeOff" data-id="1"></div>-->
            <div style="float:left;margin-top: -5px;">
                <?php if ($status == 0): ?>
                    <?php
                    $turn_on_style = "display:block;";
                    $turn_off_style = "display:none;";
                    ?>
                <?php elseif ($status == 1): ?>
                    <?php
                    $turn_on_style = "display:none;";
                    $turn_off_style = "display:block;";
                    ?>
                <?php endif; ?>
                <button class="btn btn-primary" id="turn_on_btn" type="button" style="<?php print $turn_on_style; ?>">Turn On</button>
                <button class="btn btn-warning" id="turn_off_btn" style="<?php print $turn_off_style; ?>color: #FFF;" type="button">Turn Off</button>
            </div>
        </div>


    </div>
</div>