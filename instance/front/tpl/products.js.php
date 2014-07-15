<script type="text/javascript">
    $('#example').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php print _U ?>products_pagging"
    }); 
    $(document).ready(function(){
<?php if ($pagging_on == 1): ?>
                                        
            $('#example_paginate').css({'float':'right'});
            $('#example_previous').css({'margin-right': '10px','border':'1px solid #DADADA','padding':'4px','cursor':'pointer'});
            $('#example_next').css({'border':'1px solid #DADADA','padding':'4px 14px','cursor':'pointer'});
            $('#example_length').css({'float':'left'});
            $('#example_filter').css({'float':'right'});
            $('#example_processing').css({'margin-left': '100px','margin-top': '10px','display':'block','border':'1px solid #DADADA','padding':'4px','width':'100px','float':'left'});
                                        
                                       
                                                           
                                                                             
<?php endif; ?>
        
        $("#enable_all_product").click(function(){
            _a({
                data:{enable_disable:1,status:1},
                url:'<?php print _U ?>products',
                handler:function(r){
                    if(r.data.res == 'success'){
                        $(".enable_disable_chk").prop( "checked", true );
                    }
                }
            });
        });
        $("#disable_all_product").click(function(){
            _a({
                data:{enable_disable:1,status:0},
                url:'<?php print _U ?>products',
                handler:function(r){
                    if(r.data.res == 'success'){
                        $(".enable_disable_chk").prop( "checked", false );
                    }
                }
            });
        });
       
        setTimeout(function(){

            $('.progress .bar').each(function() {
                var me = $(this);
                var perc = me.attr("data-percentage");

                var current_perc = 0;

                var progress = setInterval(function() {
                    if (current_perc>=perc) {
                        clearInterval(progress);
                    } else {
                        current_perc +=1;
                        me.css('width', (current_perc)+'%');
                    }

                    me.text((current_perc)+'%');

                }, 10);

            });

        },30);
    });
    $(document).ready(function(){
               
    });
    
    
    
    function GetEnableval(id){
        var res_enable = $('#enable_'+id).is(':checked')? 1 : 0;
        _a({
            data:{iphoneToggle:1,checked:res_enable,id:id},
            url:'<?php print _U ?>products',
            handler:function(r){
                console.log(r);
            }
        });
    } 
   
    
    function doUpdateDomain(id,metaid){
        $("#edit_domain").show();
        _a({
            data:{editContent:id,meta_id:metaid},
            url:'<?php print _U ?>userDomains',
            handler:function(r){
                $("#submitPage").hide();
                $("#editPage").show();
                $(document).scrollTop(0);
                $("#record_meta").html(r.data.meta_name);
                $("#record_domain").html(r.data.domain_name);
                $("#record_value").val(r.data.record_val);
                $("#record_id").val(r.data.record_id);
            }
        });
    }
    
    function doInlineUpdate(id,val){ 
        //var value_text = $(val).data('arg1');
        //value_text = value_text.replace(/\\/g, '');
        $(".base_price_input").hide();
        $(".only_baseprice").show(); 
        var value_text = val;
        var value_name = 'value_nm_'+id;
        var value_id = 'value_id_'+id;
        var msg_id = 'msg_id_'+id;
        var msg_id_g = 'msg_id_g_'+id;
        var input_area = '<span style="display:none" class="only_baseprice" id="inner2_'+value_id+'">'+value_text+'</span><span class="base_price_input"><span class="txtbox_base" id="inner_'+value_id+'"><input type="text" style="text-align:right;" name="'+value_name+'" id="'+value_id+'" value="" onblur="return editRecord('+id+',this.value)"/></span><span id="'+msg_id+'" style="color:red;margin-left:10px;"></span><span id="'+msg_id_g+'" style="color:green;margin-left:10px;"></span></span>';
        $("#recod_grid_val_"+id).html(input_area);
        $("#value_id_"+id).val(value_text);
    }
    
    function editRecord(id,val){
        //alert(id+"***"+val);
        var msg_id = 'msg_id_'+id;
        var msg_id_g = 'msg_id_g_'+id;
        $('#'+msg_id).html('');
        $('#'+msg_id_g).html('');
        if(val == ''){
            $('#'+msg_id).html('Please Enter');
        } else {
            $('#inner2_value_id_'+id).html(val);
            _a({
                data:{InlineEdit:id,Value:val},
                url:'<?php print _U ?>products',
                handler:function(r){
                    if(r==1){
                        $('#'+msg_id).html('');
                        $('#'+msg_id_g).html('Base price updated successfully');
                    } else {
                        $('#'+msg_id_g).html('');
                        $('#'+msg_id).html('Unable to update base price');
                    }
                }
            });
        }
    }
    
    
</script>