<?php
require('connection.inc.php');
require('functions.inc.php');

$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$password=get_safe_value($con,$_POST['password']);

$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
if($check_user>0){
	echo "E-mail ya registrado";
}else{
	$added_on=date('Y-m-d h:i:s');
	$new_password=password_hash($password,PASSWORD_BCRYPT);
	mysqli_query($con,"insert into users(name,email,password,added_on) values('$name','$email','$new_password','$added_on')");
	echo "USUARIO REGISTRADO";
}
?>