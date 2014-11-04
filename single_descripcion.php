<?php
include('db.php');

$id= $_GET['id'];

//$query = mysqli_query($conn,"SELECT * FROM inmobiliaria");
//$fetch= mysqli_query($conn, $query);
$fetch = mysqli_query($conn,"SELECT * FROM inmueble WHERE inm_id=" . $id);
$row = mysqli_fetch_array($fetch);


/*<?php echo $row['tipoInmueble']?>*/

?>

<!DOCTYPE html5>
<html>
<head><title>Single - Caribean Service</title>
    <meta charset="utf-8"/>
    <meta name="description"
          content="Single - Somos una empresa especializada en el sector de gestión inmobiliria: Ventas, arriendos, avalúos, administración de propiedad horizontal y gerenciamiento de ventas de nuevos proyectos inmobiliarios."/>
    <meta name="keywords"
          content="Empresarial, Inmobiliaria, Ventas, Arriendos, Avaluos, propiedad horizontal, bienes, proyectos, inmobiliarios"/>
    <meta name="author" content="Caribean service"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="css/media-queries.css"/>
</head>
<body id="page-single_imagenes">
<header class="header">
    <div class="container">
        <ul class="nav nav-pills pull-left">
            <li><a href="single_imagenes.php?id=<?php echo $id; ?>">IMÁGENES</a></li>
            <li class="active"><a href="#">DESCRIPCIÓN</a></li>
        </ul>
        <div id="single-info"><p>Apartamento en Cartagena</p>

            <p>Para Arriendo</p>

            <p>Bocargande</p>

            <p>120m2</p>

            <p>3 habitaciones</p>

            <p>2 baños</p>

            <p class="precio">$ 2,500,000</p></div>
    </div>
</header>
<div class="container">
    <div id="contenido-single" class="col-sm-6"><h2>Cod. C16281</h2>

        <div id="mainDescripcion">
            <div><h4 class="col-lg-7">CIUDAD</h4>

                <p class="col-lg-3">Cartagena</p></div>
            <div><h4 class="col-lg-7">BARRIO</h4>

                <p class="col-lg-3">Bocagrande</p></div>
            <div><h4 class="col-lg-7">TIPO DE INMUEBLE</h4>

                <p class="col-lg-3">Apartamento</p></div>
            <div><h4 class="col-lg-7">ESTRATO</h4>

                <p class="col-lg-3">6</p></div>
            <div><h4 class="col-lg-7">HABITACIONES</h4>

                <p class="col-lg-3">2</p></div>
            <div><h4 class="col-lg-7">BAÑOS</h4>

                <p class="col-lg-3">3</p></div>
            <div><h4 class="col-lg-7">AREA</h4>

                <p class="col-lg-3">105 m2</p></div>
        </div>

    </div>
    <h3>OTRAS CARACTERISTICAS: <span>Area De Labores, Cocina Semintegral, Comedor, Sala</span></h3></div>
<div id="footer-single">
    <div class="container">
        <figure id="logo-single"><img src="imgs/logo-single.png"/></figure>
    </div>
</div>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</html>