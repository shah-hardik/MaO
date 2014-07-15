<?php

function getWidgetHTML($customer_id, $btn_text, $style, $presetClass = '') {

    $defaultPresetButtonHTML = '<button class="' . $presetClass . '"  onclick="OfferPriceSubmit();"  ><i class="icon-tags"></i>'.$btn_text.'</button><link href="'._OFFER_APP_CSS_PATH.'" rel="stylesheet" />';
    $styledButtonHTML = '<input  type="button" style="background-image:none !important;' . $style . ';clear:both;width:auto !important;" value="' . $btn_text . '" onclick="OfferPriceSubmit();" class="ContactButton btn primary"> ';

    $buttonHTML = $presetClass ? $defaultPresetButtonHTML : $styledButtonHTML;
    $default = '<div id="cong_inline"></div><div style="width:404px;" id="inline-oform"> <form action="" method="post" id="ContactForm" class="PL20 popup_form"> <div style="margin-top:14px;">Simply enter in price below and submit</div><div style="">$<input type="hidden" name="page_id" id="page_id" value="43"><input type="text" onblur="return change_blur(this.value);" onfocus="return change_focus(this.value);" value="Like The Product? Make Us An Offer" style="float:left;width:260px;height:24px;font-size:13px;color:#000;font-weight:bold;" name="contact_fullname" id="contact_fullname"> '.$buttonHTML.' <span style="display:none;" id="loader_img1"> <img style="width:25px;height:25px;" src="/template/images/loader.gif">Please Wait...</span> </div></form> </div><div style="display:none;width:417px;" id="success_offer"><div style="display:none;width:417px;" id="addtocart2"><input type="text" disabled="disabled" value="Congrats, Your Offer Accepted" style="width:222px;height:24px;font-size:13px;background-color:green;color:#FFF;font-weight:bold;" name="contact_fullname" id="contact_fullname"> <input type="button" style="background-image:none !important;"' . $style . '";clear:both;margin-top:10px;width:auto !important;;" value="Click Here To Checkout" class="ContactButton btn primary" onclick="cClick()" id="copytext1"></div><div><a style="margin-left:10px;" onclick="return ResetCoupon();" href="javascript:void(0);">Try Again</a></div></div><div id="customer_id_val" style="display:none;">' . $customer_id . '</div>';

    $bgColor = "yellow";
    switch ($customer_id) {
        case "8": // special case for mensring
            $html = '<div id="cong_inline" ></div><div style="width:404px;text-align:left;margin:15px 0px;padding:15px;border:1px solid white;border-radius:12px;" id="inline-oform"> <form action="" method="post" id="ContactForm" class=""><div><h3>Like The Product? Make Us An Offer Now.</h3></div> <div style="color:#FDD017">Simply enter in price below and submit</div><div style="margin-top:10px;"><h3 style="float:left">$</h3><input type="hidden" name="page_id" id="page_id" value="43"><input type="text" onblur="return change_blur(this.value);" onfocus="return change_focus(this.value);" value="Like The Product? Make Us An Offer" style="float:left;margin-left:10px;width:260px;height:24px;font-size:13px;color:#000;font-weight:bold;" name="contact_fullname" id="contact_fullname"> <div style="margin-top:5px;clear:both">&nbsp;</div><input  type="button" style="background-image:none !important;' . $style . ';clear:both;width:auto !important;" value="' . $btn_text . '" onclick="OfferPriceSubmit();" class="ContactButton btn primary"> <span style="display:none;" id="loader_img1"> <img style="width:25px;height:25px;" src="/template/images/loader.gif">Please Wait...</span> </div></form> </div><div style="display:none;width:417px;" id="success_offer"><div style="display:none;width:417px;" id="addtocart2"><input type="text" disabled="disabled" value="Congrats, Your Offer Accepted" style="width:222px;height:24px;font-size:13px;font-weight:bold;" name="contact_fullname" id="contact_fullname"><div style="clear:both;margin-top:5px"></div> <input type="button" style="background-image:none !important;"' . $style . '";clear:both;;width:auto !important;;" value="Click Here To Checkout" class="ContactButton btn primary" onclick="cClick()" id="copytext1"></div><div><a style="margin-left:10px;" onclick="return ResetCoupon();" href="javascript:void(0);">Try Again</a></div></div><div id="customer_id_val" style="display:none;">' . $customer_id . '</div>';
            $bgColor = "white";
            $html = "";
            break;
        default:
            $html = $default;
    }

    return array("html" => $html, "bgColor" => $bgColor);
}

