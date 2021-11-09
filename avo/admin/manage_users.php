<?php
require('top.inc.php');
$username = '';
$password = '';
$privileges = 0;
$msg = '';

if (isset($_POST['submit'])) {
    $username = get_safe_value($con, $_POST['username']);
    $password = get_safe_value($con, $_POST['password']);

    $res = mysqli_query($con, "select * from admin_users where name='$username'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "EMPLEADO YA REGISTRADO";
            }
        } else {
            $msg = "EMPLEADO YA REGISTRADO";
        }
    }

    if ($msg == '') {
        mysqli_query($con, "insert into admin_users(username,password,privileges) values('$username','$password','$privileges')");
        header('location:users.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>AGREGAR EMPLEADO</strong></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Usuario</label>
                                <input type="text" name="username" placeholder="username" class="form-control" required value="<?php echo $username ?>">
                            </div>

                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Contraseña</label>
                                <input type="password" name="password" placeholder="password" class="form-control" required value="<?php echo $password ?>">
                            </div>

                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Registrar</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('footer.inc.php');
?>