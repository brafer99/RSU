<?php
require('top.php');

if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(./source/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">INICIO</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">MIS PEDIDOS</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">N° PEDIDO</th>
                                        <th class="product-name"><span class="nobr">FECHA</span></th>
                                        <th class="product-price"><span class="nobr"> DIRECCIÓN </span></th>
                                        <th class="product-stock-stauts"><span class="nobr">TIPO DE PAGO</span></th>
                                        <th class="product-stock-stauts"><span class="nobr">ESTADO DEL PAGO</span></th>
                                        <th class="product-stock-stauts"><span class="nobr">ESTADO DEL PEDIDO</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($con, "select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status order by `order`.added_on desc");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><a href="my_order_details.php?id=<?php echo $row['id'] ?>"> <?php echo $row['id'] ?></a>
                                                <br />
                                                <a href="order_pdf.php?id=<?php echo $row['id'] ?>"> PDF</a>
                                            </td>
                                            <td class="product-name"><?php echo $row['added_on'] ?></td>
                                            <td class="product-name">
                                                <?php echo $row['address'] ?><br />
                                                <?php echo $row['reference'] ?><br />
                                            </td>
                                            <td class="product-name"><?php echo $row['payment_type'] ?></td>
                                            <td class="product-name"><?php echo $row['payment_status'] ?></td>
                                            <td class="product-name"><?php echo $row['order_status_str'] ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php require('footer.php') ?>
