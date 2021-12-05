<?php
session_start();
$con = mysqli_connect('127.0.0.1','root', '','rsu');
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/RSU/avo/');
define('SITE_PATH','http://127.0.0.1/RSU/avo/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'./source/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'./source/media/product/');
?>
