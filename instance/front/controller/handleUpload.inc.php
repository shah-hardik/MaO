<?php 

$session_name = session_name();
session_id($_POST[$session_name]);
//session_start(); 

$tempFile = $_FILES['Filedata']['tmp_name'];
$instance = _cg('instance');
$file_name = $_FILES['Filedata']['name'];

$ext = end(explode(".", $file_name));
$file_name_store = random_string() . "." . $ext;
$path = _PATH . "instance/{$instance}/uploads/" . $file_name_store;
$img_url = _U . "instance/{$instance}/uploads/" . $file_name_store;

move_uploaded_file($tempFile, $path);
$_SESSION['uploaded_file'] = $file_name_store;

echo $img_url;
die;
?>
