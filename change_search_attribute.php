<?php
include('db.php');

//Se asignan las variables de php obteniendolas por el metodo POST enviadas desde script.js por Ajax
$tipo_negocio = $_POST['negocio'];
$tipo_inmueble = $_POST['tipo'];
$ubicacion = $_POST['ubicacion'];
$parametro = $_POST['parametro'];

if (isset($_POST['negocio'])) {
    $negocio = $_POST['negocio'];
    //2 venta, 3 arriendo
}

if (isset($_POST['tipo'])) {
    $tipo_inmueble = $_POST['tipo'];
}

if (isset($_POST['ubicacion'])) {
    $ubicacion = $_POST['ubicacion'];
}

if (isset($_POST['parametro'])) {
    $parametro = $_POST['parametro'];
}

if($parametro==1)
{
    $query="SELECT inmueble.inm_tipo, tipos_inmueble.tipo_nombre
            FROM inmueble,tipos_inmueble
            WHERE inm_negocio= " . $tipo_negocio .
                  " AND inmueble.inm_tipo = tipos_inmueble.tipo_inm_id
            GROUP BY inm_tipo";
    $fetch = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($fetch)) {


        ?>
        <option value="<?php echo $row['inm_tipo'] ?>"><?php echo $row['tipo_nombre']?></option>
    <?php
    }
}
elseif($parametro == 2)
{
    echo "Tipo negocio $tipo_negocio";
    $queryzona="SELECT inmueble.inm_zon_id, zonas.zon_nombre
            FROM inmueble,zonas
            WHERE inmueble.inm_negocio = " . $tipo_negocio .
                  " AND inmueble.inm_zon_id = zonas.zon_id";
    if(strlen($tipo_inmueble)>0)
    {
        $queryzona = $queryzona . " AND inm_tipo = " . $tipo_inmueble;

    }
    $queryzona = $queryzona . " GROUP BY inmueble.inm_zon_id";

    $fetchzona = mysqli_query($conn, $queryzona);

    while($row = mysqli_fetch_array($fetchzona)) {
        $ubicacion = $row['zon_nombre'];
        if (strlen($ubicacion)>0)
        {
            ?>
            <option value="<?php echo utf8_encode($ubicacion) ?>"><?php echo utf8_encode($ubicacion) ?></option>
        <?php
        }
    }
}
    ?>