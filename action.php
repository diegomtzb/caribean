<?php
include('db.php');
//$check = mysqli_query($conn,"SELECT * FROM inmobiliaria");

$all_data = array();

//Se asignan las ariables de php obteniendolas por el metodo POST enviadas desde script.js por Ajax
$tipo_negocio = $_POST['negocio'];
$tipo_inmueble = $_POST['tipo'];
$ubicacion = $_POST['ubicacion'];


$query="SELECT * FROM inmueble WHERE ";

if ($tipo_negocio == "VENTA") {
    $tipo_negocio=intval(2);
} elseif ($tipo_negocio == "ARRIENDO") {
    $tipo_negocio=intval(3);
}



if ( $tipo_inmueble == "Apartamento") {
    $tipo_inmueble=2;
} elseif (  $tipo_inmueble == "Casa") {
    $tipo_inmueble=3;
} elseif ( $tipo_inmueble == "Bodega") {
    $tipo_inmueble=7;
} elseif (  $tipo_inmueble == "Local") {
    $tipo_inmueble=6;
} elseif (  $tipo_inmueble == "Proyecto") {
    $tipo_inmueble=1;
} elseif ( $tipo_inmueble == "Edificio") {
    $tipo_inmueble=4;
} elseif (  $tipo_inmueble == "Finca") {
    $tipo_inmueble=9;
} elseif ( $tipo_inmueble == "Garaje") {
    $tipo_inmueble=10;
} elseif (  $tipo_inmueble == "Lote") {
    $tipo_inmueble=8;
} elseif (  $tipo_inmueble == "Oficina") {
    $tipo_inmueble=5;
}

//$tipo_negocio debe venir siempre o venta o arriendo pero nunca vacio
$query=$query . "inm_negocio='" . $tipo_negocio . "'";

//print_r($query);




//Las siguientes variables se asignan opcionalmente por el usuario
if(strlen($ubicacion)>0)
{
    $queryUbicacion = "SELECT * FROM zonas WHERE zon_nombre='" . $ubicacion . "'" . " and zon_ciu_id=3";
    $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
    $rowUbicacion = mysqli_fetch_array($fetchUbicacion);
    $query=$query . " and inm_zon_id='" . $rowUbicacion['zon_id'] . "'";
}

if(strlen($tipo_inmueble)>0)
{
    $query=$query ."and inm_tipo='" . $tipo_inmueble ."'" ;
}

$query = $query .  "LIMIT 0,12";

//$fetch= mysqli_query($conn,"SELECT * FROM inmobiliaria WHERE tipoInmueble='" . $tipo_inmueble ."'" );
$fetch= mysqli_query($conn, $query);
?>

<?php
while($row = mysqli_fetch_array($fetch)) {
    $all_data[] = $row;

    if ( $row['inm_valor'] == "") {
        $format_price=0;
    } else  {
        $format_price =  number_format($row['inm_valor']);
    }



    $tipo_inmueble="INMUEBLE";
    if ( $row['inm_tipo'] == 1) {
        $tipo_inmueble="PROYECTO";
    } elseif ( $row['inm_tipo'] == 2) {
        $tipo_inmueble="APARTAMENTO";
    } elseif ( $row['inm_tipo'] == 3) {
        $tipo_inmueble="CASA";
    } elseif ( $row['inm_tipo'] == 4) {
        $tipo_inmueble="EDIFICIO";
    } elseif ( $row['inm_tipo'] == 5) {
        $tipo_inmueble="OFICINA";
    } elseif ( $row['inm_tipo'] == 6) {
        $tipo_inmueble="LOCAL";
    } elseif ( $row['inm_tipo'] == 7) {
        $tipo_inmueble="BODEGA";
    } elseif ( $row['inm_tipo'] == 8) {
        $tipo_inmueble="LOTE";
    } elseif ( $row['inm_tipo'] == 9) {
        $tipo_inmueble="FINCA";
    } elseif ( $row['inm_tipo'] == 10) {
        $tipo_inmueble="GARAJE";
    }

    $ciudad="CIUDAD";
    if ( $row['inm_ciu_id'] == 2) {
        $ciudad="CARTAGENA";
    } elseif ($row['inm_ciu_id'] == 3) {
        $ciudad="BARRANQUILLA";
    }
    $ciudad="CARTAGENA";

    ?>
    <a class="iframe" href="single_imagenes.php?id=<?php echo $row['inm_id']; ?>">
        <div class="search_result col-md-4">
            <div class="result_info">
                <p class="pTipoInmuble"> <?php echo $tipo_inmueble; ?> </p>
                <p><?php echo $ciudad; ?>, <?php echo $row['inm_zon_id']; ?></p>
                <p><?php echo $row['inm_area']; ?> m2 - <?php echo $row['inm_alcobas']; ?> habitacion(es)</p>
                <p class="pPrice">$ <?php echo $format_price; ?> </p>
                <p class="inmueble_id"> <?php echo $row['inm_id']; ?></p>
            </div>
            <figure>
                <?php
                if (file_exists('images/inmuebles/' .$row['inm_id'] . '/destacado/' .$row['inm_img'])) {
                    ?>
                    <img src="images/inmuebles/<?php echo $row['inm_id'] ?>/destacado/<?php echo $row['inm_img'] ?>"/>
                <?php
                } else{
                ?>
                    <img src="imgs/No-foto.jpg"/>
                <?php
                }
                ?>
            </figure>
        </div>
    </a>
<?php
}
//print_r($all_data);
?>

<script type="text/javascript">
    $(".iframe").colorbox({iframe:true, width:"90%", height:"95%", fixed:true});
</script>