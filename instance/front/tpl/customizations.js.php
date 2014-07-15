<script type="text/javascript">
    $(document).ready(function(){    
        
        //        $('#file_upload').uploadify({
        //            'fileTypeDesc' : 'Background Image',
        //            'fileTypeExts' : '*.img; *.jpg; *.jpeg; *.gif', 
        //            'multi':false,
        //            'buttonText': 'Background Image',
        //            'removeCompleted' : false,
        //            'fileSizeLimit' : '100MB',
        //            'swf'      : '<?php print _MEDIA_URL ?>misc/uploadify.swf',
        //            'uploader' : '<?php print _U ?>handleUpload', 
        //            'formData' : { '<?php echo session_name(); ?>' : '<?php echo session_id(); ?>' },
        //            'onUploadSuccess' : function(file,data,response) {
        //                $('#submit_offer').css('backgroundImage', 'url(' + $.trim(data) + ')');    
        //                $("#btn_store_img").attr("src",data);
        //            }    
        //        });
        
        
        $("#btn_width").keyup(function() {
            var btn_width = $("#btn_width").val();
            $('#submit_offer').css('width', btn_width+'px');
        });
        
        $("#btn_height").keyup(function() {
            var btn_height = $("#btn_height").val();
            $('#submit_offer').css('height', btn_height+'px');
        });
        
        $("#btn_radius").keyup(function() {
            var btn_radius = $("#btn_radius").val();
            $('#submit_offer').css('border-radius', btn_radius+'px !important'); 
      });
        
        $('#btn_color').ColorPicker({
            color: '#0000ff',
            onChange: function (hsb, hex, rgb) {
                $('#submit_offer').css('backgroundColor', '#' + hex);
                $('#btn_color').val('#' + hex);
            }
        });
        
        $('#font_color').ColorPicker({
            color: '#0000ff',
            onChange: function (hsb, hex, rgb) {
                $('#submit_offer').css('color', '#' + hex);
                $('#font_color').val('#' + hex);
            }
        }); 
        $("#btn_text").keyup(function(){
            if($("#btn_text").val() == ''){
                $('#submit_offer').val("Submit Your Offer Now");
                //$("#btn_text").val("Submit Your Offer Now");
            } else {
                $('#submit_offer').val($("#btn_text").val());                
            } 
        });


        $(".custPanelForm .btn").not(".btnExclude").click(function(){
            $(this).prev().find("input[type=radio]")[0].click()
        });
        
        $("#btn_radius").keyup(function(){
            var radius = this.value+"px";
            $("#submit_offer").css({
                "border-radius": radius,
                "-moz-border-radius": radius,
                "-webkit-border-radius": radius
            });
                
        });
        $("#btn_border").keyup(function(){
            var border = $.trim(this.value);
            $("#submit_offer").css({
                "border": border
            });
                
        });
        
        $("#customPresetSave").click(function(){
            if($(".custPanelForm input[type=radio]:checked").length == 0){
                $(".radio span").addClass('ier');
                _nf('Please select atleast one preset button');
                setTimeout(function(){
                    $(".radio span").removeClass('ier');    
                },5000)
                return;
            }
            
            var selectedPreset = $(".custPanelForm input[type=radio]:checked").val();
            
            _a({
                url:'<?php print _U?>customizations',
                data:{presetButton:selectedPreset},
                handler:function(rc){
                    _ns("Preset saved successfully.. Redirecting to next step..");
                    setTimeout(function(){
                        location.href='get_code?firstTime=1'
                    },2500)
                    
                }
            })
        });

    });
</script>
<?php include _PATH . "lib/colorpicker.js.php"; ?>