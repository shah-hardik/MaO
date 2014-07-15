<?php

/**
 * Record Customization
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since June 25, 2013
 * 
 */
class Customization {
    # constructor

    public static $user_data = array();

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['c_id'] = 'c_id';
        $map['btn_color'] = 'background_color';
        $map['font_color'] = 'font_color';
        $map['btn_text'] = 'text';
        $map['btn_radius'] = 'border_radius';
        $map['btn_width'] = 'btn_width';
        $map['btn_height'] = 'btn_height';
        $map['btn_border'] = 'btn_border';
        
        $ds = _bindArray($data, $map);
        $ds['set_presetbutton'] = 0;
        if ($_SESSION['uploaded_file'] != '') {
            $ds['background_image'] = $_SESSION['uploaded_file'];
            $_SESSION['uploaded_file'] = '';
        }
        return qi('customization', $ds);
    }
    
    public static function add_presetButton($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['c_id'] = 'c_id';
        $map['selected_btn'] = 'selected_btn';
        
        $ds = _bindArray($data, $map);
        $ds['set_presetbutton'] = 1;
        
        return qi('customization', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['c_id'] = 'c_id';
        $map['btn_color'] = 'background_color';
        $map['font_color'] = 'font_color';
        $map['btn_text'] = 'text';
        $map['btn_radius'] = 'border_radius';
        $map['btn_width'] = 'btn_width';
        $map['btn_height'] = 'btn_height';
        $map['btn_border'] = 'btn_border';
        $ds = _bindArray($data, $map);
        $ds['set_presetbutton'] = 0;
        if ($_SESSION['uploaded_file'] != '') {
            $ds['background_image'] = $_SESSION['uploaded_file'];
            $_SESSION['uploaded_file'] = '';
        }
        $condition = " id = " . $id;
        return qu('customization', $ds, $condition);
    }
    
    public static function update_presetButton($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['c_id'] = 'c_id';
        $map['selected_btn'] = 'selected_btn';
        $ds = _bindArray($data, $map);
        $ds['set_presetbutton'] = 1;
        $condition = " id = " . $id;
        return qu('customization', $ds, $condition);
    }
   
    
    
    public static function CustomizationDetail($cust_id) {
        $res = qs(sprintf("select * from customization where c_id='%s'", $cust_id));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    } 

}

?>