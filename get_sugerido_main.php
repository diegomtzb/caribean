<?php

include('db.php');

$query="SELECT *
        FROM inmueble, sugeridos, tipos_inmueble, zonas
        WHERE inmueble.inm_id = sugeridos.inmuebleid
        AND inmueble.inm_tipo = tipos_inmueble.tipo_inm_id
        AND inmueble.inm_zon_id = zonas.zon_id
        AND sugeridos.main=1";
$fetch = mysqli_query($conn, $query);

?>

<?php
while($row = mysqli_fetch_array($fetch))
{
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

    <a class="iframe" href="single_imagenes.php?id=<?php echo $row['inm_id']; ?>">
        <?php
        if (file_exists('images/inmuebles/' .$row['inm_codigo'] . '/lightbox/' .$row['inm_img'])) {
        ?>
            <figure class="figure-destacado">
                <img src="images/inmuebles/<?php echo $row['inm_codigo'] ?>/lightbox/<?php echo $row['inm_img'] ?>"/>
        <?php
        } else{
        ?>
            <figure class="figure-destacado no-foto">
                <img src="imgs/No-foto.png"/>
        <?php
        }
        ?>
            </figure>

        <div class="labelVerInmueble">
            <p>Para <?php echo $tipo_negocio; ?>, <?php echo $row["tipo_nombre"]; ?> En <?php echo $ciudad; ?>, <?php echo $row["zon_nombre"]; ?>
                <?php echo $row["inm_area"]; ?>m2, <?php echo $row["inm_alcobas"] . " " . $stringHabitacion; ?>, <?php echo $row["inm_banos"] . " " . $stringBanos; ?></p>
        </div>
        <div class="labelVerInmuebleMas">
            <p>Ver más</p>
        </div>
    </a>



<?php
}
?>





<script type="text/javascript">
    $(".iframe").colorbox({iframe:true, width:"90%", height:"95%", fixed:true});
</script>
<script type="text/javascript" src="js/script.js"></script>