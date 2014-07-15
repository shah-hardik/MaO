<?php
/**
 * Injection JS file.
 * 
 * Make this as light as possible
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp 
 * @since July 11, 2013
 * 
 */


include "init.php";
include "lib/Db.class.php";
include "lib/widgetFunctions.php";

$db = DB::__d();



$customer_id = mysql_real_escape_string($_REQUEST['cust_id']);
$product_id = mysql_real_escape_string($_REQUEST['pid']);


//echo "Customer id: ".$customer_id."<br>"." Product Id: ".$product_id;

if (!$customer_id) {
    die;
}


$query = "select c_store_on from customers where c_id = '{$customer_id}' AND c_store_on = '1' ";
$result = $db->query($query);
$total_rows = mysql_num_rows($result);
if (!$total_rows) {
    die("console.warn('CUSTOMER DISABLED THE WIDGET')");
}


$query = " select * from customers_products where cp_c_id = '{$customer_id}' and cp_p_id = '{$product_id}' AND cp_status = '1'  ";

$result = $db->query($query);

$total_rows = mysql_num_rows($result);
if (!$total_rows ) {
    die("console.warn('PRODUCT IS NOT ENABLED ')");
}

$Customization = $db->format_data($db->query(sprintf("select * from customization where c_id='%s'", $customer_id)));
$Customization = $Customization[0];

//print "<pre>";
//print_r($Customization);
//print "</pre>";


$btn_color = '';
$font_color = '';
$btn_store_img = '';
$btn_text = '';
$presetClass = '';



if ($Customization['set_presetbutton'] && !(empty($Customization))) {
    $presetClass = $Customization['selected_btn'];
} else if (!empty($Customization)) {
    $btn_color = $Customization['background_color'];
    $font_color = $Customization['font_color'];
    $btn_store_img = $Customization['background_image'];
    $btn_text = $Customization['text'];
}

$style = '';
if (trim($btn_color) != '') {
    $style.='background-color:' . $btn_color . ' !important;';
}
if (trim($btn_store_img) != '') {
    $style.='background-image:url( ' . _U . 'instance/front/uploads/' . $btn_store_img . ');';
}
if (trim($font_color) != '') {
    $style.='color:' . $font_color . ' !important;';
}
if (trim($btn_text) == '') {
    $btn_text = "Submit Your Offer Now";
}

$widgetOptions = getWidgetHTML($customer_id, $btn_text, $style, $presetClass);

ob_start();
?>

<script type="text/javascript">
    function ResetCoupon(){
        $("#success_offer").hide();
        $("#inline-oform").show();
    }    
    
    var product_id;
    

    function change_focus(val_2){
        if (val_2 == 'Like The Product? Make Us An Offer' || val_2 == 'Unable To Accept,Try It Again?') {
            $("#contact_fullname").val('');
            $("#contact_fullname").css({"background-color":"<?php print $widgetOptions['bgColor'] ?>","color":"#000"});
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
                    $("#contact_fullname").val('Unable To Accept,Try It Again?').blur();
                    $("#contact_fullname").css({"background-color":"red","color":"#FFF"}); 
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
                    $("#copytext1").css({"background-color":"yellow","color":"#000"});

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
<?php
$content = ob_get_contents();
ob_end_clean();
header('Content-Type: text/javascript');
print str_replace(array('<script type="text/javascript">', '</script>'), array('', ''), $content);
?>