<script type="text/javascript">
    $(document).ready(function(){  
        
    });
    
    var count_product = -1;
    function ImportProduct(loader_id){
        if(loader_id == '1'){
            _wm();
        }
        
        $.ajax({
            type: "POST",
            //data:{ImportProuct:1, count:count_product},
            data: {ImportProuct:1,_count:count_product},
            url:'<?php print _U ?>import_product',
            dataType: "json",
            success: function (data) {                                
                if(loader_id == '1'){                    
                    _wc();
                }
                if(count_product == -1){
                    
                    $('#content_dbdata_1').append('<div style="color:green;background-color:#CCC;padding:2px;margin-bottom:5px;width:500px;">'+data.msg_category+'</div>');  
                    $('#content_dbdata_1').append('<div style="color:green;background-color:#CCC;padding:2px;margin-bottom:5px;width:500px;">'+data.msg+'</div>');                   
                } else {
                    $('#content_dbdata').prepend('<div style="color:green;background-color:#CCC;padding:2px;margin-bottom:5px;width:500px;">'+data.msg+'</div>');  
                }
                
                var progress_1 =  count_product + 1;
                var progress_2 =  (100/data.counter);
                var progress_3 =  parseInt(progress_1 * progress_2);
                $('#progress_bar').css({ 'width': progress_3+'%', 'background-color': 'green' });
                $('#progress_bar').html(progress_3+'%');
                if(data.counter == (count_product + 1)){
                    $(".sub_message").hide();
                    $("#next_msg").show('slow');
                    setTimeout(function(){
                        location.href = 'min_offer_price?firstTime=1';
                    },3000);
                }
                if(data.counter > count_product){
                    count_product = count_product + 1;
                    ImportProduct('2'); 
                }     
            },
//            error: function(XMLHttpRequest, textStatus, errorThrown) { 
//                
//                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
//                } 
        });
    } 
</script>