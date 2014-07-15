<?php

$data = q("select * from customers where c_from_bc = '1' ");

d($data);
die;

?>