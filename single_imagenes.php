<?php
include('db.php');

$id= $_GET['id'];
$fetch = mysqli_query($conn,"SELECT * FROM inmueble WHERE inm_id=" . $id);
$row = mysqli_fetch_array($fetch);

$fetch_tipo = mysqli_query($conn,"SELECT * FROM tipos_inmueble WHERE tipo_inm_id=" .$row["inm_tipo"]);
$row_tipo = mysqli_fetch_array($fetch_tipo);

$tipoNegocio="";
if ( $row['inm_negocio'] == 1) {
    $tipoNegocio="Venta";
} elseif ($row['inm_negocio'] == 2) {
    $tipoNegocio="Arriendo";
} elseif ($row['inm_negocio'] == 3) {
    $tipoNegocio="Arriendo";
}

?>

<!DOCTYPE html5>
<html>
<head>
    <?php include("head.html"); ?>

    <link rel="stylesheet" href="tinycarousel.css" type="text/css" media="screen"/>

</head>

<body id="page-single_imagenes">

<header class="header">
    <div class="container">
        <!--<h3>DESCRIPCIÓN</h3>-->
        <h3><?php echo  $row_tipo["tipo_nombre"]?> para <?php echo  $tipoNegocio?></h3>
        <h2>Cod. <?php echo $row["inm_codigo"] ?></h2>
    </div>
</header>

<div class="container" style="position: relative;">
    <div id="contenido-single" class="col-sm-6">
        <h2>Cod. C16281</h2>
        <figure id="mainFigure">
            <?php
            if (file_exists('images/inmuebles/' .$row['inm_id'] . '/lightbox/' .$row['inm_img'])) {
                $folder = 'images/inmuebles/' .$row['inm_id'] . '/lightbox/';
                ?>
                <img src="images/inmuebles/<?php echo $row['inm_id'] ?>/lightbox/<?php echo $row['inm_img'] ?>"/>
            <?php
            }else if (file_exists('images/inmuebles/' .$row['inm_codigo'] . '/lightbox/' .$row['inm_img'])) {
                $folder = 'images/inmuebles/' .$row['inm_codigo'] . '/lightbox/';
                ?>
                <img src="images/inmuebles/<?php echo $row['inm_codigo'] ?>/lightbox/<?php echo $row['inm_img'] ?>"/>
            <?php
            } else{
                $folder = 'images/inmuebles/' .$row['inm_id'] . '/lightbox/';
                ?>
                <img src="imgs/No-foto.png"/>
            <?php
            }
            ?>
        </figure>

        <?php
        $imgMiniatures = array();



        $filetype = '*.*';
        $files = glob($folder.$filetype);
        $count = count($files);

        if($count>0){
            for ($i = 0; $i < $count; $i++) {
                //$imgMiniatures = $files[$i];
                array_push($imgMiniatures, $files[$i]);
            }

            //print_r($imgMiniatures);
            ?>
            <!--<div id="minuatures-single" class="col-sm-12">

                <?php
                //for ($i = 0; $i < $count; $i++) {
                for ($i = 0; $i < 4; $i++) {
                    //echo $imgMiniatures[$i];
                    if ($i == 0) {
                        ?>
                        <figure class="col-sm-3 miniatureFigure active"><img src="<?php echo $imgMiniatures[$i]?>"/></figure>
                    <?php

                    } else {
                        ?>
                        <figure class="col-sm-3 miniatureFigure"><img src="<?php echo $imgMiniatures[$i]?>"/></figure>
                    <?php
                    }
                }
                ?>
            </div>-->
        <?php
        }
        ?>


        <div id="slider1" class="col-sm-12">
            <a class="buttons prev" href="#">&#60;</a>
            <div class="viewport">
                <ul class="overview">
                    <?php
                    for ($i = 0; $i < $count; $i++) {
                    //for ($i = 0; $i < 4; $i++) {
                        //echo $imgMiniatures[$i];
                        if ($i == 0) {
                            ?>
                            <li class="col-sm-3 miniatureFigure active"><img src="<?php echo $imgMiniatures[$i]?>" /></li>
                        <?php

                        } else {
                            ?>
                            <li class="col-sm-3 miniatureFigure"><img src="<?php echo $imgMiniatures[$i]?>" /></li>
                        <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <a class="buttons next" href="#">&#62;</a>
        </div>



        <div class="col-sm-12 caracteristicas">
            <h4>OTRAS CARACTERÍSTICAS</h4>
            <P><?php echo utf8_encode($row['inm_desc'])?></P>
        </div>
    </div>

        <div id="single-info" class="col-sm-5">
            <div class="surround-single">
                <div>
                    <h4 class="col-md-6">CIUDAD</h4>
                    <p class="col-md-6">Cartagena</p>
                </div>

                <?php
                $queryUbicacion = "SELECT zon_nombre FROM zonas WHERE zon_id='" . $row['inm_zon_id'] . "'";
                $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
                $rowUbicacion = mysqli_fetch_array($fetchUbicacion);

                if ($rowUbicacion!=NULL)
                {
                ?>
                <div>
                    <h4 class="col-md-6">BARRIO</h4>
                    <p class="col-md-6"> <?php echo $rowUbicacion['zon_nombre']?></p>
                </div>
                <?php
                }
                ?>

                <div>
                    <h4 class="col-md-6">TIPO DE INMUEBLE</h4>
                    <p class="col-md-6"><?php echo  $row_tipo["tipo_nombre"]?></p>
                </div>

                <div>
                    <h4 class="col-md-6">HABITACIONES</h4>
                    <p class="col-md-6"> <?php echo $row['inm_alcobas']?></p>
                </div>

                <div>
                    <h4 class="col-md-6">BAÑOS</h4>
                    <p class="col-md-6"> <?php echo $row['inm_banos']?></p>
                </div>

                <div>
                    <h4 class="col-md-6">AREA</h4>
                    <p class="col-md-6"> <?php echo $row['inm_area']?>m2</p>
                </div>

                <div>
                    <?php $format_price =  number_format($row['inm_valor'])?>
                    <p class="precio">$ <?php echo $format_price?></p></div>
                <?php
                if ($id == 376)
                {
                    ?>
                    <span>*Este valor incluye administración</span>
                    <?php
                }
                ?>
            </div>

            <div id="reservar" class="col-sm-12">
                <div id ="reservar_btn">
                    <p>RESERVA TU CITA</p>
                </div>
                <div id="reservar_frm">

                    <form name="htmlform2" method="post" action="html_form_send2.php">
                        <input type="text" placeholder="Nombre y Apellido" name="name" required="required"/>
                        <input type="text" placeholder="Ciudad" name="city" required="required"/>
                        <input type="email" placeholder="E-mail" name="email" required="required"/>
                        <input type="tel" placeholder="Teléfono" name="tel" required="required"/>
                        <input type="submit"/>
                </div>
            </div>
        </div>

        <figure class="logofigure" style="overflow: hidden;bottom: 0;position: absolute;right: 0;">
            <a href="http://caribeanservice.com/inmobiliaria2.php">
                <img src="imgs/logo-C-Service.png" style="width: 200px">
            </a>
        </figure>



</div>

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>


<script type="text/javascript" src="jquery.tinycarousel.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#slider1').tinycarousel();
    });
</script>