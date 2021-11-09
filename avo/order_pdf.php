<?php
include('./source/vendor/autoload.php');
require('connection.inc.php');
require('functions.inc.php');
if (!$_SESSION['ADMIN_LOGIN']) {
	if (!isset($_SESSION['USER_ID'])) {
		die();
	}
}

$order_id = get_safe_value($con, $_GET['id']);

$css = file_get_contents('./source/css/bootstrap.min.css');
$css .= file_get_contents('./source/style.css');
$css .= file_get_contents('./source/css/custom.css');

$html = '
<div class="wishlist-table table-responsive">
<table>
   <thead>
	  <tr>
		 <th class="product-thumbnail">Cliente</th>
		 <th class="product-price">DNI</th>
		 <th class="product-thumbnail">Dirección</th>
		 <th class="product-name">Fecha</th>
		 <th class="product-price">FACTURA #FSR00-' . $order_id . '</th>
	  </tr>
   </thead>
   <tbody>';

if (isset($_SESSION['ADMIN_LOGIN'])) {
	$res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
} else {
	$uid = $_SESSION['USER_ID'];
	$res = mysqli_query($con, "select `order`.*, users.name from `order`,users where `order`.id='$order_id' and `order`.user_id = users.id");
}

if (mysqli_num_rows($res) == 0) {
	die();
}
while ($row = mysqli_fetch_assoc($res)) {
	$html .= '<tr>
            <td class="product-name">' . $row['name'] . '</td>
            <td class="product-name">' . $row['dni'] . '</td>
            <td class="product-name">' . $row['address'] . " - ".$row['reference']. '</td>
            <td class="product-name">' . $row['added_on'] . '</td>
            <td class="product-name"><img src="./source/images/logo/main.png" alt="logo" width="150px" height="auto"></td>
         </tr>';
}
$html .= '</tbody>
   </table>
</div> <br><br>';


$html .= '
<div class="wishlist-table table-responsive">
   <table>
      <thead>
         <tr>
            <th class="product-thumbnail">Nombre</th>
            <th class="product-thumbnail">Imagen</th>
            <th class="product-name">Cantidad</th>
            <th class="product-price">Precio unitario</th>
            <th class="product-price">Subtotal</th>
         </tr>
      </thead>
      <tbody>';

if (isset($_SESSION['ADMIN_LOGIN'])) {
	$res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
} else {
	$uid = $_SESSION['USER_ID'];
	$res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
}

$total_price = 0;
if (mysqli_num_rows($res) == 0) {
	die();
}
while ($row = mysqli_fetch_assoc($res)) {
	$total_price = $total_price + ($row['qty'] * $row['price']);
	$pp = $row['qty'] * $row['price'];
	$html .= '<tr>
            <td class="product-name">' . $row['name'] . '</td>
            <td class="product-name"> <img src="' . PRODUCT_IMAGE_SITE_PATH . $row['image'] . '" width="100" height="auto"></td>
            <td class="product-name">' . $row['qty'] . '</td>
            <td class="product-name">' . "S/. " . $row['price'] . '</td>
            <td class="product-name">' . "S/. " . $pp . '</td>
         </tr>';
}
$html .= '<tr>
				<td colspan="3"></td>
				<td class="product-name">Total a pagar</td>
				<td class="product-name">' . "S/. " . $total_price . '</td>
				
			</tr>';

$html .= '</tbody>
   </table>
</div>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html, 2);
$file = time() . '.pdf';
$mpdf->Output($file, 'D');
