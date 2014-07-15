<?php


/**
 * 
 * Algorightm for the direct injection
 * 1. Get the default template
 * 2. Save the default template
 * 3. If there is not default template
 * 4. Use our default template
 * 5. That's it 
 * 6. Lets Go!
 * 
 * 7. 
 * 
 * 
 */

error_reporting(E_ALL);

$webdav_username = 'admin';
$webdav_password = 'Ychycaei2';
$store_url = 'https://hcisites.com';

$url = "{$store_url}/dav/template/Snippets/ProductAddToCart.html";

$response = _gu($url, $webdav_username, $webdav_password);
print "<pre>";
print_r($response);
//_pu($url, $webdav_username, $webdav_password,$content);

die;

?>