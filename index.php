<?php
include('db.php');
$query="SELECT inm_tipo FROM inmueble WHERE inm_negocio=2 GROUP BY inm_tipo";
$fetch = mysqli_query($conn, $query);

?>
<!DOCTYPE html5>
<html>
<head><title>Caribean Service</title>
    <meta charset="utf-8"/>
    <meta name="description"
          content="Somos una empresa especializada en el sector de gestión inmobiliria: Ventas, arriendos, avalúos, administración de propiedad horizontal y gerenciamiento de ventas de nuevos proyectos inmobiliarios."/>
    <meta name="keywords"
          content="Empresarial, Inmobiliaria, Ventas, Arriendos, Avaluos, propiedad horizontal, bienes, proyectos, inmobiliarios"/>
    <meta name="author" content="Caribean Service"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="css/media-queries.css"/>
</head>
<body id="page-home">
<header class="header">
    <div class="container">
        <figure id="mainLogo" class="pull-left"><img src="imgs/logo.png"/>
            <figcaption>Caribean Service</figcaption>
        </figure>
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="#">INICIO</a></li>
            <li><a href="inmobiliaria.html">INMOBILIARIA</a></li>
            <!--li: a(href='servicios.html') SERVICIOS-->
            <li><a href="grupoempresarial.html">GRUPO EMPRESARIAL</a></li>
            <li><a href="contacto.html">CONTACTO</a></li>
        </ul>
    </div>
</header>
<div class="container">
    <main class="main-index">
        <section id="section-main">
            <div id="alignText"><h2>LE ASESORAMOS DONDE REALIZAR <span><br> SU MEJOR INVERSIÓN</span></h2></div>
            <div id="busqueda"><h3>BUSQUE SU INMUEBLE</h3>

                <div class="spaceBar"></div>
                <div id="criterios1">
                    <div id="ventas" class="active checkTrue"><span>Ventas</span><!--Asi debe aparecer en la base de datos--><label>VENTA</label>
                    </div>
                    <div id="arriendos" class="checkTrue"><span>Arriendos</span><!--Asi debe aparecer en la base de datos--><label>ARRIENDO</label>
                    </div>
                    <div id="tipo-inmueble"><select>
                            <option value="" disabled="disabled" selected="selected">Tipo de inmueble</option>
                            <?php
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
                            ?>
                            <!--<option value="Apartamento">Apartamento</option>
                            <option value="Casa">Casa</option>
                            <option value="Bodega">Bodega</option>
                            <option value="Local">Local</option>
                            <option value="Proyecto">Proyecto</option>
                            <option value="Edificio">Edificio</option>
                            <option value="Finca">Finca</option>
                            <option value="Garaje">Garaje</option>
                            <option value="Lote">Lote</option>
                            <option value="Lote">Oficina</option>-->
                        </select></div>
                    <div id="ubicacion"><select>
                            <option value="" disabled="disabled" selected="selected">Ubicación</option>
                            <option value="Manga">Manga</option>
                            <option value="Bocagrande">Bocagrande</option>
                            <option value="Pie de la Popa">Pie de la Popa</option>
                            <option value="Bosque">Bosque</option>
                            <option value="Ternera">Ternera</option>
                        </select></div>
                    <div id="buscar"><span>Buscar</span></div>
                </div>
            </div>
            <div id="busquedaCodigo">
                <div id="codigo"><input type="text" placeholder="Buscar por código" name="codigo"/>

                    <p>Todos nuestros inmuebles tienen un código que los identifica,
                        de esta manera facilitamos la búsqueda

                    </p></div>
                <!--div#criterios2div#nuevo.checkTrue
                    span NUEVO
                    span.icon-checkmark
                div#usado.checkTrue
                    span USADO
                    span.icon-checkmark


                div#codigo
                    input(type="text", placeholder="BUSCAR POR CODIGO", name="codigo")


                    --></div>
        </section>
        <section id="section-search">
            <div id="order_by"><select onChange="javascript:orderByHasChanged();">
                    <option value="" disabled="disabled" selected="selected">Ordenar por</option>
                    <option value="Tipo de inmueble">Tipo de inmueble</option>
                    <option value="Ubicacion">Ubicacion</option>
                    <option value="Precio">Precio</option>
                    <option value="Area">Area</option>
                </select></div>
            <div class="spaceBar"></div>
            <div id="tipo-inmueble"></div>
            <div id="flash"></div>
            <div id="show"></div>
            <div class="spaceBar"></div>
        </section>
    </main>
</div>
<section id="suscripcion">
    <div><p>Recibe en tu correo las ultimas ofertas inmobiliarias,
            remate de bienes y oportunidades de inversión.</p><input type="text" placeholder="ejemplo@email.com"
                                                                     name="suscribe"/>

        <div class="botonSuscribir"><p>Suscribirse</p></div>
    </div>
    <figure class="social">
        <div>
            <img src="imgs/Facebook-rojo.png"/>
            <p>caribeanservice</p>
        </div>

        <div>
            <img src="imgs/Twitter-rojo.png"/>
            <p>@caribean_ser</p>
        </div>

        <div>
            <img src="imgs/Insta-rojo.png"/>
            <p>caribean</p>
        </div>

    </figure>
</section>
<footer class="absolutePosition noneDisplay"><p class="noFloat">Centro, Sector La Matuna Edificio Banco Cafetero Oficina
        703 -704 - 705, Cartagena - Colombia</p>

    <p>(5)668 70 64 - (5) 660 52 05</p>

    <div></div>
    <div></div>
    <p>*Diseño Web: Ludico</p>
    <figure class="footer-logo"><p>Somos una empresa miembro de</p><img src="imgs/logo_footer.png"/></figure>
</footer>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="colorbox.css">
<script src="jquery.colorbox-min.js"></script>
</html>