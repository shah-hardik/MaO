<?php

/**
 * Loader file.
 * Includes libraries
 * Inititaes controller + view
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
# autoload : 
#SET Site URL
# Always use full web-url
# Always use full physical path
define("_PATH", str_replace("loader.php", "", __FILE__));

function __autoload($class_name) {
    include_once(_PATH . 'lib/' . $class_name . '.class.php');
}

// Lets load libs first

include "lib/utils.php"; # includes general function


_getInstance($_REQUEST['q']);
$instance = _cg("instance");


$host = $_SERVER['HTTP_HOST'];

define('_UPlain', "http://" . $host . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1));
if (_cg("url_instance") != '') {
    define('_U', "http://" . $host . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1) . _cg("url_instance") . "/");
} else {
    define('_U', "http://" . $host . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1));
}

define("_MEDIA_URL", _UPlain . "instance/{$instance}/media/");

$db = Db::__d();



include _PATH . "instance/{$instance}/config.inc.php";

$url = _cg("url"); // set from _getInstance function
define(_URL, $url);

// This will act as an model + controller
// As this is our only small MVC :) 
$modulePage = $url . ".php";
@include _PATH . "instance/{$instance}/controller/{$url}.inc.php";

// This is where, template is going to be loaded
// It can be conditional too, but for now, lets load simple template 
// No conditions 

include _PATH . "instance/{$instance}/tpl/index.tpl.php";
?>