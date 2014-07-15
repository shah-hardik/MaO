<script type="text/javascript">
    $(document).ready(function(){

             
    });
   
    
    function doUpdateUser(id){
        _a({
            data:{editContent:id},
            url:'<?php print _U ?>adminusers',
            handler:function(r){ 
                $("#submitPage").hide();
                $("#editPage").show();
                $(document).scrollTop(0);
                $('#user_password_add').removeAttr("required");
                $("#user_password_add").hide();  
                $("#user_password_edit").show();
                
                $("#user_name").val(r.data.full_name);
                $("#user_email").val(r.data.email);
                $("#user_id").val(r.data.id);
            }
        });
    }
    
    
    
    function doDeleteUser(id){
        $("#myModal").modal("show");
        genericFun = function(){
            _a({
                data:{deleteContent:id},
                url:'<?php print _U ?>adminusers',
                handler:function(r){
                    $("#myModal").modal("hide");
                    if(r.status){
                        _ns("User Deleted Successfully."); 
                        $("#user_"+id).remove();
                    }else{
                        _nf("Error Occured");
                    }
                }
            });
        }
    }
    
</script>