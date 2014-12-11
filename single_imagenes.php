<?php
include('db.php');

$id= $_GET['id'];
$fetch = mysqli_query($conn,"SELECT * FROM inmueble WHERE inm_id=" . $id);
$row = mysqli_fetch_array($fetch);

?>

<!DOCTYPE html5>
<html>
<head>
    <?php include("head.html"); ?>
</head>

<body id="page-single_imagenes">

<header class="header">
    <div class="container">
        <h3>DESCRIPCIÓN</h3>
    </div>
</header>

<div class="container">
    <div id="contenido-single" class="col-sm-6">
        <h2>Cod. C16281</h2>
        <figure id="mainFigure">
            <?php
            if (file_exists('images/inmuebles/' .$row['inm_codigo'] . '/lightbox/' .$row['inm_img'])) {
                ?>
                <img src="images/inmuebles/<?php echo $row['inm_codigo'] ?>/lightbox/<?php echo $row['inm_img'] ?>"/>
            <?php
            } else{
                ?>
                <img src="imgs/No-foto.png"/>
            <?php
            }
            ?>
        </figure>

        <?php
        $imgMiniatures = array();


        $folder = 'images/inmuebles/' .$row['inm_codigo'] . '/lightbox/';
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
            <div id="minuatures-single" class="col-sm-12">
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
            </div>
        <?php
        }
        ?>

        <div class="col-sm-12 caracteristicas">
            <h4>OTRAS CARACTERÍSTICAS</h4>
            <P>BLABLABLA</P>
        </div>
    </div>

        <div id="single-info" class="col-sm-5">
            <div class="surround-single">
                <div>
                    <h4 class="col-md-6">CIUDAD</h4>
                    <p class="col-md-4">Cartagena</p>
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

                if ($rowUbicacion!=NULL)
                {
                ?>
                <div>
                    <h4 class="col-md-6">BARRIO</h4>
                    <p class="col-md-4"> <?php echo $rowUbicacion['zon_nombre']?></p>
                </div>
                <?php
                }
                ?>

                <div>
                    <h4 class="col-md-6">TIPO DE INMUEBLE</h4>
                    <p class="col-md-4"><?php echo  $tipoNegocio?></p>
                </div>

                <div>
                    <h4 class="col-md-6">HABITACIONES</h4>
                    <p class="col-md-4"> <?php echo $row['inm_alcobas']?></p>
                </div>

                <div>
                    <h4 class="col-md-6">BAÑOS</h4>
                    <p class="col-md-4"> <?php echo $row['inm_banos']?></p>
                </div>

                <div>
                    <h4 class="col-md-6">AREA</h4>
                    <p class="col-md-4"> <?php echo $row['inm_area']?>m2</p>
                </div>

                <div>
                    <?php $format_price =  number_format($row['inm_valor'])?>
                    <p class="precio">$ <?php echo $format_price?></p></div>
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




</div>

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</html>
