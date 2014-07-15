



<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- content ends -->
    </div><!--/#content.span10-->

<?php } ?>
</div><!--/fluid-row--></div>


<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>

    <hr>

    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="alert-heading">Warning!</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-error ">
                <p>Are you sure you want to take this action ?</p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">No</a>
            <a href="#" class="btn btn-primary" onclick="genericFun()">Yes</a>
        </div>
    </div>

    <div class="modal hide fade" id="ResetAllCategoryProduct">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="alert-heading">Warning!</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-error ">
                <p>Are you sure you want remove all previous categories & Products ?</p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">No</a>
            <a href="#" class="btn btn-primary" onclick="genericFun()">Yes</a>
        </div>
    </div>

    <footer>

    </footer>
<?php } ?>

<button style="display:none" id="grt" data-noty-options='{"text":"<?php print $grt ?>","layout":"bottom","type":"success","closeButton":"true"}' class="btn btn-primary noty">

</button>

</div><!--/.fluid-container-->

<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
<script src="<?php print _MEDIA_URL ?>js/jquery-1.7.2.min.js"></script>
<!-- jQuery UI -->
<script src="<?php print _MEDIA_URL ?>js/jquery-ui-1.8.21.custom.min.js"></script>
<!-- transition / effect library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-transition.js"></script>
<!-- alert enhancer library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-alert.js"></script>
<!-- modal / dialog library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-modal.js"></script>
<!-- custom dropdown library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-dropdown.js"></script>
<!-- scrolspy library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-scrollspy.js"></script>
<!-- library for creating tabs -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-tooltip.js"></script>
<!-- popover effect library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-popover.js"></script>
<!-- file upload effect library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-fileupload.min.js"></script>
<!-- button enhancer library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-button.js"></script>
<!-- accordion library (optional, not used in demo) -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-collapse.js"></script>
<!-- carousel slideshow library (optional, not used in demo) -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-carousel.js"></script>
<!-- autocomplete library -->
<script src="<?php print _MEDIA_URL ?>js/bootstrap-typeahead.js"></script>

<!-- library for cookie management -->
<script src="<?php print _MEDIA_URL ?>js/jquery.cookie.js"></script>

<!-- data table plugin -->
<script src='<?php print _MEDIA_URL ?>js/jquery.dataTables.min.js'></script>





<!-- checkbox, radio, and file input styler -->
<script src="<?php print _MEDIA_URL ?>js/jquery.uniform.min.js"></script>

<!-- notification plugin -->
<script src="<?php print _MEDIA_URL ?>js/jquery.noty.js"></script>

<!-- for iOS style toggle switch -->
<script src="<?php print _MEDIA_URL ?>js/jquery.iphone.toggle.js"></script>

<script src="<?php print _MEDIA_URL ?>js/jquery.hoverText.js"></script>
<script src="<?php print _MEDIA_URL ?>js/jqBootstrapValidation.js"></script>
<?php include "scripts.php"; ?>
<?php
if (isset($jsInclude) && $jsInclude != '') {
    @include $jsInclude;
}
?>
<style type="text/css">
    .none{display:none;}
    .pointer{cursor:pointer}
    .border{border:1px solid #DADADA}
</style>
<?php if (isset($_SESSION['user']['id']) and $_SESSION['user']['id'] != '') { ?>
    <script type="text/javascript"> 
        var bodyHeight = $("body").height() + + parseInt(50);
        var screenHeight = $(window).height();
        //alert(screenHeight+"**"+bodyHeight);
        if(screenHeight >= bodyHeight){
            $('<div id="copy_right" style="position:absolute;margin-left:58px;bottom:10px;">© 2013 makeanofferapp. All rights reserved </div>').appendTo('#main_content2'); 
        } else {
            $('<div id="copy_right" style="float:left;margin-left:58px;margin-bottom:10px;">© 2013 makeanofferapp. All rights reserved </div>').appendTo('#main_content2');
        }  
                    
    </script>
<?php } ?>
<script type="text/javascript"> 
    function _U(){
        return "<?php print _U ?>";
    }
</script>    

<script id="IntercomSettingsScriptTag">
  window.intercomSettings = {
    // TODO: The current logged in user's full name
    name: "<?php echo $_SESSION['user']['c_name']; ?>",
    // TODO: The current logged in user's email address.
    email: "<?php echo $_SESSION['user']['c_email']; ?>",
    // TODO: The current logged in user's sign-up date as a Unix timestamp.
    created_at: <?php echo strtotime($_SESSION['user']['created_at']); ?>,
    app_id: "ut25ornl"
  };
</script>

</body>
</html>
