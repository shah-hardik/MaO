<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){

            $('.progress .bar').each(function() {
                var me = $(this);
                var perc = me.attr("data-percentage");

                //TODO: left and right text handling

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
    
    function GetEnableval(id,catgory_id){
        var res_enable = $('#enable_'+id).is(':checked')? 1 : 0;
        _a({
            data:{iphoneToggle:1,checked:res_enable,id:id,catgory_id:catgory_id},
            url:'<?php print _U ?>category',
            handler:function(r){
                console.log(r);
            }
        });
    }
    
    function SetMinPrice(id,catgory_id){
        var offer_per = $("#category_per_"+id).val();
        _a({
            data:{offerper:1,offer_per:offer_per,id:id,catgory_id:catgory_id},
            url:'<?php print _U ?>category',
            handler:function(r){
                console.log(r);
            }
        });
    }
    
    function DeleteCategory(id){
        $("#myModal").modal("show");
        genericFun = function(){
            _a({
                data:{deleteCategory:id},
                url:'<?php print _U ?>category',
                handler:function(r){
                    $("#myModal").modal("hide");
                    if(r.status){
                        _ns("Category Deleted Successfully."); 
                        $("#category_"+id).remove();
                    }else{
                        _nf("Error Occured");
                    }
                }
            });
        }
    }
</script>