<?php

/**
 * Record Category
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since July 19, 2013
 * 
 */
class Category {
    # constructor

    public static $user_data = array();

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention


        $data = _escapeArray($fields);
        $map = array();
        $map['pc_catgory_id'] = 'pc_catgory_id';
        $map['pc_customer_id'] = 'pc_customer_id';
        $map['pc_name'] = 'pc_name';
        $ds = _bindArray($data, $map);
        return qi('products_category', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['pc_catgory_id'] = 'pc_catgory_id';
        $map['pc_customer_id'] = 'pc_customer_id';
        $map['pc_name'] = 'pc_name';

        $ds = _bindArray($data, $map);
        $condition = " pc_id = " . $id;
        return qu('products_category', $ds, $condition);
    }

    public static function update_status($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['pc_status'] = 'pc_status';

        $ds = _bindArray($data, $map);
        $condition = " pc_id = " . $id;
        return qu('products_category', $ds, $condition);
    }

    public static function update_offer_price($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['pc_min_price_offer'] = 'pc_min_price_offer';

        $ds = _bindArray($data, $map);
        $condition = " pc_id = " . $id;
        return qu('products_category', $ds, $condition);
    }

    public static function CheckCatgory($cust_id, $category_id) {
        $res = qs(sprintf("select * from products_category where pc_customer_id='%s' and pc_catgory_id ='%s'", $cust_id, $category_id));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function CatgoryDetail($cust_id, $category_id) {
        $res = qs(sprintf("select * from products_category where pc_customer_id='%s' and pc_catgory_id ='%s'", $cust_id, $category_id));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function CustomerCatgory($cust_id) {
        $res = q(sprintf("select * from products_category where pc_customer_id='%s'", $cust_id));

        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function CustomerNotDeletedCatgory($cust_id) {
        $res = q(sprintf("select * from products_category where pc_customer_id='%s' AND pc_delete_status = 0", $cust_id));

        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function CountCustomerCategory($cust_id) {
        $res = qs(sprintf("SELECT count(pc_id) as total_category FROM products_category WHERE pc_customer_id='%s'", $cust_id));
        return $res['total_category'];
    }

    public static function update_delete_status($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['pc_delete_status'] = 'pc_delete_status';

        $ds = _bindArray($data, $map);
        $condition = " pc_id = " . $id;
        return qu('products_category', $ds, $condition);
    }

    public static function GetPrimaryDetail($p_k) {
        return qs("SELECT * FROM products_category WHERE pc_id = '" . $p_k . "'");
    }

}

?>