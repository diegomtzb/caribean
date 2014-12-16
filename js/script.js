var $negocio="";
var tipo_negocio="";
var tipo_inmueble="";
var tipo_inmueble_val="";
var ubicacion="";

$(document).ready(function() {
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
        btnCheckActive.toggleClass("active");
        gotoChangeSearchAttributeFromNegocio(negocio);
        cargar_precio(negocio);
    }
}




function gotoChangeSearchAttributeFromNegocio(negocio){


    var tipo_inmueble = $("#tipo-inmueble select");
    var ubicacion = $("#ubicacion select");
    //var tipo_inmueble = $("#tipo-inmueble select").val();
    //var ubicacion = $("#ubicacion select").val();


    $('#ubicacion select').css('color', '#c6c6cd');
    tipo_inmueble.css('color', '#c6c6cd');


    var dataString = {
        "negocio" : negocio,
        //"tipo" : tipo_inmueble,
        "tipo" : null,
        //"ubicacion" : ubicacion,
        "ubicacion" : null,
        "parametro" : 1
    };



    $("#tipo-inmueble").find('select').html('<option value="" disabled="disabled" selected="selected">Cargando...</option>');


    tipo_inmueble.prop('disabled',true);
    $.ajax({
        type: "POST",
        url: "change_search_attribute.php",
        data: dataString,
        cache: true,
        success: function(html){
            tipo_inmueble.prop('disabled',false);
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

    ubicacion.prop('disabled',true);
    $.ajax({
        type: "POST",
        url: "change_search_attribute.php",
        data: dataString,
        cache: true,
        success: function(html){
            ubicacion.prop('disabled',false);
            html='<option value="" disabled="disabled" selected="selected">Ubicación</option>' + html;
            $("#ubicacion").find('select').html(html);
        }
    });
}


function gotoChangeSearchAttributeFromTipoInmueble(negocio){
    var tipo_inmueble = $("#tipo-inmueble select").val();
    var ubicacion = $("#ubicacion select");

    ubicacion.css('color', '#c6c6cd');

    ubicacion.html('<option value="" disabled="disabled" selected="selected">Cargando...</option>');

    var dataString = {
        "negocio" : negocio,
        "tipo" : tipo_inmueble,
        //"tipo" : null,
        //"ubicacion" : ubicacion,
        "ubicacion" : ubicacion.val(),
        "parametro" : 2
    };

    $.ajax({
        type: "POST",
        url: "change_search_attribute.php",
        data: dataString,
        cache: true,
        success: function(html){
            html='<option value="" disabled="disabled" selected="selected">Ubicación</option>' + html;
            ubicacion.html(html);
        }
    });

}


function gotoChangeSearchAttributeFromUbicacion(negocio){
   /*var tipo_inmueble = $("#tipo-inmueble select").val();
    var ubicacion = $("#ubicacion select").val();

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
    });*/
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
    $('#tipo-inmueble select').css('color', '#f39200');
    var negocio = $("#criterios1").find(".active").find("label").text();
    if(negocio==""){
        negocio=$("#controllers .checktrue.active label").text();
    }
    gotoChangeSearchAttributeFromTipoInmueble(negocio);
}

function ubicacionHasChanged(){
    $('#ubicacion select').css('color', '#f39200');
    var negocio = $("#criterios1").find(".active").find("label").text();
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

function get_sugerido_main(){
    $.ajax({
        type: "POST",
        url: "get_sugerido_main.php",
        data: "",
        cache: true,
        success: function(get_html){
            $(".destacado").html(get_html);
        }
    });

}

function get_sugeridos(){

    $.ajax({
        type: "POST",
        url: "get_sugeridos.php",
        data: "",
        cache: true,
        success: function(get_html){
            $("#sugeridos .inside_me").html($("#sugeridos .inside_me").html() + get_html);
        }
    });

}

function search_inmuebles(){

    var $search_result = $(".search_result");
    var section_search = $("#section-search");
    var paginacion = $(".paginacion");

    var dataString = {
        "negocio" : $("#criterios1 .active label").text(),
        "inmueble" : $("#tipo-inmueble select").val(),
        "ubicacion" : $("#ubicacion select").val()
    };

    $search_result.remove();
    $("#sugeridos").hide();

    $("#flash")
        .show()
        .fadeIn(400).html('<div class="medium load"><div>Loading…</div></div>');

    section_search.slideDown( "fast");

    $.ajax({
        type: "GET",
        url: "get_any.php",
        data: dataString,
        cache: true,
        success: function(html){
            $("#flash").hide();



            if (html.indexOf("INICIO(BORRAR)") >= 0){
                var start = html.indexOf("INICIO(BORRAR)");
                var end = html.indexOf("FIN(BORRAR)");
                var lenEnd = ("FIN(BORRAR)").length;
                var res = html.substring(start, end+lenEnd);
                var resSplit = res.split(",*:");
                var pagiNavegacion = resSplit[1].split("->")[1];
                paginacion.html(pagiNavegacion);
                var newHtml = html.replace(res, "");
            }

            $("#section-search .inside_me").append(newHtml);
        }
    });

}

function linkNextPagi(dataString){
    var $search_result=$(".search_result");
    var section_search = $("#section-search");
    var paginacion = $(".paginacion");

    var dataString = {
        "negocio" : dataString.negocio,
        "inmueble" : dataString.inmueble,
        "ubicacion" : dataString.ubicacion,
        "pagi" : dataString.pagi
    };

    $search_result.remove();

    $("#flash")
        .show()
        .fadeIn(400).html('<div class="medium load"><div>Loading…</div></div>');

    section_search.slideDown( "fast");

    $.ajax({
        type: "GET",
        url: "get_any.php",
        data: dataString,
        cache: true,
        success: function(html){

            $("#flash").hide();
            if (html.indexOf("INICIO(BORRAR)") >= 0){
                var start = html.indexOf("INICIO(BORRAR)");
                var end = html.indexOf("FIN(BORRAR)");
                var lenEnd = ("FIN(BORRAR)").length;
                var res = html.substring(start, end+lenEnd);
                var resSplit = res.split(",*:");
                var pagiNavegacion = resSplit[1].split("->")[1];
                paginacion.html(pagiNavegacion);
                var newHtml = html.replace(res, "");
            }
            $("#section-search .inside_me").append(newHtml);
        }
    });
}

function busqueda_codigo(){
    var $search_result=$(".search_result");
    var section_search = $("#section-search");
    var surroundcodigo = $(".surroundcodigo input").val();
    if (surroundcodigo ==""){
        alert("Debe escribir un código del inmueble");
        return;
    }

    var dataString = {
        "codigo" : surroundcodigo
    };

    $search_result.remove();
    $("#sugeridos").hide();

    $("#flash")
        .show()
        .fadeIn(400).html('<div class="medium load"><div>Loading…</div></div>');

    section_search.slideDown( "fast");

    $.ajax({
        type: "GET",
        url: "get_codigo.php",
        data: dataString,
        cache: true,
        success: function(html){
            $("#flash").hide();
            $("#section-search .inside_me").append(html);
        }
    });
}

function busqueda_home(){
    var dataString = {
        "negocio" : $("#controllers .checktrue.active label").text(),
        "inmueble" : $("#tipo-inmueble select").val(),
        "ubicacion" : $("#ubicacion select").val()
    };

    var string_url = "?negocio=" + dataString.negocio;
    if (dataString.inmueble != null){
        string_url += "&inmueble=" + dataString.inmueble;
    }
    if (dataString.ubicacion != null){
        string_url += "&ubicacion=" + dataString.ubicacion;
    }

    window.location.href = 'inmobiliaria2.php' + string_url;
}

function busqueda_home_inmobiliaria(datastring){
    var $search_result = $(".search_result");
    var section_search = $("#section-search");
    var paginacion = $(".paginacion");

    var dataString = {
        "negocio" : datastring.negocio,
        "inmueble" : datastring.inmueble,
        "ubicacion" : datastring.ubicacion
    };

    $search_result.remove();
    $("#sugeridos").hide();

    $("#flash")
        .show()
        .fadeIn(400).html('<div class="medium load"><div>Loading…</div></div>');

    section_search.slideDown( "fast");

    $.ajax({
        type: "GET",
        url: "get_any.php",
        data: dataString,
        cache: true,
        success: function(html){
            $("#flash").hide();



            if (html.indexOf("INICIO(BORRAR)") >= 0){
                var start = html.indexOf("INICIO(BORRAR)");
                var end = html.indexOf("FIN(BORRAR)");
                var lenEnd = ("FIN(BORRAR)").length;
                var res = html.substring(start, end+lenEnd);
                var resSplit = res.split(",*:");
                var pagiNavegacion = resSplit[1].split("->")[1];
                paginacion.html(pagiNavegacion);
                var newHtml = html.replace(res, "");
            }

            $("#section-search .inside_me").append(newHtml);
        }
    });
}

function busqueda_from_menu(elemen, negocio){
    var me = $(elemen);
    me.addClass("active");
}

function cargar_precio(negocio){
    var price = $("#price");
    var html='<select onChange="javascript:priceHasChanged();">';
    if (negocio==2){
        html += '<option value="" disabled="disabled" selected="selected">Precio</option>';
        html += '<option value="1">0-100.000.000</option>';
        html += '<option value="2">100.000.000-200.000.000</option>';
        html += '<option value="2">200.000.000-300.000.000</option>';
        html += '<option value="2">300.000.000-400.000.000</option>';
        html += '<option value="2">Mayor 400.000.000</option>';
    }else{
        html += '<option value="" disabled="disabled" selected="selected">Precio</option>';
        html += '<option value="1">0-1.000.000</option>';
        html += '<option value="2">1.000.000-2.000.000</option>';
        html += '<option value="2">2.000.000-3.000.000</option>';
        html += '<option value="2">3.000.000-4.000.000</option>';
        html += '<option value="2">Mayor 4.000.000</option>';
    }
    html += '</select>';
    price.html(html);
}

function priceHasChanged(){
    $('#price select').css('color', '#f39200');
}
