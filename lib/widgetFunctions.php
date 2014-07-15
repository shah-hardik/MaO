<?php

/**
 * File to render the MaO Button widget
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @since September 14,2013
 * 
 */

/**
 * 
 *  Function to render the HTML of the complete widget
 * 
 * @param String $customer_id ID of customer
 * @param String $btn_text Button text from db
 * @param String $style style associated with button ( for custom button )
 * @param String $presetClass preset-class
 * @return Array html of button
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @since September 14, 2013
 * 
 * 
 */
function getWidgetHTML($customer_id, $btn_text, $style, $presetClass = '') {
    $buttonHTML = $presetClass ? $defaultPresetButtonHTML : $styledButtonHTML;
    if ($presetClass) {
        $continueButton = renderPresetButton('cClick()', "Click Here To Checkout", $presetClass);
        $buttonHTML = renderPresetButton('OfferPriceSubmit();', $btn_text, $presetClass);
    } else {
        $continueButton = renderStyledButton('cClick()', "Click Here To Checkout", $style);
		switch($customer_id){
			case "68":
				$style = "color:white !important;background-color:#0099FF !important;width:151px !important; font-weight:bold;border:0px none";
			break;
			
		}
        $buttonHTML = renderStyledButton('OfferPriceSubmit();', $btn_text, $style);
    }

    $default = '<div class="maoContent" style="padding:17px;border:1px dashed #DDD"><div id="cong_inline"></div><div  id="inline-oform"> <form action="" method="post" id="ContactForm" class=""> <div style="margin-top:0px;font-family:verdana;margin-bottom:8px;">Buy this product at your own price. <br /> Just enter your price below and hit submit</div><div style=""><span style="font-weight:bold;font-size:18px;padding-right:10px;">$</span><input type="text" onblur="return change_blur(this.value);" onfocus="return change_focus(this.value);" value="Like The Product? Make Us An Offer" style="width:57%;height:24px;font-size:13px;;font-weight:bold;" name="contact_fullname" id="contact_fullname"> <br /> ' . $buttonHTML . ' <div style="display:none;" id="loader_img1"> Please Wait...</div> </div> </div><div style="display:none;" id="success_offer"><div style="display:none;" id="addtocart2"><input type="text" disabled="disabled" value="Congrats, Your Offer Accepted" style="width:57%;height:24px;font-size:13px;background-color:green;color:#FFF;font-weight:bold;" name="contact_fullname" id="contact_fullname"> ' . $continueButton . '</div><div><a style="margin-left:10px;" onclick="return ResetCoupon();" href="javascript:void(0);">Try Again</a></div></div><div id="customer_id_val" style="display:none;">' . $customer_id . '</div></div>';

//    $bgColor = "";
    switch ($customer_id) {
        case "58": // special case for mensring
            //$default = '<div style="position:relative;right:128px;width:351px;"><div style="height:10px" >&nbsp;</div><div class="maoContent" style="padding:17px;border:1px dashed #DDD"><div id="cong_inline"></div><div  id="inline-oform"> <form action="" method="post" id="ContactForm" class=""> <div style="margin-top:0px;font-family:verdana;margin-bottom:8px;">Buy this product at your own price. <br /> Just enter your price below and hit submit</div><div style=""><span style="font-weight:bold;font-size:18px;padding-right:10px;">$</span><input type="text" onblur="return change_blur(this.value);" onfocus="return change_focus(this.value);" value="Like The Product? Make Us An Offer" style="width:275px;height:24px;font-size:13px;;font-weight:bold;" name="contact_fullname" id="contact_fullname"> <br /> ' . $buttonHTML . ' <div style="display:none;" id="loader_img1"> Please Wait...</div> </div> </div><div style="display:none;" id="success_offer"><div style="display:none;" id="addtocart2"><input type="text" disabled="disabled" value="Congrats, Your Offer Accepted" style="width:275px;height:24px;font-size:13px;background-color:green;color:#FFF;font-weight:bold;" name="contact_fullname" id="contact_fullname"> ' . $continueButton . '</div><div style="display:none"><a style="margin-left:10px;" onclick="return ResetCoupon();" href="javascript:void(0);">Try Again</a></div></div><div id="customer_id_val" style="display:none;">' . $customer_id . '</div></div></div>';
            //$default .= '<link href="' . _OFFER_APP_CSS_PATH . '" rel="stylesheet" />';           
            //$default = file_get_contents(__DIR__ . "/WidgetTemplates/rightFixButtonWithPopup.php");

            $default = file_get_contents(__DIR__ . "/WidgetTemplates/nenad-brent-mockup.php");
            $default = str_replace("\n", "", $default);
            $default .= '<div id="customer_id_val" style="display:none;">' . $customer_id . '</div>';

            break;
        case "100":
		break;
        case "115":
		$default = '<div class="maoContent" style="padding:17px;border:1px dashed #DDD"><div id="cong_inline"></div><div  id="inline-oform"> <form action="" method="post" id="ContactForm" class=""> <div style="margin-top:0px;font-family:verdana;margin-bottom:8px;">Buy this product at your own price. <br /> Just enter your price below and hit submit</div><div style=""><span style="font-weight:bold;font-size:18px;padding-right:10px;">$</span><input type="text" onblur="return change_blur(this.value);" onfocus="return change_focus(this.value);" value="Like The Product? Make Us An Offer" style="width:57%;height:24px;font-size:13px;;font-weight:bold;" name="contact_fullname" id="contact_fullname"> <br /> ' . $buttonHTML . ' <div style="display:none;" id="loader_img1"> Please Wait...</div> </div> </div><div style="display:none;" id="success_offer"><div style="display:none;" id="addtocart2"><input type="text" disabled="disabled" value="Congrats, Your Offer Accepted" style="width:57%;height:24px;font-size:13px;background-color:green;color:#FFF;font-weight:bold;" name="contact_fullname" id="contact_fullname"> ' . $continueButton . '</div></div><div id="customer_id_val" style="display:none;">' . $customer_id . '</div></div>';
		break;
        case "100":
        
        //case "68":
        case "137":
			$default = '<div id="customer_id_val" style="display:none;">' . $customer_id . '</div>';
            $default .= '<link href="' . _OFFER_APP_CSS_PATH . '" rel="stylesheet" />';
            $default .= file_get_contents(__DIR__ . "/WidgetTemplates/jeff.php");
            $default = str_replace("\n", "", $default);
		break;
        case "99":
            $default = '<div id="customer_id_val" style="display:none;">' . $customer_id . '</div>';
            $default .= '<link href="' . _OFFER_APP_CSS_PATH . '" rel="stylesheet" />';
            $default .= file_get_contents(__DIR__ . "/WidgetTemplates/rightFixButtonWithPopup.php");
            $default = str_replace("\n", "", $default);
            break;
        default:
            $html = $default;
            $buttonHTML .= '<link href="' . _OFFER_APP_CSS_PATH . '" rel="stylesheet" />';
			
			switch($_REQUEST['cust_id']){
				case "117":
				$default .= '<link href="' . _OFFER_APP_URL . 'offer-price/mao_117.css" rel="stylesheet" />';
				break;
			}
			
			
    }
    $html = $default;
    $bgColor = "";

    return array("html" => $html, "bgColor" => $bgColor);
}

/**
 * 
 * @param String $onclick OnClick Handler
 * @param String $btn_text BTN Text
 * @param String $presetClass Preset class
 * @return string Rendered button html
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @since September 14, 2013
 * 
 * 
 */
function renderPresetButton($onclick, $btn_text, $presetClass) {
    return '<input type="button" style="border:0px none !important;margin-top:12px;" class=" ' . $presetClass . '"  onclick="' . $onclick . '"  value="' . $btn_text . '" />';
}

/**
 * 
 * @param String $onclick OnClick handler
 * @param String $btn_text BTN Text
 * @param String $style  Style Text
 * @return string
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @since September 14, 2013
 * 
 * 
 */
function renderStyledButton($onclick, $btn_text, $style) {
    return '<input  type="button" style="background:none !important;background-color:red !important; margin-top:12px;background-image:none !important;width:auto !important;' . $style . ';clear:both;" value="' . $btn_text . '" onclick="' . $onclick . '" class=" ContactButton btn primary"> ';
}
