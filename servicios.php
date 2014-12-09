<?php $page = 'inmobiliaria'; ?>

<!DOCTYPE html5>
<html>
<head>
    <?php include("head.html"); ?>
</head>
<body id="page-nosotros">
<header class="header fixed">

    <!-- Header -->
    <?php include("header.html"); ?>

    <!-- Menu -->
    <?php include("menu.php"); ?>

    <div id = "menuInmobiliaria">
        <ul class="nav nav-pills navwidth604">
            <li><a class="padding25" href="inmobiliaria2.php">VENTAS</a></li>
            <li><a class="padding25" href="inmobiliaria2.php">ARRIENDOS</a></li>
            <li class="active"><a class="padding25" href="servicios.php">SERVICIOS</a></li>
        </ul>
    </div>
</header>
<main>
    <div class="container">
        <section id="inmobiliaria-mainsection">
            <div>
                <h2>
                    Somos una empresa especializada en el sector de
                    gestión inmobiliria <br><span>Ventas, arriendos, avalúos,
                    administración de propiedad horizontal y
                    gerenciamiento de ventas de nuevos proyectos
                    inmobiliarios.</span>
                </h2>
            </div>
        </section>
    </div>

    <section id="nuestrosServicios">
        <div id="titulo">
            <div class="container"><h3>NUESTROS SERVICIOS</h3></div>
        </div>
        <div id="contenido">
            <div class="container">
                <div class="col-sm-6">
                    <figure><img src="imgs/Boton-Finca.png" class="showservices fincaser"/></figure>
                    <div class="texto"><h2>FINCA RAÍZ</h2>

                        <p>Servicios en el sector inmobiliario</p><label>fincaraiz</label></div>
                </div>
                <div class="col-sm-6">
                    <figure><img src="imgs/Boton-Geren.png" class="showservices gerenser"/></figure>
                    <div class="texto"><h2>GERENCIA DE PROYECTOS</h2>

                        <p>Gerencia de proyectos y administración de propiedad horizontal</p>
                        <label>gerenciadeproyectos</label></div>
                </div>
            </div>
        </div>
        <div id="fincaraiz" class="fincaraiz-gerenciadeproyectos">
            <div class="container"><h1>FINCA RAÍZ</h1>
                <ul>
                    <li class="showhide"><a href="#">Ventas</a>

                        <p>Le asesoramos profesionalmente en el proceso
                            de compra y venta de sus inmuebles.</p></li>
                    <li class="showhide"><a href="#">Arriendos</a>

                        <p>Le asesoramos profesionalmente en la gestión
                            del arriendo seguro de su inmueble y a su vez le
                            presentamos un portafolio de alternativas que se
                            ajusten a sus necesidades y gustos.</p></li>
                    <li class="showhide"><a href="#">Avaluos</a>

                        <p>Determinamos el valor real de su propiedad,
                            con la experiencia de avaluadores miembros
                            de la lonja de propiedad horizontal.</p></li>
                    <li class="showhide"><a href="#">Asistencia <span>jurídica</span></a>

                        <p>Nos encargamos profesionalmente de todos los
                            procesos legales de sus propiedades, con la representación
                            del departamento jurídico de nuestra
                            empresa.</p></li>
                    <li class="showhide"><a href="#">Suseción <span>de bienes</span></a>

                        <p>Atendemos todo lo concerniente a los tramites de
                            los derechos herenciales de sus propiedades con
                            un excelente acompañamiento de nuestra area
                            jurídica</p></li>
                    <li class="showhide"><a href="#">Desenglobe <span>de bienes</span></a>

                        <p>Le asesoramos en el proceso de independizar su
                            propiedad, subdividiendolo en uno o mas inmuebles.</p></li>
                    <li class="showhide"><a href="#">Asesoría <span>en crédito</span> hipotecario</a>

                        <p>Contamos con las herramientas, la asistencia y los
                            medios necesarios para facilitar la obtención de
                            su crédito en muchas de las entidades bancarias.</p></li>
                </ul>
                <div class="contacto"><a href="contacto.php"><p>CONTÁCTANOS</p></a></div>
                <img src="imgs/Foto-FincaR.png"/></div>
        </div>
        <div id="gerenciadeproyectos" class="fincaraiz-gerenciadeproyectos">
            <div class="container"><h1>GERENCIA DE PROYECTOS</h1>
                <ul>
                    <li class="showhide"><a href="#">Gerencia de <span>proyectos inmobiliarios</span></a>

                        <p>- Lo conectamos desde el inicio con los predios de su interés y fácil
                            comercialización para que su proyecto sea exitoso.</p>

                        <p>- Organizamos y gestionamos planes estratégicos de mercadeo ajustados a
                            sus necesidades y expectativas.</p>

                        <p>- Diseñamos website y construimos redes sociales de acuerdo a la imagen
                            corporativa.</p>

                        <p>- Contamos con alianzas comerciales en las principales ciudades del país
                            para la promoción exitosa de proyectos.</p>

                        <p>- Organizamos ferias y lanzamientos haciendo participes a los clientes que
                            conforman nuestra base de datos.</p></li>
                    <li class="showhide"><a href="#">Gerencia de <span>proyectos viviendas VIS y VIP</span></a>

                        <p>Soluciones en viviendas de interés social y de interés prioritario.</p></li>
                    <li class="showhide"><a href="#">Administración
                            <pan>de propiedad horizontal</span>
                        </a>

                        <p>Generamos solución integral en la administración de edificios, conjuntos
                            residenciales y multifamiliares, brindándoles un portafolio completo de
                            servicios, tales como: administración, contabilidad, revisoría fiscal, suministro
                            de personal para vigilancia, mantenimiento, aseo, jardinería, oficios
                            varios, circuito cerrado de tv, etc.
                            Adicionalmente mantenimiento general a ventanería y fachada con
                            lavado y pintura.</p></li>
                </ul>
                <div class="contacto"><a href="contacto.php"><p>CONTÁCTANOS</p></a></div>
                <img src="imgs/Foto-Gerencia.png"/></div>
        </div>
        <!--div#asesorp.
            Le asesoramos en: Bogotá, Cali, Medellín, Barranquilla,
            Cartagena, Santa Marta y Bucaramanga.


            --></section>
</main>
<footer class="absolutePosition"><p>Centro, Sector La Matuna Edificio Banco Cafetero Oficina 703 -704 - 705, Cartagena -
        Colombia</p>

    <div></div>
    <p>(5)668 70 64 - (5) 660 52 05</p>

    <div></div>
    <p>*Diseño Web: Ludico</p>
    <figure class="footer-logo"><p>Somos una empresa miembro de</p><img src="imgs/logo_footer.png"/></figure>
</footer>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/responsivemobilemenu.js"></script>
</html>