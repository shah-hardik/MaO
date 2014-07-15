<script type="text/javascript">
    function ResetCoupon(){
        $("#success_offer").hide();
        $("#inline-oform").show();
    }    
    function doOffer(){
        $("#overlay,#offerSection").show('slow');
    }
    function doCloseOffer(){
        $("#overlay,#offerSection").hide('slow');
    }
    var product_id;
    

    function change_focus(val_2){
        if (val_2 == 'Like The Product? Make Us An Offer' || val_2 == 'Unable To Accept,Try It Again?') {
            $("#contact_fullname").val('');
            $("#contact_fullname").css({"background-color":"<?php print $widgetOptions['bgColor'] ?>",color:'black'});
        }
    } 
   
    function change_blur(val_1){
        if (val_1 == '') {
            $("#contact_fullname").val('Like The Product? Make Us An Offer');
        } else {
     
        } 
     
    } 
    function cClick(){
        $("#productDetailsAddToCartForm")[0].submit(); 
    }
    
    function OfferPriceSubmit(){
        
        var cust_id = $("#customer_id_val").html();
        var product_id = $("#product_id").val();
        if(product_id > 0){
   
        } else {
            var product_id=$('input[name="product_id"]').val();
        }
        var offerprice=$("#contact_fullname").val();
        if(offerprice=="" || offerprice == "Like The Product? Make Us An Offer"){
            alert("Your offer price can not be blank");
            return false;
        }
        $("#loader_img1").show();
        $.ajax({            
            contentType: "application/json",
            dataType: 'jsonp',
            url : '<?php print _OFFER_APP_URL ?>offer-price/getminprice.php',
            data: 'productid='+product_id+'&offerprice='+offerprice+'&customer_id='+cust_id+'&pathname='+location.pathname,
            success: function(data) {

                // Do your stuffs on
                var msg = data.msg;
                    
                $("#loader_img1").hide();
                if(msg == 'Your offer price not possible!!'){    
                    $("#contact_fullname").val('Unable To Accept,Try It Again?');
                    $("#contact_fullname").css({"backgroundColor":"red","color":"#FFF"}); 
                }
                else{
                    var offerprice_1 = data.offerprice;                        
                    $("#success_offer").show();
                    $("#loader_img1").hide();
                    $("#inline-oform").hide();
                    $("#addtocart2").show();
                    $("#copytext1").show();
                    $("#cong_inline").html('<h2 class="colorGreen font44" style="display:none;">Congratulations</h2><p class="colorDarkGray font21" style="display:none;">YOUR OFFER $'+offerprice_1+' HAS BEEN ACCEPTED</p><P style="display:none" id="copmsg" class="colorDarkGray font15"><b>'+msg+'</b></P>');
                    //var cc = $.trim(msg)
                    //cc = cc.replace("Copy the Coupon Id : ","")
                    //$.cookie('couponcode_value', cc, { expires: 1, path: '/' });
                    $("#copytext1").css({"background-color":"yellow"});

                }
            }
        });
    }
    
    
    function _addToCart(){
    
    }
    
    function _doLoad(){
        $("#mao").html('<?php print $widgetOptions['html'] ?>');
        $("#qty_").parent().after($("#mao"));
    }
    
    $(document).ready(function(){
        if(typeof $.cookie == "undefined" && 0 ){
            $.getScript('<?php print _OFFER_APP_COOKIE_LIB ?>',function(){
                _doLoad();
            });
        }
        else{
            _doLoad();
        }
    });
    
</script>
