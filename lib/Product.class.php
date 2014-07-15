<?php

/**
 * Record Product
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since June 24, 2013
 * 
 */
class Product {
    # constructor

    public static $user_data = array();

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['cp_c_id'] = 'cp_c_id';
        $map['cp_p_id'] = 'cp_p_id';
        $map['cp_p_name'] = 'cp_p_name';
        $map['cp_price'] = 'cp_price';
        $map['cp_cost_price'] = 'cp_cost_price';
        $map['cp_retail_price'] = 'cp_retail_price';
        $map['cp_sale_price'] = 'cp_sale_price';
        $map['cp_calculated_price'] = 'cp_calculated_price';
        $map['cp_categoty_id'] = 'cp_categoty_id';
        $map['cp_actual_price'] = 'cp_actual_price';

        $ds = _bindArray($data, $map);

        return qi('customers_products', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['cp_c_id'] = 'cp_c_id';
        $map['cp_p_id'] = 'cp_p_id';
        $map['cp_p_name'] = 'cp_p_name';
        $map['cp_price'] = 'cp_price';
        $map['cp_cost_price'] = 'cp_cost_price';
        $map['cp_retail_price'] = 'cp_retail_price';
        $map['cp_sale_price'] = 'cp_sale_price';
        $map['cp_calculated_price'] = 'cp_calculated_price';
        $map['cp_categoty_id'] = 'cp_categoty_id';

        $ds = _bindArray($data, $map);
        $condition = " cp_id = " . $id;
        return qu('customers_products', $ds, $condition);
    }

    public static function update_status($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['cp_status'] = 'cp_status';

        $ds = _bindArray($data, $map);
        $condition = " cp_id = " . $id;
        return qu('customers_products', $ds, $condition);
    }

    public static function update_status_byCategory($fields, $category_id, $customer_id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['cp_status'] = 'cp_status';

        $ds = _bindArray($data, $map);
        $condition = " cp_c_id = '" . $customer_id . "' AND (cp_categoty_id = '" . $category_id . "' or cp_categoty_id LIKE '%," . $category_id . "' or cp_categoty_id LIKE '" . $category_id . ",%' or cp_categoty_id LIKE '%," . $category_id . ",%')";
        return qu('customers_products', $ds, $condition);
    }

    public static function update_offer_price_byCategory($fields, $category_id, $customer_id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['cp_actual_price'] = 'cp_actual_price';

        $ds = _bindArray($data, $map);
        $condition = " cp_c_id = '" . $customer_id . "' AND (cp_categoty_id = '" . $category_id . "' or cp_categoty_id LIKE '%," . $category_id . "' or cp_categoty_id LIKE '" . $category_id . ",%' or cp_categoty_id LIKE '%," . $category_id . ",%')";
        //return qu('customers_products', $ds, $condition);
        $time = _mysqlDate();

        q("update customers_products set   `cp_actual_price` = cp_calculated_price - (cp_calculated_price * ({$data['cp_actual_price']})/100 ) ,  `modified_at` = '{$time}'   where " . $condition);
    }

    public static function BasePrice_update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        //$map['cp_price_base'] = 'cp_price_base';
        $map['cp_actual_price'] = 'cp_actual_price';
        $ds = _bindArray($data, $map);
        $condition = " cp_id = " . $id;
        return qu('customers_products', $ds, $condition);
    }

    public static function CheckProduct($cust_id, $product_id) {
        $res = qs(sprintf("select * from customers_products where cp_c_id='%s' and cp_p_id ='%s'", $cust_id, $product_id));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function CustomerProduct($cust_id) {
        $res = q(sprintf("select * from customers_products where cp_c_id='%s' order by cp_categoty_id ASC ", $cust_id));
        //$res = q(sprintf("select * from customers_products where cp_c_id='%s' order by cp_categoty_id ASC LIMIT 0,500  ", $cust_id));
        //$res = q(sprintf("select * from customers_products where cp_c_id='%s' order by cp_categoty_id ASC  ", 72));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function UpdateAllStatus($status_val, $user_id) {
        // Escape array for sql hijacking prevention
        $fields['cp_status'] = $status_val;
        $data = _escapeArray($fields);

        $map = array();
        $map['cp_status'] = 'cp_status';

        $ds = _bindArray($data, $map);
        $condition = " cp_c_id = " . $user_id;
        return qu('customers_products', $ds, $condition);
    }

    public static function ResetAll() {
        if (isset($_SESSION['user']['c_id']) && $_SESSION['user']['c_id'] > 0) {
            $id = $_SESSION['user']['c_id'];
            qd("products_category", " pc_customer_id = '{$id}' ");
            return qd("customers_products", " cp_c_id = '{$id}' ");
        }
    }

    public static function deleteProductUsingCategory($category_id, $user_id) {
        return qd("customers_products", " `cp_categoty_id` = '{$category_id}' AND `cp_c_id` = '{$user_id}'");
    }

    public static function ProductUsingCategoryId($category_id, $user_id) {
        return q("SELECT * FROM customers_products 
                          WHERE (   cp_categoty_id = '" . $category_id . "'
                                 OR cp_categoty_id LIKE '" . $category_id . ",%' 
                                 OR cp_categoty_id LIKE '%," . $category_id . "' 
                                 OR cp_categoty_id LIKE '%," . $category_id . ",%'     
                                ) 
                                AND cp_c_id = '" . $user_id . "'"
        );
    }

    public static function UpdateProductCategoryList($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['cp_categoty_id'] = 'cp_categoty_id';

        $ds = _bindArray($data, $map);
        $condition = " cp_id = " . $id;
        return qu('customers_products', $ds, $condition);
    }

}

?>