<?php

/**
 * Customer class
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since July 26, 2013
 * 
 */
class Customer {

    public function __construct() {
        
    }

    public static function getDetails($id = 0){
        $id = mysql_real_escape_string($id);
        return qs("select * from customers where c_id = '{$id}'  ");
    }
    
    public static function getMinOfferPrice($id=0){
        $data = self::getDetails($id);
        return _e($data['c_min_offer_price'],10);
    }
    public static function add($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['c_id'] = 'c_id';
        $map['btn_color'] = 'background_color';
        $map['font_color'] = 'font_color';
        $map['btn_text'] = 'text';

        $ds = _bindArray($data, $map);
        if ($_SESSION['uploaded_file'] != '') {
            $ds['background_image'] = $_SESSION['uploaded_file'];
            $_SESSION['uploaded_file'] = '';
        }
        return qi('customization', $ds);
    }

    public static function update($fields, $id) {
        $data = _escapeArray($fields);
        $map = array();
        $map['min_price'] = 'c_min_offer_price';
        $ds = _bindArray($data, $map);
        $condition = " c_id = " . $id;
        return qu('customers', $ds, $condition);
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