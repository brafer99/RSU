<?php
session_start();
if(empty($_SESSION['active'])) {
  header("Location: ../");
}
require_once 'includes/session.php';
require_once 'includes/header.php';
?>

<main class="app-content">
    <div class="row">
        <div class="col-md-12" align="center">
            <img src="images/logoAEP.png" alt="imagen escuela">
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
