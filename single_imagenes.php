<?php
include('db.php');

$id= $_GET['id'];

//$query = mysqli_query($conn,"SELECT * FROM inmobiliaria");
//$fetch= mysqli_query($conn, $query);
//$fetch = mysqli_query($conn,"SELECT * FROM inmobiliaria WHERE id=" . $id);
$fetch = mysqli_query($conn,"SELECT * FROM inmueble WHERE inm_id=" . $id);
$row = mysqli_fetch_array($fetch);


/*<?php echo $row['tipoInmueble']?>*/

?>
<!DOCTYPE html5>
<html>
<head><title>Single - Caribean Service</title>
    <meta charset="utf-8"/>
    <meta name="description"
          content="Single - Somos una empresa especializada en el sector de gestión inmobiliria: Ventas, arriendos, avalúos, administración de propiedad horizontal y gerenciamiento de ventas de nuevos proyectos inmobiliarios."/>
    <meta name="keywords"
          content="Empresarial, Inmobiliaria, Ventas, Arriendos, Avaluos, propiedad horizontal, bienes, proyectos, inmobiliarios"/>
    <meta name="author" content="Caribean service"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="css/media-queries.css"/>
</head>
<body id="page-single_imagenes">
<header class="header">
    <div class="container">
        <ul class="nav nav-pills pull-left">
            <li class="active"><a href="#">IMÁGENES</a></li>
            <li><a href="single_descripcion.php?id=<?php echo $id; ?>">DESCRIPCIÓN</a></li>
        </ul>
        <div id="single-info">
            <div>
                <h4 class="col-sm-7">CIUDAD</h4>
                <p class="col-sm-3">Cartagena</p>
            </div>

            <?php
                $tipoNegocio="";
                if ( $row['inm_negocio'] == 1) {
                    $tipoNegocio="Venta";
                } elseif ($row['inm_negocio'] == 2) {
                    $tipoNegocio="Arriendo";
                } elseif ($row['inm_negocio'] == 3) {
                    $tipoNegocio="Arriendo";
                }



                $queryUbicacion = "SELECT zon_nombre FROM zonas WHERE zon_id='" . $row['inm_zon_id'] . "'";
                $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
                $rowUbicacion = mysqli_fetch_array($fetchUbicacion);
            ?>

            <div>
                <h4 class="col-sm-7">BARRIO</h4>
                <p class="col-sm-3"> <?php echo $rowUbicacion['zon_nombre']?></p>
            </div>

            <div>
                <h4 class="col-sm-7">TIPO DE INMUEBLE</h4>
                <p class="col-sm-3"><?php echo  $tipoNegocio?></p>
            </div>

            <div>
                <h4 class="col-sm-7">HABITACIONES</h4>
                <p class="col-sm-3"> <?php echo $row['inm_alcobas']?></p>
            </div>

            <div>
                <h4 class="col-sm-7">BAÑOS</h4>
                <p class="col-sm-3"> <?php echo $row['inm_banos']?></p>
            </div>

            <div>
                <h4 class="col-sm-7">AREA</h4>
                <p class="col-sm-3"> <?php echo $row['inm_area']?>m2</p>
            </div>

            <div>
                <?php $format_price =  number_format($row['inm_valor'])?>
                <p class="precio">$ <?php echo $format_price?></p></div>
            </div>

    </div>
</header>
<div class="container">
    <div id="contenido-single" class="col-sm-6"><h2>Cod. C16281</h2>
        <figure id="mainFigure">
            <?php
            if (file_exists('images/inmuebles/' .$row['inm_codigo'] . '/lightbox/' .$row['inm_img'])) {
                ?>
                <img src="images/inmuebles/<?php echo $row['inm_codigo'] ?>/lightbox/<?php echo $row['inm_img'] ?>"/>
            <?php
            } else{
                ?>
                <img src="imgs/No-foto.jpg"/>
            <?php
            }
            ?>

        </figure>
    </div>
    <?php
    $imgMiniatures = array();
    //$imgMiniatures = explode(",", $row['inm_img_array'] );
    //print_r($imgMiniatures);
    /*?>
    <div id="minuatures-single" class="col-lg-7">
        <?php
        for ($i = 0; $i < count($imgMiniatures); $i++) {
            //echo $imgMiniatures[$i];
            if ($i == 0) {
        ?>
                <figure class="miniatureFigure active"><img src="<?php echo $imgMiniatures[$i]?>"/></figure>
        <?php

            } else {
        ?>
            <figure class="miniatureFigure"><img src="<?php echo $imgMiniatures[$i]?>"/></figure>
        <?php
            }
        }
    */
        ?>

    <!--</div>-->
    <div id="reservar">
        <div id ="reservar_btn">
            <p>RESERVA TU CITA</p>
        </div>
        <div id="reservar_frm">
        </div>
    </div>

</div>
<div id="footer-single">
    <div class="container">
        <figure id="logo-single"><img src="imgs/logo-single.png"/></figure>
    </div>
</div>



</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</html>