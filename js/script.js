var $negocio="";
var tipo_negocio="";
var tipo_inmueble="";
var tipo_inmueble_val="";
var ubicacion="";

$(document).ready(function() {
    $("#buscar").click(function(e) {
        e.preventDefault();

        var section_search = $("#section-search");
        var $search_result=$(".search_result")

        //Se asignan las variables a asignar a dataString y enviar por ajax en un Json
        $negocio = $("#criterios1").find(".active").find("label");
        tipo_negocio = $negocio.text();
        tipo_inmueble = $("#tipo-inmueble select").val();
        tipo_inmueble_val = $("#tipo-inmueble option:selected").text();
        ubicacion = $("#ubicacion select").val();

        var paginacion = $(".paginacion");


        var dataString = {
            "negocio" : tipo_negocio,
            "tipo" : tipo_inmueble,
            "tipo_val" : tipo_inmueble_val,
            "ubicacion" : ubicacion
        };

        $search_result.remove();

        $("footer").removeClass("absolutePosition");
        $("#flash")
            .show()
            .fadeIn(400).html('<div class="medium load"><div>Loading…</div></div>');



        section_search.slideDown( "fast");



        $.ajax({
            type: "POST",
            url: "action.php",
            data: dataString,
            cache: true,
            success: function(html){

                $("#flash").hide();

                if (html.indexOf("INICIO(BORRAR)") >= 0){
                    var start = html.indexOf("INICIO(BORRAR)")
                    var end = html.indexOf("FIN(BORRAR)")
                    var lenEnd = ("FIN(BORRAR)").length;
                    var res = html.substring(start, end+lenEnd);
                    var resSplit = res.split(",");
                    var pagiNavegacion = resSplit[1].split("->")[1];
                    paginacion.html(pagiNavegacion);
                    var newHtml = html.replace(res, "");
                }


                $("#show").after(newHtml);
            }
        });

        $('#suscripcion').css('margin-bottom', '5em');
        $('footer').removeClass('noneDisplay');

        return false;
    });


    var suscription_form = $("#suscription_form");
    suscription_form.submit(function(event) {
        var form = $( this );
        var url = form.attr( 'action' );
        var susc_email = $("#suscribe_email").val();
        var dataString = {
            "srEmail" : susc_email
        };
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            cache: true,
            success: function(html){
                $("#suscribe_email").val('');
                alert("Se ha suscrito con exito");
            }
        });
        return false;
    });


    /*var btnCheckActive = $(".checkTrue");
    btnCheckActive.click(function(e){
        e.preventDefault();
        btnCheckActive.toggleClass("active");
        //$( this ).toggleClass("active");

        alert("okok");
    });*/


    var lishowhide = $(".showhide");
    lishowhide.click(function(e){
        e.preventDefault();
        var lishowhideP = $( this ).find('p');
        var alllishowhideP = lishowhide.find('p');
        //lishowhideP.toggle();

        //alllishowhideP.hide();

        if (lishowhideP.is(":visible") ){
            lishowhideP.slideUp( "fast" );
            $( this ).css("list-style-image", "url('imgs/Flecha-1.png')");
        } else {
            alllishowhideP.hide();
            lishowhide.css("list-style-image", "url('imgs/Flecha-1.png')");
            lishowhideP.slideDown( "slow" );
            $( this ).css("list-style-image", "url('imgs/Flecha-2.png')");
        }

    });

    /*var showservices = $(".showservices");
    showservices.hover(function() {
        var contenedor = $( this).parent().parent();
        //contenedor.find('p').toggle();

        if (!$( this ).hasClass('active') ){
            contenedor.find('p').show();
        }

    });*/


    var showservices = $(".showservices");
    showservices.hover(
        function() {
            //mouse in
            var contenedor = $( this).parent().parent();
            contenedor.find('p').show();
        }, function() {
            //mouse out
            var contenedor = $( this).parent().parent();
            if (!$( this ).hasClass('active') ){
                contenedor.find('p').hide();
            }
        }
    );

    var search_result = $(".search_result");
    search_result.hover(
        function() {
            //mouse in
            var labelVerInmueble = $( this).find(".labelVerInmueble");
            labelVerInmueble.addClass( "activeVerInmueble" );
        }, function() {
            //mouse out
            var labelVerInmueble = $( this).find(".labelVerInmueble");
            labelVerInmueble.removeClass( "activeVerInmueble" );
        }
    );

    var showservicesfinca = $(".showservices.fincaser");
    var showservicesgerencia = $(".showservices.gerenser");

    var showmeservicefinca = $('#fincaraiz');
    var showmeservicegerencia = $('#gerenciadeproyectos');

    showservices.click(function(e){
        e.preventDefault();

        var contenedor = $( this).parent().parent();
        var contenedorParent = $( this).parent().parent().parent();



        var serviciotoshow = contenedor.find('label').html();
        var showmeservice = $('#'+ serviciotoshow);


        var src= $( this ).attr("src");
        src = src.substring(0, 16);


        if ($( this ).hasClass('active') ){
            $( this ).removeClass('active');
            $( this ).attr("src", src + '.png');
            showmeservice.hide();
        } else {
            showservices.removeClass('active');

            showservicesfinca.attr("src", 'imgs/Boton-Finca.png');
            showservicesgerencia.attr("src", 'imgs/Boton-Geren.png');
            contenedorParent.find('p').hide();
            showmeservicefinca.hide();
            showmeservicegerencia.hide();



            $( this ).addClass('active');
            $( this ).attr("src", src + '-selected.png');
            contenedor.find('p').show();
            //showmeservice.show();
            showmeservice.slideDown( "fast" );

            $('html, body').animate({
                scrollTop: showmeservice.offset().top
            }, 1000);
        }
    });

    var btnReservar = $('#reservar_btn');
    btnReservar.click(function(e){
        e.preventDefault();
        var frmReservar = $('#reservar_frm');
        frmReservar.slideToggle( );
        btnReservar.toggleClass("highlight")
    });

});

var btnCheckActive = $(".checkTrue");
function CheckActive(elemen, negocio){
    var me = $(elemen);
    if (!me.hasClass("active"))
    {
        gotoChangeSearchAttributeFromNegocio(negocio)
    }
}

function linkNextPagi(pagi){

    var section_search = $("#section-search");
    var $search_result=$(".search_result")

    //Se asignan las variables a asignar a dataString y enviar por ajax en un Json
    /*var $negocio = $("#criterios1").find(".active").find("label");
    var tipo_negocio = $negocio.text();
    var tipo_inmueble = $("#tipo-inmueble select").val();
    var tipo_inmueble_val = $("#tipo-inmueble option:selected").text();
    var ubicacion = $("#ubicacion select").val();*/

    var paginacion = $(".paginacion");

    var dataString = {
        "negocio" : tipo_negocio,
        "tipo" : tipo_inmueble,
        "tipo_val" : tipo_inmueble_val,
        "ubicacion" : ubicacion,
        "pagi" : pagi
    };

    $search_result.remove();

    $("footer").removeClass("absolutePosition");
    $("#flash")
        .show()
        .fadeIn(400).html('<div class="medium load"><div>Loading…</div></div>');

    section_search.slideDown( "fast");

    $.ajax({
        type: "POST",
        url: "action.php",
        data: dataString,
        cache: true,
        success: function(html){

            $("#flash").hide();
            //alert(html);
            if (html.indexOf("INICIO(BORRAR)") >= 0){
                var start = html.indexOf("INICIO(BORRAR)")
                var end = html.indexOf("FIN(BORRAR)")
                var lenEnd = ("FIN(BORRAR)").length;
                var res = html.substring(start, end+lenEnd);
                var resSplit = res.split(",");
                var pagiNavegacion = resSplit[1].split("->")[1];
                paginacion.html(pagiNavegacion);
                var newHtml = html.replace(res, "");
            }
            $("#show").after(newHtml);
        }
    });



}


function gotoChangeSearchAttributeFromNegocio(negocio){
    btnCheckActive.toggleClass("active");

    var tipo_inmueble = $("#tipo-inmueble select").val();
    var ubicacion = $("#ubicacion select").val();


    $('#ubicacion select').css('color', '#c6c6cd');
    $('#tipo-inmueble select').css('color', '#c6c6cd');


    var dataString = {
        "negocio" : negocio,
        //"tipo" : tipo_inmueble,
        "tipo" : null,
        //"ubicacion" : ubicacion,
        "ubicacion" : null,
        "parametro" : 1
    };



    $("#tipo-inmueble").find('select').html('<option value="" disabled="disabled" selected="selected">Cargando...</option>');

    $.ajax({
        type: "POST",
        url: "change_search_attribute.php",
        data: dataString,
        cache: true,
        success: function(html){
            //alert(html);
            //$("#tipo-inmueble").find('select').html('<option value="" disabled="disabled" selected="selected">Tipo de inmueble</option>');
            html='<option value="" disabled="disabled" selected="selected">Tipo de inmueble</option>' + html;
            $("#tipo-inmueble").find('select').html(html);
        }
    });





    var dataString = {
        "negocio" : negocio,
        //"tipo" : tipo_inmueble,
        "tipo" : null,
        //"ubicacion" : ubicacion,
        "ubicacion" : null,
        "parametro" : 2
    };

    $("#ubicacion").find('select').html('<option value="" disabled="disabled" selected="selected">Cargando...</option>');

    $.ajax({
        type: "POST",
        url: "change_search_attribute.php",
        data: dataString,
        cache: true,
        success: function(html){
            html='<option value="" disabled="disabled" selected="selected">Ubicación</option>' + html;
            $("#ubicacion").find('select').html(html);
        }
    });
}


function gotoChangeSearchAttributeFromTipoInmueble(negocio){

    var tipo_inmueble = $("#tipo-inmueble select").val();
    var ubicacion = $("#ubicacion select").val();



    //if(ubicacion==null)
    //{
    //}




    $('#ubicacion select').css('color', '#c6c6cd');

    $("#ubicacion").find('select').html('<option value="" disabled="disabled" selected="selected">Cargando...</option>');


    var dataString = {
        "negocio" : negocio,
        "tipo" : tipo_inmueble,
        //"tipo" : null,
        //"ubicacion" : ubicacion,
        "ubicacion" : ubicacion,
        "parametro" : 2
    };


    $.ajax({
        type: "POST",
        url: "change_search_attribute.php",
        data: dataString,
        cache: true,
        success: function(html){
            html='<option value="" disabled="disabled" selected="selected">Ubicación</option>' + html;
            $("#ubicacion").find('select').html(html);
        }
    });

}


function gotoChangeSearchAttributeFromUbicacion(negocio){
   /* var tipo_inmueble = $("#tipo-inmueble select").val();
    var ubicacion = $("#ubicacion select").val();

    if(tipo_inmueble==null)
    {
        $('#tipo-inmueble select').css('color', '#c6c6cd');

        var dataString = {
            "negocio" : negocio,
            "tipo" : null,
            "ubicacion" : ubicacion,
            "parametro" : 1
        };

        $("#tipo-inmueble").find('select').html('<option value="" disabled="disabled" selected="selected">Cargando...</option>');

        $.ajax({
            type: "POST",
            url: "change_search_attribute.php",
            data: dataString,
            cache: true,
            success: function(html){
                html='<option value="" disabled="disabled" selected="selected">Tipo de inmueble</option>' + html;
                $("#tipo-inmueble").find('select').html(html);
            }
        });
    }*/
}





function closeLightWindow(){
    $.colorbox.close();
}

function clear_box(){
    var tipo_inmueble = $("#tipo-inmueble select");
    var ubicacion = $("#ubicacion select");

    tipo_inmueble.val('');
    ubicacion.val('');
}

function orderByHasChanged(){
    //alert("ok");
}

function tipoInmuebleHasChanged(){
    $('#tipo-inmueble select').css('color', '#e6332a');

    var negocio = $("#criterios1").find(".active").find("label").text();
    if (negocio=="VENTA")
    {
        negocio = 2;
    }else
    {
        negocio = 3;
    }
    gotoChangeSearchAttributeFromTipoInmueble(negocio);
}

function ubicacionHasChanged(){
    $('#ubicacion select').css('color', '#e6332a');

    var negocio = $("#criterios1").find(".active").find("label").text();
    if (negocio=="VENTA")
    {
        negocio = 2;
    }else
    {
        negocio = 3;
    }
    gotoChangeSearchAttributeFromUbicacion(negocio);
}

var miniatureFigureImg = $(".miniatureFigure img");
miniatureFigureImg.click(function(e){
    e.preventDefault();
    $('#minuatures-single').children().removeClass('active');
    $( this ).parent().addClass("active");
    var imgsrc=$( this ).attr("src");
    $('#mainFIgure img').attr("src", imgsrc);
});

//Prueba para empezar a correr las imagenes del slide (Grandes=mainfigure) automaticamente
//empezar la funcion cuando se abra la pagina de imagenes
//Desde donde la llamo?
//Se cierra cuando cambio la página o sigue corriendo?
//probar con simpleslider
//setintervalfunction
//cambiar mainfigure por el next del que este activo
//setear activo el next
function startSliding(){
    alert ("starting");
}
