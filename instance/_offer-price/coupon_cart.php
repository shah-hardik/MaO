<?php

/*
 *     Below is old code
 * 
 *     <script type="text/javascript">
        $(document).ready(function(){
        function _doLoad(){
            return;
            var cc = $.cookie("couponcode_value") || 0;
            if(cc != 0){
                $("#couponcode").val(cc);
                $.removeCookie('couponcode_value', { path: '/' });
                $("#couponcode").next().click()
            }
        }  
        
        if(typeof $.cookie == "undefined" ){
            $.getScript('http://www.makeanofferapp.com/jquery.cookie.js',function(){
            _doLoad();
        });
        }
        else{
            _doLoad();
        }
        });
  </script>
 */
include "../init.php";

ob_start();
?>
<script type="text/javascript">
    
    Cart.prepareMaO = function(){

        Cart.product_urls = [];
        Cart.quantity = [];
        $(".CartContents .ProductName h5 a").each(function(i,e){
            var url = $(e).attr("href");
            url = url.split("/");
            Cart.product_urls.push("/"+url[(url.length)-2]+"/");
        });
        $(".quantityInput").each(function(i,e){
            Cart.quantity.push($(e).val());
        });
    };

    Cart.applyMaO = function(){
        console.log("applying mao");
        if(location.search.indexOf("coupon_applied") == -1){
            Cart.prepareMaO();
            $.ajax({            
                contentType: "application/json",
                dataType: 'jsonp',
                url : '<?php print _OFFER_APP_URL ?>offer-price/storeOffer.php',
                data: {products:Cart.product_urls,quantity:Cart.quantity,customer_id:Cart.MaOCustomerId},
                success: function(data) {
                    if(data.success){
                        $("#couponcode").val(data.coupon_code);
                        $("#couponcode").next().click();
                    }
                }
            });
        }
    };
    Cart.MaOCustomerId = '<?php print $_REQUEST['customer_id'] ?>';
    
    $(document).ready(function(){
        Cart.applyMaO();
    });
    
    
</script>
<?php
$content = ob_get_contents();
ob_end_clean();
header('Content-Type: text/javascript');
print str_replace(array('<script type="text/javascript">', '</script>'), array('', ''), $content);
?>