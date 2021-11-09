<?php
session_start();
if (isset($_POST['type']) && $_POST['type'] == 'ajax') {
	if ((time() - $_SESSION['LAST_ACTIVE_TIME']) > 600) {
		echo "logout";
	}
} else {
	if (isset($_SESSION['LAST_ACTIVE_TIME'])) {
		if ((time() - $_SESSION['LAST_ACTIVE_TIME']) > 600) {
?><script>
				window.location.href = 'logout.php';
			</script>
<?php
		}
	}
	$_SESSION['LAST_ACTIVE_TIME'] = time();
}
?>