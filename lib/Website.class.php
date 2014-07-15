<?php

/**
 * Website Class
 * 
 * Website Link.
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
class Website {
    # constructor

    public static $user_data = array();

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['website_name'] = 'link';
        $map['uid'] = 'uid';
        $ds = _bindArray($data, $map);

        return qi('website', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();

        $map['website_name'] = 'link';
        //$map['uid'] = 'uid';

        $condition = " id = " . $id;
        $ds = _bindArray($data, $map);
        return qu('website', $ds, $condition);
    }

    public static function delete($id) {
        $id = _escape($id);
        return qd("website", " id = '{$id}' ");
    }

    public static function get_all_websites($uid = '') {
        $where = '';
        if ($uid != '' and $uid > 0) {
            $where = ' AND uid = ' . $uid;
        }
        $res = q(sprintf("select * from website where 1=1 " . $where));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public static function get_website_detail($id) {
        return qs(sprintf("select * from website where id = '%f'", $id));
    }

    public static function duplicate_website($website, $uid, $id = '') {
        if ($id != '') {
            $id_con = " AND id != " . $id;
        } else {
            $id_con = '';
        }

        if ($uid > 0) {
            $uid_con = " AND uid = " . $uid;
        } else {
            $uid_con = '';
        }
        $res = qs(sprintf("select * from  website where `link` = '%s'" . $id_con . $uid_con, $website));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

}

?>