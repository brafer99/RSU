function send_message() {
	var name = jQuery("#name").val();
	var email = jQuery("#email").val();
	var mobile = jQuery("#mobile").val();
	var message = jQuery("#message").val();

	if (name == "") {
		alert('Please enter name');
	} else if (email == "") {
		alert('Please enter email');
	} else if (mobile == "") {
		alert('Please enter mobile');
	} else if (message == "") {
		alert('Please enter message');
	} else {
		jQuery.ajax({
			url: 'send_message.php',
			type: 'post',
			data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&message=' + message,
			success: function (result) {
				alert("GRACIAS POR SU MENSAJE");
				window.location = "./index.php";
			}
		});
	}
}

function user_register() {
	jQuery('.field_error').html('');
	var name = jQuery("#name").val();
	var email = jQuery("#email").val();
	var mobile = jQuery("#mobile").val();
	var password = jQuery("#password").val();
	var is_error = '';
	if (name == "") {
		jQuery('#name_error').html('Por favor ingrese su nombre');
		is_error = 'yes';
	} if (email == "") {
		jQuery('#email_error').html('Por favor ingrese su e-mail');
		is_error = 'yes';
	} if (mobile == "") {
		jQuery('#mobile_error').html('Por favor ingrese su celular');
		is_error = 'yes';
	} if (password == "") {
		jQuery('#password_error').html('Por favor ingrese su contraseña');
		is_error = 'yes';
	}
	if (is_error == '') {
		jQuery.ajax({
			url: 'register_submit.php',
			type: 'post',
			data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
			success: function (result) {
				if (result == 'E-mail ya registrado') {
					jQuery('#email_error').html('E-mail ya registrado');
				}
				if (result == 'USUARIO REGISTRADO') {
					alert("USUARIO REGISTRADO, por favor ahora inicie sesión.");
					window.location = "./login.php";
				}
			}
		});
	}

}

function user_login() {
	jQuery('.field_error').html('');
	var email = jQuery("#login_email").val();
	var password = jQuery("#login_password").val();
	var is_error = '';
	if (email == "") {
		jQuery('#login_email_error').html('Por favor ingrese su e-mail');
		is_error = 'yes';
	} if (password == "") {
		jQuery('#login_password_error').html('Por favor ingrese su contraseña');
		is_error = 'yes';
	}
	if (is_error == '') {
		jQuery.ajax({
			url: 'login_submit.php',
			type: 'post',
			data: 'email=' + email + '&password=' + password,
			success: function (result) {
				if (result == 'wrong') {
					alert('Por favor ingrese sus datos correctos');
				}
				if (result == 'valid') {
					alert('Bienvenido a FOOD STYLE Restaurante');
					window.location = "./admin/login.php";
				}
			}
		});
	}
}

function manage_cart(pid, type) {
	if (type == 'update') {
		var qty = jQuery("#" + pid + "qty").val();
	} else {
		var qty = jQuery("#qty").val();
	}
	jQuery.ajax({
		url: 'manage_cart.php',
		type: 'post',
		data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
		success: function (result) {
			if (type == 'update' || type == 'remove') {
				window.location.href = window.location.href;
			}
			if (type == 'add') {
				alert("Platillo añadido al carrito");
			}
			jQuery('.htc__qua').html(result);
		}
	});
}

function sort_product_drop(cat_id, site_path) {
	var sort_product_id = jQuery('#sort_product_id').val();
	window.location.href = site_path + "categories.php?id=" + cat_id + "&sort=" + sort_product_id;
}


setInterval(function () {
	check_user();
}, 2000);
function check_user() {
	jQuery.ajax({
		url: 'user_auth.php',
		type: 'post',
		data: 'type=ajax',
		success: function (result) {
			if (result == 'logout') {
				window.location.href = 'logout.php';
			}
		}
	});
}
