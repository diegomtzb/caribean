<?php $page = 'inmobiliaria'; ?>

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

    <div id = "menuInmobiliaria">
            <ul class="nav nav-pills navwidth604">
                <li class="active"><a class="padding25" href="#">VENTAS</a></li>
                <li><a class="padding25" href="#">ARRIENDOS</a></li>
                <li><a class="padding25" href="servicios.php">SERVICIOS</a></li>
            </ul>
    </div>

</header>

<main class="main-inmobiliaria">
    <section id="section-main">
        <div id="busquedaCodigo">
            <div id="codigo">
                <div class="surroundcodigo">
                    <input type="text" placeholder="Buscar por código" name="codigo"/>
                    <span class="hovercodigo"></span>
                </div>
            </div>
        </div>

        <div class="tittlebusqueda">

            <h3>BUSQUE SU INMUEBLE</h3>
            <!--<div class="spaceBar"></div>-->
        </div>

        <div id="busqueda">

            <div id="criterios1">
                <section id="controllers col-lg-12">

                    <div id="ventas" class="active checkTrue" onclick="CheckActive(this, 2);">
                        <span>Ventas</span>
                        <!--Asi debe aparecer en la base de datos-->
                        <label>2</label>
                    </div>

                    <div id="arriendos" class="checkTrue" onclick="CheckActive(this, 3);">
                        <span>Arriendos</span>
                        <!--Asi debe aparecer en la base de datos-->
                        <label>3</label>
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

                    <div id="buscar"  onclick="search_inmuebles()">
                        <span>Buscar</span>
                    </div>
                </section>
            </div>
        </div>

        <!--<div id="busquedaCodigo">
                <div id="codigo">
                    <div class="surroundcodigo">
                        <input type="text" placeholder="Buscar por código" name="codigo"/>
                        <span class="hovercodigo"></span>
                    </div>

                    <p>Todos nuestros inmuebles tienen un código que los identifica,
                        de esta manera facilitamos la búsqueda
                    </p>
                </div>
        </div>-->
    </section>

    <!--Esta seccion se llena mediante la llamada js get_sugeridos() (Al final)-->
    <section id ="sugeridos">
        <div class="inside_me container">
            <h3>SUGERENCIAS</h3>
            <div class="spaceBar"></div>
        </div>
    </section>

    <section id="section-search">
       <!-- <div id="order_by"><select onChange="javascript:orderByHasChanged();">
                <option value="" disabled="disabled" selected="selected">Ordenar por</option>
                <option value="Tipo de inmueble">Tipo de inmueble</option>
                <option value="Ubicacion">Ubicacion</option>
                <option value="Precio">Precio</option>
                <option value="Area">Area</option>
            </select></div>-->

        <div class="paginacionContainer">
            <div class="paginacion">
                <!--<a href="#">Anterior</a>
                <p> Página 0 de 0 </p>
                <a href="#">Siguiente</a>-->
            </div>
        </div>

        <div class="spaceBar"></div>
        <div id="tipo-inmueble"></div>
        <div id="flash"></div>
        <div id="show"></div>
        <div class="container inside_me"></div>
        <div class="spaceBar"></div>

        <div class="paginacion">
            <!--<a href="#">Anterior</a>
            <p> Página 0 de 0 </p>
            <a href="#">Siguiente</a>-->
        </div>
    </section>
</main>


<!-- Footer -->
<?php include("footer.html"); ?>

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="colorbox.css">
<script src="jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/responsivemobilemenu.js"></script>

<!--Se llama para cargar la informacion inicial de las busquedas-->
<script>
    get_sugeridos();
    gotoChangeSearchAttributeFromNegocio(2);
</script>

</html>