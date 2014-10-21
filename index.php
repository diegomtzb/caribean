<?php
include('db.php');
$query="SELECT inm_tipo FROM inmueble WHERE inm_negocio=2 GROUP BY inm_tipo";
$fetch = mysqli_query($conn, $query);

$queryzona="SELECT inm_zon_id FROM inmueble WHERE inm_negocio=2 GROUP BY inm_tipo";
$fetchzona = mysqli_query($conn, $queryzona);


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
    <link rel="stylesheet" href="css/responsivemobilemenu.css" type="text/css"/>


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-47464037-5', 'auto');
        ga('send', 'pageview');

    </script>


</head>
<body id="page-home">
<header class="header fixed">
    <div class="container">
        <figure id="mainLogo" class="pull-left"><img src="imgs/logo.png"/>
            <figcaption>Caribean Service</figcaption>
        </figure>
        <ul id="menuprincipal" class="nav nav-pills pull-right">
            <li class="active"><a href="#">INICIO</a></li>
            <li><a href="inmobiliaria.html">INMOBILIARIA</a></li>
            <!--li: a(href='servicios.html') SERVICIOS-->
            <li><a href="grupoempresarial.html">GRUPO EMPRESARIAL</a></li>
            <li><a href="contacto.html">CONTACTO</a></li>
        </ul>
        <div id="mobilemenu" class="rmm rmm-home" data-menu-style = "mystyle">
            <ul>
                <li><a href="#">INICIO</a></li>
                <li><a href="inmobiliaria.html">INMOBILIARIA</a></li>
                <li><a href="grupoempresarial.html">GRUPO EMPRESARIA</a></li>
                <li><a href="contacto.html">CONTACTO</a></li>
            </ul>
        </div>

    </div>
</header>
<div class="container">
    <main class="main-index">
        <section id="section-main">
            <div id="alignText"><h2>LE ASESORAMOS DONDE REALIZAR <span><br> SU MEJOR INVERSIÓN</span></h2></div>
            <div id="busqueda"><h3>BUSQUE SU INMUEBLE</h3>

                <div class="spaceBar"></div>
                <div id="criterios1">
                    <div id="ventas" class="active checkTrue" onclick="CheckActive(2);"><span>Ventas</span><!--Asi debe aparecer en la base de datos--><label>VENTA</label>
                    </div>
                    <div id="arriendos" class="checkTrue" onclick="CheckActive(3);"><span>Arriendos</span><!--Asi debe aparecer en la base de datos--><label>ARRIENDO</label>
                    </div>
                    <div id="tipo-inmueble">
                        <select onChange="javascript:tipoInmuebleHasChanged();">
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
                    <div id="ubicacion">
                        <select onChange="javascript:ubicacionHasChanged();">
                            <option value="" disabled="disabled" selected="selected">Ubicación</option>
                            <?php
                            while($row = mysqli_fetch_array($fetchzona)) {
                                $queryUbicacion = "SELECT zon_nombre FROM zonas WHERE zon_id='" . $row['inm_zon_id'] . "'";
                                $fetchUbicacion = mysqli_query($conn, $queryUbicacion);
                                $rowUbicacion = mysqli_fetch_array($fetchUbicacion);
                                $ubicacion = $rowUbicacion['zon_nombre'];
                                if (strlen($ubicacion)>0)
                                {

                            ?>
                                    <option value="<?php echo $ubicacion?>"><?php echo $ubicacion?></option>
                            <?php
                                }
                            }
                            ?>


                            <!--<option value="Manga">Manga</option>
                            <option value="Bocagrande">Bocagrande</option>
                            <option value="Pie de la Popa">Pie de la Popa</option>
                            <option value="Bosque">Bosque</option>
                            <option value="Ternera">Ternera</option>-->
                        </select>
                    </div>
                    <div id="buscar"><span>Buscar</span></div>
                </div>
            </div>
            <div id="busquedaCodigo">
                <div id="codigo">
                    <div class="surroundcodigo">
                        <input type="text" placeholder="Buscar por código" name="codigo"/>
                        <span class="hovercodigo"></span>
                    </div>



                    <p>Todos nuestros inmuebles tienen un código que los identifica,
                        de esta manera facilitamos la búsqueda

                    </p>
                </div>


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
            remate de bienes y oportunidades de inversión.</p>

        <form id="suscription_form" name="suscribe_form" action="html_form_suscribe.php">
            <input id="suscribe_email" type="email" placeholder="ejemplo@email.com" name="suscribe" required="required"/>
            <input class="botonSuscribir" type="submit" value="Suscribirse" >

        </form>
    </div>
    <figure class="social">
        <div>
            <a href="http://www.facebook.com/caribeanservice" target="_blank">
                <img src="imgs/Facebook-rojo.png"/>
                <p>caribeanservice</p>
            </a>
        </div>

        <div>
            <a href="http://www.twitter.com/caribean_serv" target="_blank">
                <img src="imgs/Twitter-rojo.png"/>
                <p>@caribean_ser</p>
            </a>
        </div>

        <div>
            <a href="#">
                <img src="imgs/Instagram-rojo.png"/>
                <p>caribean</p>
            </a>
        </div>

    </figure>
</section>
<footer class="absolutePosition noneDisplay">
    <p>Centro, Sector La Matuna Edificio Banco Cafetero Oficina 703 -704 - 705, Cartagena - Colombia</p>
    <div></div>
    <p>(5)668 70 64 - (5) 660 52 05</p>
    <div></div>
    <p>*Diseño Web: Ludico</p>
    <div></div>

    <figure class="footer-logo">
        <p>Somos una empresa miembro de</p><img src="imgs/logo_footer.png"/>
    </figure>
</footer>





</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="colorbox.css">
<script src="jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/responsivemobilemenu.js"></script>
</html>