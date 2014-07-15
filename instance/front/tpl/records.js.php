<script type="text/javascript">
    $(document).ready(function(){
 
    });
   
    
    function GetRecord(id){
        _a({
            data:{editContent:id},
            url:'<?php print _U ?>records',
            handler:function(r){ 
                console.log(r.data);
                if(r.data == 0){
                    $("#testmonials_id").val('none');
                } else {
                    $("#testmonials_id").val(r.data.id); 
                    $("#web_rec").val(r.data.allow_no);             
                }
            }
        });
    }
</script>