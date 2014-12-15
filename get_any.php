<?php

include('db.php');

$negocio="";
$inmueble="";
$ubicacion="";
$string_url="";//Para usar en link de paginacion después de ?

//Se asignan las variables de php obteniendolas por el metodo GET enviadas desde script.js por Ajax
if (isset($_GET['negocio'])) {
    $negocio = $_GET['negocio'];
    //2 venta, 3 arriendo
    $string_url = "negocio=$negocio";
}

if ($negocio == 2) {
    $negocio_string="Venta";
} elseif ($negocio == 3) {
    $negocio_string="Arriendo";
}

if (isset($_GET['inmueble'])) {
    $inmueble = $_GET['inmueble'];
}

if (isset($_GET['ubicacion'])) {
    $ubicacion = $_GET['ubicacion'];
}

$query="SELECT * FROM inmueble WHERE ";
//$negocio debe venir siempre o 2 (venta) o 3 (arriendo) pero nunca vacio
$query=$query . "inm_negocio='" . $negocio . "'";

//Las siguientes variables se asignan opcionalmente por el usuario
if(strlen($ubicacion)>0)
{
    $queryUbicacion = "SELECT * FROM zonas WHERE zon_nombre='" . $ubicacion . "'" . " and zon_ciu_id=3";
    $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
    $rowUbicacion = mysqli_fetch_array($fetchUbicacion);
    $query=$query . " and inm_zon_id='" . $rowUbicacion['zon_id'] . "'";
}

if(strlen($inmueble)>0)
{
    $query=$query ."and inm_tipo='" . $inmueble ."'" ;
}

$query=$query . " and inm_ciu_id='3'";


//Variables para la paginación
$pagi = 0;
if (isset($_GET['pagi']))
{
    $pagi = $_GET['pagi'];
}
$contar_pagi = (strlen($pagi));    // Contamos el numero de caracteres

// Numero de registros por pagina
$numer_reg = 12;

$result0= mysqli_query($conn, $query);
$numero_registros0 = mysqli_num_rows($result0);

$pag_anterior = "";
$separador = "";
$pag_siguiente = "";

##############################################
// ----------------------------- Pagina anterior
$prim_reg_an = $numer_reg - $pagi;
$prim_reg_ant = abs($prim_reg_an);        // Tomamos el valor absoluto


if ($pagi <> 0)
{
    $dataString = array('negocio' => $negocio, 'inmueble' => $inmueble, 'ubicacion' => $ubicacion, 'pagi' => $prim_reg_ant);
    $dataString = json_encode($dataString);
    //$pag_anterior = "<a href='resultados.php?pagi=$prim_reg_ant'>Pagina anterior</a>";
    //$pag_anterior = "<a href='javascript:void(0)' onclick='linkNextPagi($prim_reg_ant);'>Anterior</a>";
    $pag_anterior = "<a href='javascript:void(0)' onclick='linkNextPagi($dataString);'>Anterior</a>";

}

// ----------------------------- Pagina siguiente
$prim_reg_sigu = $numer_reg + $pagi;

//$string_url .= "&pagi=$prim_reg_sigu";

if ($pagi < $numero_registros0 - ($numer_reg - 1))
{
    //$pag_siguiente = "<a href='action.php?pagi=$prim_reg_sigu'>Pagina siguiente</a>";
    //$pag_siguiente = "<a href='get_any.php?$string_url'>Pagina siguiente</a>";
    $dataString = array('negocio' => $negocio, 'inmueble' => $inmueble, 'ubicacion' => $ubicacion, 'pagi' => $prim_reg_sigu);
    $dataString = json_encode($dataString);

    $pag_siguiente = "<a href='javascript:void(0)' onclick='linkNextPagi($dataString);'>Siguiente</a>";

}

// ----------------------------- Separador
$pagActual = $pagi/$numer_reg + 1;
$numPaginas = ceil($numero_registros0/$numer_reg);
$separador = "<p>Página $pagActual de $numPaginas</p>";

// Creamos la barra de navegacion

$pagi_navegacion = "$pag_anterior $separador $pag_siguiente";


// -----------------------------
##############################################




//Mostraremos solo los n elementos necesarios
//-----------------------------------------
if ($contar_pagi > 0)
{
// Si recibimos un valor por la variable $page ejecutamos esta consulta

    //$query = "select * from $nombre_tabla LIMIT $pagi,$numer_reg";
    $query = $query .  "LIMIT  $pagi,$numer_reg";
}
else
{
// Si NO recibimos un valor por la variable $page ejecutamos esta consulta

    //$query = "select * from $nombre_tabla LIMIT 0,$numer_reg";
    $query = $query .  "LIMIT  0,$numer_reg";
}
$fetch= mysqli_query($conn, $query);
$numero_registros = mysqli_num_rows($fetch);
//-----------------------------------------

?>



INICIO(BORRAR),*:
Navegcion-><?php echo $pagi_navegacion;?>,*:
FIN(BORRAR)

<?php
while($row = mysqli_fetch_array($fetch)) {

    if ( $row['inm_valor'] == "") {
        $format_price=0;
    } else  {
        $format_price =  number_format($row['inm_valor']);
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