<script type="text/javascript">
    $(document).ready(function(){
    });
   
    
    function doUpdateWebsite(id){
        _a({
            data:{editContent:id},
            url:'<?php print _U ?>websites',
            handler:function(r){ 
                $("#submitPage").hide();
                $("#editPage").show();
                $(document).scrollTop(0);
                $("#website_name").val(r.data.link);
                $("#website_id").val(r.data.id);
            }
        });
    }
    
    
    
    function doDeleteWebsite(id){
        $("#myModal").modal("show");
        genericFun = function(){
            _a({
                data:{deleteContent:id},
                url:'<?php print _U ?>websites',
                handler:function(r){
                    $("#myModal").modal("hide");
                    if(r.status){
                        _ns("Website Deleted Successfully."); 
                        $("#website_"+id).remove();
                    }else{
                        _nf("Error Occured");
                    }
                }
            });
        }
    }
    
</script>