<?php

include('db.php');
//$check = mysqli_query($conn,"SELECT * FROM inmobiliaria");

$all_data = array();

//Se asignan las variables de php obteniendolas por el metodo POST enviadas desde script.js por Ajax
$tipo_negocio = $_POST['negocio'];
$tipo_negocio_num = 0;
$tipo_inmueble = $_POST['tipo'];
$tipo_inmueble_val = $_POST['tipo_val'];
$ubicacion = $_POST['ubicacion'];






$query="SELECT * FROM inmueble WHERE ";

if ($tipo_negocio == "VENTA") {
    $tipo_negocio_num=intval(2);
} elseif ($tipo_negocio == "ARRIENDO") {
    $tipo_negocio_num=intval(3);
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
    $query=$query ."and inm_tipo='" . $tipo_inmueble ."'" ;
}




//Variables para la paginación
$pagi = 0;
if (isset($_POST['pagi']))
{
    $pagi = $_POST['pagi'];
}
$contar_pagi = (strlen($pagi));    // Contamos el numero de caracteres

// Numero de registros por pagina
$numer_reg = 12;

// Contamos los registros totales
//$query0 = "select * from inmueble";     // Esta linea hace la consulta
//$result0 = mysqli_query($conn,$query0);
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
    //$pag_anterior = "<a href='resultados.php?pagi=$prim_reg_ant'>Pagina anterior</a>";
    $pag_anterior = "<a href='javascript:void(0)' onclick='linkNextPagi($prim_reg_ant);'>Anterior</a>";

}

// ----------------------------- Pagina siguiente
$prim_reg_sigu = $numer_reg + $pagi;

if ($pagi < $numero_registros0 - ($numer_reg - 1))
{
    //$pag_siguiente = "<a href='action.php?pagi=$prim_reg_sigu'>Pagina siguiente</a>";
    $pag_siguiente = "<a href='javascript:void(0)' onclick='linkNextPagi($prim_reg_sigu);'>Siguiente</a>";

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



INICIO(BORRAR),
Navegcion-><?php echo $pagi_navegacion;?>,
FIN(BORRAR)

<?php
while($row = mysqli_fetch_array($fetch)) {
    $all_data[] = $row;

    if ( $row['inm_valor'] == "") {
        $format_price=0;
    } else  {
        $format_price =  number_format($row['inm_valor']);
    }




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
    $ciudad="Cartagena";


    $queryUbicacion = "SELECT zon_nombre FROM zonas WHERE zon_id='" . $row['inm_zon_id'] . "'";
    $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
    $rowUbicacion = mysqli_fetch_array($fetchUbicacion);



    ?>
    <a class="iframe" href="single_imagenes.php?id=<?php echo $row['inm_id']; ?>">
        <div class="search_result col-lg-4 col-md-6">
            <div class="result_info">
                <div class="divInfo">
                    <div class="tittleapartamento">
                        <p class="pTipoInmuble"> <?php echo $tipo_inmueble; ?>,<?php echo $tipo_negocio; ?> </p>
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
                        <p>Para <?php echo $tipo_negocio; ?>, <?php echo $tipo_inmueble; ?> </p>
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
//print_r($all_data);
?>


<script type="text/javascript">
    $(".iframe").colorbox({iframe:true, width:"90%", height:"95%", fixed:true});
</script>