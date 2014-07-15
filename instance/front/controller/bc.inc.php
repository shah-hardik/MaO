<?php

qi('bc_hits',array("bh_ip"=>$_SERVER['REMOTE_ADDR']));

// store the ip here

header("HTTP/1.1 301 Moved Permanently");
header("Location: http://makeanofferapp.com/pricing");
exit;

?>