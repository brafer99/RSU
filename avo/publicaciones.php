<?php
require('top.php');
/*SQL DE PUBLICACIONES*/
$sql = "SELECT avo_publicacion.id, avo_publicacion.id_tipo, avo_publicacion.titulo, avo_publicacion.fecha, avo_publicacion.image
		FROM avo_publicacion, avo_tipo_publicacion
 		WHERE avo_publicacion.id_tipo = avo_tipo_publicacion.id 
        ORDER BY avo_publicacion.fecha DESC";
$res = mysqli_query($con, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
$get_publicacion = $data;
?>

<div class="body__overlay"></div>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(./source/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">INICIO</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">NOTICIAS Y EVENTOS</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <?php if (count($get_publicacion) > 0) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                        </div>
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <?php
                                    foreach ($get_publicacion as $list) {
                                    ?>
                                        <!-- Start Single Category -->
                                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="publicacion_details.php?id=<?php echo $list['id'] ?>">
                                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="publicacion_details.php?id=<?php echo $list['id'] ?>">
                                                        <?php echo $list['titulo'] ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li><?php 
                                                        $newdate = date("d-m-Y",strtotime($list['fecha'])); 
                                                        echo "Fecha: " .$newdate ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {
                echo "Datos no encontrados, intente nuevamente.";
            } ?>

        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- End Banner Area -->
<?php require('footer.php') ?>