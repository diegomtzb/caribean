<?php
include('db.php');
//$check = mysqli_query($conn,"SELECT * FROM inmobiliaria");

$all_data = array();

//Se asignan las variables de php obteniendolas por el metodo POST enviadas desde script.js por Ajax
$tipo_negocio = $_POST['negocio'];
$tipo_negocio_num = 0;
$tipo_inmueble = $_POST['tipo'];
$tipo_inmueble_num = 0;
$ubicacion = $_POST['ubicacion'];


$query="SELECT * FROM inmueble WHERE ";

if ($tipo_negocio == "VENTA") {
    $tipo_negocio_num=intval(2);
} elseif ($tipo_negocio == "ARRIENDO") {
    $tipo_negocio_num=intval(3);
}



if ( $tipo_inmueble == "APARTAMENTO") {
    $tipo_inmueble_num=2;
} elseif (  $tipo_inmueble == "CASA") {
    $tipo_inmueble_num=3;
} elseif ( $tipo_inmueble == "BODEGA") {
    $tipo_inmueble_num=7;
} elseif (  $tipo_inmueble == "LOCAL") {
    $tipo_inmueble_num=6;
} elseif (  $tipo_inmueble == "PROYECTO") {
    $tipo_inmueble_num=1;
} elseif ( $tipo_inmueble == "EDIFICIO") {
    $tipo_inmueble_num=4;
} elseif (  $tipo_inmueble == "FINCA") {
    $tipo_inmueble_num=9;
} elseif ( $tipo_inmueble == "GARAJE") {
    $tipo_inmueble_num=10;
} elseif (  $tipo_inmueble == "LOTE") {
    $tipo_inmueble_num=8;
} elseif (  $tipo_inmueble == "OFICINA") {
    $tipo_inmueble_num=5;
}

//$tipo_negocio debe venir siempre o venta o arriendo pero nunca vacio
$query=$query . "inm_negocio='" . $tipo_negocio_num . "'";

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
    $query=$query ."and inm_tipo='" . $tipo_inmueble_num ."'" ;
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



    if ( strlen($tipo_inmueble) == 0 )
    {
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
    }

    $ciudad="CIUDAD";
    if ( $row['inm_ciu_id'] == 2) {
        $ciudad="CARTAGENA";
    } elseif ($row['inm_ciu_id'] == 3) {
        $ciudad="BARRANQUILLA";
    }
    $ciudad="CARTAGENA";


    $queryUbicacion = "SELECT zon_nombre FROM zonas WHERE zon_id='" . $row['inm_zon_id'] . "'";
    $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
    $rowUbicacion = mysqli_fetch_array($fetchUbicacion);



    ?>
    <a class="iframe" href="single_imagenes.php?id=<?php echo $row['inm_id']; ?>">
        <div class="search_result col-lg-4">
            <div class="result_info">
                <div class="divInfo">
                    <p class="pTipoInmuble"> <?php echo $tipo_inmueble; ?> </p>
                    <p class="pTipoNegocio"> <?php echo $tipo_negocio; ?> </p>
                    <p><?php echo $ciudad; ?>, <?php echo $rowUbicacion['zon_nombre']; ?></p>
                    <p><?php echo $row['inm_area']; ?> m2 - <?php echo $row['inm_alcobas']; ?> habitacion(es)</p>
                    <p class="inmueble_id"> <?php echo $row['inm_id']; ?></p>
                </div>

                <div class="divPrice">
                    <p class="pPrice">$ <?php echo $format_price; ?> </p>
                </div>

            </div>
            <figure>
                <?php
                if (file_exists('images/inmuebles/' .$row['inm_codigo'] . '/destacado/' .$row['inm_img'])) {
                    ?>
                    <img src="images/inmuebles/<?php echo $row['inm_codigo'] ?>/destacado/<?php echo $row['inm_img'] ?>"/>
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