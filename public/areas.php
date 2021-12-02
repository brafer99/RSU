<?php require('header.php');?>
<!--CARDS SELECTION BY AREAS-->
<div class="boxesContainer">

    <div class="cardBox">
        <div class="card">
            <div class="front">
                <h3>AEP</h3>
                <p>Área de Extensión y Proyección Cultural</p>
            </div>
            <div class="back">
                <a href="../aep">Ir</a>
            </div>
        </div>
    </div>

    <div class="cardBox">
        <div class="card">
            <!--COLOCAR ID A SU AREA-->
            <div class="front" id="avo">
                <h3>AVO</h3>
                <p>Área de Programas de Voluntariado Basadrino y Vinculación con Grupos de Interés</p>
            </div>
            <div class="back">
                <a href="../avo/index.php">Ingresar</a>
            </div>
        </div>
    </div>

    <div class="cardBox">
        <div class="card">
            <div class="front">
                <h3>DRSU</h3>
                <p>Dirección Académica de Responsabilidad Social Universitaria</p>
            </div>
            <div class="back">
                <a href="../drsu/index.php">Ir</a>
            </div>
        </div>
    </div>

</div>
<!-- END CARDS SELECTION BY AREAS-->



<?php
require("logos.php");
require("footer.php")
?>