<?php

/**
 * Signup Class
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since June 16, 2013
 * 
 */
class Signup {

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['name'] = 'c_name';
        $map['user_name'] = 'c_username';
        $map['user_email'] = 'c_email';
        $map['user_password_add'] = 'c_password';
        $map['first_name'] = 'c_first_name';
        $map['last_name'] = 'c_last_name';
		$map['level'] = "c_plan";
		$map['ip'] = "c_ip";
		$map['c_cost'] = "c_cost";
		$map['c_offer_limit'] = "c_offer_limit";

        $data['user_password_add'] = md5($data['user_password_add']);
        $ds = _bindArray($data, $map);
        return qi('customers', $ds);
    }

    public static function ApiUpdate($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['user_storeurl'] = 'c_store_url';
        $map['api_key'] = 'c_api_key';
        $map['username'] = 'c_api_username';

        $ds = _bindArray($data, $map);
        $condition = " c_id = " . $id;
        return qu('customers', $ds, $condition);
    }
    
    public static function AdminUpdate($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
      
        $map = array();
        if(isset($fields['c_admin_password']) && $fields['c_admin_password'] != ''){
            $map['c_admin_password'] = 'c_admin_password';
        }
        $map['c_admin_username'] = 'c_admin_username';

        $ds = _bindArray($data, $map);
        $condition = " c_id = " . $id;
        if(isset($ds['c_admin_password']) && $ds['c_admin_password'] != ''){
            $ds['c_admin_password'] = md5($ds['c_admin_password']);
        }
        return qu('customers', $ds, $condition);
    }
    

    public static function update_password($email, $password) {
        $password = md5($password);
        $ds['c_password'] = $password;
        $condition = " c_email = '" . $email . "'";
        return qu('customers', $ds, $condition);
    }

    public static function update_profile($c_id, $email, $password = '') {
        if ($password != '') {
            $password = md5($password);
            $ds['c_password'] = $password;
        }
        $ds['c_email'] = $email;
        $condition = " c_id = '" . $c_id . "'";
        return qu('customers', $ds, $condition);
    }

    public static function duplicate_email($email, $id = '') {
        if ($id != '') {
            $id_con = " AND c_id != " . $id;
        } else {
            $id_con = '';
        }

        $res = qs(sprintf("select * from customers where `c_email` = '%s'" . $id_con, $email));
        if (empty($res)) {
            return 0;
        } else {
            return $res['c_id'];
        }
    }

    public static function GetApiDetail($c_id) {
        $res = qs(sprintf("select * from customers where `c_id` = '%s'", $c_id));
        return $res;
    }

    public static function getEmail($c_id) {
        $res = qs(sprintf("select c_email from customers where c_id='%s'", $c_id));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function forgotpassword_Check_email($email) {
        $res = qs(sprintf("select * from customers where `c_email` = '%s'", $email));
        if (empty($res)) {
            return 0;
        } else {
            return $res['c_id'];
        }
    }
    
    public static function getName($email) {
        $res = qs(sprintf("select * from customers where `c_email` = '%s'", $email));
            return $res['c_name'];
    }

    public static function generate_password($length = 12, $special_chars = true) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if ($special_chars)
            $chars .= '!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < $length; $i++)
            $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        return $password;
    }

}

?>