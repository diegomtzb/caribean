<?php

include('db.php');

$query="SELECT *
        FROM inmueble, sugeridos, tipos_inmueble, zonas
        WHERE inmueble.inm_id = sugeridos.inmuebleid
        AND inmueble.inm_tipo = tipos_inmueble.tipo_inm_id
        AND inmueble.inm_zon_id = zonas.zon_id";
$fetch = mysqli_query($conn, $query);

?>

<?php
while($row = mysqli_fetch_array($fetch))
{
    //if ($row['main']==0)
    //{
        $ciudad="Cartagena";

        if ($row['inm_negocio'] == 2) {
            $tipo_negocio = "Venta";
        } elseif ($row['inm_negocio'] == 2) {
            $tipo_negocio = "Arriendo";
        }

        if ( $row['inm_valor'] == "") {
            $format_price=0;
        } else  {
            $format_price =  number_format($row['inm_valor']);
        }

        //$tipo_negocio = strtolower($tipo_negocio);//Covierte cadena a minuscula
        //$tipo_negocio = ucfirst($tipo_negocio);//convierte primera letra cadena a mayuscula


        ?>

        <a class="iframe" href="single_imagenes.php?id=<?php echo $row['inm_id']; ?>">
            <div class="search_result col-lg-3 col-md-6 col-sm-6">
                <div class="result_info">
                    <div class="divInfo">
                        <div class="tittleapartamento">
                            <p class="pTipoInmuble"> <?php echo $row['tipo_nombre']; ?>, <?php echo $tipo_negocio; ?> </p>
                        </div>

                            <?php
                            if (file_exists('images/inmuebles/' .$row['inm_codigo'] . '/destacado/' .$row['inm_img'])) {
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
                            <p>Para <?php echo $tipo_negocio; ?>, <?php echo  $row['tipo_nombre']; ?> </p>
                            <p>En <?php echo $ciudad; ?>, <?php echo $row['zon_nombre']; ?></p>
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
    //}
}
?>





<script type="text/javascript">
    $(".iframe").colorbox({iframe:true, width:"90%", height:"95%", fixed:true});
</script>
<script type="text/javascript" src="js/script.js"></script>