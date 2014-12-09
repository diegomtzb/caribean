<?php $page = 'contacto'; ?>
<!DOCTYPE html5>
<html>
<head>
    <?php include("head.html"); ?>
</head>
<body id="page-contacto">
<header class="header fixed">

    <!-- Header -->
    <?php include("header.html"); ?>

    <!-- Menu -->
    <?php include("menu.php"); ?>

</header>

<main>
    <section id="contacto-mainsection">
        <div id="blueRGBAColor">
            <div class="container">
                <div id="info-contacto" class="col-md-5"><h3>CONTÁCTANOS
                    <br><span>Estaremos felices de poder asesorarte</span></h3>
                    <ul class="col-lg-5">
                        <li class="titleContact">Teléfonos:</li>
                        <li>(5) 668 70 64</li>
                        <li>(5) 660 52 05</li>
                    </ul>
                    <ul class="col-lg-7">
                        <li class="titleContact">Email:</li>
                        <li>direccioncomercial@caribeanservice.com</li>
                    </ul>
                    <ul class="col-sm-12">
                        <li class="titleContact">Dirección:</li>
                        <li>Centro, Sector La Matuna Edificio Banco Cafetero</li>
                        <li>Oficina 703 -704 - 705</li>
                        <li class="italic">Cartagena - Colombia</li>
                    </ul>
                </div>
                <div id="campos-contacto" class="col-md-7">
                    <form name="htmlform" method="post" action="html_form_send.php"><select required="required"
                                                                                            name="interes">
                        <!--Check if value="" rquired!!!-->
                        <option value="" disabled="disabled" selected="selected" required="required">Usted está
                            interesado en:
                        </option>
                        <option value="Vender su inmueble">Vender su inmueble</option>
                        <option value="Arrendar su inmueble">Arrendar su inmueble</option>
                        <option value="Servicio de avaluos">Servicio de avaluos</option>
                        <option value="Gerencia de proyectos">Gerencia de proyectos</option>
                        <option value="Servicio de callcenter">Servicio de callcenter</option>
                        <option value="Vender su cartera">Vender su cartera</option>
                    </select><input type="text" placeholder="Nombre" name="name" required="required"/><input
                            type="email" placeholder="E-mail" name="email" required="required"/><textarea
                            placeholder="Mensaje" name="message" required="required"></textarea><input type="submit"
                                                                                                       value="Enviar"/>
                    </form>
                </div>
            </div>
        </div>
    </section>
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