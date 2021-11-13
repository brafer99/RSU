<?php
require('connection.inc.php');
require('functions.inc.php');

$email = get_safe_value($con, $_POST['email']);
$password = get_safe_value($con, $_POST['password']);
$res = mysqli_query($con, "select * from users where email='$email'");
$check_user = mysqli_num_rows($res);

if ($check_user > 0) {
	$row = mysqli_fetch_assoc($res);
	$dbpassword = $row['password'];
	if (password_verify($password, $dbpassword)) {
		$_SESSION['USER_LOGIN'] = 'yes';
		$_SESSION['USER_ID'] = $row['id'];
		$_SESSION['USER_NAME'] = $row['name'];
		echo "valid";
	}else{
	echo "Ingrese su contraseña correcta";
	}
} else {
	echo "Ingrese bien su correo";
}
