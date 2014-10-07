$(document).ready(function() {
    $("#buscar").click(function(e) {
        e.preventDefault();


        var section_search = $("#section-search");

        var $search_result=$(".search_result")

        //Se asignan las variables a asignar a dataString y enviar por ajax en un Json
        var $negocio = $("#criterios1").find(".active").find("label");

        var tipo_negocio = $negocio.text();
        var tipo_inmueble = $("#tipo-inmueble select").val();
        var ubicacion = $("#ubicacion select").val();
        var dataString = {
            "negocio" : tipo_negocio,
            "tipo" : tipo_inmueble,
            "ubicacion" : ubicacion
        };


        //section_search.show("slow");

        /*if ( $( "#section-search" ).is( ":hidden" ) ) {
            $("#section-search" ).slideDown( "slow" );
        }*/

        /*section_search.slideDown( "slow", function() {
            // Animation complete.
        });*/


        $search_result.remove();

        $("footer").removeClass("absolutePosition");
        $("#flash")
            .show()
            .fadeIn(400).html('<span class="load">Loading..</span>');
        $.ajax({
            type: "POST",
            url: "action.php",
            data: dataString,
            cache: true,
            success: function(html){


                section_search.slideDown( "slow", function() {
                    $("#show").after(html);
                    //clear_box();
                    $("#flash").hide();
                });




            }
        });

        $('#suscripcion').css('margin-bottom', '5em');
        $('footer').removeClass('noneDisplay');

        return false;
    });

    var btnCheckActive = $(".checkTrue");
    btnCheckActive.click(function(e){
        e.preventDefault();
        btnCheckActive.toggleClass("active");
        //$( this ).toggleClass("active");
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

});

function clear_box(){
    var tipo_inmueble = $("#tipo-inmueble select");
    var ubicacion = $("#ubicacion select");

    tipo_inmueble.val('');
    ubicacion.val('');
}

function orderByHasChanged(){
    alert("ok");
}

function tipoInmuebleHasChanged(){
    $('#tipo-inmueble select').css('color', '#e6332a');
}

function ubicacionHasChanged(){
    $('#ubicacion select').css('color', '#e6332a');
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
