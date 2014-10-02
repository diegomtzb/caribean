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
                    clear_box();
                    $("#flash").hide();
                });




            }
        });

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
        lishowhideP.toggle();
    });

    var showservices = $(".showservices");
    showservices.hover(function() {
        var contenedor = $( this).parent().parent();
        contenedor.find('p').toggle();
    });

    showservices.click(function(e){
        e.preventDefault();

        var contenedor = $( this).parent().parent();
        contenedor.find('p').toggle();



        var serviciotoshow = contenedor.find('label').html();
        var showmeservice = $('#'+ serviciotoshow);
        showmeservice.toggleClass('setService');
        //$('.setService').hide();
        showmeservice.toggle();


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
