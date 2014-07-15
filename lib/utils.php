<?php

/**
 * General Functions
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */

/**
 * Function to check whether variable is set or not.
 * @param String $var
 * @return Boolean
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
function _set($var) {
    return isset($var) && $var ? true : false;
}

/**
 * Checks if variable is set or not. if
 * variable is not set, it will reutnr second arc
 * @param String $var
 * @param String $var
 * @return String $var
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
function _e(&$s, $a = null) {
    return !empty($s) ? $s : $a;
}

/**
 * function to escape string
 * 
 * @param String $string
 * @return String escaped string
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 */
function _escape($string) {
    $string = stripslashes($string);
    return mysql_real_escape_string(trim($string));
}

/**
 * Wrapper function for db insert query
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 */
function qi($table, $fields) {
    $db = Db::__d();
    return $db->insert_query($table, $fields);
}

function qd($table, $condition) {
    $db = Db::__d();
    return $db->delete_query($table, $condition);
}

function q($query) {
    $db = Db::__d();
    return $db->format_data($db->query($query));
}

function qs($query) {
    $result = q($query);
    return $result[0];
}

/**
 * Wrapper function for db update query
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 */
function qu($table, $fields, $condition) {
    $db = Db::__d();
    return $db->update_query($table, $fields, $condition);
}

/**
 * Return date format that mysql likes YYYY-MM-DD H:I:S
 * 
 * @param String $timestamp optional unixtimestamp
 * @return String $date
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 */
function _mysqlDate($timestamp = 0) {
    $timestamp = $timestamp ? $timestamp : time();
    return date('Y-m-d H:i:s');
}

function _getInstance($url) {
    $arg = explode("/", $url);
    switch ($arg[0]) {
        case 'admin':
            _cg('url', _e($arg[1], "home"));
            _cg("url_instance", $arg[0]);
            _cg("instance", "admin");
            if ($arg[1] == 'userDomains' and $arg[2] != '') {
                _cg("domain_id", $arg[2]);
            }
            break;
        default:
            if ($arg[0] != '') {
                $url_d = $arg[0];
            } else {
                $url_d = 'home';
            }
            _cg('url', $url_d);
            _cg("url_instance", '');
            _cg("instance", "front");
            if (isset($arg[1]) && $arg[1] != '') {
                _cg("w_id", $arg[1]);
            }
    }
}

/**
 *  Wrapper function for application level
 *  global variable
 * 
 *  set/get key/value
 * 
 *  @param String $key key
 *  @param $value value
 * 
 *  @return Array 
 * 
 */
function _cg($key, $value = null) {

    if (is_null($value)) {
        return Config::$_vars[$key];
    } else {
        Config::$_vars[$key] = $value;
    }
}

/**
 *  Wrapper function for application level
 *  global variable
 * 
 *  set/get key/value
 * 
 *  @param String $key key
 *  @param $value value
 * 
 *  @return Array 
 * 
 */
function _cgd($key, $value = null) {

    if (is_null($value)) {

        return Config::$_vars[$key];
    } else {
        Config::$_vars[$key] = $value;
    }
}

function lr($url) {
    return _U . $url;
}

function l($url) {
    print lr($url);
}

function d($arr, $hideStyle = "block") {
    if (is_array($arr) || is_object($arr)) {
        print "<pre style='display:{$hideStyle}'>" . "...";
        print_r($arr);
        print "</pre>";
    } else {
        print "<div class='debug' style='display:{$hideStyle}'>Debug:<br>$arr</div>";
    }
}

function _R($url) {
    header("Location:{$url}");
    exit;
}

function _auth_url($pages, $return_page) {
    // && in_array(_cg("url"), $pages)) {

    if (!$_SESSION['user'] || _cg("url") == "login") {
        _cg("url", "login");
    }
	 
}

function _front_auth_url($pages, $return_page) {
    if ($_SESSION['user']['user_type'] != 'front_user' && in_array(_cg("url"), $pages)) {
        _cg("url", $return_page);
    }
}

function back_trace() {
    $array = debug_backtrace();
    $output = 'Execution Backtrace:<br><ul>';
    foreach ($array as $debug_data) {
        $output .= "<li><b> " . $debug_data['file'] . "</b> [ Line : <b>" . $debug_data['line'] . "</b> ] <br></li>";
    }
    $output .= '</ul>';
    d($output);
}

function random_string() {
    return date("ymd") . mt_rand(1, 1000) . mt_rand(99, 99999);
}

function _escapeArray($array) {
    return array_map('mysql_real_escape_string', $array);
}

function _bindArray($array, $map) {
    $return = array();
    foreach ($map as $form_field => $db_field) {
        $return[trim($db_field)] = trim($array[$form_field]);
    }
    return $return;
}

function _normalDate($date) {
    return date("d-M-Y H:i a", strtotime($date));
}

function json_die($status = true, $array = array()) {
    $response = array();
    $response['status'] = $status;
    $response['data'] = $array;
    die(json_encode($response));
}

function _nf($price, $dec) {
    return number_format($price, 2);
}

function removeHTTPS($url) {
    return str_replace(array("http://", "https://",  "/"), array("", "", ""), $url);
}

/**
 * 
 * Function to put the code on webdav enabled url
 * 
 * @param String $url
 * @param String $webdav_username
 * @param String $webdav_password
 * @param String $content
 * @return array
 * 
 */
function _pu($url, $webdav_username, $webdav_password, $content) {


    $return = array("status" => FALSE, "data" => TRUE, "error" => FALSE);

    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
    curl_setopt($ch, CURLOPT_USERPWD, "$webdav_username:$webdav_password");
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

    $fh = fopen("php://temp", "r+");
    fputs($fh, $content);
    rewind($fh);

    curl_setopt($ch, CURLOPT_PUT, true);
    curl_setopt($ch, CURLOPT_INFILE, $fh);
    curl_setopt($ch, CURLOPT_INFILESIZE, strlen($content));

    $return['data'] = curl_exec($ch);
    $return['error'] = curl_error($ch);

    curl_close($ch);


    if (!$return['error']) {
        $return['status'] = TRUE;
    }

    if (strpos($return['data'], "Exception")) {
        $return['status'] = FALSE;
        $return['error'] = explode("\n", $return['data']);
        $return['error'] = $return['error'][3];
    }

    return $return;
}

/**
 * 
 * Get the content from webdav enabled server/url
 * 
 * @param String $url
 * @param String $webdav_username
 * @param String $webdav_password
 * @return Array
 * 
 */
function _gu($url, $webdav_username, $webdav_password) {

    $return = array("status" => FALSE, "data" => TRUE, "error" => FALSE);

    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
    curl_setopt($ch, CURLOPT_USERPWD, "$webdav_username:$webdav_password");
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $return['data'] = curl_exec($ch);
    $return['error'] = curl_error($ch);
    curl_close($ch);



    if (!$return['error']) {
        $return['status'] = TRUE;
    }

    if (strpos($return['data'], "Exception")) {
        $return['status'] = FALSE;
        $return['error'] = explode("\n", $return['data']);
        $return['error'] = $return['error'][3];
    }

    return $return;
}

function offerSeries() {
    $db = db::__d();
    $data = q("select count(*) as hits, DATE_FORMAT(created_at,'%Y-%m-%d') as dt from customers_offers where co_c_id = '{$_SESSION['user']['c_id']}' group by dt order by dt asc");

    if (empty($data)) {
        $current_date = date("Y-m-d");
        return "['{$current_date}',0]";
    }

    $series = array();
    foreach ($data as $each_data) {
        $series[] = "['{$each_data['dt']}',{$each_data['hits']}]";
    }
    if (count($series) == 1) {
        $series[] = "['{$current_date}',0]";
    }
    return implode(",", $series);
}

function js_log($message) {
    print "<script type='text/javascript'>console.log('{$message}')</script>";
}

function _errors_on() {
    ini_set("display_errors", "on");
    error_reporting(E_ALL);
}

function _errors_off() {
    ini_set("display_errors", "off");
    error_reporting(0);
}

function _mail($to, $subject, $content, $extra = array()) {

    # unfortunately, need to use require within function.
    # swift lib overrides the autoloader 
    # and that stops native app classes being resolved and included

    require_once _PATH . 'lib/mail/swift/lib/swift_required.php';

    

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('hardik@codetaxi.com')
            ->setPassword('kn3bhar1');

    $mailer = Swift_Mailer::newInstance($transport);

    if (!is_array($to)) {
        $to = array($to);
    }

    $message = Swift_Message::newInstance($subject)
            ->setFrom(array('hardik@codetaxi.com' => 'Request a Deal'))
            ->setTo($to)
            ->addBcc('hardik@codetaxi.com')
            ->addBcc('brent@codetaxi.com')
            ->setBody($content, 'text/html', 'iso-8859-2');

    $result = $mailer->send($message);
 
    return $result;
}

?>