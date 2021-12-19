<?php
session_start();
$con = mysqli_connect('127.0.0.1','root', '','rsu');
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT']);
define('SITE_PATH','http://drsu.unjbg.edu.pe/avo/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'avo/source/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'source/media/product/');
?>
