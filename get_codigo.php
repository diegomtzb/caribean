<?php

include('db.php');

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
}

$query="SELECT * FROM inmueble WHERE inm_codigo = '" . $codigo . "'";
$fetch= mysqli_query($conn, $query);

while($row = mysqli_fetch_array($fetch)) {

    if ( $row['inm_valor'] == "") {
        $format_price=0;
    } else  {
        $format_price =  number_format($row['inm_valor']);
    }

    if( $row['inm_negocio'] == 2) {
        $negocio_string = "Venta";
    }else {
        $negocio_string = "Arriendo";
    }

    if ( $row['inm_tipo'] == 1) {
        $tipo_inmueble="Proyecto";
    } elseif ( $row['inm_tipo'] == 2) {
        $tipo_inmueble="Apartamento";
    } elseif ( $row['inm_tipo'] == 3) {
        $tipo_inmueble="Casa";
    } elseif ( $row['inm_tipo'] == 4) {
        $tipo_inmueble="Edificio";
    } elseif ( $row['inm_tipo'] == 5) {
        $tipo_inmueble="Oficina";
    } elseif ( $row['inm_tipo'] == 6) {
        $tipo_inmueble="Local";
    } elseif ( $row['inm_tipo'] == 7) {
        $tipo_inmueble="Bodega";
    } elseif ( $row['inm_tipo'] == 8) {
        $tipo_inmueble="Lote";
    } elseif ( $row['inm_tipo'] == 9) {
        $tipo_inmueble="Finca";
    } elseif ( $row['inm_tipo'] == 10) {
        $tipo_inmueble="Garaje";
    }

    $ciudad="Cartagena";

    $queryUbicacion = "SELECT zon_nombre FROM zonas WHERE zon_id='" . $row['inm_zon_id'] . "'";
    $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
    $rowUbicacion = mysqli_fetch_array($fetchUbicacion);

    ?>
    <a class="iframe" href="single_imagenes.php?id=<?php echo $row['inm_id']; ?>">
        <div class="search_result col-lg-3 col-md-6 col-sm-6">
            <div class="result_info">
                <div class="divInfo">
                    <div class="tittleapartamento">
                        <p class="pTipoInmuble"> <?php echo $tipo_inmueble; ?>,<?php echo $negocio_string; ?> </p>
                    </div>

                    <?php
                    if (file_exists('images/inmuebles/' .$row['inm_id'] . '/destacado/' .$row['inm_img'])) {
                    ?>
                    <figure>
                        <img src="images/inmuebles/<?php echo $row['inm_id'] ?>/destacado/<?php echo $row['inm_img'] ?>"/>
                        <?php
                    }else if (file_exists('images/inmuebles/' .$row['inm_codigo'] . '/destacado/' .$row['inm_img'])) {
                    ?>
                    <figure>
                        <img src="images/inmuebles/<?php echo $row['inm_codigo'] ?>/destacado/<?php echo $row['inm_img'] ?>"/>
                        <?php
                        } else{
                        ?>
                        <figure class="no-foto">
                            <img src="imgs/No-foto.png"/>
                            <?php
                            }
                            ?>
                            <div class="labelVerInmueble">
                                <p>VER INMUEBLE</p>
                            </div>
                        </figure>

                        <div class="detalles">
                            <p>Para <?php echo $negocio_string; ?>, <?php echo $tipo_inmueble; ?> </p>
                            <p>En <?php echo $ciudad; ?>, <?php echo $rowUbicacion['zon_nombre']; ?></p>
                            <?php
                            if ( $row['inm_alcobas']==1){
                                $stringHabitacion = "habitación";
                            }else {
                                $stringHabitacion = "habitaciones";
                            }

                            if ( $row['inm_banos']==1){
                                $stringBanos = "Baño";
                            }else {
                                $stringBanos = "Baños";
                            }
                            ?>
                            <p><?php echo $row['inm_area']; ?> m2, <?php echo $row['inm_alcobas']; echo " "; echo $stringHabitacion?>, <?php echo $row['inm_banos']; echo " "; echo $stringBanos;?></p>
                            <p class="inmueble_id"> <?php echo $row['inm_id']; ?></p>

                            <div class="divPrice">
                                <p class="pPrice">$ <?php echo $format_price; ?> </p>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </a>
<?php
}

?>


<script type="text/javascript">
    $(".iframe").colorbox({iframe:true, width:"90%", height:"95%", fixed:true});
</script>
<script type="text/javascript" src="js/script.js"></script>