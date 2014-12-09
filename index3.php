<?php $page = 'index'; ?>

<!DOCTYPE html5>
<html>
<head>
<?php include("head.html"); ?>
</head>
<body id="page-home">
<header class="header fixed">
    <!-- Header -->
    <?php include("header.html"); ?>

    <!-- Menu -->
    <?php include("menu.php"); ?>
</header>

<div class="container">
    <main class="main-index">
        <section id="section-main">
            <div id="alignText">
                <h2>LE ASESORAMOS PARA QUE REALICE <span><br> SU MEJOR INVERSIÓN</span></h2>
            </div>

            <!-- Destacado y busqueda -->
            <div class="row destbusq">
                <div class="col-md-6 patchstyle">
                    <div class="destacado">
                        <a href="#">
                            <figure class="figure-destacado">
                                <img src="imgs/SALA_Playa-mod.png">
                            </figure>

                            <div class="labelVerInmueble">
                                <p>Para Arriendo, Apartamento En Cartagena, Bocagrande
                                    120m2, 3 habitaciones, 2 baños</p>
                            </div>
                            <div class="labelVerInmuebleMas">
                                <p>Ver más</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 patchstyle">
                    <div class="busq">
                        <h3>BUSQUE SU INMUEBLE</h3>
                        <hr>

                        <div id="controllers">
                            <div id="ventas" class="active checkTrue" onclick="CheckActive(this, 2);">
                                <span>Ventas</span>
                                <label>VENTA</label><!--Asi debe aparecer en la base de datos-->
                            </div>

                            <div id="arriendos" class="checkTrue" onclick="CheckActive(this, 3);">
                                <span>Arriendos</span>
                                <label>ARRIENDO</label><!--Asi debe aparecer en la base de datos-->
                            </div>

                            <div id="tipo-inmueble">
                                <select onChange="javascript:tipoInmuebleHasChanged();">
                                    <option value="" disabled="disabled" selected="selected">Tipo de inmueble</option>
                                </select>
                            </div>

                            <div id="ubicacion">
                                <select onChange="javascript:ubicacionHasChanged();">
                                    <option value="" disabled="disabled" selected="selected">Ubicación</option>
                                </select>
                            </div>

                            <div id="price">
                                <select onChange="javascript:priceHasChanged();">
                                    <option value="" disabled="disabled" selected="selected">Precio</option>
                                </select>
                            </div>

                            <div id="buscar">
                                <span>Buscar</span>
                            </div>
                        </div>

                        <hr>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <p class="busqCodigo">Todos nuestros inmuebles tienen un código que los identifica, de esta manera facilitamos la búsqueda</p>
                            </div>

                            <div class="col-xs-6">
                                <div class="surroundcodigo">
                                    <input type="text" placeholder="Buscar por código" name="codigo"/>
                                    <span class="hovercodigo"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<hr>

<section class="aboutus">
    <div class="container">
        <h3>¿QUIENES SOMOS?</h3>
    </div>

    <div class="somos">
        <div class="container">
            <p>Somos un grupo especializado en Gestión Inmobiliaria y Gestión de Cartera,
                enfocado en brindar atención personalizada a cada uno de nuestros clientes
                orientándolos a realizar su mejor inversión satisfaciendo sus necesidades
                y espectativas.</p>
        </div>
    </div>

    <!-- Grupo -->
    <div class="row grupo">
        <div class="col-sm-12">
            <div class="col-sm-6 inmoPadding">
                <div class="inmobiliaria">
                    <div class="myContainer">
                        <figure>
                            <img src="imgs/logo-C-Service.png"/>
                        </figure>
                    </div>

                    <div class="desc">
                        <div class="myContainer">
                            <p>Servicios en el sector inmobiliario, gerencia de
                                proyectos y administración de propiedad horizontal.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 recuPadding">
                <div class="recuperacion">
                    <div class="myContainer">
                        <figure>
                            <img src="imgs/logo-C-Solutions.png"/>
                        </figure>
                    </div>

                    <div class="desc">
                        <div class="myContainer">
                            <p>Soluciones integrales en procesos de recuperación
                                de cartera y sus prejuridica y juridica.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <footer>
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
</section>

</body>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="colorbox.css">
<script src="jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/responsivemobilemenu.js"></script>

<!--Se llama para cargar la informacion inicial de las busquedas-->
<script>
    gotoChangeSearchAttributeFromNegocio(2);
</script>
</html>