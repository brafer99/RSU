<?php
require('top.php');

if (isset($_GET['id'])) {
    $publicacion_id = mysqli_real_escape_string($con, $_GET['id']);
    if ($publicacion_id > 0) {
        /*SQL DE PUBLICACIONES*/
        $sql = "SELECT publicacion.*, tipo_publicacion.nombre 
                FROM publicacion, tipo_publicacion
                WHERE (publicacion.id_tipo = tipo_publicacion.id AND publicacion.id = $publicacion_id)";
        $res = mysqli_query($con, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        $get_publicacion = $data;
    } else {
?>
        <script>
            window.location.href = 'index.php';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
?>

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
                            <span class="breadcrumb-item active"><?php echo $get_publicacion['0']['nombre'] ?></span>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?php echo $get_publicacion['0']['titulo'] ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_publicacion['0']['image'] ?>" alt="full-image">
                                </div>
                            </div>
                        </div>
                        <!-- End Product Big Images -->

                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40" style="margin-top: 30px;">
                    <div class="ht__product__dtl">
                        <h2><?php echo $get_publicacion['titulo'] ?></h2>
                        <ul class="pro__prize">
                            <li><?php
                                $newdate = date("d-m-Y", strtotime($get_publicacion['0']['fecha']));
                                echo "Fecha: " . $newdate ?></li>
                        </ul>
                        <div class="ht__pro__desc">
                            <div class="sin__desc align--left">
                                <p><span>Tipo: </span></p>
                                <ul class="pro__cat__list">
                                    <li><a href="#"><?php echo $get_publicacion['0']['nombre'] ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Start Product Description -->
                    <section class="htc__produc__decription bg__white" style="margin-top: 30px; margin-left:-20px">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6">
                                    <!-- Start List And Grid View -->
                                    <ul class="pro__details__tab" role="tablist">
                                        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">DESCRIPCIÓN</a></li>
                                    </ul>
                                    <!-- End List And Grid View -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="ht__pro__details__content" style="margin-top: -30px;">
                                        <!-- Start Single Content -->
                                        <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                            <div class="pro__tab__content__inner" style="font-size: 20px;">
                                                <?php echo $get_publicacion['0']['descripcion'] ?>
                                            </div>
                                        </div>
                                        <!-- End Single Content -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Product Description -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area-->
<?php require('footer.php') ?>