<script type="text/javascript">
    $(document).ready(function(){
        $("#turn_on_btn").click(function(){
            _a({
                data:{iphoneToggle:1},
                url:'<?php print _U ?>onoff',
                handler:function(r){
                    if(r.data.onoff == '1'){
                        $("#on_off_status").html('Off');
                        $("#turn_on_btn").hide();
                        $("#turn_off_btn").show();  
                        $(".storeOff").hide();
                    }
                }
            });
        });
        $("#turn_off_btn").click(function(){
            _a({
                data:{iphoneToggle:1},
                url:'<?php print _U ?>onoff',
                handler:function(r){
                    if(r.data.onoff == '1'){
                        $("#on_off_status").html('On');
                        $("#turn_off_btn").hide();
                        $("#turn_on_btn").show();
                        $(".storeOff").show();
                    }
                }
            });
            
        });
    });
</script>