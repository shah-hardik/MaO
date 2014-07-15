<script type="text/javascript">

	// send data to server
    function OfferPriceSubmit(){
        
        var cust_id = $("#customer_id_val").html();
        var product_id = $("#product_id").val();
        var email = $("#emailBox").val();
		var offerprice=$("#priceBox").val();
		
		// product_id is defined from the snippet
		product_id = product_id > 0 ? product_id : $('input[name="product_id"]').val(); 
        
        $("#sbtOfferBTN").html("PLEASE WAIT...");

        $.ajax({            
            contentType: "application/json",
            dataType: 'jsonp',
            url : '<?php print _OFFER_APP_URL ?>offer-price/jeffApprove.php',
            data: 'email='+email+'&productid='+product_id+'&offerprice='+offerprice+'&customer_id='+cust_id+'&pathname='+location.pathname+'&store_url='+location.href,
            success: function(data) {
				$("#newOfferThankCloud").show("slow");
				$("#newOfferCloud").hide();
				setTimeout(function(){
					$("#newOfferThankCloud").hide('slow');
				},'3000');
				$("#sbtOfferBTN").html("SUBMIT OFFER");
            },
			error:function(date){
				$("#sbtOfferBTN").html("SUBMIT OFFER");
			}
        });
    }
    
    
    // inject the widget
    function _doLoad(){
        $("#mao").html('<?php print $widgetOptions['html'] ?>');
        $("#qty_").parent().after($("#mao"));

    }
	

    
    $(document).ready(function(){
         _doLoad();
    });
	
	// onclick handler for "Request a deal"
	function showOffer(){
		$("#newOfferThankCloud").hide();
		$("#newOfferCloud").show("slow");
		var price = $(".VariationProductPrice").html()
		price = price.replace("$","")
		price = price.replace(",","")
		$("#priceBox").val(price);
	}
	
	// onclick handler for submit offer
	function doSubmitOffer(){
	
		if($("#priceBox").val() == ""){
			$("#priceBox").focus() .css("border","2px solid red");
			alert("Please provide offer value. Thank you");
			return;
		}
		
		if(parseInt($("#priceBox").val()) <= 0 ){
			$("#priceBox").focus() .css("border","2px solid red");
			alert("Please provide proper value. Thank you");
			return;
		}
		
		if($("#emailBox").val() == ""){
			$("#emailBox").focus() .css("border","2px solid red");
			alert("Please provide email. Thank you");
		}
		
		
		OfferPriceSubmit();
	}
    
</script>