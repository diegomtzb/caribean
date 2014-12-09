<?php if ($page == 'inmobiliaria') { ?>
<div id = "menuHeaderInmo">
<?php } else { ?>
<div id = "menuHeader">
<?php } ?>
    <div class="container">
        <ul id="menuprincipal" class="nav nav-pills navwidth810">
            <?php if ($page == 'index') { ?>
                <li class="active"><a class="padding25" href="index3.php">INICIO</a></li>
            <?php } else { ?>
                <li><a class="padding25" href="index3.php">INICIO</a></li>
            <?php } ?>

            <?php if ($page == 'inmobiliaria') { ?>
                <li class="active"><a class="padding25" href="inmobiliaria2.php">INMOBILIARIA</a></li>
            <?php } else { ?>
                <li><a class="padding25" href="inmobiliaria2.php">INMOBILIARIA</a></li>
            <?php } ?>

            <?php if ($page == 'cartera') { ?>
                <li class="active"><a href="cartera.php">RECUPERACION <br>DE CARTERA</a></li>
            <?php } else { ?>
                <li><a href="cartera.php">RECUPERACION <br>DE CARTERA</a></li>
            <?php } ?>

            <?php if ($page == 'contacto') { ?>
                <li class="active"><a class="padding25" href="contacto.php">CONTACTO</a></li>
            <?php } else { ?>
                <li><a class="padding25" href="contacto.php">CONTACTO</a></li>
            <?php } ?>
        </ul>


        <div id="mobilemenu" class="rmm rmm-home" data-menu-style = "mystyle">
            <ul>
                <li><a href="#">INICIO</a></li>
                <li><a href="inmobiliaria2.php">INMOBILIARIA</a></li>
                <li><a href="grupoempresarial.html">GRUPO EMPRESARIA</a></li>
                <li><a href="contacto.php">CONTACTO</a></li>
            </ul>
        </div>
    </div>
</div>


