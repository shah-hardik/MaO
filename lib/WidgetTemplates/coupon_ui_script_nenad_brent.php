<script type="text/javascript">

	

	function widgetClick(){
	   $("#mao_options").slideToggle('fast');
		var width=$("#mao_options").css('right');
		if (width=='-2px'){
			$("#mao_options").css('right', '153px');
		}
		else {
			$("#mao_options").css('right', '-2px');
		}
	}

    function doOffer(){
        $("#overlay,#offerSection").show('fast');
        $("._price").html($(".VariationProductPrice").html());
        $(".productName").html($("meta[property='og:title']").attr("content"));
	 $("#mao_container").css('right', '160px');
        $("#mao_container").css('border-radius', '15px');
    }
    function doCloseOffer(){
        $("#overlay,#offerSection").hide('fast');
	$("#mao_container").css('border-radius', '15px 0 0 15px');
    }
    var product_id;
    

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
        var offerprice=$("#offerTextBox").val();
        if(offerprice=="" ){
            alert("Your offer price can not be blank");
            return false;
        }
        $("#doWait").show();
        $(".offerRejected,.offerAccepted").hide();
        $.ajax({            
            contentType: "application/json",
            dataType: 'jsonp',
            url : '<?php print _OFFER_APP_URL ?>offer-price/getminprice.php',
            data: 'productid='+product_id+'&offerprice='+offerprice+'&customer_id='+cust_id+'&pathname='+location.pathname,
            success: function(data) {

                // Do your stuffs on
                var msg = data.msg;
                    
                $("#doWait").hide();
                if(msg == 'Your offer price not possible!!'){    
                    $(".offerAccepted").hide();
                    $(".offerRejected").show();
                    $(".offerGood").show();
                }
                else{
                    $("#doWait").hide();
                    $(".offerAccepted").show();
                    $(".offerRejected").hide();
                    $(".offerGood").hide();
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

