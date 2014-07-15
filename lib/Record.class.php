<?php

/**
 * Record Class
 * 
 * User select display number of testimonials.
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
class Record {
    # constructor

    public static $user_data = array();

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention

        $data = _escapeArray($fields);
        $map = array();
        $map['web_id'] = 'wid';
        $map['user_id'] = 'uid';
        $map['web_rec'] = 'allow_no';
        $map['web_refresh'] = 'refresh_time';

        $ds = _bindArray($data, $map);
        return qi('testimonials_no', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();
        $map['web_id'] = 'wid';
        $map['user_id'] = 'uid';
        $map['web_rec'] = 'allow_no';
        $map['web_refresh'] = 'refresh_time';

        $ds = _bindArray($data, $map);
        $condition = " id = " . $id;
        return qu('testimonials_no', $ds, $condition);
    }

    public static function CheckWebRecord($wid = '', $uid = '') {
        $res = qs(sprintf("select * from testimonials_no where wid='%s' and uid ='%s'", $wid, $uid));
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

}

?>