/*=============================================
ENLACES PAGINACIÓN
=============================================

var url = window.location.href;

var indice = url.split("/");

$("#item"+indice.pop()).addClass("active");
*/
/*=============================================
 PLANTILLA
=============================================*/
var rutaOculta=$("#rutaOculta").val();
$.ajax({
url: rutaOculta+"ajax/plantilla.ajax.php",
success:function(respuesta)
	{
   var colorFondo=JSON.parse(respuesta).colorFondo;
   var colorSecundario=JSON.parse(respuesta).colorSecundario;
   var colorTexto=JSON.parse(respuesta).colorTexto;
   var barraSuperior=JSON.parse(respuesta).barraSuperior;
   var textoSuperior=JSON.parse(respuesta).textoSuperior;
	$(".backColor, .backColor a").css({"background":colorFondo,"color":colorTexto})
	$(".barraSuperior, .barraSuperior a li").css({"background":barraSuperior,"color":textoSuperior})
	$(".colorSecundario").css({"background":colorSecundario})
	$(".fa-icons").css({"color":colorSecundario})
	}


});


/*=============================================
SELECTED
=============================================*/

 $(document).ready(function() {
    $('select').material_select();
  });
      

/*=============================================
CUADRÍCULA O LISTA
=============================================*/

var btnList = $(".btnList");

for(var i = 0; i < btnList.length; i++){

	$("#btnGrid"+i).click(function(){

		var numero = $(this).attr("id").substr(-1);

		$(".list"+numero).hide();
		$(".grid"+numero).show();

		$("#btnGrid"+numero).addClass("colorClickBotton");
		$("#btnList"+numero).removeClass("colorClickBotton");

	})

	$("#btnList"+i).click(function(){

		var numero = $(this).attr("id").substr(-1);

		$(".list"+numero).show();
		$(".grid"+numero).hide();

		$("#btnGrid"+numero).removeClass("colorClickBotton");
		$("#btnList"+numero).addClass("colorClickBotton");

	})

}



/*=============================================
EFECTOS CON EL SCROLL
=============================================*/

$(window).scroll(function(){

	var scrollY = window.pageYOffset;

	if(window.matchMedia("(min-width:768px)").matches){

		if($(".banner").html() != null){

			if(scrollY < ($(".banner").offset().top)-150){

				$(".banner img").css({"margin-top":-scrollY/3+"px"})

			}else{

				scrollY = 0;
			}

		}

	}	
	
})

$.scrollUp({

	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"

});

/*=============================================
   BREADCRUMB
=============================================*/

var pagActiva=$(".pagActiva").html();
if (pagActiva!=null) {
var regPagActiva=pagActiva.replace(/-/g," ");
$(".pagActiva").html(regPagActiva);
}

/*=============================================
   ENLACES PAGINACION
=============================================*/
var url=window.location.href;
var indice =url.split("/");

var pagActual =indice.pop();

if(pagActual != "#"){

    if(isNaN(pagActual)){

        $("#item1").addClass("active");
        $("#item1 a").removeAttr("href");

    }else{

        $("#item"+pagActual).addClass("active");

        $("#item"+pagActual+" a").removeAttr("href");

    }

}

/*=============================================
EVENTOS PIXEL DE FACEBOOK
=============================================*/

$(".pixelCategorias").click(function(){

	var titulo = $(this).attr("titulo");

	fbq('track', 'Categoria '+titulo, {

		title: titulo

	})

})

$(".pixelMarcas").click(function(){

	var titulo = $(this).attr("titulo");

	fbq('track', 'Marcas '+titulo, {

		title: titulo

	})

})


$(".pixelProductos").click(function(){

	var titulo = $(this).attr("titulo");

	fbq('track', 'Oferta '+titulo, {

		title: titulo

	})

})