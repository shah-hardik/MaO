<?php

/**
 * Admin User Class
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
class Adminuser {

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['user_name'] = 'full_name';
        $map['user_email'] = 'email';
        $map['user_password_add'] = 'password';

        $data['user_password_add'] = md5($data['user_password_add']);
        $ds = _bindArray($data, $map);
        return qi('users', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['user_name'] = 'full_name';
        $map['user_email'] = 'email';
        if ($data['user_password_edit'] != '') {
            $map['user_password_edit'] = 'password';
            $data['user_password_edit'] = md5($data['user_password_edit']);
        }
        $ds = _bindArray($data, $map);
        $condition = " id = " . $id;
        return qu('users', $ds, $condition);
    }

    public static function get_all_users($id='') {
        if ($id != '') {
            $where = " AND id = " . $id;
        } else {
            $where = "";
        }
        return q(" select * from users where 1=1 " . $where . " order by modified_at DESC ");
    }

    public static function get_all_userslist($id='') {
        if ($id != '') {
            $where = " AND id = " . $id;
        } else {
            $where = "";
        }
        return q(" select id,full_name from users where 1=1 " . $where . " order by full_name DESC ");
    }

    public static function delete($id) {
        $id = _escape($id);
        return qd("users", " id = '{$id}' ");
    }

    public static function get_user_detail($id) {
        return qs(sprintf("select * from users where id = '%f'", $id));
    }

    public static function duplicate_email($email, $id='') {
        if ($id != '') {
            $id_con = " AND id != " . $id;
        } else {
            $id_con = '';
        }

        $res = qs(sprintf("select * from  users where `email` = '%s'" . $id_con, $email));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

}

?>