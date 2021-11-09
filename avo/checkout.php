<?php
date_default_timezone_set('America/Lima');
require('top.php');

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}

$cart_total = 0;

if (isset($_POST['submit'])) {
	$address = get_safe_value($con, $_POST['address']);
	$reference = get_safe_value($con, $_POST['reference']);
	$dni = get_safe_value($con, $_POST['dni']);
	$payment_type = get_safe_value($con, $_POST['payment_type']);
	$user_id = $_SESSION['USER_ID'];
	foreach ($_SESSION['cart'] as $key => $val) {
		$productArr = get_product($con, '', '', $key);
		$price = $productArr[0]['price'];
		$qty = $val['qty'];
		$cart_total = $cart_total + ($price * $qty);
	}
	$total_price = $cart_total;
	$payment_status = '';
	if ($payment_type == 'DELIVERY') {
		$payment_status = 'PENDIENTE';
	}
	$order_status = '1';
	$added_on = date('Y-m-d h:i:s');


	mysqli_query($con, "insert into `order`(user_id,address,reference,dni,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$reference','$dni','$payment_type','$payment_status','$order_status','$added_on','$total_price')");

	$order_id = mysqli_insert_id($con);

	foreach ($_SESSION['cart'] as $key => $val) {
		$productArr = get_product($con, '', '', $key);
		$price = $productArr[0]['price'];
		$qty = $val['qty'];

		mysqli_query($con, "insert into `order_detail`(order_id,product_id,qty,price,added_on) values('$order_id','$key','$qty','$price','$added_on')");
	}
	unset($_SESSION['cart']);

?>
	<script>
		window.location.href = 'thank_you.php';
	</script>
<?php


}
?>

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
	<div class="ht__bradcaump__wrap">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bradcaump__inner">
						<nav class="bradcaump-inner">
							<a class="breadcrumb-item" href="index.php">INICIO</a>
							<span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
							<span class="breadcrumb-item active">CAJA</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="order-details">
					<h5 class="order-details__title">SU ORDEN</h5>
					<div class="order-details__item">

						<?php
						$cart_total = 0;
						foreach ($_SESSION['cart'] as $key => $val) {
							$productArr = get_product($con, '', '', $key);
							$pname = $productArr[0]['name'];
							$price = $productArr[0]['price'];
							$image = $productArr[0]['image'];
							$qty = $val['qty'];
							$cart_total = $cart_total + ($price * $qty);
						?>
							<div class="single-item">
								<div class="single-item__thumb">
									<img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" />
								</div>
								<div class="single-item__content">
									<a href="#"><?php echo $pname ?></a>
									<span class="price" style="font-size: 12px;"><?php echo $qty." unidad(es)"?></span>
									<span class="price"><?php echo "S/. " . $price * $qty?></span>
								</div>
								<div class="single-item__remove">
									<a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="icon-trash icons"></i></a>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="ordre-details__total">
						<h5>MONTO TOTAL</h5>
						<span class="price"><?php echo "S/. " . $cart_total ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="checkout__inner">
					<div class="accordion-list">
						<div class="accordion">
							<?php
							$accordion_class = 'accordion__title';
							if (!isset($_SESSION['USER_LOGIN'])) {
								$accordion_class = 'accordion__hide';
							?>
								<div class="accordion__title">
									MÉTODO DE PAGO
								</div>
								<div class="accordion__body">
									<div class="accordion__body__form">
										<div class="row">
											<div class="col-md-6">
												<div class="checkout-method__login">
													<form id="login-form" method="post">
														<h5 class="checkout-method__title">INICIAR SESIÓN</h5>
														<div class="single-input">
															<input type="text" name="login_email" id="login_email" placeholder="E-mail*" style="width:100%">
															<span class="field_error" id="login_email_error"></span>
														</div>

														<div class="single-input">
															<input type="password" name="login_password" id="login_password" placeholder="Contraseña*" style="width:100%">
															<span class="field_error" id="login_password_error"></span>
														</div>

														<p class="require">*Campos requeridos</p>
														<div class="dark-btn">
															<button type="button" class="fv-btn" onclick="user_login()">INICIAR SESIÓN</button>
														</div>
														<div class="form-output login_msg">
															<p class="form-messege field_error"></p>
														</div>
													</form>
												</div>
											</div>
											<div class="col-md-6">
												<div class="checkout-method__login">
													<form action="#">
														<h5 class="checkout-method__title">REGISTRAR</h5>
														<div class="single-input">
															<input type="text" name="name" id="name" placeholder="Nombre" style="width:100%">
															<span class="field_error" id="name_error"></span>
														</div>
														<div class="single-input">
															<input type="text" name="email" id="email" placeholder="E-mail" style="width:100%">
															<span class="field_error" id="email_error"></span>
														</div>

														<div class="single-input">
															<input type="text" name="mobile" id="mobile" placeholder="Celular" style="width:100%">
															<span class="field_error" id="mobile_error"></span>
														</div>
														<div class="single-input">
															<input type="password" name="password" id="password" placeholder="Contraseña" style="width:100%">
															<span class="field_error" id="password_error"></span>
														</div>
														<div class="dark-btn">
															<button type="button" class="fv-btn" onclick="user_register()">REGISTRARSE</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="<?php echo $accordion_class ?>">
								DIRECCIÓN
							</div>
							<form method="post">
								<div class="accordion__body">
									<div class="bilinfo">
										<div class="row">
											<div class="col-md-12">
												<div class="single-input">
													<input type="text" name="address" placeholder="Dirección" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="single-input">
													<input type="text" name="reference" placeholder="Referencia" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="single-input">
													<input type="text" name="dni" placeholder="Código Postal" required>
												</div>
											</div>

										</div>

									</div>
								</div>
								<div class="<?php echo $accordion_class ?>">
									MÉTODO DE PAGO
								</div>
								<div class="accordion__body">
									<div class="paymentinfo">
										<div class="single-method">
											<input type="hidden" name="payment_type" value="DELIVERY" required /><br>
										</div>
										<div class="single-method">
										</div>
									</div>
									<div class="delivery">
										<input type="submit" name="submit" value="Delivery" />
									</div>
								</div>
							</form>
							<br>
							<!--<form action="paystripeID.php" method="post">
								<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $publishablekey ?>" data-amount=<?php echo $cart_total * 100 ?> data-name="FOOD STYLE Restaurante" data-description="" data-image="./images/logo/logo_main.png" data-currency="pen" data-locale="auto"></script>
							</form>-->


						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php require('footer.php') ?>