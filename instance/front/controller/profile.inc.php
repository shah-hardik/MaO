<?php

/**
 * Admin side Profile Details file
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since July 30, 2013
 * 
 */

if(isset($_REQUEST['profile_add']) and $_REQUEST['profile_add'] == 1){
  $next_step = 1; 
  if($_REQUEST['fields']['password'] != '' or $_REQUEST['fields']['confirm_password'] != '' ){
      if($_REQUEST['fields']['password'] != $_REQUEST['fields']['confirm_password']){
          $next_step = 0;
          $error = "Password and conform password does not match";
      }   
   }
   if($next_step == 1){
       $check_email = Signup::duplicate_email($_REQUEST['fields']['user_email'],$_SESSION['user']['c_id']);
       if($check_email != 0){
           $error = "Email address already available";
       } else {
           if(isset($_REQUEST['fields']['password']) && $_REQUEST['fields']['password'] != ''){
              $update_id = Signup::update_profile($_SESSION['user']['c_id'],$_REQUEST['fields']['user_email'],$_REQUEST['fields']['password']);  
           } else {
              $update_id = Signup::update_profile($_SESSION['user']['c_id'],$_REQUEST['fields']['user_email']); 
           }
           $greetings = "Profile updated successfully";
       }
   }
   
}

$profile = Signup::getEmail($_SESSION['user']['c_id']);
$c_email = $profile['c_email'];
$bc[] = array('text' => 'Profile');
$jsInclude = "profile.js.php";
_cg("page_title", "Profile");
?>
