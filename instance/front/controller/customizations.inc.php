<?php

/**
 * Admin side Customizations Details file
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since June 15, 2013
 * 
 */

if (isset($_REQUEST['presetButton'])) {
    $Check = Customization::CustomizationDetail($_SESSION['user']['c_id']);
    $_REQUEST['fields']['c_id'] = $_SESSION['user']['c_id'];
    $_REQUEST['fields']['selected_btn'] = trim($_REQUEST['presetButton']);
    if ($Check == 0) {
        $insert_id = Customization::add_presetButton($_REQUEST['fields']);
    } else {
        $_REQUEST['fields']['selected_btn'] = trim($_REQUEST['presetButton']);
        $update_id = Customization::update_presetButton($_REQUEST['fields'], $Check['id']);
    }
    sleep(2);
    json_die(true, array());
}


//Add and Update custom settings Button
if (isset($_REQUEST['fields']['c_id']) && $_REQUEST['fields']['c_id'] > 0) {
    $Check = Customization::CustomizationDetail($_SESSION['user']['c_id']);
    if ($Check == 0) {
        $insert_id = Customization::add($_REQUEST['fields']);
        if ($insert_id) {
            $greetings = "Customization added successfully";
        } else {
            $error = "Unable to insert data.";
        }
    } else {
        $update_id = Customization::update($_REQUEST['fields'], $Check['id']);
        if ($update_id) {
            $greetings = "Customization updated successfully";
        } else {
            $error = "Unable to update data.";
        }
    }
}

unset($_SESSION['uploaded_file']);

$Customization = Customization::CustomizationDetail($_SESSION['user']['c_id']);

if ($Customization != 0) {
    $btn_color = $Customization['background_color'];
    $font_color = $Customization['font_color'];
    $btn_store_img = $Customization['background_image'];
    $btn_text = $Customization['text'];
    $selected_btn = $Customization['selected_btn'];
    $set_presetbutton = $Customization['set_presetbutton'];
    $btn_width = $Customization['btn_width'];
    $btn_height = $Customization['btn_height'];
    $btn_radius = $Customization['border_radius'];
    $btn_border = $Customization['btn_border'];
} else {
    $btn_color = '';
    $font_color = '';
    $btn_store_img = '';
    $btn_text = '';
    $selected_btn = '';
    $set_presetbutton = 0;
    $btn_width = '140';
    $btn_height = '33';
    $btn_radius = '0';
    $btn_border = '';
}

$btn_text_fix = 'Make on offer';


$btn_text = trim($btn_text) == '' ? "Submit Your Offer Now" : $btn_text;

$bc[] = array('text' => 'Customizations');
$jsInclude = "customizations.js.php";
_cg("page_title", "Customizations");
?>
