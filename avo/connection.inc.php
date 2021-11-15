<?php
session_start();
/*$con = mysqli_connect('demopievi.mysql.database.azure.com','demo_pievi@demopievi', 'Pierovm001','ecom_food');*/
$con = mysqli_connect('127.0.0.1','root', '','ecom_food');
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/DRSU/avo/');
define('SITE_PATH','http://127.0.0.1/DRSU/avo/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'./source/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'./source/media/product/');
?>
