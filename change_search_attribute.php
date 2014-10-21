<?php
include('db.php');
//Se asignan las variables de php obteniendolas por el metodo POST enviadas desde script.js por Ajax
$tipo_negocio = $_POST['negocio'];
$tipo_inmueble = $_POST['tipo'];
$ubicacion = $_POST['ubicacion'];
$parametro = $_POST['parametro'];

if($parametro==1)
{
    $query="SELECT inm_tipo FROM inmueble WHERE inm_negocio= " . $tipo_negocio . " GROUP BY inm_tipo";
    $fetch = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($fetch)) {
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

        ?>
        <option value="<?php echo $tipo_inmueble?>"><?php echo $tipo_inmueble?></option>
    <?php
}
    }
elseif($parametro == 2)
{
    $queryzona="SELECT inm_zon_id FROM inmueble WHERE inm_negocio= " . $tipo_negocio . " GROUP BY inm_zon_id";
    $fetchzona = mysqli_query($conn, $queryzona);


    while($row = mysqli_fetch_array($fetchzona)) {
        //$queryUbicacion = "SELECT zon_nombre FROM zonas WHERE zon_id='" . $row['inm_zon_id'] . "'";
        //$fetchUbicacion = mysqli_query($conn, $queryUbicacion);
        //$rowUbicacion = mysqli_fetch_array($fetchUbicacion);
        //$ubicacion = $rowUbicacion['zon_nombre'];
        if (strlen($row['inm_zon_id'])>0)
        {
            ?>
            <option value="<?php echo $row['inm_zon_id'] ?>"><?php echo $row['inm_zon_id'] ?></option>
        <?php
        }
    }
}
    ?>