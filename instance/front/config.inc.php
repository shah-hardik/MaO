<?php

$auth_pages = array();
$auth_pages[] = "s2signup";
$auth_pages[] = "forgot_password";
$auth_pages[] = "bc";
$auth_pages[] = "offer-price";
$auth_pages[] = "coupon_ui.php";
$auth_pages[] = "coupon_cart.php";
$auth_pages[] = "storeOffer.php";


//$auth_pages[] = "handleUpload";

if (isset($_REQUEST['logout'])) {
    User::killSession();
}
    if (!in_array(_cg("url"),$auth_pages)){
    _auth_url($auth_pages, "login");
}
if(isset($_REQUEST['email'])){

 _cg("url", "register");  }



?>